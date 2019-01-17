<?php
class Penjualan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_barang');
        $this->load->model('Model_transaksi');
        $this->load->model('Model_kategori');

        isLoginSessionExpireduser();

    }

    function index(){

        
            $this->load->library('pagination');
            $config['base_url'] = base_url().'index.php/penjualan/index/';
            $config['total_rows'] = $this->Model_barang->tampil_data()->num_rows();
            $config['per_page'] = 5; 
            $this->pagination->initialize($config); 
            $data['paging']     =$this->pagination->create_links();
            $halaman            =  $this->uri->segment(3);
            $halaman            =$halaman==''?0:$halaman-1;
            $data['databarang']     =    $this->Model_barang->tampilkan_data_paging_home($config,$halaman);
            $data['bestseller']     =    $this->Model_barang->tampil_data_bestseller();
            $data['sale']     =    $this->Model_barang->tampil_data_sale();
            $data['new']     =    $this->Model_barang->tampil_data_new();
            $this->template->load('template1','user/home2',$data);
      
        
       
    }

    function stokbarang()
    {
       $id= $this->input->post('id_barang');
       $data= $this->Model_barang->tampil_data_stok_byId($id);
       echo $data->stok;
    }

    function penjualan(){

     
        $data['record']=      $this->Model_barang->tampil_data();
        $data['kategori']     =    $this->Model_kategori->tampilkan_data();
        $this->template->load('template1','user/product',$data);
    }

    function penjualanbykategori(){

        $id = $this->input->get('id');
        $data['record']=      $this->Model_barang->tampil_data_byIdkategori($id);
        $data['kategori']     =    $this->Model_kategori->tampilkan_data();
        $this->template->load('template1','user/product',$data);
    }

    function productdetail()
    {
        $id=$this->input->get('id');
        $data['record'] = $this->Model_barang->tampilkan_data_detail($id)->result();
        $this->template->load('template1','user/product_detail',$data);
    }

    function penjualan_offline_tampildata(){
        $data['record']=$this->Model_barang->tampil_data()->result();
        echo json_encode($data['record']);
    }
    
    function penjualan_tampildata_byname(){
        $nama = $_GET['nama'];
        $data['kategori']     =    $this->Model_kategori->tampilkan_data();
        $data['record']=$this->Model_barang->tampil_data_by_name($nama);
        $this->template->load('template1','user/product',$data);
    }


    function post_penjualan()
    {
        $id= $this->input->post('id_barang');
        $jml = $this->input->post('jml');
                $data= $this->Model_barang->tampil_data_by_id($id);
                $harga= $data->harga;
                $total= $harga * 1;
                $datatransaksi = array('id'=>$id,'jml'=>$jml,'hrg'=>$harga,'total'=>$total);
                $jmlchart = $this->Model_transaksi->insertdetail($datatransaksi);
       
    }

    function updatecart()
    {
        $id= $this->input->post('id_barang');
        $jml= $this->input->post('jumlah');
       
                $data= $this->Model_barang->tampil_data_by_id($id);
                $harga= $data->harga_jual;
                $total= $harga * $jml;
                $datatransaksi = array('id'=>$id,'jml'=>$jml,'hrg'=>$harga,'total'=>$total);
                $jmlchart = $this->Model_transaksi->insertdetail($datatransaksi);        
      
    }
    

    function get_totalchart()
    {
        $jmlchart = $this->Model_transaksi->totalchart();
        echo $jmlchart;
    }

    function get_trans_pending()
    {
        $jmlchart = $this->Model_transaksi->totalchartpending();
        echo $jmlchart;
    }

    function get_data_pending()
    {
        $datapending = $this->Model_transaksi->datapending()->result();
        echo json_encode($datapending);
    }

    function accpending()
    {
        $id= $_POST['id_transaksi'];
        $datapending = $this->Model_transaksi->accdatapending($id);
    }

    function updatedetail()
    {
        $id= $this->input->post('id');
        $jml= $this->input->post('jml');
        $data = $this->Model_transaksi->updatedetail($jml,$id);
        //redirect('penjualan/cartdetail');
    }

    
    function cart()
    {
        if(isset($_SESSION['userdata']))
        {
        $cart = $this->Model_transaksi->cart()->result();
        echo json_encode($cart);
        }
    }

    function cartdetail()
    {
        if(isset($_SESSION['userdata']))
        {
        $cart['cartdetail'] = $this->Model_transaksi->cart();
        $this->template->load('template1','user/cart_detail',$cart);
        }
    }
    function poscartpending()
    {  
     
        $id= $this->input->post('id_barang');
        $jml= $this->input->post('jml');
        $data= $this->Model_barang->tampil_data_by_id($id);
        $harga= $data->harga;
        $foto= $data->foto;
        $namabarang= $data->nama_barang;
        $total= $harga * 1;
     
        if (isset($_SESSION['cart'][$id]))
        {   $total=$jml*$harga;
            $_SESSION['cart'][$id]['jml']=$jml;

        }
        else
        {  
           if(isset($_SESSION['cart']))
           {
            $datatransaksi = $this->session->userdata('cart');
            $datatransaksi[$id] = array('id'=>$id,'jml'=>$jml,'hrg'=>$harga,'total'=>$total,'foto'=>$foto, 'nama'=>$namabarang);
            $this->session->set_userdata('cart',$datatransaksi);

           } 
           else
           {
            $datatransaksi[$id] = array('id'=>$id,'jml'=>$jml,'hrg'=>$harga,'total'=>$total,'foto'=>$foto, 'nama'=>$namabarang);
            $this->session->set_userdata('cart',$datatransaksi);
           }
           
        }

        echo json_encode($_SESSION['cart']);
    }
    function getchartpending()
    {
        if(isset($_SESSION['cart']))
        {
        echo json_encode($_SESSION['cart']);
        }
        else
        {
            echo json_encode([]);
        }
       
    }
    function chartpenjualanoff()
    {
        if($_SESSION['level']==1)
        {
            $pembelian['databelanja'] = $this->Model_transaksi->chartoff()->result();
            echo json_encode($pembelian['databelanja']);
        }
        else
        {
            $pembelian['databelanja'] = $this->Model_transaksi->chart()->result();
            echo json_encode($pembelian['databelanja']);
        }
      
    }

    function hapusdetail()
    {
        $id= $this->input->post('id');
        $this->Model_transaksi->hapusdetail($id);
        redirect("penjualan/cartdetail");
    }
    
    function bataltransaksi()
    {
        $id=$this->input->post('id');
        $this->Model_transaksi->bataltransaksi($id);
        
    }
    function hapusdetailadmin()
    {
        $id= $this->input->post('id_detail');
        $this->Model_transaksi->hapusdetail($id);
       
    }
    function hapusdetailadminbatal()
    {
        $id= $this->input->post('id_detail');
        $this->Model_transaksi->hapusdetailbatal();
       
    }

    function updatepenjualan()
    {
        $totalbayar=$this->input->post('total');
        $validate = $this->Model_transaksi->insertpenjualan($totalbayar);
        if(isset($validate))
        {
                echo json_encode($validate);
        }
        else
        {
            echo "";
        }
       
    }


    function updatepenjualanoffline()
    {
        $totalbayar=$this->input->post('total');
        $this->Model_transaksi->insertpenjualanoffline($totalbayar);
        redirect("penjualan/penjualan_offline");
    }

   


}