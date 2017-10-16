<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alt_senha extends CI_Controller

{
 function __construct()
 {
  parent::__construct();
  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->load->model('usuario/Alt_senha_model');
  $this->load->model('login/User_model');
  $this->load->library('auxiliar');
  $login_status = $this->session->userdata('login');
  if ($login_status != TRUE)
  {
   redirect('inicio');
  }
  }

 public 

 function alterar($user_id)
 {
  $log_user_id = $this->session->userdata('uid');
  if( $log_user_id =! $user_id){
    redirect('painel_controle');
  }



  // Regras de validação do Formulario de registro de usuário

  $this->form_validation->set_rules('txt_senha_a', 'Antiga', 'trim|required');
  $this->form_validation->set_rules('txt_senha_n', 'Nova', 'trim|required|min_length[6]|matches[txt_senha_c]');
  $this->form_validation->set_rules('txt_senha_c', 'Confirma', 'trim|required|min_length[6]');
  if ($this->form_validation->run() == FALSE)
  {
   $dados['form_erro'] = validation_errors();
  }
  else
  {
   $dados['parametros'] = array(
    'senha' => md5($this->input->post('txt_senha_n')),
    'senha_a' => md5($this->input->post('txt_senha_a')),
    'status' => 1,
   );

   // Retorno de informação do banco

   $dados['msg_banco'] = $this->Alt_senha_model->update_dados('user', $user_id, $dados['parametros']);

   // Chamada de função fazer update no banco

   $this->Alt_senha_model->update_dados('user', $user_id, $dados['parametros']);
  }

  $dados['titulo'] = "Alterar Senha";
  $dados['pg_header'] = "Alterar Senha";
  $dados['_view'] = 'painel_controle/formularios/form_alt_senha';
  $dados['tb_user'] = $this->Alt_senha_model->selec_dado('user', $user_id);
  $dados['usuario'] = $this->User_model->get_user_by_id($this->session->userdata('uid'));
  $this->load->view('painel_controle/index', $dados);
 }

}