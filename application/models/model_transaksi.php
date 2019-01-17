<?php
class Model_transaksi extends ci_model
{
    
    
    function tampiltransaksi()
    {
        $query= "SELECT distinct(a.tanggal) as tgl, a.*,b.id_member, c.nama_member FROM transaksi as a inner join detail as b on b.id_transaksi=a.id_transaksi inner join member as c on c.id_member = b.id_member";
        return $this->db->query($query);   
    }
    function tampiltransaksipaging($config, $halaman)
    {
        $query= "SELECT distinct(a.tanggal) as tgl, a.*,b.id_member, c.nama_member FROM transaksi as a inner join detail as b on b.id_transaksi=a.id_transaksi inner join member as c on c.id_member = b.id_member  Limit ".($halaman * $config['per_page']).", ".$config['per_page']." ";
        return $this->db->query($query);   
    }

    function tampiltransaksibyid()
    {
        $id= $_SESSION['userdata']->id_member;
        $query= "SELECT distinct date(b.tanggal) as tgl, b.id_transaksi, b.total_bayar FROM transaksi as b inner join detail as a on a.id_transaksi=b.id_transaksi where a.id_member='".$id."'";
        return $this->db->query($query);   
    }

    function tampilkan_detail_transaksi_byid($id)
    {
        $query= "SELECT a.*, b.nama_barang FROM detail as a inner join barang as b on b.id_barang=a.id_barang where id_transaksi='".$id."'";
        return $this->db->query($query)->result();   
    }

    function tampilkan_data_paging($config, $halaman)
    {
       return $this->db->get('transaksi', $config['per_page'], ($halaman * $config['per_page']));
    }
    function totalchart()
    {
        if(isset($_SESSION['userdata']))
        {
            $id_member=$_SESSION['userdata']->id_member;
            $jumlah= $this->db->query("SELECT count(id_detail) as total from detail where id_member='".$id_member."' and date(tanggal)=date(now()) and status=0");
            $jumlahchart = $jumlah->row();
            if($jumlahchart)
            {
                return $jumlahchart->total;
            }
            else{ return 0;}
        }
        
    }

    function cart()
    {
        
        $query= "SELECT a.id_detail, b.nama_barang, a.harga, a.jumlah, b.foto FROM detail as a inner join barang as b on b.id_barang=a.id_barang WHERE a.id_member='".$_SESSION['userdata']->id_member."' and date(tanggal)= date(now()) and a.status=0";
        return $this->db->query($query);   
        
    }

    function totalchartpending()
    {
        $jumlah= $this->db->query("SELECT count(id_transaksi) as total from transaksi where status=0");
        $jumlahchart = $jumlah->row();
        if($jumlahchart)
        {
            return $jumlahchart->total;
        }
		else{ return 0;}
    }

    function accdatapending($id)
    {
        $this->db->query("UPDATE transaksi set status=1 where id_transaksi='".$id."'");
    }

    function datapending()
    {
        return $this->db->query("SELECT*from transaksi where status=0");
    }

    function chart()
    {
        $query= "SELECT a.id_detail, b.nama_barang, a.harga, a.jumlah FROM detail as a inner join barang as b on b.id_barang=a.id_barang WHERE a.id_user='".$_SESSION['userdata']->id_user."' and date(tanggal)= date(now()) and status=0";
        return $this->db->query($query);   
    }

 
    function insertdetailfromnologin($databarangtransaksi)
    {
        $id_brng=$databarangtransaksi['id'];
        $id_member=$_SESSION['userdata']->id_member;
        $jml=$databarangtransaksi['jml'];
        $harga=$databarangtransaksi['hrg'];
        $query = "SELECT max(id_detail) as maxKode from detail";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_detail = $data->maxKode;
		$noUrut = (int) substr($id_detail,3,3);
		$noUrut++;
		$char = "DTL";
		$newID = $char. sprintf("%03s",$noUrut);
		//$querybarang = "UPDATE barang set stok=stok+".$jml." where id_barang='".$id_brng."' ";
        //$this->db->query($querybarang);
        $data= array('id_detail'=>$newID,'id_barang'=>$id_brng,'harga'=>$harga,'jumlah'=>$jml,'id_member'=>$id_member,'status'=>0);
            $this->db->insert('detail',$data);
    }

  

   

