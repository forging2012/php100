<!---------------------------------------�ļ����� 4_4.php-------------------------------->
<?php
//����ADODB�ļ�
include_once('adodb5/adodb.inc.php');
//������ҳ�����ļ�
include_once('adodb5/toexport.inc.php');
//��������MySQL���ݵı���
//���ݿ��������ַ
$host = "localhost";
//�û���
$user = "root";
//����
$pass = "password";
//Ҫ���������ݿ�
$db   = "mysql";
//�������Ӷ���
$conn = &ADONewConnection('mysql');
//�������ݿ�
$conn->Connect($host,$user,$pass,$db);
//�����ַ���
$conn->Execute("SET NAMES gb2312");
//����SELECT���
$sql = "select help_topic_id,name,help_category_id,url from help_topic limit 0,15";
//����SQL���
$rs = $conn->Execute($sql);
//���CSV�ļ����ݵ������
print "<pre>";
print rs2csv($rs);
print "</pre>";
//�ƶ�����һ����¼
$rs->movefirst();
//�½�һ���ļ������ڱ���CSV����
$fp = fopen("csv.txt","wb");
//ʹ��rs3csvfile()���������csv�ļ�
rs2csvfile($rs,$fp);
fclose($fp);
?>
