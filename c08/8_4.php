<?php
/*************************8_4.php****************************/
include("rss.php");
//��ʼ��rss�࣬�������ַ���Ϊgb2312
$rss = new rss();
//����Ҫ��ȡ��RSSƵ����ַ
$rssChannel = "http://rss.zol.com.cn/mobile.xml";
//��ʾδ�����RSS����
$rssContent = $rss->agg($rssChannel);
//ʹ��ģ����ʾRSS����
$rssContent = $rss->agg($rssChannel,1);
?>