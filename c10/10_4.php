<?php
/********************10_4.php*******************************/
class socketClient{
	function socketClient($ip,$port,$action){
		//�رմ�����Ϣ��ʾ
		ini_set("display_errors",0);
		//�رսű�ʧЧʱ��
		set_time_limit(0);
		$this->startClient($ip,$port,$action);
	}
	function startClient($ip,$port,$action){
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);//����һ��SOCKET
		if($socket){
			print "�����ͻ��˳ɹ���<br>";
		}else{
			print "�����ͻ���ʧ�ܣ�<br>";
		}
		//ʹ��socket_connect()���ӷ�����
		$link = socket_connect($socket,$ip,$port);
		if($link){
			print "���ӷ������ɹ���<br>";
		}else{
			print "���ӷ�����ʧ�ܣ�<br>";
		}
		//��ȡ�ӷ�����ȡ�ص�����
		$serverData = socket_read($socket,1024);
		print $serverData."<br>";
		socket_write($socket,$action,strlen($action));
		$msg =trim(socket_read($socket,1024));
		echo "���ͣ�$action ";
		echo "�յ���$msg<br>";
		socket_close($socket);
	}
}
if(isset($_GET["action"])){
	$action = strval($_GET["action"]);
}else{
	$action = "help";
}
$client = new socketClient("127.0.0.1",1000,$action);
?>
<form action=10_4.php method=gemt name=sendAction>
	<input type=text name=action value=""><input type=submit name=send value="����">
</form>