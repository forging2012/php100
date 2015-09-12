<?php 
session_start();
include 'global.php';
$g->auth();
$uid = $_SESSION["i"]["id"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>多媒体文件共享平台</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK rel=stylesheet type=text/css	href="templates/css/style.css">
</HEAD>
<BODY>
<DIV id=navwrap class=navwrap>
	<div class="nav">
	<div class="navinner"><br>
		多媒体文件共享平台
			<div class="navsearch" style="left: 735px">
				<form action="search.php" method="post" target="_blank" name="search" id="search">
				<div class="input">
					<input type="hidden" name="type" value="file" /> 			
					<input class="input" name="keyword" type="text" onFocus="this.className='input2'"	value="搜资源" onClick="this.value='';"	onblur="this.value = this.value =='' ? '资源名称' : this.value;this.className='input'" />
				</div>
				<input class="but"	type="submit" value=" " /></form>
			</div>
			<div class="other" style="left:200px">
			<?php $g->loginStats();?>
			</div>
			
	  </div>
	</div>
</DIV>
<DIV class=wrap>
	<DIV class=left>
		<DIV class=commend>
			<DIV class=group>
				<DIV class=title>文件夹列表</DIV>
				<DIV class=user>

<?php
//表单处理代码
if(isset($_POST["action"])){
	$action = strval($_POST["action"]);
	$error = "";
	switch($action){
		case "addFolder":
			$f = $_POST;
			if($f["title"]==""){
				$error .= "文件夹名称不能为空<br>";
			}
			if($error==""){
				$folder["title"] = $f["title"];
				$folder["intro"] = $f["intro"];
				$folder["pathto"] = "folder/".$uid."/".date("Y")."/".date("m")."/".date("d");
				$folder["fileid"] = md5(time().$uid);
				$folder["sortid"] = $f["sort"];
				$folder["userid"] = $uid;
				$folder["typeid"] = $f["typeid"];
				/*****创建文件夹代码开始****/
				$pathSign = "/";
				$path = $folder["pathto"] .$pathSign."thumbnail";
				$dirArray = explode ( $pathSign, $path );
				$tempDir = '';
				foreach ( $dirArray as $dir ) {
					$tempDir .= $dir . $pathSign;
					$isFile = file_exists ( $tempDir );
					clearstatcache ();
					if (! $isFile && ! is_dir ( $tempDir )) {
						@mkdir ( $tempDir, 0777 );
					}
				}
				/******创建文件夹代码结束***/
				$g->insertObject("#_folder",$folder);	
				$g->alert('创建文件夹成功','user_folder.php');				
			}else{
				$g->alert($error,'user_folder.php');
			}
		break;
	}
}
if(isset($_GET["action"])){
	switch($_GET["action"]){
		case "delete";
			$g->setSql("delete from #_folder where id = '".intval($_GET["id"])."' and userid = '".$uid."'");
			$g->query();
		break;
	}
}
?>
<!---------开始--------->
<table width="100%" cellpadding="5" cellspacing="1" bgcolor="#000000">
  <tr>
    <th bgcolor="#FFFFFF" scope="col">名称</th>
    <th bgcolor="#FFFFFF" scope="col">分类</th>
    <th bgcolor="#FFFFFF" scope="col">类型</th>
	<th bgcolor="#FFFFFF" scope="col" colspan="2">操作</th>
    </tr>
<?php
$g->setSql("select id,title,sortid,typeid,fileid from #_folder where userid = '".$uid."'");
$g->query();
if($g->getLines()>0){
	foreach($g->loadRowList() as $k=>$v){
	echo "  <tr>
				<th bgcolor='#FFFFFF'>".$v[1]."</th>
				<th bgcolor='#FFFFFF'>".$g->getSortTitle($v[2])."</th>
				<th bgcolor='#FFFFFF'>".$g->getFolderType($v[3])."</th>
				<th bgcolor='#FFFFFF'><a href='user_folder_upload.php?action=upload&fileid=".$v[4]."'>上传文件</a></th>
				<th bgcolor='#FFFFFF'><a href='user_folder.php?action=delete&id=".$v[0]."'>删除</a></th>
			</tr>";	
	}

}
?>
</table>

<?php

?>
<!---------结束--------->
				</DIV>
			</DIV>
			<DIV class=space>
				<DIV class=title>添加文件夹</DIV>
					<form name="newFolder" id="newFolder" method="post" action="user_folder.php" onSubmit="return checkSubmit(this);">
					<UL class=cool><br>
						<div><strong>名称：</strong><input type="text" name="title" id="title"></div>
						<div><strong>简介：</strong>
						  <textarea name="intro" rows="3" id="intro"></textarea>
						</div>
						<div><strong>分类：</strong><?=$g->buildSelect("sort"," and `uid`=".$uid);?></div>
						<div><strong>类型：</strong><?=$g->buildTypeSelect();?></div>
						<div>
							<input name="submit" type="submit" id="submit" value="添加">
							<input name="action" type="hidden" id="action" value="addFolder">
						</div>
					</UL>
					</form>
		  </DIV>
			</DIV>
		</DIV>

		<DIV class=right>
			<DIV class=play>
				<DIV class=title>登录用户信息</DIV>
					<DIV class=playwrap>
						<UL id=scrollPlay>
						<?php $g->UserInfo();?>							
						</UL>
					</DIV>
				</DIV>
			</DIV>
		</DIV>

		<DIV class=clear></DIV>
	</DIV>
</DIV>
<DIV class=footer>版权所有</DIV>

</BODY>
</HTML>