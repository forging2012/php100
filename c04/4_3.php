<?php
//<!---------------------------------------�ļ����� 4_3.php-------------------------------->
//����ADODB�ļ�
include_once('adodb5/adodb.inc.php');
//������ҳ�����ļ�
include_once('adodb5/adodb-pager.inc.php');
//����SESSION,��������
session_start();
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
//ѡ��Ҫ��ҳ�ı�
$sql = "select help_topic_id,name,help_category_id,url from help_topic";
//����$pager����
$pager = new ADODB_Pager($conn,$sql);
//��ʼ����ҳ����
$pager->first = "��һҳ";
$pager->prev = "��һҳ";
$pager->next = "��һҳ";
$pager->last = "���һҳ";
$pager->gridAttributes='border="1" cellpadding="3" cellspacing="0"';
//����ÿҳ��ʾ3����¼
$pager->Render($rows_per_page=10);
?>
