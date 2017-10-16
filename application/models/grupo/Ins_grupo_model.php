
<?php
class Ins_grupo_model extends CI_Model

{
 function __construct()
 {
  parent::__construct();
 }

 // Insert

 function add_dados($tabela, $parametros)
 {

  // Verifica email / cpf / crm já esta cadastrado no banco.

  if ($this->db->get_where($tabela, array(
   'nome' => $parametros['nome']
  ))->row_array())
  {
   return array(
    'tipo' => 'alert alert-danger',
    'msg' => 'Já existe um grupo com este nome!'
   );
  }
  else
  {
   $this->db->insert($tabela, $parametros);
   return array(
    'tipo' => 'alert alert-success',
    'msg' => 'Grupo registrado com sucesso!'
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


