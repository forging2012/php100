<?php
/*********************17_2.php********************/
class spider {
	private $_url = "";
	private $_sites = "";
	function spider($url) {
		$this->_url = $url;
	}
	function start() {
		$content = file_get_contents($this->_url);
		$this->_sites["meta"] = $this->getMeta($content);
		$this->_sites["title"] = $this->getTitle($content);
		$this->_sites["detail"] = $this->getDetail($content);
		$this->_sites["links"] = $this->getLinks($content);
	}
	function getMeta($content){
		$file = "metaCache";
		file_put_contents($file,$content);
		$meta = get_meta_tags($file);
		return $meta;
	}
	function getDetail($contents) {
		preg_match('/<body>(.+)<\/body>/s', $contents, $matches);
		$body = $this->StripHTML($matches[1]);
		$body = strip_tags($body);
		return substr($body, 0, 400);
	}
	function getTitle($contents) {
		preg_match('/<title>(.+)<\/title>/s', $contents, $matches);
		return $matches[1];
	}
	function getLinks($content){
		$pat = '/<a(.*?)href="(.*?)"(.*?)>(.*?)<\/a>/i';
		preg_match_all($pat, $content, $m);
		return $m;
	}

	//ȥ��HTML�в���صĴ���
	function StripHTML($string) {
		$pattern = array (
			"'<script[^>]*?>.*?</script>'si",
			"'<style[^>]*?>.*?</style>'si"
		);
		$replace = array (
			"",
			""
		);
		return preg_replace($pattern, $replace, $string);
	}
	function show(){
		echo "<pre>";
		print_r($this->_sites);
		echo "</pre>";
	}
	function filterLinks(){
		$realLinks = "";
		//��ȡ��ҳ�е�����
		$links = $this->_sites["links"][2];
		//�������飬������滮����
		foreach($links as $v){
			if($v!="#"){
				$realLinks[] = $v;
			}
		}
		echo "<pre>";
		print_r($realLinks);
		echo "</pre>";
	}
}
//ʹ��WEB����ķ���
$spider = new spider("http://www.163.com/index.html");
$spider->start();
$spider->filterLinks();
?>
