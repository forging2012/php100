<!-------------------------------------------�ļ����� 2_8.php-------------------------------->
<?php
echo "�ϴ��ļ���Ϣ";
echo "<pre>";
print_r($_FILES);
echo "</pre>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ϴ��ļ�</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="sendfile">
  <label>ѡ���ϴ��ļ�:
  <input type="file" name="file" />
  </label><br>
  <label>
  <input type="submit" name="Submit" value="�ύ" />
  </label>
</form>
</body>
</html>