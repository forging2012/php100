<?php
/******************************9_4.php****************************************/
//����һ���������ɱ�״ͼ�ĺ���
function showData($array){
	//����һ��ͼ�ξ��
	$image = imagecreate(400,400);
	//���ñ�����ɫ
	$bgColor = imagecolorallocate($image,255,255,255);
	//�����״ͼ�����ĵ�
	$x = 200;
	$y = 200;
	//������Բ���Ŀ�Ⱥ͸߶�
	$w = 380;
	$h = 380;
	//����һ��������,����ָ���洢��ʱ����
	$i = 0;
	//����һ������洢��ɫ������
	$color = array($while,$gray,$darkgray,$navy,$darknavy,$red,$darkred);
	//������Բ��,�������ɫ
	foreach($array as $point){
		//���ȡ����ɫ
		$rc = imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
		//����ָ�ֲ���,������Բ����ʹ����ɫ���
		imagefilledarc($image, $x, $y, $w, $h,$i,$point,$rc, IMG_ARC_PIE);
		$i = $point;
	}
	//���ͷ�ļ���Ϣ
	header('Content-type: image/png');
	//���PNGͼ��
	imagepng($image);
	//�ͷ���Դ
	imagedestroy($image);
}
//����һ�����ڴ洢�������ݵ�����
$array = array(0,20,160,220,360);
//���������е�����,������״ͼ
showData($array);
?>
