<?php
namespace Rest\Controller;
use Think\Controller\RestController;

Class CommonController extends RestController {
	public function index() {
		$data = array(
			'234' => 'hahaha',
			'ehe' => 2342,
		);
		$this->response($data, 'json');
	}

	public function rmCache() {

		$path = '/home/bae/app/Runtime/Cache';
		if (is_dir($path)) {
			if (rmdir($path)) {
				echo 'delete ok.';
			} else {
				echo 'delete failed.';
			}
		} else {
			echo 'not dir.';
		}
	}
}