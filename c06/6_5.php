<!---------------------------------------�ļ����� 6_5.php-------------------------------->
<?php
//�������
$string = "I ���� YOU��";
$url_s1 = "SSC3/sHLIFlPVaOh";
$url_s2 = "I%20%B7%FE%C1%CB%20YOU%A3%A1";
$url_s3 = "I+%B7%FE%C1%CB+YOU%A3%A1";
$url = "http://user:password@www.rzphp.com/index.php?action=show";
$url_array = array("action"=>"show","title"=>"����");
echo "<pre>";
echo "ʹ��parse_url()����������$"."url����:<br>";
print_r(parse_url($url));
echo "ʹ��http_build_query()��������URL�ַ�����".http_build_query($url_array)."<br>";
//���뺬����Ӣ�ĵ��ַ���
echo "ʹ��base64_decode()�������룺".base64_encode($string)."<br>";
echo "ʹ��rawurlencode()�������룺".rawurlencode($string)."<br>";
echo "ʹ��urlencode()�������룺".urlencode($string)."<br>";
//�����ַ���
echo "ʹ��base64_decode()�������룺".base64_decode($url_s1)."<br>";
echo "ʹ��rawurldecode()�������룺".rawurldecode($url_s2)."<br>";
echo "ʹ��urlencode()�������룺".urldecode($url_s3)."<br>";
echo "</pre>";
?>
