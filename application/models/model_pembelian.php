<?php
class Model_pembelian extends ci_model
{
    
    

    function totalchart()
    {
        $id_user=$_SESSION['userdata']->id_user;
        $jumlah= $this->db->query("SELECT count(id_detail) as total from detail where id_user='".$id_user."' and date(tanggal)=date(now()) and status=0");
        $jumlahchart = $jumlah->row();
        if($jumlahchart)
        {
            return $jumlahchart->total;
        }
		else{ return 0;}
    }

    function tampil_pembeliaan()
    {
        $id_user=$_SESSION['userdata']->id_user;
        $query= "SELECT a.*, b.nama_barang FROM detail_pembelian as a inner join barang as b on b.id_barang= a.id_barang where id_order is null and id_user='".$id_user."' and date(tanggal)=date(now()) and status=0 ";
        return $this->db->query($query);
    }

    

    function insertdetailpembelian()
    {
        $id_brng=$_POST['id_barang'];
        $id_supliyer=$_POST['id_supliyer'];
        $id_user=$_SESSION['userdata']->id_user;
        $jml=$_POST['jumlah'];
        $queryharga="SELECT harga from barang where id_barang = '".$id_brng."'";
        $checkharga = $this->db->query($queryharga)->row();
        $harga=  $checkharga->harga;
        $query = "SELECT max(id_detail_pembelian) as maxKode from detail_pembelian";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_keranjang = $data->maxKode;
		$noUrut = (int) substr($id_keranjang,3,3);
		$noUrut++;
		$char = "PMB";
		$newID = $char. sprintf("%03s",$noUrut);
		$querybarang = "SELECT id_barang from detail_pembelian where id_user ='".$id_user."' and id_barang='".$id_brng."' and status=0 and date(tanggal)=date(now())";
        $cekbarang = $this->db->query($querybarang)->row();
        $data= array('id_detail_pembelian'=>$newID,'id_barang'=>$id_brng,'harga'=>$harga,'id_supliyer'=>$id_supliyer,'jumlah'=>$jml,'id_user'=>$id_user,'status'=>0);
		if($cekbarang)
		{
			$this->db->query("UPDATE detail_pembelian set jumlah=jumlah+$jml where id_user = '".$id_user."' and id_barang='".$id_brng."' and status=0 and date(tanggal)=date(now())");  
		}
		else
		{
            $this->db->insert('detail_pembelian',$data);
		}
		
    }

    
    function insertpembelian($totalbayar)
    {
        
        $query = "SELECT max(id_order) as maxKode from orderbarang";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_order = $data->maxKode;
       //echo $id_transaksi;
		$noUrut = (int) substr($id_order,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "ORD";
		$newID = $char. sprintf("%03s",$noUrut);
       $this->db->query("INSERT into orderbarang(id_order,total_bayar) values('".$newID."','".$totalbayar."')");
       $this->db->query("UPDATE detail_pembelian set status=1 , id_order='".$newID."' where status=0 and id_user='".$_SESSION['userdata']->id_user."' and date(tanggal)=date(now())");  
        	
		
    }
    

    
    function laporan_default()
    {
        $query="SELECT t.tanggal_transaksi,o.nama_lengkap,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,operator as o
                WHERE td.transaksi_id=t.transaksi_id and o.operator_id=t.operator_id
                group by t.transaksi_id";
        return $this->db->query($query);
    }
    
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT t.tanggal_transaksi,o.nama_lengkap,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,operator as o
                WHERE td.transaksi_id=t.transaksi_id and o.operator_id=t.operator_id 
                and t.tanggal_transaksi between '$tanggal1' and '$tanggal2'
                group by t.transaksi_id";
        return $this->db->query($query);
    }
    function hapusdetailpembelian($id)
    {
        $this->db->where('id_detail_pembelian',$id);
        $this->db->delete('detail_pembelian');
    }
}