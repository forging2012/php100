<?php 
session_start();
include 'global.php';
$g->auth();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>��ý���ļ�����ƽ̨</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK rel=stylesheet type=text/css	href="templates/css/style.css">
<script>
	//Javascript������
	function checkSubmit($o){
		var fail = "";
		var pass1 = $o.pass1.value;
		var pass2 = $o.pass2.value;
		var passrole = /^([a-zA-Z0-9]|[-_]){6,16}$/;
		if(pass1!=pass2){
			fail += '������������벻��ͬ\n\r';
		}
		if (!passrole.exec(pass1)){
			fail += '��������ȷ������\n\r';
		}
		if(fail == ""){
			return true;
		}else{
			alert(fail);
			return false;
		}
	}

</script>
</HEAD>
<BODY>
<DIV id=navwrap class=navwrap>
	<div class="nav">
	<div class="navinner"><br>
		��ý���ļ�����ƽ̨
			<div class="navsearch" style="left: 735px">
				<form action="search.php" method="post" target="_blank" name="search" id="search">
				<div class="input">
					<input type="hidden" name="type" value="file" /> 			
					<input class="input" name="keyword" type="text" onFocus="this.className='input2'"	value="����Դ" onClick="this.value='';"	onblur="this.value = this.value =='' ? '��Դ����' : this.value;this.className='input'" />
				</div>
				<input class="but"	type="submit" value=" " /></form>
			</div>
			<div class="other" style="left:200px">
			<?php $g->loginStats();?>
			</div>
			
	  </div>
	</div>
</DIV>
<DIV class=wrap>
	<DIV class=left>
		<DIV class=commend>
			<DIV class=group>
				<DIV class=title>�޸�����</DIV>
				<DIV class=user>
<?php
//�û�ע�����
if(isset($_POST["action"]) and $_POST["action"]=="editPassword"){
	$user["username"] = $_SESSION["i"]["username"];
	$user["password"] = md5(trim($_POST["pass1"]));
	$g->updateObject("#_user",$user,"username");
	unset($_SESSION["i"]);
	$g->alert('�û������޸ĳɹ��������µ�¼...','index.php');
}
?>
<!---------����ʼ--------->
                <form id="reg" name="reg" action="user.php" method="POST" onSubmit="return checkSubmit(this);">
                    <div class="info" id="form_el_list">
                        <ul>
                          <li></li>
                            <li>
                            <div class="sp">���룺</div>
                            <input class="input1" name="pass1" type="password" value="" id="password"  tabindex="14" />                            
                            </li>
                            <li>
                            <div class="sp">ȷ�ϣ�</div>
                            <input class="input1" name="pass2" id="pwd2" type="password" value="" tabindex="16" />                            
                            </li> 
						  <li></li>       
                          <li></li>
						  <li></li>

						</ul>
        			</div>
        <div class="center">
			<input class="but1" name="" type="submit" value="�޸�����" />
			<input type="hidden" name="action" value="editPassword">
		</div>
</form>


<!---------������--------->
				</DIV>
			</DIV>
			<DIV class=space>
				<DIV class=title>˵��</DIV>
					<UL class=cool><br>
						<div><strong>���룺</strong>������λ�����16λ��Ӣ�ġ����Ż������֡�</div><br>
						<div><strong>ȷ�ϣ�</strong>���ظ���������롣</div><br><br><br>
					</UL>
		  </DIV>
			</DIV>
		</DIV>

		<DIV class=right>
			<DIV class=play>
				<DIV class=title>��¼�û���Ϣ</DIV>
					<DIV class=playwrap>
						<UL id=scrollPlay>
						<?php $g->UserInfo();?>							
						</UL>
					</DIV>
				</DIV>
			</DIV>
		</DIV>

		<DIV class=clear></DIV>
	</DIV>
</DIV>
<DIV class=footer>��Ȩ����</DIV>

</BODY>
</HTML>