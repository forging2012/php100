<!-------------------------------------------�ļ����� 2_17.php-------------------------------->
<?php
//while ѭ��Ƕ��ʹ��
$i = 1;
while($i<=9){
	$j=1;
	while($j<=$i){
		echo "$j"."��".$i."=".$i*$j." ";
		$j++;
	}
	echo "<br>";
	$i++;
}
$n = 5;
$m = 5;
//����һ������ѭ��
while(TRUE){
	//����������ʱ,��whileѭ��������
	if($n == $m){
		echo $n;
		//����whileѭ��
		break;
	}
	$n++;
}
echo "<br>";
//����һ��do-while����ѭ��
$n = 0;
do{
	//����������ʱ,��do-whileѭ��������
	if($n == $m){
		echo $n;
		//����do-whileѭ��
		break;
	}
	$n++;
}while(TRUE);
?>