<!---------------------------------------�ļ����� 7_2.php-------------------------------->
<?php
//����csv��
include_once("csv.php");
//��ʼ���࣬��������Ҫ�������ļ�
$csv = new csv("student.csv");
echo $csv->showTable(false,falsex);
//ȡ�õ�ǰ�ļ��ļ�¼��
echo "��ǰ�ļ����м�¼��".$csv->rows()."<br>";
echo "����Ϊ20���ѧ��<br>";
$csv->select(1,20);
//Ԥ����ѯ���
echo $csv->preview();
//ȡ�ü�¼IDΪ4�ļ�¼����
var_dump($csv->getRow(4));
//ȡ�ü�¼IDΪ0�ļ�¼���ݣ�����������ʽ����
print_r($csv->getRowArray(4));
?>