<!---------------------------------------�ļ����� 6_2.php-------------------------------->
<?php
//������
include_once("Charset.php");
//��ʼ����
$charset = new Charset();
//����һ�����Ժ���
function test(){
	global $charset;
	$text = "�й�";
	$unicode = "&#20013;&#22269;";
	echo "��UTF-8������ַ�'".$charset->gb2utf8($text)."'��ת��ΪGB2312���룺'".htmlspecialchars($charset->utf82gb($charset->gb2utf8($text)))."'";
	echo "<br>";
	echo "��UTF-8������ַ�'".$charset->gb2utf8($text)."'��ת��ΪUNICODE���룺'".htmlspecialchars($charset->utf82unicode($charset->gb2utf8($text)))."'";
	echo "<br>";
	echo "��UNICODE������ַ�'".htmlspecialchars($unicode)."'��ת��ΪUTF-8���룺'".$charset->unicode2utf8($unicode)."'";
	echo "<br>";
	echo "��UNICODE������ַ�'".htmlspecialchars($unicode)."'��ת��ΪGB2312���룺'".$charset->unicode2gb($unicode)."'";
}
test();
?>