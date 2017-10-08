<?php
$config = include(dirname(__DIR__, 1)."/setup/config.php");
if ( ( isset($_COOKIE['auth']) ) && ( $_COOKIE['auth'] == $config['auth'] )){
echo <<<CAMERA
<!DOCTYPE html>
<html>
<title>Remote Hound</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="/lib/jquery-3.2.1.min.js"></script>
<style>
#cf2 {
  position:relative;
  height:281px;
  width:450px;
  margin:0 auto;
}
#cf2 img {
  position:absolute;
  left:0;
  -webkit-transition: opacity 1s ease-in-out;
  -moz-transition: opacity 1s ease-in-out;
  -o-transition: opacity 1s ease-in-out;
  transition: opacity 1s ease-in-out;
}

#cf2 img.transparent {
opacity:0;
}
#cf_onclick {
cursor:pointer;
}
</style>

	<script>
			function savecam(cam, server) {
			$.get("/php/save.php?action=1&cam=" + cam + "&auth=" + {$config['auth']} + "&server=" + server);
			return false;
		}

	</script>



	<style>
		body,
		h1,
		h2,
		h3,
		h4,
		h5 {
			font-family: "Raleway", sans-serif
		}

	</style>

	<body class="w3-light-grey">

		<div class="w3-content" style="max-width:1400px">

			<!-- Header -->
			<header class="w3-container w3-center w3-padding-32">
				<h1><b>Remote Camera</b></h1>
				<p>Secure image <span class="w3-tag">viewer</span></p>
			</header>

			<div id="loader" class="loading"></div>
			<!-- view cam1 -->
			<div id="cam1-view" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-bottom">
					<header class="w3-container w3-theme-l1">
						<span onclick="document.getElementById('cam1-view').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<h1>Images</h1>
					</header>
					<div class="w3-padding">
CAMERA;
						
							$save = $config['img_save_location'];
							$dirname = "$save/cam1/";
							$images = scandir($dirname);
							$ignore = Array(".", "..");
							foreach($images as $curimg){
								if(!in_array($curimg, $ignore)) {
									$location_scr= $save."/cam1/$curimg";
									$image = base64_encode(file_get_contents($location_scr));
									echo "<img class='w3-third' style='padding:2px;' src='data:image/png;base64,$image'>";
									//echo "<img class = 'w3-third' style = 'padding: 2px' src=$location_scr />\n";
								};
							}
echo <<<CAMERA
					</div>
					<footer class="w3-container w3-theme-l1">
						<p>images</p>
					</footer>
				</div>
			</div>
			
			<!-- view cam2 -->
			<div id="cam2-view" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-bottom">
					<header class="w3-container w3-theme-l1">
						<span onclick="document.getElementById('cam2-view').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<h1>Images</h1>
					</header>
					<div class="w3-padding">
CAMERA;
						
							$save = $config['img_save_location'];
							$dirname = "$save/cam2/";
							$images = scandir($dirname);
							$ignore = Array(".", "..");
							foreach($images as $curimg){
								if(!in_array($curimg, $ignore)) {
									$location_scr= $save."/cam2/$curimg";
									$image = base64_encode(file_get_contents($location_scr));
									echo "<img class='w3-third' style='padding:2px;' src='data:image/png;base64,$image'>";
									//echo "<img class = 'w3-third' style = 'padding: 2px' src=$location_scr />\n";
								};
							}
echo <<<CAMERA
					</div>
					<footer class="w3-container w3-theme-l1">
						<p>images</p>
					</footer>
				</div>
			</div>
			
			<!-- view cam3 -->
			<div id="cam3-view" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-bottom">
					<header class="w3-container w3-theme-l1">
						<span onclick="document.getElementById('cam3-view').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<h1>Images</h1>
					</header>
					<div class="w3-padding">
CAMERA;
						
							$save = $config['img_save_location'];
							$dirname = "$save/cam3/";
							$images = scandir($dirname);
							$ignore = Array(".", "..");
							foreach($images as $curimg){
								if(!in_array($curimg, $ignore)) {
									$location_scr= $save."/cam3/$curimg";
									$image = base64_encode(file_get_contents($location_scr));
									echo "<img class='w3-third' style='padding:2px;' src='data:image/png;base64,$image'>";
									//echo "<img class = 'w3-third' style = 'padding: 2px' src=$location_scr />\n";
								};
							}
