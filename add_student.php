<?php include("home.php"); ?>
<?php
require("connect_db.php");

function h($s){ return htmlspecialchars($s ?? "", ENT_QUOTES, "UTF-8"); }

$student = [
    "student_code" => "",
    "student_name" => "",
    "gender"       => ""
];

echo "<center>";
echo "<form action='save_student.php' method='post'>";
echo "<table border='1' width='40%'>";

echo "<tr><td>student_Code:</td><td><input type='text' name='student_code' value='" . h($student["student_code"]) . "' required /></td></tr>";
echo "<tr><td>student_Name:</td><td><input type='text' name='student_name' value='" . h($student["student_name"]) . "' required /></td></tr>";
echo "<tr><td>gender:</td><td><input type='text' name='gender' value='" . h($student["gender"]) . "' required /></td></tr>";

echo "<tr><td colspan='2'><center><input type='submit' value='Submit' /></center></td></tr>";
echo "</table>";
echo "</form>";
echo "</center>";

?>
