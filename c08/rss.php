<?php
class rss{
	//����Ĭ���ַ���
	var $_xml_char    = "utf-8";
	var $_xml_charset = "<?xml version=\"1.0\" encoding=\"{char}\" ?>";
	var $_rss_ver     = "2.0";
	//���ڴ洢RSS���ݵı���
	var $_rss     = "";
	var $_item    = "";
	var $_header  = "";
	//��ʼ���ַ�������
	function rss($title="",$link="",$description="",$char=""){
		$this->_xml_char = $char;
		$this->_header = "<title>".$title."</title>" .
				"<link>".$link."</link>" .
				"<descript>".$description."</descript>";
	}
	//����һ����¼
	function addItem($title,$link,$description,$pubDate){
		$this->_item .= "<item>" .
				"<title>".$title."</title>" .
				"<link>".$link."</link>" .
				"<description>".$description."</description>" .
				"<pubDate>".$pubDate."</pubDate>" .
				"</item>";
	}
	//ȡ��RSS����
	function getRss(){
		//ȡ���ַ��������ַ�
		$header = str_replace("{char}",$this->_xml_char,$this->_xml_charset);
		//ʹ���ַ���������㡢RSS�������������RSS����
		$this->_rss = $header."" .
				"<rss version = '2.0'>" .
				"<channel>" .
				"".$this->_header.
				$this->_item."" .
						"</channel>" .
						"</rss>";
		return $this->_rss;
	}
	//ȡ��RSS���ݵ��ļ�
	//���ļ�����ʽ��ȡ�����ɺ��RSS�ļ�����
	function getFile($name){
		$this->BuildFile($name,$this->_rss);
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
	//��ȡԶ��RSS������
	function agg($rssChannel,$show = 0){
		$file = fopen ($rssChannel, "r");
		if (!$file) {
		    echo "<p>��ȡԶ���ļ�ʧ��.\n";
		    exit;
		}
		$rss = "";
		while (!feof($file)) {
		    $rss .= fgets($file, 1024);
		}
		fclose($file);
		$deRss = new SimpleXMLElement($rss);
		if($show == 0){
			return $deRss;
		}else{
			print $this->rssTemplate($deRss);
		}
	}
	//������ʾRSS���ݵ�ģ�庯��
	function rssTemplate($rss){
		include("../c06/charset.php");
		$char = new Charset();
		$header = "<tr><td><strong><a href='".$char->utf82gb($rss->channel->link)."'>" .
				"".$char->utf82gb($rss->channel->title)."</strong></a><br>" .
				"".$char->utf82gb($rss->channel->descript)."</td></tr>" .
				"<tr><td height=1 bgcolor=#cfcfcf></td></tr>";
		$body = "";
		foreach($rss->channel->item as $k=>$v){
				$body .= "<tr><td>".$char->utf82gb($v->title)."  ".$char->utf82gb($v->pubDate)."<br><hr>".$char->utf82gb($v->description)."</td></tr>";
		}
		echo "<table border=1>".$header.$body."</table>";
	}
}
?>
