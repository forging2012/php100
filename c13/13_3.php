<?php
/***********************13_3.php********************************/
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
  <!--���캯�����Խ��յĵ�����������ص�����-->
  	$(function(){
  		<!--ʹ��IDѡ��ҳ��Ԫ��-->
  		$("#Layer1").css("border","3px solid red");
  		$("#Layer1").find("li").css("border","3px solid black");
  		$("#Layer2").css("border","3px solid black");
  		$("#Layer2 > li").css("border","3px solid red");
  		<!--ʹ��Ԫ������ѡ��ҳ��Ԫ��-->
  		$("p").css("border","3px solid blue");
  		<!--ʹ��CSS���ʽѡ��ҳ��Ԫ��-->
  		$(".Layer3").css("border","3px solid gray");
  		<!--ͬʱѡ��ͬ���͵�Ԫ��-->
  		$("span,.div4,#div5,div > p").css("border","3px solid yellow");
  	});
  </script>
  <style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:17px;
	top:220px;
	width:100px;
	height:100px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:133px;
	top:220px;
	width:100px;
	height:100px;
	z-index:2;
}
.Layer3 {
	position:absolute;
	left:248px;
	top:220px;
	width:100px;
	height:100px;
	z-index:3;
}
-->
  </style>
</head>
 <body>
 <div id="Layer1">��һ��<li>��һ��</li><li>�ڶ���</li></div>
 <div id="Layer2">�ڶ���<li>��һ��</li><li>�ڶ���</li></div>
 <div class="Layer3">������</div>
 <p id=p1>��1</p><p id=p2>��2</p>
 <span>������</span>
 <div class="div4">���Ĳ�</div>
 <div id="div5">�����</div>
 <div><p>������</p></div>
 </body>
</html>