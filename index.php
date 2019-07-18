<?php
?>
<html>
<head>
  
  <title>Race Card Entry</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="chosen.min.css">
  <script type="text/javascript" src="select.js"></script>
  <script type="text/javascript" src="chosen.jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
    <script type="text/javascript">
            $(document).ready(function(){
                
            });
 </script>
 
</head>

<script type="text/javascript">
    function generateraces(){
     
      document.getElementById("rows").innerHTML=null;
      document.getElementById("pools").innerHTML=null;
      var noofraces=document.getElementById('totalraces').value;
      var i;
      document.getElementById("one").innerHTML="<h6>Race Card Races</h6>";
      document.getElementById("two").innerHTML="<td>Race Number<td>";
      document.getElementById("three").innerHTML="<td>Time<td>";
      document.getElementById("four").innerHTML="<td>Declared To start<td>";
      document.getElementById("five").innerHTML="<td>Withdrawn Runners<td>";
      document.getElementById("six").innerHTML="<td>Active Runners<td>";
      var racetimes=[];
      var hrs=(document.getElementById("st_hrs").value);
      var min=(document.getElementById("st_min").value);
      var intrvl=(document.getElementById("intrvl").value);
      for(i=0;i<noofraces;i++)
      {
          var k=hrs.toString()+':'+min.toString();
          racetimes[i]=k;          
          var int_hrs=parseInt(hrs);    
          var int_min=parseInt(min);        
          var int_interval=parseInt(intrvl)
          var totaltimeinmin=(int_hrs*60)+int_min+int_interval;        
          hrs=parseInt(totaltimeinmin/60);
          min=parseInt(totaltimeinmin%60);
          if(min==0)
            min='00';
          if(hrs>=24)
            hrs=hrs-24;
      }

      for(i=0;i<noofraces;i++)
      {
        if(racetimes[i]=='NaN:NaN')
          racetimes[i]=":";
      var newdiv = document.createElement('div');
      newdiv.innerHTML = "<br/><div class='row'><div class='col-md-2'>Race-" + (i + 1) + "</div><div class='col-md-2'> <input type='text' class='form-control' value='"+racetimes[i]+"' readonly required name='st_time"+(i+1)+"'></div> <div class='col-md-3'><div><input type='number' class='form-control' id='declared_hrses"+(i+1)+"' placeholder='eg:10' onchange='generaterunners("+i+")' required name='declared_hrses"+(i+1)+"'></div><div id='raceid"+(i+1)+"'></div></div><div class='col-md-2'> <input type='text' class='form-control' id='withdrawn_hrses"+(i+1)+"' placeholder='eg:1,2,3' onchange='removehorse("+i+")' required name='withdrawn_hrses"+(i+1)+"'></div><div class='col-md-3'><input type='text' onchange='generatepools("+i+")' readonly id='active_hrses"+(i+1)+"' class='form-control' required name='active_hrses"+(i+1)+"'></div></div>";
      document.getElementById("rows").appendChild(newdiv);
      }


      var newele = document.createElement('div');
      newele.innerHTML = "<h5>Single leg pools</h5><div class='row'><div class='col-md-3'><b>WIN</b></div><div class='col-md-4'><input type='text' id='winpool' name='win' class='form-control' readonly /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>SHP</b></div><div class='col-md-4'><input type='text' id='shppool' name='shp' class='form-control' readonly /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>THP</b></div><div class='col-md-4'><input type='text' id='thppool' name='thp' class='form-control' readonly /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>PLA</b></div><div class='col-md-4'><input type='text' id='plapool' name='pla' class='form-control' readonly /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>QIN</b></div><div class='col-md-4'><input type='text' id='qinpool' name='qin' class='form-control' readonly /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>FOR</b></div><div class='col-md-4'><input type='text' id='forpool' name='for' class='form-control' readonly /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>TNL</b></div><div class='col-md-4'><input type='text' id='tnlpool' name='tnl' class='form-control' readonly /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>EXA</b></div><div class='col-md-4'><input type='text' id='exapool' name='exa' class='form-control' readonly /></div><div class='col-md-5'>&nbsp;</div></div></br><h5>Multi leg pools</h5><div class='row'><div class='col-md-3'><b>TRE1</b></div><div class='col-md-4'><input type='text' id='tre1pool' autocomplete='off' onchange='validatemultileg1()' name='tre1' class='form-control' /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>TRE2</b></div><div class='col-md-4'><input type='text' id='tre2pool' name='tre2' onchange='validatemultileg2()' autocomplete='off' class='form-control' /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>TRE3</b></div><div class='col-md-4'><input type='text' id='tre3pool' autocomplete='off' name='tre3' onchange='validatemultileg3()' class='form-control' /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>JKP1</b></div><div class='col-md-4'><input type='text' id='jkp1pool' name='jkp1' onchange='validatemultileg4()' autocomplete='off' class='form-control' /></div><div class='col-md-5'>&nbsp;</div></div></br><div class='row'><div class='col-md-3'><b>JKP2</b></div><div class='col-md-4'><input type='text' id='jkp2pool' onchange='validatemultileg5()' autocomplete='off' name='jkp2' class='form-control' /></div><div class='col-md-5'>&nbsp;</div></div></br>";
      document.getElementById("pools").appendChild(newele);




        if(noofraces<5)
        {
          var element = document.getElementById("jkp1pool"); 
          var att = document.createAttribute("readonly");        
          att.value ="";           
          element.setAttributeNode(att);

          var element1 = document.getElementById("jkp2pool"); 
          var att1 = document.createAttribute("readonly");        
          att1.value ="";           
          element1.setAttributeNode(att1);
          

        }


          if(noofraces<3)
        {
          var element2 = document.getElementById("tre1pool"); 
          var att2 = document.createAttribute("readonly");        
          att2.value ="";           
          element2.setAttributeNode(att2);

          var element3 = document.getElementById("tre2pool"); 
          var att3 = document.createAttribute("readonly");        
          att3.value ="";           
          element3.setAttributeNode(att3);

           var element4 = document.getElementById("tre3pool"); 
          var att4 = document.createAttribute("readonly");        
          att4.value ="";           
          element4.setAttributeNode(att4);
          
          

        }
  
     
  
     
      


         }


      var exearr=[];
      var winarr=[];
      var shparr=[];
      var thparr=[];
      var plaarr=[];
      var qinarr=[];
      var forarr=[];
      var tnlarr=[];
      var exaarr=[];


      function validatemultileg1()
      {
        var tre1=document.getElementById('tre1pool').value;
         if(tre1=='')
              {
                tre1='0';
              }
              tre1=tre1+',';
              var tre1arr=[];
              var c1,i;
              var f1='';
             var noofraces=document.getElementById('totalraces').value;
             

        for(i=0;i<tre1.length;i++)
               {
            
                if(tre1[i]!=',')
                  {
                       f1=f1+tre1[i];
                  }
                 else
                   {
                      var r=parseInt(f1);
                      if(r!=0)
                      {
                      if((r>noofraces) || (r<0))
                      {
                        c1=2;
                        tre1arr.push(r);
                      }
                      else
                      {
                        var t=tre1arr.indexOf(r);
                        if(t!=-1)
                        {
                          tre1arr.push(r);
                          c1=1;
                        }
                        else{
                        tre1arr.push(r);
                      }
                                                
                        f1='';
                      }
                    }
                   }
              }
              if(c1==2)
              {
                alert("the entered race number in tre1 is not available");
                document.getElementById('tre1pool').value='';
                        
              }
              if(c1==1)
              {
                alert("u entered duplicate race in tre1");
                document.getElementById('tre1pool').value='';
              }
              if(tre1arr.length!=3)
                        {
                          alert("tre1 pool allows only three races");
                          document.getElementById('tre1pool').value='';
              
                        }



    

            

             

           
           



        
      }

      function validatemultileg2()
      {
        var tre2=document.getElementById('tre2pool').value;
         if(tre2=='')
              {
                tre2='0';
              }
              tre2=tre2+',';
              var tre2arr=[];
              var c2,i;
              var f2='';
             var noofraces=document.getElementById('totalraces').value;
             

        for(i=0;i<tre2.length;i++)
               {
            
                if(tre2[i]!=',')
                  {
                       f2=f2+tre2[i];
                  }
                 else
                   {
                      var r=parseInt(f2);
                      if(r!=0)
                      {
                      if((r>noofraces) || (r<0))
                      {
                        c2=2;
                        tre2arr.push(r);
                      }
                      else
                      {
                        var t=tre2arr.indexOf(r);
                        if(t!=-1)
                        {
                          tre2arr.push(r);
                          c2=1;
                        }
                        else{
                        tre2arr.push(r);
                      }
                                                
                        f2='';
                      }
                    }
                   }
              }
              if(c2==2)
              {
                alert("the entered race number in tre2 is not available");
                document.getElementById('tre2pool').value='';
                        
              }
              if(c2==1)
              {
                alert("u entered duplicate race in tre2");
                document.getElementById('tre2pool').value='';
              }
              if(tre2arr.length!=3)
                        {
                          alert("tre2 pool allows only three races");
                          document.getElementById('tre2pool').value='';
              
                        }




      }



      function validatemultileg3()
      {

         var tre3=document.getElementById('tre3pool').value;
         if(tre3=='')
              {
                tre3='0';
              }
              tre3=tre3+',';
              var tre3arr=[];
              var c3,i;
              var f3='';
             var noofraces=document.getElementById('totalraces').value;
             

        for(i=0;i<tre3.length;i++)
               {
            
                if(tre3[i]!=',')
                  {
                       f3=f3+tre3[i];
                  }
                 else
                   {
                      var r=parseInt(f3);
                      if(r!=0)
                      {
                      if((r>noofraces) || (r<0))
                      {
                        c3=2;
                        tre3arr.push(r);
                      }
                      else
                      {
                        var t=tre3arr.indexOf(r);
                        if(t!=-1)
                        {
                          tre3arr.push(r);
                          c2=1;
                        }
                        else{
                        tre3arr.push(r);
                      }
                                                
                        f3='';
                      }
                    }
                   }
              }
              if(c3==2)
              {
                alert("the entered race number in tre3 is not available");
                document.getElementById('tre3pool').value='';
                        
              }
              if(c3==1)
              {
                alert("u entered duplicate race in tre3");
                document.getElementById('tre3pool').value='';
              }
              if(tre3arr.length!=3)
                        {
                          alert("tre3 pool allows only three races");
                          document.getElementById('tre3pool').value='';
              
                        }






      }

      function validatemultileg4()
      {
         var tre2=document.getElementById('jkp1pool').value;
         if(tre2=='')
              {
                tre2='0';
              }
              tre2=tre2+',';
              var tre2arr=[];
              var c2;
              var f2='';
             var noofraces=document.getElementById('totalraces').value;
             

        for(i=0;i<tre2.length;i++)
               {
            
                if(tre2[i]!=',')
                  {
                       f2=f2+tre2[i];
                  }
                 else
                   {
                      var r=parseInt(f2);
                      if(r!=0)
                      {
                      if((r>noofraces) || (r<0))
                      {
                        c2=2;
                        tre2arr.push(r);
                      }
                      else
                      {
                        var t=tre2arr.indexOf(r);
                        if(t!=-1)
                        {
                          tre2arr.push(r);
                          c2=1;
                        }
                        else{
                        tre2arr.push(r);
                      }
                                                
                        f2='';
                      }
                    }
                   }
              }
              if(c2==2)
              {
                alert("the entered race number in jkp1 is not available");
                document.getElementById('jkp1pool').value='';
                        
              }
              if(c2==1)
              {
                alert("u entered duplicate race in jkp1");
                document.getElementById('jkp1pool').value='';
              }
              if(tre2arr.length!=5)
                        {
                          alert("jkp1 pool allows only five races");
                          document.getElementById('jkp1pool').value='';
              
                        }



   }


   function validatemultileg5()
   {

     var tre2=document.getElementById('jkp2pool').value;
         if(tre2=='')
              {
                tre2='0';
              }
              tre2=tre2+',';
              var tre2arr=[];
              var c2;
              var f2='';
             var noofraces=document.getElementById('totalraces').value;
             

        for(i=0;i<tre2.length;i++)
               {
            
                if(tre2[i]!=',')
                  {
                       f2=f2+tre2[i];
                  }
                 else
                   {
                      var r=parseInt(f2);
                      if(r!=0)
                      {
                      if((r>noofraces) || (r<0))
                      {
                        c2=2;
                        tre2arr.push(r);
                      }
                      else
                      {
                        var t=tre2arr.indexOf(r);
                        if(t!=-1)
                        {
                          tre2arr.push(r);
                          c2=1;
                        }
                        else{
                        tre2arr.push(r);
                      }
                                                
                        f2='';
                      }
                    }
                   }
              }
              if(c2==2)
              {
                alert("the entered race number in jkp2 is not available");
                document.getElementById('jkp2pool').value='';
                        
              }
              if(c2==1)
              {
                alert("u entered duplicate race in jkp2");
                document.getElementById('jkp2pool').value='';
              }
              if(tre2arr.length!=5)
                        {
                          alert("jkp2 pool allows only five races");
                          document.getElementById('jkp2pool').value='';
              
                        }






   }
     
      

         function generatepools(k)
         {


        

          var t;
          var noofraces=document.getElementById("totalraces").value;
          var a='';
          
        var rceid=k;
        var str=document.getElementById("active_hrses"+rceid).value+',';
          for(i=0;i<str.length;i++)
          {
            
            if(str[i]!=',')
            {
              a=a+str[i];
            }
            else
            {
              var r=parseInt(a);
              exearr.push(r);
              f='';
            }
          }
          if(exearr[0]!=0){
          var limit=exearr.length;
        }
          exearr=[];

          if(limit>=2){
            var l=winarr.indexOf(rceid);
            if(l==-1){
            winarr.push(rceid);
          }
        }
          else
          {
              for( var m = 0; m < winarr.length; m++){ 
              if ( winarr[m] === rceid) {
              winarr.splice(m, 1); 
              }
              }
          }


           if(limit>=4){
            var l=shparr.indexOf(rceid);
            if(l==-1){
            shparr.push(rceid);
          }
        }
          else
          {
              for( var m = 0; m < shparr.length; m++){ 
              if ( shparr[m] === rceid) {
              shparr.splice(m, 1); 
              }
              }
          }


           if(limit>=4){
            var l=thparr.indexOf(rceid);
            if(l==-1){
            thparr.push(rceid);
          }
        }
          else
          {
              for( var m = 0; m < thparr.length; m++){ 
              if ( thparr[m] === rceid) {
              thparr.splice(m, 1); 
              }
              }
          }


           if(limit>=4){
            var l=plaarr.indexOf(rceid);
            if(l==-1){
            plaarr.push(rceid);
          }
        }
          else
          {
              for( var m = 0; m < plaarr.length; m++){ 
              if ( plaarr[m] === rceid) {
              plaarr.splice(m, 1); 
              }
              }
          }

           if(limit>=4){
            var l=qinarr.indexOf(rceid);
            if(l==-1){
            qinarr.push(rceid);
          }
        }
          else
          {
              for( var m = 0; m < qinarr.length; m++){ 
              if ( qinarr[m] === rceid) {
              qinarr.splice(m, 1); 
              }
              }
          }
         

          if(limit>=4){
            var l=forarr.indexOf(rceid);
            if(l==-1){
            forarr.push(rceid);
          }
        }
          else
          {
              for( var m = 0; m < forarr.length; m++){ 
              if ( forarr[m] === rceid) {
              forarr.splice(m, 1); 
              }
              }
          }
         
          if(limit>=4){
            var l=tnlarr.indexOf(rceid);
            if(l==-1){
            tnlarr.push(rceid);
          }
        }
          else
          {
              for( var m = 0; m < tnlarr.length; m++){ 
              if ( tnlarr[m] === rceid) {
              tnlarr.splice(m, 1); 
              }
              }
          }

           if(limit>=5){
            var l=exaarr.indexOf(rceid);
            if(l==-1){
            exaarr.push(rceid);
          }
        }
          else
          {
              for( var m = 0; m < exaarr.length; m++){ 
              if ( exaarr[m] === rceid) {
              exaarr.splice(m, 1); 
              }
              }
          }
         
      
      var winpool='';
      var shppool='';
      var thppool='';
      var plapool='';
      var qinpool='';
      var forpool='';
      var tnlpool='';
      var exapool='';
     
         for(i=0;i<winarr.length;i++)
          {
           winpool=winpool+winarr[i].toString()+',';

          }
          winpool = winpool.substring(0, winpool.length-1);

          for(i=0;i<shparr.length;i++)
          {
           shppool=shppool+shparr[i].toString()+',';

          }
          shppool = shppool.substring(0, shppool.length-1);

          for(i=0;i<thparr.length;i++)
          {
           thppool=thppool+thparr[i].toString()+',';

          }
          thppool = thppool.substring(0, thppool.length-1);

          for(i=0;i<plaarr.length;i++)
          {
           plapool=plapool+plaarr[i].toString()+',';

          }
          plapool = plapool.substring(0, plapool.length-1);

          for(i=0;i<qinarr.length;i++)
          {
           qinpool=qinpool+qinarr[i].toString()+',';

          }
          qinpool = qinpool.substring(0, qinpool.length-1);

          for(i=0;i<forarr.length;i++)
          {
           forpool=forpool+forarr[i].toString()+',';

          }
          forpool = forpool.substring(0, forpool.length-1);

          for(i=0;i<tnlarr.length;i++)
          {
           tnlpool=tnlpool+tnlarr[i].toString()+',';

          }
          tnlpool = tnlpool.substring(0, tnlpool.length-1);

          for(i=0;i<exaarr.length;i++)
          {
           exapool=exapool+exaarr[i].toString()+',';

          }
          exapool = exapool.substring(0, exapool.length-1);

          

          document.getElementById("winpool").value=winpool;
          document.getElementById("shppool").value=shppool;
          document.getElementById("thppool").value=thppool;
          document.getElementById("plapool").value=plapool;
          document.getElementById("qinpool").value=qinpool;
          document.getElementById("forpool").value=forpool;
          document.getElementById("tnlpool").value=tnlpool;
          document.getElementById("exapool").value=exapool;
  
      

         }


      

         function removehorse(k)
         {
          var raceid=k+1;
          var noofrunners=document.getElementById("declared_hrses"+raceid).value;
          var withdrawnrunners=document.getElementById("withdrawn_hrses"+raceid).value+',';          
          var i;
          var runners=[];              
          for(i=0;i<noofrunners;i++)
          {
            runners.push(i+1);
          }
          var f='';
          var newmo=[];

          for(i=0;i<withdrawnrunners.length;i++)
          {
            
            if(withdrawnrunners[i]!=',')
            {
              f=f+withdrawnrunners[i];
            }
            else
            {
              var r=parseInt(f);
              newmo.push(r);
              f='';
            }
          }
          console.log(newmo);
          for(i=0;i<newmo.length;i++)
          {            
            for(var j=0;j<runners.length;j++)
            {
              if(newmo[i]==runners[j])
              {
                runners.splice(j,1);
              }
            }
              
          }     
          var activehorses='';
          for(i=0;i<runners.length;i++)
          {
            activehorses=activehorses+runners[i].toString()+',';

          }
          activehorses = activehorses.substring(0, activehorses.length-1);
           if(runners.length==0)
            activehorses='0';
          document.getElementById("active_hrses"+raceid).value=activehorses;

          if($("#active_hrses"+raceid).value=="") return false;

          generatepools(raceid);











  }

         function generaterunners(k)
         {
           
              var raceid=k+1;
              document.getElementById("raceid"+raceid).innerHTML=null;
              var with_hrs=document.getElementById("withdrawn_hrses"+raceid).value;
              if(with_hrs=='')
              {
                document.getElementById("withdrawn_hrses"+raceid).value='0';
              }
     
              var i;
              var noofdeclaredrunners=document.getElementById("declared_hrses"+raceid).value;
              for(i=0;i<noofdeclaredrunners;i++)
              {

                var newdiv = document.createElement('div');
                newdiv.innerHTML = "<input type='text' class='form-control' id='race"+raceid+"runner"+(i+1)+"' placeholder='runner"+(i+1)+"' required pattern='[A-Za-z ]*' title='only characters are allowed' name='race"+raceid+"runner"+(i+1)+"' />";

                document.getElementById("raceid"+raceid).appendChild(newdiv);
                 

                $("input[id='race"+raceid+"runner"+(i+1)+"']").autocomplete({
                    source:'searchdropdown.php',
                    minLength:1,
                    select: function (event, ui) {
                    var name = ui.item.value;
                    console.log(name);
                     var j;
                     var eleid="race"+raceid+"runner"+(i+1);
                      for(j=0;j<runners.length;j++)
                      {
                        if(name==runners[j])
                        {
                          console.log('present');
                          var t=1;
                          alert("runner already exists in racecard ");
                          name='';
                           document.getElementById(eleid).value=name;
                           break;

                       }
                        
                      }
                      if(t!=1){
                         document.getElementById(event.target.id).value=name;
                   
                      runners.push(name);
                      console.log(runners);
                    }
                   

                  }
                });
              }

              removehorse(k);
        }
        
      var runners=[];
      runners.push('ok');  

        
        

