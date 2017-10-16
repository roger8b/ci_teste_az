<?php
class Alt_grupo_model extends CI_Model

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
  if ($dados['nome'] != $parametros['nome'])
  {
   if ($this->db->get_where($tabela, array(
    'nome' => $parametros['nome']
   ))->row_array())
   {
    return array(
     'tipo' => 'alert alert-danger',
     'msg' => 'Já existe um grupo com este nome!'
    );
   }
  }
  else
  {
   $this->db->where('id', $id);
   $this->db->update($tabela, $parametros);
   return "Dados do grupo alterado com sucesso!";
  }
 }
}

