<?php
/*******************14_1.php*************************/
class UserController extends Zend_Controller_Action{
    function userAction()  {
        $this->view->title = "��������";
    }
	function addAction() {
	    $this->view->title = "��Ӽ�¼";
		if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
	        Zend_Loader::loadClass('Zend_Filter_StripTags');
	        //ʹ�ù�����
	        $filter = new Zend_Filter_StripTags();
	        //���˱��ύ������
	        $artist = $filter->filter($this->_request->getPost('artist'));
	        $artist = trim($artist);
	        $title = trim($filter->filter($this->_request->getPost('title')));
			//�ж��ύ�����Ƿ�Ϊ��
	        if ($artist != '' && $title != '') {
		        $data = array(
		         'artist' => $artist,
		         'title'  => $title,
		    	);
	    		$item = new item();
	    		$item->insert($data);
	            $this->_redirect('/');
	            return;
	        }
	    }
	    $this->view->item = new stdClass();
	    $this->view->item->id = null;
	    $this->view->item->artist = '';
	    $this->view->item->title = '';
	    //�������ӱ�Ԫ��
	    $this->view->action = 'add';
	    $this->view->buttonText = '���';
	}
	//��ű༭����ĺ���
    function editAction()  {
        $this->view->title = "�༭";
    }
    //���ɾ������ĺ���
    function deleteAction() {
        $this->view->title = "ɾ��";
    }
}
?>
