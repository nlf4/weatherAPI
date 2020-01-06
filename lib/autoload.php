<?php
session_start();
$_SESSION["head_printed"] = false;
$_application_folder = "/wdev_steven/testremote";

require_once "passwd.php";
require_once "pdo.php";                          //database functies
require_once "view_functions.php";      //basic_head, load_template, replacecontent...
require_once "authorisation.php";      //controle login e.d.
require_once "show_messages.php";
require_once "user_log.php";

//redirect naar NO ACCESS pagina als de gebruiker niet ingelogd is en niet naar
//de loginpagina gaat
if ( ! isset($_SESSION['usr']) AND ! $login_form AND ! $register_form AND ! $no_access)
{
    header("Location: " . $_application_folder . "/no_access.php");
}
