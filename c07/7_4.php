<?php
//<!---------------------------------------�ļ����� 7_4.php-------------------------------->
//����Excel���ļ�
include_once("excel.php");
//��ʼ���࣬��������Ҫ������Excel�ļ���
$excel = new excel("test.xls");
//����Excel�ļ����ݵı�ͷ
$title = "����,����,רҵ";
//����Excel�ļ�������
$student = array(
	array("С��",19,"�����"),
	array("С��",18,"�����"),
	array("С��",19,"�����"),
	array("СԷ",20,"�����"),
	array("С��",20,"�����"),
	array("С��",20,"�����"),
	array("С��",18,"�����")
);
//ʹ��excel���create()����������Excel�ļ�
$excel->create($student,$title);
?>