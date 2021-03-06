<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends MY_Controller {

    public function ajax_finish_quiz()
    {
        try {
            $this->load->model('Quiz_model');
            $this->load->model('Questions_model');
            
            $question_ids = $this->Questions_model->get_question_ids();
            $number_of_questions = 20;
            $wynik = 0;
            foreach ($question_ids as $id_question) {
                $post_answer = $this->input->post($id_question);
                $correct_answer_letter = $this->Questions_model->get_correct_answer_letter($id_question);

                if ($post_answer == $correct_answer_letter) {
                    ++$wynik;  
                }
            }
            $srednia = ($wynik / $number_of_questions * 100);
            echo '<h2>Ukonczyles quiz</h2><br>';
            echo 'Twój wynik to: ';
            echo $srednia;
            echo '%';
        } catch (Exception $e) {
            echo '<h2>Potwierdzenie ukonczenia quizu nie powiodlo sie:</h2><br>';
            echo $e->getMessage();
        }
    }

    public function setting()
	{
        $this->load->model('Questions_model');
        $this->load->model('Quiz_model');
        $epoka = @$_POST['epoka']?:0; 
        $_SESSION['epoka'] = $epoka;
        $quiz_content = $this->Quiz_model->get_quiz_content();
        echo $this->loadContent('Quiz', ['quiz_content' => $quiz_content]);       
    }

	public function index()
	{
        $this->load->model('Questions_model');
        $this->load->model('Quiz_model');
        $view['mainNav'] = $this->loadMainNav();
        $epoka = @$_POST['epoka']?:0; 
        $_SESSION['epoka'] = $epoka;
        $quiz_content = $this->Quiz_model->get_quiz_content();
        $view['content'] = $this->loadContent('Quiz', ['quiz_content' => $quiz_content]);
        $this->showMainView($view);    
    }

}
