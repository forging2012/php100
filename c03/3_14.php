<!---------------------------------�ļ����� 3_14.php-------------------------------->
<html>
<head>
<title>��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb_2312">
<!-- Style -->
<style type=text/css >
<!--
table{
	background-color: #B0C4DE;
}
tr{
	background-color: White;
}
td{
  font-size: 20pt;
	font-family : ����;
	color: #708090;
    line-height: 140%;
}
-->
</style>
</head>
<body>
<?php
//����û��Ƿ��ύ����
if(isset($_POST["year"])){
	//ʹ���û��ύ��������Ϊ������
	$year = $_POST["year"];
}else{
	//ʹ�õ�ǰ���ڵ�����Ϊ������
	$year = date("Y");
}
if(isset($_POST["month"])){
	$month = $_POST["month"];
}else{
	$month = date("m");
}
//��ʼ��������
$date=01;
//��ʼ��������
$day=01;
$off=0;
//����������Ƿ���ȷ
if($year<0 or $year > 9999){
	//��������ݲ���ȷ����ʾ������Ϣ���ط�����һҳ��
	echo "<script> alert('���Ӧ��1��9999֮��.');history.go(-1); </script>";
	exit();
}
if($month<0 or $month > 12){
	//��������ݲ���ȷ����ʾ������Ϣ���ط�����һҳ��
	echo  "<script> alert('�·�Ӧ��1��12��֮��.');history.go(-1); </script> ";
	exit();
}
while(checkdate($month,$date,$year)){
	$date++;
}
//������������ͷ
?>
<form method=post action='' name=calendar>
	<table width=100% border=1 cellspacing=0 cellpadding=2 bordercolorlight=#333333 bordercolordark=#FFFFFF bgcolor=#CCCCFF>
	<tr align=center valign=middle>
		<td colspan=7 bgcolor=#efefef>
			<input type='text' name='year' size='4' maxlength='4' value=<?=$year?> >
			<input type='text' name='month' size='2' maxlength='2' value=<?=$month?> >
			<input type='submit' name='submit' align=absmiddle border=0 value='��ת'>
		</td>
	</tr>
	<tr align=center valign=middle>
		<td bgcolor=#efefef>��</td>
		<td>һ</td>
		<td>��</td>
		<td>��</td>
		<td>��</td>
		<td>��</td>
		<td bgcolor=#efefef>��</td>
		</tr>
	<tr>
	<?php
	//��������������
	while ($day<$date){
		//����������ɫ������ǵ�ǰ���ڣ�ʹ�ú�ɫ���б�ʶ
		if($day == date("d") && $year == date("Y") && $month == date("m")){
			$day_color = "red";
		}else{
			$day_color = "black";
		}
		//��������������
		if ($day ==  '01' and date( 'l', mktime(0,0,0,$month,$day,$year)) ==  'Sunday'){
			echo  "<td><font color=$day_color>$day</font></td>";
			$off =  '01';
		}elseif($day ==  '01' and date( 'l', mktime(0,0,0,$month,$day,$year)) == 'Monday'){
			//��������һ������
			echo  "<td>&nbsp</td><td><font color=$day_color>$day</font></td>";
			$off=  '02';
	  	}elseif($day ==  '01' and date( 'l', mktime(0,0,0,$month,$day,$year)) == 'Tuesday'){
	  		//�������ڶ�������
	  		echo  "<td>&nbsp</td><td>&nbsp</td><td><font color=$day_color>$day</font></td>";
	  		$off=  '03';
	  	}elseif($day ==  '01' and date( 'l', mktime(0,0,0,$month,$day,$year)) == 'Wednesday'){
	  		//����������������
			echo  "<td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td><font color=$day_color>$day</font></td>";
			$off=  '04';
		}elseif($day ==  '01' and date( 'l', mktime(0,0,0,$month,$day,$year)) == 'Thursday'){
			//���������ĵ�����
			echo  "<td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td><font color=$day_color>$day</font></td>";
			$off=  '05';
		}elseif($day ==  '01' and date( 'l', mktime(0,0,0,$month,$day,$year)) ==  'Friday') {
			//���������������
			echo  "<td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td><font color=$day_color>$day</font></td>";
			$off=  '06';
		}elseif($day ==  '01' and date( 'l', mktime(0,0,0,$month,$day,$year)) ==  'Saturday') {
			//����������������
			echo  "<td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td><font color=$day_color>$day</font></td>";
			$off=  '07';
		}else{
			//ֱ����ʾ����
			echo  "<td><font color=$day_color>$day</font></td> \n";
		}
		//����whileѭ������
		$day++;
		//���ÿ��ر���
		$off++;
		//��$off����7ʱ������һ�У�����$off������Ϊ1
		if ($off>7) {
			echo  "</tr><tr>";
			$off= '01';
		}else{
			echo  "";
		}
	}
	//����ʣ�����ݣ�ʹ�ÿձ�����
	for($i=$off ; $i<=7 ; $i++){
		echo "<td>&nbsp</td>";
	}
	?>
	</tr>
	</table>
</form>
</body>
</html>
