<?php
//<!-------------------------------------------�ļ����� 3_6.php-------------------------------->
//����һ���洢�û���Ϣ���û���ʽ������
$users = array(
	array("username"=>"tom","password"=>"1","style"=>"css1"),
	array("username"=>"jake","password"=>"2","style"=>"css2"),
	array("username"=>"seven","password"=>"3","style"=>"css3"),
	array("username"=>"andy","password"=>"4","style"=>"css4"),
	array("username"=>"king","password"=>"5","style"=>"css5"),
	array("username"=>"robert","password"=>"6","style"=>"css6")
);
//����һ������,���ڼ���û��Ƿ��¼
function is_login(){
	//ʹ��global�ؼ���ʹ��$users����
	global $users;
	//��COOKIE�е�ֵ�����±���
	$u = $_COOKIE["username"];
	$p = $_COOKIE["password"];
	//�����û�����
	foreach($users as $key=>$value){
		//�Ƚ�COOKIE�е�ֵ���û������е�ֵ
		if($value["username"]==$u and $value["password"]==$p){
			//���COOKIE�е�ֵ���û������е�ֵ��һ������ȵ�,����TRUE
			return true;
		}
	}
	//�����������,û����ȵ�ֵ,����FALSE;
	return false;
}
//����һ������,�����û���¼���COOKE
function login(){
	global $users;
	//��$_POST�����еĵ�Ԫ�����±���
	$u = $_POST["username"];
	$p = $_POST["password"];
	//�����û�����
	foreach($users as $key=>$value){
		//���ұ��ύ�ı���,�Ƿ����û������е�һ��ֵ���
		if($value["username"]==$u and $value["password"]==$p){
			//������ύ�ı������������е�ֵ,����COOKIEֵ,��is_login()�������
			setcookie("username",$value["username"]);
			setcookie("password",$value["password"]);
			setcookie("style",$value["style"]);
			//ʹ��JavaScript��ʾ��¼��Ϣ,��ת���û�ҳ,����Ϊͬһҳ
			echo "<script>alert('��¼�ɹ�!');</script>";
			echo "<script>window.navigate('3_6.php');</script>";
			return true;
		}
	}
	//�����������,û����ȵ�����,��ʾ��¼������Ϣ,��ת������ҳ,����Ϊͬһҳ
	echo "<script>alert('�û������������!');</script>";
	echo "<script>window.navigate('3_6.php');</script>";
	return false;
}
//����һ������,����ɾ��COOKIE,���ע������
function logout(){
	//�������COOKE��ֵ
	setcookie("username","");
	setcookie("password","");
	//��ʾע���ɹ���Ϣ
	echo "<script>alert('ע���ɹ�!');</script>";
	echo "<script>window.navigate('3_6.php');</script>";
}
//����һ���û���¼��,�����û��ύ��¼����.
function loginTable(){
print<<<EOT
<table width="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><form name="form1" method="post" action="?action=login">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>�û���:</td>
          <td><label>
            <input name="username" type="text" id="username">
          </label></td>
        </tr>
        <tr>
          <td>����:</td>
          <td><label>
            <input name="password" type="password" id="password">
          </label></td>
        </tr>
        <tr>
          <td colspan="2"><label>
            <input type="submit" name="Submit" value="�ύ">
          </label></td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
EOT;
}
//�����ⲿ����,���ú���
switch($_GET["action"]){
	case "login":
		login();
	break;
	case "logout":
		logout();
	break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<title>�û���¼</title>
<style>
.css{
width:800px;
height:20px;
FONT-SIZE: small; FONT-FAMILY: arial, helvetica, clean, sans-serif;
border:solid #CCCCCC 1px;
}
.css1{
width:800px;
height:200px;
FONT-SIZE: small; FONT-FAMILY: arial, helvetica, clean, sans-serif;
border:solid #CCCCCC 1px;
}
.css2{
background-color:#000000;
color:#ffffff;
width:800px;
height:200px;
FONT-SIZE: small; FONT-FAMILY: arial, helvetica, clean, sans-serif;
border:solid #CCCCCC 1px;
}
.css3{
background-color:#FF0000;
color:#FFFF00;
width:800px;
height:200px;
FONT-SIZE: small; FONT-FAMILY: arial, helvetica, clean, sans-serif;
border:solid #CCCCCC 1px;
}
.css4{
background-color:#000066;
color:#FFFFFF;
width:800px;
height:200px;
FONT-SIZE: small; FONT-FAMILY: arial, helvetica, clean, sans-serif;
border:solid #CCCCCC 1px;
}
.css5{
background-color:#FFCC66;
color:#00CC00;
width:800px;
height:200px;
FONT-SIZE: small; FONT-FAMILY: arial, helvetica, clean, sans-serif;
border:solid #CCCCCC 1px;
}
.css6{
background-color:#33CC99;
color:#996600;
width:800px;
height:200px;
FONT-SIZE: small; FONT-FAMILY: arial, helvetica, clean, sans-serif;
border:solid #CCCCCC 1px;
}
</style>
</head>
<body>
<?php
if(is_login()){
?>
<div class="css">���:<?=$_COOKIE["username"];?>&nbsp;&nbsp;&nbsp;&nbsp;<a href='?action=logout'>ע��</a></div>
<div class='<?=$_COOKIE["style"]?>'>�û���¼��,��ʾ������.</div>
<?php
}else{
	loginTable();
}
?>
</body>
</html>
