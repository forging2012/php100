<?php
/*************************8_3.php****************************/
include("rss.php");
//��ʼ��rss�࣬�������ַ���Ϊgb2312
$rss = new rss("����Ƶ��","http://www.rss.org","�����ãңӣ�����","gb2312");
//��RSS�в����¼
for($i=1;$i<5;$i++){
	$rss->addItem("��".$i."����¼","http://www.rss.org?i=$i","��".$i."�����Լ�¼",date("Y-m-d H:i:s"));
}
//����XML���ݲ���ʾ
$r = $rss->getRss();
echo $r;
//ȡ�ñ���rss���ݵ��ļ�
$rss->getFile("rss.xml");
?>