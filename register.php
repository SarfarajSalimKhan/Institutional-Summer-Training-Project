<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Success Submit</title>
    </head>
    <body>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$databasename = "user_info";

			$passwords = $_POST["password"];
			$email = $_POST["email"];
			$last_name = $_POST["last_name"];
			$first_name = $_POST["first_name"];

			try {
				$connection = new PDO ("mysql:host=$servername;dbname=$databasename", $username, $password);
				$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO user (first_name, last_name, email, passwords) VALUES ('$first_name', '$last_name', '$email', '$passwords')";
				$connection -> exec($sql);
				echo "<h2>Thank You</h2>";
				echo "<p>You are successfully registered.</p>";
			}
			catch(PDOException $e)
			{
				echo $sql . "<br />". $e -> getMessage();
			}
			$connection = null;
        ?>
    </body>
</html>
