<!-------------------------------------------�ļ����� 3_1.php-------------------------------->
<?php
/*************************���ñ���************************************/
$teacher = array("����","28","��ʦ");
$student = array(
	array("С��",19,"�����"),
	array("С��",18,"�����"),
	array("С��",19,"�����"),
	array("СԷ",20,"�����"),
	array("С��",20,"�����"),
	array("С��",20,"�����"),
	array("С��",18,"�����")
);
//ʹ��list()��ȡ$teacher����
list($tname,$tage,$tjob) = $teacher;
echo "������".$tname."������".$tage."�ְ꣬ҵ��".$tjob;
//ʹ��each()��������ļ�/ֵ
$kv = each($student);
echo "<pre>";
print_r($kv);
echo "</pre>";
//ʹ��list()��each()���while��ȡ��ά���鲢ת��Ϊ���
$table = "<table border='1'><tr><th>����</th><th>����</th><th>רҵ</th></tr>";
while(list($key,$val)=each($student)){
	$table .= "<tr><td>".$val[0]."</td><td>".$val[1]."</td><td>".$val[2]."</td></tr>";
}
$table .= "</table>";
echo $table;
?>
