<?php
require("connect_db.php");
$course_code =$_GET["course_code"]  ;
echo "<center>";
echo "<form action=save_add_exam_result.php method=post>";
echo "<table border=1 width=41%>";
echo "<input type='hidden' name='course_code' value='" . htmlspecialchars($course_code, ENT_QUOTES) . "' />";
$sql = "SELECT s.student_code, s.student_name 
        FROM students AS s
        WHERE s.student_code NOT IN (
            SELECT e.student_code 
            FROM exam_results AS e 
            WHERE e.course_code = '" . mysqli_real_escape_string($conn, $course_code) . "'
        )
        ORDER BY s.student_code";

$result = mysqli_query($conn, $sql);

echo "<tr><td>Student Code:</td><td>";
if (mysqli_num_rows($result) > 0) {
    echo "<select name='student_code'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . htmlspecialchars($row['student_code'], ENT_QUOTES) . "'>" 
            . htmlspecialchars($row['student_code'] . " - " . $row['student_name'], ENT_QUOTES) 
            . "</option>";
    }
    echo "</select>";
} else {
    echo "NO STUDEN";
}
echo "<tr><td>Point:</td><td><input type=text name=point /></td></tr>";
echo "<tr><td colspan=2><center><input type=submit value=Submit /></center></td></tr>";
echo "</table>";
echo "</form>";
echo "</center>";
?>  