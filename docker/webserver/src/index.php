<?php
$svc = getenv('MYSQL_SVC');
$mysql_user = getenv('MYSQL_USER');
$mysql_passwd = getenv('MYSQL_ROOT_PASSWORD');
$mysql_db = getenv('MYSQL_DATABASE');

echo "Accessing MySQL inside K8S <br>";
#$conn = new mysqli("mysql-service", "root", "supersecret", "assignment");
$conn = new mysqli("$svc", "$mysql_user", "$mysql_passwd", "$mysql_db");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT message FROM msgs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo $row['message']."<br>";
	}
} else {
	echo "0 results";
}
$conn->close();
