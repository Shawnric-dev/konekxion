<?php
class CodeHolder{

	private $g_indexNum=null;
	private $g_len=null;

	function __construct(){}

	function getKeyCodeNum($numBranches, $subInterval){
		$indexNumber=rand(0, 199);
		$len=rand(0, 3); //$len=array(4, 14, 9, 12);
		$branchRandom=rand(1, 5);

		$prefix=array('RFK','GYT','PCL','JKD'); // Cannot contain numbers
		$sufix=array('HJ','EV','TL','XC'); // Cannot contain numbers

		//if($numBranches==1)
		//	$numBranches='';

		$indexNumber*=4;

		$this->g_indexNum = $indexNumber;
		$this->g_len = $len;

		$numBranches*=$branchRandom;

		//  $subInterval=0: Annual, 1: Trimestral, 2: Monthly

		// Preffix + indexNum (0-199) + len + Suffix + Number of branches 
		$code=$prefix[$len].$indexNumber.$len.$subInterval.$sufix[$len].$numBranches.$branchRandom;     

		return $code;
	}

	function getIndexNum(){
		return $this->g_indexNum;
	}

	function getLen(){
		return $this->g_len;
	}

	function getKey($index, $len){
		include_once dirname(__FILE__).'/Constants.php';
		$lens=array(7, 14, 9, 12);
		$code=substr(CODES[$index], 0, $lens[$len]);

		return $code;
	}

	// Get key from Lock Code
}
?>