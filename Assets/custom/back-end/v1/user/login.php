<?php
	require_once '../../includes/DBQuerries.php';
	$resp=array();
	$resp['res']=null;

	if($_SERVER['REQUEST_METHOD']=='POST'){

		if(isset($_POST['user']) && isset($_POST['pass'])){

			$db=new DBQuerries();
			$resp['res']=$db->readUserData($_POST['user'], $_POST['pass']);
		}
		else $resp['report']='Data not set';
	}
	else $resp['report']='Invalid request';

	echo json_encode($resp);
?>