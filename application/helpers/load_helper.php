<?php
 function load($view,$data=null)
 {
     $CI= & get_instance();
     $CI->load->view('template');
     $CI->load->view($view);
     $CI->load->view('footer');
 }
?>