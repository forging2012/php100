<?php
/***********************13_1.php********************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
 <head>
  <title>jQuery��ʾ</title>
  <!--����jQuery����-->
  <script language="javascript" type="text/javascript" src="js/jquery-1.2.6.js"></script>
  <!--����javascript����-->
  <script language="javascript" type="text/javascript">
  	$(document).ready(function(){
  		$("#showAlert").click(function(){
  			alert("����ʹ��jQuery��������Ϣ");
  		});
  	});
  </script>
 </head>
 <body>
 <div id='showAlert'>���������¼�</div>
 </body>
</html>
