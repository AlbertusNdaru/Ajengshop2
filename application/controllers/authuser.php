<?php
class authuser extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
        $this->load->model('model_user');
        $this->load->model('model_transaksi');
        
        
    }
    function loginuserr()
    {
        if(isset($_SESSION['userdata']))
           {
               redirect('product');
           }
           else
           { 
            $this->load->view('user/login');
           }
    }

    function logincekout()
    {
        $this->load->view('user/login');
    }
    function login()
    {
        
           
            $email   =   $this->input->post('email');
            $password   =   $this->input->post('password');
            if (ceklastloginuser($email))
            {
                $hasil=  $this->model_operator->loginuser($email,$password);
                if (isset($_SESSION['cart']))
                {
                    $datatransaksi = $this->session->userdata('cart');
                    foreach($datatransaksi as $data)
                    {
                        $this->model_transaksi->insertdetailfromnologin($data);
                    }
                }
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

    
    
    
    function logout()
    {

                $this->db->query("update member set isLogin='N', gagallogin=0 where id_member='".$_SESSION['userdata']->id_member."'") ;
                $this->session->sess_destroy();
                redirect('penjualan');
    }

   function cekemail()
   {
       echo $this->model_user->cekEmail($_POST['email']);
   }


    function register()
    {
       
     
            // proses login disini
            $no_ktp = $this->input->post('no_ktp');
            $nama_member = $_POST['nama'];
            $no_ktp = $_POST['no_ktp'];
            $email=$_POST['email'];
            $password =$_POST['password'];
            $pertanyaan =$_POST['pertanyaan'];
            $jawaban =$_POST['jawaban'];
            $datauser = array('id_member'=>'','nama_member'=>$nama_member,'email'=>$email,'password'=>$password,'pertanyaan'=>$pertanyaan,'no_ktp'=>$no_ktp,'jawaban'=>$jawaban,'ktp'=>$_FILES['berkas']['name']);
            $hasil=  $this->model_user->registeruser($datauser); 
            $this->aksi_upload();
            //echo json_encode($_FILES['files']);
            if($hasil==0)
            {
             redirect('authuser/loginuserr');
                
            }
             else{
                 echo 'Email sudah Terpakai mbokdhe. Coba Ganti email yang baru!';
                
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
    public function aksi_upload(){
		$config['upload_path']          = './assets/img_ktp_member/';
		$config['allowed_types']        = '*';
		//$config['max_size']             = 100;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}else{
            $data = array('upload_data' => $this->upload->data());
            //redirect('barang');
        }
    }
}