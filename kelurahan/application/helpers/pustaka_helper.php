<?php

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
        if ($ci->session->userdata('role_id') == 1) {
            redirect('autentifikasi');
            } else {
            redirect('autentifikasi');
            }
            } 
    else {
        $idrole = $ci->session->userdata('idrole');
		$email = $ci->session->userdata('email'); 
	} 

}

function cek_user() 
{ 
    	$ci = get_instance(); 
    	$idrole= $ci->session->userdata('idrole'); 
    	if ($idrole != 1) 
    { 
    	$ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses tidak diizinkan </div>'); redirect('autentifikasi/gagal'); 
    } 
}

function cek_loginuser()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
        if ($ci->session->userdata('role_id') == 2) {
            redirect('home');
            } else {
            redirect('home');
            }
            } 
    else {
        $idrole = $ci->session->userdata('idrole');
		$email = $ci->session->userdata('email'); 
	} 

}

function cek_useruser() 
{ 
    	$ci = get_instance(); 
    	$idrole= $ci->session->userdata('idrole'); 
    	if ($idrole != 2) 
    { 
    	$ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses tidak diizinkan </div>'); redirect('autentifikasi/gagal'); 
    } 
}


