
<?php 
require_once "../conexion/conexion.php";
$materia = $con-> real_escape_string(htmlentities($_GET['name']));

$sql = $con->query("SELECT * from profesor WHERE materia= '$materia' order by puntaje ");
$result =  mysqli_num_rows($sql);
$valoresy=array();//montos
$valoresx=array();//fechas

while ($ver= $sql->fetch_assoc()) {
  $valoresy[]=$ver['puntaje'];
  $valoresx[]=$ver['nombre'];
}

$datosx=json_encode($valoresx);
$datosy=json_encode($valoresy);
 ?>
<div id="graficalineal"></div>

<script type="text/javascript">
  function crearCadenaLineal(json){
    var parsed = JSON.parse(json);
    var arr = [];
    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }
</script>


<script type="text/javascript">

  datosx=crearCadenaLineal('<?php echo $datosx ?>');
  datosy=crearCadenaLineal('<?php echo $datosy ?>');

  var trace1 = {
  x: datosx,
  y: datosy,
  type: 'scatter',
  font: {size: 9},
  //line: {
  //  color: 'rgb(219, 64, 82)',
  //  width: 3
  //},
  line: {shape: 'spline'},

};

//var trace2 = {
  //x: [1, 2, 3, 4],
  //y: [16, 5, 11, 9],
  //type: 'scatter'
//};


var data = [trace1];

var layout = { 
  title: 'Grafica de resultados',
  font: {size: 10}
};


Plotly.newPlot('graficalineal', data, layout, {responsive: true});
</script>
