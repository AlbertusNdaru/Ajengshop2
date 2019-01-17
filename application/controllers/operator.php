<?php
class Operator extends ci_controller{
    
   function __construct() {
        parent::__construct();
        $this->load->model('Model_operator');
        $this->load->model('Model_user');
        isLoginSessionExpired();
    }
    
    function index()
    {
        if (ceksession()){
       
        $data['record']=  $this->Model_operator->tampildata();
        
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
            $this->Model_operator->edit();
             redirect('operator');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->Model_operator->get_one($id)->row_array();
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
        $data['record']=  $this->Model_operator->tampildatamember();
        
        //$this->load->view('operator/lihat_data',$data);
        $this->template->load('template','operator/member',$data);
    }
    function tampil_member_by_name()
    {
        $data['record']=  $this->Model_operator->tampildatamemberbyname()->result();
        echo json_encode($data['record']);
        //$this->load->view('operator/lihat_data',$data);
        //$this->template->load('template','operator/member',$data);
    }

     function get_member_byemail()
    {
        $email= $this->input->get('email');
        $cek= $this->Model_operator->get_one_user($email);
        if($cek)
        {
            $data['member'] = $cek;
            $data['error'] = ''; 
            $this->load->view('user/lupapassword',$data);
        }
        else
        {
            $data['error'] = 'Email Tidak Terdaftar!'; 
            $this->load->view('user/login',$data);
        }
        //echo json_encode($data['member']);\

       
    }
    function get_user_byemail()
    {
        $email= $this->input->get('email');

        $cek= $this->Model_operator->get_one_user_admin($email);
        if($cek)
        {
            $data['member'] = $cek;
            $data['error'] = ''; 
            $this->load->view('admin/lupapassword',$data);
        }
        else
        {
            $data['error'] = 'Email Tidak Terdaftar!'; 
            $this->load->view('admin/login',$data);
        }
        //echo json_encode($data['member']);
    
    }


    function get_member_byemail_fromemail()
    {
        $id= $this->input->get('id');
        $data['member']= $this->Model_operator->get_one_user_byid($id);
        //echo json_encode($data['member']);
        $this->load->view('user/lupapasswordemail',$data);
    }
    
     function get_admin_byemail_fromemail()
    {
        $id= $this->input->get('id');
        $data['member']= $this->Model_operator->get_one_admin_byid($id);
        //echo json_encode($data['member']);
        $this->load->view('admin/lupapasswordemail',$data);
    }



    function cekJawaban()
    {
        $email= $this->input->post('email');
        $pertanyaan= $this->input->post('pertanyaan');
        $jawaban= $this->input->post('jawaban');
        $data= $this->Model_operator->cekjawabanuser($email,$pertanyaan,$jawaban);
        if ($data)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    
    function cekJawabanadmin()
    {
        $email= $this->input->post('email');
        $pertanyaan= $this->input->post('pertanyaan');
        $jawaban= $this->input->post('jawaban');
        $data= $this->Model_operator->cekjawabanuseradmin($email,$pertanyaan,$jawaban);
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
        $data = $this->Model_operator->resetpassworduser($email,$password);
        if ($data)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

     function resetpasswordadmin()
    {
        $email= $this->input->post('email');
        $password= $this->input->post('password');
        $data = $this->Model_operator->resetpasswordadmin($email,$password);
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