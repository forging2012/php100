<?php
/*******************13_1.php********************/
include("template.php");
$themes = new template(true);
$themes->load("themes.php");
$title = "ģ����ʾ";
$logo  = "ģ����ʾ�ļ�����ͷ";
$menu = "��ҳ | ��̳ | ���� | ���� | ��ϵ����";
$left = "<div><b>��������</b></div><div>PHP�̳�</div><div>PHPʵ��</div><div><b>��Ʒͼ��</b></div><div>PHPʵ��</div><div>��������</div><div></div>";
$contents = "��ϸ������ʾ����";
$footer = "�������� | ��ϵ���� | ��̳ | ����";
$themes->setLabel("{title}",$title);
$themes->setLabel("{logo}",$logo);
$themes->setLabel("{menu}",$menu);
$themes->setLabel("{left}",$left);
$themes->setLabel("{contents}",$contents);
$themes->setLabel("{footer}",$footer);
$themes->out();
?>
