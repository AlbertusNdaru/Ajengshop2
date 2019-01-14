<?php
class Kategori extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_kategori');
        isLoginSessionExpired();
    }
    
    function index(){
        if (ceksession()){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/kategori/index/';
        $config['total_rows'] = $this->Model_kategori->tampilkan_data()->num_rows();
        $config['per_page'] = 5; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman-1;
        $data['record']     =    $this->Model_kategori->tampilkan_data_paging($config,$halaman);
        $this->template->load('template','admin/kategori/view_kategori',$data);
        }
    }
    
    function post()
    {  if (ceksession()){
        if(isset($_POST['submit'])){
            // proses kategori
            if ($this->Model_kategori->validate($this->input->post('kategori')))
            {
                $this->Model_kategori->post();
                redirect('kategori');
            }
            else
            {
                $data['error'] = 'Nama Kategori Sudah Ada!'; 
                $this->template->load('template','admin/kategori/input_kategori',$data);
            }
            
        }
        else{
            //$this->load->view('kategori/form_input');
            $data['error']="";
            $this->template->load('template','admin/kategori/input_kategori',$data);
        }
        }
    }
    
    function edit()
    {
        if (ceksession()){
        if(isset($_POST['submit'])){
            // proses kategori
            $this->Model_kategori->edit();
            redirect('kategori');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->Model_kategori->get_one($id)->row();
            //print_r($data['record']->id_kategori);
            //$this->load->view('kategori/form_edit',$data);
            $this->template->load('template','admin/kategori/edit_kategori',$data);
        }
    }
    }
    
    
    function delete()
    {
        if (ceksession()){
        $id=  $this->uri->segment(3);
        $this->Model_kategori->delete($id);
        redirect('kategori');
        }
    }
}