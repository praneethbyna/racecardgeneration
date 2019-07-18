 <html>
<head>
  
  <title>Race Card Entry</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="chosen.min.css">
  <script type="text/javascript" src="select.js"></script>
  <script type="text/javascript" src="chosen.jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
  <div class="row">
    <div class="col-md-3">
      &nbsp;
    </div>
     <div class="col-md-6">
      <b>Race Card Created .</b>
  
    </div>

     <div class="col-md-3">
      &nbsp;
    </div>
  </div>
            <div class="row">
              <div class="col-md-3">
                &nbsp;
              </div>
              <div class="col-md-6">
              <form action="ex.php" method="POST">
                <input type="submit" name="exp_excel" value="Export to Excel" class="btn btn-primary" />
              </form>
            </div>
            <div class="col-md-3">
              &nbsp;
            </div>
            </div>
            </body>
            </html>
 
<?php
@session_start();



if(!empty($_POST['ddate']) && !empty($_POST['venue']) && !empty($_POST['totalraces']) && !empty($_POST['st_hrs']) && !empty($_POST['intrvl']) && !empty($_POST['dsply_order']) && !empty($_POST['st_min']))
{
   $_SESSION['date']=$_POST['ddate'];
   $_SESSION['venue']=$_POST['venue'];
   $ddate=$_POST['ddate'];
   $venue=$_POST['venue'];
   $totalraces=$_POST['totalraces'];
   $st_hrs=$_POST['st_hrs'];
   $st_min=$_POST['st_min'];
   $intrvl=$_POST['intrvl'];
   $dsply_order=$_POST['dsply_order'];
   $st_time=$st_hrs.":".$st_min;
    require_once("racecard.class.php");

    $obj = new racecard();
    $res=$obj->addracecarddetails($ddate,$venue,$totalraces,$st_time,$intrvl,$dsply_order);
    if(!empty($res['status']) && ($res['status']==1))
    {
     // echo "inserted racedate details<br/>";
      for($i=0;$i<$totalraces;$i++)
      {
        $racenumber=$i+1;
        $time=$_POST["st_time".($i+1)];
        $declared_hrses=$_POST["declared_hrses".($i+1)];
        $withdrawn_hrses=$_POST["withdrawn_hrses".($i+1)];
        $active_hrses=$_POST["active_hrses".($i+1)];
        $res1=$obj->addracesdetails($ddate,$venue,$racenumber,$time,$declared_hrses,$withdrawn_hrses,$active_hrses);
        if(!empty($res1['status']) && $res1['status']==1)
        {
         // echo "hoooohh";
          for($j=0;$j<$declared_hrses;$j++)
          {
            $runnername=$_POST["race".$racenumber."runner".($j+1)];
            $res2=$obj->addrunnerdetails($racenumber,$runnername,$ddate,$venue);
          }
            if(!empty($res2['status']) && $res['status']==1)
            {
              
           //   echo "race card created";

             
            }
            else
            {
             // echo "nothing bro";
            }
          
        }
        else
        {
         // echo "noo bro";
        }
      }

              $win=$_POST['win'];
              $shp=$_POST['shp'];
              $thp=$_POST['thp'];
              $pla=$_POST['pla'];
              $qin=$_POST['qin'];
              $for=$_POST['for'];
              $tnl=$_POST['tnl'];
              $exa=$_POST['exa'];
              if($win=='')
              {
                $win='0';
              }
              if($shp=='')
              {
                $shp='0';
              }
              if($thp=='')
              {
                $thp='0';
              }
              if($pla=='')
              {
                $pla='0';
              }
              if($qin=='')
              {
                $qin='0';
              }
              if($for=='')
              {
                $for='0';
              }
              if($tnl=='')
              {
                $tnl='0';
              }
              if($exa=='')
              {
                $exa='0';
              }
              
              $pool=$obj->addpooldetails($ddate,$venue,$win,$shp,$thp,$pla,$qin,$for,$tnl,$exa);
              if(!empty($pool['status']) && $pool['status']==1)
              {
               // echo "pools inserted";
              }
              else
              {
               // echo "pools not inserted";
              }


              $tre1=$_POST['tre1'];
              $tre2=$_POST['tre2'];
              $tre3=$_POST['tre3'];
              $jkp1=$_POST['jkp1'];
              $jkp2=$_POST['jkp2'];
              if($tre1=='')
              {
                $tre1='0';
              }
              if($tre2=='')
              {
                $tre2='0';
              }
              if($tre3=='')
              {
                $tre3='0';
              }
              if($jkp1=='')
              {
                $jkp1='0';
              }
              if($jkp2=='')
              {
                $jkp2='0';
              }

              $mulpool=$obj->addmultipooldetails($ddate,$venue,$tre1,$tre2,$tre3,$jkp1,$jkp2);
                if(!empty($mulpool['status']) && $mulpool['status']==1)
                {
                //  echo "multi legs inserted";
                }
                else
                 // echo "mul legs not inserted";

             

        if(!empty($res2['status']) && $res['status']==1)
        {
       ?>

              <?php
            }

    }
  
    else
    {
   //   echo "sry";
    }

    
   
    
  
}
else{

  
//  echo "invalid credentials";
 // header('Location: ./');
}

?>
