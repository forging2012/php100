<?php
if(isset($_GET["mode"]) and $_GET["mode"]=="wsdl"){
	//WSDLģʽ
	function returnMax($x,$y){ 
		if($x-$y>0){
			return $x;
		}else{
			return $y;
		}
	}	
	$SoapServer = new SoapServer('test.wsdl');
	$SoapServer->addFunction('returnMax');
	$SoapServer->handle();
}else{
	//non-WSDLģʽ
	//����һ��������
	class mis{ 
		public function returnMax($x,$y){ 
			if($x-$y>0){
				return $x;
			}else{
				return $y;
			}
		} 
	}
	/** 
	* �������������� 
	*/ 
	$Options = array('uri'=>'nameAPI');    //���������ռ� 
	$SoapServer = new SoapServer(null,$Options); 
	$SoapServer->setClass("mis"); //ע��Basic������з��� 
	$SoapServer->handle(); //����SOAP����
}
?>