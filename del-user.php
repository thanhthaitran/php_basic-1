<?php
	include("dbconnect.php");
	$conn = connect();
  if(isset($_REQUEST['id_user']) and $_REQUEST['id_user'] > 0){
		$id_user = $_REQUEST['id_user'];
	}else{
		header("location:index.php");
		exit();
	}
	$sql = "delete from users where id = {$id_user}";
	$result = $conn->query($sql);
	if($result == true){
		header("location:index.php?msg=Xóa người dùng thành công");
		exit();
	}else{
		echo "Có lỗi xảy ra";
	}
?>