<?php
return array (
  'dispatch_on' => true,
  'dispatch_name' => 'Think',
  'url_model' => 1,
  'path_model' => 2,
  'path_depr' => '/',
  'router_on' => true,
  'component_depr' => '@',
  'web_log_record' => false,
  'log_file_size' => 2097152,
  'think_plugin_on' => false,
  'limit_resflesh_on' => false,
  'limit_reflesh_times' => 3,
  'debug_mode' => false,
  'error_message' => '您浏览的页面暂时发生了错误！请稍后再试～',
  'error_page' => '',
  'var_pathinfo' => 's',
  'var_module' => 'm',
  'var_action' => 'a',
  'var_router' => 'r',
  'var_file' => 'f',
  'var_page' => 'p',
  'var_language' => 'l',
  'var_template' => 't',
  'var_ajax_submit' => 'ajax',
  'default_module' => 'book',
  'default_action' => 'index',
  'tmpl_cache_on' => true,
  'tmpl_cache_time' => -1,
  'tmpl_switch_on' => true,
  'default_template' => 'default',
  'template_suffix' => '.html',
  'cachfile_suffix' => '.php',
  'template_charset' => 'gb2312',
  'output_charset' => 'gb2312',
  'contr_class_prefix' => '',
  'contr_class_suffix' => 'Action',
  'action_prefix' => '',
  'action_suffix' => '',
  'model_class_prefix' => '',
  'model_class_suffix' => 'Model',
  'html_file_suffix' => '.shtml',
  'html_cache_on' => false,
  'html_cache_time' => 60,
  'html_read_type' => 1,
  'html_url_suffix' => '',
  'lang_switch_on' => false,
  'default_language' => 'zh-cn',
  'time_zone' => 'PRC',
  'user_auth_on' => false,
  'user_auth_type' => 1,
  'user_auth_key' => 'authId',
  'auth_pwd_encoder' => 'md5',
  'user_auth_provider' => 'DaoAuthentictionProvider',
  'user_auth_gateway' => '/Public/login',
  'not_auth_module' => 'Public',
  'require_auth_module' => '',
  'session_name' => 'ThinkID',
  'session_path' => '',
  'session_type' => 'File',
  'session_expire' => '300000',
  'session_table' => 'think_session',
  'session_callback' => '',
  'db_charset' => 'gb2312',
  'db_deploy_type' => 0,
  'sql_debug_log' => false,
  'db_fields_cache' => true,
  'data_cache_time' => -1,
  'data_cache_compress' => false,
  'data_cache_check' => false,
  'data_cache_type' => 'File',
  'data_cache_subdir' => false,
  'data_cache_table' => 'think_cache',
  'cache_serial_header' => '<?php
//',
  'cache_serial_footer' => '
?>',
  'share_mem_size' => 1048576,
  'action_cache_on' => false,
  'show_run_time' => false,
  'show_adv_time' => false,
  'show_db_times' => false,
  'show_cache_times' => false,
  'show_use_mem' => false,
  'show_page_trace' => false,
  'tmpl_engine_type' => 'Think',
  'tmpl_deny_func_list' => 'echo,exit',
  'tmpl_l_delim' => '{',
  'tmpl_r_delim' => '}',
  'taglib_begin' => '<',
  'taglib_end' => '>',
  'cookie_expire' => 3600,
  'cookie_domain' => '',
  'cookie_path' => '/',
  'cookie_prefix' => '',
  'page_numbers' => 5,
  'list_numbers' => 20,
  'ajax_return_type' => 'JSON',
  'data_result_type' => 0,
  'auto_load_path' => 'Think.Util.',
  'callback_load_path' => '',
  'upload_file_rule' => 'uniqid',
  'like_match_fields' => '',
  'action_jump_tmpl' => 'Public:success',
  'action_404_tmpl' => 'Public:404',
  'db_type' => 'mysql',
  'db_host' => 'localhost',
  'db_name' => 'examples',
  'db_user' => 'root',
  'db_pwd' => 'password',
  'db_port' => '3306',
  'db_prefix' => 'think_',
);
?>