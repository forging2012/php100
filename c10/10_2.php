<?php
/********************10_2.php*******************************/
//����һ��SOCKET����
$sock = @socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
if($sock != true){
	echo "����SOCKETʱ���������´���".socket_strerror(socket_last_error($sock)). "<br>";
}
//ʹ��socket_bind()��IP��ַ�Ͷ˿�
if(@socket_bind($sock,"127.0.0.1","6000")===false){
	echo "��SOCKETʱ���������´���".socket_strerror(socket_last_error($sock)). "<br>";
}
if (($newsock = @socket_accept($sock)) === false) {
	echo "��ȡ�ͻ���Ϣʧ�ܣ��������: " .socket_last_error($sock). "<br>";
}
//����SOCKET
if (@socket_listen($sock, 5) === false) {
    echo "����ʧ�ܣ�����ԭ��".socket_strerror(socket_last_error($sock))."<br>";
}
//�ر�socket_accept()���صľ��
@socket_close($newSock);
//�ر�socket_create()�����ľ��
@socket_close($sock);
?>
