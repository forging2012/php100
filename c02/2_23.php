<!-------------------------------------------�ļ����� 2_23.php-------------------------------->
<?php
//���ͻ����ύ�����ݣ�ȷ���Ƿ���Ҫ���������ദ������
if(isset($_POST["c"])){
	//���ݿͻ������ݣ�ȷ��Ҫ���õ���
	$c = $_POST["c"];
}else{
	//����û�û��ָ���࣬��Ĭ�ϵ���showtable��
	$c = "showtable";
}
//���ͻ����Ƿ�ָ���˷�������������
if(isset($_POST["a"])){
	//���ݿͻ������ݣ�����ָ���ķ���
	$a = $_POST["a"];
}else{
	//����û�û��ָ����������Ĭ�ϵ���main()����
	$a = "main";
}
//���ͻ����Ƿ��ύ����������
if(isset($_POST["d"])){
	//����ͻ����ύ�����ݣ���ʽ������
	$d = implode(",",$_POST["d"]);
}else{
	//����ͻ���û���ύ�������ݣ�����Ϊ��
	$d = "";
}
//������ļ��Ƿ����
if(file_exists($c.".php")){
	//�������ļ�
	include($c.".php");
	//������ļ����غ��Ƿ������
	if(class_exists($c)){
		//�������ʱ����ʼ����
		$e = new $c();
		//���ö���ķ���
		$e->$a($d);
	}
}
?>

  <form action="2_23.php" method="post">

  ������<input type="text" name="d[name]" value=""/><br/>
  ���䣺<input type="text" name="d[age]" value="" size="40" maxlength="40"/>
<br>
  <input type="hidden" name="c" value="showuser"/>
  <input type="submit" name="name" value="�ύ"/>
  </form>
