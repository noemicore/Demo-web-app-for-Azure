<?php
session_start();

// Cancel all session variables
$_SESSION = array();

// If there is a session cookie, cancel it by setting it to expire
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 86400, '/');
}

// Canceling a session
session_destroy();

// Redirect users to the login page
header("Location: login.html");
exit();
?>