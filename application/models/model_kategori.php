<?php
class Model_kategori extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->get('kategori');
    }
    
  function tampilkan_data_paging($config,$halaman)
  {
     return $this->db->get('kategori', $config['per_page'], ($halaman * $config['per_page']));
  }
    
    function post(){
            $query = "SELECT max(id_kategori) as maxKode from kategori";
            $check = $this->db->query($query);
            $data = $check->row();
            $id_kategori = $data->maxKode;
            $noUrut = (int) substr($id_kategori,3,3);
            $noUrut++;
            $char = "KTG";
            $newID = $char. sprintf("%03s",$noUrut);
            $data=array(
                'id_kategori'=>$newID,
               'jenis_barang'=>  $this->input->post('kategori')
                        );
            $this->db->insert('kategori',$data);

       
    }
    
    function validate($nama)
    {
        $query = "SELECT jenis_barang from kategori where jenis_barang='".$nama."'";
        $data = $this->db->query($query)->row();
        if($data)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    function edit()
    {
        $data=array(
           'jenis_barang'=>  $this->input->post('kategori')
                    );
        $this->db->where('jenis_barang',$this->input->post('id'));
        $this->db->update('kategori',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_kategori'=>$id);
        return $this->db->get_where('kategori',$param);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_kategori',$id);
        $this->db->delete('kategori');
    }
}