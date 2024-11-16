<?php
    function connectDB() {
        $host = DB_HOST;
        $port = DB_PORT;
        $name = DB_NAME;

        try {
            $connect = new PDO("mysql:host=$host;port=$port;dbname=$name", DB_USER, DB_PASS);
            return $connect;     
        }

        catch (Exception $e){
            echo "Lỗi connect database" . $e->getMessage();
        }

    }
?>