echo <<<CAMERA
					</div>
					<footer class="w3-container w3-theme-l1">
						<p>images</p>
					</footer>
				</div>
			</div>

			<!-- view cam1 large -->
			<div id="cam1-stream" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-bottom">
					<header class="w3-container w3-theme-l1">
						<span onclick="document.getElementById('cam1-stream').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<h1>Images</h1>
					</header>
					<div class="w3-padding">
						<img id="view1-l" src="/images/loading.gif" alt="Cam1" style="width:100%">
						<script>
							document.getElementById('view1-l').src = 'https://remotehound.ddns.net/php/proxy/proxy-stream.php?auth=' + "{$config['auth']}" + "&port=" + "{$config['cam1_port']}" + "&server=" + "{$config['cam1_ip']}";

						</script>
					</div>
					<footer class="w3-container w3-theme-l1">
					</footer>
				</div>
			</div>

			<!-- view cam2 large -->
			<div id="cam2-stream" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-bottom">
					<header class="w3-container w3-theme-l1">
						<span onclick="document.getElementById('cam2-stream').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<h1>Images</h1>
					</header>
					<div class="w3-padding">
						<img id="view2-l" src="/images/loading.gif" alt="Cam1" style="width:100%">
						<script>
							document.getElementById('view2-l').src = 'https://remotehound.ddns.net/php/proxy/proxy-stream.php?auth=' + "{$config['auth']}" + "&port=" + "{$config['cam2_port']}" + "&server=" + "{$config['cam2_ip']}";

						</script>
					</div>
					<footer class="w3-container w3-theme-l1">
					</footer>
				</div>
			</div>

			<!-- view cam3 large -->
			<div id="cam3-stream" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-bottom">
					<header class="w3-container w3-theme-l1">
						<span onclick="document.getElementById('cam3-stream').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<h1>Images</h1>
					</header>
					<div class="w3-padding">
						<img id="view3-l" src="/images/loading.gif" alt="Cam1" style="width:100%">
						<script>
							document.getElementById('view3-l').src = 'https://remotehound.ddns.net/php/proxy/proxy-stream.php?auth=' + "{$config['auth']}" + "&port=" + "{$config['cam3_port']}" + "&server=" +"{$config['cam3_ip']}";

						</script>
					</div>
					<footer class="w3-container w3-theme-l1">
					</footer>
				</div>
			</div>


			<!-- cams -->
			<div class="w3-row">

				<!--cam1-->
				<div class="w3-third">
					<!-- Blog entry -->
					<div class="w3-card-4 w3-margin w3-white">
						<img id="view1" src="/images/loading.gif" alt="Cam1" style="width:100%">
						<script>
							setTimeout(load_1, 500);
							function load_1()
							{
								document.getElementById('view1').src = 'https://remotehound.ddns.net/php/proxy/proxy-stream.php?auth=' + "{$config['auth']}" + "&port=" + "{$config['cam1_port']}" + "&server=" + "{$config['cam1_ip']}";
							}
						</script>
						<div class="w3-container">
							<h3><b>Camera 1</b></h3>
						</div>
						<div class="w3-container">
							<div class="w3-row">
								<button class="w3-button w3-padding-large w3-white w3-border w3-third" style="display: inline;" onclick="document.getElementById('cam1-stream').style.display='block'"><b>Full Size</b></button>
								<button class="w3-button w3-padding-large w3-white w3-border w3-third" style="display: inline;" onclick="savecam(1, cam1_ip);"><b>Snapshot</b></button>
								<button style="display: inline;" class="w3-button w3-padding-large w3-white w3-border w3-third" onclick="document.getElementById('cam1-view').style.display='block'"><b>View images</b></button>
							</div>
							<br>
						</div>
					</div>
					<hr>

				</div>

				<div class="w3-third">

					<div class="w3-card-4 w3-margin w3-white">
						<img id="view2" src="/images//loading.gif" alt="Cam2" style="width:100%">
						<script>
							setTimeout(load_2, 500);
							function load_2()
							{
							document.getElementById('view2').src = 'https://remotehound.ddns.net/php/proxy/proxy-stream.php?auth=' + "{$config['auth']}" + "&port=" + "{$config['cam2_port']}" + "&server=" + "{$config['cam2_ip']}";
							}
						</script>
						<div class="w3-container">
							<h3><b>Camera 2</b></h3>
						</div>
						<div class="w3-container">
							<div class="w3-row">
								<button class="w3-button w3-padding-large w3-white w3-border w3-third" style="display: inline;" onclick="document.getElementById('cam2-stream').style.display='block'"><b>Full Size</b></button>
								<button class="w3-button w3-padding-large w3-white w3-border w3-third" style="display: inline;" onclick="savecam(2, cam2_ip);"><b>Snapshot</b></button>
								<button style="display: inline;" class="w3-button w3-padding-large w3-white w3-border w3-third" onclick="document.getElementById('cam2-view').style.display='block'"><b>View images</b></button>
							</div>
							<br>
						</div>
					</div>
					<hr>

				</div>

				<div class="w3-third">
					<div class="w3-card-4 w3-margin w3-white">
						<img id="view3" src="/images/loading.gif" alt="Cam3" style="width:100%">
						<script>
							setTimeout(load_3, 500);
							function load_3()
							{
								document.getElementById('view3').src = 'https://remotehound.ddns.net/php/proxy/proxy-stream.php?auth=' + "{$config['auth']}" + "&port=" + "{$config['cam3_port']}" + "&server=" + "{$config['cam3_ip']}";
							}
						</script>
						<div class="w3-container">
							<h3><b>Camera 3</b></h3>
						</div>
						<div class="w3-container">
							<div class="w3-row">
								<button class="w3-button w3-padding-large w3-white w3-border w3-third" style="display: inline;" onclick="document.getElementById('cam3-stream').style.display='block'"><b>Full Size</b></button>
								<button class="w3-button w3-padding-large w3-white w3-border w3-third" style="display: inline;" onclick="savecam(3, cam3_ip);"><b>Snapshot</b></button>
								<button style="display: inline;" class="w3-button w3-padding-large w3-white w3-border w3-third" onclick="document.getElementById('cam3-view').style.display='block'"><b>View images</b></button>
							</div>
							<br>
						</div>
					</div>
					<hr>

				</div>

				<!-- END GRID -->
			</div><br>
		</div>
		<!-- Footer -->
		<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
			<p>Copyright Oliver Hynds</p>
		</footer>

	</body>

</html>
CAMERA;
} else {
header("Location:". $config['auth']);
};
?>