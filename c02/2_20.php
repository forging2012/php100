<!-------------------------------------------�ļ����� 2_20.php-------------------------------->
<?php
echo "<strong>��ѭ����ʹ��continue</strong><br>";
for($i=1;$i<=6;$i++){
	if($i==4){
		continue;
	}
	echo $i."<br>";
}
echo "<strong>��ѭ����ʹ��break</strong><br>";
for($i=1;$i<=6;$i++){
	if($i==4){
		break;
	}
	echo $i."<br>";
}
?>
