<!-------------------------------------------�ļ����� 2_18.php-------------------------------->
<?php
//for ѭ��Ƕ��ʹ��
for($i=1;$i<=9;$i++){
	for($j=1;$j<=$i;$j++){
		echo "$j"."��".$i."=".$i*$j." ";
	}
	echo "<br>";
}
//forѭ��������ѭ����ʽ
$i=0;
for(;;){
	//��$i>=5ʱ���˳�ѭ��
	if($i>=5){
		break;
	}
	//�˳�����ѭ���ı�Ҫ����
	$i++;
}
//����һ������
$ar = array("a","b","c","d","e");
echo "ʹ��for��������<br>";
for($i=0;$i<=count($ar);$i++){
	echo $ar[$i]."<br>";
}
echo "ʹ��foreach��������<br>";
foreach($ar as $val){
	echo $val."<br>";
}
echo "ʹ��foreach��������ļ�����ֵ<br>";
foreach($ar as $key=>$val){
	echo "������".$key."ֵ��".$val."<br>";
}
?>
