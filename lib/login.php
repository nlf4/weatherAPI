<?php
$login_form = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];

if ( $formname == "login_form" AND $buttonvalue == "Log in" )
{
    if ( ControleLoginWachtwoord( $_POST['usr_login'], $_POST['usr_paswd'] ) )
    {
        $_SESSION["msg"][] = "Welkom, " . $_SESSION['usr']['usr_voornaam'] . "!" ;
        LogLoginUser();
        header("Location: " . $_application_folder . "/steden.php");
    }
    else
    {
        $_SESSION["msg"][] = "Sorry! Verkeerde login of wachtwoord!";
        header("Location: " . $_application_folder . "/login.php");
    }
}
else
{
    $_SESSION["msg"][] = "Foute formname of buttonvalue";
}
?>