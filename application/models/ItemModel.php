<?php
/**
 * Created by PhpStorm.
 * User: sajith
 * Date: 1/20/19
 * Time: 7:08 AM
 */

class ItemModel extends CI_Model {

    public function insertItem($item) {
        $this->db->insert('item', $item);
        return $this->db->insert_id();
    }

    public function getList($user_id){
        $this->db->select('*');
        $this->db->where('user_id',$user_id);
        $this->db->from('item');
        $this->db->order_by('status_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateItem($item){
        $this->db->where('id',$item['id']);
        $this->db->update('item',$item);
    }

    public function deleteItem($id){
        $this->db->delete('item', array('id' => $id));
    }

}