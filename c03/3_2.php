<!-------------------------------------------�ļ����� 3_2.php-------------------------------->
<?php
/*************************���ñ���************************************/
$student = array(
	array("С��",19,"�����"),
	array("С��",18,"�����"),
	array("С��",19,"�����"),
	array("СԷ",20,"�����"),
	array("С��",20,"�����"),
	array("С��",20,"�����"),
	array("С��",18,"�����")
);
echo "ʹ��for������ά���鲢ת��Ϊ���";
$table = "<table border='1'><tr><th>����</th><th>����</th><th>רҵ</th></tr>";
for($i=0;$i<=count($student);$i++){
	$table .= "<tr><td>".$student[$i][0]."</td><td>".$student[$i][1]."</td><td>".$student[$i][2]."</td></tr>";
}
$table .= "</table>";
echo $table;
echo "ʹ��foreach������ά���鲢ת��Ϊ���";
$table = "<table border='1'><tr><th>����</th><th>����</th><th>רҵ</th></tr>";
foreach($student as $key=>$val){
	$table .= "<tr><td>".$val[0]."</td><td>".$val[1]."</td><td>".$val[2]."</td></tr>";
}
$table .= "</table>";
echo $table;
?>
