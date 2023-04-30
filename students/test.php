<?php 
session_start();
include "../config/dBase.php";
require_once "student.class.php";
/*$email = $_SESSION['email'];
$student = new Student();
echo $student->data($email)['email'];
*/
$db = new dBase();
$notifications = $db->query("SELECT * FROM `notifications`", []);
var_dump($notifications);

?>