<?php
/*************************8_1.php****************************/
include("xml.php");
//�����������
$student1 = array("name"=>"С֣","age"=>22,"job"=>"�����");
$student2 = array("name"=>"С��","age"=>23,"job"=>"�����");
//��ʼ��xml�࣬�������ַ���Ϊgb2312
$xml = new xml("gb2312");
//��XML�ļ��в����¼
$xml->insert($student1);
$xml->insert($student2);
//����XML���ݲ���ʾ
$x = $xml->getContents();
echo $x;
?>