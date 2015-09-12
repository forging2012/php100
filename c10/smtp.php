<?php
class smtp {
	//���幫������
	var $smtp_port; //SMTP�������˿ڣ�Ĭ��Ϊ25
	var $time_out = 30; //SOCKET��ʱʱ��,Ĭ��30��
	var $host_name = "localhost";
	var $log_file = ""; //��־��Ϣ
	var $smtp_host; //SMTP������ַ
	var $debug; //������Ϣ
	var $user; //SMTP�������û���
	var $pass; //SMTP����������
	var $sock = false;
	var $auth = true;
	//ʹ�ù��캯����ʼ����ز���
	function smtp($smtp_host = "", $smtp_port = 25, $user, $pass) {
		$this->debug = FALSE;
		$this->smtp_port = $smtp_port;
		$this->smtp_host = $smtp_host;
		$this->user = $user;
		$this->pass = $pass;
	}
	/**
	 * �����ʼ����������������²���
	 * $to:�ռ��������ַ
	 * $from:�����������ַ
	 * $subject:�ʼ�����
	 * $body:�ʼ�����
	 * $mailtype:�ʼ�����
	 * $cc:���͵�ַ
	 * $bcc:���͵�ַ
	 * $header:ͷ��Ϣ
	 * */
	function sendmail($to, $from, $subject = "", $body = "", $mailtype, $cc = "", $bcc = "", $mail_headers = ""){
		//��ȡ�ʼ������������ַ
		$mail_from = $this->get_address($this->strip_comment($from));
		//�����ʼ�����
		$body = ereg_replace("(^|(\r\n))(\.)", "\1.\3", $body);
		//�����ʼ�ͷ��Ϣ
		$header .= "MIME-Version:1.0\r\n";
		//����ʼ�����ΪHTMLʱ�����HTMLͷ��Ϣ
		if($mailtype == "HTML") {
			$header .= "Content-Type:text/html\r\n";
		}
		//����������ʼ�
		$header .= "To: " . $to . "\r\n";
		//���������ʼ�
		if ($cc != "") {
			$header .= "Cc: " . $cc . "\r\n";
		}
		$header .= "From: $from<" . $from . ">\r\n";
		$header .= "Subject: " . $subject . "\r\n";
		$header .= $mail_headers;
		$header .= "Date: " . date("r") . "\r\n";
		$header .= "X-Mailer:By Redhat (PHP/" . phpversion() . ")\r\n";
		list ($msec, $sec) = explode(" ", microtime());
		$header .= "Message-ID: <" . date("YmdHis", $sec) . "." . ($msec * 1000000) . "." . $mail_from . ">\r\n";
		//ȡ�ý����ߵ����ʼ���ַ
		$TO = explode(",", $this->strip_comment($to));
		if ($cc != "") {
			$TO = array_merge($TO, explode(",", $this->strip_comment($cc)));
		}
		if ($bcc != "") {
			$TO = array_merge($TO, explode(",", $this->strip_comment($bcc)));
		}
		$sent = TRUE;
		foreach ($TO as $rcpt_to) {
			$rcpt_to = $this->get_address($rcpt_to);
			if (!$this->smtp_sockopen($rcpt_to)) {
				$this->alert("��SMTP������ʧ��" . $rcpt_to . "<br>");
				$sent = FALSE;
				continue;
			}
			if ($this->smtp_send($this->host_name, $mail_from, $rcpt_to, $header, $body)) {
				$this->alert("�����ʼ���<" . $rcpt_to . ">�ɹ�<br>");
			} else {
				$this->alert("�����ʼ���<" . $rcpt_to . ">ʧ��<br>");
				$sent = FALSE;
			}
			fclose($this->sock);
			$this->alert("��Զ�������Ͽ�����!");
		}
		return $sent;
	}
	//SMTP���������
	function smtp_send($helo, $from, $to, $header, $body = "") {
		if (!$this->smtp_putcmd("HELO", $helo)) {
			return $this->smtp_error("����HELO����");
		}
		if ($this->auth) {
			if (!$this->smtp_putcmd("AUTH LOGIN", base64_encode($this->user))) {
				return $this->smtp_error("����HELO����");
			}
			if (!$this->smtp_putcmd("", base64_encode($this->pass))) {
				return $this->smtp_error("����HELO����");
			}
		}
		if (!$this->smtp_putcmd("MAIL", "FROM:<" . $from . ">")) {
			return $this->smtp_error("����MAIL FROM����");
		}
		if (!$this->smtp_putcmd("RCPT", "TO:<" . $to . ">")) {
			return $this->smtp_error("����RCPT TO����");
		}
		if (!$this->smtp_putcmd("DATA")) {
			return $this->smtp_error("����DATA����");
		}
		if (!$this->smtp_message($header, $body)) {
			return $this->smtp_error("������Ϣ");
		}
		if (!$this->smtp_eom()) {
			return $this->smtp_error("����<CR><LF>.<CR><LF> [EOM]");
		}

		if (!$this->smtp_putcmd("QUIT")) {
			return $this->smtp_error("����QUIT����");
		}
		return TRUE;

	}
	//ʹ��fsockopen()���������ӵ�SMTP����
	function smtp_sockopen() {
		$this->alert("����Զ��������" . $this->smtp_host . ":" . $this->smtp_port);
		$this->sock = @ fsockopen($this->smtp_host, $this->smtp_port, $errno, $errstr, $this->time_out);
		//�����������ʧ�ܣ����ش�����Ϣ
		if (!($this->sock && $this->smtp_ok())) {
			$this->alert("���󣺴��˳�����" . $this->smtp_host . "ʧ��");
			$this->alert("��������: " . $errstr . " (" . $errno . ")");
			return FALSE;
		}
		$this->alert("�����ӵ�SMTP������" . $this->smtp_host);
		return TRUE;
	}
	//�����ʼ���ͷ��Ϣ������
	function smtp_message($header, $body) {
		fputs($this->sock, $header . "\r\n" . $body);
		$this->alert("> " . str_replace("\r\n", "\n" . "> ", $header . "\n> " . $body . "\n> "));
		return TRUE;
	}
	//�����ʼ���������
	function smtp_eom(){
		fputs($this->sock, "\r\n.\r\n");
		$this->alert(". [EOM]<br>");
		return $this->smtp_ok();
	}
	//���SMTP�����Ƿ�ɹ�
	function smtp_ok(){
		$response = str_replace("\r\n", "", fgets($this->sock, 512));
		$this->alert($response . "\n");
		if (!ereg("^[23]", $response)) {
			fputs($this->sock, "QUIT\r\n");
			fgets($this->sock, 512);
			$this->alert("����: Զ���������� \"" . $response . "\"\n");
			return FALSE;
		}
		return TRUE;
	}
	//����SMTP���SMTP������
	function smtp_putcmd($cmd, $arg = "") {
		if ($arg != "") {
			if ($cmd == ""){
				$cmd = $arg;
			}else{
				$cmd = $cmd . " " . $arg;
			}
		}
		fputs($this->sock, $cmd . "\r\n");
		$this->alert("> " . $cmd . "\n");
		return $this->smtp_ok();
	}
	//��ʾ����SMTP����ʱ�Ĵ�����Ϣ
	function smtp_error($string) {
		$this->alert("" . $string . ".ʱ���ִ���<br>");
		return FALSE;
	}
	//��ʾ������Ϣ
	function alert($message) {
		echo $message."<br>";
		return TRUE;
	}
	//ע�������ַ
	function strip_comment($address) {
		$comment = "\([^()]*\)";
		while (ereg($comment, $address)) {
			$address = ereg_replace($comment, "", $address);
		}
		return $address;
	}
	//ȡ�õ����ʼ���ַ
	function get_address($address) {
		$address = ereg_replace("([ \t\r\n])+", "", $address);
		$address = ereg_replace("^.*<(.+)>.*$", "\1", $address);
		return $address;
	}
}
?>