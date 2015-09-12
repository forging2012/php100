<?php

/***********************13_8.php********************************/
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
           //���6����ť
            $.each({0:"ʹ��GET������������", 1: "ʹ��POST�ύ������", 2: "ͬ����������", 3: "ʹ��$.get��ȡ����������", 4: "ʹ��$.post��ȡ����������", 5: "����Error"},function(i, n){
            	$("<input type=button>")
            		.appendTo($('body'))
            		.val(n);
            });
            //���һ��������ʾ��Ϣ��div
            $("<div class='message'>��Ϣ��ʾ</div>").appendTo($('body'));
            //�ҳ����а�ť
            $('input:button').eq(0)
                    .click(function(){
                    	//ʹ��$.ajax��get����������JS�ű�
                    	$.ajax({
                    		type:"GET",
                    		//urlָ����Ҫ���صĽű��ļ�
                    		url:"demo.js",
                    		//ע�����JS�ű�ʱ��dataType���Ե�ֵ
                    		dataType:"script"
                    	});
                    })
                .end().eq(1)
                    .click(function(){
                    	//ʹ��$.ajax��post����������������ύ����
                    	$.ajax({
                    		type: "POST",
                    		//url���Ե�ֵָ����������ļ�
                    		url: "ajaxServices.php",
                    		//data���Ե�ֵ������������ύ������
                    		data: "action=save&title=�ͻ�������&detail=���浽��������",
                    		//success���Ե�ֵ��һ���ص������������������ύ�ɹ��󣬴���������
                    		success: function(msg){
                    			$(".message").append("<li>"+msg+"</li>");
                    		}
                    	});
                    })
                .end().eq(2)
                    .click(function(){
                    	//ʹ��$.ajaxʵ�ֿͻ���ͬ��������������
                    	//�ؼ�����async��ֵ����Ϊfalse
						var html = $.ajax({ url: "ajaxServices.php?action=getHtml", async: false }).responseText;
						$(".message").append("<li>"+html+"</li>");
                    })
                .end().eq(3)
                	.click(function(){
                		//ʹ��$.get()��������ȡ�������˵�����
						$.get(
							"ajaxServices.php",
							{ action:"methodGet"},
							function(msg){
								$(".message").append("<li>"+msg+"</li>");
							}
						);
                    })
                .end().eq(4)
                	.click(function(){
                		//ʹ��$.post()��������ȡ�������˵�����
						$.post(
							"ajaxServices.php",
							{ action:"methodPost"},
							function(msg){
								$(".message").append("<li>"+msg+"</li>");
							}
						);
                    })
                 .end().eq(5)
                 	.click(function(){
                 		//��һ�������ڵ��ļ��������������Բ���������Ϣ
                 		var html = $.ajax({ url: "none.php", async: false }).responseText;
                 		//ʹ��ajaxError()�����������Ϣ
                 		$(".message").ajaxError(
                 			function(request, settings){
                 				$(this).append("<li>AJAX����</li>");
                 			}
                 		);
                 	}
                 )
            });
    </script>
    <style type="text/css">
        .message{
            padding: 20px;
            background-color: #000000;
            color: #FFFFFF;
            font-weight: bold;
            width: 200px;
        }
    </style>
</head>
 <body>
  </body>
</html>