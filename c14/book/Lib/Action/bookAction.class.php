<?php 
class bookAction extends Action{
	//Ĭ�Ϸ���
	public function index() {
		//ʹ��D()����������bookViewģ��
		$book = D("bookView");
		//�����ݿⷢ���ַ��������
		$book->query('set charset latin1');
		//��ȡ���ݿ��еļ�¼
		$list	=	$book->findAll();
		//����ģ����
		$this->assign("title","���԰�");
		$this->assign("list",$list);
		//��ʾģ��
		$this->display();
	}
	//������Եķ���
	public function add() {
		$this->assign("title","���԰�");
		$this->display();
	}
	//������������
	public function save() {
		$book = new bookModel();
		$book->query('set charset latin1');
		$book->name = strval($_POST["name"]);
		$book->sex = strval($_POST["sex"]);
		$book->IP = $this->getip();
		$book->email = strval($_POST["email"]);
		$book->http = strval($_POST["http"]);
		$book->detail = strval($_POST["detail"]);
		$book->add();
		$this->assign("stats","���Ա���ɹ�");
		$this->display();

	}
	//��ȡIP��ַ�ķ���
	public static function getip() {   
        if ($_SERVER['HTTP_CLIENT_IP'] && $_SERVER['HTTP_CLIENT_IP']!='unknown') {   
            $ip = $_SERVER['HTTP_CLIENT_IP'];   
        } elseif ($_SERVER['HTTP_X_FORWARDED_FOR'] && $_SERVER['HTTP_X_FORWARDED_FOR']!='unknown') {   
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];   
        } else {   
            $ip = $_SERVER['REMOTE_ADDR'];   
        }   
        return $ip;   
    }  
}
?>
