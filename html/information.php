<?php 
$link = mysqli_connect('db','root','12345678');
if (!$link){
	die('Error:' . mysqli_error());
}
echo 'Good!';
mysqli_close($link);
?>
