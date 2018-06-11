<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GAllery extends MY_Controller {

	public function index()
	{
        $id_shirt = @$_GET['id'] ?: 0;
		$this->load->model('Gallery_model');
		$shirt_content = $this->Gallery_model->get_gallery_content($id_shirt);
		$view['content'] = $this->loadContent('Gallery', ['shirt_content' => $shirt_content]);
        $view['mainNav'] = $this->loadMainNav();
		$this->showMainView($view);   
	}
}
