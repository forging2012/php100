<!-------------------------------------------�ļ����� 4_2.php-------------------------------->
<?php
//����adodb�ļ�
include_once("adodb5/adodb.inc.php");
//��������MySQL���ݵı���
//���ݿ��������ַ
$host = "localhost";
//�û���
$user = "root";
//����
$pass = "password";
//Ҫ���������ݿ�
$db   = "mysql";
//�������Ӷ��󣬲������������ݿ������
$conn = &ADONewConnection('mysql');
// �������ݿ�
// ����:$conn->Connect('����','ʹ����','����','���ݿ�');
// ���������ӣ���ʹ��PConnect()����
// ����:$conn->PConnect('����','ʹ����','����','���ݿ�');
$conn->Connect($host,$user,$pass,$db);
// Ҫ��Ҫ��ʾ������Ϣ����false ��Ҫ��true Ҫ��
// ����:$conn->debug = false;
//����Ϊ��ʾ������Ϣ
$conn->debug = true;
//�����ַ���
$conn->Execute("SET NAMES gb2312");
//����SQL���
$sql = "select * from help_topic limit 0,15";
//ִ��SQL���
$result = $conn->Execute($sql);
//��鷵�صĽ������������FALSE,��ʾ������Ϣ
if($result == FALSE){
	echo "<pre>".$conn->ErrorMsg()."</pre>";
}else{
	//ʹ��FetchRow()����,�ѷ��ؽ����������ʽ����$row
	$table = "<table border='1'><tr><th>ID</th><th>����</th><th>����ID</th><th>����</th></tr>";
	while($row = $result->FetchRow()){
		//���Ʊ������
		$table .= "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[5]."</td></tr>";

	}
	$table .= "</table>";
	echo $table;
}
//�ر�����
$conn->close();
?>