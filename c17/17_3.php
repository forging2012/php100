<?php
class catchBot{
	function catchBot($botFile){
		$isBot = $this->bots();
		if($isBot!= false){
			$url = $_SERVER ['HTTP_REFERER'];
			$time = date("Y-m-d H:i:s");
			$bots = "����".$isBot.",��".$time."�����˱�ҳ����תҳ���ǣ�".$url;
			$this->saveBot($botFile,$bots);			
		}
	}
	function bots(){
		$bots = array(
			"Googlebot"=>"googlebot",
			"MSNbot"=>"msnbot",
			"Yahoobot"=>"slurp",
			"Baiduspider"=>"baiduspider",
			"Sohubot"=>"sohu-search",
			"Lycos"=>"lycos",
			"Robozilla"=>"robozilla"
		);
		$useragent = strtolower ( $_SERVER ['HTTP_USER_AGENT'] );
		foreach($bots as $k=>$v){
			if(strpos($useragent,$v) === true){
				return $k;
			}
		}
		return false;
	}
	function saveBot($botFile,$bots){
		$bot = fopen($botFile,"a");
		fwrite($bot,$bots);
		fclose($bot);
	}
}
?>
<?php
//ʹ�ò���������
$catch = new catchBot("bots.txt");
?>