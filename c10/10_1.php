<?php
/********************10_1.php*******************************/
//����һ��SOCKET����
$sock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
//ʹ��socket_bind()��IP��ַ�Ͷ˿�
socket_bind($sock,"127.0.0.1","6000");
//����SOCKET
socket_listen($sock,5);
//���տͻ��˷���������������
$newSock = socket_accept($sock);
//���տͻ��˷��͵���������
$data = socket_read($newSock,2048,PHP_NORMAL_READ);
//��ͻ��˷�������
$info = "from Server information!";
socket_write($newSock,$info,strlen($info));
//�ر�socket_accept()���صľ��
socket_close($newSock);
//�ر�socket_create()�����ľ��
socket_close($sock);
?>
