<?php
require("connect_db.php");

$student_code = $_POST["student_code"] ?? "";
$student_name = $_POST["student_name"] ?? "";
$gender       = $_POST["gender"] ?? "";

$student_code = mysqli_real_escape_string($conn, $student_code);
$student_name = mysqli_real_escape_string($conn, $student_name);
$gender       = mysqli_real_escape_string($conn, $gender);

$sql = "INSERT INTO students (student_code, student_name, gender)
        VALUES ('$student_code', '$student_name', '$gender')";
mysqli_query($conn, $sql);

header("Location: student_list.php");
exit;
