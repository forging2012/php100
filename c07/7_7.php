<?php
//<!---------------------------------------�ļ����� 7_7.php-------------------------------->
//����INI���ļ�
include_once ("ini.php");
$ini = new ini();
$data = array(
	"��һ��"=>array("��վ����"=>"PHPʵ��","��ַ"=>"http://www.rzphp.com"),
	"�ڶ���"=>array("�û���"=>"username","����"=>"password")
);
$ini->create($data);
print "<pre>";
$ini->getContents();
$ini->getFile("test.ini");
print "</pre>";
?>