<?php
//����ThinkPHP���·��
define('THINK_PATH', 'ThinkPHP/');
//������Ŀ���ƺ�·��
define('APP_NAME', 'book');
define('APP_PATH', 'book');

//���ؿ������ļ�
require(THINK_PATH."/ThinkPHP.php");
//ʵ����һ����վӦ��ʵ��
$App = new App();
//Ӧ�ó����ʼ��
$App->run();
?>