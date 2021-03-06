<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
        //Tambah COnstruct
        public function __construct()
        {
            parent::__construct();
            $this->load->model(array("M_kelass"));
            $this->load->helper(array("currency"));
        }
        public function index()
        {
            //$data["datakelas"]=$this->db->get("masterkelas")->result();
            //diubah
            $data["datakelas"]=$this->M_kelass->getkelas()->result();
            //$this->load->view("kelas/datakelas",$data);
            $data["content"]="kelas/datakelas";
            $this->load->view("layouts/index",$data);
        }
        public function tambah()
        {
            //$this->load->view("kelas/tambahkelas");
            $data["content"]="kelas/tambahkelas";
            $this->load->view("layouts/index",$data);
        }    
        public function simpantambah()
        {
            $postData = $this->input->post();
            unset($postData['submit']);
            //$this->db->insert("masterkelas",$postData);
            //diganti
            $this->M_kelass->savekelas($postData);
            redirect (site_url("kelas"));
        }
        public function hapus()
        {
            $where['id'] = $this->uri->segment(3);
            //$this->db->where($where)->delete("masterkelas");
            //diganti
            $this->M_kelass->deletekelas($where);
            redirect (site_url("kelas"));
        }
        public function edit()
        {
            $where['id'] = $this->uri->segment(3); //arah url
            //$data["datakelas"]=$this->db->where($where)->get("masterkelas")->row();
            $data["datakelas"]=$this->M_kelass->getsinglekelas($where)->row();
            $data["content"]="kelas/editkelas";
            $this->load->view("layouts/index",$data);
        }
        public function simpanedit()
        {
            $postData = $this->input->post();
            $where['id'] = $postData['id'];
            unset($postData['submit']);
            //$this->db->where($where)->update("masterkelas",$postData);
            $this->M_kelass->updatekelas($where,$postData);
            redirect (site_url("kelas"));
        }
}   