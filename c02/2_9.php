<?php
/**
*<!-------------------------------------------�ļ����� 2_9.php-------------------------------->
*  */
session_start();
//���ñ���
$s1 = "�����ַ���";
$s2 = 12;
$s3 = 12.3;
$s4 = "false";
//ʹ��session_register()������ע��SESSION����
session_register("s1");
session_register("s2","s3","s4");//ͬʱע����SESSION����
//ֱ��ע��SESSION����
$_SESSION["s5"] = array(1,2,3,4,5);
$_SESSION["s6"] = "error";
$_SESSION["s7"] = "3.1415926";
echo "����$"."_SESSION��<br>";
foreach($_SESSION as $key=>$value){
	echo "$key=>$value<br>";
}
//�޸�SESSION����
$_SESSION["s7"] = 3.14159;
echo "ʹ��SESSION����<br>";
if(session_is_registered("s7")){
	echo "Pi�Ľ���ֵ�ǣ�".$_SESSION["s7"]."<br>";
}
//ɾ��ָ��SESSION����
unset($_SESSION["s4"]);
session_unregister("s6");
$_SESSION["s7"] = NULL;
echo "����ɾ��ָ�������Ա���$"."_SESSION��<br>";
foreach($_SESSION as $key=>$value){
	echo "$key=>$value<br>";
}
//ɾ������SESSION����
session_unset();
?>
