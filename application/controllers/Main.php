<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function error404()
    {
        $this->showView('404');
    }
}
