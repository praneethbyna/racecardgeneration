<?php
@session_start();
$output='';
if(isset($_POST['exp_excel']))
{
	$date=$_SESSION['date'];
	$venue=$_SESSION['venue'];
	require_once("racecard.class.php");
	 $obj = new racecard();
    $res=$obj->getracecarddetails($date,$venue);
    var_dump($res);

}


?>