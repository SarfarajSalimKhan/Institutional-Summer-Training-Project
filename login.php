<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $databasename = "user_info";

            $connection = new PDO ("mysql:host=$servername;dbname=$databasename", $username, $password);
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST["email"];
                $passwords = $_POST["password"];

                $sql = "SELECT id FROM user WHERE email = '$email' AND passwords = '$passwords'";
                $result = $connection -> prepare($sql);
                $result -> execute();
                $count = $result -> rowCount();

                if ($count == 1) {
                    $_SESSION['login_user'] = $email;
                    echo "<h1>Welcome</h1>";
                    echo "<h2>" . $email . "</h2>";
                    echo "<p>You are successfully logged in.</p>";
                    echo "<button><a href='index.html' style='text-decoration: none; color: black;'>Log out</a></button>";
                    /*if ($_SESSION["loggedin"] != true)
                    {
                        header("location: register.html");
                    }*/
                }
                else {
                    $error = "<p><b>Your login name and password is invalid.</b></p>";
                    echo $error;
                }
            }
        ?>
    </body>
</html>