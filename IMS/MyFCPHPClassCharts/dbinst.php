<?php
@session_start();
if (!$_SESSION['user'] || !$_SESSION['pass']) {

// What to do if the user hasn't logged in
// We'll just redirect them to the login page.
header('Location: ../../login.php');
die();
} else {

$link_id=@mysql_connect("localhost",$_SESSION['user'],$_SESSION['pass'])
        or die("Couldn't connect to Mysql server,Try Again.");
@mysql_select_db("simplyth_institute")
or die("Couldn't select mobile database,please try again.");
}
?>