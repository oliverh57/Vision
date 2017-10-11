<?php $cam = 1;

function logout()
{
    setcookie("auth", "goAway", 1);
    header('Location: ../?signOut=1');
}

if(array_key_exists('test',$_POST)){
   logout();
}

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
			$.get("/php/save.php?action=1&cam=" + cam + "&auth=" + "{$config['auth']}" + "&server=" + server);
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

			

			
			<div class="w3-row">
CAMERA;
		
		function cam_loop($cam, $config){
		echo <<<CAMERA
		<!-- view cam${cam} large -->
			<div id="cam${cam}-stream" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-bottom">
					<header class="w3-container w3-theme-l1">
						<span onclick="document.getElementById('cam${cam}-stream').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<h1>Images</h1>
					</header>
					<div class="w3-padding">
								<img id="view_large${cam}" src="/images/loading.gif"  alt="Cam${cam}" style="width:100%">
						<script>
							setTimeout(load_large${cam}, 500);
							function load_large${cam}()
							{
									document.getElementById('view_large${cam}').src = '/php/proxy/proxy-stream.php?auth=' + "${config['auth']}" + "&port=" + "${config['cam'.$cam.'_port']}" + "&server=" + "${config['cam'.$cam.'_ip']}";
							}
						</script>
					</div>
					<footer class="w3-container w3-theme-l1">
					</footer>
				</div>
			</div>
			
			<div id="loader" class="loading"></div>
			<!-- view cam1 -->
			<div id="cam${cam}-view" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-bottom">
					<header class="w3-container w3-theme-l1">
						<span onclick="document.getElementById('cam${cam}-view').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<h1>Images</h1>
					</header>
					<div class="w3-padding">
CAMERA;
						
							$save = $config['img_save_location'];
							$dirname = "$save/cam${cam}/";
							$images = scandir($dirname);
							$ignore = Array(".", "..");
							foreach($images as $curimg){
								if(!in_array($curimg, $ignore)) {
									$location_scr= $save."/cam${cam}/$curimg";
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
			
				<!--cam${cam} -->
				<div class="w3-third">
					<div class="w3-card-4 w3-margin w3-white">
							<img id="view${cam}" src="/images/loading.gif"  alt="Cam${cam}" style="width:100%">				<script>
							setTimeout(load_${cam}, 500);
							function load_${cam}()
							{
									document.getElementById('view${cam}').src = '/php/proxy/proxy-stream.php?auth=' + "${config['auth']}" + "&port=" + "${config['cam'.$cam.'_port']}" + "&server=" + "${config['cam'.$cam.'_ip']}";
							}
						</script>
						<div class="w3-container">
							<h3><b>Camera ${cam}</b></h3>
						</div>
						<div class="w3-container">
							<div class="w3-row">
								<button class="w3-button w3-padding-large w3-white w3-border w3-third" style="display: inline;" onclick="document.getElementById('cam${cam}-stream').style.display='block'"><b>Full Size</b></button>
								<button class="w3-button w3-padding-large w3-white w3-border w3-third" style="display: inline;" onclick="savecam('${cam}', '${config['cam'.$cam.'_ip']}');"><b>Snapshot</b></button>
								<button style="display: inline;" class="w3-button w3-padding-large w3-white w3-border w3-third" onclick="document.getElementById('cam${cam}-view').style.display='block'"><b>View images</b></button>
							</div>
							<br>
						</div>
					</div>
					<hr>
				</div>
			
CAMERA;
			}
			
foreach (range(1,(int)$config['No_of_cams']) as $number) {
   cam_loop($number, $config);
}

echo <<<CAMERA
		
		</div> </div>
		<!-- Footer -->
        <center>
        <form method="post">
            <input type="submit" name="test" id="test" value="Sign Out" /><br/>
        </form>

        </center>
		<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
			<p>Made by <b>Oliver Hynds</b>, <b>Robert Bradshaw</b> and <b>Ben Griffiths</b></p>
		</footer>

	</body>

</html>
CAMERA;
	

} else {
header("Location: ../");
};
?>



