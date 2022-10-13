<!--Name: Victor Zubatyy-->
<!--StudentID: D21125389-->
<!--Project Name: Web Dynamic Application-->
<!--Class: DT211/C-->
<?php
//database credentials are saved here, you may change them to connect to your own localhost
    function connect()
    {
        $hostName = "localhost:3306";
        $userName = "root";
        $passwordName = "Chelseano.1";
        $databaseName = "database";

        $conn = mysqli_connect($hostName, $userName, $passwordName, $databaseName);

        if (!$conn)
        {
            die('Connection unsuccessfull' . mysqli_connect_error());
        }
//        this object is used for all querying used in MYSQL
        return $conn;
    }