</script>
<body>
  <div class="container">
  <h6>Race Card Entry</h6>
  
<form action="racecardaction.php" method="POST">
  <div class="row">
    <div class="col-md-2">
    Date</br>
  <div class="form-group">
     <input type="date" class="form-control" id="racedate" required name="ddate" placeholder="">
  </div>

  
</div>
 <div class="col-md-2">
    Venue</br>
  <div class="form-group">
     <select class="form-control" id="venue" name="venue" required>
      <option value="" selected disabled>select venue</option>
      <option value="madras">Madras</option>
      <option value="ooty">Ooty</option>
      <option value="bangalore">Bangalore</option>
      <option value="mysore">Mysore</option>
      <option value="mumbai">Mumbai</option>
      <option value="pune">Pune</option>
      <option value="hyderabad">Hyderabad</option>
      <option value="calcutta">Calcutta</option>
      <option value="delhi">Delhi</option>
       </select>
  </div>
</div>
 <div class="col-md-2">
    Total Races</br>
  <div class="form-group">
     <input type="number" class="form-control" id="totalraces" name="totalraces" onchange="generateraces()" required placeholder="">
  </div>
</div>
 <div class="col-md-2">
     Start Time(24hrs)</br>
  <div class="form-group">
     <input type="number" class="form-control" id="st_hrs" name="st_hrs" onchange="generateraces()" required placeholder="hrs" min="0" max="24">
  </div>
