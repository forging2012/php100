<!-------------------------------------------�ļ����� 3_12.php-------------------------------->
<?php
//����һ���������ڼ������ʼ���ַ�Ƿ�����
function checkMail($mail){
	//ʹ��ereg�������ģʽ�Ƿ����ʼ���ַ��ƥ��
	if(ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+",$mail)){
		echo "<b>�����ʼ���ַ�ǺϷ���</b>";
		return true;
	}else{
		echo "<b><font color='red'>�����ʼ���ַ�ǷǷ���</font></b>";
		return false;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ʹ��������ʽ�������ʼ���ַ</title>
</head>
<body>
<?php
//����Ƿ���Ƿ��ύ��email����,����email������Ϊ��ʱ�����ʼ���ַ��麯��
if(isset($_POST["email"]) and $_POST["email"]!=""){
	//����ʼ���ַ,�����ؼ����s
	checkMail($_POST["email"]);
}
?>
<!-- ������������ʼ���ַ�ı� -->
<form id="form" name="form" method="post" action="">
  <label>����������ʼ���ַ��
  <input name="email" type="text" id="email" />
  </label>
  <label>
  <input type="submit" name="Submit" value="�ύ" />
  </label>
</form>
</body>
</html>
