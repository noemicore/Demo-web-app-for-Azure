<?php
    session_start();


    $host = "dbutt.mysql.database.azure.com";
    $username = "administrador";
    $password = "LN123456*";
    $database = "utt";


    // Make a connection
    $conn = new mysqli($host, $username, $password, $database);
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối tới cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
    // else{
    //    echo ("ket noi thanh cong");
    // }

    $User = $_POST["User"];
    $Password = $_POST["Password"];

    // Extract input data with a function
    $Input_user = mysqli_real_escape_string($conn, $User);
    $Input_pass = mysqli_real_escape_string($conn, $Password);

   $sql = "SELECT * FROM `account` WHERE User = '$Input_user' and Password = '$Input_pass'";
   

    $result = mysqli_query($conn, $sql);

    // Disable Error Display
    ini_set('display_errors', '0');

    $count = mysqli_num_rows($result);

    if($count == 1){
        
        $_SESSION['User_name'] = $User;
        $_SESSION['id'] = 1; 
        header('Location: index.php');
    } else{
        header('Location: login.html');
    }
?>

 <?php
    // // Get data from the login form
    // $User = $_POST["User"];
    // $Password = $_POST["Password"];

    // // Make a connection
    // $conn = mysqli_connect("localhost","root","") or die ;
    // // Find a database to work with
    // mysqli_select_db($conn,"utt") or die;
    // // query statement
    // echo $sql_insert_account ="SELECT * FROM `account` WHERE User = '$User' and Password = '$Password'";

    // ini_set('display_errors', '0');
    // // Make a query
    // $result = mysqli_query($conn, $sql_insert_account);
    // $count = mysqli_num_rows($result);

    // if($count == 1){
    //     $_SESSION['User_name'] = $User; 
    //     header('Location: index.php');
    // } else{
    //     header('Location: login.html');
    // }
?>



<?php 
//     // Filter usernames and passwords to remove special characters.
//     $User = filter_input(INPUT_POST, 'User', FILTER_SANITIZE_STRING);
//     $Password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);

//     // Make a connection
//     $conn = mysqli_connect("localhost","root","") or die ;
//     // Find a database to work with
//     mysqli_select_db($conn,"utt") or die;

//     // Clean usernames and passwords before they are used in SQL queries
//    $User = mysqli_real_escape_string($conn, $User);
//    echo  $User;
//    $Password = mysqli_real_escape_string($conn, $Password);
//    $Password;

//     echo$sql_insert_account ="SELECT * FROM `account` WHERE User = '$User' and Password = '$Password'";

//     ini_set('display_errors', '0');


//     // Make a query
//     $result = mysqli_query($conn, $sql_insert_account);
//     $count = mysqli_num_rows($result);

//     if($count == 1){
//         $_SESSION['User_name'] = $User; 
//         // header('Location: index.php');
//     } else{
//         // header('Location: login.html');
//     }
?>  
