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
                


<?php
                  // session_start();

                  // // Cancel all session variables
                  // $_SESSION = array();

                  // // If you want to cancel the session entirely, you must also delete the session cookie.
                  // // Note: This will cancel the session, not just the session data!
                  // if (ini_get("session.use_cookies")) {
                  //     $params = session_get_cookie_params();
                  //     setcookie(session_name(), '', time() - 42000,
                  //         $params["path"], $params["domain"],
                  //         $params["secure"], $params["httponly"]
                  //     );
                  // }

                  // // Finally, cancel the session
                  // session_destroy();

                  // // Redirect users to the login page
                  // header("Location: login.html");
                  // exit;
                  ?>
                
