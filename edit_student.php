<?php include("home.php"); ?>
<?php
require("connect_db.php");

// รับค่าให้เป็นตัวแปรที่ใช้จริง และกัน quote เบื้องต้น
$student_code = isset($_GET["student_code"]) ? mysqli_real_escape_string($conn, $_GET["student_code"]) : "";

// ดึงข้อมูลนักเรียน
$sql = "SELECT * FROM students WHERE student_code = '$student_code'";
$result = mysqli_query($conn, $sql);

// ถ้าเจอแถวให้เอามาใช้ ไม่งั้นตั้งค่าว่างไว้
$student = mysqli_fetch_assoc($result);
if (!$student) {
    $student = [
        "student_code" => "",
        "student_name" => "",
        "gender"       => ""
    ];
}

// ฟังก์ชันกัน HTML พัง/กัน XSS ตอนแสดงค่าใน value
function h($s) { return htmlspecialchars($s ?? "", ENT_QUOTES, "UTF-8"); }

echo "<center>";
echo "<form action='save_student.php' method='post'>";
echo "<table border='1' width='40%'>";

echo "<input type='hidden' name='student_code_edit' value='" . h($student_code) . "' />";

echo "<tr><td>student_Code:</td><td><input type='text' name='student_code' value='" . h($student["student_code"]) . "' /></td></tr>";
echo "<tr><td>student_Name:</td><td><input type='text' name='student_name' value='" . h($student["student_name"]) . "' /></td></tr>";
echo "<tr><td>gender:</td><td><input type='text' name='gender' value='" . h($student["gender"]) . "' /></td></tr>";

echo "<tr><td colspan='2'><center><input type='submit' value='Submit' /></center></td></tr>";
echo "</table>";
echo "</form>";
echo "</center>";
?>
