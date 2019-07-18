<?php
?>

<html>
<head>
	<title>dropsearcch</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
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