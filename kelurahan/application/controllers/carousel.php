<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel extends CI_Controller
{
    public function index(){

        $this->load->view('carousel');

    }
}   