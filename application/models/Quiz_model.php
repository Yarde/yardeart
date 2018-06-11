<?php defined('BASEPATH') or exit('No direct script access allowed');
class Quiz_model extends MY_Model
{

    public function get_quiz_content()
    {
        $epoka = $_SESSION['epoka'];
        $this->db->order_by("rand()", "asc");
        $this->db->limit(20);
        if($epoka === 0){
            $query = $this->db->get(QUESTION_TABLE); 
        }else{
            $query = $this->db->get_where(QUESTION_TABLE, ['epoka' => $epoka]); 
        }  
        if ($query->result() == null) {
            throw new Exception('quiz nie ma pytan! Skontaktuj sie z administratorem.');
        }
        $questions = $query->result();
        foreach ($questions as $key => $question) {
            $id_question = $question->id_question;
            $query = $this->db->get_where(ANSWER_TABLE, ['fk_question' => $id_question]);
            if ($query->result() == null) {
                throw new Exception('Pytanie '.$id_question.' nie ma odpowiedzi! Skontaktuj sie z administratorem.');
            }
            $answers = $query->result();
            foreach ($answers as $answer) {
                $letter = $answer->letter;
                $question->answers[$letter] = $answer->content;
            }
        }

        return [
        'questions' => $questions,
      ];
    }
}
