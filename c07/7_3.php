<!---------------------------------------�ļ����� 7_3.php-------------------------------->
<?php
//����csv��
include_once("csv.php");
//��ʼ���࣬��������Ҫ�������ļ�
$csv = new csv("test.csv");
//��ʾ��ǰ�ļ�������
echo $csv->showTable();
//�������ò�������
$csv->set("student.csv",",");
//ȡ�õ�ǰ�ļ��ļ�¼��
echo "��ǰ�ļ����м�¼��".$csv->rows()."<br>";
//ɾ�������м�¼
$csv->delete(6);
echo "��ǰ�ļ����м�¼��".$csv->rows()."<br>";
//������һ�м�¼
$row = array("С��",21,"�����");
$csv->insert($row);
echo "��ǰ�ļ����м�¼��".$csv->rows()."<br>";
//��ʾ�µ�CSV�ļ�
echo $csv->showTable(false,false);
?>