<?php
function ReadPasswd()
{
    global $_application_folder;
    global $dbhost, $dbname, $dbuser, $dbpasswd;

    $contents = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $_application_folder . "/lib/passwd.php");
    $lines = explode("\n", $contents);

    foreach( $lines as $line)
    {
        $line = str_replace("\r", "", $line);               // \r verwijderen uit lijn
        list( $key, $value ) = explode("=", $line);
        $key = trim($key);                                        //spaties verwijderen uit key
        $value = trim($value);                                 //spaties verwijderen uit value

        if ( $key == "dbhost" ) $dbhost = $value;
        if ( $key == "dbname" ) $dbname = $value;
        if ( $key == "dbuser" ) $dbuser = $value;
        if ( $key == "dbpasswd" ) $dbpasswd = $value;
    }

}

function GetConnection()
{
    global $dbhost, $dbname, $dbuser, $dbpasswd;
    /*
    $dsn = "mysql:host=localhost;dbname=steden";
    $user = "root";
    $passwd = "steven123";
    */

    ReadPasswd();

    $dsn = "mysql:host=$dbhost;dbname=$dbname" ;
    $user = $dbuser ;
    $passwd = $dbpasswd ;

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

