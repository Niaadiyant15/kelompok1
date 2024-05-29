<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Register Ware Speed Shop</title>
</head>

<body>
    </div>
    <section>
        <div class="form-box">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <h2>Register</h2>
                <div class="inputbox">
                    <ion-icon name="name"></ion-icon>
                    <input type="username" required>
                    <label for="">Username</label>
                </div>

                <div class="inputbox">
                    <ion-icon name="mail"></ion-icon>
                    <input type="username" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="mail"></ion-icon>
                    <input type="email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock"></ion-icon>
                    <input type="password" required>
                    <label for="">password</label>
                </div>
                <div class="forget">
                    <label for=""><input type="checkbox">Remember Me <a href="#">Forget password?</a></label>
                </div>
                <button type="submit">Log in</button>
                <div class="register">
                    <p>Don't have a account? <a href="#">Register</a></p>
                </div>
            </form>
        </div>
    </section>


    <!--bagian java script -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js">

    </script>
</body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        echo "Please enter a username";
    } elseif (empty($password)) {
        echo "Please enter a password";
    } elseif (empty($email)) {
        echo "Please enter an email";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user, password, email) VALUES ('$username', '$hash', '$email')";

        // Establishing connection to the MySQL database
        $conn = new mysqli("localhost", "your_db_username", "your_db_password", "your_db_name");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        try {
            if ($conn->query($sql) === TRUE) {
                echo "You are now registered!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } catch (mysqli_sql_exception $e) {
            echo "That username is taken";
        }

        // Closing the connection
        $conn->close();
    }
}
?>