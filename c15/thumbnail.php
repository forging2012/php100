<?php
if(isset($_GET["image"])){
	$width = "";
	$height = "";
	$type = "";
	//ʹ��exif_thumbnail()������ȡ����
	$image = exif_thumbnail($_GET["image"], $width, $height, $type);
	if($image===false) {
		echo "û������ͼ���ݣ�";
	}else{
		//������ͼ���ݴ���ʱ��������������ļ����ͣ�����������ͼ����
	    header("Content-type: ".image_type_to_mime_type($type));
	    print $image;
	    exit;
	}	
}else{
	echo "û������ͼ���ݣ�";
}
?>