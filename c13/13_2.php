<?php
/***********************13_2.php********************************/
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
  		<!--���캯�����Խ��յĵ�һ�����-->
  		$("div > p").css("border", "1px solid gray");
  		jQuery("ul > li").css("border", "1px solid gray");
  		<!--���캯�����Խ��յĵڶ������-->
  		$("<div><p>��̬��ӵ�����</p></div>").appendTo("body");
  		$("<input type='checkbox'/>").appendTo("body");
  		$("<input type='button' value='��̬��ӵİ�ť'/>").appendTo("body");
  		$("<textarea></textarea>").appendTo("body");
  		<!--���캯�����Խ��յĵ��������-->
  		$(document.body).css( "background", "efefef" );
  	});
  </script>
 </head>
 <body>
 <div><p>��̬�����ʽ</p></div>
 <ul><li>��һ����¼</li></ul>
 </body>
</html>