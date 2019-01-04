<?php
class auth extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
        $this->load->model('model_user');
         
        
    }

    
    function loginadmin()
    {
      
        if(isset($_SESSION['userdata']))
           {
               redirect('product');
           }
           else
           { 
             $this->load->view('admin/login');
           }
    }
    function login()
    {
        
           
            $email   =   $this->input->post('email');
            $password   =   $this->input->post('password');
            if(ceklastlogin($email))
            {
                $hasil=  $this->model_operator->login($email,$password);
                if($hasil==0)
                {
                    // update last login
                  echo 0;
          
                }
                else if($hasil==1)
                {
                    echo 1;
                }
               else if($hasil==2)
               {
                   echo 2;
               }
               else 
               {
                   echo 3;
               }
            } 
            
           
            
  
       
    }

    function loginuser()
    {
        if(isset($_POST['submit'])){
            
            // proses login disini
            $email   =   $this->input->post('email');
            $password   =   $this->input->post('password');
            $hasil=  $this->model_operator->loginuser($email,$password);
            if(isset($hasil))
            {
                // update last login
                $this->session->set_userdata('userdata',$hasil);
                $this->session->set_userdata('level',0);
                    //echo "sad";
                    redirect('penjualan');
            }
            else{
                $this->load->view('form_loginuser');
            }
        }
        else{
            //$this->load->view('form_login2');
            $this->session->set_userdata('level',0);
            $this->load->view('form_loginuser');
        }
    }
    
    
    function logout()
    {
  
            if(isset($_SESSION['userdata']->id_user))
            {
                $this->db->query("update user set isLogin='N', gagallogin=0 where id_user='".$_SESSION['userdata']->id_user."'") ;
                $this->session->sess_destroy();
                redirect('loginadmin');
            }
            else
            {
                redirect('loginadmin');
            }

        
          
    }

    function register()
    {
       
     
            // proses login disini
            $nama   =   $this->input->post('nama');
            $password   =   $this->input->post('password');
            $level  =   $this->input->post('level');
            $pertanyaan =   $this->input->post('pertanyaan');
            $jawaban    =   $this->input->post('jawaban');
            $email    =   $this->input->post('email');
            $datauser = array('id_user'=>'','email'=>$email,'nama'=>$nama,'password'=>$password,'level'=>$level,'pertanyaannya'=>$pertanyaan,'jawabannya'=>$jawaban);
            $hasil=  $this->model_user->register($datauser); 
            //echo json_encode($hasil);
            if($hasil==0)
            {
               echo 0;
                
            }
            else{
                echo 1;
                
            } 
      
    }
   
    function lupapasswordadmin()
    {
        $id_user=$this->input->post('id_user');
        $hasil = $this->model_operator->getUser($id_user)->row();
        echo json_encode($hasil);
    }

    function resetadmin()
    {
        $i=$this->input->post('id_user');
        $p=$this->input->post('pertanyaannya');
        $j=$this->input->post('jawabannya');
        $hasil = $this->model_operator->getUserCek($i,$p,$j)->num_rows();
        echo $hasil;

    }

    function resetpassadmin()
    {
        $i=$this->input->post('id_user');
        $p=$this->input->post('passbaru');

        $this->model_operator->resetpasswordbaru($i,$p);
        echo 1;

    }


    function daftar()
    {
        $this->load->view('form_daftar');
    }

    function lupapassword()
    {
        $this->load->view('userinterface/form_lupapassword');
    }
    function lupapasswordadminview()
    {
        $this->load->view('form_adminlupapassword');
    }

    function daftaruser()
    {
        $this->load->view('userinterface/form_daftaruser');
    }

    function selectidkaryawan()
    {
        echo json_encode($this->model_user->getKaryawan());
    }
}