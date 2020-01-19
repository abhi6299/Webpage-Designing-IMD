<?php
session_start();
//if(!isset($_SESSION['username']))
//{
   // header("location:test.php");
//}
//session_start();

$connect=new mysqli("localhost","root","","weather");
//session_start();

//if($connect->connect_error)
//    die("Connection failed: ".$connect->connect_error);
//echo "connected successful";
//$user=$_POST["username"];
if(isset($_POST["update"]))
{
	$sql = "INSERT INTO events(Meeting,Birthday,Others) VALUES ('$_POST[Meeting]', '$_POST[Birthdays]', '$_POST[Others]')";
if ($connect->query($sql) === TRUE) {
    echo '<script>alert("New record created successfully")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
}
if(isset($_POST["Update"]))
{
$sql = "INSERT INTO forecasting(Forecast) VALUES ('$_POST[forecast]')";
if ($connect->query($sql) === TRUE) {
    echo '<script>alert("New record created successfully")</script>';
} 
else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
}
if(isset($_POST["Updatee"]))
{
	if(!empty($_POST['winddirection'])&&!empty($_POST['windspeed'])&&!empty($_POST['temperature'])&&!empty($_POST['pressure'])&&!empty($_POST['humidity']))
	{
		$sql = "UPDATE data set WindDirection='" . $_POST['winddirection'] . "', WindSpeed='" . $_POST['windspeed'] . "', Temperature='" . $_POST['temperature'] . "', Pressure='" . $_POST['pressure'] . "' ,Humidity='" . $_POST['humidity'] . "' WHERE Days='" . $_POST['day'] . "'";
		if(mysqli_query($connect, $sql)){
	    	echo '<script>alert("Records updated successfully")</script>';
		}
		else {
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
		}
	}
	else if(!empty($_POST['winddirection']))
	{
		$sql = "UPDATE data set WindDirection='" . $_POST['winddirection'] . "'";
	if(mysqli_query($connect, $sql)){
    	echo '<script>alert("Records updated successfully")</script>';
	}
	else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}
	}
	else if(!empty($_POST['windspeed']))
	{
		$sql = "UPDATE data set WindSpeed='" . $_POST['windspeed'] . "'";
	if(mysqli_query($connect, $sql)){
    	echo '<script>alert("Records updated successfully")</script>';
	}
	else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}
	}
	else if(!empty($_POST['temperature']))
	{
		$sql = "UPDATE data set Temperature='" . $_POST['temperature'] . "'";
	if(mysqli_query($connect, $sql)){
    	echo '<script>alert("Records updated successfully")</script>';
	}
	else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}
	}
	else if(!empty($_POST['pressure']))
	{
		$sql = "UPDATE data set Pressure='" . $_POST['pressure'] . "'";
	if(mysqli_query($connect, $sql)){
    	echo '<script>alert("Records updated successfully")</script>';
	}
	else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}
	}
	else if(!empty($_POST['humidity']))
	{
		$sql = "UPDATE data set Humidity='" . $_POST['humidity'] . "'";
	if(mysqli_query($connect, $sql)){
    	echo '<script>alert("Records updated successfully")</script>';
	}
	else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}
	}
/*else
{
		$Day=$_SESSION['day'];

	if(isset($_SESSION['day']))
	{
   header("location:test4.php");
	}
	else
	{
		// $username = mysqli_real_escape_string($connect,$_POST["username"]);
        //$password = mysqli_real_escape_string($connect,$_POST["password"]);
        //$password = md5($password);
        $query="SELECT * FROM data WHERE Days=$Day";
        $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['day']=$Day;
            header("location:test4.php");
        }
        else
        {
            echo '<script>alert("Wrong User Details")</script>';
        }
	}
}*/
else
{
	echo '<script>alert("Done")</script>';
	$day=$_POST["day"];
	echo $day;
	$url="test4.php?day=".$day;
	header("Location:".$url);
	exit();
}
}

$connect->close();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="test15.css">
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
		<img src="weather_2.jpg" id="image1" height="140px" width="100px">
		<div class="x"><font color="black"><h1><b><u>Indian Meteorological Department</u></b></h1>
		<h2><font color="black">Ministry of Earth Science</h2>
		<h3><font color="black">Government of India</h3></div>
	</div>
	<div class="coding">
		<?php
			//session_start();
			echo '<h2><u>Hello '.$_SESSION['username'].'! Have a Good Day</u></h2>';
            echo '<br/>';
            echo '<font size="5px"><a href=logout.php>LOGOUT</a></font>';
            ?>
   	</div>
   	<div style="border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
