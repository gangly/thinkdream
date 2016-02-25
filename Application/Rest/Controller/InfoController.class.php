<?php
namespace Rest\Controller;
use Think\Controller\RestController;

Class InfoController extends RestController {
	public function index() {
		$data = array(
			'234' => 'hahaha',
			'ehe' => 2342,
		);
		$this->response($data, 'json');
	}

	Public function rest() {
		switch ($this->_method) {
			case 'get': // get请求处理代码
				if ($this->_type == 'html') {
					$data = 'rest get html';
					$this->response($data, 'json');
				} elseif ($this->_type == 'xml') {
					$data = 'rest get xml';
					$this->response($data, 'json');
				} else {
					$data = 'rest get other';
					$this->response($data, 'json');
				}
				break;
			case 'put': // put请求处理代码
				$data = 'rest put';
				$this->response($data, 'json');
				break;
			case 'post': // post请求处理代码
				$data = 'rest post';
				$this->response($data, 'json');
				break;
		}
	}
}