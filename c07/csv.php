<?php
//����һ����csv��������
class csv{
	//����CSV�ļ�����
	var $_name = "";
	//����ָ����Ĭ��Ϊ����
	var $_split  = ",";
	//������ʱ�洢select���ݵ�����
	var $_select = array();
	//���캯�������ڳ�ʼ����
	function csv($name="",$split=","){
		if($name==""){
			$this->_name  = time();
		}else{
			$this->_name  = $name;
		}
		$this->_split = $split;
	}
	//�����������ó�ʼ����������ֹ����ͬһ���ļ�
	function set($name="",$split=","){
		if($name==""){
			$this->_name  = time();
		}else{
			$this->_name  = $name;
		}
		$this->_split = $split;
	}
	//ʹ�ñ��ʽ��Ԥ��select()����������
	function preview(){
		$table = "<table border='2'>";
		$row = 0;
		foreach($this->_select as $k=>$v){
			$table .= "<tr>";
				foreach($v as $tk=>$tv){
					$table .= "<td>$tv</td>";
				}
			$table .= "</tr>";
			$row++;
		}
		$table .= "</table>";
		return $table;
	}
	//�����û��ύ�����ݣ�����һ��csv��ʽ���ļ�
	function create($data){
		if(is_array($data)){
			//ʹ�����е�connect()������ȡ���ļ����
			$this->connect($this->_name,"wb");
			foreach($data as $line){
				//ʹ��fputcsv()���������û��ύ������д���ļ�
				fputcsv($this->_fp,$line,$this->_split);
			}
			//ʹ�����е�close()�������ر��ļ����
			$this->close();
			return true;
		}else{
			return false;
		}
	}
	//�����¼��CSV�ļ�
	function insert($row){
		$this->connect($this->_name,"ab");
		fputcsv($this->_fp,$row,$this->_split);
		$this->close();
	}
	//����ָ����ֵ��ɾ��CSV�ļ��е�ĳһ��
	function delete($id){
		$this->connect($this->_name,"rb");
		$row = 0;
		$newData = array();
		while($data = fgetcsv($this->_fp,strlen($this->getRow($row)),$this->_split)){
			if($id-1!=$row){
				$newData[] = $data;
			}
			$row++;
		}
		$this->close();
		$this->create($newData);
		return true;
	}
	//����ĳһ�ֶε�ֵ����ָ��ֵ�Ƿ����
	function select($f,$c){
		$this->connect($this->_name,"rb");
		$row = 0;
		while($data = fgetcsv($this->_fp,strlen($this->getRow($row)),$this->_split)){
			foreach($data as $dk=>$dv){
				if($dk==$f and $dv==$c){
					$this->_select[] = $data;
				}
			}
			$row++;
		}
		$this->close();
		return true;
	}
	//ȡ��CSV�ļ�ĳһ�е�����
	function getRow($id){
		$rows = file($this->_name);
		return $rows[$id];
	}
	//ȡ��CSV�ļ�ĳһ�е����ݣ�����������ʽ����
	function getRowArray($id){
		$rows = file($this->_name);
		return explode($this->_split,$rows[$id]);
	}
	//ȡ��CSV�ļ��ļ�¼��
	function rows(){
		$file = file($this->_name);
		$rows = count($file);
		return $rows;
	}
	/**
	 * �Ա�����ʽ����ʾCSV�ļ�������
	 * $header(true/false):�Ƿ���ʾ��ͷ
	 * $lineNumber(true/false):�Ƿ���ʾ����
	 * */
	function showTable($header = true,$lineNumber=true){
		$this->connect($this->_name,"rb");
		$table = "<table border='2'>";
		$row = 0;
		while($data = fgetcsv($this->_fp,strlen($this->getRow($row)),$this->_split)){
			$table .= "<tr>";
			if($header == true and $row==0){
				if($lineNumber==true){
					$table .= "<th>���</th>";
				}
				foreach($data as $tk=>$tv){
					$table .= "<th>$tv</th>";
				}
			}else{
				if($lineNumber==true){
					$table .= "<td>".$row."</td>";
				}
				foreach($data as $tk=>$tv){
					$table .= "<td>$tv</td>";
				}
			}
			$table .= "</tr>";
			$row++;
		}
		$table .= "</table>";
		$this->close();
		return $table;
	}
	//���ݲ���������һ���ļ���������е���������ʹ��
	function connect($file,$mode){
		if($file==""){
			return false;
		}else{
			if($this->_fp = fopen($file,$mode)){
				return true;
			}else{
				return false;
			}
		}
	}
	//�ر��ļ����
	function close(){
		fclose($this->_fp);
	}
}
?>