<?php
class Alt_senha_model extends CI_Model

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

  if ($dados['senha'] != $parametros['senha_a'])
  {
    return array(
     'tipo' => 'alert alert-danger',
     'msg' => 'Erro senha atual invalida!'
    );
   }
  else
  {
    unset($parametros['senha_a']);
   $this->db->where('id', $id);
   $this->db->update($tabela, $parametros);
   return array(
    'tipo' => 'alert alert-success',
    'msg' => 'Dados do usuário alterados com sucesso!'
   );
  }
 }
}