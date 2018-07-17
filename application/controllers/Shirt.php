<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shirt extends MY_Controller {

	public function index()
	{
		$this->load->library('session');
		if(isset($_GET['lang'])) $_SESSION['lang'] = $_GET['lang'];
		if(!isset($_SESSION['lang'])) $_SESSION['lang']="pl";
		$this->showShirtContent(0, TRUE);
	}
	public function shirtIndex()
	{
		$id_shirt = isset($_GET['id']) ? $_GET['id'] : 1;
		$this->showShirtContent($id_shirt, TRUE, 'Shirt');
	}
	public function galleryIndex()
	{
		if($_SESSION['lang']=="en"){
			$info = "<p style='text-align: center;'>Gallery of sold shirts</p>";
		}else{
			$info = "<p style='text-align: center;'>Galeria sprzedanych koszulek</p>";
		}

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
