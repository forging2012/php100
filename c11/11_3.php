<?php
session_start();
//�����û���
include("user.php");
//��ʼ���û���
$user = new user();
//�����û���¼��Ϣ��֤����
$user->auth();
?>
<!---------------11_3.php------------------->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
 <head>
  <title>�û�ԮȨҳ��</title>
 </head>
 <body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="67" colspan="2"><div align="center">�û���¼Ȩ����ʾ</div></td>
  </tr>
  <tr>
    <td width="18%" height="236" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="29"><div align="center">��ӭ�㣺</div></td>
      </tr>
<?PHP
//�ڵ���ҳ���ڣ�Ϊÿһ��Ȩ�޵����÷�������
if($user->checkPoint(intval($_SESSION["auth"]["role"]),1)){
	echo "<tr><td><div align='center'><a href='1.php'>�ɷ���Ȩ��ҳһ</a></div></td></tr>";
}
if($user->checkPoint(intval($_SESSION["auth"]["role"]),2)){
	echo "<tr><td><div align='center'><a href='2.php'>�ɷ���Ȩ��ҳ��</a></div></td></tr>";
}
if($user->checkPoint(intval($_SESSION["auth"]["role"]),3)){
	echo "<tr><td><div align='center'><a href='3.php'>�ɷ���Ȩ��ҳ��</a></div></td></tr>";
}
?>
      <tr>
        <td><div align="center"></div></td>
      </tr>
    </table></td>
    <td width="82%"><div align="center">��¼������ʾҳ�档</div></td>
  </tr>
</table>
 </body>
</html>
