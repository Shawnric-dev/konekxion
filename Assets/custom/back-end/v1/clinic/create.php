<?php
require_once '../../includes/DBQuerries.php';
$resp=array();
$resp['user_id']=-1;

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(	isset($_POST['clnc_name']) // Clinic 
		&& isset($_POST['clnc_slogan']) 
		//&& isset($_POST['clnc_img_loc']) 

		&& isset($_POST['brnch_address']) 
		&& isset($_POST['brnch_contact']) 
		&& isset($_POST['brnch_email']) 
		&& isset($_POST['brnch_webiste']) 

		&& isset($_POST['usr_name']) 
		&& isset($_POST['usr_pass']) 
		&& isset($_POST['usr_full_name']) 
		&& isset($_POST['usr_contact']) 
		&& isset($_POST['usr_email']) 
		//&& isset($_POST['usr_img_loc']) 
		){

		$clinicState=2;
		
		$db = new DBQuerries();
		$date = date("Y-m-d H:i");

		$img_loc=null;

		// Create clinic
		$clinicID = $db->createClinic($_POST['clnc_name'], $_POST['clnc_slogan'], $img_loc, $clinicState);

		if($clinicID!=-1){
			$state=1;

			// Create a branch
			$branchID = $db->createClinicBranch($_POST['brnch_address'], $_POST['brnch_contact'], $_POST['brnch_email'], $_POST['brnch_webiste'], $state, $clinicID);

			if($branchID!=-1){

				// Subscribe
				$interval=2;// Month
				$subID=$db->createSubscription('FT', $date, $interval, $clinicID);

				if($subID!=-1){

					// Register branch sub
					$branchIDS=array($branchID);
					$db->createBranchSubs($subID, $branchIDS);
				
					// Create user
					$userType=0;// Admin user
					$resp['user_id'] = $db->createClinicUser($_POST['usr_name'], $_POST['usr_pass'], $_POST['usr_full_name'], $_POST['usr_contact'], $_POST['usr_email'], $state, $userType, $date, $img_loc, $branchID);
				}		
			}
		}
	}
	else $resp['report']='Data not set';
}
else $resp['report']='Invalid request';
	
echo json_encode($resp);
?>