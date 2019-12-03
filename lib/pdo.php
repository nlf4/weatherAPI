<?php
function GetConnection()
{
    global $WW_JENS;
    /*
    $dsn = "mysql:host=localhost;dbname=steden";
    $user = "root";
    $passwd = "steven123";
    */

    $dsn = "mysql:host=185.115.218.166;dbname=wdev_jens";
    $user = "wdev_jens";
    $passwd = "dsf5s64f65ds4f65ds4f";

    $pdo = new PDO($dsn, $user, $passwd);
    return $pdo;
}

function GetData( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->prepare($sql);
    $stm->execute();

    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function ExecuteSQL( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->prepare($sql);

    if ( $stm->execute() ) return true;
    else return false;
}

