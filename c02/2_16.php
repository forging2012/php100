<!-------------------------------------------�ļ����� 2_16.php-------------------------------->
<?php
//�Զ������
$n1  = "Tom";
$n2  = "Kite";
$m1 = "��ѧ";
$m2 = "��ѧ";
$m3 = "�����Ա";
$m4 = "������Ա";
//ʹ��if elseif else����ж�����
function s($age,$sex){
	global $n1,$n2,$m1,$m2,$m3,$m4;
	$string = "";
	if($sex == 1){
		$string .= $n1;
		if($age>=18){
			$string .= "��".$m2.$m3;
		}else{
			$string .= "��".$m1.$m3;
		}
	}elseif($sex==0){
		$string .= $n2;
		if($age>=18){
			$string .= "��".$m2.$m4;
		}else{
			$string .= "��".$m1.$m4;
		}
	}else{
		$string .= "�޷��ж��Ա�";
	}
	echo $string;
}
s(19,1);
echo "<br>";
s(17,0);
?>
