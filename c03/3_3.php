<!-------------------------------------------�ļ����� 3_3.php-------------------------------->
<?php
echo "<strong>ʹ��Ŀ¼������ȡĿ¼</strong><br>";
$dir = "html";
//ʹ��opendir()������Ŀ¼
$handle = opendir($dir);
if($handle == false){
	echo "��Ŀ¼ʧ��!";
}else{
	echo "Ŀ¼���: " . $handle . "<br>";
	echo "Ŀ¼����: " . $dir . "<br>";
	//ʹ��readdir()��ȡĿ¼��Ϣ
	while($file = readdir($handle)){
		if($file !== false){
			echo $file."<br>";
		}
	}
	
}
//ʹ��closedir()�ر�Ŀ¼���
closedir($handle);
echo "<strong>ʹ��Directory���ȡĿ¼</strong><br>";
$dh = dir($dir);
echo "Ŀ¼���: " . $dh->handle . "<br>";
echo "Ŀ¼����: " . $dh->path . "<br>";
while ($file = $dh->read()) {
	if($file !== false){
   		echo $file."<br>";		
	}
}
$dh->close();
?>
