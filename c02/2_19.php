<!-------------------------------------------�ļ����� 2_19.php-------------------------------->
<?php
$i=3;
echo "<strong>ʹ��if����жϱ���ֵ</strong><br>";
if($i==1){
	echo "��ǰ������1";
}elseif($i==2){
	echo "��ǰ������2";
}elseif($i==3){
	echo "��ǰ������3";
}else{
	echo "δ֪����";
}
echo "<br>";
echo "<strong>ʹ��switch����жϱ���ֵ</strong><br>";
switch($i){
	case 1:
		echo "��ǰ������1";
	break;
	case 2:
		echo "��ǰ������2";
	break;
	case 3:
		echo "��ǰ������3";
	break;
	default:
		echo "δ֪����";
	break;
}
echo "<br>";
$i=2;
echo "<strong>��ͬ��ֵ��ָ����ͬ�Ĵ����</strong><br>";
if($i==1 or $i==2){
	echo "��ǰ������1������2";
}elseif($i==3){
	echo "��ǰ������3";
}else{
	echo "δ֪����";
}
echo "<br><strong>switch����ʵ�ַ���</strong><br>";
switch($i){
	case 1:
	case 2:
		echo "��ǰ������1������2";
	break;
	case 3:
		echo "��ǰ������3";
	break;
	default:
		echo "δ֪����";
	break;
}
?>
