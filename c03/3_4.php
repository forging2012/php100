<!-------------------------------------------�ļ����� 3_4.php-------------------------------->
<?php
//����һ����������ֵΪҪ�򿪵��ļ�
$file = "do.txt";
//ʹ��fopen()�������ļ����򿪷�ʽ��w.��ʹ���ж���״̬��
if(false === ($fp = fopen($file,"w"))){
	echo "���ļ�ʧ�ܣ�<br>";
}else{
	echo "�ļ��򿪳ɹ���<br>";
}
//����������洢д���ļ�������
$c = "д��do.txt�ļ�������";
//ʹ��fwrite()����д���ļ������ж�д��״̬��
if(fwrite($fp,$c,strlen($c))===false){
	echo "�ļ�д��ʧ�ܣ�<br>";
}else{
	echo "�ļ�д��ɹ���<br>";
}
//�ر��ļ����
fclose($fp);
//ʹ��fopen()���ļ����򿪷�ʽ��r
$fp = fopen($file,"r");
//ʹ��fread()��ȡ�ļ���ǰ8192���ֽڡ�
echo "<br>��ʾ��ȡ���ļ����ݣ�<br>".fread($fp,8192);
//�ر��ļ����
fclose($fp);
//���ʴ����ļ�
$handle = fopen("http://www.baidu.com","r");
$contents = "";
//ѭ����ȡ�ļ�
while (!feof($handle)){
	//���û�е��ļ�β��������ȡ�ļ�
	$contents .= fread($handle, 8192);
}
fclose($handle);
echo $contents;
//ʹ��file_put_contents()���������ļ�д�����ݣ����ж�д��״̬
if(file_put_contents($file,"ʹ��file_put_contents()����д������ݡ�")>0){
	echo "<br>ʹ��file_put_contents()����д���ļ��ɹ���<br>";
}else{
	echo "<br>ʹ��file_put_contents()����д���ļ�ʧ�ܣ�<br>";
}
//ʹ��file_get_contents()������ȡ�ļ����ݣ�����ʾ
$get = file_get_contents($file);
echo "<br>ʹ��file_get_contents()������ȡ���ļ����ݣ�<br>".$get;
?>
