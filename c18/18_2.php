<?php
/** 
* ���ȴ���Client���� 
*/ 
$Options = array(
	'uri'=>'nameAPI',  //���������ռ� 
    'location'=>'http://localhost/examples/c18/18_1.php', //����Server��ַ 
    'trace'=>true //����SoapClient��Trace����
);
//ʵ����SoapClient��
$SoapClient = new SoapClient(null,$Options); 
/** 
* Զ�̵���Web Service�еķ��� 
*/ 
try{ //ʹ��try{}catch(){}����SOAP���������еĴ�����Ϣ
   $return = $SoapClient->returnMax(8,9); 
}catch(Exception $e){ 
} 
echo $return;//������صĽ�� 
?>