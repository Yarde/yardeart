<?php defined('BASEPATH') or exit('No direct script access allowed');
class Gallery_model extends MY_Model
{

    public function get_gallery_content($id)
    {
        if($id == 0){
            $query = $this->db->get_where(SHIRT_TABLE, array('is_available' => 0));
        }else{
            $query = $this->db->get_where(SHIRT_TABLE, array('id_shirt' => $id));
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
