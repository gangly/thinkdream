<?php

namespace Common\Tag;
use Think\Template\TagLib;

class My extends TagLib {
	// 定义标签
	protected $tags = array(
		'jquery' => array('attr' => '', 'close' => 0),
		'bjycss' => array('attr' => '', 'close' => 0),
		'bootstrap' => array('attr' => 'icheck', 'close' => 0),
		'ueditor' => array('attr' => 'name,content', 'close' => 0),
		'recommend' => array('attr' => 'limit', 'level' => 1),
	);

	//引入jquery
	public function _jquery() {
		return '<script type="text/javascript" src="__PUBLIC__/static/js/jquery-2.0.0.min.js"></script>';
	}

	//引入bootstrap的css组件
	public function _bjycss() {
		return '<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/css/bjy.css">';
	}

	/**
	 *引入jquery、bootstrap、font-awesome、ickeck
	 *@param string $tag  name:表单name content：编辑器初始化后 默认内容
	 */
	//引入jquery、bootstrap css组件、bootstrap js组件
	public function _bootstrap($tag) {
		$icheck = isset($tag['icheck']) ? $tag['icheck'] : 'blue';
		$link = <<<php
<script type="text/javascript" src="__PUBLIC__/static/js/jquery-2.0.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/bootstrap-3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/bootstrap-3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/css/bjy.css">
<script type="text/javascript" src="__PUBLIC__/static/bootstrap-3.3.4/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="__PUBLIC__/static/js/html5shiv.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="__PUBLIC__/static/iCheck-1.0.2/icheck.min.js"></script>
<link rel="stylesheet" href="__PUBLIC__/static/iCheck-1.0.2/skins/all.css">
<script>
$(document).ready(function(){
  $('.icheck').iCheck({
    checkboxClass: "icheckbox_square-$icheck",
    radioClass: "iradio_square-$icheck",
    increaseArea: "20%"
  });
});
</script>

php;
		return $link;
	}

	/**
	 *引入ueidter编辑器
	 *@param string $tag  name:表单name content：编辑器初始化后 默认内容
	 */
	public function _ueditor($tag) {
		$name = $tag['name'];
		$content = $tag['content'];
		$link = <<<php
<script id="container" name="$name" type="text/plain">
	$content
</script>
<script type="text/javascript" src="__PUBLIC__/static/ueditor1_4_3/ueditor.config.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/ueditor1_4_3/ueditor.all.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>
php;
		return $link;
	}

	// 置顶推荐文章标签 cid为空时则抓取全部分类下的推荐文章
	public function _recommend($tag, $content) {
		if (empty($tag['cid'])) {
			$where = "is_show=1 and is_delete=0 and is_top=1";
		} else {
			$where = 'is_show=1 and is_delete=0 and is_top=1 and cid=' . $tag['cid'];
		}
		$limit = $tag['limit'];
		// p($recommend);
		$php = <<<php
<?php
			\$recommend=M('Article')->field('aid,title')->where("$where")->limit($limit)->select();
			foreach (\$recommend as \$k => \$field) {
				\$url=U('Home/Index/article',array('aid'=>\$field['aid']));
?>
php;
		$php .= $content;
		$php .= '<?php } ?>'; //foreach的回扩;
		return $php;
	}

}

?>