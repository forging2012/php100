<?php
/**************************12_2.php*******************************/
include("cache.php");
//�������ɵĻ����ļ����浽htmlĿ¼�£�����Ϊdemo.html��ʧЧʱ��Ϊ30��
$cache = new cache("html/demo.html",30);
$cache->startCache();
?>
<!-------------����������ݿ�ʼ--------------->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>������ʾ</title>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
</head>
<body>
<?php
for($i=0;$i<10;$i++){
	echo "���ǵ�".$i."�������<br>";
}
?>
</body>
</html>
<!-------------����������ݽ���--------------->
<?php
$cache->endCache();
?>
