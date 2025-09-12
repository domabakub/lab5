<?php
require("connect_db.php");
$id = $_GET["id"];
$course_code = $_GET["course_code"];
$sql = "SELECT * FROM exam_results WHERE id='$id'";
$result = mysqli_query($conn, $sql) or die("Query Error: " . mysqli_error($conn));
$exam_result = mysqli_fetch_assoc($result);

echo "<center>";
echo "<form action='save_exam_result.php' method='post'>";
echo "<table border=1 width=43%>";
echo "<input type='hidden' name='id' value='" . htmlspecialchars($exam_result["id"], ENT_QUOTES) . "' />";
echo "<input type='hidden' name='course_code' value='" . htmlspecialchars($exam_result["course_code"], ENT_QUOTES) . "' />";
echo "<input type='hidden' name='student_code' value='" . htmlspecialchars($exam_result["student_code"], ENT_QUOTES) . "' />";
echo "<tr><td>Course Code:</td><td><input type='text' value='" . htmlspecialchars($exam_result["course_code"], ENT_QUOTES) . "' readonly /></td></tr>";
echo "<tr><td>Student Code:</td><td><input type='text' value='" . htmlspecialchars($exam_result["student_code"], ENT_QUOTES) . "' readonly /></td></tr>";
echo "<tr><td>Point:</td><td><input type='text' name='point' value='" . htmlspecialchars($exam_result["point"]) . "' /></td></tr>";
echo "<tr><td colspan=2><center><input type='submit' value='Submit' /></center></td></tr>";
echo "</table>";
echo "</form>";
echo "</center>";
?>