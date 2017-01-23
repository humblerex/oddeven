<html>
	<head>
		<title>Partners</title>
		<link href="css/result.css" rel="stylesheet" type="text/css">
		<link href="css/component.css"  type="text/css" rel="stylesheet">
	
	</head>
<body>
	
	<header>
		<h1>Find your CarPartner</h1>
			<p>Site will not be responsible for any fake information.. You first confirm it my meeting them once. We are here only to provide you suggestions.</p>
		</header>
	<div id="main">	
	
	<?php
echo $email;

$link=mysqli_connect("localhost","root","","oddeven");

if($link === false){
	
	die("ERROR:Could not connect.".mysqli_connect_error());
}

//escape user inputs for security

$name=mysqli_real_escape_string($link,$_POST['name']);
$email=mysqli_real_escape_string($link,$_POST['email']);
$mobile=mysqli_real_escape_string($link,$_POST['mobile']);
$gender=mysqli_real_escape_string($link,$_POST['sex']);
$age=mysqli_real_escape_string($link,$_POST['age']);
$adharno=mysqli_real_escape_string($link,$_POST['adhar']);
$car=mysqli_real_escape_string($link,$_POST['car']);
$cname=mysqli_real_escape_string($link,$_POST['cname']);
$eid=mysqli_real_escape_string($link,$_POST['eid']);
$journey=mysqli_real_escape_string($link,$_POST['side']);
$pickup=mysqli_real_escape_string($link,$_POST['from']);
$dropat=mysqli_real_escape_string($link,$_POST['dropat']);
$start=mysqli_real_escape_string($link,$_POST['start']);
$cgender=mysqli_real_escape_string($link,$_POST['gender']);
$cage=mysqli_real_escape_string($link,$_POST['cage']);
$username=mysqli_real_escape_string($link,$_POST['username']);
$password=mysqli_real_escape_string($link,$_POST['password']);

?>

<?php
$insert="INSERT INTO details (Name,Email,Mobile,Gender,Age,Adharno,Carno,Companyname,Eid,Journey,pickup,dropat,Starttime,cgender,cage,username,password) VALUES ('$name','$email','$mobile','$gender','$age','$adhar','$car','$cname','$eid','$journey','$pickup','$dropat','$start','$cgender','$cage','$username','$password')";

if(mysqli_query($link,$insert)){
	echo "<span class='record'>You are added</span>";
}else{
	echo "ERROR: Could Not able to execute. ".mysqli_error($link);
}

mysqli_close($link);

?>


<?php

$link=mysqli_connect("localhost","root","","oddeven");

if($link===false){
	die("ERROR:Could not connect. ".mysqli_connect_error());
}


$select="SELECT Name,Email,Mobile FROM details WHERE pickup='$pickup'";
if($result=mysqli_query($link,$select)){
	if(mysqli_num_rows($result)>0){
		echo "<table>";
		echo "<tr>";
		echo "<th>Name</th>";
		echo "<th>Email</th>";
		echo "<th>Mobile</th>";
        echo "</tr>";
		
		while($row=mysqli_fetch_array($result)){
			
			echo "<tr>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['Email'] . "</td>";
		    echo "<td>" . $row['Mobile'] . "</td>";
				echo "</tr>";
		
		}
		echo "</table>";
		mysqli_free_result($result);
	}else{
		echo "No records matching your were found.";
		
	}
}else{
	
	echo "ERROR:could not able to execute. ".mysqli_error($link);
}

mysqli_close($link);
?>
		</div>
	</body>

</html>


