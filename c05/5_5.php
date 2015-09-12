<?php
//<!---------------------------------------�ļ����� 5_5.php-------------------------------->
//��ѡ����һ�������࣬������ƾͽ���download
class download{
	//��������ʹ�õ��ı���
	//���ڴ洢�����Ĵ�����Ϣ
	var $error = "";
	//�洢�����ļ�����
	var $downFile = "";
	//�洢�����ļ���mimeֵ��Ĭ��Ϊtext/plain
	var $mimeType = "text/plain";
	//���ڴ��mimeֵ������
	var $filterType = array();
	//���ڴ洢���ϴ��ļ����͵ı���
	var $Filter = "";
	//ʹ�ù�����������ʼ����
	function __construct($filename){
		//����$filterType����
		$this->filterType();
		//����$Filter����
		$this->Filter();
		//�����ϴ��ļ�
		$this->downFile = $filename;
		//�����ļ�
		$this->downFile();
	}
	//���������ļ�����
	function downFile(){
		//ʹ��checkFileType()������������ļ��Ƿ�Ϸ�
		if($this->checkFileType()){
			//ȡ���ļ�����
			$filename = end(explode('/',strtr($this->downFile,'\\','/')));
			//����ͷ��Ϣ
			header("Pragma:public");
			header("Expires:0");
			header("Cache-Component:must-revalidate,post-check=0,pre-check=0");
			header("Content-type:".$this->mineType);
			header("Content-Length:".filesize($this->downFile));
			header("Content-Disposition:attachment;filename=".$filename);
			header("Content-Transfer-Encoding:binary");
			//����ļ���������
			readfile($this->downFile);
			return true;
		}else{
			return false;
		}
	}
	//����ļ�����
	function checkFileType(){
		//������ص��ļ��Ƿ����
		if(file_exists($this->downFile)){
			//ȡ���ļ�����չ��
			$ext = strtolower(end(explode(".",$this->downFile)));
			//��������ļ�����չ�����Ƿ���$this->Filter������
			//��������ļ�����չ����$this->Filter�����У�����������
			if(in_array($ext,$this->Filter)){
				//ʹ��function _exists()�������mime_content_type()�����Ƿ����
				if(function_exists("mime_content_type")){
					//���mime_content_type()�������ڣ�ʹ����ȡ���ļ���mimeֵ
					$this->mimeType = mime_content_type($this->downFile);
				}else{
					//���mime_content_type()���������ڣ�ʹ��$this->filterTypeȡ��mimeֵ
					if(isset($this->filterType[$ext])){
						$this->mimeType = $this->filterType[$ext];
					}
				}
				//�����ȡmimeֵ��$this->mimeTypeֵ��ȻΪ�գ���ʾ������Ϣ
				if(empty($this->mimeType)){
					$this->error .= "��ȡ�ļ����ͳ���";
					return false;
				}else{
					return true;
				}
			}else{
				$this->error .= "���ļ����Ͳ��������أ�<br>";
				return false;
			}
		}else{
			$this->error .= "�ļ������ڣ�<br>";
			return false;
		}
	}
	/**
	 * �ļ�����ͳ��
	 * ����������ļ�ͳ����Ϣ����������ļ���
	 * ��ʵ��Ӧ���У������޸��������
	 * ��ͳ����Ϣ��������ݿ���
	 * */
	function countDownload(){
		$count = file_get_contents($this->downFile);
		$fp = fopen($this->downFile,"w");
		if($count==""){
			$count = 0;
		}
		$count++;
		fwrite($fp,$count,strlen($count));
		fclose($fp);
	}
	//ȡ�ô�����Ϣ
	function getError(){
		return $this->error;
	}
	/**
	 * ���������ϴ����ļ���չ��
	 * ���磺txt��html��php��exe��js��
	 * */
	function Filter(){
		//�������ֻ࣬��������.txt���ļ�
		$this->Filter = array("txt");
	}
	//�������$this->filterType����
	function filterType(){
	    $this->filterType['chm']='application/octet-stream';
	    $this->filterType['ppt']='application/vnd.ms-powerpoint';
	    $this->filterType['xls']='application/vnd.ms-excel';
	    $this->filterType['doc']='application/msword';
	    $this->filterType['exe']='application/octet-stream';
	    $this->filterType['rar']='application/octet-stream';
	    $this->filterType['js']="javascript/js";
	    $this->filterType['css']="text/css";
	    $this->filterType['hqx']="application/mac-binhex40";
	    $this->filterType['bin']="application/octet-stream";
	    $this->filterType['oda']="application/oda";
	    $this->filterType['pdf']="application/pdf";
	    $this->filterType['ai']="application/postsrcipt";
	    $this->filterType['eps']="application/postsrcipt";
	    $this->filterType['es']="application/postsrcipt";
	    $this->filterType['rtf']="application/rtf";
	    $this->filterType['mif']="application/x-mif";
	    $this->filterType['csh']="application/x-csh";
	    $this->filterType['dvi']="application/x-dvi";
	    $this->filterType['hdf']="application/x-hdf";
	    $this->filterType['nc']="application/x-netcdf";
	    $this->filterType['cdf']="application/x-netcdf";
	    $this->filterType['latex']="application/x-latex";
	    $this->filterType['ts']="application/x-troll-ts";
	    $this->filterType['src']="application/x-wais-source";
	    $this->filterType['zip']="application/zip";
	    $this->filterType['bcpio']="application/x-bcpio";
	    $this->filterType['cpio']="application/x-cpio";
	    $this->filterType['gtar']="application/x-gtar";
	    $this->filterType['shar']="application/x-shar";
	    $this->filterType['sv4cpio']="application/x-sv4cpio";
	    $this->filterType['sv4crc']="application/x-sv4crc";
	    $this->filterType['tar']="application/x-tar";
	    $this->filterType['ustar']="application/x-ustar";
	    $this->filterType['man']="application/x-troff-man";
	    $this->filterType['sh']="application/x-sh";
	    $this->filterType['tcl']="application/x-tcl";
	    $this->filterType['tex']="application/x-tex";
	    $this->filterType['texi']="application/x-texinfo";
	    $this->filterType['texinfo']="application/x-texinfo";
	    $this->filterType['t']="application/x-troff";
	    $this->filterType['tr']="application/x-troff";
	    $this->filterType['roff']="application/x-troff";
	    $this->filterType['shar']="application/x-shar";
	    $this->filterType['me']="application/x-troll-me";
	    $this->filterType['ts']="application/x-troll-ts";
	    $this->filterType['gif']="image/gif";
	    $this->filterType['jpeg']="image/pjpeg";
	    $this->filterType['jpg']="image/pjpeg";
	    $this->filterType['jpe']="image/pjpeg";
	    $this->filterType['ras']="image/x-cmu-raster";
	    $this->filterType['pbm']="image/x-portable-bitmap";
	    $this->filterType['ppm']="image/x-portable-pixmap";
	    $this->filterType['xbm']="image/x-xbitmap";
	    $this->filterType['xwd']="image/x-xwindowdump";
	    $this->filterType['ief']="image/ief";
	    $this->filterType['tif']="image/tiff";
	    $this->filterType['tiff']="image/tiff";
	    $this->filterType['pnm']="image/x-portable-anymap";
	    $this->filterType['pgm']="image/x-portable-graymap";
	    $this->filterType['rgb']="image/x-rgb";
	    $this->filterType['xpm']="image/x-xpixmap";
	    $this->filterType['txt']="text/plain";
	    $this->filterType['c']="text/plain";
	    $this->filterType['cc']="text/plain";
	    $this->filterType['h']="text/plain";
	    $this->filterType['html']="text/html";
	    $this->filterType['htm']="text/html";
	    $this->filterType['htl']="text/html";
	    $this->filterType['rtx']="text/richtext";
	    $this->filterType['etx']="text/x-setext";
	    $this->filterType['tsv']="text/tab-separated-values";
	    $this->filterType['mpeg']="video/mpeg";
	    $this->filterType['mpg']="video/mpeg";
	    $this->filterType['mpe']="video/mpeg";
	    $this->filterType['avi']="video/x-msvideo";
	    $this->filterType['qt']="video/quicktime";
	    $this->filterType['mov']="video/quicktime";
	    $this->filterType['moov']="video/quicktime";
	    $this->filterType['movie']="video/x-sgi-movie";
	    $this->filterType['au']="audio/basic";
	    $this->filterType['snd']="audio/basic";
	    $this->filterType['wav']="audio/x-wav";
	    $this->filterType['aif']="audio/x-aiff";
	    $this->filterType['aiff']="audio/x-aiff";
	    $this->filterType['aifc']="audio/x-aiff";
		$this->filterType['swf']="application/x-shockwave-flash";
	}
}
//ģ�����ݿ�洢���ļ��б�
$files = array(
	1=>array("html/1.txt")
);
//�����������
if(isset($_GET["action"]) and $_GET["action"]=="download") {
	//ȡ������ļ�ֵ
	$fid = $_GET["fid"];
	//���ݼ�ֵ��ȡ�������ļ�����
	$filename = $files[$fid][0];
	//��ʼ��download��
	$down = new download($filename);
	//������سɹ���������������
	if($down==true){
		exit();
	}else{
		//�������ʧ�ܣ���ʾ������Ϣ��
		echo $down->getError();
		exit();
	}
}
//ֱ�������ļ��ķ�ʽ
foreach($files as $key=>$val){
	echo "ͨ�������Ҽ�->�ļ����Ϊ�����ļ���<a href='".$val[0]."'>".$val[0]."</a><br>";
}
//ͨ��URL��ת�����ļ��ķ���
foreach($files as $key=>$val){
	echo "ͨ���������������ļ���<a href='?action=download&fid=".$key."'>".$val[0]."</a><br>";
}
?>
