<?PHP


// Add slashes to the username, and make a md5 checksum of the password.
$_POST['username'] = @addslashes($_POST['username']);
$_POST['password'] = @($_POST['password']);

$linkid=@mysql_connect("localhost",$_POST['username'],$_POST['password']);

if (!$linkid) {

// When the query didn't return anything,
// display the login form.

echo "<center><br><br><br><h3>Admin Login</h3>
<form action='$_SERVER[PHP_SELF]' method='post'>
Username: <input type='text' name='username'><br><br>
Password: <input type='password' name='password'><br><br>
<input type='submit' value='Login'>
</form></center>";

} else {

// Start the login session
session_start();

// We've already added slashes and MD5'd the password
$_SESSION['user'] = $_POST['username'];
$_SESSION['pass'] = $_POST['password'];

// All output text below this line will be displayed
// to the users that are authenticated. Since no text
// has been output yet, you could also use redirect
// the user to the next page using the header() function.
header('Location: IMS/index.html');

}

?> 