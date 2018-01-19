<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js" type="text/javascript"></script>

<?php  
require_once('./vendor/autoload.php');
if(isset($_POST['isim']))
{
$isim = $_POST['isim'];
$puan = $_POST['puan'];

$manager = new MongoDB\Driver\Manager("mongodb://172.17.0.2:27017");
$bulk = new MongoDB\Driver\BulkWrite();
    $doc = ['_id' => new MongoDB\BSON\ObjectID, 'isim' => $isim, 'puan' => $puan];
$bulk->insert($doc);

	$manager->executeBulkWrite('db.collection', $bulk);
$filter = ['puan' => 'iyi'];
$options = [
    'projection' => ['_id' => 0],
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('db.collection', $query);
	foreach ($cursor as $document) {
	


	$bson = MongoDB\BSON\fromPHP($document);
	
    echo MongoDB\BSON\toJSON($bson), "\t"; 
	  }
   // var_dump($document);  }
   //$iyi = count($cursor);
    //echo $iyi;
echo"<br><br>";
	
	

echo "Sayın "; echo "$isim";  echo " anketimize katılım gösterdiğiniz için teşekkürler işte sonuçlar:";






}


?>


<script>
  

	window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Anket Sonuçları"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00'%'",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 79.45, label: "İyi"},
			{y: 7.31, label: "Kötü"},
			{y: 7.06, label: "Çirkin"}
		]
	}]
});
chart.render();

}
	
</script>


<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>



