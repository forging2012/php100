<?php
//<!-------------------------------------------�ļ����� 3_8.php-------------------------------->
//��ʼ��SESSION����
session_start();
//����һ��SESSION
$svalue = "SESSION����";
session_register("svalue");
$sid = session_id();
//ʹ��GET��������SESSION��ID
echo "<a href='get_session_id.php?sid=".$sid."'>ת����һҳ</a>";
//ģ��COOKIE����SESSION��ID����
$fp = fopen("sid.txt","w");
fwrite($fp,$sid);
fclose($fp);
?>
<?php
//<!-------------------------------------------�ļ����� get_session_id.php-------------------------------->
//ʹ��GET����ȡ��SID��
$sid = $_GET["sid"];
//��ȡ�ļ��е�SID
$fp = fopen("sid.txt","r");
$sid = fread($fp,8192);
fclose($fp);
//����SID��ʼ��SESSION����
session_start($sid);
echo $_SESSION["svalue"];
?>
