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
$resultado = $obj->connect("SELECT * FROM V_GASTOS_CATEGORIA_TUDO;");
$i=0;
while($linha=mysqli_fetch_array($resultado))
{
    $categoria[$i] = $linha['CATEGORIA'];
    $total[$i]=$linha['total'];
    $i++;
}    


echo "function drawChart() {\n
    var data = google.visualization.arrayToDataTable([\n
        ['Categoria', 'Valor'],\n";
    
    for($j=0;$j<=$i-1;$j++)
    {
         echo "['$categoria[$j]', $total[$j]],\n";
    }
    echo " ]);\n";
?>


        var options = {
          title: 'Gastos por Categoria'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 380px; height: 220px;"></div>
  </body>
</html>