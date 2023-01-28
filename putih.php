<!--  By Oskhar  -->

<!--

Bagian bagian: 
	- Mewarnai papan catur hitam putih
	- setup Object Pion {

		construktor untuk mengatur parameter class
		aksi pada tombol

	}
	- setup Object Benteng
	- setup Object Kuda
	- setup Object Gajah
	- setup Object Raja
	- setup Object Ratu
	- Menentukan jarak x dan mendeklarasikan object
	- Melakukan realtime load
 
 -->
<!-- 

Next tugas >>> Masukan pengkondisian dengan data ini
0 - 560
80 - 480
160 - 400
240 - 320

 -->


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		Game catur Online
	</title>

</head>

<style type="text/css">
	body{
		background: #293336;
	}
	#backnya{
		width: 100vw;
		height: 100vh;
		position: absolute;
		left: 0;
		top: 0;
		overflow: hidden;
	}
	#info{
		font-family: sans-serif;
		position: absolute;
		top: 30px;
		left: 30px;
		width: 40vw;
		color: white;
		display: inline;
		font-size: 4vmin;
		line-height: 4vmin;
	}
	#papanCatur{
		position: absolute;
		width: 640px;
		height: 640px;
		background: #293336;
		top: 0;
		right: 50px;
		display: flex;
		flex-wrap: wrap;
		border: 6px solid rgb(30, 30, 30);
		border-radius: 3px;
		overflow: hidden;
	}
	@media (max-width: 1250px){
		#papanCatur{
			top: 300px;
			left: 0;
			right: 0;
			margin: auto;
		}
		#info{
			width: 80vh;
		}
	}
	#papanCatur .posisi{
		width: 80px;
		height: 80px;
	}
	.bidakCatur{
		width: 80px;
		text-align: center;
		font-size: 70px;
		height: 80px;
		line-height: 80px;
		position: absolute;
	}

	#pionPutih0, #pionPutih1, #pionPutih2, #pionPutih3, #pionPutih4, #pionPutih5, #pionPutih6, #pionPutih7
	{
		position: absolute;
		color: white;
		top: 480px;
		text-shadow: 0 0 10px black;
	}

	#pionHitam0, #pionHitam1, #pionHitam2, #pionHitam3, #pionHitam4, #pionHitam5, #pionHitam6, #pionHitam7
	{
		position: absolute;
		color: black;
		top: 80px;
		text-shadow: 0 0 10px white;
	}
	#bentengPutih0,#bentengPutih7,#kudaPutih1,#kudaPutih6,#gajahPutih2,#gajahPutih5,#rajaPutih3,#rajaPutih4
	{
		position: absolute;
		color: white;
		top: 560px;
		text-shadow: 0 0 10px black;
	}

	#bentengHitam0,#bentengHitam7,#kudaHitam1,#kudaHitam6,#gajahHitam2,#gajahHitam5,#rajaHitam3,#rajaHitam4
	{
		position: absolute;
		color: black;
		top: 0px;
		text-shadow: 0 0 10px white;
	}


	@KeyFrames opt{
		0%{opacity: 0;}
		100%{opacity: 1;}
	}

	#isiTujuan{
		position: absolute;
		background: rgba(0, 191, 255, 0.4);
		width: 60px;height: 60px;border: 10px solid deepskyblue;
	}
	@media (max-width: 1250px){
		.bidakCatur{
			font-size: 60px;
		}
	}
</style>

<body>
	<div id="backnya">
		<div id="info">
			<p style="display: block;" id="kodeRoom">Kode room:</p>
			<p style="display: block;font-weight: bold;color: white;" id="giliranJalan">PUTIH</p>
		</div>
		<div id="papanCatur">
			<div id="tujuan" style="z-index: 10;">
			</div>
			<?php for ($i=0; $i < 64; $i++) : ?>
				<div class="posisi" id="posisi<?php echo($i) ?>"></div>
			<?php endfor; ?>

			<?php for ($i=0; $i < 8; $i++): ?>
				<div class="bidakCatur" onclick="if(banyakJalan == 0){pionPutih[<?php echo $i ?>].onClickPion();}" id="pionPutih<?php echo $i ?>">&#9817</div>

				<div class="bidakCatur" id="pionHitam<?php echo $i ?>">&#9823</div>
			<?php endfor; ?>


			<div class="bidakCatur" id="bentengPutih0" onclick="if(banyakJalan == 0){bidakPutih[0].onClickBidak();}">&#9814</div>
			<div class="bidakCatur" id="bentengPutih7" onclick="if(banyakJalan == 0){bidakPutih[7].onClickBidak();}">&#9814</div>
			<div class="bidakCatur" id="kudaPutih1"  onclick="if(banyakJalan == 0){bidakPutih[1].onClickBidak();}">&#9816</div>
			<div class="bidakCatur" id="kudaPutih6"  onclick="if(banyakJalan == 0){bidakPutih[6].onClickBidak();}">&#9816</div>
			<div class="bidakCatur" id="gajahPutih2"  onclick="if(banyakJalan == 0){bidakPutih[2].onClickBidak();}">&#9815</div>
			<div class="bidakCatur" id="gajahPutih5"  onclick="if(banyakJalan == 0){bidakPutih[5].onClickBidak();}">&#9815</div>
			<div class="bidakCatur" id="rajaPutih3"  onclick="if(banyakJalan == 0){bidakPutih[3].onClickBidak();}">&#9813</div>
			<div class="bidakCatur" id="rajaPutih4"  onclick="if(banyakJalan == 0){bidakPutih[4].onClickBidak();}">&#9812</div>

			<div class="bidakCatur" id="bentengHitam0">&#9820</div>
			<div class="bidakCatur" id="bentengHitam7">&#9820</div>
			<div class="bidakCatur" id="kudaHitam1">&#9822</div>
			<div class="bidakCatur" id="kudaHitam6">&#9822</div>
			<div class="bidakCatur" id="gajahHitam2">&#9821</div>
			<div class="bidakCatur" id="gajahHitam5">&#9821</div>
			<div class="bidakCatur" id="rajaHitam4">&#9819</div>
			<div class="bidakCatur" id="rajaHitam3">&#9818</div>
		</div>
		<div id="kumpulanData"></div>
	</div>
</body>

<script type="text/javascript">
var banyakJalan = 0;

<?php
$roomCode = $_GET['room'];
$room = (($roomCode*5)-10)/450505;

