<?php
//<!---------------------------------------�ļ����� 5_4.php-------------------------------->
//��ѡ����һ���ϴ��࣬������ƾͽ���upload
class upload{
	//��������ʹ�õ��ı���
	//���ڴ洢�����Ĵ�����Ϣ
	var $error = "";
	//�洢�ͻ����ύ���ļ���Ϣ
	var $uploadFile = "";
	//�洢�ļ���mimeֵ��Ĭ��Ϊtext/plain
	var $mimeType = "text/plain";
	//���ڴ��mimeֵ������
	var $filterType = array();
	//���ڴ洢���ϴ��ļ����͵ı���
	var $Filter = "";
	//���ÿ��ϴ��ļ���С
	var $fileSize = 1024;
	//�����ϴ�Ŀ¼,Ĭ��ֵΪhtml
	var $path = "html";
	//��������������
	var $rename = true;
	var $ext = "";//���ڴ洢�ļ���չ��
	var $stat = false;//���ڴ洢�ļ��ϴ�״̬
	//ʹ�ù�����������ʼ����
	function __construct($files,$path="html",$rename="true"){
		//�����ϴ�·��
		$this->path = $path;
		//����$filterType����
		$this->filterType();
		//����$Filter����
		$this->Filter();
		//�����ϴ��ļ�
		$this->uploadFile = $files;
		//��������������
		$this->rename = $rename;
		//��ʼ�ϴ��ļ�
		$this->uploadFile();
	}
	//���������ļ�����
	function uploadFile(){
		$file = $this->uploadFile;
		if(isset($file["tmp_name"]) and file_exists($file["tmp_name"])){
			//������ʱ�ļ�����
			$tmp = $file["tmp_name"];
			$name = $file["name"];
			//�����ļ���ŵ�Ŀ¼
			$dir = $this->path;
			//ʹ��checkFileType()��������ϴ��ļ��Ƿ�Ϸ�
			if($this->checkFileType($name,$tmp)==false){
				return false;
				exit();
			}
			if($this->checkFileSize($tmp)==false){
				return false;
				exit();
			}
			//�������������أ��������ļ���
			if($this->rename == true){
				$filename = $this->newName().".".$this->ext;
			}else{
				$filename = $file["name"];
			}
			//ʹ��move_uploaded_file()���ϴ�����ʱ�ļ�,�ƶ�����Ŀ¼
			if(move_uploaded_file($tmp,$dir."/".$filename)){
				$this->stat = true;
				return true;
			}else{
				$this->stat = false;
				$this->error .= "�ļ��ϴ�ʧ�ܣ�<br>";
				return false;
			}
		}else{
			$this->error .= "�ϴ��ļ������ڣ�<br>";
			return false;
		}
	}
	//�������ļ���
	function newName(){
		return time();
	}
	//���������ϴ��ļ���С
	function setFileSize($size){
		$this->fileSize = $size;
	}
	//����ļ���С�Ƿ�Ϸ�
	function checkFileSize($file){
		$filesize = filesize($file);
		if($filesize <= $this->fileSize){
			return true;
		}else{
			$this->error .= "�ϴ��ļ����������ļ���С��";
			return false;
		}
	}
	//����ļ�����
	function checkFileType($filename,$file){
		//ȡ���ļ�����չ��
		$ext = strtolower(end(explode(".",$filename)));
		$this->ext = $ext;
		//����ϴ��ļ�����չ�����Ƿ���$this->Filter������
		//����ϴ��ļ�����չ����$this->Filter�����У��������ϴ�
		if(in_array($ext,$this->Filter)){
			//ʹ��function _exists()�������mime_content_type()�����Ƿ����
			if(function_exists("mime_content_type")){
				//���mime_content_type()�������ڣ�ʹ����ȡ���ļ���mimeֵ
				$this->mimeType = mime_content_type($file);
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
			$this->error .= "���ļ����Ͳ������ϴ���<br>";
			return false;
		}
	}
	/**
	 * �ļ��ϴ�ͳ��
	 * ͨ�������������԰��ļ��ϴ�����Ϣ�洢���ļ������ݿ���
	 * ���Ժ�����ʱʹ��
	 * */
	function saveUpload(){
		//�ļ��ϴ�ͳ�ƺ���
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
		//���ϴ��ֻ࣬�����ϴ�.txt���ļ����û�����ͨ�������������ø���֧�ָ�����ļ��ϴ���
		$this->Filter = array("txt","zip");
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
//����ϴ�����
if(isset($_GET["action"]) and $_GET["action"]=="upload") {
	//��ʼ��download��
	$up = new upload($_FILES["file"]);
	//����ļ��ϴ��ɹ�����ʾ�ϴ��ɹ���Ϣ
	if($up->stat==true){
		echo "�ļ��ϴ��ɹ���";
		exit();
	}else{
		//����ϴ�ʧ�ܣ���ʾ������Ϣ��
		echo $up->getError();
		exit();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ϴ��ļ�</title>
</head>

<body>
<form action="?action=upload" method="post" enctype="multipart/form-data" name="sendfile">
  <label>ѡ���ϴ��ļ�:
  <input type="file" name="file" />
  </label>
  <label>
  <input type="submit" name="Submit" value="�ϴ�" />
  </label>
</form>
</body>
</html>

