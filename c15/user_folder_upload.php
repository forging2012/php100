<?php 
session_start();
include 'global.php';
$g->auth();
$uid = $_SESSION["i"]["id"];
//��ȡ�ļ����������
if(isset($_GET["action"])){
	switch($_GET["action"]){
		case "upload":
			$action = strval($_GET["action"]);
			$fileid = strval($_GET["fileid"]);
			//ʹ��SESSION��¼�ļ����ֶΣ���ֹˢ��ҳ���ʧЧ��
			$_SESSION["folder"]["action"]=$action;
			$_SESSION["folder"]["fileid"]=$fileid;
		break;
		case "delete":
			$g->setSql("delete from #_files where id = '".intval($_GET["id"])."' and fileid = '".$_SESSION["folder"]["fileid"]."'");
			$g->query();
		break;
	}
}else{
	$action = $_SESSION["folder"]["action"];
	$fileid = $_SESSION["folder"]["fileid"];	
}
//��ȡ�ļ����������
$g->setSql("select id,title,intro,pathto,fileid,sortid,typeid from #_folder where fileid = '".$fileid."' and userid = '".$uid."'");
$f = NULL;
$g->loadObject($f);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>��ý���ļ�����ƽ̨</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK rel=stylesheet type=text/css	href="templates/css/style.css">
</HEAD>
<BODY>
<DIV id=navwrap class=navwrap>
	<div class="nav">
	<div class="navinner"><br>
		��ý���ļ�����ƽ̨
			<div class="navsearch" style="left: 735px">
				<form action="search.php" method="post" target="_blank" name="search" id="search">
				<div class="input">
					<input type="hidden" name="type" value="file" /> 			
					<input class="input" name="keyword" type="text" onFocus="this.className='input2'"	value="����Դ" onClick="this.value='';"	onblur="this.value = this.value =='' ? '��Դ����' : this.value;this.className='input'" />
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
				<DIV class=title><?=$f->title;?></DIV>
				<DIV><?=$f->intro;?></DIV>
				<DIV class=user>

<?php
//���������
if(isset($_POST["action"])){
	$action = strval($_POST["action"]);
	$error = "";
	switch($action){
		case "addFiles":
			include_once("class/upload.class.php");
			$u = new upload();
			$p = $_POST;
			$up = $u->uploadFile("file",$uid,$f->pathto."/");
			if($p["title"]==""){
				$error .= "�ļ����Ʋ���Ϊ��<br>";
			}
			if($up["filestat"]=="false"){
				$error .= $up["filename"];
			}
			if($error==""){
				$file["fileid"] = $f->fileid;
				$file["filename"] = $up["filename"];
				$file["filetype"] = $up["filetype"];
				$file["filetitle"] = $p["title"];
				$file["fileintro"] = $p["intro"];
				$g->insertObject("#_files",$file);	
				$g->alert("�ļ��ϴ��ɹ�",'user_folder_upload.php',1);		
			}else{
				$g->alert($error,'user_folder_upload.php');
			}
		break;
	}
}
?>
<!---------��ʼ--------->
<table width="100%" cellpadding="5" cellspacing="1" bgcolor="#000000">
  <tr>
    <th bgcolor="#FFFFFF" scope="col">�ļ�����</th>
    <th bgcolor="#FFFFFF" scope="col">�ļ�����</th>
    <th bgcolor="#FFFFFF" scope="col">�ļ�����</th>
	<th bgcolor="#FFFFFF" scope="col" colspan="2">����</th>
    </tr>
<?php
$g->setSql("select id,filename,filetype,filetitle,fileintro from #_files where fileid = '".$f->fileid."'");
$g->query();
if($g->getLines()>0){
	foreach($g->loadRowList() as $k=>$v){
	echo "  <tr>
				<th bgcolor='#FFFFFF'>".$v[3]."</th>
				<th bgcolor='#FFFFFF'>".$v[4]."</th>
				<th bgcolor='#FFFFFF'>".$v[2]."</th>
				<th bgcolor='#FFFFFF'><a href='file.php?id=".$v[0]."' target='_blank'>�鿴</a></th>
				<th bgcolor='#FFFFFF'><a href='user_folder_upload.php?action=delete&id=".$v[0]."'>ɾ��</a></th>
			</tr>";	
	}

}
?>
</table>

<?php

?>
<!---------����--------->
				</DIV>
			</DIV>
			<DIV class=space>
				<DIV class=title>����ļ�</DIV>
					<form name="newFolder" id="newFolder" method="post" action="user_folder_upload.php" enctype="multipart/form-data">
					<UL class=cool><br>
						<div><strong>���ƣ�<input type="text" name="title" id="title"></strong></div>
						<div><strong>��飺</strong>
						  <textarea name="intro" rows="3" id="intro" sborient="vertical" orient="vertical"></textarea>
						</div>
						<div><strong>ѡ��<input type="file" name="file" size="6"></strong></div>
						<div>
							<input name="submit" type="submit" id="submit" value="���">
							<input name="action" type="hidden" id="action" value="addFiles">
						</div>
					</UL>
					</form>
		  </DIV>
			</DIV>
		</DIV>

		<DIV class=right>
			<DIV class=play>
				<DIV class=title>��¼�û���Ϣ</DIV>
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
<DIV class=footer>��Ȩ����</DIV>

</BODY>
</HTML>