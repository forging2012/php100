<?php
/********Charset.php***********/
class Charset{
	//gb2312ת��Ϊutf-8
	function gb2utf8($chars){
		//ʹ��iconv()��������gb2312�ַ���ת��Ϊutf-8���ַ�
		return iconv("gb2312","utf-8",$chars);
	}
	//gb2312ת��Ϊunicode
	function gb2unicode($chars){
		$string = "";
		preg_match_all("/[\x80-\xff]?./",$chars,$array);
		//�����ַ���
		foreach($array[0] as $v){
			/**
			 * ʹ��iconv()��������GB2312�ַ���ת��ΪUTF��8����
			 * ��ʹ��utf8_unicode()����������UTF-8�ַ��ı���ֵ
			 * Ϊ���صı���ֵ�����&#��;���ţ��γ�unicodeֵ
			 * */
			$string .= "&#".$this->utf8_unicode(iconv("GB2312","UTF-8",$v)).";";
		}
		//��������UNICODEֵ
		return $string;
	}
	//�ѵ���utf-8�ַ�ת��Ϊunicode����ֵ
	function utf8_unicode($c) {
	//�����ַ��Ĵ�С�������ַ���
	switch(strlen($c)) {
		case 1:
	    	return ord($c);
	    case 2:
	    	$n = (ord($c[0]) & 0x3f) << 6;
			$n += ord($c[1]) & 0x3f;
			return $n;
	    case 3:
			$n = (ord($c[0]) & 0x1f) << 12;
			$n += (ord($c[1]) & 0x3f) << 6;
			$n += ord($c[2]) & 0x3f;
			return $n;
	    case 4:
			$n = (ord($c[0]) & 0x0f) << 18;
			$n += (ord($c[1]) & 0x3f) << 12;
			$n += (ord($c[2]) & 0x3f) << 6;
			$n += ord($c[3]) & 0x3f;
			return $n;
		}
	}
	//utf-8תΪ��gb2312����
	function utf82gb($chars){
		//ʹ��iconv()��������utf-8���룬ת��Ϊgb2312����
		return iconv("utf-8","gb2312",$chars);
	}
	//utf-8���룬ת��Ϊunicode����
	function utf82unicode($chars){
		//ʹ��utf82gb()�����������ַ���GBֵ
		$utf8 = $this->utf82gb($chars);
		//��ʹ��gb2unicode()�����������ַ���unicodeֵ
		return $this->gb2unicode($utf8);
	}
	//unicode����ת��Ϊutf-8����
	function unicode2utf8($chars){
		$string = "";
		//��unicode������ַ������зָ�
		$chars = explode(";",$chars);
		//�����ָ����ַ���
		foreach($chars as $char){
			//ȡ��unicode�����е�����ֵ
			$unicode = substr($char,2);
			//ʹ��unicode_utf8()�������������ֵ��Ӧ��utf-8�ַ�
			$string .= $this->unicode_utf8($unicode);
		}
		//��������utf-8�ַ���
		return $string;
	}
	//unicodeתΪ��gb2312����
	function unicode2gb($chars){
		//ʹ��unicode2utf8������������utf-8��Ӧ���ַ�
		$string = $this->unicode2utf8($chars);
		//��ʹ��utf82gb()����������GB2312������ַ���
		return $this->utf82gb($string);
	}
	//�ѵ���unicode����ֵ��ת��Ϊutf-8�ַ�
	function unicode_utf8($c){
		$str="";
		//����unicode����ֵ�����㲢�����ַ�
		if($c < 0x80){
			$str.=$c;
		}elseif($c < 0x800){
			$str.=chr(0xC0 | $c>>6);
			$str.=chr(0x80 | $c & 0x3F);
		}elseif($c < 0x10000){
			$str.=chr(0xE0 | $c>>12);
			$str.=chr(0x80 | $c>>6 & 0x3F);
			$str.=chr(0x80 | $c & 0x3F);
		}elseif($c < 0x200000){
			$str.=chr(0xF0 | $c>>18);
			$str.=chr(0x80 | $c>>12 & 0x3F);
			$str.=chr(0x80 | $c>>6 & 0x3F);
			$str.=chr(0x80 | $c & 0x3F);
		}
		return $str;
	}
}
?>