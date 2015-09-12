<?php
class xml{
	//����Ĭ���ַ���
	var $_char    = "utf-8";
	var $_charset = "<?xml version=\"1.0\" encoding=\"{char}\" ?>";
	//���ø��������
	var $_root    = "root";
	//���ڴ洢XML���ݵı���
	var $_xml     = "";
	//��ʼ���ַ�������
	function xml($char="utf-8"){
		$this->_char = $char;
	}
	//����һ����¼
	function insert($line){
		if(is_array($line)){
			$xml = "<items>";
			foreach($line as $k=>$v){
				$xml .= "<".$k.">".$v."</".$k.">";
			}
			$xml .= "</items>";
			$this->_xml .= $xml;
		}
	}
	//����Ҫ��ǩ
	function setRoot($root){
		$this->_root = $root;
	}
	//ȡ��XML����
	function getContents(){
		//ȡ���ַ��������ַ�
		$charset = str_replace("{char}",$this->_char,$this->_charset);
		//ʹ���ַ���������㡢XML�������������XML����
		$this->_xml = $charset."<".$this->_root.">".$this->_xml."</".$this->_root.">";
		return $this->_xml;
	}
	//����XML����
	function parse($xmlFile){
		if(function_exists("simplexml_load_file")){
			$xml = simplexml_load_file($xmlFile);
		}elseif(function_exists("file_get_contents")){
			$xml = file_get_contents($xmlFile);
			$xml = new SimpleXMLElement($xml);
		}elseif(function_exists("fopen")){
			$handle = fopen($xmlFile,"r");
			$xml = "";
			while(!feof($handle)) {
				$xml .= fread($handle, 8192);
			}
			fclose($handle);
			$xml = new SimpleXMLElement($xml);
		}else{
			$xml = false;
		}
		return $xml;
	}
}
?>