</div>
 <div class="col-md-1">
    </br>
  <div class="form-group">
      <input type="number" class="form-control" id="st_min" name="st_min" onchange="generateraces()" required placeholder="min" min="0" max="59">
  </div>
</div>
 <div class="col-md-1">
    interval</br>
  <div class="form-group">
     <input type="number" class="form-control" id="intrvl" name="intrvl" required onchange="generateraces()" placeholder="min">
  </div>
</div>
 <div class="col-md-2">
    Display order</br>
  <div class="form-group">
     <select class="form-control" id="dorder" name="dsply_order" required>
      <option value="" selected disabled>select one</option>
      <option value="primary" >primary</option>
      <option value="secondary">secondary</option>
      <option value="teritiary">teritiary</option>
   
    </select>
     </div>

</div>

</div>
<div class="row">
  <div class="col-md-12"><div id="one"></div></div></div><table>  <tr>
<div class="row">
  <div class="col-md-2">
    <div id="two">
 
</div>
  </div>
   <div class="col-md-2"><div id="three">
 
</div>  </div>   <div class="col-md-2">
  <div id="four"></div>
  </div>   <div class="col-md-2">
    <div id="five"></div>
  </div>   <div class="col-md-4">
    <div id="six">
 
</div>
  </div>
  </div>
