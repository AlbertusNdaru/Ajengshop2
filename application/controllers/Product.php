<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Model_barang');
		isLoginSessionExpired();
	}

	function index()
    {     
        if(ceksession())
        {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'index.php/product/index/';
            $config['total_rows'] = $this->Model_barang->tampil_data()->num_rows();
            $config['per_page'] =6; 
            $this->pagination->initialize($config); 
            $data['paging']     =$this->pagination->create_links();
            $halaman            =  $this->uri->segment(3);
            $halaman            =$halaman==''?0:$halaman-1;
            $data['record']     =    $this->Model_barang->tampilkan_data_paging($config,$halaman);
            $this->template->load('template','admin/product/view_product',$data);
        }
        

    }

    function previewImage()
    {
        $id=$this->input->post('id');
        $image= $this->Model_barang->tampilkan_image_detail($id)->result();
        echo json_encode($image);
    }


	public function userindex()
	{
        if(ceksession())
        {
        $this->template->load('template1','user/view_product');
        }
	}

	function post()
    { if (ceksession()){
        if(isset($_POST['submit'])){
            // proses barang
            $id = $this->Model_barang->post();
            $this->aksi_upload($id,$_FILES['berkas']);
            redirect('product');
            
        }
        else{
            $this->load->model('model_kategori');
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            //$this->load->view('barang/form_input',$data);
            $this->template->load('template','admin/product/input_product',$data);
        }
        }
    }

    function delete()
    {if (ceksession()){
        $id=  $this->uri->segment(3);
        $this->Model_barang->deleteimg($id);
        $this->Model_barang->delete($id);
        redirect('product');
        }
    }

    function edit()
    { if (ceksession())
        {
       if(isset($_POST['submit'])){
            // proses barang
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $merk       =   $this->input->post('merk');
            $status     =   $this->input->post('status');
            $stok       =   $this->input->post('stok');
            $deskripsi  =   $this->input->post('deskripsi');
            $foto       =   'BRG_'.get_current_date().'_'.$_FILES['berkas']['name'][0];
            if ($_FILES['berkas']['name'][0]!="")
            {
                $this->Model_barang->deleteimg($id);
                $data       = array('nama_barang'=>$nama,
                'id_kategori'=>$kategori,
                'harga'=>$harga,
                'merk'=>$merk,
                'status'=>$status,
                'stok'=>$stok,
                'deskripsi'=>$deskripsi,
                'foto'=>$foto);
                $this->aksi_upload($id,$_FILES['berkas']);

            }
            else
            {
                $data       = array('nama_barang'=>$nama,
                'id_kategori'=>$kategori,
                'harga'=>$harga,
                'merk'=>$merk,
                'stok'=>$stok,
                'deskripsi'=>$deskripsi,
                'status'=>$status);
            }
    
            $this->Model_barang->edit($data,$id);
            redirect('product');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['record']     =  $this->Model_barang->tampil_data_by_id($id);
            //$this->load->view('barang/form_edit',$data);
            $this->template->load('template','admin/product/edit_product',$data);
        }
        }
    }

    public function aksi_upload($id,$files){
        $images = array();
        $config['upload_path']          = './assets/img_product/';
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);
        foreach($files['name'] as $key => $image)
        { 
            $_FILES['berkas[]']['name']= $files['name'][$key];
            $_FILES['berkas[]']['type']= $files['type'][$key];
            $_FILES['berkas[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['berkas[]']['error']= $files['error'][$key];
            $_FILES['berkas[]']['size']= $files['size'][$key];

            //echo $dataimage->name;
               
                $config['file_name']            = 'BRG_'.get_current_date().'_'.$image;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
        
                $this->upload->initialize($config);
        
                if ( ! $this->upload->do_upload('berkas[]')){
                    $error = array('error' => $this->upload->display_errors());
                    echo json_encode($error);
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $this->Model_barang->inserttabelproduct($id,'BRG_'.get_current_date().'_'.$image);
                    //redirect('barang');
                }

                

        }
		
        
    }

}