<form method="POST">
   		<div class="forming">
		
				<h3><b>.......ENTER THE FOLLOWING........</b></h3>
				<p style="font-size: 20px"><b>Enter DAY----</b></p><br/>
	            <input type="text" id="day" name="day" required/>
	            <br/>

		</div>
			<h4><b>**Update if Required**</b></h4>
		<div>
				<label style="font-size: 20px;margin-right:115px;"><b>-Enter Wind Direction-</b></label>
	            <label style="font-size: 20px;margin-right:115px;"><b>-Enter Wind Speed-</b></label>
	            <label style="font-size: 20px;margin-right:115px;"><b>-Enter Temp-</b></label>
	            <label style="font-size: 20px;margin-right:115px;"><b>-Enter Pressure-</b></label>
	            <label style="font-size: 20px;"><b>-Enter Humidity-</b></label>
		</div>
		<div style="float:left;padding-top:10px;">
	            <input style="margin-left: 45px;margin-right:175px" type="text" id="winddirection" name="winddirection" size="10" />
	            <input style="margin-left: 20px;margin-right:140px" type="text" id="windspeed" name="windspeed" size="10"/>
	            <input style="margin-left: 20px;margin-right:115px" type="text" id="temperature" name="temperature" size="10"/>
	            <input style="margin-left: 20px;margin-right:120px" type="text" id="pressure" name="pressure" size="10"/>
	            <input style="margin-left: 45px;" type="text" id="humidity" name="humidity" size="10"/></div>
	           	<div><center><input style="margin-top:25px;padding-left: 5px;padding-right: 5px;font-weight: bolder" type="submit" name="Updatee" id="Updatee" value="Updatee"/></center></div>
	            <br/>
	</form></div>
		<div style="border-bottom:2px #000 solid;margin-top: 10px;">
	    	<form method="POST">
	           	<div style=" text-align: center;">

	           		<label style="font-size: 20px;"><b>*Update Forecast if needed*</b></label><br/>
	           		<textarea style="margin-left:10px;margin-top: 10px;" name="forecast" id="forecast"rows="2" cols="80"></textarea>
	           		<div>
	           			<input style="margin-top:15px;margin-bottom:15px;padding-left: 5px;padding-right: 5px;font-weight: bolder" type="submit" name="Update" id="Update" value="Update"/>
	           		</div>
	        	</div>
	        </form>
	  	</div>
	 <h2 style="text-align: center"><b><u>Upcoming Events</u></b></h2><br/>
	 <div style="border-bottom:2px #000 solid;">
	 <div >
	 	<div style="float:left;">
	 		<p style="font-size:25px;font-weight: bolder;margin-right:5px;margin-left:105px; ">Meetings:</p>
	 	</div>
	 	<div style="float:right;">
	 		<p style="font-size:25px;font-weight: bolder;margin-right:145px;">Others:</p>
	 	</div>
	 	<div style="margin-right: 5px;">
	 		<center><p style="font-size:25px;font-weight: bolder;margin-right:25px;">Birthdays:</p></center>
	 	</div>
	 </div>
	 	<div >	 
	 		<form method="POST">
		 		<div><textarea style="float:left;margin-left:20px;margin-right:20px;"name="Meeting" id="Meeting" rows="2" cols=45></textarea></div>
		 		<div><textarea style="float:right;margin-right:20px;" name="Others" id="Other" rows="2" cols="45"></textarea></div>
		 		<div><textarea style="float:right;margin-right:50px;margin-right:90px;"name="Birthdays" id="Birthdays" rows="2" cols="45"></textarea></div>
				<div>
					<center><input style="margin-top:15px;margin-bottom:10px;margin-right:20px;margin-left:20px;padding-left: 5px;padding-right: 5px;font-size:15px;font-weight: bolder;" type="submit" name="update" id="update" value="update"/></center>
				</div>
	 		</form>
	 	</div>
	 </div>
	<div class="footer">
		<h3><font color="black"><marquee direction="alternate">The Indian Meteorological Department (IMD) is an agency of the Ministry of Earth Sciences of the Government of India. It is the principal agency responsible for meteorological observations, weather forecasting and seismology. IMD is headquartered in Delhi and operates hundreds of observation stations across India and Antarctica.Regional offices are at Mumbai, Kolkata, Nagpur and Pune.</marquee></h3>
	</div>
</div>
</body>
</html>