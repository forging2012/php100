<?php
/********************11_4.php**************************/
$string = "���ڼ��ܵ��ַ���!";
//ʹ��url��غ������ܽ���
echo "ʹ��urlencode()�������ܵ��ַ�����";
echo $encode = urlencode($string);
echo "<br>ʹ��urldecode()����������ַ�����";
echo urldecode($encode);
echo "<br>ʹ��rawurlencode()�������ܵ��ַ���";
echo $encode = rawurlencode($string);
echo "<br>ʹ��rawurldecode()�������ܵ��ַ�������";
echo rawurldecode($encode);
echo "<br>ʹ��base64_encode()�������ܵ��ַ�����";
echo $encode = base64_encode($string);
echo "<br>ʹ��base64_decode()�������ܵ��ַ�����";
echo base64_decode($encode);
echo "<br>ʹ��convert_uuencode()�������ܵ��ַ�����";
echo $encode = convert_uuencode($string);
echo "<br>ʹ��convert_uudecode()�������ܵ��ַ�����";
echo convert_uudecode($encode);
echo "<br>ʹ��htmlentities()�������ܵ��ַ�����";
echo $encode = htmlentities($string);
echo "<br>ʹ��html_entity_decode()�������ܵ��ַ�����";
echo html_entity_decode($encode);
echo "<br>ʹ��md5()��������ȡ�õ��ַ�����md5ֵ��";
echo md5($string);
echo "<br>ʹ��md5_file()����ȡ�õ��ļ���md5ֵ��";
echo md5_file("11_4.php");
echo "<br>ʹ��sha1()��������ȡ�õ��ַ�����sha1ֵ��";
echo sha1($string);
echo "<br>ʹ��sha1_file()����ȡ�õ��ļ���sha1ֵ��";
echo sha1_file("11_4.php");
echo "<br>ʹ��crc32()����ȡ�õ��ļ���crc32ֵ��";
echo crc32("11_4.php");
?>