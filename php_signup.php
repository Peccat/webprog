<?php  
$servername ="mysql.nethely.hu:3306";
$username = "userregistration";
$password = "skevin22";
$dbname = "Users";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$username = $_POST["Username"];
$name = $_POST["Name"];
$email = $_POST["Email"];
$password = $_POST["Password"];
$salt = "codeflix";
$password_encrypted = sha256($password.$salt);

$sql = "INSERT INTO Users (username, email, password, name) 
VALUES ('$name', '$email', '$password_encrypted')";

if($conn->query($sql) === TRUE){
	?>
	<script>
		alert('Values have been inserted');
	</script>
	<?php
}
else{
	?>
	<script>
		alert('Values did not insert');
	</script>
	<?php
}
?>