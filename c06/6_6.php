<!---------------------------------------�ļ����� 6_6.php-------------------------------->
<?php
//����ϴ�����ʱ�ļ��Ƿ����
if(isset($_FILES["file"]["tmp_name"]) and $_FILES["file"]["type"]=="application/x-zip-compressed"){
	$filename = $_FILES["file"]["name"];
	//ʹ��move_uploaded_file()���ϴ�����ʱ�ļ�,�ƶ�����ǰĿ¼
	if(move_uploaded_file($_FILES["file"]["tmp_name"],$filename)){
		//����zip.php�ļ�
		include_once("zip.php");
		//ʵ����zip��
		$zip = new zip();
		//ʹ��zip���е�get_List()��������ZIP�ļ��е��ļ�������
		$filenames = $zip->get_List($filename);
		//ʹ��zip���е�Extract()��������ѹZIP�е��ļ���zipĿ¼��
		$zstat = $zip->Extract($filename,"zip");
		echo "<pre>";
		echo "ZIP�ļ��е������ļ�����<br>";
		print_r($filenames);
		echo "ZIP�ļ���ѹ�󣬵����ļ��Ľ�ѹ�������";
		print_r($zstat);
		echo "</pre>";

	}else{
		echo "�ϴ��ļ�ʧ��!";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ϴ�ZIP�ļ�</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="sendfile">
  <label>ѡ��ZIP�ļ�:
  <input type="file" name="file" />
  </label>
  <label>
  <input type="submit" name="Submit" value="�ύ" />
  </label>
</form>
</body>
</html>
