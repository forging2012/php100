<?
/** 
 * ��ȡͼ����Ϣ����
 */
class exif{
	/**
	*��ʾ�ļ�Exif����
	* */
	function exifshow($postimage){
		//�������ڱ��������ݵı���
		$innerhtml = "";
		//ʹ��GetImageInfo()������ȡ����ͼƬEXIF��Ϣ������
		$exif = $this->GetImageInfo($postimage);
		//��ʼ�������
		$innerhtml .= "<TABLE id='exif'>";		
		foreach ( $exif as $name => $val ) {
			$innerhtml .= "<TR><TD>".$name."</TD><TD>".$val."</TD></TR>";
		}
		//��ʾ����ͼ		
		$innerhtml .= "<TR><TD colspan=\"2\">";
		//ʹ��exif_thumbnail()������ȡͼƬ�е�����ͼ����
		$image = exif_thumbnail($postimage);
		if($image === false) {
			$innerhtml .= "û�п��õ�����ͼ";
		} else {
			//������ͼ���ݴ���ʱ��ʹ��
			$innerhtml .= "<img src=\"thumbnail.php?image=".$postimage."\">";
		}		
		$innerhtml .= "</TD></TR></TABLE>";
		echo $innerhtml;
	}
	/***
	*���ݼ���ȡ�������ֵ 
	* */
	function GetImageInfoValue($ImageInfo, $val_array) {
		$InfoValue = "δ֪";
		//��������
		foreach ( $val_array as $name => $val ) {
			//��������ֵ��ָ����ֵ��ͬ���������ֵ������������
			if ($name == $ImageInfo) {
				$InfoValue = &$val;
				break;
			}
		}
		//���ؽ��
		return $InfoValue;
	}
	/**
	*��ȡͼƬ�ļ���Ϣ��ת��Ϊ����
	* */
	function GetImageInfo($img){
		//����ͼƬ�ļ���������		
		$imgtype = array ("", "GIF", "JPG", "PNG", "SWF", "PSD", "BMP", "TIFF(intel byte order)", "TIFF(motorola byte order)", "JPC", "JP2", "JPX", "JB2", "SWC", "IFF", "WBMP", "XBM" );
		//������λ����
		$Orientation = array ("", "top left side", "top right side", "bottom right side", "bottom left side", "left side top", "right side top", "right side bottom", "left side bottom" );
		//�������ȵ�λ����
		$ResolutionUnit = array ("", "", "Ӣ��", "����" );
		//��ɫ�������������
		$YCbCrPositioning = array ("", "the center of pixel array", "the datum point" );
		//����ģʽ����
		$ExposureProgram = array ("δ����", "�ֶ�", "��׼����", "��Ȧ�Ⱦ�", "�����Ⱦ�", "�����Ⱦ�", "�˶�ģʽ", "Ф��ģʽ", "�羰ģʽ" );
		//����ģʽ����
		$MeteringMode_arr = array ("0" => "δ֪", "1" => "ƽ��", "2" => "�����ص�ƽ�����", "3" => "���", "4" => "����", "5" => "����", "6" => "�ֲ�", "255" => "����" );
		//��Դ����
		$Lightsource_arr = array ("0" => "δ֪", "1" => "�չ�", "2" => "ӫ���", "3" => "��˿��", "10" => "�����", "17" => "��׼�ƹ�A", "18" => "��׼�ƹ�B", "19" => "��׼�ƹ�C", "20" => "D55", "21" => "D65", "22" => "D75", "255" => "����" );
		//�����Ƶ������
		$Flash_arr = array ("0" => "flash did not fire", "1" => "flash fired", "5" => "flash fired but strobe return light not detected", "7" => "flash fired and strobe return light detected" );
		//ʹ��exif_read_data()������ȡͼƬ������IFODO�ı������
		$exif = exif_read_data ( $img, "IFD0" );
		//������ֵΪfalseʱ�����÷�������ĵ��ļ���ϢΪû��ͼƬEXIF��Ϣ��
		if($exif === false) {
			$new_img_info = array ("�ļ���Ϣ" => "û��ͼƬEXIF��Ϣ" );
		} else {
			//�ɹ�����ֵ�����÷���������ļ���Ϣ��������
			$exif = exif_read_data ( $img, 0, true );
			$new_img_info = array (
				"�ļ���Ϣ" => "-----------------------------", 
				"�ļ���" => $exif ['FILE'] ['FileName'], 
				"�ļ�����" => $imgtype [$exif ['FILE'] ['FileType']], 
				"�ļ���ʽ" => $exif ['FILE'] ['MimeType'], 
				"�ļ���С" => $exif ['FILE'] ['FileSize'], 
				"ʱ���" => date ( "Y-m-d H:i:s", $exif ['FILE'] ['FileDateTime'] ), 
				"ͼ����Ϣ" => "-----------------------------", 
				"ͼƬ˵��" => $exif ['IFD0'] ['ImageDescription'], 
				"������" => $exif ['IFD0'] ['Make'], 
				"�ͺ�" => $exif ['IFD0'] ['Model'], 
				"����" => $Orientation [$exif ['IFD0'] ['Orientation']], 
				"ˮƽ�ֱ���" => $exif ['IFD0'] ['XResolution'] . $ResolutionUnit [$exif ['IFD0'] ['ResolutionUnit']], 
				"��ֱ�ֱ���" => $exif ['IFD0'] ['YResolution'] . $ResolutionUnit [$exif ['IFD0'] ['ResolutionUnit']], 
				"�������" => $exif ['IFD0'] ['Software'], 
				"�޸�ʱ��" => $exif ['IFD0'] ['DateTime'], 
				"����" => $exif ['IFD0'] ['Artist'], 
				"YCbCrλ�ÿ���" => $YCbCrPositioning [$exif ['IFD0'] ['YCbCrPositioning']], 
				"��Ȩ" => $exif ['IFD0'] ['Copyright'], 
				"��Ӱ��Ȩ" => $exif ['COMPUTED'] ['Copyright.Photographer'], 
				"�༭��Ȩ" => $exif ['COMPUTED'] ['Copyright.Editor'], 
				"������Ϣ" => "-----------------------------", 
				"Exif�汾" => $exif ['EXIF'] ['ExifVersion'], 
				"FlashPix�汾" => "Ver. " . number_format ( $exif ['EXIF'] ['FlashPixVersion'] / 100, 2 ), 
				"����ʱ��" => $exif ['EXIF'] ['DateTimeOriginal'], 
				"���ֻ�ʱ��" => $exif ['EXIF'] ['DateTimeDigitized'], 
				"����ֱ��ʸ�" => $exif ['COMPUTED'] ['Height'], 
				"����ֱ��ʿ�" => $exif ['COMPUTED'] ['Width'], 
				"��Ȧ" => $exif ['EXIF'] ['ApertureValue'], 
				"�����ٶ�" => $exif ['EXIF'] ['ShutterSpeedValue'], 
				"���Ź�Ȧ" => $exif ['COMPUTED'] ['ApertureFNumber'], 
				"����Ȧֵ" => "F" . $exif ['EXIF'] ['MaxApertureValue'], 
				"�ع�ʱ��" => $exif ['EXIF'] ['ExposureTime'], 
				"F-Number" => $exif ['EXIF'] ['FNumber'], 
				"���ģʽ" => $this->GetImageInfoValue ( $exif ['EXIF'] ['MeteringMode'], $MeteringMode_arr ), 
				"��Դ" => $this->GetImageInfoValue ( $exif ['EXIF'] ['LightSource'], $Lightsource_arr ), 
				"�����" => $this->GetImageInfoValue ( $exif ['EXIF'] ['Flash'], $Flash_arr ), 
				"�ع�ģʽ" => ($exif ['EXIF'] ['ExposureMode'] == 1 ? "�ֶ�" : "�Զ�"), 
				"��ƽ��" => ($exif ['EXIF'] ['WhiteBalance'] == 1 ? "�ֶ�" : "�Զ�"), 
				"�ع����" => $ExposureProgram [$exif ['EXIF'] ['ExposureProgram']], 
				"�عⲹ��" => $exif ['EXIF'] ['ExposureBiasValue'] . "EV", 
				"ISO�й��" => $exif ['EXIF'] ['ISOSpeedRatings'], 
				"��������" => (bin2hex ( $exif ['EXIF'] ['ComponentsConfiguration'] ) == "01020300" ? "YCbCr" : "RGB"),  
				"ͼ��ѹ����" => $exif ['EXIF'] ['CompressedBitsPerPixel'] . "Bits/Pixel", 
				"�Խ�����" => $exif ['COMPUTED'] ['FocusDistance'] . "m", 
				"����" => $exif ['EXIF'] ['FocalLength'] . "mm", 
				"�ȼ�35mm����" => $exif ['EXIF'] ['FocalLengthIn35mmFilm'] . "mm", 
				"�û�ע�ͱ���" => $exif ['COMPUTED'] ['UserCommentEncoding'], 
				"�û�ע��" => $exif ['COMPUTED'] ['UserComment'], 
				"ɫ�ʿռ�" => ($exif ['EXIF'] ['ColorSpace'] == 1 ? "sRGB" : "Uncalibrated"), 
				"Exifͼ����" => $exif ['EXIF'] ['ExifImageLength'], 
				"Exifͼ��߶�" => $exif ['EXIF'] ['ExifImageWidth'], 
				"�ļ���Դ" => (bin2hex ( $exif ['EXIF'] ['FileSource'] ) == 0x03 ? "digital still camera" : "unknown"), 
				"��������" => (bin2hex ( $exif ['EXIF'] ['SceneType'] ) == 0x01 ? "A directly photographed image" : "unknown"), 
				"����ͼ�ļ���ʽ" => $exif ['COMPUTED'] ['Thumbnail.FileType'], 
				"����ͼMime��ʽ" => $exif ['COMPUTED'] ['Thumbnail.MimeType']
			);
		}
		//�����ļ�EXIF��Ϣ����
		return $new_img_info;
	}
}
?> 