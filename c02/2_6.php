<?php
/**
*<!-------------------------------------------�ļ����� 2_6.php-------------------------------->
*  */
//����һ��COOKIE,��ֵΪ��
setcookie("c1");
//����һ��COOKIE,��ֵΪ this is cookie
setcookie("c2","this is cookie");
//����һ��COOKIE,����������ʱ��Ϊ1��Сʱ
setcookie("c3","һ��Сʱ��ʧЧ",time()+3600);
//����һ��COOKIE,ʹ����������ȫվ
setcookie("c4","cookie��path����",time()+3600,"/");
//����һ��COOKIE,ʹ��ֻ����htmlĿ¼��ʹ��
setcookie("c5","cookie��path����",time()+3600,"/html/");
//����һ��COOKIE,ʹ��ֻ������www.rzphp.com
setcookie("c6","cookie��domain����",time()+3600,"/","www.rzphp.com");
//����һ��COOKIE,ʹ�������www.rzphp.com�Ķ���������վ�϶���ʹ��
setcookie("c7","cookie��domain����",time()+3600,"/",".rzphp.com");
//����һ��COOKIE,ʹ��ֵֻ��ʹ��https��ʽ����
setcookie("c8","cookie��secure����",time()+3600,"/","",1);
//����һ��COOKIE,ʹ��ֻ������HTTP��ʽ
setcookie("c9","cookie��httponly����",time()+3600,"/","",0,1);
//����һ��COOKIE,���������ű����Է���.
setcookie("c10","cookie��httponly����",time()+3600,"/","",0,0);
//ʹ��setcookie()��������COOKIE
setcookie("cookie1","������setcookie()�������õ�COOKIE");
//ʹ�����鷽�����COOKIE
$_COOKIE["cookie3"] = "����ʹ�����鵥Ԫ��ʽ��ӵ�COOKIE";
//ʹ�ò�ͬ����ɾ��COOKIE
setcookie("cookie1",NULL);//ʹ��setcookie()����ɾ��COOKIE
$_COOKIE["cookie3"]=NULL;
unset($_COOKIE["c3"]);
//����$_COOKIE
foreach($_COOKIE as $key=>$value){
	echo "$key=>$value<br>";
}
?>
