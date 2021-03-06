<?php
/**
 * 安装向导
 */
header('Content-type:text/html;charset=utf-8');
// 检测是否安装过
if (file_exists('./install.lock')) {
	echo '你已经安装过该系统，重新安装需要先删除./Public/install/install.lock 文件';
	die;
}
// 同意协议页面
if (!isset($_GET['c']) || $_GET['c'] == 'agreement') {
	require './agreement.html';
}
// 检测环境页面
if ($_GET['c'] == 'test') {
	require './test.html';
}
// 创建数据库页面
if ($_GET['c'] == 'create') {
	require './create.html';
}
// 安装成功页面
if ($_GET['c'] == 'success') {
	// 判断是否为post
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$data = $_POST;
		// 连接数据库
		$link = @mysql_connect("{$data['DB_HOST']}:{$data['DB_PORT']}", $data['DB_USER'], $data['DB_PWD']);
		$link or die("<script>alert('链接失败');history.go(-1)</script>");
		// 设置字符集
		mysql_query("SET NAMES 'utf8'");
		// mysql_get_server_info($link)>5.0 or die("<script>alert('请将您的mysql升级到5.0以上');history.go(-1)</script>");
		// 创建数据库并选中
		if (!mysql_select_db($data['DB_NAME'], $link)) {
			$create_sql = 'CREATE DATABASE IF NOT EXISTS ' . $data['DB_NAME'] . ' DEFAULT CHARACTER SET utf8;';
			mysql_query($create_sql, $link) or die('创建数据库失败');
			mysql_select_db($data['DB_NAME'], $link);
		}
		// 导入sql数据并创建表
		$thinkbjy_str = file_get_contents('./thinkbjy.sql');
		$sql_array = preg_split("/;[\r\n]+/", str_replace('bjy_', $data['DB_PREFIX'], $thinkbjy_str));
		foreach ($sql_array as $k => $v) {
			mysql_query($v, $link);
		}
		$db_str = <<<php
<?php
return array(

//*************************************数据库设置*************************************
    'DB_TYPE'               =>  'mysqli',     // 数据库类型
    'DB_HOST'               =>  '{$data['DB_HOST']}',  // 服务器地址
    'DB_NAME'               =>  '{$data['DB_NAME']}',   // 数据库名
    'DB_USER'               =>  '{$data['DB_USER']}',       // 用户名
    'DB_PWD'                =>  '{$data['DB_PWD']}',           // 密码
    'DB_PORT'               =>  '{$data['DB_PORT']}',       // 端口
    'DB_PREFIX'             =>  '{$data['DB_PREFIX']}',       // 数据库表前缀
);
php;
		// 创建数据库链接配置文件
		file_put_contents('../../Application/Common/Conf/db.php', $db_str);
		@touch('./install.lock');
		require './success.html';
	}

}
