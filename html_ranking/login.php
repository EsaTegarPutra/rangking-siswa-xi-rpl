<?php
    include_once('models/auth.php');

    if(isset($_POST['login'])){
        $data = [
            "username" => $_POST['username'],
            "password" => $_POST['password']
        ];
        $result = Auth::login($data);
        // die(var_dump($result));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <?php if(isset($result)) : ?>
        <div class="alert alert-<?php 
        $result["status"] === 'error' ?
        print("danger") : print("success") ?>">
            <?= $result["message"] ?>
        </div>
    <?php endif ?>
        <div class="card">
            <div class="card-header">
                <span class="h3">Login</span>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-center">Sudah punya akun <a href="register.php">Register now</a></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>