$conn = mysqli_connect("localhost", "moskharm_user", "g8N7a6O5d4S3e2T1", "moskharm_game");
$result1 = mysqli_query($conn, "SELECT komponen FROM catur WHERE no='$room'");
$komponen = mysqli_fetch_assoc($result1);
$komponen = $komponen['komponen'];
?>
    window.addEventListener("load", function () {
    	document.getElementById('kodeRoom').innerHTML = 'Kode ROOM: <?php echo $roomCode ?>';
    	var bigData = '<?php echo($komponen) ?>';
    	bigData = bigData.split(';');
    	bigData.pop();
    	for (var g = bigData.length-1; g >= 0; g--) {
	        let data = bigData[g].split(',');
	        let arrAngka1 = ['0','1','2','3','4','5','6','7'];
	        let arrAngka2 = [7,6,5,4,3,2,1,0];
	        let arrAngka5 = [0,1,2,3,4,5,6,7];
	        let arrAngka3 = ['0', '80', '160', '240', '320', '400', '480', '560'];
	        let arrAngka4 = [560, 480, 400, 320, 240, 160, 80, 0];
	        let arrAngka6 = [0, 80, 160, 240, 320, 400, 480, 560];

	        data[2] = arrAngka2[arrAngka1.indexOf(data[2])];
	        data[0] = arrAngka4[arrAngka3.indexOf(data[0])];
	        data[1] = arrAngka4[arrAngka3.indexOf(data[1])];

	        if ( 
	        	data[3] == "bidakHitam" &&
	            bidakHitam[data[2]].x != data[0] &&
	            bidakHitam[data[2]].x != 1000 ||
	            data[3] == "bidakHitam" &&
	            bidakHitam[data[2]].y != data[1] &&
	            bidakHitam[data[2]].x != 1000
	            ) {

	        	banyakJalan = 0;
	            bidakHitam[data[2]].x = data[0];
	            bidakHitam[data[2]].y = data[1];
	            bidakHitam[data[2]].id.style.left = data[0] + "px";
	            bidakHitam[data[2]].id.style.top = data[1] + "px";
				for (var i = 8 - 1; i >= 0; i--) {
					if (
						pionPutih[i].x == bidakHitam[data[2]].x &&
						pionPutih[i].y == bidakHitam[data[2]].y
						){
						pionPutih[i].y = 1000;
						pionPutih[i].x = 1000;
						pionPutih[i].id.parentNode.removeChild(pionPutih[i].id);
					}else if (
						bidakPutih[i].x == bidakHitam[data[2]].x &&
						bidakPutih[i].y == bidakHitam[data[2]].y
						){
						bidakPutih[i].y = 1000;
						bidakPutih[i].x = 1000;
						bidakPutih[i].id.parentNode.removeChild(bidakPutih[i].id);
					}
				}
	        }else if ( 
	        	data[3] == "pionHitam" &&
	            pionHitam[data[2]].x != data[0] &&
	            pionHitam[data[2]].x != 1000 ||
	        	data[3] == "pionHitam" &&
	            pionHitam[data[2]].y != data[1] &&
	            pionHitam[data[2]].x != 1000
	            ) {

	        	banyakJalan = 0;
	            pionHitam[data[2]].x = data[0];
	            pionHitam[data[2]].y = data[1];
	            pionHitam[data[2]].id.style.left = data[0] + "px";
	            pionHitam[data[2]].id.style.top = data[1] + "px";
				for (var i = 8 - 1; i >= 0; i--) {
					if (
						pionPutih[i].x == pionHitam[data[2]].x &&
						pionPutih[i].y == pionHitam[data[2]].y
						){
						pionPutih[i].y = 1000;
						pionPutih[i].x = 1000;
						pionPutih[i].id.parentNode.removeChild(pionPutih[i].id);
					}else if (
						bidakPutih[i].x == pionHitam[data[2]].x &&
						bidakPutih[i].y == pionHitam[data[2]].y
						){
						bidakPutih[i].y = 1000;
						bidakPutih[i].x = 1000;
						bidakPutih[i].id.parentNode.removeChild(bidakPutih[i].id);
					}
				}
	        }
	        
			data = bigData[g].split(',');
	        data[2] = arrAngka5[arrAngka1.indexOf(data[2])];
	        data[0] = arrAngka6[arrAngka3.indexOf(data[0])];
	        data[1] = arrAngka6[arrAngka3.indexOf(data[1])];

	        if ( 
	        	data[3] == "bidakPutih" &&
	            bidakPutih[data[2]].x != data[0] &&
	            bidakPutih[data[2]].x != 1000 ||
	            data[3] == "bidakPutih" &&
	            bidakPutih[data[2]].y != data[1] &&
	            bidakPutih[data[2]].x != 1000
	            ) {

	        	banyakJalan = 1;
	            bidakPutih[data[2]].x = data[0];
	            bidakPutih[data[2]].y = data[1];
	            bidakPutih[data[2]].id.style.left = data[0] + "px";
	            bidakPutih[data[2]].id.style.top = data[1] + "px";
				for (var i = 8 - 1; i >= 0; i--) {
					if (
						pionHitam[i].x == bidakPutih[data[2]].x &&
						pionHitam[i].y == bidakPutih[data[2]].y
						){
						pionHitam[i].y = 1000;
						pionHitam[i].x = 1000;
						pionHitam[i].id.parentNode.removeChild(pionHitam[i].id);
					}else if (
						bidakHitam[i].x == bidakPutih[data[2]].x &&
						bidakHitam[i].y == bidakPutih[data[2]].y
						){
						bidakHitam[i].y = 1000;
						bidakHitam[i].x = 1000;
						bidakHitam[i].id.parentNode.removeChild(bidakHitam[i].id);
					}
				}
	        }else if ( 
	        	data[3] == "pionPutih" &&
	            pionPutih[data[2]].x != data[0] &&
	            pionPutih[data[2]].x != 1000 ||
	        	data[3] == "pionPutih" &&
	            pionPutih[data[2]].y != data[1] &&
	            pionPutih[data[2]].x != 1000
	            ) {

	        	banyakJalan = 1;
	            pionPutih[data[2]].x = data[0];
	            pionPutih[data[2]].y = data[1];
	            pionPutih[data[2]].id.style.left = data[0] + "px";
	            pionPutih[data[2]].id.style.top = data[1] + "px";
				for (var i = 8 - 1; i >= 0; i--) {
					if (
						pionHitam[i].x == pionPutih[data[2]].x &&
						pionHitam[i].y == pionPutih[data[2]].y
						){
						pionHitam[i].y = 1000;
						pionHitam[i].x = 1000;
						pionHitam[i].id.parentNode.removeChild(pionHitam[i].id);
					}else if (
						bidakHitam[i].x == pionPutih[data[2]].x &&
						bidakHitam[i].y == pionPutih[data[2]].y
						){
						bidakHitam[i].y = 1000;
						bidakHitam[i].x = 1000;
						bidakHitam[i].id.parentNode.removeChild(bidakHitam[i].id);
					}
				}
	        }
	    }
        
    });
	//	Catatan: Mewarnai papan catur hitam putih
	var pin = 0;
	for (var i = 64 - 1; i >= 0; i--) {
		if (pin == 0) {
			document.getElementById('posisi'+i).style.background = "lightblue";
			pin = 1;
		}else{
			pin = 0;
		}
		if (
			i/8 == 1 ||
			i/8 == 3 ||
			i/8 == 5 || 
			i/8 == 7
			) {
			pin = 1;
		}else if (
			i/8 == 2 ||
			i/8 == 4 ||
			i/8 == 6 || 
			i/8 == 8
			) {
			pin = 0;
		}
	}


	//	Catatan: setup Object Pion
	class Pion {
		constructor(id,nomor,warna,posisiX) {
			this.id = id;
			this.nomor = nomor;
			this.warna = warna;
			this.x = posisiX;
			this.y = 80;
			this.jalan = 0;
			if (warna) {
				this.y = 480;
			}
		}

		onClickPion() {
			this.isiHtml = '';
			this.pin = true;
			this.pin2 = true;
			for (var i = 8 - 1; i >= 0; i--) {
				pionPutih[i].hide();
				bidakPutih[i].hide();

				if ( pionHitam[i].x == (this.x - 80) && pionHitam[i].y == (this.y - 80) || bidakHitam[i].x == (this.x - 80) && bidakHitam[i].y == (this.y - 80) ){
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x - 80)+'px;top: '+(this.y - 80)+'px;" onclick="pionPutih['+this.nomor+'].movePion(80,-80);"></div>';
				}
				if ( pionHitam[i].x == (this.x + 80) && pionHitam[i].y == (this.y-80) || bidakHitam[i].x == (this.x + 80) && bidakHitam[i].y == (this.y-80) ){
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x + 80)+'px;top: '+(this.y-80)+'px;" onclick="pionPutih['+this.nomor+'].movePion(80,80);"></div>';
				}
				if ( pionHitam[i].x == this.x && pionHitam[i].y == (this.y-80) || bidakHitam[i].x == this.x && bidakHitam[i].y == (this.y-80) ) {
					this.pin = false;
				}else if ( pionPutih[i].x == this.x && pionPutih[i].y == (this.y-80) || bidakPutih[i].x == this.x && bidakPutih[i].y == (this.y-80) ) {
					this.pin = false;
				}
				if ( pionHitam[i].x == this.x && pionHitam[i].y == (this.y-160) || bidakHitam[i].x == this.x && bidakHitam[i].y == (this.y-160) ) {
					this.pin2 = false;
				}else if ( pionPutih[i].x == this.x && pionPutih[i].y == (this.y-160) || bidakPutih[i].x == this.x && bidakPutih[i].y == (this.y-160) ) {	
					this.pin2 = false;
				}
			}

			this.id.style.background = "deepskyblue";
			this.id.style.zIndex = "9";
			if ( this.jalan == 1 && this.pin || this.pin && this.pin2 == false ) {
				this.isiHtml += '<div id="isiTujuan" style="left: '+this.x+'px;top: '+(this.y-80)+'px;" onclick="pionPutih['+this.nomor+'].movePion(80,0);"></div>';
			}else if ( this.pin && this.pin2){
				this.isiHtml += '<div id="isiTujuan" style="left: '+this.x+'px;top: '+(this.y-80)+'px;" onclick="pionPutih['+this.nomor+'].movePion(80,0);"></div><div id="isiTujuan" style="left: '+this.x+'px;top: '+(this.y-160)+'px;" onclick="pionPutih['+this.nomor+'].movePion(160,0);"></div>';
			}
			// alert(document.getElementById("tujuan").innerHTML);
			document.getElementById('tujuan').innerHTML = this.isiHtml;
		}

		movePion(top,left) {
			this.y = this.y - top;
			this.x = this.x + left;
			this.jalan = 1;
			for (var i = 8 - 1; i >= 0; i--) {
				if (pionHitam[i].x == this.x && pionHitam[i].y == this.y){
					pionHitam[i].y = 1000;
					pionHitam[i].x = 1000;
					pionHitam[i].id.parentNode.removeChild(pionHitam[i].id);
				}else if (bidakHitam[i].x == this.x && bidakHitam[i].y == this.y){
					bidakHitam[i].y = 1000;
					bidakHitam[i].x = 1000;
					bidakHitam[i].id.parentNode.removeChild(bidakHitam[i].id);
				}
			}
			this.id.style.top = this.y + "px";
			this.id.style.left = this.x + "px";
			this.hide();
			banyakJalan = 1;

		    this.xhr = new XMLHttpRequest();
		    this.param = "clickY="+ this.y + "&clickX=" + this.x + "&clickNo=" + this.nomor + "&nama=pionPutih&type=putih&room=<?php echo $room ?>";
		    this.xhr.open('POST','kirim.php',true);
		    this.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    this.xhr.send(this.param);

			if (this.y == 0) {
				this.id.innerHTML = "&#9813";
				// this = Raja(this.id, this.nomor, false, this.x);

			}
		}
	}


	//	Catatan: setup Object Benteng
	class Benteng {
		constructor(id,nomor,warna,posisiX) {
			this.id = id;
			this.nomor = nomor;
			this.warna = warna;
			this.x = posisiX;
			this.y = 0;
			this.first = 0;
			if (warna) {
				this.y = 560;
			}
		}

		onClickBidak() {
			this.isiHtml = '';
			this.tujuanAtas = 8;
			this.tujuanBawah = 8;
			this.tujuanKiri = 8;
			this.tujuanKanan = 8;
			for (var i = 0; i < 8; i++) {
				for (var z = 0; z < 8; z++) {
					if (
						pionPutih[z].y == this.y-(80*(i+1)) &&
						pionPutih[z].x == this.x &&
						this.tujuanAtas == 8 ||
						bidakPutih[z].y == this.y-(80*(i+1)) &&
						bidakPutih[z].x == this.x &&
						this.tujuanAtas == 8
					) {this.tujuanAtas = i-1;}

					if (
						pionPutih[z].y == this.y+(80*(i+1)) &&
						pionPutih[z].x == this.x &&
						this.tujuanBawah == 8 ||
						bidakPutih[z].y == this.y+(80*(i+1)) &&
						bidakPutih[z].x == this.x &&
						this.tujuanBawah == 8
					) {this.tujuanBawah = i-1;}

					if (
						pionPutih[z].x == this.x+(80*(i+1)) &&
						pionPutih[z].y == this.y &&
						this.tujuanKanan == 8 ||
						bidakPutih[z].x == this.x+(80*(i+1)) &&
						bidakPutih[z].y == this.y &&
						this.tujuanKanan == 8
					) {this.tujuanKanan = i-1;}

					if (
						pionPutih[z].x == this.x-(80*(i+1)) &&
						pionPutih[z].y == this.y && 
						this.tujuanKiri == 8 ||
						bidakPutih[z].x == this.x-(80*(i+1)) &&
						bidakPutih[z].y == this.y && 
						this.tujuanKiri == 8
					) {this.tujuanKiri = i-1;}
				}
				for (var z = 0; z < 8; z++) {
					if (
						pionHitam[z].y == this.y-(80*(i+1)) &&
						pionHitam[z].x == this.x &&
						this.tujuanAtas == 8 ||
						bidakHitam[z].y == this.y-(80*(i+1)) &&
						bidakHitam[z].x == this.x &&
						this.tujuanAtas == 8
					) {this.tujuanAtas = i;}

					if (
						pionHitam[z].y == this.y+(80*(i+1)) &&
						pionHitam[z].x == this.x &&
						this.tujuanBawah == 8 ||
						bidakHitam[z].y == this.y+(80*(i+1)) &&
						bidakHitam[z].x == this.x &&
						this.tujuanBawah == 8
					) {this.tujuanBawah = i;}

					if (
						pionHitam[z].x == this.x+(80*(i+1)) &&
						pionHitam[z].y == this.y &&
						this.tujuanKanan == 8 ||
						bidakHitam[z].x == this.x+(80*(i+1)) &&
						bidakHitam[z].y == this.y &&
						this.tujuanKanan == 8
					) {this.tujuanKanan = i;}

					if (
						pionHitam[z].x == this.x-(80*(i+1)) &&
						pionHitam[z].y == this.y && 
						this.tujuanKiri == 8 ||
						bidakHitam[z].x == this.x-(80*(i+1)) &&
						bidakHitam[z].y == this.y && 
						this.tujuanKiri == 8
					) {this.tujuanKiri = i;}
				}
			}
			// alert(this.tujuanKanan);
			for (var i = 0; i < 8; i++) {
				pionPutih[i].hide();
				bidakPutih[i].hide();
				if ( 
					this.y-(80*(i+1)) >= 0 &&
					this.tujuanAtas >= 0
				) {
					this.tujuanAtas -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+this.x+'px;top: '+(this.y-(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-(80*(i+1))))+',0);"></div>';
				}
				
				if ( 
					this.y+(80*(i+1)) <= 640 &&
					this.tujuanBawah >= 0
				) {
					this.tujuanBawah -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+this.x+'px;top: '+(this.y+(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-(80*(i+1))))+',0);"></div>';
				}
				
				if ( 
					this.x+(80*(i+1)) <= 640 &&
					this.tujuanKanan >= 0
				) {
					this.tujuanKanan -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x+(80*(i+1)))+'px;top: '+this.y+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(0,'+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
				if ( 
					this.x-(80*(i+1)) >= 0 &&
					this.tujuanKiri >= 0
				) {
					this.tujuanKiri -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x-(80*(i+1)))+'px;top: '+this.y+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(0,-'+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
			}
			this.id.style.background = "deepskyblue";
			this.id.style.zIndex = "9";
			document.getElementById('tujuan').innerHTML = this.isiHtml;
		}

		moveBidak(top,left) {
			this.y = this.y - top;
			this.x = this.x + left;
			this.first = 1;
			for (var i = 8 - 1; i >= 0; i--) {
				if (pionHitam[i].x == this.x && pionHitam[i].y == this.y){
					pionHitam[i].y = 1000;
					pionHitam[i].x = 1000;
					pionHitam[i].id.parentNode.removeChild(pionHitam[i].id);
				}else if (bidakHitam[i].x == this.x && bidakHitam[i].y == this.y){
					bidakHitam[i].y = 1000;
					bidakHitam[i].x = 1000;
					bidakHitam[i].id.parentNode.removeChild(bidakHitam[i].id);
				}
			}
			this.id.style.top = this.y + "px";
			this.id.style.left = this.x + "px";
			this.hide();
			banyakJalan = 1;

		    this.xhr = new XMLHttpRequest();
		    this.param = "clickY="+ this.y + "&clickX=" + this.x + "&clickNo=" + this.nomor + "&nama=bidakPutih&type=putih&room=<?php echo $room ?>";
		    this.xhr.open('POST','kirim.php',true);
		    this.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    this.xhr.send(this.param);
		}
	}


	//	Catatan: setup Object Kuda
	class Kuda {
		constructor(id,nomor,warna,posisiX) {
			this.id = id;
			this.nomor = nomor;
			this.warna = warna;
			this.x = posisiX;
			this.y = 0;
			if (warna) {
				this.y = 560;
			}
		}

		onClickBidak() {
			this.isiHtml = '';
			this.jalan = [true, true, true, true, true, true, true, true];
			for (var i = 8 - 1; i >= 0; i--) {
				pionPutih[i].hide();
				bidakPutih[i].hide();
				if (pionPutih[i].x == (this.x+80) && pionPutih[i].y == (this.y-160) || bidakPutih[i].x == (this.x+80) && bidakPutih[i].y == (this.y-160)) {this.jalan[0] = false;}
				if (pionPutih[i].x == (this.x-80) && pionPutih[i].y == (this.y-160) || bidakPutih[i].x == (this.x-80) && bidakPutih[i].y == (this.y-160)) {this.jalan[1] = false;}
				if (pionPutih[i].x == (this.x+80) && pionPutih[i].y == (this.y+160) || bidakPutih[i].x == (this.x+80) && bidakPutih[i].y == (this.y+160)) {this.jalan[2] = false;}
				if (pionPutih[i].x == (this.x-80) && pionPutih[i].y == (this.y+160) || bidakPutih[i].x == (this.x-80) && bidakPutih[i].y == (this.y+160)) {this.jalan[3] = false;}
				if (pionPutih[i].x == (this.x+160) && pionPutih[i].y == (this.y-80) || bidakPutih[i].x == (this.x+160) && bidakPutih[i].y == (this.y-80)) {this.jalan[4] = false;}
				if (pionPutih[i].x == (this.x-160) && pionPutih[i].y == (this.y-80) || bidakPutih[i].x == (this.x-160) && bidakPutih[i].y == (this.y-80)) {this.jalan[5] = false;}
				if (pionPutih[i].x == (this.x+160) && pionPutih[i].y == (this.y+80) || bidakPutih[i].x == (this.x+160) && bidakPutih[i].y == (this.y+80)) {this.jalan[6] = false;}
				if (pionPutih[i].x == (this.x-160) && pionPutih[i].y == (this.y+80) || bidakPutih[i].x == (this.x-160) && bidakPutih[i].y == (this.y+80)) {this.jalan[7] = false;}
			}
			this.arrIsiHtml = ['<div id="isiTujuan" style="left: '+(this.x+80)+'px;top: '+(this.y-160)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-160))+','+(this.x-(this.x-80))+');"></div>', '<div id="isiTujuan" style="left: '+(this.x-80)+'px;top: '+(this.y-160)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-160))+','+(this.x-(this.x+80))+');"></div>', '<div id="isiTujuan" style="left: '+(this.x+80)+'px;top: '+(this.y+160)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-160))+','+(this.x-(this.x-80))+');"></div>', '<div id="isiTujuan" style="left: '+(this.x-80)+'px;top: '+(this.y+160)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-160))+','+(this.x-(this.x+80))+');"></div>', '<div id="isiTujuan" style="left: '+(this.x+160)+'px;top: '+(this.y-80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-80))+','+(this.x-(this.x-160))+');"></div>', '<div id="isiTujuan" style="left: '+(this.x-160)+'px;top: '+(this.y-80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-80))+','+(this.x-(this.x+160))+');"></div>', '<div id="isiTujuan" style="left: '+(this.x+160)+'px;top: '+(this.y+80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-80))+','+(this.x-(this.x-160))+');"></div>', '<div id="isiTujuan" style="left: '+(this.x-160)+'px;top: '+(this.y+80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-80))+','+(this.x-(this.x+160))+');"></div>'];
			for (var i = 0; i <= 7; i++) {
				if (this.jalan[i]) {
					this.isiHtml += this.arrIsiHtml[i];
				}
			}		

			this.id.style.background = "deepskyblue";
			this.id.style.zIndex = "9";
			document.getElementById('tujuan').innerHTML = this.isiHtml;
		}

		moveBidak(top,left) {
			this.y = this.y - top;
			this.x = this.x + left;
			this.bidakHilang = 0;
			for (var i = 8 - 1; i >= 0; i--) {
				if (pionHitam[i].x == this.x && pionHitam[i].y == this.y){
					pionHitam[i].y = 1000;
					pionHitam[i].x = 1000;
					pionHitam[i].id.parentNode.removeChild(pionHitam[i].id);
				}else if (bidakHitam[i].x == this.x && bidakHitam[i].y == this.y){
					bidakHitam[i].y = 1000;
					bidakHitam[i].x = 1000;
					bidakHitam[i].id.parentNode.removeChild(bidakHitam[i].id);
				}
			}
			this.id.style.top = this.y + "px";
			this.id.style.left = this.x + "px";
			this.hide();
			banyakJalan = 1;

		    this.xhr = new XMLHttpRequest();
		    this.param = "clickY="+ this.y + "&clickX=" + this.x + "&clickNo=" + this.nomor + "&nama=bidakPutih&type=putih&room=<?php echo $room ?>";
		    this.xhr.open('POST','kirim.php',true);
		    this.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    this.xhr.send(this.param);
		}
	}


	//	Catatan: setup Object Gajah
	class Gajah {
		constructor(id,nomor,warna,posisiX) {
			this.id = id;
			this.nomor = nomor;
			this.warna = warna;
			this.x = posisiX;
			this.y = 0;
			this.jalan = 0;
			if (warna) {
				this.y = 560;
			}
		}

		onClickBidak() {
			this.isiHtml = '';
			this.tujuanKananAtas = 8;
			this.tujuanKananBawah = 8;
			this.tujuanKiriAtas = 8;
			this.tujuanKiriBawah = 8;
			for (var i = 0; i < 8; i++) {
				for (var z = 0; z < 8; z++) {
					if (
						pionPutih[z].y == this.y-(80*(i+1)) &&
						pionPutih[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananAtas == 8 ||
						bidakPutih[z].y == this.y-(80*(i+1)) &&
						bidakPutih[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananAtas == 8
					) {this.tujuanKananAtas = i-1;}

					if (
						pionPutih[z].y == this.y+(80*(i+1)) &&
						pionPutih[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananBawah == 8 ||
						bidakPutih[z].y == this.y+(80*(i+1)) &&
						bidakPutih[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananBawah == 8
					) {this.tujuanKananBawah = i-1;}

					if (
						pionPutih[z].x == this.x-(80*(i+1)) &&
						pionPutih[z].y == this.y+(80*(i+1)) &&
						this.tujuanKiriBawah == 8 ||
						bidakPutih[z].x == this.x-(80*(i+1)) &&
						bidakPutih[z].y == this.y+(80*(i+1)) &&
						this.tujuanKiriBawah == 8
					) {this.tujuanKiriBawah = i-1;}

					if (
						pionPutih[z].x == this.x-(80*(i+1)) &&
						pionPutih[z].y == this.y-(80*(i+1)) && 
						this.tujuanKiriAtas == 8 ||
						bidakPutih[z].x == this.x-(80*(i+1)) &&
						bidakPutih[z].y == this.y-(80*(i+1)) && 
						this.tujuanKiriAtas == 8
					) {this.tujuanKiriAtas = i-1;}
				}
				for (var z = 0; z < 8; z++) {
					if (
						pionHitam[z].y == this.y-(80*(i+1)) &&
						pionHitam[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananAtas == 8 ||
						bidakHitam[z].y == this.y-(80*(i+1)) &&
						bidakHitam[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananAtas == 8
					) {this.tujuanKananAtas = i;}

					if (
						pionHitam[z].y == this.y+(80*(i+1)) &&
						pionHitam[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananBawah == 8 ||
						bidakHitam[z].y == this.y+(80*(i+1)) &&
						bidakHitam[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananBawah == 8
					) {this.tujuanKananBawah = i;}

					if (
						pionHitam[z].x == this.x-(80*(i+1)) &&
						pionHitam[z].y == this.y+(80*(i+1)) &&
						this.tujuanKiriBawah == 8 ||
						bidakHitam[z].x == this.x-(80*(i+1)) &&
						bidakHitam[z].y == this.y+(80*(i+1)) &&
						this.tujuanKiriBawah == 8
					) {this.tujuanKiriBawah = i;}

					if (
						pionHitam[z].x == this.x-(80*(i+1)) &&
						pionHitam[z].y == this.y-(80*(i+1)) && 
						this.tujuanKiriAtas == 8 ||
						bidakHitam[z].x == this.x-(80*(i+1)) &&
						bidakHitam[z].y == this.y-(80*(i+1)) && 
						this.tujuanKiriAtas == 8
					) {this.tujuanKiriAtas = i;}
				}
			}
			// alert(this.tujuanKanan);
			for (var i = 0; i < 8; i++) {
				pionPutih[i].hide();
				bidakPutih[i].hide();
				if ( 
					this.y-(80*(i+1)) >= 0 &&
					this.x+(80*(i+1)) <= 640 &&
					this.tujuanKananAtas >= 0
				) {
					this.tujuanKananAtas -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x+(80*(i+1)))+'px;top: '+(this.y-(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-(80*(i+1))))+','+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
				if ( 
					this.y+(80*(i+1)) <= 640 &&
					this.x+(80*(i+1)) <= 640 &&
					this.tujuanKananBawah >= 0
				) {
					this.tujuanKananBawah -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x+(80*(i+1)))+'px;top: '+(this.y+(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-(80*(i+1))))+','+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
				if ( 
					this.y+(80*(i+1)) <= 640 &&
					this.x-(80*(i+1)) >= 0 &&
					this.tujuanKiriBawah >= 0
				) {
					this.tujuanKiriBawah -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x-(80*(i+1)))+'px;top: '+(this.y+(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-(80*(i+1))))+',-'+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
				if ( 
					this.y-(80*(i+1)) >= 0 &&
					this.x-(80*(i+1)) >= 0 &&
					this.tujuanKiriAtas >= 0
				) {
					this.tujuanKiriAtas -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x-(80*(i+1)))+'px;top: '+(this.y-(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-(80*(i+1))))+',-'+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
			}
			this.id.style.background = "deepskyblue";
			this.id.style.zIndex = "9";
			document.getElementById('tujuan').innerHTML = this.isiHtml;
		}

		moveBidak(top,left) {
			this.y = this.y - top;
			this.x = this.x + left;
			for (var i = 8 - 1; i >= 0; i--) {
				if (pionHitam[i].x == this.x && pionHitam[i].y == this.y){
					pionHitam[i].y = 1000;
					pionHitam[i].x = 1000;
					pionHitam[i].id.parentNode.removeChild(pionHitam[i].id);
				}else if (bidakHitam[i].x == this.x && bidakHitam[i].y == this.y){
					bidakHitam[i].y = 1000;
					bidakHitam[i].x = 1000;
					bidakHitam[i].id.parentNode.removeChild(bidakHitam[i].id);
				}
			}
			this.id.style.top = this.y + "px";
			this.id.style.left = this.x + "px";
			this.hide();
			banyakJalan = 1;

		    this.xhr = new XMLHttpRequest();
		    this.param = "clickY="+ this.y + "&clickX=" + this.x + "&clickNo=" + this.nomor + "&nama=bidakPutih&type=putih&room=<?php echo $room ?>";
		    this.xhr.open('POST','kirim.php',true);
		    this.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    this.xhr.send(this.param);
		}
	}


	//	Catatan: setup Object Raja
	class Raja {
		constructor(id,nomor,warna,posisiX) {
			this.id = id;
			this.nomor = nomor;
			this.warna = warna;
			this.x = posisiX;
			this.y = 0;
			if (warna) {
				this.y = 560;
			}
		}

		onClickBidak() {
			this.isiHtml = '';
			this.tujuanAtas = 8;
			this.tujuanBawah = 8;
			this.tujuanKiri = 8;
			this.tujuanKanan = 8;
			for (var i = 0; i < 8; i++) {
				for (var z = 0; z < 8; z++) {
					if (
						pionPutih[z].y == this.y-(80*(i+1)) &&
						pionPutih[z].x == this.x &&
						this.tujuanAtas == 8 ||
						bidakPutih[z].y == this.y-(80*(i+1)) &&
						bidakPutih[z].x == this.x &&
						this.tujuanAtas == 8
					) {this.tujuanAtas = i-1;}

					if (
						pionPutih[z].y == this.y+(80*(i+1)) &&
						pionPutih[z].x == this.x &&
						this.tujuanBawah == 8 ||
						bidakPutih[z].y == this.y+(80*(i+1)) &&
						bidakPutih[z].x == this.x &&
						this.tujuanBawah == 8
					) {this.tujuanBawah = i-1;}

					if (
						pionPutih[z].x == this.x+(80*(i+1)) &&
						pionPutih[z].y == this.y &&
						this.tujuanKanan == 8 ||
						bidakPutih[z].x == this.x+(80*(i+1)) &&
						bidakPutih[z].y == this.y &&
						this.tujuanKanan == 8
					) {this.tujuanKanan = i-1;}

					if (
						pionPutih[z].x == this.x-(80*(i+1)) &&
						pionPutih[z].y == this.y && 
						this.tujuanKiri == 8 ||
						bidakPutih[z].x == this.x-(80*(i+1)) &&
						bidakPutih[z].y == this.y && 
						this.tujuanKiri == 8
					) {this.tujuanKiri = i-1;}
				}
				for (var z = 0; z < 8; z++) {
					if (
						pionHitam[z].y == this.y-(80*(i+1)) &&
						pionHitam[z].x == this.x &&
						this.tujuanAtas == 8 ||
						bidakHitam[z].y == this.y-(80*(i+1)) &&
						bidakHitam[z].x == this.x &&
						this.tujuanAtas == 8
					) {this.tujuanAtas = i;}

					if (
						pionHitam[z].y == this.y+(80*(i+1)) &&
						pionHitam[z].x == this.x &&
						this.tujuanBawah == 8 ||
						bidakHitam[z].y == this.y+(80*(i+1)) &&
						bidakHitam[z].x == this.x &&
						this.tujuanBawah == 8
					) {this.tujuanBawah = i;}

					if (
						pionHitam[z].x == this.x+(80*(i+1)) &&
						pionHitam[z].y == this.y &&
						this.tujuanKanan == 8 ||
						bidakHitam[z].x == this.x+(80*(i+1)) &&
						bidakHitam[z].y == this.y &&
						this.tujuanKanan == 8
					) {this.tujuanKanan = i;}

					if (
						pionHitam[z].x == this.x-(80*(i+1)) &&
						pionHitam[z].y == this.y && 
						this.tujuanKiri == 8 ||
						bidakHitam[z].x == this.x-(80*(i+1)) &&
						bidakHitam[z].y == this.y && 
						this.tujuanKiri == 8
					) {this.tujuanKiri = i;}
				}
			}
			// alert(this.tujuanKanan);
			for (var i = 0; i < 8; i++) {
				if ( 
					this.y-(80*(i+1)) >= 0 &&
					this.tujuanAtas >= 0
				) {
					this.tujuanAtas -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+this.x+'px;top: '+(this.y-(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-(80*(i+1))))+',0);"></div>';
				}
				
				if ( 
					this.y+(80*(i+1)) <= 640 &&
					this.tujuanBawah >= 0
				) {
					this.tujuanBawah -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+this.x+'px;top: '+(this.y+(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-(80*(i+1))))+',0);"></div>';
				}
				
				if ( 
					this.x+(80*(i+1)) <= 640 &&
					this.tujuanKanan >= 0
				) {
					this.tujuanKanan -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x+(80*(i+1)))+'px;top: '+this.y+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(0,'+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
				if ( 
					this.x-(80*(i+1)) >= 0 &&
					this.tujuanKiri >= 0
				) {
					this.tujuanKiri -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x-(80*(i+1)))+'px;top: '+this.y+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(0,-'+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
			}
			this.tujuanKananAtas = 8;
			this.tujuanKananBawah = 8;
			this.tujuanKiriAtas = 8;
			this.tujuanKiriBawah = 8;
			for (var i = 0; i < 8; i++) {
				for (var z = 0; z < 8; z++) {
					if (
						pionPutih[z].y == this.y-(80*(i+1)) &&
						pionPutih[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananAtas == 8 ||
						bidakPutih[z].y == this.y-(80*(i+1)) &&
						bidakPutih[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananAtas == 8
					) {this.tujuanKananAtas = i-1;}

					if (
						pionPutih[z].y == this.y+(80*(i+1)) &&
						pionPutih[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananBawah == 8 ||
						bidakPutih[z].y == this.y+(80*(i+1)) &&
						bidakPutih[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananBawah == 8
					) {this.tujuanKananBawah = i-1;}

					if (
						pionPutih[z].x == this.x-(80*(i+1)) &&
						pionPutih[z].y == this.y+(80*(i+1)) &&
						this.tujuanKiriBawah == 8 ||
						bidakPutih[z].x == this.x-(80*(i+1)) &&
						bidakPutih[z].y == this.y+(80*(i+1)) &&
						this.tujuanKiriBawah == 8
					) {this.tujuanKiriBawah = i-1;}

					if (
						pionPutih[z].x == this.x-(80*(i+1)) &&
						pionPutih[z].y == this.y-(80*(i+1)) && 
						this.tujuanKiriAtas == 8 ||
						bidakPutih[z].x == this.x-(80*(i+1)) &&
						bidakPutih[z].y == this.y-(80*(i+1)) && 
						this.tujuanKiriAtas == 8
					) {this.tujuanKiriAtas = i-1;}
				}
				for (var z = 0; z < 8; z++) {
					if (
						pionHitam[z].y == this.y-(80*(i+1)) &&
						pionHitam[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananAtas == 8 ||
						bidakHitam[z].y == this.y-(80*(i+1)) &&
						bidakHitam[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananAtas == 8
					) {this.tujuanKananAtas = i;}

					if (
						pionHitam[z].y == this.y+(80*(i+1)) &&
						pionHitam[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananBawah == 8 ||
						bidakHitam[z].y == this.y+(80*(i+1)) &&
						bidakHitam[z].x == this.x+(80*(i+1)) &&
						this.tujuanKananBawah == 8
					) {this.tujuanKananBawah = i;}

					if (
						pionHitam[z].x == this.x-(80*(i+1)) &&
						pionHitam[z].y == this.y+(80*(i+1)) &&
						this.tujuanKiriBawah == 8 ||
						bidakHitam[z].x == this.x-(80*(i+1)) &&
						bidakHitam[z].y == this.y+(80*(i+1)) &&
						this.tujuanKiriBawah == 8
					) {this.tujuanKiriBawah = i;}

					if (
						pionHitam[z].x == this.x-(80*(i+1)) &&
						pionHitam[z].y == this.y-(80*(i+1)) && 
						this.tujuanKiriAtas == 8 ||
						bidakHitam[z].x == this.x-(80*(i+1)) &&
						bidakHitam[z].y == this.y-(80*(i+1)) && 
						this.tujuanKiriAtas == 8
					) {this.tujuanKiriAtas = i;}
				}
			}
			// alert(this.tujuanKanan);
			for (var i = 0; i < 8; i++) {
				pionPutih[i].hide();
				bidakPutih[i].hide();
				if ( 
					this.y-(80*(i+1)) >= 0 &&
					this.x+(80*(i+1)) <= 640 &&
					this.tujuanKananAtas >= 0
				) {
					this.tujuanKananAtas -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x+(80*(i+1)))+'px;top: '+(this.y-(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-(80*(i+1))))+','+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
				if ( 
					this.y+(80*(i+1)) <= 640 &&
					this.x+(80*(i+1)) <= 640 &&
					this.tujuanKananBawah >= 0
				) {
					this.tujuanKananBawah -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x+(80*(i+1)))+'px;top: '+(this.y+(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-(80*(i+1))))+','+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
				if ( 
					this.y+(80*(i+1)) <= 640 &&
					this.x-(80*(i+1)) >= 0 &&
					this.tujuanKiriBawah >= 0
				) {
					this.tujuanKiriBawah -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x-(80*(i+1)))+'px;top: '+(this.y+(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-'+(this.y-(this.y-(80*(i+1))))+',-'+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
				if ( 
					this.y-(80*(i+1)) >= 0 &&
					this.x-(80*(i+1)) >= 0 &&
					this.tujuanKiriAtas >= 0
				) {
					this.tujuanKiriAtas -= 1;
					this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x-(80*(i+1)))+'px;top: '+(this.y-(80*(i+1)))+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak('+(this.y-(this.y-(80*(i+1))))+',-'+(this.x-(this.x-(80*(i+1))))+');"></div>';
				}
				
			}
			this.id.style.background = "deepskyblue";
			this.id.style.zIndex = "9";
			document.getElementById('tujuan').innerHTML = this.isiHtml;
		}

		moveBidak(top,left) {
			this.y = this.y - top;
			this.x = this.x + left;
			for (var i = 8 - 1; i >= 0; i--) {
				if (pionHitam[i].x == this.x && pionHitam[i].y == this.y){
					pionHitam[i].y = 1000;
					pionHitam[i].x = 1000;
					pionHitam[i].id.parentNode.removeChild(pionHitam[i].id);
				}else if (bidakHitam[i].x == this.x && bidakHitam[i].y == this.y){
					bidakHitam[i].y = 1000;
					bidakHitam[i].x = 1000;
					bidakHitam[i].id.parentNode.removeChild(bidakHitam[i].id);
				}
			}
			this.id.style.top = this.y + "px";
			this.id.style.left = this.x + "px";
			this.hide();
			banyakJalan = 1;

		    this.xhr = new XMLHttpRequest();
		    this.param = "clickY="+ this.y + "&clickX=" + this.x + "&clickNo=" + this.nomor + "&nama=bidakPutih&type=putih&room=<?php echo $room ?>";
		    this.xhr.open('POST','kirim.php',true);
		    this.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    this.xhr.send(this.param);
		}
	}

	//	Catatan: setup Object Ratu
	class Ratu {
		constructor(id,nomor,warna,posisiX) {
			this.id = id;
			this.nomor = nomor;
			this.warna = warna;
			this.x = posisiX;
			this.y = 0;
			this.first = 0;
			if (warna) {
				this.y = 560;
			}
		}
		onClickBidak() {
			this.isiHtml = '';
			this.jalan = [true, true, true, true, true, true, true, true];
			this.kanan = true;
			this.kiri = true;
			for (var i = 8 - 1; i >= 0; i--) {
				pionPutih[i].hide();
				bidakPutih[i].hide();
				if (pionPutih[i].x == (this.x) && pionPutih[i].y == (this.y-80) || bidakPutih[i].x == (this.x) && bidakPutih[i].y == (this.y-80)) {this.jalan[0] = false;}
				if (pionPutih[i].x == (this.x+80) && pionPutih[i].y == (this.y-80) || bidakPutih[i].x == (this.x+80) && bidakPutih[i].y == (this.y-80)) {this.jalan[1] = false;}
				if (pionPutih[i].x == (this.x+80) && pionPutih[i].y == (this.y) || bidakPutih[i].x == (this.x+80) && bidakPutih[i].y == (this.y)) {this.jalan[2] = false;}
				if (pionPutih[i].x == (this.x+80) && pionPutih[i].y == (this.y+80) || bidakPutih[i].x == (this.x+80) && bidakPutih[i].y == (this.y+80)) {this.jalan[3] = false;}
				if (pionPutih[i].x == (this.x) && pionPutih[i].y == (this.y+80) || bidakPutih[i].x == (this.x) && bidakPutih[i].y == (this.y+80)) {this.jalan[4] = false;}
				if (pionPutih[i].x == (this.x-80) && pionPutih[i].y == (this.y+80) || bidakPutih[i].x == (this.x-80) && bidakPutih[i].y == (this.y+80)) {this.jalan[5] = false;}
				if (pionPutih[i].x == (this.x-80) && pionPutih[i].y == (this.y) || bidakPutih[i].x == (this.x-80) && bidakPutih[i].y == (this.y)) {this.jalan[6] = false;}
				if (pionPutih[i].x == (this.x-80) && pionPutih[i].y == (this.y-80) || bidakPutih[i].x == (this.x-80) && bidakPutih[i].y == (this.y-80)) {this.jalan[7] = false;}

				if (pionPutih[i].x == (this.x+160) && pionPutih[i].y == (this.y) || bidakPutih[i].x == (this.x+160) && bidakPutih[i].y == (this.y)) {this.kanan = false;}
				if (pionPutih[i].x == (this.x-160) && pionPutih[i].y == (this.y) || bidakPutih[i].x == (this.x-160) && bidakPutih[i].y == (this.y)) {this.kiri = false;}
			}
			this.arrIsiHtml = [
				'<div id="isiTujuan" style="left: '+(this.x)+'px;top: '+(this.y-80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(80,0);"></div>',

				'<div id="isiTujuan" style="left: '+(this.x+80)+'px;top: '+(this.y-80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(80,80);"></div>',

				'<div id="isiTujuan" style="left: '+(this.x+80)+'px;top: '+(this.y)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(0,80);"></div>',

				'<div id="isiTujuan" style="left: '+(this.x+80)+'px;top: '+(this.y+80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-80,80);"></div>',

				'<div id="isiTujuan" style="left: '+(this.x)+'px;top: '+(this.y+80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-80,0);"></div>',

				'<div id="isiTujuan" style="left: '+(this.x-80)+'px;top: '+(this.y+80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(-80,-80);"></div>',

				'<div id="isiTujuan" style="left: '+(this.x-80)+'px;top: '+(this.y)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(0,-80);"></div>',

				'<div id="isiTujuan" style="left: '+(this.x-80)+'px;top: '+(this.y-80)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(80,-80);"></div>'];
			for (var i = 0; i <= 7; i++) {
				if (this.jalan[i]) {
					this.isiHtml += this.arrIsiHtml[i];
				}
			}
			if (this.first == 0 && this.jalan[2] && this.kanan && bidakPutih[7].y == 560 && bidakPutih[7].x == 560 && bidakPutih[7].first == 0) {
				this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x+160)+'px;top: '+(this.y)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(0,160);setTimeout(function() {bidakPutih[7].moveBidak(0,-160);}, 800);"></div>';
			}
			if (this.first == 0 && this.jalan[6] && this.kiri && bidakPutih[0].y == 560 && bidakPutih[0].x == 0 && bidakPutih[0].first == 0) {
				this.isiHtml += '<div id="isiTujuan" style="left: '+(this.x-160)+'px;top: '+(this.y)+'px;" onclick="bidakPutih['+this.nomor+'].moveBidak(0,-160);setTimeout(function() {bidakPutih[0].moveBidak(0,240);}, 800);"></div>';
			}
			this.id.style.background = "deepskyblue";
			this.id.style.zIndex = "9";
			document.getElementById('tujuan').innerHTML = this.isiHtml;
		}
		moveBidak(top,left) {
			this.y = this.y - top;
			this.x = this.x + left;
			this.first = 1;
			for (var i = 8 - 1; i >= 0; i--) {
				if (pionHitam[i].x == this.x && pionHitam[i].y == this.y){
					pionHitam[i].y = 1000;
					pionHitam[i].x = 1000;
					pionHitam[i].id.parentNode.removeChild(pionHitam[i].id);
				}else if (bidakHitam[i].x == this.x && bidakHitam[i].y == this.y){
					bidakHitam[i].y = 1000;
					bidakHitam[i].x = 1000;
					bidakHitam[i].id.parentNode.removeChild(bidakHitam[i].id);
				}
			}
			this.id.style.top = this.y + "px";
			this.id.style.left = this.x + "px";
			this.hide();
			banyakJalan = 1;

		    this.xhr = new XMLHttpRequest();
		    this.param = "clickY="+ this.y + "&clickX=" + this.x + "&clickNo=" + this.nomor + "&nama=bidakPutih&type=putih&room=<?php echo $room ?>";
		    this.xhr.open('POST','kirim.php',true);
		    this.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    this.xhr.send(this.param);
		}
	}

Pion.prototype.hide = function() {
	this.id.style.zIndex = "1";
	this.id.style.background = "transparent";
	document.getElementById("tujuan").innerHTML = "";
}
Benteng.prototype.hide = function() {
	this.id.style.zIndex = "1";
	this.id.style.background = "transparent";
	document.getElementById("tujuan").innerHTML = "";
}
Kuda.prototype.hide = function() {
	this.id.style.zIndex = "1";
	this.id.style.background = "transparent";
	document.getElementById("tujuan").innerHTML = "";
}
Gajah.prototype.hide = function() {
	this.id.style.zIndex = "1";
	this.id.style.background = "transparent";
	document.getElementById("tujuan").innerHTML = "";
}
Raja.prototype.hide = function() {
	this.id.style.zIndex = "1";
	this.id.style.background = "transparent";
	document.getElementById("tujuan").innerHTML = "";
}
Ratu.prototype.hide = function() {
	this.id.style.zIndex = "1";
	this.id.style.background = "transparent";
	document.getElementById("tujuan").innerHTML = "";
}


//	Catatan: Menentukan jarak x dan mendeklarasikan object
var pionPutih = [];
var pionHitam = [];
var bidakPutih = [1,2,3,4,5,6,7,8];
var bidakHitam = [1,2,3,4,5,6,7,8];

for (var i = 8 - 1; i >= 0; i--) {
	document.getElementById("pionPutih"+(i)).style.left = (80*i)+"px";
	document.getElementById("pionHitam"+(i)).style.left = (80*i)+"px";

	pionPutih[i] = new Pion(document.getElementById("pionPutih"+(i)), i, true, (80*i));
	pionHitam[i] = new Pion(document.getElementById("pionHitam"+(i)), i, false, (80*i));

	if (i == 0 || i == 7) {
		document.getElementById("bentengPutih"+(i)).style.left = (80*i)+"px";
		document.getElementById("bentengHitam"+(i)).style.left = (80*i)+"px";
		bidakPutih[i] = new Benteng(document.getElementById("bentengPutih"+(i)), i, true, (80*i));
		bidakHitam[i] = new Benteng(document.getElementById("bentengHitam"+(i)), i, false, (80*i));
	}
	if (i == 1 || i == 6) {
		document.getElementById("kudaPutih"+(i)).style.left = (80*i)+"px";
		document.getElementById("kudaHitam"+(i)).style.left = (80*i)+"px";
		bidakPutih[i] = new Kuda(document.getElementById("kudaPutih"+(i)), i, true, (80*i));
		bidakHitam[i] = new Kuda(document.getElementById("kudaHitam"+(i)), i, false, (80*i));
	}
	if (i == 2 || i == 5) {
		document.getElementById("gajahPutih"+(i)).style.left = (80*i)+"px";
		document.getElementById("gajahHitam"+(i)).style.left = (80*i)+"px";
		bidakPutih[i] = new Gajah(document.getElementById("gajahPutih"+(i)), i, true, (80*i));
		bidakHitam[i] = new Gajah(document.getElementById("gajahHitam"+(i)), i, false, (80*i));
	}
	if (i == 3) {
		bidakPutih[i] = new Raja(document.getElementById("rajaPutih"+(i)), i, true, (80*i));
		bidakHitam[i] = new Raja(document.getElementById("rajaHitam"+(i)), i, false, (80*i));
		document.getElementById("rajaPutih"+(i)).style.left = (80*i)+"px";
		document.getElementById("rajaHitam"+(i)).style.left = (80*i)+"px";
	}
	if (i == 4){
		bidakPutih[i] = new Ratu(document.getElementById("rajaPutih"+(i)), i, true, (80*i));
		bidakHitam[i] = new Ratu(document.getElementById("rajaHitam"+(i)), i, false, (80*i));
		document.getElementById("rajaPutih"+(i)).style.left = (80*i)+"px";
		document.getElementById("rajaHitam"+(i)).style.left = (80*i)+"px";
	}
}

function auto() {
	let xhr2 = new XMLHttpRequest();
	xhr2.open('POST','load1.php',true);
	xhr2.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr2.onreadystatechange = function(){
		if ( xhr2.readyState == 4 && xhr2.status == 200 && xhr2.responseText != undefined && xhr2.responseText != '-') {
	        let data = xhr2.responseText.split(',');
	        let arrAngka1 = ['0','1','2','3','4','5','6','7'];
	        let arrAngka2 = [7,6,5,4,3,2,1,0];
	        let arrAngka3 = ['0', '80', '160', '240', '320', '400', '480', '560'];
	        let arrAngka4 = [560, 480, 400, 320, 240, 160, 80, 0];

	        data[2] = arrAngka2[arrAngka1.indexOf(data[2])];
	        data[0] = arrAngka4[arrAngka3.indexOf(data[0])];
	        data[1] = arrAngka4[arrAngka3.indexOf(data[1])];

	        if ( 
	        	data[3] == "bidakHitam" &&
	            bidakHitam[data[2]].x != data[0] &&
	            bidakHitam[data[2]].x != 1000 ||
	            data[3] == "bidakHitam" &&
	            bidakHitam[data[2]].y != data[1] &&
	            bidakHitam[data[2]].x != 1000
	            ) {

	        	banyakJalan = 0;
	            bidakHitam[data[2]].x = data[0];
	            bidakHitam[data[2]].y = data[1];
	            bidakHitam[data[2]].id.style.left = data[0] + "px";
	            bidakHitam[data[2]].id.style.top = data[1] + "px";
				for (var i = 8 - 1; i >= 0; i--) {
					if (
						pionPutih[i].x == bidakHitam[data[2]].x &&
						pionPutih[i].y == bidakHitam[data[2]].y
						){
						pionPutih[i].y = 1000;
						pionPutih[i].x = 1000;
						pionPutih[i].id.parentNode.removeChild(pionPutih[i].id);
					}else if (
						bidakPutih[i].x == bidakHitam[data[2]].x &&
						bidakPutih[i].y == bidakHitam[data[2]].y
						){
						bidakPutih[i].y = 1000;
						bidakPutih[i].x = 1000;
						bidakPutih[i].id.parentNode.removeChild(bidakPutih[i].id);
					}
				}
	        }else if ( 
	        	data[3] == "pionHitam" &&
	            pionHitam[data[2]].x != data[0] &&
	            pionHitam[data[2]].x != 1000 ||
	        	data[3] == "pionHitam" &&
	            pionHitam[data[2]].y != data[1] &&
	            pionHitam[data[2]].x != 1000
	            ) {

	        	banyakJalan = 0;
	            pionHitam[data[2]].x = data[0];
	            pionHitam[data[2]].y = data[1];
	            pionHitam[data[2]].id.style.left = data[0] + "px";
	            pionHitam[data[2]].id.style.top = data[1] + "px";
				for (var i = 8 - 1; i >= 0; i--) {
					if (
						pionPutih[i].x == pionHitam[data[2]].x &&
						pionPutih[i].y == pionHitam[data[2]].y
						){
						pionPutih[i].y = 1000;
						pionPutih[i].x = 1000;
						pionPutih[i].id.parentNode.removeChild(pionPutih[i].id);
					}else if (
						bidakPutih[i].x == pionHitam[data[2]].x &&
						bidakPutih[i].y == pionHitam[data[2]].y
						){
						bidakPutih[i].y = 1000;
						bidakPutih[i].x = 1000;
						bidakPutih[i].id.parentNode.removeChild(bidakPutih[i].id);
					}
				}
	        }
		}
        
	}
	xhr2.send("room=<?php echo $room ?>");
	if (banyakJalan==0) {
		document.getElementById('giliranJalan').innerHTML = "jalan PUTIH";
		document.getElementById('giliranJalan').style.color = "white";
		document.getElementById('giliranJalan').style.textShadow = '3px 3px 3px black';
	}else{
		document.getElementById('giliranJalan').innerHTML = "jalan HITAM";
		document.getElementById('giliranJalan').style.color = "black";
		document.getElementById('giliranJalan').style.textShadow = '3px 3px 3px white';
	}
}
let mulai = setInterval(auto,800);
</script>
</html>