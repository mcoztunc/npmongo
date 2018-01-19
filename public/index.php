<!DOCTYPE html>
<?php 
require_once('./mongodbase.php');

if(isset($_POST['isim'])){
$isim = $_POST['isim'];
 $puan = $_POST['puan'];}


?>
<html>
<head>
	<title>ilk proje</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
	<script href="./canvasjs.min.js" type="text/javascript"></script>

</head>
<body>
	<br>
	<div class="container">
	<form action="mongodbase.php" method="post">
	<div class="form-group">
<label for="text">İsminizi Giriniz</label><br>	<input type="text" name="isim" id="text" required="required"></div>
	
	<div class="form-group">
	<label for="radiocevap">Stajyerden memnun musunuz </label>	<br>
	<input type="radio" name="puan" value="iyi" id="radiocevap" required="required" >İyi<br>
	<input type="radio" name="puan" value="kötü" id="radiocevap" required="required" >Kötü<br>
	<input type="radio" name="puan" value="çirkin" id="radiocevap" required="required" >Çirkin<br><br>

	<input type="submit" name="submit" class="btn btn-default" value="Gönder">
	</div>

	</form>

</div>


</body>
</html>
