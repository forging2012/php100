<!-------------------------------------------�ļ����� 3_10.php-------------------------------->
<?php
$code = "�����ַ���";
echo "û�о������ܵ��ַ�����".$code."<br>";
$encode = convert_uuencode($code);
echo "����convert_uuencode()�������ܵ��ַ�����".$encode."<br>";
$decode = convert_uudecode($encode);
echo "ʹ��convert_uudecode()�������ܵ��ַ�����".$decode."<br>";
//����һ������MD5ֵ���ַ���
$havemd5 = "3e33ee01c1ef9c0c15612f48be27dae6";
$md5code = md5($decode);
echo "ʹ��md5()�������ܵ��ַ�����".$md5code."<br>";
if($havemd5==$md5code){
	echo "�ַ���MD5��ȣ�������ʾ���룡<br>";
}else{
	echo "�ַ���MD5����ȣ�������ʾ���룡<br>";
	exit();
}
$md5file = md5_file("3_10.php");
echo "��ǰ�ļ���MD5ֵ��".$md5file."<br>";
//�Զ�����ܺ���
function encode($str){
	//����һ���ַ��������ڴ洢���ܺ���ַ���
	$encode = "";
	//����һ����Կ����
	$key = 12;
	//����ת���ַ���ASCII�룬����Կ������Ӻ���ת��Ϊ�ַ�
	for($i=0;$i<=strlen($str);$i++){
		$encode .= chr(ord($str[$i])+$key);
	}
	//����ת������ַ���
	return convert_uuencode($encode);
}
//�Զ�����ܺ���
function decode($str){
	//����һ���ַ��������ڴ洢���ܺ���ַ���
	$decode = "";
	//����һ����Կ���֣�Ӧ����ܺ����е���Կ��ͬ
	$key = 12;
	$destr = convert_uudecode($str);
	//����ת���ַ���ASCII�룬����Կ�����������ת��Ϊ�ַ�
	for($i=0;$i<=strlen($destr);$i++){
		$decode .= chr(ord($destr[$i])-$key);
	}
	//����ת������ַ���
	return $decode;
}
$userEncode = encode($decode);
echo "ʹ���Զ��庯��encode()���ܵ��ַ�����".$userEncode."<br>";
$userDecode = decode($userEncode);
echo "ʹ���Զ��庯��decode()���ܵ��ַ�����".$userDecode;
?>