<?php
class template{
	var $_debug = "";
	var $_themes = "";
	function template($debug=false){
		$this->_debug = $debug;
	}
	function load($file){
		$this->_themes = $this->getContents($file);
		$this->debug("����ģ���ļ�");
	}
	function setLabel($label,$data){
		$this->_themes = str_replace($label,$data,$this->_themes);
		$this->debug("�滻ģ���ǩ��".$label."Ϊ��".$data);
	}
	function out(){
		print $this->_themes;
		$this->debug("���ģ��");
	}
	function getContents($file){
		$content = "";
		if(file_exists($file)){
			if(function_exists("file_get_contents")){
				$content = file_get_contents($file);
			}else{
				$fp = fopen($file,"r");
				while(!feof($fp)){
					$content .= fread($fp,1024);
				}
				fclose($fp);
			}
		}else{
			$this->debug("��ģ���ļ�ʧ��");
		}
		return $content;
	}
	function debug($error){
		if($this->_debug == true){
			print $error."<br>";
		}
	}
}
?>
