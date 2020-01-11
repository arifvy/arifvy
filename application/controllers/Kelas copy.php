<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
        //Tambah COnstruct
        public function __construct()
        {
            parent::__construct();
            $this->load->model(array("M_kelass"));
        }
        public function index()
        {
            //$data["datakelas"]=$this->db->get("masterkelas")->result();
            //diubah
            $data["datakelas"]=$this->M_kelass->getkelas()->result();
            $this->load->view("kelas/datakelas",$data);
        }
        public function tambah()
        {
            $this->load->view("kelas/tambahkelas");
        }    
        public function simpantambah()
        {
            $postData = $this->input->post();
            unset($postData['submit']);
            $this->db->insert("masterkelas",$postData);
            redirect (site_url("kelas"));
        }
        public function hapus()
        {
            $where['id'] = $this->uri->segment(3);
            $this->db->where($where)->delete("masterkelas");
            redirect (site_url("kelas"));
        }
        public function edit()
        {
            $where['id'] = $this->uri->segment(3);
            $data["datakelas"]=$this->db->where($where)
                                ->get("masterkelas")->row();
            $this->load->view("kelas/editkelas",$data);
        }
        public function simpanedit()
        {
            $postData = $this->input->post();
            $where['id'] = $postData['id'];
            unset($postData['submit']);
            $this->db->where($where)->update("masterkelas",$postData);
            redirect (site_url("kelas"));
        }
}   