<?php
$user = "csc3610";
$pw = "csc3610";
$db = "STUDENT";
$server = "45.55.136.114:3306";
require_once("db.php");
require_once("db2.php");
$DBH = new db2( $server, $user, $pw, $db );

$Q ="select * from `Courses` ";
$DBH->setQuery( $Q );

print("<br><div class='tablediv'>");
print("<table border='1'>");
print("<tr><th>Course ID</th><th>Title</th><th>Major</th><th>Max Seats</th><th>Description</th><th></th></tr>");
while($row = $DBH->getResultRowAsAssoc()) {
    print('<tr>
    <td>'.$row["courseId"].'</td>
    <td>'.$row["title"].'</td>
    <td>'.$row["major"].'</td>
    <td>'.$row["maxSeats"].'</td>
    <td>'.$row["description"].'</td>
    <td>
        <form action="results.php" method="get">
            <input type="hidden" name="id" value="'.$row["id"].'">
            <input type="hidden" name="cId" value="'.$row["courseId"].'">            
            <input type="submit" name="delete" value="Delete">
        </form>
    </td>
    </tr>');
}

print("</table>");
print("</div>");

?>

<br>
<div class="tablediv">
    <form action="Results.php" method="get">
        <table>
            <tr><td>Course ID:</td><td><input type='text' name='cId' pattern='[A-Za-z]{3}\d{4}' required></td></tr>
            <tr><td>Title:</td><td><input type='text' name='title' required></td></tr>
            <tr><td>Major:</td><td><input type='text' name='major' required></td></tr>
            <tr><td>Max Seats (8-150):</td><td><input type='text' name='mSeats' pattern='^([8-9]|[1-9][0-9]|1[0-4][0-9]|150)$' required></td></tr>
            <tr><td>Description:</td><td><input type='text' name='desc' required></td></tr>
        </table>
        <input type='submit' name='submit'>
    </form>
</div>


