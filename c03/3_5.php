<!-------------------------------------------�ļ����� 3_5.php-------------------------------->
<?php
//��ʼ��
$album = "album";
if(is_dir($album)!==true){
	mkdir($album);
}
//�����ϴ��ļ�
if(isset($_POST["action"]) and $_POST["action"]=="upload"){
	if(isset($_FILES["file"]["tmp_name"])){
		//�����ļ���ŵ�Ŀ¼
		//�����µ��ļ���,�˴�ʹ��ԭ�ļ���
		$filename = $_FILES["file"]["name"];
		//ʹ��move_uploaded_file()���ϴ�����ʱ�ļ�,�ƶ�����Ŀ¼
		if(move_uploaded_file($_FILES["file"]["tmp_name"],$album."/".$filename)){
			echo "�ϴ��ļ��ɹ�!";
		}else{
			echo "�ϴ��ļ�ʧ��!";
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���</title>
<style>
body{margin:0px;padding:0px;background-color: #EFEFEF;font-size:12px;}
ul{	margin:0px;	padding:0px;list-style:none;}
a{color:#333333;text-decoration:none;}
a:hover{color:#999999;}
.ablum_out{width:98%px;margin-left:10px;margin-top:10px;}
.ablum_out img{margin:4px;border:#ccc 1px solid;}
.ablum_out li{float:left;width:180px;text-align:center;margin:5px;}
</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <label>�ϴ�ͼ��
  <input type="file" name="file" />
  </label>
  <label>
  <input type="submit" name="Submit" value="�ύ" />
  <input type="hidden" name="action" value="upload"/>
  </label>
</form>
<hr size="1" />
		<div class="ablum_out">
			<ul>
<?php
$dh = dir($album);
echo "���Ŀ¼: " . $dh->path . "<br>";
while (false !== ($file = $dh->read())) {
   if($file != "." and $file != ".."){
   	echo '<li><a href="'.$album."/".$file.'" target="_blank"><img src="'.$album."/".$file.'" width="160" height="120" border="0" /><br />'.$file.'</a> </li>';
   }
}
$dh->close();
?>
			</ul>
	</div><br/>
</body>
</html>
