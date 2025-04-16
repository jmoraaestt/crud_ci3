<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas_cadastradas extends CI_Controller {

	public function index()
	{

		// Chamando a Model 
		$this->load->model("Cadastro_model");
		$data["pessoas_cadastradas"] = $this->Cadastro_model->index(); 
		$data["title"] = "Pessoas Cadastradas - CodeIgniter";


		$this->load->view('pages/dashboard', $data);
	}
}
