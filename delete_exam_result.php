<?php
require("connect_db.php");
$id = $_GET["id"];
$course_code = $_GET["course_code"];
$sql = "DELETE FROM exam_results WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: show_exam_result.php?course_code=$course_code");
exit(0);
?>