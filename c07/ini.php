<?php
/**************************ini.php******************************/
//����һ����ini��������
class ini{
	//������INI�����ļ��Ĺ�������
	var $_ini = "";
	//����INI�ļ�������
	function create($data){
		$ini = "";
		//��������
		foreach($data as $k=>$v){
			//���������һά�������ɽ�����
			$ini .= "[".$k."]\n\r";
			//������ά����
			foreach($v as $kk=>$kv){
				//����Ĭ��ֵ
				if($kv=="no" or $kv==null or $kv==false){
					$value = "";
				}elseif($kv=="yes" or $kv==true){
					$value = 1;
				}else{
					$value = $kv;
				}
				//���ɼ���ֵ��Ӧ������
				$ini .= $kk." = ".$kv."\n\r";
			}
		}
		$this->_ini = $ini;
	}
	//���ַ�����ʽ��ȡ�����ɺ��INI�ļ�����
	function getContents(){
		print_r($this->_ini);
	}
	//���ļ�����ʽ��ȡ�����ɺ��INI�ļ�����
	function getFile($name){
		$this->BuildFile($name,$this->_ini);
	}
	//���ڴ����ļ��ĺ���
	function BuildFile($getFile,$getContent,$access="w"){
		if(!$handle = fopen ($getFile,$access)){
			echo "ERROR:Ŀ¼Ȩ�����ô���";
			exit();
		}
		if(!fwrite($handle,$getContent)){
			echo "ERROR:�ļ�д�����";
			exit();
		}
		fclose($handle);
	}
	function parse($name,$section=false){
		$this->_ini = parse_ini_file($name,$section);
	}
	function getIni(){
		return $this->_ini;
	}
}
?>