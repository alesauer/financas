 <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);



<?php
#
# GERA A FUNCÇÃO COM DADOS DO MYSQL
#

include_once("../database.php");
//error_reporting(0);

$obj = new Database;
$resultado = $obj->connect("select * from V_TOTAL_RECEITA_ANO_CORRENTE");
$i=0;
while($linha=mysqli_fetch_array($resultado))
{
    $MES_RECEITA[$i] = $linha['MES'];
    $TOTAL_RECEITA[$i]=$linha['TOTAL_RECEITA'];
    $i++;
}    


$obj = new Database;
$resultado = $obj->connect("select * from V_TOTAL_DESPESA_ANO_CORRENTE");
$i=0;
while($linha=mysqli_fetch_array($resultado))
{
    $MES_DESPESA[$i] = $linha['MES'];
    $TOTAL_DESPESA[$i]=$linha['TOTAL_DESPESA'];
    $i++;
}    




echo "function drawChart() {\n
var data = google.visualization.arrayToDataTable([\n
['Mês', 'Receitas', 'Despesas'],\n";

for($j=0;$j<=$i-1;$j++)
{
     echo "['$MES_RECEITA[$j]', $TOTAL_RECEITA[$j], $TOTAL_DESPESA[$j]],\n";
}
echo " ]);\n";
#
# F.I.M   -- GERA A FUNCÇÃO COM DADOS DO MYSQL
#
?>

        var options = {
          title: 'Desempenho Anual',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 650px; height: 200px"></div>
  </body>
</html>



