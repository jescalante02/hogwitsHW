<?php
$user = "csc3610";
$pw = "csc3610";
$db = "STUDENT";
$server = "45.55.136.114:3306";
require_once("db.php");
require_once("db2.php");
$DBH = new db2( $server, $user, $pw, $db );

if(isset($_GET["delete"])) {
    $id = $_GET["id"];
    $cId = $_GET["cId"];
    $Q = "delete from Courses where id='$id'";
    $DBH->setQueryPrepareAndSetResult($Q);
    //$stmt = $DBH->setQuery("DELETE FROM Courses WHERE id=?");
    //$stmt->bind_param("i", $id);
    //$stmt->execute();
    //$stmt->close();
    print ("Course $cId was removed");
}


if(isset($_GET["submit"])) {
    $type="sssis";
    $cId = $_GET['cId'];
    $title = $_GET['title'];
    $major = $_GET['major'];
    //$mSeats = 15;
    $mSeats = $_GET['mSeats'];
    $descr = $_GET['desc'];

    $Q ="insert into `Courses` (courseId, title, major, maxSeats, description) ";
    $Q .=  " values (?,?,?,?,?)";

    $parms = Array( $cId, $title, $major, $mSeats, $descr );
    $DBH->setQueryPrepareArrayParam( $Q, $type, $parms );

    print("Course $cId was added");
}
?>

<br \>
<a href="Main.php">BACK</a>


