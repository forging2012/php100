<?php
session_start();
//<!---------------------------------------�ļ����� 4_6.php-------------------------------->
//����ADODB�ļ�
include_once('adodb5/adodb.inc.php');
include_once('adodb5/tohtml.inc.php');
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
//ʹ��SESSION��¼��ǰҳ��
session_register('current_page_number');
//����ÿһҳ�ļ�¼��
$numofpage = 10;
$sql = 'select help_topic_id,name,help_category_id,url from help_topic';

if (isset($HTTP_GET_VARS['next_page']))
        $current_page_number = $HTTP_GET_VARS['next_page'];
if (empty($current_page_number)) $current_page_number = 1; ## at first page
//ʹ��PageExecute()������ȡ����Դ���
$rs = $conn->PageExecute($sql, $numofpage, $current_page_number);
//�����¼ָ�벻��β�������Ҳ��ڵ�һҳ�����һҳ����ʾ��ҳ����
if (!$rs->EOF && (!$rs->AtFirstPage() || !$rs->AtLastPage())){
	//�����ǰ��ʾ��¼���ǵ�һҳ����ʾ��һҳ��ҳ����
	if (!$rs->AtFirstPage()){
		echo '<a href="'.$PHPSELF.'?next_page='.($rs->AbsolutePage() - 1).'">��һҳ</a>';
	}
	//�����¼��ʾ�Ĳ������һҳ����ʾ��һҳ��ҳ����
	if(!$rs->AtLastPage()){
		echo '<a href="'.$PHPSELF.'?next_page='.($rs->AbsolutePage() + 1).'">��һҳ</a>';
	}
	//ʹ��rs2html()��������ʾ����
	rs2html($rs);
}
?>
