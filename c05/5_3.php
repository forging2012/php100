<!---------------------------------------�ļ����� 5_3.php-------------------------------->
<?php
//����FTP����ʹ�õı���
//FTP��������ַ
$ftp_server = 'FTP��ַ';
//FTP��¼ʱ�û���������
$ftp_user = 'FTP�û���';
//FTP��¼�û���Ӧ������
$ftp_pass = 'FTP����';
//���$_GET["action"]�Ƿ�����
if(isset($_GET["action"])){
	$action = $_GET["action"];
}else{
	$action = "showForm";
}
//���ݱ���������ش������
switch($action){
	case "showFile":
		//��ʾѡ���ļ�����
		showFile();
	break;
	case "showForm":
		//��ʾ�ϴ�����
		showForm();
	break;
	case "upload":
		//����FTP������
		//ʹ��ftp_connect()������ȡ��FTP���Ӿ�������ʧ�ܣ���ʾ������Ϣ
		$ftp = ftp_connect($ftp_server) or die("����FTP������ʧ�ܣ�");
		//ʹ��ftp_login()��������¼FTP������
		$ftp_result = ftp_login($ftp, $ftp_user, $ftp_pass);
		//����¼״̬�����ftp_connect()��ftp_login()�������صĶ���FALSEֵ����ʾ����ʧ����Ϣ
		if((!$ftp)||(!$ftp_result)){
			echo '����FTP������ʧ��!����FTP��ز���!<br>';
			exit();
		}else {
			echo 'FTP��¼�ɹ���<br>';
		}
		foreach($_POST["ftp"] as $key=>$file){
			//�����ϴ��ļ��������Ϊ�գ������˴�ѭ��
			if($file == ""){
				continue;
			}else{
				//�����ϴ��ļ���Ŀ���ļ�s
				$source_file      = $file;
				$destination_file = $file;
			}
			//����Զ�̴洢�ļ���Ŀ¼���ļ���
			//ʹ��ftp_put()�������ϴ�Դ�ļ���Ŀ���ļ���
			$upload = ftp_put($ftp, $destination_file, $source_file, FTP_BINARY) or die("����FTP������ʧ�ܣ�");
			//����ϴ�״̬
			if ($upload==false) {
				echo '�ļ��ϴ�ʧ��!<br>';
			}else{
				echo 'Դ�ļ��ϴ��ɹ���<br>';
			}
		}
		//�ر�FTP����
		ftp_close($ftp);
	break;
}
function showForm(){
?>
<form action="?action=upload" method="post" name="sendfile">
<div id="filehtml">
  ѡ���ϴ��ļ�1: <input name="ftp[1]" type="text" id="ftp[1]" /> <input type="button" name="Submit1" value="���" onclick="window.open('5_3.php?action=showFile&source=1');" /><br>
   ѡ���ϴ��ļ�2: <input name="ftp[2]" type="text" id="ftp[2]" /> <input type="button" name="Submit2" value="���" onclick="window.open('5_3.php?action=showFile&source=2');" /><br>
   ѡ���ϴ��ļ�3: <input name="ftp[3]" type="text" id="ftp[3]" /> <input type="button" name="Submit3" value="���" onclick="window.open('5_3.php?action=showFile&source=3');" /><br>
</div>

  <input type="button" name="addfile" value="�����ļ��ϴ���" onclick="addFileHtml();"/>

<br>

  <input type="submit" name="Submit" value="FTP�ϴ�"/>


</form>
<script language="JavaScript" type="text/javascript">
function addFileHtml(){
	var form = document.getElementById('sendfile');
	var count = 1;
	for(var i=0; i<form.elements.length; i++){
		var name = form.elements[i].name;
		if(name.indexOf("ftp") > -1) count++;
	}
	document.getElementById("filehtml").innerHTML += 'ѡ���ϴ��ļ�'+count+': <input name="ftp['+count+']" type="text" id="ftp['+count+']" /> <input type="button" name="Submit'+count+'" value="���" onclick="window.open(\'5_3.php?action=showFile&source='+count+'\');" /><br>';
}
</script>
<?php
}
function showFile(){
	$source = intval($_GET["source"]);
	$sd=realpath("html");
	if(trim($sd)!=''){
		$d=dir($sd);
		while(false!==($entry=$d->read())){
			$p=$sd.'\\'.$entry;
			if(is_dir($p)){
			}else{
				echo "<tr><td><input type='button' onclick='selectFile(\"".$entry."\");' value='".$entry."'></td></tr>";
			}
		}
	  	$d->close();
	}
	echo '<script language="javascript">
function selectFile(fn){
	opener.document.getElementById("ftp['.$source.']").value="html/"+fn;
	window.close();
}
</script>';
}
?>