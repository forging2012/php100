<?php
/*********************10_5.php*******************************/
//���ð���smtp����ļ�
include("smtp.php");
//����SMTP������
$smtpHost = "smtp.sina.com";
//SMTP�������˿ڣ�Ĭ��Ϊ25
$port =25;
//SMTP��������ע����û�����ĵ�ַ
$From = "����������@sina.com";
//�ռ��˵��������ַ
$to = "�ռ�������@sina.com";
//SMTP���������û��ʺ�
$authuser = "SMTP������֤�û���";
//SMTP���������û�����
$authpass = "SMTP������֤����";
//�ʼ�����
$subject = "���⣺SMTP����";
//�ʼ�����
$body = "<font color=red>��ӭʹ��SMTP�෢�͵����ʼ�</font>";
//�ʼ�����
$type = "HTML";
//ʵ����smtp��
$smtp = new smtp($smtpHost,$port,$authuser,$authpass);
//���͵����ʼ�
$smtp->sendmail($to, $From, $subject, $body, $type);
?>
