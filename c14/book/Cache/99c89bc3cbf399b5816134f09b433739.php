<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<html> 
<head> 
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
		  	<div><H4 style="color:#FF3300"><strong>�����б�</strong></H4>
				<?php if(isset($list)): ?><?php $i = 0; ?><?php if( count($list)==0 ) echo "" ?><?php foreach($list as $key=>$vo): ?><?php ++$i;?><?php $mod = (($i % 2 )==0)?><div id="bookTitle">������<?php echo is_array($vo)?$vo["name"]:$vo->name ?> �� �Ա�<?php echo is_array($vo)?$vo["sex"]:$vo->sex ?> �� IP��<?php echo is_array($vo)?$vo["IP"]:$vo->IP ?> �� �����ʼ���<?php echo is_array($vo)?$vo["email"]:$vo->email ?> �� <a href='<?php echo is_array($vo)?$vo["http"]:$vo->http ?>'>��վ</a> </div>
				<div id="bookDetail"><strong>�������ݣ�</strong><?php echo is_array($vo)?$vo["detail"]:$vo->detail ?></div>
				<hr><?php endforeach; ?><?php endif; ?> 
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