<!DOCTYPE html>
<html>

<head>
	<title>Remote Viewer</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"> </head>
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
		<!-- Header -->s
		<header class="w3-container w3-center w3-padding-32">
			<h1><b>Remote Camera</b></h1>
			<p>Secure image <span class="w3-tag">viewer</span></p>
		</header>
		<!-- Grid -->
		<div class="w3-row">
			<!-- Blog entries -->
			<!-- Blog entry -->
			<div class="w3-card-4 w3-margin w3-white"> <img src="/images/loginBanner.jpg" alt="banner" style="width:100%">
				<div class="w3-container">
					<h3><b>Login</b></h3>
				</div>
				<div class="w3-container">
					<div class="w3-row">
						<div class="w3-col m8 s12">
							<form id="loginform" name="input" action="" method="post"> <label for="username" style="display: inline-block; width: 6em;">Username: </label><input type="text" value="" id="username" name="username" style="max-width:100%;" />
								<p style="font-size:0px;"> <br></p> <label for="password" style="display: inline-block; width: 6em;">Password: </label><input type="password" value="" id="password" name="password" style="max-width:100%;" />
                                <?php
                                $config = include("setup/config.php");
                                if ($config["use_recaptcha"] == "True") {
                                    require_once "./lib/recaptchalib.php";
                                    echo '<br><div class="g-recaptcha" data-sitekey="' . $config["captcha_site_key"] . '"></div>';
                                }
                                ?>
                                <br><br>
								<p>
									<?php
									$config = include("setup/config.php");
                                        if (isset($_POST["username"]) && isset($_POST["password"])){
                                            if ($_POST["username"] == $config['username'] && $_POST["password"] == $config['password']){
                                                if ($config["use_recaptcha"] == "True") {
                                                $response = null;
                                                $reCaptcha = new ReCaptcha($config["captcha_api_key"]);
                                                    // if submitted check response
                                                    if ($_POST["g-recaptcha-response"]) {
                                                        $response = $reCaptcha->verifyResponse(
                                                            $_SERVER["REMOTE_ADDR"],
                                                            $_POST["g-recaptcha-response"]
                                                        );
                                                    }
                                                    
                                                if ($response != null && $response->success) {
                                                    setcookie("auth", $config['auth'], time() + (86400 * 30), "/");
                                                    header("Location: /auth");
                                                    die();
                                                  } else {
                                                        echo "Please check the captcha!";   
                                                    }
                                                    
                                                }
                                                else {
                                                setcookie("auth", $config['auth'], time() + (86400 * 30), "/");
                                                header("Location: /auth");
                                                die();
                                                }
                                            }else {
                                                echo "Username/Password incorrect!";
                                            }
                                        } 
                                    ?>
								</p> <br> <button class="w3-button w3-padding-large w3-white w3-border" type="submit">submit »</button> <br> <br> </form>
						</div>
						<div class="w3-col m4 w3-hide-small"> </div>
					</div>
				</div>
			</div>
			<hr>
			<!-- END GRID -->
		</div><br>
		<!-- END w3-content -->
	</div>
	<!-- Footer -->
	<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
        <p>Made By <b>Oliver Hynds</b>, <b>Robert Bradshaw</b> and <b>Ben Griffiths</b></p>
	</footer>
</body>

</html>
