<?php
//<!---------------------------------------�ļ����� 7_5.php-------------------------------->
//����Excel���ļ�
include_once("excel.php");
//��ʼ���࣬��������Ҫ������Excel�ļ���
$excel = new excel("test.xls");
//ʹ��excel���read()��������ȡExcel�ļ�"test"��Ԫ��ǰ���У�ǰ���е�����
$array = $excel->read("test",3,3);
echo "<pre>";
print_r($array);
echo "</pre>";
?>