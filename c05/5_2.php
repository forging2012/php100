<!---------------------------------------�ļ����� 5_2.php-------------------------------->
<?php
//����ϴ�����ʱ�ļ��Ƿ����
if(isset($_POST["Submit"]) and $_POST["Submit"] == "�ύ"){
	//�����ļ���ŵ�Ŀ¼
	$dir = "html";
	if(is_dir($dir)==false){
		mkdir($dir);
	}
	$message = "";
	for($i=1;$i<=count($_FILES["file"]["name"]);$i++){
		//�����µ��ļ���,�˴�ʹ��ԭ�ļ���
		$filename = $_FILES["file"]["name"][$i];
		//ʹ��move_uploaded_file()���ϴ�����ʱ�ļ�,�ƶ�����Ŀ¼
		if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],$dir."/".$filename)){
			$message .= $_FILES['file']['name'][$i]."�ϴ��ļ��ɹ�!<br>";
		}else{
			$message .= $_FILES['file']['name'][$i]."�ϴ��ļ�ʧ��!<br>";
		}
	}
	echo $message;
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
<div id="filehtml">
  ѡ���ϴ��ļ�1: <input type="file" name="file[1]" /><br>
  ѡ���ϴ��ļ�2: <input type="file" name="file[2]" /><br>
  ѡ���ϴ��ļ�3: <input type="file" name="file[3]" /><br>
</div>

  <input type="button" name="addfile" value="�����ļ���" onclick="addFileHtml();"/>

<br>

  <input type="submit" name="Submit" value="�ύ"/>


</form>
<script language="JavaScript" type="text/javascript">
function addFileHtml(){
	var form = document.getElementById('sendfile');
	var count = 0;
	for(var i=0; i<form.elements.length; i++){
		var name = form.elements[i].name;
		if(name.indexOf("file") > -1) count++;
	}
	document.getElementById("filehtml").innerHTML += 'ѡ���ϴ��ļ�'+count+': <input type="file" name="file['+count+']" /><br>';
}
</script>

</body>
</html>
