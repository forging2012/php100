<?php
$like = "��ϲ����ƻ����";
ob_start();
echo $like."<br>";
$cache = ob_get_contents();
$length = ob_get_length();
ob_end_flush();
echo "��������е����ݣ�".$cache;
echo "������������ݵĳ��ȣ�".$length."<br>";
function callback($buffer) {
	return (str_replace("ƻ��", "��", $buffer));
}
ob_start("callback");
echo $like."<br>";
$cache = ob_get_contents();
$length = ob_get_length();
ob_end_flush();
echo "��������е����ݣ�".$cache;
echo "������������ݵĳ��ȣ�".$length;
?>