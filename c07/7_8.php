<?php
//<!---------------------------------------�ļ����� 7_8.php-------------------------------->
//����INI���ļ�
include_once ("ini.php");
$ini = new ini();
print "<pre>";
$ini->parse("test.ini");
print_r($ini->getIni());
$ini->parse("test.ini",true);
print_r($ini->getIni());
print "</pre>";
?>