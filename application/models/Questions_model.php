<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Questions_model extends MY_Model
{
  public function get_question_ids()
  {
    $questions = $this->db->get(QUESTION_TABLE)->result();
    $id_pytan = [];
    foreach ($questions as $question) {
      array_push($id_pytan, $question->id_question);
    }
    return $id_pytan;
  }
  public function get_correct_answer_letter($id_question)
  {
     return $this->db->get_where(QUESTION_TABLE, ['id_question'=>$id_question], 1)->result()[0]->correct_answer_letter;
  }
}
