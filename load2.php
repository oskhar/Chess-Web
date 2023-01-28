<?php 
$room = $_POST['room'];
$conn2 = mysqli_connect("localhost", "moskharm_user", "g8N7a6O5d4S3e2T1", "moskharm_game");
$result2 = mysqli_query($conn2, "SELECT hitam FROM catur WHERE no='$room'");
?>
<?php $dataCatur = mysqli_fetch_assoc($result2) ?>
<?php $arrIsi = explode(",",$dataCatur['hitam']) ?>
<?php echo("$arrIsi[0],$arrIsi[1],$arrIsi[2],$arrIsi[3]")?>
