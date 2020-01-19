<?php
$connect=new mysqli("localhost","root","","weather");
//if($connect->connect_error)
//    die("Connection failed: ".$connect->connect_error);
//echo "connected successful";
session_start();
if(isset($_SESSION['username']))
{
    header("location:test3.php");
}
if(isset($_POST["login"]))
{
    //if(empty($_POST["username"])&&empty($_POST["password"]))
    //{
    //    echo '<script>alert("Both Fields Are Required")</script>';
    //}
    //else
  	//{
        $username = mysqli_real_escape_string($connect,$_POST["username"]);
        $password = mysqli_real_escape_string($connect,$_POST["password"]);
        $password = md5($password);
        $query="SELECT * FROM users WHERE username = '$username' AND password= '$password'";
        $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result) > 0)
        {
        	//echo 'done';
            $_SESSION['username']=$username;
            header("location:test3.php");
        }
        else
        {
            echo '<script>alert("Wrong User Details")</script>';
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
	    <link rel="stylesheet" type="text/css" href="testt.css">

	<title>
		Indian Metereological Department
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
		<div class="x"><h1><b><u>Indian Meteorological Department</u></b></h1>
		<h2>Ministry of Earth Science</h2>
		<h3>Government of India</h3></div>
	</div><br/>
	<div class="rest">
	<div class="forming">
		<form method="POST">
				<h2>.......LOGIN HERE........</h2>
				<label style="font-size: 21px"><b>Enter Username----</b></label><br/>
	            <input type="text" id="username" name="username" />
	            <br/><br/>
	            <label style="font-size: 21px"><b>Enter Password----</b></label><br/>
	            <input type="password" id="password" name="password" />
	            <br/><br/>
	            <input type="submit" id="login" name="login" value="login" />
	            <h4 align="center"><a href="test1.php">Not Registered? Click Here...</a></h4>
				<h4 align="center"><a href="test4.php">Click Here to Move Back to Main Page...</a></h4>

		</form>
	</div>
	<div class="footer">
		<h3><font color="black"><marquee direction="alternate">The Indian Meteorological Department (IMD) is an agency of the Ministry of Earth Sciences of the Government of India. It is the principal agency responsible for meteorological observations, weather forecasting and seismology. IMD is headquartered in Delhi and operates hundreds of observation stations across India and Antarctica.Regional offices are at Mumbai, Kolkata, Nagpur and Pune.</marquee></h3>
	</div>
	<h3 align="center"><a href="https://en.wikipedia.org/wiki/India_Meteorological_Department" target="_blank">........Click here to know more........</a></h3>
	</div>
</div>
</body>
</html>