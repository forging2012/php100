<!-------------------------------------------�ļ����� 2_22.php-------------------------------->
<?php
function u_1() {
    echo "���Ǻ���u_1<br />";
}

function u_2($title) {
    echo "���Ǻ���u_2,�������".$title.".<br />\n";
}

class runf{
	function u_3(){
	    echo "�������������еĺ���u_3";
	}
}

$function = "u_1";
$function();
$function = "u_2";
$function("2");
$function = "u_3";
$nrunf = new runf();
$nrunf->$function();
?>
