<?php
session_start();
//ʵ����user��
$user = new user();
//��ȡ��GET�����ύ�ı���action��ֵ
if(isset($_GET["action"])){

	switch(strval($_GET["action"])){
		case "register":
			$user->register();
		break;
		case "login":
			$user->login();
		break;
	}
}else{
	$user->auth();
}
//���ڴ����û�ע��͵�¼��user��
class user{
	function register(){
		include_once("../c04/adodb5/adodb.inc.php");
		$conn = &ADONewConnection('mysql');
		$conn->Connect("localhost","root","password","examples");
		$vercode = strval($_POST["vercode"]);
		$name = strval($_POST["username"]);
		$pass1 = strval($_POST["pass1"]);
		$pass2 = strval($_POST["pass2"]);
		$sex = strval($_POST["sex"]);
		$email = strval($_POST["email"]);
		$error = "";
		if($vercode != $_SESSION["string"]){
			$error .= "��֤��������������룡<br>";
		}
		if(!ereg("([a-zA-Z0-9_]{4,14})", $name)){
			$error .= "�û���ֻ�����Сд��Ӣ���ַ������ֺ��»��ߣ��ַ���Ҫ����4��С��14���ַ�<br>";
		}
		$us = $conn->Execute("select id from user where username = '".$name."'");
		if($us->RecordCount() == 1){
			$error .= "�û����Ѿ����ڣ���ѡ�������û�����<br>";
		}
		if(!ereg("([a-zA-Z0-9_]{4,14})", $pass1)){
			$error .= "����ֻ�����Сд��Ӣ���ַ������ֺ��»��ߣ��ַ���Ҫ����4��С��14���ַ���<br>";
		}
		if($pass1 != $pass2){
			$error .= "������������벻��ͬ��<br>";
		}
		if(!ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+",$email)){
			$error .= "�����Email��ַ�ǷǷ��ģ�<br>";
		}
		if($error == ""){
			$sql = "select id from user";
			$row = $conn->Execute($sql);
			if($row->RecordCount()== 0){
				$role = 1;
			}else{
				$role = 0;
			}
			$sql = "INSERT INTO `user` (`username`,`password`,`sex`,`email`,`role`) VALUES ('".$name."','".md5($pass1)."','".$sex."','".$email."','".$role."');";
			$result = $conn->Execute($sql);
			//�ر�����
			$conn->close();
			if($result == FALSE){
				echo "�û����ݱ���ʧ��<br>������Ϣ��<pre>".$conn->ErrorMsg()."</pre>";
				exit();
			}else{
				echo "ע���û��ɹ�<br><br>" .
					 "<a href='11_2.php'>��¼</a>����ȴ�ҳ���Զ���ת�����Ժ�..." .
				 	 "<script>setTimeout('window.location.href=\"11_2.php\"',3000);</script>";
				exit();
			}
		}else{
			echo "�û��ύ��ע����Ϣ�д���<br>".$error."<br><br>" .
				 "�������������ԣ�<br><br>" .
				 "<a href='javascript:history.go(-1);'>������һ��</a>����ȴ�ҳ���Զ���ת�����Ժ�..." .
				 "<script>setTimeout('history.go(-1)',3000);</script>";
			exit();
		}
	}
	function login(){
		$name = strval($_POST["username"]);
		$pass = strval($_POST["password"]);
		$code = strval($_POST["vercode"]);
		if($code != $_SESSION["string"]){
			echo "��������ȷ����֤��<br><br>" .
				 "<a href='javascript:history.go(-1);'>������һ��</a>����ȴ�ҳ���Զ���ת�����Ժ�..." .
				 "<script>setTimeout('history.go(-1)',3000);</script>";
			exit();
		}
		include_once("../c04/adodb5/adodb.inc.php");
		$conn = &ADONewConnection('mysql');
		$conn->Connect("localhost","root","password","examples");
		$sql = "select id,username,password,role from user where username = '".$name."' and password = '".md5($pass)."'";
		$row = $conn->Execute($sql);
		//�ر�����
		$conn->close();
		if($row->RecordCount()==1){
			$detail = $row->FetchRow();
			$_SESSION["auth"]["name"] = $detail[1];
			$_SESSION["auth"]["pass"] = $detail[2];
			$_SESSION["auth"]["role"] = $detail[3];
			echo "��¼�ɹ�<br><br>" .
				 "<a href='11_3.php'>�����û�����</a>����ȴ�ҳ���Զ���ת�����Ժ�..." .
			 	 "<script>setTimeout('window.location.href=\"11_3.php\"',3000);</script>";
			exit();
		}else{
			echo "�û������������<br><br>" .
				 "�������������ԣ�<br><br>" .
				 "<a href='javascript:history.go(-1);'>������һ��</a>����ȴ�ҳ���Զ���ת�����Ժ�..." .
				 "<script>setTimeout('history.go(-1)',3000);</script>";
			exit();
		}
	}
	//�û������֤
	function auth(){
		$name = strval($_SESSION["auth"]["name"]);
		$pass = strval($_SESSION["auth"]["pass"]);
		include_once("../c04/adodb5/adodb.inc.php");
		$conn = &ADONewConnection('mysql');
		$conn->Connect("localhost","root","password","examples");
		$sql = "select id,username,password,role from user where username = '".$name."' and password = '".$pass."'";
		$row = $conn->Execute($sql);
		//�ر�����
		$conn->close();
		if($row->RecordCount()!=1){
			echo "������û���¼��Ϣ<br><br>" .
				 "<a href='11_2.php'>��ת���û���¼����</a>����ȴ�ҳ���Զ���ת�����Ժ�..." .
				 "<script>setTimeout('window.location.href=\"11_2.php\"',3000);</script>";
			exit();
		}
	}
	//����û�Ȩ����Ϣ
	function checkPoint($roleID,$role){
		include_once("../c04/adodb5/adodb.inc.php");
		$conn = &ADONewConnection('mysql');
		$conn->Connect("localhost","root","password","examples");
		$sql = "select detail from role where id = '".$roleID."'";
		$row = $conn->Execute($sql);
		$conn->close();
		$rows = $row->FetchRow();
		$roles = explode(",",$rows[0]);
		if(in_array($role,$roles)){
			return true;
		}else{
			return false;
		}
	}
}
?>
