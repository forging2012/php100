<?php
/******************************9_1.php*********************************/
//����mark��
class mark{
	//���幫�ñ���
	var $_type = "";
	var $_font = "";
	var $_fontColor  = "";
	var $_fontSize   = "";
	var $_target   = "";
	function domark( $sourceFile ,$SaveImage){
		//ʹ��watermark()���������ˮӡ
		$image = $this->Watermark($sourceFile);
		//���JPEG��ʽ��ͼƬ
		ImageJpeg($image,$SaveImage);
		imageDestroy($image);
	}
	//�������캯������ʼ������ر�����������Watermark()������Ϊָ����ͼƬ���ˮӡ
	function mark($type, $Font, $color, $fontSize, $target){
		//����ˮӡ����
		$this->_type = $type;
		//����ˮӡ����ʹ�õ�����
		$this->_font = $Font;
		//����ˮӡ��ʹ�õ���ɫ
		$this->_fontColor = $color;
		$this->_fontSize = $fontSize;
		//��������λ��
		$this->_target = $target;
	}
	//�����������ò�����setMark����
	function setMark($type, $Font, $color, $fontSize, $target){
		//����ˮӡ����
		$this->_type = $type;
		//����ˮӡ����ʹ�õ�����
		$this->_font = $Font;
		//����ˮӡ��ʹ�õ���ɫ
		$this->_fontColor = $color;
		$this->_fontSize = $fontSize;
		//��������λ��
		$this->_target = $target;
	}
	//���ˮӡ������
	function WaterMark($Source) {
		//����$source�����ͣ��ж����ˮӡ���֣�����ˮӡͼƬ
		if(is_string($Source)) {
			$image = $this->getImageType($Source);
		}else{
			$image = $Source;
		}
		//ȡ��ͼ��Ŀ��
		$W = imageSX($image);
		//ȡ��ͼ��ĸ߶�
		$H = imageSY($image);
		//���û������ˮӡ���ֻ�ͼ��ʱ��ͨ������
		if(strlen(Trim($this->_type)) == 0) {
			die("��û������ˮӡ���ֻ�ͼ�꣡");
			exit();
		}
		//���ˮӡͼ���ļ���ʱ����ȡˮӡͼƬ�Ŀ�͸�
		if (file_exists($this->_type)) {
			$waterIm = $this->getImageType($this->_type);
			$waterWidth = imageSX($waterIm);
			$waterHeight = imageSY($waterIm);
		}else{
			//Ϊˮӡ���ֽ���ת��
			$WaterText = iconv('gb2312', 'utf-8', $this->_type);
			//����ˮӡ���ֵ�����ʹ�С
			$info = (!file_exists($this->_font)) ? ImageTTFBBox($this->_fontSize, 0, "ARIAL.TTF", $WaterText) : ImageTTFBBox($this->_fontSize, 0, $this->_font, $WaterText);
			$waterWidth = $info[4] - $info[6];
			$waterHeight = $info[1] - $info[7];
			unset($info);
		}
		//�����û����õ����ݣ�����ˮӡ��λ��
		switch($this->_target){
			case 0 :
				$X = rand(10, ($W - $waterWidth) -10);
				$Y = rand(10, ($H - $waterHeight) -10);
				break;
			case 1 :
				$X = 10;
				$Y = 0;
				break;
			case 2 :
				$X = ($W - $waterWidth) / 2;
				$Y = 0;
				break;
			case 3 :
				$X = $W - $waterWidth -10;
				$Y = 0;
				break;
			case 4 :
				$X = 10;
				$Y = ($H - $waterHeight) / 2;
				break;
			case 5 :
				$X = ($W - $waterWidth) / 2;
				$Y = ($H - $waterHeight) / 2;
				break;
			case 6 :
				$X = $W - $waterWidth -10;
				$Y = ($H - $waterHeight) / 2;
				break;
			case 7 :
				$X = 10;
				$Y = $H - $waterHeight -10;
				break;
			case 8 :
				$X = ($W - $waterWidth) / 2;
				$Y = $H - $waterHeight -10;
				break;
			case 9 :
				$X = $W - $waterWidth -10;
				$Y = $H - $waterHeight -10;
				break;
			default :
				$X = rand(10, ($W - $waterWidth) -10);
				$Y = rand(10, ($H - $waterHeight) -10);
				break;
		}
		//������ɫģʽ
		imageAlphaBlending($image, true);
		//���ˮӡͼƬ���ڣ���λˮӡͼ���λ�ã�λ�ϲ�����ͼƬ
		if (file_exists($this->_type)) {
			$X == 10 ? $X = 0 : $X == $W - $waterWidth -10 ? $X = $X +10 : $X;
			$Y == $H - $waterHeight -10 ? $Y = $Y +10 : $Y;
			imagecopymerge($image, $waterIm, $X, $Y, 0, 0, $waterWidth, $waterHeight, 100);
		} else {
			//�������ˮӡ���֣������������ɫ
			if (!Empty ($this->_fontColor) && strlen($this->_fontColor) == 7) {
				$bjRGB = imagecolorallocate($image, Hexdec(substr($this->_fontColor, 1, 2)), Hexdec(substr($this->_fontColor, 3, 2)), Hexdec(substr($this->_fontColor, 5)));
				file_exists($this->_font) ? imagettftext($image, $this->_fontSize, 0, $X, $Y + $waterHeight, $bjRGB, $this->_font, $WaterText) : imageTtfText($image, $this->_fontSize, 0, $X, $Y + $waterHeight, $bjRGB, "ARIAL.TTF", $WaterText);
			} else {
				die("������ɫ��ʽ����");
			}
		}
		//ɾ���Ѿ����õ���ر���
		if (isset($WaterText)){unset($WaterText);}
		if (isset($waterWidth)){unset($waterWidth);}
		if (isset($waterHeight)){unset($waterHeight);}
		if (isset($W)){unset($W);}
		if (isset($H)){unset($H);}
		if (isset($X)){unset($X);}
		if (isset($bjRGB)){unset($bjRGB);}
		if (isset($waterIm)){imageDestroy($waterIm);}
		return($image);
	}
	//�����ļ�������һ�����ݶ�Ӧ��ʽ���ɵ�ͼ��
	function getImageType($file) {
		//ʹ��getimagesize()����������ͼ���������
		file_exists($file) ? $TempImage = getimagesize($file) : die("getImageType:������������ȷ��");
		switch ($TempImage[2]) {
			case 1 :
				$image = imageCreateFromGif($file);
				break;
			case 2 :
				$image = imageCreateFromJpeg($file);
				break;
			case 3 :
				$image = imageCreateFromPng($file);
				break;
			default :
				die("��֧�ָ��ļ���ʽ,��ʹ��GIF��JPG��PNG��ʽ��");
		}
		unset($TempImage);
		return ($image);
	}
}
$mark = new mark("icon.jpg","simhei.ttf","#00cccc",25,2);
$mark->domark("base.jpg","water.jpg");
echo "<img src='water.jpg'>";
$mark->setMark("ˮӡ������ʾ","simhei.ttf","#00cccc",25,5);
$mark->domark("base.jpg","text.jpg");
echo "<img src='text.jpg'>";
?>