<?php
class Alt_user_model extends CI_Model

{
 function __construct()
 {
  parent::__construct();
 }

 // Select + Where

 function selec_dado($tabela, $id)
 {
  return $this->db->get_where($tabela, array(
   'id' => $id
  ))->row_array();
 }

 // Select All

 function selec_dados($tabela)
 {
  $this->db->order_by('id', 'asc');
  return $this->db->get($tabela)->result_array();
 }

 // Update

 function update_dados($tabela, $id, $parametros)
 {
  $dados = $this->db->get_where($tabela, array(
   'id' => $id
  ))->row_array();


  if ($dados['email'] != $parametros['email'])
  {
   if ($this->db->get_where($tabela, array(
    'email' => $parametros['email']
   ))->row_array())
   {
    return array(
     'tipo' => 'alert alert-danger',
     'msg' => 'Já existe um usuário com este email!'
    );
   }
  }

  if ($dados['cpf'] != $parametros['cpf'])
  {
   if ($this->db->get_where($tabela, array(
    'cpf' => $parametros['cpf']
   ))->row_array())
   {
    return array(
     'tipo' => 'alert alert-danger',
     'msg' => 'Já existe um usuário com este CPF!'
    );
   }
  }

  if ($dados['crm'] != $parametros['crm'])
  {
   if ($this->db->get_where($tabela, array(
    'crm' => $parametros['crm']
   ))->row_array())
   {
    return array(
     'tipo' => 'alert alert-danger',
     'msg' => 'Já existe um usuário com este CRM!'
    );
   }
  }
  else
  {
   $this->db->where('id', $id);
   $this->db->update($tabela, $parametros);
   return array(
    'tipo' => 'alert alert-success',
    'msg' => 'Dados do usuário alterados com sucesso!'
   );
  }
 }
}