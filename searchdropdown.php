<?php
$conn=new mysqli("localhost","root","","horserace");
$getData='';
if(isset($_GET['term']))
{
$getData=$_GET['term'];
}
//$getData="st";
$query=$conn->query("select name from horsenames where name LIKE '%".$getData."%'");
while($row=$query->fetch_assoc()){
	$data[]=$row['name'];

}
echo json_encode($data);


?>