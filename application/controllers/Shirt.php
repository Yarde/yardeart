<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shirt extends MY_Controller {

	// public function index()
	// {
	// 	$id_shirt = $_GET['id'] ?: 1;
	// 	$this->load->model('Shirt_model');
	// 	$shirt_content = $this->Shirt_model->get_shirt_content($id_shirt, TRUE);
	// 	$view['content'] = $this->loadContent('Shirt', ['shirt_content' => $shirt_content]);
    //     $view['mainNav'] = $this->loadMainNav();
	// 	$this->showMainView($view);   
	// }
	public function index()
	{
		$this->showShirtContent(0, TRUE);
	}
	public function shirtIndex()
	{
		$id_shirt = isset($_GET['id']) ? $_GET['id'] : 1;
		$this->showShirtContent($id_shirt, TRUE, 'Shirt');
	}
	public function galleryIndex()
	{
		$info = "<p style='text-align: center;'>Galeria sprzedanych koszulek</p>";
        $id_shirt = isset($_GET['id']) ? $_GET['id'] : 0;
		$this->showShirtContent($id_shirt, FALSE, 'Main', $info);		
	}
	private function showShirtContent($id_shirt, $is_available, $view_name = 'Main', $info=null)
	{
		$this->load->model('Shirt_model');
		$shirt_content = $this->Shirt_model->get_shirt_content($id_shirt, $is_available);
		$view['content'] = $this->loadContent($view_name, ['shirt_content' => $shirt_content, 'info' => $info]);
        $view['mainNav'] = $this->loadMainNav();
		$this->showMainView($view);

	}
}
