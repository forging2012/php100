<?php
/**
*<!-------------------------------------------�ļ����� 2_10.php-------------------------------->
*  */
session_start();
$school = "��ѧ";
session_register("school");
echo $_SESSION["school"]; //��� ��ѧ
echo "<br>";
////ʹ��$GLOBALS��ʾ��ǰ����ϵͳ�汾
echo $GLOBALS["_ENV"]["OS"];
//ʹ��$GLOBALS����SESSIONֵ
echo "<br>";
echo $GLOBALS["_SESSION"]["school"]; //�����ѧ
?>
