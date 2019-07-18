<?php
require_once("dbcredentials.php");
require_once("logs.php");

/**
 * Developed by ,
 */
class racecard extends DBCredentials
{
	private $classname = "racecard";
	private $logs = "";
	private $myconn = "";
	private $myerr = 0;

	public function __construct()
	{
		$this->logs = new Logs();
		$this->myconn = new mysqli($this->getHost(),$this->getUser(),$this->getPass(),$this->getDb());

		if (mysqli_connect_errno()) {
			$this->myerr = mysqli_connect_errno();
		}
	}

	

	public function addracecarddetails($date,$venue,$totalraces,$st_time,$intrvl,$dsply_order){
		$myname = $this->classname." - addracecarddetails - ";
		$res = array();
		$res['status'] = 0;

		if($this->myerr==0 && !empty($this->myconn)){
			
        $sqlqry = "INSERT INTO `racecard_details`(`date`,`venue`,`totalraces`,`st_time`,`intrvl`,`dsply_order`) VALUES (?,?,?,?,?,?)";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ssdsds",$date,$venue,$totalraces,$st_time,$intrvl,$dsply_order);
				if($stmt->execute()){
					if($this->myconn->affected_rows){
					  $res['status'] = 1;
					  $res['rows_affected'] = $this->myconn->affected_rows;
					}
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}
	
	
	public function addracesdetails($racedate,$venue,$racenumber,$time,$declared_hrses,$withdrawn_hrses,$active_hrses){
		$myname = $this->classname." - addracesdetails - ";
		$res = array();
		$res['status'] = 0;

		if($this->myerr==0 && !empty($this->myconn)){
			
        $sqlqry = "INSERT INTO `race_details`(`racedate`,`venue`,`racenumber`,`time`,`declared_hrses`,`withdrawn_hrses`,`active_hrses`) VALUES (?,?,?,?,?,?,?)";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ssdsdss",$racedate,$venue,$racenumber,$time,$declared_hrses,$withdrawn_hrses,$active_hrses);
				if($stmt->execute()){
					if($this->myconn->affected_rows){
					  $res['status'] = 1;
					  $res['rows_affected'] = $this->myconn->affected_rows;
					}
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}
	
	public function addrunnerdetails($racenumber,$runnername,$racedate,$venue){
		$myname = $this->classname." - addrunnerdetails - ";
		$res = array();
		$res['status'] = 0;

		if($this->myerr==0 && !empty($this->myconn)){
			
        $sqlqry = "INSERT INTO `runnerdetails`(`racenumber`,`runnername`,`racedate`,`venue`) VALUES (?,?,?,?)";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("dsss",$racenumber,$runnername,$racedate,$venue);
				if($stmt->execute()){
					if($this->myconn->affected_rows){
					  $res['status'] = 1;
					  $res['rows_affected'] = $this->myconn->affected_rows;
					}
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}



	public function addpooldetails($racedate,$venue,$win,$shp,$thp,$pla,$qin,$for,$tnl,$exa){
		$myname = $this->classname." - addpooldetails - ";
		$res = array();
		$res['status'] = 0;

		if($this->myerr==0 && !empty($this->myconn)){
			
        $sqlqry = "INSERT INTO `singlelegpools`(`date`,`venue`,`win`,`shp`,`thp`,`pla`,`qin`,`for`,`tnl`,`exa`) VALUES (?,?,?,?,?,?,?,?,?,?)";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ssssssssss",$racedate,$venue,$win,$shp,$thp,$pla,$qin,$for,$tnl,$exa);
				if($stmt->execute()){
					if($this->myconn->affected_rows){
					  $res['status'] = 1;
					  $res['rows_affected'] = $this->myconn->affected_rows;
					}
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}


	public function addmultipooldetails($racedate,$venue,$tre1,$tre2,$tre3,$jkp1,$jkp2){
		$myname = $this->classname." - addmultipooldetails - ";
		$res = array();
		$res['status'] = 0;

		if($this->myerr==0 && !empty($this->myconn)){
			
        $sqlqry = "INSERT INTO `multilegpools`(`date`,`venue`,`tre1`,`tre2`,`tre3`,`jkp1`,`jkp2`) VALUES (?,?,?,?,?,?,?)";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("sssssss",$racedate,$venue,$tre1,$tre2,$tre3,$jkp1,$jkp2);
				if($stmt->execute()){
					if($this->myconn->affected_rows){
					  $res['status'] = 1;
					  $res['rows_affected'] = $this->myconn->affected_rows;
					}
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}
	
	
	


	public function getracecarddetails($date,$venue){
		$res = array();
		$res['status']=0;
        $myname = $this->classname." - getracecarddetails - ";
		if($this->myerr==0 && !empty($this->myconn)){
			  $sqlqry = "SELECT `date`,`venue`,`totalraces`,`st_time`,`intrvl`,`dsply_order` FROM `racecard_details` WHERE `date`=? and `venue`=?";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ss",$date,$venue);
				if($stmt->execute()){
					$stmt->bind_result($date,$venue,$totalraces,$st_time,$intrvl,$dsply_order);
					while($stmt->fetch()){
						$res['status'] = 1;
						$res['date']=$date;
						$res['venue']=$venue;
						$res['totalraces']=$totalraces;
						$res['st_time']=$st_time;
						$res['intrvl']=$intrvl;
						$res['dsply_order']=$dsply_order;
							
						
					}
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}
	

	public function getracesdetails($date,$venue){
		$res1 = array();
		$res1['xstatus'] = 0;
		//$dt=date('Ymd');
        $myname = $this->classname." - getracesdetails - ";
		if($this->myerr==0 && !empty($this->myconn)){
			  $sqlqry = "SELECT `racenumber`,`time`,`declared_hrses`,`withdrawn_hrses`,`active_hrses` FROM `race_details` WHERE `racedate`=? and `venue`=?";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ss",$date,$venue);
				if($stmt->execute()){
					$stmt->bind_result($racenumber,$time,$declared_hrses,$withdrawn_hrses,$active_hrses);
					$i=0;
					while($stmt->fetch()){
						$res1['xstatus'] = 1;
						$res1[$i]['racenumber']=$racenumber;
						$res1[$i]['time'] = $time;
					    $res1[$i]['declared_hrses'] = $declared_hrses;
					      $res1[$i]['withdrawn_hrses'] = $withdrawn_hrses;
					      $res1[$i]['active_hrses']=$active_hrses;
						
						$i++;
					}
					$res1['ival']=$i;
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res1;
	}
	
	
public function getrunnersdetails($date,$venue,$racenumber){
		$res1 = array();
		$res1['xstatus'] = 0;
		//$dt=date('Ymd');
        $myname = $this->classname." - getrunnersdetails - ";
		if($this->myerr==0 && !empty($this->myconn)){
			  $sqlqry = "SELECT `runnername` FROM `runnerdetails` WHERE `racedate`=? and `venue`=? and `racenumber`=?";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ssd",$date,$venue,$racenumber);
				if($stmt->execute()){
					$stmt->bind_result($runnername);
					$i=0;
					while($stmt->fetch()){
						$res1['xstatus'] = 1;
						$res1[$i]['runnername']=$runnername;
						
						$i++;
					}
					$res1['ival']=$i;
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res1;
	}



	public function getpoolsdetails($date,$venue){
		$res = array();
		$res['status']=0;
        $myname = $this->classname." - getpoolsdetails - ";
		if($this->myerr==0 && !empty($this->myconn)){
			  $sqlqry = "SELECT `win`,`shp`,`thp`,`pla`,`qin`,`for`,`tnl`,`exa` FROM `singlelegpools` WHERE `date`=? and `venue`=?";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ss",$date,$venue);
				if($stmt->execute()){
					$stmt->bind_result($win,$shp,$thp,$pla,$qin,$for,$tnl,$exa);
					while($stmt->fetch()){
						$res['win'] = $win;
						$res['shp']=$shp;
						$res['thp']=$thp;
						$res['pla']=$pla;
						$res['qin']=$qin;
						$res['for']=$for;
						$res['tnl']=$tnl;
						$res['exa']=$exa;
						$res['status']=1;
							
						
					}
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}



	public function getmultilegdetails($date,$venue){
		$res = array();
		$res['status']=0;
        $myname = $this->classname." - getmultilegdetails - ";
		if($this->myerr==0 && !empty($this->myconn)){
			  $sqlqry = "SELECT `tre1`,`tre2`,`tre3`,`jkp1`,`jkp2` FROM `multilegpools` WHERE `date`=? and `venue`=?";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ss",$date,$venue);
				if($stmt->execute()){
					$stmt->bind_result($tre1,$tre2,$tre3,$jkp1,$jkp2);
					while($stmt->fetch()){
						$res['tre1'] = $tre1;
						$res['tre2']=$tre2;
						$res['tre3']=$tre3;
						$res['jkp1']=$jkp1;
						$res['jkp2']=$jkp2;
						$res['status']=1;
							
						
					}
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}
	
	
	
	
	

	public function __destruct(){
		if(!empty($this->myconn)){
		  $this->myconn->close();
		}
	}

}

 ?>
