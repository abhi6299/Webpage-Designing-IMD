<?php
$connect=new mysqli("localhost","root","","weather");
//if($connect->connect_error)
//    die("Connection failed: ".$connect->connect_error);
//echo "connected successful";
session_start();
if(isset($_POST["Register"]))
{
    //if(empty($_POST["username"] && empty($_POST["password"])))
    //{
     //   echo '<script>alert("Both Fields Are Required")</script>';
    //}
    //else
    //{
        $username = mysqli_real_escape_string($connect,$_POST["username"]);
        $password = mysqli_real_escape_string($connect,$_POST["password"]);
        $password = md5($password);
        $query = "INSERT INTO users(username,password) VALUES('$username','$password');";
        if(mysqli_query($connect,$query))
        {
            echo '<script>alert("Registration Done! Now LOGIN")</script>';
        }
    //}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="test1.css">

	<title>
		Test
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
	<div class="heading">
		<img src="weather_2.jpg" id="image1" height="140px" width="100px" >
		<div class="x"><font color="black"><h1><b><u>Indian Meteorological Department</u></b></h1>
		<h2><font color="black">Ministry of Earth Science</h2>
		<h3><font color="black">Government of India</h3></div>
	</div><br>
	<div class="forming">
		<form method="POST">
				<h2>.......REGISTER HERE........</h2>
				<label style="font-size: 25px"><b>Enter Username----</b></label><br/>
	            <input type="text" id="username" name="username" required />
	            <br/>
	            <label style="font-size: 25px"><b>Enter Password----</b></label><br/>
	            <input type="password" id="password" name="password" required/>
	            <br/>
	            <input type="submit" id="Register" name="Register" value="Register" />
	            <br/>
	           	<h3 align="center"><a href="test.php">..Click Here To Login..</a></h3>

		</form>
	</div><br/>
	<div class="footer">
		<h3><font color="black"><marquee direction="alternate">The Indian Meteorological Department (IMD) is an agency of the Ministry of Earth Sciences of the Government of India. It is the principal agency responsible for meteorological observations, weather forecasting and seismology. IMD is headquartered in Delhi and operates hundreds of observation stations across India and Antarctica.Regional offices are at Mumbai, Kolkata, Nagpur and Pune.</marquee></h3>
	</div>
	<h2 align="center"><a href="https://en.wikipedia.org/wiki/India_Meteorological_Department" target="_blank">........Click here to know more........</a></h2>
</body>
</html>