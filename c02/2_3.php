<?php
/*************************���ñ���************************************/
$varint    = 55;                 //����һ����Ϊ$varint�����ͱ���
$varinteger = "4";              //����һ����Ϊ$varinteger���ַ������� 
$varstring = "С��";      //����һ����Ϊ$varstring���ַ�������
$varbool   = true;               //����һ����Ϊ$varbool�Ĳ����ͱ���
$varfloat  = 160.88;               //����һ����Ϊ$varfloat�ĸ����ͱ���
$varobject = "will be an object";//����һ����Ϊ$varobject���ַ�������
/**
* ����һ����Ϊ$varsarray���������
* */
$varsarray = array(
	"1"=>"one",
	"2"=>"two"
);
/**
* ����һ����Ϊ$vardarray�Ķ�ά�������
* */
$vardarray = array(
	"cn"=>array("1"=>"һ","2"=>"��"),
	"en"=>array("1"=>"one","2"=>"two")
);
/*************************ʹ�ñ���************************************/
//ʹ�ò���ֵ��Ϊ����
if($varbool == true){
	//��ͬһ�д����У�ʹ���ַ������ͺ͸����ͱ���
	echo $varstring."������ǣ�{$varfloat}����<br>";
}
echo $varint*$varfloat;
echo "<br>";
//��������
foreach($varsarray as $a){
	echo $a."<br>";
}
//��ͬһ�д����У�ʹ���������
echo "���ĵ�1��2��".$vardarray["cn"]["1"]."��".$vardarray["cn"]["2"]."<br>";
echo 'Ӣ�ĵ�1��2��'.$vardarray['en']['1'].'��'.$vardarray['en']['2'].'<br>';
?>