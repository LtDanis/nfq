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

	$currentBookId=$_GET['id'];
	$sql = "SELECT * FROM Books WHERE Books.bookId=$currentBookId";
	    foreach ($conn->query($sql) as $row) {
		print $row['bookId'] . "\t";
		print $row['title'] . "\t";
		print $row['year'] . "<br/>";
	    }
	echo '<a href="../nd.php">Back</a>';
?>
