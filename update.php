<?php
function activateAndBlock(){
    global $conn;
if($_SESSION['role']=='Admin')
{
 

if ($_GET['task'] == 1) {
	$sql = 'delete from users where user_id='.$_GET['id'];
 	$conn->query($sql);
 }
   //to block users;
else if ($_GET['task'] == 2){
	$sql = 'update users set state="blocked" where user_id='.$_GET['id'];
	
	$conn->query($sql);
    }
    //to activate users
    else{
    $sql ='update users set state="active" where user_id='.$_GET['id'];
	
	$conn->query($sql);	
    }
}
}
?>