<!---------------------------------------�ļ����� 6_3.php-------------------------------->
<?php
//Ϊ��ʹ����JSON�������֧��GB2312�ַ�
//���԰���charset�ַ�����ת���࣬��ʵ���ַ�֮���ת��
include_once("Charset.php");
//����JSON���������
include_once("json.php");
//��ʼ���ַ����������
$charset = new Charset();
//��ʼ��JSON���������
$json = new JSON();
//������Ҫ���������
$users = array(
	array("username"=>$charset->gb2unicode("����"),"password"=>"1","style"=>"css1"),
	array("username"=>"jake","password"=>"2","style"=>"css2")
);
//ʹ��JSON���е�encode()�������б���
$json_data = $json->encode($users);
echo $json_data;
?>
