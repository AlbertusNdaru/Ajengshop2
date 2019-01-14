<?php
class Model_user extends ci_model
{
    function register($datauser)
    {
        $this->db->select('email');
        $this->db->from('user');
        $this->db->where('email',$datauser['email']);
        $chek = $this->db->get();
        $data=$chek->row();
        if ($data)
        {
            return 1;
        }
        else
        {
            $query = "SELECT max(id_user) as maxKode from user";
            $check = $this->db->query($query);
            $data = $check->row();
            $id_user = $data->maxKode;
            $noUrut = (int) substr($id_user,3,3);
            $noUrut++;
            $char = "USR";
            $newID = $char. sprintf("%03s",$noUrut);
            $datauser['id_user']=$newID;
            $this->db->insert('user',$datauser);
            return 0;
        }
    }

    function cekEmail($email)
    {
        $this->db->select('email');
        $this->db->from('member');
        $this->db->where('email',$email);
        $chek = $this->db->get();
        $data=$chek->row();
        if ($data)
        {
            return 1;
        }
        else{
            return 0;}
    }

    function registeruser($datauser)
    {
        $this->db->select('email');
        $this->db->from('member');
        $this->db->where('email',$datauser['email']);
        $chek = $this->db->get();
        $data=$chek->row();
        if ($data)
        {
            return 'email sudah ada';
        }
        else
        {
            $query = "SELECT max(id_member) as maxKode from member";
            $check = $this->db->query($query);
            $data = $check->row();
            $id_member = $data->maxKode;
            $noUrut = (int) substr($id_member,3,3);
            $noUrut++;
            $char = "MBR";
            $newID = $char. sprintf("%03s",$noUrut);
            $datauser['id_member']=$newID;
            $this->db->insert('member',$datauser);
            return 0;
        }
    }

    function getKaryawan()
    {
        $this->db->select('id_karyawan,nama');
        $this->db->from('karyawan');
        $chek = $this->db->get();
        return $chek->result();
    }

}
?>