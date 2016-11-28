<?php
		$servername = "localhost";
		$username = "root";
		$conn = "";
		$name = "";
		$value = 0;

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=nd3", $username);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		catch(PDOException $e)
		    {
		    echo "Connection failed: " . $e->getMessage();
		    }

		$micro = microtime(true);

		 // 1 by 1
		for($i = 0; $i < 100000; $i++)
		{
			$name = 'data';
			$value = 5;
			$stmt = $conn->prepare("INSERT INTO temp (text, number) VALUES (:name, :value)");
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':value', $value);
			// insert one row

			$stmt->execute();
		}
		$time_consumed = round(microtime(true) - $micro,3)*1000;
		echo "Time consumed - ".$time_consumed."\n";


		$micro = microtime(true);
		// porcijomis
		for($i = 0; $i < 100; $i++)
		{   	
			$stmt = $conn->prepare("INSERT INTO temp (text, number) SELECT text,number from temp limit 1000");
			$stmt->execute();
		}
		$time_consumed = round(microtime(true) - $micro,3)*1000;
		echo "Time consumed - ".$time_consumed."\n";
?>

