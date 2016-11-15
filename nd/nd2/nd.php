<?php
	$servername = "localhost";
	$username = "root";
	$password = "admin";


	try {
	    $conn = new PDO("mysql:host=$servername;dbname=nd", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }

	$sql = 'SELECT * FROM Books';
	    foreach ($conn->query($sql) as $row) {
		echo "<a href='./nd2.php/?id={$row['bookId']}'>";
		print $row['title'] . "<br/>";
		print "</a>";
	    }
?>
