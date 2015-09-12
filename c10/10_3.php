<?php
/********************10_3.php*******************************/
class socketServer{
	//ʹ�ù��캯������ʼ���������
	function socketServer($ip,$port){
		//�رմ�����Ϣ��ʾ
		ini_set("display_errors",0);
		//�رսű�ʧЧʱ��
		set_time_limit(0);
		//��������
		ob_implicit_flush();
		//����startServer()����ʼSOCKET����
		$this->startServer($ip,$port);
	}
	function startServer($ip,$port){
		$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
		if($socket === true){
			print "�����������ɹ���<br>";
		}else{
			print "����������ʧ��<br>";
		}
		$bind = socket_bind($socket,$ip,$port);
		if($bind === true){
			print "��IP��ַ�Ͷ˿ڳɹ�!<br>";
		}else{
			print "�󶨰�IP��ַ�Ͷ˿�ʧ��<br>";
		}
		$listen = socket_listen($socket);
		if($listen === true){
			print "�����ɹ���<br>";
		}else{
			print "����ʧ��!<br>";
		}
		while(true){
			//Ӧ��ͻ�����������
			$client = socket_accept($socket);
			if($client===false){
				print "Ӧ��ͻ�����������ʧ��<br>";
				break;
			}
			//��ʾ��ӭ��
			$welcome = "��ӭ��¼���Է�����<br>";
			//����ַ���socket
			socket_write($client,$welcome,strlen($welcome));
			//ѭ����ȡ�ͻ������ݣ������ݿͻ��ύ�����ݣ���������
			while(true){
				$client = socket_accept($socket);//����һ��SOCKET����
				if($client){
					echo   "��������...";
				}else{
					echo   "�ͻ�����ʧ�ܣ�\n";
					break;
				}
          		$welcome = "��ӭ��¼���Է�����!\n";
          		socket_write($client,$welcome,strlen($welcome));
          		while(true){
          			$cmd = strtolower(trim(socket_read($client,1024)));
          			if(!$cmd){
          				 break;
          			}
					switch($cmd){
						case "web":
                        	$out = $this->web();
                        break;
                        case "help":
                        	$out = $this->help();
                        break;
                        case "quit":
                        	$out = $this->quit();
                        break;
                        default:
                            $out = "��Ч����!<br>";
					}
					socket_write($client,$out,strlen($out));
					if($cmd == "quit"){
                  		break;
					}
				}
          		socket_close($client);
			if($cmd == "quit")
                  break;
			}
		}
		socket_close($socket);
	}
	function web(){
		$html = "������Ϣ��������";
		return $html;
	}
	function help(){
		return "������Ϣ!";
	}
	function quit(){
		return "�˳�ϵͳ��";
	}
}
$socket = new socketServer("127.0.0.1",1000);
?>
