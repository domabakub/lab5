<?php
require("connect_db.php");
$id = $_POST["id"];
$course_code = $_POST["course_code"];
$student_code = $_POST["student_code"];
$point = $_POST["point"];
$sql ="UPDATE exam_results SET student_code='$student_code', point='$point' WHERE id='$id'";
mysqli_query($conn, $sql) or die("Update Error: " . mysqli_error($conn));
header("location: show_exam_result.php?course_code=$course_code");
exit(0);
?>