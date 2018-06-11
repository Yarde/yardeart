<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function index()
	{
		$this->load->model('Quiz_model');
		$this->load->model('Shirt_model');
		$shirt_content = $this->Shirt_model->get_shirt_content(0);
		$view['content'] = $this->loadContent('Main', ['shirt_content' => $shirt_content]);
        $view['mainNav'] = $this->loadMainNav();
		$this->showMainView($view);   
	}
	public function error404()
    {
        $this->showView('404');
    }
}
