<?php
/***********************13_5.php********************************/
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
            //����ĸ���
            $('<div>��һ��</div><div>�ڶ���</div><div>������</div><div>�رմ���ʽ�Ĳ�</div>').appendTo($('body'));
            //�ҳ����в�
            $('div').eq(0)//�ҵ���һ����
                    .click(function(){//��click�¼�
                    	//Ϊ��һ��ͼ�������ʽ
                    	$('div:eq(0)').addClass("panel");
                    	//����һ��ͼ��������޸�Ϊ
                    	$('div:eq(0)').html("�����¼���ĵ�һ��");
                    })
                .end().eq(1)//�ҵ��ڶ�����
                    .click(function(){
                        //���ڶ���ͼ��������޸�Ϊ
                    	$('div:eq(1)').html("�����¼���ĵڶ���");
                    })
                .end().eq(2)//�ҵ���������
                    .click(function(){//��click�¼�
                    	//Ϊ��һ��ͼ�������ʽ
                    	$('div:eq(2)').addClass("panel");
                    	//����һ��ͼ��������޸�Ϊ
                    	$('div:eq(2)').html("�����һ���click�¼�");
                    	$('div:eq(0)').unbind("click");
                    })
                .end().eq(3)//�ҵ����ĸ���
                    .toggle(function(){
                    	$('div:eq(3)').html("��ʾ����ʽ�Ĳ�");
                        $('.panel').hide('slow');
                    },function(){
                    	$('div:eq(3)').html("�رմ���ʽ�Ĳ�");
                        $('.panel').show('slow');
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
    </style>

</head>
 <body>
 </body>
</html>