<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "serene_space";

    $conn = mysqli_connect($servername, $username, $password ,$database);

    if(!$conn)
    {
        die("Sorry we fail to connect");
    }
?>