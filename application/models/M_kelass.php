<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelass extends CI_Model {
    public function getkelas()
    {
        $data = $this->db->get("masterkelas");
        return $data;
    }
    public function savekelas($postData)
    {
        $this->db->insert("masterkelas",$postData);
    }
    public function deletekelas($where)
    {
        $this->db->where($where)->delete("masterkelas");
    }
    public function getsinglekelas($where)
    {
        $data = $this->db->where($where)->get("masterkelas");
        return $data; //jika berupa pengembalian data
    }
    public function updatekelas($where,$postData)
    {
        $this->db->where($where)->update("masterkelas",$postData);
    }

}