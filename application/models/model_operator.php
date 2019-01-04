<?php
class model_operator extends CI_Model{
    
    
    
 
    function login($email,$password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $chek = $this->db->get();
        $hasil=$chek->row();
        if($hasil)
        {
            if ($hasil->gagallogin >=3 ) 
            {
             
                return 2;
            }
            else if($hasil->isLogin == 'Y' )
            {
                return 1;
            }
            else if ($hasil->isLogin != 'Y' && $hasil->gagallogin<3)
            {
                $query = "update user set gagallogin=0, isLogin='Y', lastlogin=".time()."  where email='".$email."'";
                $this->db->query($query);
                $this->session->set_userdata('userdata',$hasil);
                $this->session->set_userdata('loggedin_time',time());
                return 3;
            }
        }
        else
        {
            $query = "update user set gagallogin=gagallogin+1 where email='".$email."'";
            $this->db->query($query);
            return 0;
        }
    
    }

    function loginuser($email,$password)
    {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $chek = $this->db->get();
        $hasil=$chek->row();
        if($hasil)
        {
            if ($hasil->gagallogin >=3 ) 
            {
             
                return 2;
            }
            else if($hasil->isLogin == 'Y' )
            {
                return 1;
            }
            else if ($hasil->isLogin != 'Y' && $hasil->gagallogin<3)
            {
                $query = "update member set gagallogin=0, isLogin='Y', lastlogin=".time()."  where email='".$email."'";
                $this->db->query($query);
                $this->session->set_userdata('userdata',$hasil);
                $this->session->set_userdata('loggedin_time',time());
                return 3;
            }
        }
        else
        {
            $query = "update member set gagallogin=gagallogin+1 where email='".$email."'";
            $this->db->query($query);
            return 0;
        }
    
    }

    function post()
    {
       
        $query = "SELECT max(id_karyawan) as maxKode from karyawan";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_karyawan = $data->maxKode;
		$noUrut = (int) substr($id_karyawan,3,3);
		$noUrut++;
		$char = "KRY";
		$newID = $char. sprintf("%03s",$noUrut);

            // proses data
            $nama       =  $this->input->post('nama',true);
            $alamat   =  $this->input->post('alamat',true);
            $bagian   =  $this->input->post('bagian',true);
            $jeniskel   =  $this->input->post('jk',true);
            $notelp   =  $this->input->post('nomertelp',true);
            $level   =  $this->input->post('level',true);
            $datakar       =  array(   'id_karyawan'=>$newID,
                                    'nama'=>$nama,
                                    'alamat'=>$alamat,
                                    'bagian'=>$bagian,
                                    'jenis_kelamin'=>$jeniskel,
                                    'nomor_telp'=>$notelp,
                                    'level'=>$level );
            $this->db->insert('karyawan',$datakar);
    }

    function edit()
    {
            // proses kategori
            $id =  $this->input->post('id',true);
            $nama       =  $this->input->post('nama',true);
            $alamat   =  $this->input->post('alamat',true);
            $bagian   =  $this->input->post('bagian',true);
            $jeniskel   =  $this->input->post('jk',true);
            $notelp   =  $this->input->post('nomertelp',true);
            $level   =  $this->input->post('level',true);
            $datakar       =  array(   'id_karyawan'=>$id,
                                    'nama'=>$nama,
                                    'alamat'=>$alamat,
                                    'bagian'=>$bagian,
                                    'jenis_kelamin'=>$jeniskel,
                                    'nomor_telp'=>$notelp,
                                    'level'=>$level );
             $this->db->where('id_karyawan',$id);
             $this->db->update('karyawan',$datakar);
    }
    
    
    function tampildata()
    {
        return $this->db->get('karyawan');
    }
    
    function get_one_user($email)
    {
       
        return $this->db->Query("SELECT * from member where email='".$email."'")->row();
    }

    function get_one_user_admin($email)
    {
       
        return $this->db->Query("SELECT * from user where email='".$email."'")->row();
    }
    
    function get_one_user_byid($id)
    {
       
        return $this->db->Query("SELECT * from member where id_member='".$id."'")->row();
    }

    function cekjawabanuser($email,$pertanyaan,$jawaban)
    {
        $param  =   array('email'=>$email,
                          'pertanyaan'=>$pertanyaan,
                          'jawaban'=>$jawaban);
        return $this->db->get_where('member',$param);
    }

    function cekjawabanuseradmin($email,$pertanyaan,$jawaban)
    {
        $param  =   array('email'=>$email,
                          'pertanyaannya'=>$pertanyaan,
                          'jawabannya'=>$jawaban);
        return $this->db->get_where('user',$param);
    }
    
    
    function resetpassworduser($email,$password)
    {
        return $this->db->query("UPDATE member set password='".$password."' where email = '".$email."'");
    }
}