<?php
/******************************9_2.php*********************************/
//����resizeImage��
class resizeImage {
	//ͼƬ����
	var $_type = "";
	//ͼƬʵ�ʿ��
	var $_width;
	//ͼƬʵ�ʸ߶�
	var $_height;
	//�ı��Ŀ��
	var $_resizeWidth;
	//�ı��ĸ߶�
	var $_resizeHeight;
	//�Ƿ��ͼ
	var $_cut = false;
	//Դͼ��
	var $_source = "";
	//���ɺ��Ŀ���ַ
	var $_target = "";
	//���ͼ�ξ��
	var $_im = "";
	//���캯�������ó�ʼ����
	function resizeImage($image, $width, $height, $cut = false) {
		$this->_source = $image;
		$this->_resizeWidth = $width;
		$this->_resizeHeight = $height;
		$this->_cut = $cut;
	}
	//ִ�����źͼ��ù���
	function dosc($name=""){
		if($name == ""){
			$name = time();
		}
		//����ͼƬ���ͣ�����һ��ͼ�ξ��
		$this->getImageType($this->_source);
		//Ŀ��ͼ���ַ
		$this->_target = $name. "_small." . $this->_type;
		$this->_width = imagesx($this->_im);
		$this->_height = imagesy($this->_im);
		//����ͼ��
		$this->smallandcut();
		ImageDestroy($this->_im);
	}
	//�����������Ų���
	function setsc($image, $width, $height, $cut = false){
		$this->_source = $image;
		$this->_resizeWidth = $width;
		$this->_resizeHeight = $height;
		$this->_cut = $cut;
	}
	//�������źͼ��ú���
	function smallandcut() {
		//ȡ�øı���ͼ�εı���
		$resize = ($this->_resizeWidth) / ($this->_resizeHeight);
		//ʵ��ͼ�εı���
		$normal = ($this->_width) / ($this->_height);
		//���м���
		if (($this->_cut) == true){
			if ($normal >= $resize) {
				$smallImage = imagecreatetruecolor($this->_resizeWidth, $this->_resizeHeight);
				imagecopyresampled($smallImage, $this->_im, 0, 0, 0, 0, $this->_resizeWidth, $this->_resizeHeight, (($this->_height) * $resize), $this->_height);
				ImageJpeg($smallImage, $this->_target);
			}
			if ($normal < $resize) {
				$smallImage = imagecreatetruecolor($this->_resizeWidth, $this->_resizeHeight);
				imagecopyresampled($smallImage, $this->_im, 0, 0, 0, 0, $this->_resizeWidth, $this->_resizeHeight, $this->_width, (($this->_width) / $resize));
				ImageJpeg($smallImage, $this->_target);
			}
		} else {
			//����������
			if ($normal >= $resize) {
				$smallImage = imagecreatetruecolor($this->_resizeWidth, ($this->_resizeWidth) / $normal);
				imagecopyresampled($smallImage, $this->_im, 0, 0, 0, 0, $this->_resizeWidth, ($this->_resizeWidth) / $normal, $this->_width, $this->_height);
				ImageJpeg($smallImage, $this->_target);
			}
			if ($normal < $resize) {
				$smallImage = imagecreatetruecolor(($this->_resizeHeight) * $normal, $this->_resizeHeight);
				imagecopyresampled($smallImage, $this->_im, 0, 0, 0, 0, ($this->_resizeHeight) * $normal, $this->_resizeHeight, $this->_width, $this->_height);
				ImageJpeg($smallImage, $this->_target);
			}
		}
	}
	//�����ļ�������һ�����ݶ�Ӧ��ʽ���ɵ�ͼ��
	function getImageType($file) {
		//ʹ��getimagesize()����������ͼ���������
		file_exists($file) ? $TempImage = getimagesize($file) : die("getImageType:������������ȷ��");
		switch ($TempImage[2]) {
			case 1 :
				$image = imageCreateFromGif($file);
				$this->_type = "gif";
				break;
			case 2 :
				$image = imageCreateFromJpeg($file);
				$this->_type = "jpg";
				break;
			case 3 :
				$image = imageCreateFromPng($file);
				$this->_type = "png";
				break;
			default :
				die("��֧�ָ��ļ���ʽ,��ʹ��GIF��JPG��PNG��ʽ��");
		}
		unset ($TempImage);
		$this->_im = $image;
	}
}
?>
<?php
//ʵ����resizeImage��
$resize = new resizeImage("source.jpg", "300", "200", false);
//�����������ļ���ǰ׺
$resize->dosc("nocut");
//��ʾ���ź��ͼ��
echo '<img src="'.$resize->_target.'" border="0">';
//�����������Ų���
$resize->setsc("source.jpg", "300", "200", true);
//����ͼ��ϵͳ�ṩ��ǰ׺��
$resize->dosc();
//��ʾ���Ų����õ�ͼ��
echo '<img src="'.$resize->_target.'" border="0">';
?>