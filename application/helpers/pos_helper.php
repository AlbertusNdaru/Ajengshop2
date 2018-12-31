<?php

function ceksession()
{   $CI= & get_instance();
    if (isset($_SESSION['userdata']->id_user))
    {
        isLoginSessionExpired();
        return true;
    }
    else
    {
        $CI->load->view('admin/login');
        return false;
    }
}



function isLoginSessionExpired() {
    $CI= & get_instance();
	$login_session_duration = 300; 
    $current_time = time(); 
	if(isset($_SESSION['loggedin_time']) && isset($_SESSION['userdata'])){  
		if((abs($current_time - $_SESSION['loggedin_time']) > $login_session_duration)){ 
         
           
            session_destroy();
            redirect('auth/loginadmin');
        } 
        else
        {
            $CI->session->set_userdata('loggedin_time',time());
            return;
        }
    }
   
}

function ceklastlogin($email=null)
{  $CI= & get_instance();
    $login_session_duration = 300; 
    $lastlogin = $CI->db->query("SELECT lastlogin from user where email='".$email."'")->row() ;
    if($lastlogin){
        if (abs(time()-($lastlogin->lastlogin))>$login_session_duration)
        {
        $CI->db->query("update user set isLogin='N', gagallogin=0 where email='".$email."'"); 

        }
    }
    else{
        $CI->load->view('admin/login');
    }
}

function ceklastloginuser($email=null)
{  $CI= & get_instance();
    $login_session_duration = 300; 
    $lastlogin = $CI->db->query("SELECT lastlogin from member where email='".$email."'")->row() ;
    if($lastlogin)
    {
        if (abs(time()-($lastlogin->lastlogin))>$login_session_duration)
        {
          $CI->db->query("update member set isLogin='N', gagallogin=0 where email='".$email."'"); 
    
        }
    }
    else
    {
        $CI->load->view('user/login');
    }
    
}

function isLoginSessionExpireduser() {
    $CI= & get_instance();
	$login_session_duration = 300; 
    $current_time = time(); 
	if(isset($_SESSION['loggedin_time']) && isset($_SESSION['userdata'])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
         
            $CI->db->query("update member set isLogin='N', gagallogin=0 where id_member='".$_SESSION['userdata']->id_member."'") ;
            session_destroy();
            redirect('penjualan');
        } 
        else
        {
            $CI->session->set_userdata('loggedin_time',time());
            return;
        }
	}

}

function get_current_date()
{
    $CI= & get_instance();
    $date= $CI->db->query('Select NOW() as date')->row();
    return date('Ymd_His', strtotime($date->date));
}

?>
