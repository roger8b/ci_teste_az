<?php
class Ins_user_model extends CI_Model

{
 function __construct()
 {
  parent::__construct();
 }

 // Insert

 function add_dados($tabela, $parametros)
 {

  // Verifica email / cpf / crm jÃ¡ esta cadastrado no banco.

  if ($this->db->get_where($tabela, array(
   'email' => $parametros['email']
  ))->row_array())
  {
   return array(
    'tipo' => 'alert alert-danger',
    'msg' => 'Já existe um usuário com este email!'
   );
  }
  else
  if ($this->db->get_where($tabela, array(
   'cpf' => $parametros['cpf']
  ))->row_array())
  {
   return array(
    'tipo' => 'alert alert-danger',
    'msg' => 'Já existe um usuário com este CPF!'
   );
  }
  else
  if ($this->db->get_where($tabela, array(
   'crm' => $parametros['crm']
  ))->row_array())
  {
   return array(
    'tipo' => 'alert alert-danger',
    'msg' => 'Já existe um usuário com este CRM!'
   );
  }
  else
  {
   $this->db->insert($tabela, $parametros);
   return array(
    'tipo' => 'alert alert-success',
    'msg' => 'usuário registrado com sucesso!'
   );
  }
 }

 // Select + Where

 function selec_dado($tabela, $id)
 {
  return $this->db->get_where($tabela, array(
   'user_id' => $id
  ))->row_array();
 }

 // Select All

 function selec_dados($tabela)
 {
  $this->db->order_by('id', 'asc');
  return $this->db->get($tabela)->result_array();
 }
}