<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login bukawaroeng </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="password" class="input-control">
            </form>
            <button href="index.html" class="btn">LOGIN</button>    
        <?php
            if(isset($_POST['submit'])){
                session_start();
                    include 'db.php' ;

                    $user = mysqli_real_escape_string($conn, $_POST['user']);
                    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                    $cek =mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".md5($pass)."'");

                    if(mysqli_num_rows($cek) > 0){
                        $d = mysqli_fetch_object($cek);
                        $_SESSION['status_login'] =true;
                        $_SESSION['a_global'] =true;
                        $_SESSION['id'] = $d->admin_id;
                        echo '<script>window.location="dasboard.php" </script>';
                    }else{
                        echo '<script>alert("username atau password anda salah")</script>';
                    }
            }
            ?>
    </div>
</body>
</html>