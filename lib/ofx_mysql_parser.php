<pre>
<? 
/* 

sauer
ofx2mysql - Ver 1.0
Realiza a importação de um arquivo ofx diretamente para um banco de dados mySQL
Autor: Renato Monteiro Batista - Outubro de 2018.
Este projeto permite a importação de ofx a partir da leitura linha-a-linha do arquivo.
Testado com ofx das instituções brasileiras: Bco Brasil, Caixa, Bradesco, Nubank.
A saída será o código SQL a ser processado pelo banco de dados.
Inspirado no gist https://gist.github.com/niepi/630660
Esta é uma implementação estruturada, baseada em funções. Para uma classe com importação
do arquivo ofx como se fosse um xml, visite o projeto: https://github.com/asgrim/ofxparser
*/


function paragraphe($code) { 
    /* Le o conteúdo de um parágrafo no arquivo ofx, um parágrafo é o conteudo entre <code>...</code> */
    global $data, $paragraphe ; 
    $debut = strpos($data, '<'.$code.'>') ; 
    if ($debut>0) { 
        $fin = strpos($data, '</'.$code.'>')+strlen($code)+3 ; 
        $paragraphe = substr($data, $debut, $fin-$debut) ; 
        $data = substr($data, $fin) ; 
    } else $paragraphe = '' ; 
} 

function valeur($parametre) { 
    /* Le valor de um campo ofx */
    global $paragraphe ; 
    $debut = strpos($paragraphe, '<'.$parametre.'>') ; 
    if ($debut>0) { 
        $debut = $debut+strlen($parametre)+2 ; 
        $fin = strpos($paragraphe, '<',$debut+1) ; 
        return trim(substr($paragraphe, $debut, $fin-$debut)) ; 
    } 
    else { return 'NULL'; }
} 


function get_stmttrn_value($tag){ 
    //function to get values stored between STMTTRN flags in OFX files 
    global $trn_str; 
    $retorno=substr($trn_str,strpos($trn_str,'<'.$tag.'>') + strlen('<'.$tag.'>'),strpos($trn_str,'<',(strpos($trn_str,'<'.$tag.'>') + strlen('<'.$tag.'>'))) - (strpos($trn_str,'<'.$tag.'>') + strlen('<'.$tag.'>')));
    $retorno=trim(str_replace(PHP_EOL, '',$retorno));
    return $retorno;
} 

function get_qif_value($tag){ 
    //function to get values from QIF file 
    global $trn_str; 
    return substr($trn_str,strpos($trn_str,"\n" .$tag) + 2,(strpos($trn_str,"\n",strpos($trn_str,"\n" .$tag)+2) - (strpos($trn_str,"\n" .$tag) + 2))); 
} 

function aspa($texto){
    //Retorna o texto entre aspas simples
    return "'" . $texto . "'";
}

function split_header($arquivo){
    /*
    Esta função separa os headers do conteúdo XML do arquivo OFX
    */
    $file = fopen($arquivo, "r") or die("Unable to open file!");
    $conteudo_arquivo = fread($file, filesize($arquivo) );
    fclose($file); 
    $fim_header=strpos($conteudo_arquivo,"<OFX>");
    $ofx_header=substr($conteudo_arquivo,0,$fim_header);
    $ofx_data=substr($conteudo_arquivo,$fim_header,strlen($conteudo_arquivo)-$fim_header);
    $linhas_header=explode(chr(13), $ofx_header);
    for ($i=0;$i<count($linhas_header);$i++){
        $partes=explode(":",$linhas_header[$i]);
        $partes[0]=trim($partes[0]);
        $partes[1]=trim($partes[1]);
        if ($partes[0] != "") { $head_fields[$partes[0]]=$partes[1]; }
    }
    if ($head_fields["CHARSET"] == "1252") { $ofx_data=iconv('Windows-1252','UTF-8',$ofx_data); }
//    $xml = new SimpleXMLElement($ofx_data);
    return Array("head" => $head_fields,"body" => $ofx_data);
}

$affected_rows = "";// initialize affected rows 

$_file_ = $_FILES['bank_file']; 

if(is_uploaded_file($_file_['tmp_name']) && $_file_['error'] == 0){ 
    if($_file_['size'] > 3200000) { echo "Erreur: le fichier est trop gros (max 3MO)"; die; }
    $file_name = $_file_['tmp_name']; 
    $tudo=split_header($file_name);
    $data=$tudo["body"];
    $max_version = 211; 
    if($tudo["head"]["VERSION"] <= $max_version){ 
        ((strpos($data,"BANKACCTFROM") > 0)?paragraphe('BANKACCTFROM'):paragraphe('CCACCTFROM'));
        $BANKID = valeur('BANKID') ; 
        $BRANCHID = valeur('BRANCHID') ; 
        $ACCTID = valeur('ACCTID') ; 
        //$ACCTTYPE = valeur('ACCTTYPE');
        //$ACCTKEY = valeur('ACCTKEY'); 

        $i = 0; 
        $pos_start_data = strpos($data,'<STMTTRN>'); 
        $len_data = strpos($data,"</BANKTRANLIST>") - $pos_start_data; 
        $data_str = substr($data,$pos_start_data,$len_data); 
        $start_trn_str = strpos($data_str,'<STMTTRN>'); 
        $len_trn_str = strpos($data_str,'</STMTTRN>') + 10; 
        $nb_trn = substr_count($data_str,'<STMTTRN>'); 

        while ($i < $nb_trn) { 
            $trn_str = substr($data_str,$start_trn_str,$len_trn_str); 
            $trntype = get_stmttrn_value('TRNTYPE'); 
            $dtposted = substr(get_stmttrn_value('DTPOSTED'),0,8); 
            $trnamt = get_stmttrn_value('TRNAMT'); 
            $fitid = get_stmttrn_value('FITID'); 
            $checknum = ((strpos($trn_str,'<CHECKNUM>') > 0) ? aspa(get_stmttrn_value('CHECKNUM')) : 'NULL'); 
            $refnum = ((strpos($trn_str,'<REFNUM>') > 0) ? aspa(get_stmttrn_value('REFNUM')) : 'NULL'); 
            $memo = ((strpos($trn_str,'<MEMO>') > 0) ? aspa(get_stmttrn_value('MEMO')) : 'NULL'); 
 
            $value .= "('$BANKID','$BRANCHID','$ACCTID','$fitid',$memo,$trnamt,'$dtposted','$trntype',$checknum,$refnum)\n"; 
            if ($i + 1 < $nb_trn) { $value .= ","; }; 
            $start_trn_str = strpos($data_str,'<STMTTRN>',$start_trn_str + 1); 
            $len_trn_str = (strpos($data_str,'</STMTTRN>',$start_trn_str) - $start_trn_str) + 10; 
            $i++; 
        } 
 
        $SQL = "INSERT IGNORE INTO ofx_trans" 
            ." (banco,agencia,conta,transacao,memo,valor,data,tipo,check_num,ref_num)" 
            ." VALUES \n". $value; 
        echo $SQL . "\n";
    }
    else { echo "ERROR Unsupported ofx version."; }
}
else { echo "ERROR NO FILE UPLOADED"; }

?>
</pre>