<?php
/**********************1.php***************************/
session_start();
//�����û���
include("user.php");
//��ʼ���û���
$user = new user();
//�����û���¼��Ϣ��֤����
$user->auth();
if($user->checkPoint(intval($_SESSION["auth"]["role"]),1)){
	echo "��ӭ�鿴��ԮȨҳ��һ";
}else{
	echo "��δ���鿴ЩԮȨҳҳ���������Ա��ϵ";
}
?>
