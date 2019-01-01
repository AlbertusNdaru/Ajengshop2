<?php
class operator extends ci_controller{
    
   function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
        $this->load->model('model_user');
        isLoginSessionExpired();
    }
    
    function index()
    {
        if (ceksession()){
       
        $data['record']=  $this->model_operator->tampildata();
        
        //$this->load->view('operator/lihat_data',$data);
        $this->template->load('template','operator/lihat_data',$data);
        }
     
    }
    
    function post()
    {
        $this->load->view('admin/registeradmin');
    }
    function postuser()
    {
        $this->load->view('user/memberregister');
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            $this->model_operator->edit();
             redirect('operator');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_operator->get_one($id)->row_array();
            //$this->load->view('operator/form_edit',$data);
            $this->template->load('template','operator/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->db->where('id_karyawan',$id);
        $this->db->delete('karyawan');
        redirect('operator');
    }

    function deletemember()
    {
        $id=  $this->input->post('id_member');
        $this->db->where('id_member',$id);
        $this->db->delete('member');
        redirect('operator/tampil_member');
    }

    function tampil_member()
    {
        $data['record']=  $this->model_operator->tampildatamember();
        
        //$this->load->view('operator/lihat_data',$data);
        $this->template->load('template','operator/member',$data);
    }
    function tampil_member_by_name()
    {
        $data['record']=  $this->model_operator->tampildatamemberbyname()->result();
        echo json_encode($data['record']);
        //$this->load->view('operator/lihat_data',$data);
        //$this->template->load('template','operator/member',$data);
    }

    function get_member_byemail()
    {
        $email= $this->input->get('email');
        $data['member']= $this->model_operator->get_one_user($email);
        //echo json_encode($data['member']);
        $this->load->view('user/lupapassword',$data);
    }

    function get_member_byemail_fromemail()
    {
        $id= $this->input->get('id');
        $data['member']= $this->model_operator->get_one_user_byid($id);
        //echo json_encode($data['member']);
        $this->load->view('user/lupapasswordemail',$data);
    }


    function cekJawaban()
    {
        $email= $this->input->post('email');
        $pertanyaan= $this->input->post('pertanyaan');
        $jawaban= $this->input->post('jawaban');
        $data= $this->model_operator->get_one_user($email,$pertanyaan,$jawaban);
        if ($data)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    function resetpassworduser()
    {
        $email= $this->input->post('email');
        $password= $this->input->post('password');
        $data = $this->model_operator->resetpassworduser($email,$password);
        if ($data)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    
}