<!---------------------------------------�ļ����� 6_1.php-------------------------------->
<?php
//������
include_once("Charset.php");
//��ʼ����
$charset = new Charset();
//����һ�����Ժ���
function test(){
	global $charset;
	$text = "�й�";
	echo "��GB2312������ַ�'".$text."'��ת��ΪUNICODE���룺'".htmlspecialchars($charset->gb2unicode($text))."'";
	echo "<br>";
	echo "��GB2312������ַ�'".$text."'��ת��ΪUTF-8���룺'".htmlspecialchars($charset->gb2utf8($text))."'";
}
//���в��Ժ���
test();
?>