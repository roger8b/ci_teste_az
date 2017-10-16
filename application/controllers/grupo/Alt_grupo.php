<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alt_grupo extends CI_Controller

{
 function __construct()
 {
  parent::__construct();
  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->load->model('grupo/Alt_grupo_model');
  $this->load->model('login/User_model');
  $this->load->library('auxiliar');
  $login_status = $this->session->userdata('login');
  if ($login_status != TRUE)
  {
   redirect('inicio');
  }

  $user = $this->User_model->get_user_by_id($this->session->userdata('uid'));
  if ($user[0]->tipo == 1)
  {
   redirect('painel_controle');
  }
 }

 public

 function alterar($grupo_id)
 {

  // Regras de validaÃ§Ã£o do Formulario de registro de usuÃ¡rio

  $this->form_validation->set_rules('txt_nome', 'Nome', 'trim|required');
  if ($this->form_validation->run() == FALSE)
  {
   $dados['form_erro'] = validation_errors();
  }
  else
  {
   $dados['parametros'] = array(
    'id' => 'default',
    'nome' => $this->input->post('txt_nome')
   );

   // Retorno de informação do banco

   $dados['msg_banco'] = $this->Alt_grupo_model->update_dados('grupo', $grupo_id, $dados['parametros']);

   // Chamada de função fazer update no banco

   $this->Alt_grupo_model->update_dados('grupo', $grupo_id, $dados['parametros']);
  }

  $dados['titulo'] = "Alterar";
  $dados['pg_header'] = "Editar Informações do Grupo";
  $dados['_view'] = 'painel_controle/formularios/form_alt_grupo';
  $dados['tb_grupo'] = $this->Alt_grupo_model->selec_dado('grupo', $grupo_id);
  $dados['usuario'] = $this->User_model->get_user_by_id($this->session->userdata('uid'));
  $this->load->view('painel_controle/index', $dados);
 }
}

