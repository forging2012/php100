<!---------------------------------------�ļ����� 6_4.php-------------------------------->
<?php
//Ϊ��ʹ����JSON�������֧��GB2312�ַ�
//���԰���charset�ַ�����ת���࣬��ʵ���ַ�֮���ת��
include_once("Charset.php");
//����JSON���������
include_once("json.php");
//��ʼ���ַ����������
$charset = new Charset();
//��ʼ��JSON���������
$json = new JSON();
//������Ҫ���������
//ʹ��charset���е�gb2unicode()��������������е�gb2312�ַ�
$string = '[{"username":"'.$charset->gb2unicode("����").'","password":"1","style":"css1"},{"username":"jake","password":"2","style":"css2"}]';
//�Զ������ʽ�����ؽ�����JSON����
$json_data = $json->decode($string,false);
echo "<pre>";
//ʹ�ö���ʽ����������
echo $json_data[0]->username;
print_r($json_data);
//��������ʽ�����ؽ�����JSON����
$json_data = $json->decode($string);
//ʹ�����鷽ʽ����������
echo $json_data[0]["username"];
//��ʾ�������ݵĽṹ
print_r($json_data);
echo "</pre>";
?>
