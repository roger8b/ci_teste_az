<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alt_user extends CI_Controller

{
 function __construct()
 {
  parent::__construct();
  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->load->model('usuario/Alt_user_model');
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

 function alterar($user_id)
 {

  // Regras de validação do Formulario de registro de usuário

  $this->form_validation->set_rules('txt_nome', 'Nome', 'trim|required');
  $this->form_validation->set_rules('txt_email', 'Email', 'trim|valid_email|required');
  $this->form_validation->set_rules('txt_cpf', 'CPF', 'trim|required|callback_valid_cpf');
  $this->form_validation->set_rules('txt_crm', 'CRM', 'trim|numeric|required');
  $this->form_validation->set_rules('txt_dt_nasc', 'Data de Nascimento', 'trim|required|callback_valid_dt_nasc');
  $this->form_validation->set_rules('txt_conta', 'Tipo de Conta', 'trim|required');
  $this->form_validation->set_rules('txt_grupo[]', 'Grupo de Usuários', 'trim|required');
  $this->form_validation->set_message('valid_cpf', 'Número do CPF invalido');
  $this->form_validation->set_message('valid_dt_nasc', 'Data de Nascimento invalida!');
  if ($this->form_validation->run() == FALSE)
  {
   $dados['form_erro'] = validation_errors();
  }
  else
  {
   $dados['parametros'] = array(
    'nome' => $this->input->post('txt_nome') ,
    'email' => $this->input->post('txt_email') ,
    'cpf' => $this->auxiliar->rem_format($this->input->post('txt_cpf')) ,
    'crm' => $this->input->post('txt_crm') ,
    'dt_nasc' => $this->input->post('txt_dt_nasc') ,

    // Tipo de Conta 0 - Admin / 1 - User.

    'tipo' => $this->input->post('txt_conta') ,
    'grupo' => $this->auxiliar->array_to_string($this->input->post('txt_grupo')) ,
    'status' => $this->input->post('txt_status') ,
    'senha' => md5('@primeiro')
   );

   $reset_senha = $this->input->post('txt_reset');
   if ($reset_senha == 1) {
     unset($dados['parametros']->senha);
   }

   // Retorno de informação do banco

   $dados['msg_banco'] = $this->Alt_user_model->update_dados('user', $user_id, $dados['parametros']);

   // Chamada de função fazer update no banco

   $this->Alt_user_model->update_dados('user', $user_id, $dados['parametros']);
  }

  $dados['titulo'] = "Alterar";
  $dados['pg_header'] = "Editar Informação do Usuário";
  $dados['_view'] = 'painel_controle/formularios/form_alt_user';
  $dados['tb_user'] = $this->Alt_user_model->selec_dado('user', $user_id);
  $dados['tb_grupo'] = $this->Alt_user_model->selec_dados('grupo');
  $dados['usuario'] = $this->User_model->get_user_by_id($this->session->userdata('uid'));
  $this->load->view('painel_controle/index', $dados);
 }

 function valid_cpf($cpf)
 {

  // Verifiva se o numero digitado contem todos os digitos

  $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf) , 11, '0', STR_PAD_LEFT);

  // Verifica se nenhuma das nenhuma abaixo foi digitada, caso seja, retorna falso

  if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
  {
   return FALSE;
  }
  else
  {

   // Calcula os numeros para verificar se o CPF é verdadeiro

   for ($t = 9; $t < 11; $t++)
   {
    for ($d = 0, $c = 0; $c < $t; $c++)
    {
     $d+= $cpf
     {
      $c} * (($t + 1) - $c);
     }

     $d = ((10 * $d) % 11) % 10;
     if ($cpf
     {
      $c} != $d)
      {
       return FALSE;
      }
     }

     return TRUE;
    }
   }

   function valid_dt_nasc($dt)
   {

    // Verifica se a data de entrada não maior ou igual ao dia atual.

    date_default_timezone_set("America/New_York");
    if ($dt >= date("Y-m-d"))
    {
     return FALSE;
    }
    else
    {
     return TRUE;
    }
   }
  }
