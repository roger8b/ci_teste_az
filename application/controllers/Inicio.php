<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inicio extends CI_Controller

{
 public

 function __construct()
 {
  parent::__construct();
  $login_status = $this->session->userdata('login');
  if ($login_status == TRUE)
  {
   $data = array(
    'login' => '',
    'uname' => '',
    'uid' => ''
   );
   $this->session->unset_userdata($data);
   $this->session->sess_destroy();
   redirect('inicio');
  }
 }

 public

 function index()
 {
  $dados['titulo'] = "Login";
  redirect('inicio');
 }
}
