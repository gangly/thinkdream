<?php
return array(
//此配置项为自动生成；如需改动请在后台网站设置
//*************************************网站设置****************************************
	'WEB_STATUS'				=>	'1',	       //网站状态1:开启 0:关闭
	'WEB_CLOSE_WORD'			=>	'网站升级中，请稍后访问。',	   //网站关闭时提示文字
	'WEB_ICP_NUMBER'			=>	'豫ICP备14009546号-3',	   // 网站ICP备案号
	'ADMIN_EMAIL'				=>	'admin@baijunyao.com',		   // 站长邮箱

//*************************************优化推广****************************************
	'WEB_NAME'					=>	'thinkdream',		 	   //网站名：
	'WEB_KEYWORDS'				=>	'网站,php,nginx,mysql,python',	       //网站关键字
	'WEB_DESCRIPTION'			=>	'个人博客',	   //网站描述
	'AUTHOR'					=>	'望乡',	   		   //默认作者
	'COPYRIGHT_WORD'			=>	'本文为原创文章,转载无需和我联系,但请注明出处',	   //文章保留版权提示
	'IMAGE_TITLE_ALT_WORD'		=>	'thinkdream', //图片默认title和alt

//*************************************水印设置****************************************
	'WATER_TYPE'            	=>	'1',           //水印类型 0:不使用水印 1:文字水印 2:图片水印 3:文字和图片水印同时使用
	'TEXT_WATER_WORD'       	=>	'thinkdream',      //文字水印内容
	'TEXT_WATER_TTF_PTH'    	=>	'./Public/static/font/ariali.ttf',   //文字水印字体路径
	'TEXT_WATER_FONT_SIZE'  	=>	'15', //文字水印文字字号
	'TEXT_WATER_COLOR'      	=>	'#008CBA',     //文字水印文字颜色
	'TEXT_WATER_ANGLE'      	=>	'0',     //文字水印文字倾斜程度
	'TEXT_WATER_LOCATE'     	=>	'9',    //文字水印位置 1：上左 2：上中 3：上右 4：中左 5：中中 6：中右 7：下左 8：下中 9：下右
	'IMAGE_WATER_PIC_PTAH'		=>	'./Upload/image/logo/logo.png', //图片水印 水印路径
	'IMAGE_WATER_LOCATE'		=>	'9',   //图片水印 水印位置 1：上左 2：上中 3：上右 4：中左 5：中中 6：中右 7：下左 8：下中 9：下右
	'IMAGE_WATER_ALPHA'			=>	'80',    //图片水印 水印透明度：0-100 

//*************************************第三方登录****************************************
	'QQ_APP_ID'					=>	'',				   // QQ登陆APP D
	'QQ_APP_KEY'				=>	'',			   // QQ登陆APP KEY
	'SINA_API_KEY'				=>  '',		   	   // 新浪登陆API KEY
	'SINA_SECRET'				=>  '',		   	   // 新浪登陆SECRET
	'DOUBAN_API_KEY'			=>  '',		   // 豆瓣登陆API KEY
	'DOUBAN_SECRET'				=>  '',		   	   // 豆瓣登陆SECRET
	'RENREN_API_KEY'			=>  '',		   // 人人登陆API KEY
	'RENREN_SECRET'				=>  '',		   	   // 人人登陆SECRET
	'KAIXIN_API_KEY'			=>  '',		   // 开心网登陆API KEY
	'KAIXIN_SECRET'				=>  '',		   	   // 开心网登陆SECRET
	'GITHUB_CLIENT_ID'			=>  '',		   // github登陆API KEY
	'GITHUB_CLIENT_SECRET'		=>  '',	   // github登陆SECRET
	'SOHU_API_KEY'				=>  '',		   	   // 搜狐网登陆API KEY
	'SOHU_SECRET'				=>  '',		   	   // 搜狐网登陆SECRET

//***********************************其他第三方接口****************************************	
	'CHANGYAN_COMMENT'			=>	'',	       // 畅言评论设置
	'CHANGEYAN_RETURN_COMMENT'	=>	'', // 畅言评论回推地址
	'WEB_STATISTICS'			=>	'',   	   	   // 第三方统计代码
	'BAIDU_SITE_URL'			=>	'',   	  	   // 百度推送site提交链接



);