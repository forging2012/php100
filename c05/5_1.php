<!---------------------------------------�ļ����� 5_1.php-------------------------------->
<?php
//����ϴ�����ʱ�ļ��Ƿ����
if(isset($_FILES["file"]["tmp_name"])){
	//�����ļ���ŵ�Ŀ¼
	$dir = "html/";
	//�����µ��ļ���,�˴�ʹ��ԭ�ļ���
	$filename = $_FILES["file"]["name"];
	//ʹ��move_uploaded_file()���ϴ�����ʱ�ļ�,�ƶ�����Ŀ¼
	if(move_uploaded_file($_FILES["file"]["tmp_name"],$dir.$filename)){
		echo "�ϴ��ļ��ɹ�!";
	}else{
		echo "�ϴ��ļ�ʧ��!";
	}
}
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
  </label>
  <label>
  <input type="submit" name="Submit" value="�ύ" />
  </label>
</form>
</body>
</html>
