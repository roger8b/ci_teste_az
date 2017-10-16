<?php
class Sel_grupo_model extends CI_Model

{
 function __construct()
 {
  parent::__construct();
 }

 // Select All

 function selec_dados($tabela)
 {
  $this->db->order_by('id', 'asc');
  return $this->db->get($tabela)->result_array();
 }
}
