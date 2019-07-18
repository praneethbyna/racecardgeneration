
<html>
<head>
  <title>select</title>
  <link rel="stylesheet" type="text/css" href="chosen.min.css">
  <script type="text/javascript" src="select.js"></script>
  <script type="text/javascript" src="chosen.jquery.min.js"></script>
</head>
<script type="text/javascript">
  $(document).ready(function () {
    $('#mselect').chosen();
});


</script>

<body>

   <form action="one.php" method="POST">
    <div>
      <div>
    <select id="mselect" name="mee" multiple="" style="width: 300px; height: 20px">
      <div>
        <div>
      <option>opt1</option>
    </div>
    <div>
       <option value="1">opt1</option>
     </div>
        <option value="2">opt1</option>
         <option value="3">opt1</option>
          <option value="4">opt1</option>
           <option value="5">opt1</option>
         </div>
        
    </select>
  </div>
</div>
<input type="submit" value="submit" />

   </form>

 </body>
</html>