<?php
/***********************13_6.php********************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
 <head>
  <title>jQuery��ʾ</title>
  <!--����jQuery����-->
  <script language="javascript" type="text/javascript" src="js/jquery-1.2.6.js"></script>
  <!--����javascript����-->
    <script type="text/javascript">
        $(function(){
            //���ҳ��Ԫ��
            $('<input type=button><br><input type=text><br><div><div>').appendTo($('body'));
            //�������ݡ�����
            $('input:button')
            	.val("��ť")
            	//�󶨵����¼�
            	.bind("click",function(){
            		//��ʾ��ǰԪ�ص�value���Ե�ֵ
            		alert($('input:button').val());
            		//�Ƴ�divԪ�ص���
            		 $('div').removeClass("panel");
            	});
            $('input:text')
            	//���õ�ǰԪ��value���Ե�ֵΪ �ı���
            	.attr("value","�ı���")
            	//�󶨵����¼�
            	.bind("click",function(){
            		//��ʾ��ǰԪ��value���Ե�ֵ
            		alert($('input:text').attr("value"));
            	});
            $('div')
            	//���õ�ǰԪ�ص�����
            	.html("DIV�е�HTML����")
            	.bind("click",function(){
            		//��ʾ��ǰԪ�ص�����
            		alert($('div').html());
            		//���õ�ǰԪ�ص�����
            		$('div').text("ʹ��text()����HTML����");
            		//��ʾ��ǰԪ�ص�����
            		alert($('div').text());
            	})
            	.addClass("panel");
            //��ҳ��׷���ĸ�Ԫ��
            $('<p></p><p></p>').appendTo($('body'));
            //����׷�ӵ�Ԫ�أ���Ϊ��ЩԪ���������������
            $("p").each(function(i){
           		$("p")
           			.eq(i)
           			.html("p"+i)
           			.addClass("line");
            });
            //ʹ��$.each()����JSON����
            $.each({0:"��һ��", 1: "�ڶ���"},function(i, n){
            	$("p")
           			.eq(i)
           			.html(n)
            });
        });
    </script>
    <style type="text/css">
        .panel{
            padding: 20px;
            background-color: #000000;
            color: #FFFFFF;
            font-weight: bold;
            width: 200px;
            height: 20px;
        }
        .line{
            padding: 5px;
            background-color: #000000;
            color: #FFFFFF;
            font-weight: bold;
            width: 200px;
            height: 20px;
        }
    </style>
</head>
 <body>
 </body>
</html>