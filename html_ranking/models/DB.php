<?php
    class DB {
        private static $host = "localhost";
        private static $user = "root";
        private static $pass = "";
        private static $database = "class_ranks";

        public static $koneksi;

        public static function connect()
        {
            self::$koneksi = mysqli_connect(self::$host, self::$user, self::$pass, self::$database);

            if(self::$koneksi->connect_error){
                die("koneksi bermasalah");
            }
            // echo "koneksi berhasil";
            return self::$koneksi;
        }
    }
?>