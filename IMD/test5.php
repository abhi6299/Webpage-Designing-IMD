<?php
$connect=new mysqli("localhost","root","","weather");
if($connect->connect_error)
    die("Connection failed: ".$connect->connect_error);
echo "connected successful";
if(isset($_POST["update"]))
{
	$sql = "INSERT INTO events(Meeting,Birthday,Others) VALUES ('$_POST[Meeting]', '$_POST[Birthdays]', '$_POST[Others]')";
if ($connect->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
}
if(isset($_POST["Update"]))
{
$sql = "INSERT INTO forecasting(Forecast) VALUES ('$_POST[forecast]')";
if ($connect->query($sql) === TRUE) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
}
if(isset($_POST["Updatee"]))
{
	$Day=$_POST["day"];
	$sql = "UPDATE data set WindDirection='" . $_POST['winddirection'] . "', WindSpeed='" . $_POST['windspeed'] . "', Temperature='" . $_POST['temperature'] . "', Pressure='" . $_POST['pressure'] . "' ,Humidity='" . $_POST['humidity'] . "' WHERE Days='" . $_POST['day'] . "'";
if(mysqli_query($connect, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
}

$connect->close();
?>