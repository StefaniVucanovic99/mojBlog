<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "baza";


    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    function prepareStatement($connection, $sql) {
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement;
    }
    function getDataFromDatabase($connection, $sql) {
        $statement = prepareStatement($connection, $sql);
        return $statement->fetchAll();
    }

    function getSinglePostData($connection, $sql) {
        $statement = prepareStatement($connection, $sql);
        return $statement->fetch();
    }
    function insertIntoDB($connection, $sql) {
        $statement = $connection->prepare($sql);
        $statement->execute();
        return;
    }
?>