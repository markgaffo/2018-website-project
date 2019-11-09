<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<style>
html, body, h1, h2, h3, h4, h5, h6 {
  font-family: "Times New Roman", cursive, sans-serif;
}
</style>
<body>


<?php
error_reporting(0);
$get = json_decode(file_get_contents('http://ip-api.com/json/'),true);
date_default_timezone_set($get['timezone']);
$city = $_GET['q'];
 $string = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=f92e31ddaf6805f7c82c1a1937e26004";
 $data = json_decode(file_get_contents($string),true);
 
 $temp = $data['main']['temp'];
 
 $icon = $data['weather'][0]['icon'];
 $country =  "<h1 class='w3-xxxlarge w3-animate-zoom'><b>".$data['name'].", ".$data['sys']['country']."</h1></b>";
 
 $logo = "<center><img src='http://openweathermap.org/img/w/".$icon.".png'></center>";
 $desc = "<b><p>".$data['weather'][0]['description']."</p></b>";
 
 $temperature =  "<b>Temp:".$temp."°C</b><br>";
 $clouds = "<b>Clouds: ".$data['clouds']['all']."%</b><br>";
 $humidity = "<b>Humidity: ".$data['main']['humidity']."%</b><br>";
 $pressure = "<b>Pressure: ".$data['main']['pressure']."hpa</b><br>";
 $sunrise = "<b>Sunrise: ".date('h:i A', $data['sys']['sunrise'])."</b><br>";
 $sunset = "<b>Sunset: ".date('h:i A', $data['sys']['sunset'])."</b>";
 
?>

	<div class="w3-display-container w3-wide">
		<img src="https://images.wallpaperscraft.com/image/light_faded_background_85547_1920x1080.jpg" style="width:100%;height:100%;" class="w3-image">
		  <div class="w3-display-topmiddle w3-margin-top">
			
				<?php 
				
				echo $country;
				echo $logo; 
				echo "<center><h2>".$desc."</h1></center>";
				?>
				
		  </div>
	
	
	<div class="w3-display-middle w3-margin-top w3-padding-top">
		<div class="w3-animate-left w3-margin-top"><br><br><br>
<h1 class="w3-xlarge">

			<?php echo $temperature; ?>
			<?php echo $clouds; ?>
			<?php echo $humidity; ?>
			<?php echo $pressure; ?>
			<?php echo $sunrise; ?>
			<?php echo $sunset; ?>
			</h2>
		</div>
		
	</div>
	
	</div>


</body>
</html>