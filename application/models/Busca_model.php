<?php

class Busca_model extends CI_Model
{
    public function buscar($busca, $tipo, $data_inicio, $data_fim)
    {
      $this->db->like('nome', $busca);
      
      if(!empty($tipo))
      {
          $this->db->where('tipo', $tipo);
      }
        
      if(!empty($data_inicio))
      {
          $this->db->where('data_nascimento >=', $data_inicio );
      }
      
      if (!empty($data_fim)) {
            $this->db->where('data_nascimento <=', $data_fim);
      }

      
      
        return $this->db->get("pessoas")->result_array();
        
   
        
    }
}