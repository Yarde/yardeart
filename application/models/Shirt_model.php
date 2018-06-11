<?php defined('BASEPATH') or exit('No direct script access allowed');
class Shirt_model extends MY_Model
{

    public function get_shirt_content($id)
    {
        if($id == 0){
            $query = $this->db->get_where(SHIRT_TABLE, array('is_available' => 1));
        }else{
            $query = $this->db->get_where(SHIRT_TABLE, array('id_shirt' => $id));
        }
         
        if ($query->result() == null) {
            $url = base_url();
            header("Location: $url");
        }
        $shirts = $query->result();
        foreach ($shirts as $key => $shirt) {
            $id_shirt = $shirt->id_shirt;
        }
        return [
        'shirts' => $shirts,
      ];
    }
}
