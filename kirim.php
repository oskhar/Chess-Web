<?php 
$conn = mysqli_connect("localhost", "moskharm_user", "g8N7a6O5d4S3e2T1", "moskharm_game");

$room = $_POST['room'];
$result1 = mysqli_query($conn, "SELECT komponen FROM catur WHERE no='$room'");
$komponen = mysqli_fetch_assoc($result1);
$komponen = $komponen['komponen'];

$clickX = $_POST['clickX'];
$clickY = $_POST['clickY'];
$clickNo = $_POST['clickNo'];
$nama = $_POST['nama'];
$type = $_POST['type'];
$putih = "$clickX,$clickY,$clickNo,$nama";

if ($type == "putih") {
	$query = "UPDATE catur
			SET hitam='$putih', komponen='$putih;$komponen'
			WHERE no = '$room'";
}else if ($type == "hitam"){
	$query = "UPDATE catur
			SET putih='$putih', komponen='$putih;$komponen'
			WHERE no = '$room'";
}

mysqli_query($conn,$query);
?>
<!-- "bidakHitam[$clickNo].y=$clickY; bidakHitam[$clickNo].x=$clickX; bidakHitam[$clickNo].id.style.top=' {$clickY}px '; bidakHitam[$clickNo].id.style.left=' {$clickX}px ';" -->