<!---------------------------------�ļ����� 3_13.php-------------------------------->
<?php
//��ǰ����������������ʱ������
$nextWeek = time() + (7 * 24 * 60 * 60);
//��ʾ��ǰ����
echo '��������:'. date('Y-m-d') ."<br>";
//��ʾ��������
echo '��������:'. date('Y-m-d', $nextWeek)."<br>";
//ȡ��1981��1��1�յ�Unixʱ���
$time1 = mktime(0,0,0,1,1,1981);
//ȡ�õ�ǰʱ���Unixʱ���
$time2 = mktime();
//��ʽ��ʱ�����ת��Ϊ�������ڸ�ʽ
$oldtime = date("Y-m-d H:i:s",$time1);
$nowtime = date("Y-m-d H:i:s",$time2);
//��ʾ����
echo $oldtime."<br>".$nowtime."<br>";
//����ʱ��������ó�ʱ���
echo $nowtime-$oldtime;
?>