<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_model extends CI_Model {

    public function index()
    {
        // Obter todas as pessoas cadastradas
        return $this->db->get("pessoas")->result_array(); 
    }

    public function inserir($cadastro) 
    {
        // Inserir dados no banco
        return $this->db->insert("pessoas", $cadastro);
    }
    
    // Trazendo o id passado na URL
    public function mostrar($id) 
    {
        
        return $this->db->get_where("pessoas", array("id" => $id))->row_array();
    }
    
    public function update($id, $cadastro)
    {
        $this->db->where("id", $id);
        return $this->db->update("pessoas", $cadastro);
        
       
    }
    
    public function apagar($id) 
    {
       $this->db->where("id", $id);
       return $this->db->delete("pessoas");
    }
}
