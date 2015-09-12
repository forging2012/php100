<?php
class cache{
	//���建���ļ������ƣ�Ĭ��Ϊ_index.htm
	var $_file;
	//���建���Զ����µ�ʱ�䣬Ĭ��Ϊ1
	var $cache_time;
	//ʹ�ù��캯������ʼ��������ñ���
	function cache($_file = '_index.htm', $cache_time = 1) {
		$this->_file = $_file;
		$this->cache_time = $cache_time;
	}
	//��ʼ���û����ļ������������
	function startCache() {
		//�������ļ����ڣ�������Чʱ�����������ļ�
		if ($this->cacheActive()) {
			include ($this->_file);
			exit();
		}
		ob_start();
	}

	//����������������������ݱ���ΪHTML�ļ��������������
	function endCache(){
		//ȡ����������е�����
		$content = ob_get_contents();
		//ʹ��buildFile()�������������ɵ�HTMLҳ��
		if($this->buildFile($content)) {
			return true;
		} else {
			return false;
		}
		//ʹ��ob_end_flush()�����������������
		ob_end_flush();
	}

	//��⻺���Ƿ���Ч
	function cacheActive() {
		$lastmodified = @filemtime($this->_file);
		if(file_exists($this->_file)) {
			if (time() - $lastmodified < $this->cache_time){
				return true;
			} else {
				@unlink($this->_file);
				return false;
			}
		} else {
			return false;
		}
	}

	//���ݲ����������ļ�
	function buildFile($content, $mode = 'w+') {
		$this->makedir($this->_file);
		//д�뻺���ļ�����ʱ����ʾ������Ϣ
		if (!$fp = @ fopen($this->_file, $mode)) {
			$this->alert($this->_file . " Ŀ¼�����ļ������޷�д��.");
			return false;
		} else {
			@fwrite($fp, $content);
			@fclose($fp);
			return true;
		}
	}
	//�����ļ�·������Ŀ¼
	function makedir() {
		$dir = @ explode("/", $this->_file);
		$num = @ count($dir) - 1;
		$tmp = './';
		for ($i = 0; $i < $num; $i++) {
			$tmp .= $dir[$i];
			if (!file_exists($tmp)) {
				@ mkdir($tmp);
				@ chmod($tmp, 0777);
			}
			$tmp .= '/';
		}
	}

	//������л�������
	function clear_cache() {
		if (!@unlink($this->_file)) {
			$this->alert('ɾ���������ݳ���!');
			return false;
		} else {
			return true;
		}
	}
	//��ʾ���������г��ֵĴ���
	function alert($message = NULL) {
		if ($message != NULL) {
			trigger_error($message);
		}
	}
}
?>

