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
          TRUONG UNIVERSITY OF TRANSPORT TECHNOLOGY
        </div>

        <div class="header__title__user">
          <h3>Student: <?php echo $row['Name'] ?></h3>
        </div>

      </div>
      <div class="header__system">
        <a href="" class="header__system__link">Home page</a>
        <a href="logout.php" class="header__system__link">Log off</a>
        <a href="" class="header__system__link">Help</a>
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
          <div class="container__information--row">
            <div class="container__information--title">Semester:</div>
            <select class="container__information--semester" name="Product_Type">
              <option value="">2021_2022_1</option>
              <option value="">2021_2022_2</option>
              <option value="">2022_2023_1</option>
              <option value="">2022_2023_2</option>
            </select>
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
          <div class="container__information--row">
            <div class="container__information--title">Filter:</div>
            <select class="container__information--semester" name="Product_Type">
              <option value="">View graded modules</option>
              <option value="">EN</option>
            </select>
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
              <td class="container__scores__header">Cumulative GPA System 10 N2</td>
              <td class="container__scores__header">Cumulative GPA System 4 N1</td>
              <td class="container__scores__header">Cumulative GPA System 4 N2</td>
              <td class="container__scores__header">Accumulated Credits N1</td>
              <td class="container__scores__header">Accumulated Credits N2</td>
              <td class="container__scores__header">Semester GPA System 10 N1</td>
              <td class="container__scores__header">Semester GPA System 10 N2</td>
              <td class="container__scores__header">Semester GPA System 4 N1</td>
              <td class="container__scores__header">Semester GPA System 4 N2</td>
              <td class="container__scores__header">Credits N1</td>
              <td class="container__scores__header">Credits N2</td>
            </tr>
            <tr>
              <td class="container__scores__row">2021_2022</td>
              <td class="container__scores__row">1</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row"></td>
            </tr>
            <tr>
              <td class="container__scores__row">2021_2022</td>
              <td class="container__scores__row">2</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row"></td>
            </tr>
            <tr>
              <td class="container__scores__row">2021_2022</td>
              <td class="container__scores__row">All Year</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row"></td>
            </tr>
            <tr>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">Entire Course</td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">8.53</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">3.66</td>
              <td class="container__scores__row"></td>
              <td class="container__scores__row">16</td>
              <td class="container__scores__row"></td>
            </tr>
            <tr>
          </tbody>
        </table>

        <br>

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

        <h3>BẢNG ĐIỂM CHI TIẾT</h3>
        <table width="100%" align="center" border="1" style="border-collapse: collapse;">
          <tbody>
            <tr>
              <td class="container__scores__header">No.</td>
              <td class="container__scores__header">Course Code</td>
              <td class="container__scores__header">Credits</td>
              <td class="container__scores__header">Times Studied</td>
              <td class="container__scores__header">Times Examined</td>
              <td class="container__scores__header">Grade</td>
              <td class="container__scores__header">Is Final Grade</td>
              <td class="container__scores__header">Evaluation</td>
              <td class="container__scores__header">Student ID</td>
              <td class="container__scores__header">Attendance</td>
              <td class="container__scores__header">Midterm Exam</td>
              <td class="container__scores__header">Practice</td>
              <td class="container__scores__header">Final Exam</td>
              <td class="container__scores__header">Discussion</td>
              <td class="container__scores__header">Final Course Grade</td>
            </tr>

            <?php
            for ($i = 1; $i <= $tong_bg; $i++) {
            ?>
              <tr>
                <td class="container__scores__row"><?php echo $i ?></td>
                <td class="container__scores__row"><?php echo $Subject_id[$i] ?></td>
                <td class="container__scores__row"><?php echo $Subject_credits[$i] ?></td>
                <td class="container__scores__row"><?php echo $Subject_times[$i] ?></td>
                <td class="container__scores__row"><?php echo $Subject_times[$i] ?></td>
                <td class="container__scores__row"><?php echo $Subject_times[$i] ?></td>
                <td class="container__scores__row"><?php echo $Subject_name[$i] ?></td>
                <td class="container__scores__row"><?php ?></td>
                <td class="container__scores__row"><?php echo $Student_id[$i] ?></td>
                <td class="container__scores__row"><?php echo $Subject_attendance[$i] ?></td>
                <td class="container__scores__row"><?php echo $Midterm_exam[$i] ?></td>
                <td class="container__scores__row"><?php ?></td>
                <td class="container__scores__row"><?php echo $Final_exam[$i] ?></td>
                <td class="container__scores__row"><?php echo  $Discuss[$i] ?></td>
                <td class="container__scores__row"><?php echo ($Final_exam[$i] + $Discuss[$i] + $Midterm_exam[$i] + $Subject_attendance[$i]) / 4 ?></td>
              </tr>

            <?php
            }
            ?>
          </tbody>
        </table>

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