<?php
//<!---------------------------------------�ļ����� 6_7.php-------------------------------->
$zipdir = "zip";
//����ϴ�����ʱ�ļ��Ƿ����
if(isset($_POST["action"]) and isset($_POST["file"])){
	include_once("zip.php");
	$zip = new zip();
	foreach($_POST["file"] as $k=>$v){
		$vc = file_get_contents($zipdir."/".$v);
		$zip->Add(Array(Array($v,$vc)),0);
	}
    fputs(fopen("test.zip","wb"), $zip->get_file());
	switch($_POST["action"]){
		case "zip":
			echo "<a href='test.zip'>����</a>";
		break;
		case "zip and download":
			//ȡ���ļ�����
			$filename = "test.zip";
			//����ͷ��Ϣ
			header("Pragma:public");
			header("Expires:0");
			header("Cache-Component:must-revalidate,post-check=0,pre-check=0");
			header("Content-type:application/x-zip-compressed");
			header("Content-Length:".filesize($filename));
			header("Content-Disposition:attachment;filename=".$filename);
			header("Content-Transfer-Encoding:binary");
			//����ļ���������
			readfile($filename);
			exit();
		break;
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
<form action="" method="post" name="zip">
<?php
$dh = dir($zipdir);
echo "��ǰĿ¼: " . $dh->path . "<br>";
$f = 0;
while (false !== ($file = $dh->read())) {
   if($file != "." and $file != ".."){
		echo '<li><input type="checkbox" name="file['.$f.']" value="'.$file.'"/>'.$file.' </li>';
		$f++;
   }
}
$dh->close();
?>
<br>
  <input type="submit" name="action" value="zip"/>
  <input type="submit" name="action" value="zip and download"/>


</form>
</body>
</html>
