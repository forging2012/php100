<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title ?></title> 
<link rel='stylesheet' type='text/css' href='/examples/c14/book/Tpl/default/Public/css/style.css'>
</head> 
<body> 
<div id="header">
<div id="innerHeader">
  <div id="blogLogo"></div>
  <div class="blog-header">
    <div class="blog-title"><a href="#">���԰�</a></div>
    <div class="blog-desc">ʹ��ThinkPHPʵ�ֵ����԰�</div>
  </div>
  <div id="menu">
    <ul>
    <li><a href="<?php echo url('','book');?>">�����б�</a></li>
    <li><a href="<?php echo url('add','book');?>">�������</a></li>
    </ul>
  </div>
</div>
</div>
<div id="mainWrapper">
	<div id="content" class="content">
		<div id="innerContent">		  
		  	<div><H4 style="color:#FF3300"><strong>��������</strong></H4>
			<div id="bookDetail"><?php echo $stats ?></div>
			<meta http-equiv="Refresh" content="2;url=<?php echo url('','book');?>"/>
		 	</div>		
			<div class="article-bottom"></div>
		</div> 
	</div>
</div>
<div id="footer" class="footer" >
	<div id="innerFooter">Powered by ThinkPHP <?php echo THINK_VERSION ?> </div>
</div>
</BODY>
</HTML>