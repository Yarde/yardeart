<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {

	public function index()
	{
		$info = "<p style='text-align: center;'>Galeria sprzedanych koszulek</p>";
        $id_shirt = isset($_GET['id']) ? $_GET['id'] : 0;
		$this->load->model('Shirt_model');
		$shirt_content = $this->Shirt_model->get_shirt_content($id_shirt, FALSE);
		$view['content'] = $this->loadContent('Main', ['shirt_content' => $shirt_content, 'info' => $info]);
        $view['mainNav'] = $this->loadMainNav();
		$this->showMainView($view);   
	}
}
