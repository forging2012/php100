<?php
/*******************12_4.php*********************/
//����Smarty��
include("smarty/Smarty.class.php");
//ʵ����Smarty��
$smarty = new Smarty();
//��Smarty���Կ���
$smarty->debugging = true;
//����ģ���ǩ
$smarty->assign("title","Smartyʹ��ʾ��");
$smarty->assign("detail","<font size=20>���滻����ʾ����</font>");
$smarty->assign("footer","<br>�ײ����ݣ�<font>copyright.�汾���У�2008</font>");
//���ģ������
$smarty->display('demo.tpl');
?>