<!---------------------------------------�ļ����� 4_5.php-------------------------------->
<?php
//����ADODB�ļ�
include_once('adodb5/adodb.inc.php');
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
//����SELECT���
$sql = "select name,help_topic_id from help_topic limit 0,15";
//����SQL���
$rs = $conn->Execute($sql);
//����һ����ΪselectMenu1��Ĭ��ѡ������ΪJOINѡ��������б����ҵ�һ�в�Ϊ��
echo $rs->GetMenu("selectMenu1","JOIN",false);
//�Ѽ�¼ָ���ƶ�����һ����¼��
$rs->MoveFirst();
//����һ����ΪselectMenu2��Ĭ�ϲ�ѡ���κ����ݵ������б��������õ�һ��Ϊ��
echo $rs->GetMenu("selectMenu2","",true);
echo "<br>";
//�Ѽ�¼ָ���ƶ�����һ����¼��
$rs->MoveFirst();
//����һ����ΪselectMenu3��Ĭ�ϲ�ѡ���κ����ݵ��б��������õ�һ��Ϊ��,ͬʱ֧�ֶ�ѡ����߶�Ϊ10
echo $rs->GetMenu("selectMenu3","",true,true,10);
//�Ѽ�¼ָ���ƶ�����һ����¼��
$rs->MoveFirst();
//����һ����ΪselectMenu3��Ĭ�ϲ�ѡ���κ����ݵ��б��������õ�һ��Ϊ��,ֻ֧�ֵ�ѡ����߶�Ϊ10
echo $rs->GetMenu("selectMenu4","",false,false,10);
?>
