<!-------------------------------------------�ļ����� 4_1.php-------------------------------->
<?php
//�������ݿ⣬���������Ӿ����������ʧ��ʱ����ʾ������Ϣ
$link = mysql_connect("localhost","root","password") or die("���ݿ�����ʧ��");
//ѡ���������ݿ⣬ʧ��ʱ����ʾ������Ϣ
mysql_select_db("mysql",$link) or die("ѡ�����ݿ�ʧ�ܣ�");
//ʹ��mysql_query()����sql��䣬�����ؽ����
$result = mysql_query("select * from help_topic limit 0,15");
//ʹ��mysql_num_rows()������ȡ�ý�����еļ�¼��
$lines= mysql_num_rows($result);
echo "���м�¼".$lines."��";
$table = "<table border='1'><tr><th>ID</th><th>����</th><th>����ID</th><th>����</th></tr>";
//ʹ��whileѭ�������mysql_fetch_array()���������������
while($row = mysql_fetch_array($result)){
	//ʹ��mysql_fetch_array()�������ص������е�����
	$table .= "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[5]."</td></tr>";
}
$table .= "</table>";
echo $table;
//�ͷ�����
mysql_free_result($result);
//�ر����ݿ�����
mysql_close($link);
?>