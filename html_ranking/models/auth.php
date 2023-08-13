<?php
    session_start();
    include_once('DB.php'); 

    class Auth extends DB {
        public static function register($data)
        {
            $name = $data["name"];
            $username = $data["username"];
            $password = $data["password"];
            $password_confirm = $data["password_confirm"];

            if($password === $password_confirm)
            {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";

                $result = DB::connect()->query($sql);
                return [
                    "status" => "success",
                    "data" => $result,
                    "message" => "Password  cocok"
                ];
            }else{
                return [
                    "status" => "error",
                    "data" => [],
                    "message" => "Password tidak cocok"
                ];
            }
        }

        public static function login($data)
        {
            $username = $data["username"];
            $password = $data["password"];

            $user = Auth::checkUsername($username);
            if($user === null)
            {
                return [
                    "status" => "error",
                    "data" => [],
                    "message" => "username tidak ditemukan"
                ];
            }else{
                $decrypt = Auth::checkPassword($password, $user["password"]);

                if(!$decrypt){
                    return [
                        "status" => "error",
                        "data" => [],
                        "message" => "password salah"
                    ];
                }else{
                    $_SESSION["username"] = $username;
                    setcookie("username", $username, time() + 86400);
                    header("Location: home.php");
                }
            }
        }

        public static function checkUsername($username)
        {
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = DB::connect()->query($sql)->fetch_assoc();
            return $result;
        }
        public static function checkPassword($password, $password_hash)
        {
            $decrypt = password_verify($password, $password_hash);
            return $decrypt;
        }

        public static function logout()
        {
            session_destroy();
            header("Location: index.php");
        }

        public static function check()
        {
            
        }
            
    }

?>