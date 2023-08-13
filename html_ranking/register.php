<?php
    include_once('models/auth.php');

    if(isset($_POST['register'])){
        $data = [
            "name" => $_POST["name"],
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "password_confirm" => $_POST["password_confirm"],
        ];

        $register = Auth::register($data);

        // die(var_dump($register));

        if($register["status"] === "success"){
            header("Location: login.php");
        }else{
            header("Location: register.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <span class="h3">Register</span>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                    </div>
                    <button name="register" type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-center">Belum punya akun <a href="login.php">Login now</a></div>
        </div>
        
    </div>
</body>
</html>