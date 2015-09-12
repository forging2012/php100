<?php

/***********************13_4.php********************************/
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
  	$('#eventblur').bind('blur',function(){alert("blur�¼�");});
  	$('#eventclick').bind('click',function(){alert("click�¼�");});
  	$('#eventchange').bind('change',function(){alert("change�¼�");});
  	$('#eventdblclick').bind('dblclick',function(){alert("dblclick�¼�");});
  	$('#eventfocus').bind('focus',function(){alert("focus�¼�");});
  	$("#eventhover").hover(function(){alert("over");},function(){alert("out"); });
  	$('#eventkeydown').bind('keydown',function(){alert("keydown�¼�");});
  	$('#eventkeypress').bind('keypress',function(){alert("keypress�¼�");});
  	$('#eventkeyup').bind('keyup',function(){alert("keyup�¼�");});
  	$('#eventmousedown').bind('mousedown',function(){alert("mousedown�¼�");});
  	$('#eventmouseover').bind('mouseover',function(){alert("mouseover�¼�");});
  	$('#eventmousemove').bind('mousemove',function(){alert("mousemove�¼�");});
  	$('#eventmouseup').bind('mouseup',function(){alert("mouseup�¼�");});
  	$('#eventselect').bind('select',function(){alert("select�¼�");});
  	$('#eventtoggle').toggle(function(){alert("����");},function(){alert("�ٴν���"); });
  	$("#form1").submit(function(){ alert("a");});
  	$("#eventresize").bind('click',function(){
  		//�ı�Ԫ�سߴ磬����resize�¼�
		$("#eventresize").css("width",200);
	});
  	$("#eventresize").bind('resize',function(){alert("resize�¼�");});
  	$("body").bind("scroll",function(){alert("scroll�¼�");});
  	$("#eventone").one('click',function(){alert("ֻ��һ�ε��¼�");});
  	$("#eventunbind").bind('click',function(){alert("click�¼�");});
  	$("#eventtrigger").click(function(event, a, b){

  	}).trigger("click", ["foo", "bar"]);
  	$("#eventtrigger").bind("myEvent",function(event,msg1,msg2){
  		alert(msg1 + ' ' + msg2);
  	});
  	$("#eventtrigger").trigger("myEvent",["trigger","�¼�"]);
  	$("#eventunbind").unbind();
  });

  </script>
</head>
 <body>
 <form id="form1" name="form1" metdod="post" action="">
   <table width="100%" border="1" cellpadding="0" cellspacing="0" widtd="100%">
     <tr>
       <td height="30"><label>
       <div align="center">blur�¼�
           <input name="eventblur" type="text" id="eventblur" />
       </div>
       </label></td>
       <td><label>
       <div align="center">click�¼�
           <input name="eventclick" type="button" id="eventclick" value="��ť" />
       </div>
       </label></td>
       <td><label>
       <div align="center">change�¼�
         <select name="eventchange" id="eventchange">
           <option value="1">1</option>
           <option value="2">2</option>
         </select>
       </div>
       </label></td>
       <td><div id="eventdblclick">
         <div align="center">dblclick�¼�˫��</div>
       </div></td>
     </tr>
     <tr>
       <td height="30"><label>
       <div align="center">focus�¼�
           <input name="eventfocus" type="text" id="eventfocus" />
       </div>
       </label></td>
       <td><div id="eventhover">
         <div align="center">hover�¼�</div>
       </div></td>
       <td><div align="center">
         <label>keydown�¼�
         <input name="eventkeydown" type="text" id="eventkeydown" />
         </label>
       </div></td>
       <td><div align="center">
         <label>keypress�¼�
         <input name="eventkeypress" type="text" id="eventkeypress" />
         </label>
       </div></td>
     </tr>
     <tr>
       <td height="30"><div align="center">
         <label>keyup�¼�
         <input name="eventkeyup" type="text" id="eventkeyup" />
         </label>
       </div></td>
       <td><div align="center" id="eventmousedown">mouseDown�¼�</div></td>
       <td><div align="center" id="eventmouseover">mouseOver�¼�</div></td>
       <td><div align="center" id="eventmousemove">mouseMove�¼�</div></td>
     </tr>
     <tr>
       <td height="30"><div align="center" id="eventmouseup">mouseUp�¼�</div></td>
       <td><div align="center" id="">
         <label>select�¼�
         <input name="eventselect" type="text" id="eventselect" value="ѡ����Щ�ַ�" />
         </label>
       </div></td>
       <td><div align="center">
         <label>toggle�¼�
         <input name="eventtoggle" type="button" id="eventtoggle" value="��ť" />
         </label>
       </div></td>
       <td><div align="center">
         <label>submit�¼�
         <input name="eventsubmit" type="submit" id="eventsubmit" value="�ύ" />
         </label>
       </div></td>
     </tr>
     <tr>
       <td height="30"> <div align="center" id='eventresize'>�ı�Ԫ�ش�С������resize�¼�</div></td>
       <td><div  align="center" id="eventunbind">unbind��ʾ</div></td>
       <td><div  align="center" id="eventtrigger">trigger��ʾ</div></td>
       <td><div  align="center" id="eventone">ֻ��һ�ε��¼�</div></td>
     </tr>
   </table>
 </form>

 </body>
</html>