<?php 
class bookViewModel extends Model 
{
	protected $viewModel = true;
	//������ģ������������ݱ�
	protected $masterModel = 'book';
	//����Ҫ��ȡ���ݱ���ֶ�
	protected $viewFields = array('book'=>array('id','name','sex','IP','email','http','detail'));
}
?>