    function insertdetail($databarangtransaksi)
    {
        $id_brng=$databarangtransaksi['id'];
        $id_member=$_SESSION['userdata']->id_member;
        $jml=$databarangtransaksi['jml'];
        $harga=$databarangtransaksi['hrg'];
        $query = "SELECT max(id_detail) as maxKode from detail";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_detail = $data->maxKode;
		$noUrut = (int) substr($id_detail,3,3);
		$noUrut++;
		$char = "DTL";
		$newID = $char. sprintf("%03s",$noUrut);
		$querybarang = "SELECT id_barang from detail where id_member ='".$id_member."' and id_barang='".$id_brng."' and status=0 and date(tanggal)=date(now())";
        $cekbarang = $this->db->query($querybarang)->row();
        $data= array('id_detail'=>$newID,'id_barang'=>$id_brng,'harga'=>$harga,'jumlah'=>$jml,'id_member'=>$id_member,'status'=>0);
		if($cekbarang)
		{
			$this->db->query("UPDATE detail set jumlah=$jml where id_member = '".$id_member."' and id_barang='".$id_brng."' and status=0 and date(tanggal)=date(now())");  
		}
		else
		{
            $this->db->insert('detail',$data);
		}
		
    }

    function updatedetail($jml,$id)
    {
        
        $this->db->query("UPDATE detail set jumlah=$jml where id_detail='".$id."'");
		
    }

    function bataltransaksi($id)
    {
        $this->db->where('id_transaksi',$id);
        $this->db->delete('transaksi');
    }

    function insertpenjualan($totalbayar)
    {
        
        $query = "SELECT max(id_transaksi) as maxKode from transaksi";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_transaksi = $data->maxKode;
		$noUrut = (int) substr($id_transaksi,3,3);
        $noUrut++;
		$char = "TRS";
		$newID = $char. sprintf("%03s",$noUrut);
        $this->db->query("INSERT into transaksi(id_transaksi,total_bayar,status) values('".$newID."','".$totalbayar."',0)");
        $this->db->query("UPDATE detail set status=1 , id_transaksi='".$newID."' where status=0 and id_member='".$_SESSION['userdata']->id_member."' and date(tanggal)=date(now())");  
        $pendingstok = $this->db->query("select  a.stok, b.jumlah, b.harga, b.id_detail ,a.id_barang ,a.nama_barang from barang as a inner join detail as b on b.id_barang=a.id_barang inner join transaksi as c on c.id_transaksi=b.id_transaksi where b.id_transaksi = '".$newID."' ")->result();
        $validate = array();
        foreach($pendingstok as $row)
        {
            if ($row->stok < $row->jumlah)
            {
                $total=$row->jumlah*$row->harga;
               $this->db->query("UPDATE transaksi set total_bayar=total_bayar-".$total." where id_transaksi = '".$newID."'");
               $this->hapusdetail($row->id_detail);
               array_push($validate,array('nama_barang'=>$row->nama_barang,
                                 'Error'=>'Stok Tidak Mencukupi',
                                  'totalitem'=>count($pendingstok),
                                 'id'=>$newID));
 
            }
            else
            {
                $this->db->query("update barang set stok = stok - ".$row->jumlah." where id_barang = '".$row->id_barang."'");
            }
          
        }	
    
     if (isset($validate))
     {
         return $validate;
     }
     return null;
		
    }

    function insertpenjualanoffline($totalbayar)
    {
        
        $query = "SELECT max(id_transaksi) as maxKode from transaksi";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_transaksi = $data->maxKode;
        echo $id_transaksi;
		$noUrut = (int) substr($id_transaksi,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "TRS";
		$newID = $char. sprintf("%03s",$noUrut);
       $this->db->query("INSERT into transaksi(id_transaksi,total_bayar,status) values('".$newID."','".$totalbayar."',1)");
       $this->db->query("UPDATE detail set status=1 , id_transaksi='".$newID."' where status=0 and id_user='".$_SESSION['userdata']->id_user."' and date(tanggal)=date(now())");  
        	
        
        
    }

    
    function tampilkan_detail_transaksi()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $query  ="SELECT b.nama_barang, a.jumlah, a.tanggal, a.harga From detail as a inner join barang as b on b.id_barang=a.id_barang where a.id_transaksi='$id_transaksi'";
        $data = $this->db->query($query);
        return $data->result();
    }
    
    function hapusdetail($id)
    {
        $this->db->where('id_detail',$id);
        $this->db->delete('detail');
    }
    
    function clearrecord()
    {
        
        $this->db->query('delete from transaksi');
    }
    
    
    
    function laporan_default()
    {
        $query="SELECT* from laporan_penjualan";
        return $this->db->query($query);
    }
    
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT*from laporan_penjualan where date(tanggal) between '$tanggal1' and '$tanggal2'
                group by id_transaksi";
        return $this->db->query($query);
    }
}