<?php
//�ж��Ƿ��������ύ
if(isset($_REQUEST["action"])){
	$action = strval($_REQUEST["action"]);
	//����$action�������������Ӧ������
	switch($action){
		case "save":
			$title  = $_POST['title'];
			$detail = $_POST['detail'];
			file_put_contents("fromClient.txt",$title."<br>".$detail);
			print "OK";
		break;
		case "getHtml":
			print(date("Y-m-d H:i:s"));
		break;
		case "methodGet":
			print("get");
		break;
		case "methodPost":
			print("post");
		break;
	}
}else{
	//���Լ���Ĵ�����Ϣ
	print("error");
}
?>
