<?php
$servername ="mysql.nethely.hu:3306";
$username = "userregistration";
$password = "skevin22";
$dbname = "Users";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$email = $_POST["Email"];
$password = $_POST["Password"];
$salt = "codeflix";
$password_encrypted = sha256($password.$salt);

$sql = mysqli_query($conn, "SELECT count(*) as total from Users WHERE email = '".$email."' and 
	password = '".$password_encrypted."'");
$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
	?>
	<script>
		alert('Login successful');
	</script>
	
	<?php
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
}
?>