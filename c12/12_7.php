<?php
/*************12_7.php****************************/
//����Smarty�����ļ�
require 'smarty/Smarty.class.php';
//��ʼ��ģ������
$smarty = new Smarty;
//�������濪��
$smarty->caching = true;
//���õ�ǰҳ�Ļ�����Чʱ��
$smarty->cache_lifetime = 3600;
//����һ���ص���������register_block()����ʹ��
function returnDynamic($title, $content, &$smarty) {
	return $content;
}
//ʹ��register_block()����������ģ����������ͻص������Ķ�Ӧ��ϵ
$smarty->register_block('dynamic', 'returnDynamic', false);
//ʹ��is_cached()���������ҳ���Ƿ񱻻���
if($smarty->is_cached('cache.tpl')) {
	//���cache.tpl��صĻ���
	$smarty->clear_cache('cache.tpl');
	$smarty->assign("title","Smarty������ʾ");
}
//��ʾҳ������
$smarty->display('cache.tpl');
?>
