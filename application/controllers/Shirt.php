<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shirt extends MY_Controller {

	public function index()
	{
		$id_shirt = $_GET['id'] ?: 1;
		$this->load->model('Quiz_model');
		$this->load->model('Shirt_model');
		$shirt_content = $this->Shirt_model->get_shirt_content($id_shirt, TRUE);
		$view['content'] = $this->loadContent('Shirt', ['shirt_content' => $shirt_content]);
        $view['mainNav'] = $this->loadMainNav();
		$this->showMainView($view);   
	}
}
