<?php
/***********************13_7.php********************************/
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
           //���10����ť
            $.each({0:"�Զ��嶯��", 1: "����", 2: "����", 3: "͸��", 4: "����", 5: "��ʾ", 6: "��С", 7: "����", 8: "����/��С", 9: "��ʾ/����"},function(i, n){
            	$("<input type=button>")
            		.appendTo($('body'))
            		.val(n);
            });
            $("<div class='animate'>����Ч����ʾ��</div>").appendTo($('body'));
            //�ҳ����а�ť
            $('input:button').eq(0)
                    .click(function(){
                    	$('.animate').animate({
				        width: "70%",
				        opacity: 0.4,
				        marginLeft: "10",
				        fontSize: "14",
				        borderWidth: "10px"
				      }, 1500 );
                    })
                .end().eq(1)
                    .click(function(){
                    	$('.animate').fadeOut("slow");
                    })
                .end().eq(2)
                    .click(function(){
						$('.animate').fadeIn("normal");
                    })
                .end().eq(3)
                	.click(function(){
						$('.animate').fadeTo("fast",0.5);
                    })
                .end().eq(4)
                	.click(function(){
						$('.animate').hide("slow");
                    })
                .end().eq(5)
                	.click(function(){
						$('.animate').show("fast",function(){alert('������ʾͼ��');});
                    })
                .end().eq(6)
                	.click(function(){
						$('.animate').slideUp("slow");
                    })
                .end().eq(7)
                	.click(function(){
						$('.animate').slideDown("slow");
                    })
                .end().eq(8)
                	.click(function(){
						$('.animate').slideToggle("slow");
                    })
                .end().eq(9)
                	.click(function(){
						$('.animate').toggle("slow");
                    })
            });
    </script>
    <style type="text/css">
        .animate{
            padding: 20px;
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