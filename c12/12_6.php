<?php
/*************12_6.php****************************/
//����Smarty�����ļ�
require 'smarty/Smarty.class.php';
//��ʼ��ģ������
$smarty = new Smarty;
//�������ݴ��ѧ������
$student = array("С��","С��","С��","С��","СǮ","С��");
//��ģ�����ö�Ӧ��ϵ
$smarty->assign("title","�ж�����ѭ�������ʾ");
$smarty->assign("student",$student);
//��ʾģ������
$smarty->display('ifsection.tpl');
?>
