<?php
require("connect_db.php");
$course_code = $_GET["course_code"];
$sql = "SELECT * FROM courses WHERE course_code='$course_code'";
$result = mysqli_query($conn, $sql);
$courses = mysqli_fetch_assoc($result);

$sql = "SELECT E.*,S.student_name";
$sql .= " FROM exam_results AS E";
$sql .= " INNER JOIN students AS S ON E.student_code=S.student_code";
$sql .= " WHERE E.course_code='$course_code'";
$result = mysqli_query($conn, $sql);
echo "<center>";
echo "<h1>Exam Result " . $courses["course_name"] . "</h1><h2> ". $courses["course_code"] . "</h2>";
echo "<table border=1 width=50%>";
echo "<tr><th>Student Code</th><th>Student Name</th><th>Point</th><th>Operation</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["student_code"] . "</td><td>" . $row["student_name"]
    . "</td><td>" . $row["point"] .
    "</td><td>
        <a href=edit_exam_result.php?id=" . $row["id"] . "&course_code=$course_code>Edit</a> 
        <a href=delete_exam_result.php?id=" . $row["id"] . "&course_code=$course_code onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a>
    </td></tr>";
}
echo "</table>";
echo "<a href='add_exam_result.php?course_code=$course_code'>Add Exam</a>";
echo "</center>";