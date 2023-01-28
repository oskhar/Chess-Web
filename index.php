<?php 
$conn = mysqli_connect("localhost", "moskharm_user", "g8N7a6O5d4S3e2T1", "moskharm_game");
$result = mysqli_query($conn, "SELECT no FROM catur");

if (isset($_POST['oldroom'])) {
	$cariRoom = intval($_POST['koderoom']);
	$warna = $_POST['warna'];
	$encryp = (($cariRoom*5)-10)/450505;
	$penanda = 0;
	while ( $dataRoom = mysqli_fetch_assoc($result) ) {
	    if (intval($dataRoom['no']) == $encryp){
	    	$penanda = 1;
	    }
	}
	if ($penanda == 1) {
		header("Location: https://moskhar.my.id/projectGame/catur/" . $warna . ".php?room=$cariRoom");
	}else{echo("<script>alert('ROOM TIDAK DITEMUKAN !!!')");}


} else if (isset($_POST['newroom'])) {
	$vlu = 0;
	$warna = $_POST['warna'];
	while ( $dataRoom = mysqli_fetch_assoc($result) ) {
	    if($vlu<intval($dataRoom['no'])){
	    $vlu = intval($dataRoom['no']);
	    }
	}
	$vlu = $vlu+1;
	$query = "INSERT INTO catur
	    VALUES
	    ('$vlu','','','')";
	mysqli_query($conn,$query);
	$room = ((($vlu)*450505)+10)/5;
	header("Location: https://moskhar.my.id/projectGame/catur/" . $warna . ".php?room=$room");
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Catur</title>
</head>
<style type="text/css">
	body{
		background: #273238;
	}
	#koderoom{
		border: none;
		border-bottom: 1px solid deepskyblue;
		background: transparent;
	}
	/*#koderoom:hover{
		border-bottom: 1px solid deepskyblue;
	}*/
	form *{
		position: relative;
		font-size: 18px;
		display: block;
		color: deepskyblue;
		font-family: sans-serif;
		margin-top: 5px;
	}
	label{
		font-weight: bold;
	}
	#submit{
		margin-top: 10px;
		height: 35px;
		width: 90px;
		border-radius: 5px;
		background: linear-gradient(to right bottom, deepskyblue,pink);
		font-weight: bold;
		color: #273238;
		border: none;
	}
	#submit:hover{
	    background: orange;
	}
	#buat{
		position: absolute;
		left: 0;
		top: 0;
		width: 100vw;
		height: 0vh;
		background: #273238;
		background: white;
		overflow: hidden;
	}
	@KeyFrames buka{
	    0%{height: 0vh;}
	    100%{height: 100vh;}
	}
</style>
<body>
	<center>
		<form method="POST" action="">
			<label for="warna1" style="margin-top:100px;"><input type="radio" name="warna" id="warna1" value="putih" style="display: inline;" required>Putih</label>
			<label for="warna2"><input type="radio" name="warna" id="warna2" value="hitam" style="display: inline;">Hitam</label>
			<label for="koderoom" style="margin-top:40px;">Kode room</label>
			<input type="number" name="koderoom" id="koderoom" required>
			<input type="submit" name="oldroom" id="submit" value="Masuk">
		</form>
		<button id="submit" style="margin-top: 250px;width: 200px;font-size: 16px;" onClick="buka();">Buat room BARU</button>
		<div id="buat">
			<center><form method="POST" action="">
			<label for="warna1" style="margin-top:100px;"><input type="radio" name="warna" id="warna1" value="putih" style="display: inline;" required>Putih</label>
			<label for="warna2"><input type="radio" name="warna" id="warna2" value="hitam" style="display: inline;">Hitam</label>
			<input type="submit" name="newroom" id="submit" value="Buat">
		</form>
		<button id="submit" style="margin-top: 250px;width: 200px;font-size: 16px;" onClick="buka();">Sudah punya ROOM</button>
		</center></div>
	</center>
</body>
<script>
    var penanda=0;
    function buka(){
        if (penanda==0){
            document.getElementById('buat').style.animation = 'buka 2s forwards';
            penanda=1;
        }else{
            document.getElementById('buat').style.animation = 'none';
            penanda=0;
        }
    }
</script>
</html>