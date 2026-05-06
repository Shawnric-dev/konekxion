<?php
class DBQuerries{
	private $con;

	function __construct(){
		require dirname(__FILE__).'/Connector.php';
		$db = new Connector();
		$this->con = $db->connect();

		// $db = new K_Connector();
		// $this->kcon = $db->kconnect();
	}
	
	// ___ CLINIC START ____
	function createClinic($name, $slogan, $img_loc, $state){
		$q='insert into clinic(name, slogan, img_loc, state) values (?,?,?,?)';
		$stmt = $this->con->prepare($q);
		$stmt->bind_param('sssi', $name, $slogan, $img_loc, $state);
		
		$id=-1;
		if($stmt->execute())
			$id=$this->con->insert_id;
		
		return $id;
	}
	// ___ CLINIC END ______


	// ___ BRANCH START ____
	function createClinicBranch($address, $contact, $email, $webiste, $state, $clinic_id){
		$q='insert into clinic_branch(address, contact, email, webiste, state, clinic_id) values(?,?,?,?,?,?)';
		$stmt = $this->con->prepare($q);
		$stmt->bind_param('ssssii', $address, $contact, $email, $webiste, $state, $clinic_id);
		
		$id=-1;
		if($stmt->execute())
			$id=$this->con->insert_id;
		
		return $id;
	}
	// ___ BRANCH END ______


	// ___ USER START ____
	function createClinicUser($name, $pass, $full_name, $contact, $email, $state, $type, $reg_date, $img_loc, $branch_id){
		$q='insert into user(name, pass, full_name, contact, email, state, type, reg_date, img_loc, branch_id) values (?,?,?,?,?,?,?,?,?,?)';
		$stmt = $this->con->prepare($q);
		$stmt->bind_param('sssssiissi', $name, $pass, $full_name, $contact, $email, $state, $type, $reg_date, $img_loc, $branch_id);
		
		$id=-1;
		if($stmt->execute())
			$id=$this->con->insert_id;
		
		return $id;
	}
	// ___ USER END ______


	// ____ SUBSCRIPTION START ____
	function createSubscription($pkgID, $addFrom, $intrvl, $clinicID){
		// $addFrom='curdate()'; 
	    $subInts=array('12 month', '3 month', '1 month', FREE_TRIAL.' day');

		$q="insert into subscription(sub_pkg, sub_start, sub_end, clinic_id) values('$pkgID', curdate(), date_add('$addFrom', interval $subInts[$intrvl]), $clinicID)";	    

	   	$stmt=$this->con->prepare($q);	
	   	
	   	// return $q;
	   	if($stmt->execute()) 
	   		return $this->con->insert_id;	
		else 
			return -1;
	}

	function createBranchSubs($subID, $branchIDs){

		$q='insert into subscription_branch(sub_id, branch_id) values(?,?);';
		$stmt=$this->con->prepare($q);

		$stmt->bind_param('ii', $subID, $branchID);

		$len=sizeof($branchIDs);

		for ($i=0; $i < $len; $i++) { 
			$branchID=$branchIDs[$i];
			// $branchID = $fg['branch_id'];
			$stmt->execute();
		}
	}
	// ____ SUBSCRIPTION END ______


	// ____ USER START ____
	function readUserData($user,$pass){
		$stmt=$this->con->prepare('select state from user where name=? and pass=?');
		$stmt->bind_param('ss',$user,$pass);
		$stmt->execute();

		return $stmt->get_result()->fetch_assoc();
	}
	// ____ USER END ______
}
?>