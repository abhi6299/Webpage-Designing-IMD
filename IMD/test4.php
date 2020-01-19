<?php
$connect=new mysqli("localhost","root","","weather");
//if($connect->connect_error)
//    die("Connection failed: ".$connect->connect_error);
//echo "connected successful";
//session_start();
//if(!isset($_SESSION['day']))
//{
//	echo 'Value not set';
    //header("location:test.php");
//$day=$_POST['day'];
$dayy=$_GET["day"];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="test.css">

	<title>
		Indian Meteorological Department
	</title>
<style>
	a:link{
		color:red;
	}
	a:visited{
		color:black;
	}
	a:hover{
		color:blue;
	}
	a:active{
		color:yellow;
	}
</style>
</head>
<body>
<div>	
	<div class="heading">
		<img src="weather_2.jpg" id="image1" height="140px" width="100px" >
		<div class="x"><font color="black"><h1><b><u>Indian Meteorological Department</u></b></h1>
		<h2><font color="black">Ministry of Earth Science</h2>
		<h3><font color="black">Government of India</h3></div>
	</div><br>
	<div >
		<table class="t1" >
			<tr><th>Wind Direction(Deg)</th>
			<th>Wind Speed(Knots)</th>
			<th>Temperature(DegcC)</th>
			<th>Pressure(mBar)</th>
			<th>Humidity(%)</th></tr>
			<?php
			$sql="SELECT WindDirection,WindSpeed,Temperature,Pressure,Humidity from data where Days=$dayy";
			$result=$connect->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row["WindDirection"]."</td><td>".$row["WindSpeed"]."</td><td>".$row["Temperature"]."</td><td>".$row["Pressure"]."</td><td>".$row["Humidity"]."</td></tr>";
				}
				echo "</table";
			}
			else
			{
				echo "0 result fetched";
			}
			//$connect->close();
			?>
		</table>
	</div>
	<div>
		<h2 style="text-align: center;font-size: 40px;"><u>Events</u></h2>
		<br/>
		<table class="t2" style="border:2px #000 dotted;width:100%;">
			<tr><th>Meeting</th>
			<th>Birthday</th>
			<th>Other events</th></tr>
			<?php
			$sql="SELECT Meeting,Birthday,Others from events ORDER BY Id DESC LIMIT 1";
			$result=$connect->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row["Meeting"]."</marquee></td><td>".$row["Birthday"]."</td><td>".$row["Others"]."</td></tr>";
				}
				echo "</table";
			}
			else
			{
				echo "0 result fetched";
			}
			//$connect->close();
			?>
		</table>
	</div>
	<div >
		<h1 style="text-align: center;border-top:2px #000 solid;"><u>Forecast</u></h1>
		<table class="t3" style="width:100%;">
			<?php
			$sql="SELECT Forecast from forecasting ORDER BY Id DESC LIMIT 1";
			$result=$connect->query($sql);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row["Forecast"]."</td></tr>";
				}
				echo "</table";
			}
			else
			{
				echo "0 result fetched";
			}
			$connect->close();
			?>
		</table>
	</div>
	<div class="footer" style="border-bottom:2px #000 solid;">
		<h3><font color="black">The Indian Meteorological Department (IMD) is an agency of the Ministry of Earth Sciences of the Government of India. It is the principal agency responsible for meteorological observations, weather forecasting and seismology. IMD is headquartered in Delhi and operates hundreds of observation stations across India and Antarctica.Regional offices are at Mumbai, Kolkata, Nagpur and Pune.</h3>
	<h2 align="center"><a href="https://en.wikipedia.org/wiki/India_Meteorological_Department" target="_blank">........Click here to know more........</a></h2></div>
	<h2 align="center"><a href="test.php">........LOGIN........</a></h2>
	</div>
</div>
</body>
</html>