<?php
return array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST' => array('Home','App','Back'),
	'DEFAULT_MODULE' => 'Home',//默认模块
	'URL_MODEL'      => '1',//URL模式

	// 添加数据库配置信息
	'DB_TYPE'=>'mysql',// 数据库类型
	'DB_HOST'=>'localhost',// 服务器地址
	'DB_NAME'=>'xpc',// 数据库名
	'DB_USER'=>'root',// 用户名
	'DB_PWD'=>'root',// 密码
	'DB_PORT'=>3306,// 端口
	'DB_PREFIX'=>'xpc_',// 数据库表前缀
	'DB_CHARSET'=>'utf8',// 数据库字符集

	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES'=>array(
	//静态地址路由
	'/^index$/'=>'Index/index',
	'/^scenes$/'=>'Index/scenes',
	'/^wcase$/'=>'Index/wcase',
	'/^service$/'=>'Index/service',
	'/^contact$/'=>'Index/contact',
	'/info/:id'=>'index/info'
		),
	);
// 正则表达式 /^blog\/(\d+)$/ 
// 规则表达式 blog/:id 
