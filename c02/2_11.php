<!-------------------------------------------�ļ����� 2_11.php-------------------------------->
<?php
//�������
$var_1 = "����1";
$var_2 = "user";
$var_3 = "play";
//����һ���ļ�
include("2_1.php");
//����һ������
function show_a(){
	$var_inner = "��������ı���";
	echo "�����ⲿ������".$var_1."<br>";
	echo "�����ڲ�������".$var_inner."<br>";
}
//�ں�����ʹ�ñ���
function show_b(){
	global $var_2;
	echo "����ȫ�ֱ�����".$var_2.$GLOBALS["var_3"]."<br>";
}
//Ԥ�������
function show_c(){
	echo "����ȫ��Ԥ���������".$_ENV["OS"]."<br>";
}
//��̬������ʾ
function show_d()
{
    static $a = 0;
    echo "��̬������ʾ��".$a."<br>";
    $a++;
}
//������ʾ����
show_a();
show_b();
show_c();
show_d();
show_d();
?>
