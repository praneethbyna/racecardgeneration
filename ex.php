<?php
@session_start();
require('Classes/PHPExcel.php');
require('Classes/PHPExcel/Writer/Excel2007.php');
$objPHPExcel=new PHPExcel();
$objPHPExcel->getProperties()->setCreator('');
$objPHPExcel->getProperties()->setLastModifiedBY('');
$objPHPExcel->getProperties()->setTitle('');
$objPHPExcel->getProperties()->setSubject('');
$objPHPExcel->getProperties()->setDescription('');

$objPHPExcel->setActiveSheetIndex(0);


	$date=$_SESSION['date'];
	$venue=$_SESSION['venue'];
	require_once("racecard.class.php");
	$obj = new racecard();
    $res=$obj->getracecarddetails($date,$venue);
    if(!empty($res['status']) && $res['status']==1)
    {
		$objPHPExcel->getActiveSheet()->SetCellValue('A1','Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1','Venue');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1','Total Races');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1','Start Time');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1','Interval');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1','Display Order');

		$objPHPExcel->getActiveSheet()->SetCellValue('A2',$res['date']);
		$objPHPExcel->getActiveSheet()->SetCellValue('B2',$res['venue']);
		$objPHPExcel->getActiveSheet()->SetCellValue('C2',$res['totalraces']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D2',$res['st_time']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E2',$res['intrvl']);
		$objPHPExcel->getActiveSheet()->SetCellValue('F2',$res['dsply_order']);

		$objPHPExcel->getActiveSheet()->SetCellValue('A4','Race');
		$objPHPExcel->getActiveSheet()->SetCellValue('B4','Time');
		$objPHPExcel->getActiveSheet()->SetCellValue('C4','Declared horses');
		$objPHPExcel->getActiveSheet()->SetCellValue('D4','Withdrawn horses');
		$objPHPExcel->getActiveSheet()->SetCellValue('E4','Active horses');
		

		 $res1=$obj->getracesdetails($date,$venue);
		  if(!empty($res1['xstatus']) && $res1['xstatus']==1)
		  {
		  	$row=5;
		  		for($j=0;$j<$res1['ival'];$j++)
		  		{
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$row,'race'.$res1[$j]['racenumber']);
					$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row,$res1[$j]['time']);
					$objPHPExcel->getActiveSheet()->SetCellValue('C'.$row,$res1[$j]['declared_hrses']);
					$objPHPExcel->getActiveSheet()->SetCellValue('D'.$row,'w--'.$res1[$j]['withdrawn_hrses']);
					$objPHPExcel->getActiveSheet()->SetCellValue('E'.$row,$res1[$j]['active_hrses']);
					$racenumber=$j+1;

					$res2=$obj->getrunnersdetails($date,$venue,$racenumber);
					if(!empty($res2['xstatus']) && $res2['xstatus']==1)
					{
						for($k=0;$k<$res2['ival'];$k++)
						{
							$row=$row+1;
							$runnerid=$k+1;
							$objPHPExcel->getActiveSheet()->SetCellValue('C'.$row,'runner'.$runnerid);
					        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row,$res2[$k]['runnername']);
						}
					}


					$row=$row+2;
		  		}
		  		$pool=$obj->getpoolsdetails($date,$venue);
		  		if(!empty($pool['status']) && $pool['status']==1)
		  		{
		  			$row=$row+2;
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$row,'Single Leg Pools');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+1),'pool');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+1),'races');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+2),'WIN');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+2),$pool['win']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+3),'SHP');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+3),$pool['shp']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+4),'THP');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+4),$pool['thp']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+5),'PLA');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+5),$pool['pla']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+6),'QIN');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+6),$pool['qin']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+7),'FOR');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+7),$pool['for']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+8),'TNL');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+8),$pool['tnl']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+9),'EXA');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+9),$pool['exa']);

		  			$multi=$obj->getmultilegdetails($date,$venue);
		  			if(!empty($multi['status']) && $multi['status']==1)
		  			{
		  		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+11),'Multi Leg Pools');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+12),'pool');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+12),'races');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+13),'TRE1');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+13),$multi['tre1']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+14),'TRE2');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+14),$multi['tre2']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+15),'TRE3');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+15),$multi['tre3']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+16),'JKP1');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+16),$multi['jkp1']);
		  			$objPHPExcel->getActiveSheet()->SetCellValue('A'.($row+17),'JKP2');
		  			$objPHPExcel->getActiveSheet()->SetCellValue('B'.($row+17),$multi['jkp2']);
		  			
		  			}
	

		  			
		  			
		  			


		  		}


		  }


    }
    else
    {
    	$objPHPExcel->getActiveSheet()->SetCellValue('A2','kk');
		$objPHPExcel->getActiveSheet()->SetCellValue('B2','kkk');
		$objPHPExcel->getActiveSheet()->SetCellValue('C2','kkkk');
		$objPHPExcel->getActiveSheet()->SetCellValue('D2','uhuhu');
		$objPHPExcel->getActiveSheet()->SetCellValue('E2','yft');
		$objPHPExcel->getActiveSheet()->SetCellValue('F2','hvvv');

    }








$filename="exported-on-".date("Y-m-d-h-i-s").'.xlsx';
 //$filename="byna.xlsx";
$objPHPExcel->getActiveSheet()->setTitle("example");
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
$writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$writer->save('php://output');
exit;

?>