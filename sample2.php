<?php
?>

<html>
<head>
	<title>dropsearcch</title>
	<script type="text/javascript" src="autodropdownjquery1.js"></script>
    <script type="text/javascript" src="autodropdownjquery2.js"></script>
    <link rel="stylesheet" type="text/css" href="autodropdown.css" />
    <script type="text/javascript">
            $(document).ready(function(){
                $("#name1").autocomplete({
                    source:'searchdropdown.php',
                    minLength:1
                });
            });
 </script>
</head>
<body>
	<form>
<input type="text" id="name1" name="hname" class="form-control"/>
</form>
</body>
</html>




<?php
?>