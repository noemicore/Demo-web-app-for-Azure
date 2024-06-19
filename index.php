<?php
session_start();
if (!isset($_SESSION['User_name']) and !isset($_SESSION['id'])) {
  header("Location: login.html");
}
?>

<?php
$host = "dbutt.mysql.database.azure.com";
$username = "administrador";
$password = "LN123456*";
$database = "utt";


// Make a connection
$conn = new mysqli($host, $username, $password, $database);
// Check the connection
if ($conn->connect_error) {
  die("Kết nối tới cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/index.css">
  <title>Home page</title>
</head>


<?php
$stmt = $conn->prepare("Select * From student Where id = ?");
$stmt->bind_param("s", $id);

$id = $_SESSION['id'];

$stmt->execute(); // Add this line

$result = $stmt->get_result();
$row = mysqli_fetch_assoc($result); //hien thi len form
ini_set('display_errors', '0');

?>

<body>
  <div class="wraper">

    <div class="header">

      <div class="header__title">

        <div class="header__title__description" style="color: #fff;">
          <img src="assets/img/moon.png" alt="Icono de luna">
          <h1>MoviMoon</h1>
        </div>

        <div class="header__title__user">
          <h3>Student: <?php echo $row['Name'] ?></h3>
        </div>

      </div>

      <div class="header__system">
        <a href="" class="header__system__link">Home page</a>
        <a href="logout.php" class="header__system__link">Log off</a>
      </div>

    </div>

    <div class="container">

      <div class="container__information">

        <div class="container__information--col">

          <div class="container__information--row">
            <div class="container__information--title">Student Code:</div>
            <div class="container__information--id"><?php echo $row['Student_id'] ?></div>
          </div>

          <div class="container__information--row">
            <div class="container__information--title">Faculty: </div>
            <div class="container__information--department"><?php echo $row['Department'] ?></div>
          </div>

        </div>

        <div class="container__information--col">

          <div class="container__information--row">
            <div class="container__information--title">Full name:</div>
            <div class="container__information--name"><?php echo $row['Name'] ?></div>
          </div>

          <div class="container__information--row">
            <div class="container__information--title">Industry:</div>
            <div class="container__information--specialized"><?php echo $row['Specialized'] ?></div>
          </div>

        </div>

        <div class="container__information--col">

          <div class="container__information--row">
            <div class="container__information--title">Condition:</div>
            <div class="container__information--status">Studying</div>
          </div>

          <div class="container__information--row">
            <div class="container__information--title">Class: </div>
            <div class="container__information--class"><?php echo $row['Class'] ?></div>
          </div>

        </div>

      </div>

      <div class="container__scores">

        <table width="100%" align="center" border="1" style="border-collapse: collapse;">
          <tbody>
            <tr>
              <td class="container__scores__header">Academic Year</td>
              <td class="container__scores__header">Semester</td>
              <td class="container__scores__header">Cumulative GPA System 10 N1</td>
              <td class="container__scores__header">Cumulative GPA System 4 N1</td>
              <td class="container__scores__header">Accumulated Credits N1</td>
              <td class="container__scores__header">Semester GPA System 10 N1</td>
              <td class="container__scores__header">Semester GPA System 4 N1</td>
              <td class="container__scores__header">Credits N1</td>
            </tr>
            <tr>
              <td class="container__scores__row">2021_2022</td>
              <td class="container__scores__row">1</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row">16</td>
            </tr>
            <tr>
              <td class="container__scores__row">2021_2022</td>
              <td class="container__scores__row">2</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row">16</td>
            </tr>
            <tr>
              <td class="container__scores__row">2021_2022</td>
              <td class="container__scores__row">All Year</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row">16</td>
            </tr>
            <tr>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">Entire Course</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row">16</td>
            </tr>
            <tr>
          </tbody>
        </table>
        
        <?php
        // SQL Statement Preparation
        $stmt = $conn->prepare("SELECT * FROM `2022-2023_2` WHERE id = ?");

        // Assigning a value to a parameter
        $id = $_SESSION['id'];

        // Parameter Constraints
        $stmt->bind_param("s", $id);

        // Command Execution
        $stmt->execute();

        // Get Results
        $result = $stmt->get_result();

        // Counting records
        $tong_bg = $result->num_rows;

        $stt = 0;
        while ($row = $result->fetch_object()) {
          $stt++;
          $Subject_id[$stt] = $row->Subject_id;
          $Subject_name[$stt] = $row->Subject_name;
          $Subject_credits[$stt] = $row->Subject_credits;
          $Subject_times[$stt] = $row->Subject_times;
          $Student_id[$stt] = $row->Student_id;
          $Subject_attendance[$stt] = $row->Subject_attendance;
          $Midterm_exam[$stt] = $row->Midterm_exam;
          $Final_exam[$stt] = $row->Final_exam;
          $Discuss[$stt] = $row->Discuss;
        }
        ?>
      </div>
      
    </div>

    <div class="footer">

      <div class="footer__description">
        Hotline: 02435528978
      </div>

    </div>

  </div>
</body>
</html>