</tr>
 <tr id="rows">
  


  
</tr>



</table>

</br>
<div id="pools">
  


  </div>
</br>
<!--<h5>Multi leg Pools</h5>
  <div class="row">
    <div class="col-md-3">
      <b>TRE1</b>
    </div>
    <div class="col-md-4">
      <select id="one" multiple="" style="width: 300px; height: 20px">
      </select>
    </div>
     <div class="col-md-5">
      &nbsp;
    </div>
  </div>
  </br>
  </br>
  
  <div class="row">
    <div class="col-md-3">
      <b>TRE2</b>
    </div>
    <div class="col-md-4">
      <select id="two" multiple="" style="width: 300px; height: 20px">
      </select>
    </div>
     <div class="col-md-5">
      &nbsp;
    </div>
  </div>
  </br>
  </br>
  
  <div class="row">
    <div class="col-md-3">
      <b>TRE3</b>
    </div>
    <div class="col-md-4">
      <select id="three" multiple="" style="width: 300px; height: 20px">
      </select>
    </div>
     <div class="col-md-5">
      &nbsp;
    </div>
  </div>
  </br>
  </br>
  
  <div class="row">
    <div class="col-md-3">
      <b>JKP1</b>
    </div>
    <div class="col-md-4">
      <select id="four" multiple="" style="width: 300px; height: 20px">
      </select>
    </div>
     <div class="col-md-5">
      &nbsp;
    </div>
  </div>
  </br>
  </br>
  
  <div class="row">
    <div class="col-md-3">
      <b>JKP2</b>
    </div>
    <div class="col-md-4" id="five">
      <select id="five" multiple="" style="width: 300px; height: 20px">
      </select>
    </div>
     <div class="col-md-5">
      &nbsp;
    </div>
  
  </div>-->
<input type="submit" class="btn btn-primary btn-sm" value="submit"/>
  </form>
</div>
</body>
</html>


<?php

?>

















