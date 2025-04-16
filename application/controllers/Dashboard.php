<?php
class Dashboard extends CI_Controller {

	public function __construct() // Primeiro método a ser executado
	{
		parent:: __construct();

		$this->load->model("Cadastro_model");
	}

	public function index()
	{

		$data["pessoas_cadastradas"] = $this->Cadastro_model->index(); 
		$data["title"] = "Dashboard - CodeIgniter";
		
		$this->load->view('pages/Dashboard', $data);
                
		
	}
        

	public function new()
        {      
        $this->load->view('pages/form-pessoas');
        
        }
        
	public function inserir() 
	{
		$cadastro = array(
                'nome' => $this->input->post('nome'),
                'tipo' => $this->input->post('tipo'),
                'cpf' => $this->input->post('cpf'),
                'data_nascimento' => $this->input->post('data_nascimento'),
                'endereco' => $this->input->post('endereco'),
                'bairro' => $this->input->post('bairro'),
                'cep' => $this->input->post('cep'),
                'estado' => $this->input->post('estado'),
                'cidade' => $this->input->post('cidade'),
                'telefone' => $this->input->post('telefone'),
                'celular' => $this->input->post('celular'),
                'inscricao_estadual' => $this->input->post('inscricao_estadual'),
                'observacao' => $this->input->post('observacao')
		);

		$this->Cadastro_model->inserir($cadastro);
                redirect('dashboard');
	}
        
        public function editar($id) 
        {
            $data["cadastro"] = $this->Cadastro_model->mostrar($id); 
            $data["title"] = "Editar - CodeIgniter";
            $this->load->view('pages/form-pessoas', $data);
     
            
        }
        
        public function update($id) 
        { 
         $cadastro = array(
                'nome' => $this->input->post('nome'),
                'tipo' => $this->input->post('tipo'),
                'cpf' => $this->input->post('cpf'),
                'data_nascimento' => $this->input->post('data_nascimento'),
                'endereco' => $this->input->post('endereco'),
                'bairro' => $this->input->post('bairro'),
                'cep' => $this->input->post('cep'),
                'estado' => $this->input->post('estado'),
                'cidade' => $this->input->post('cidade'),
                'telefone' => $this->input->post('telefone'),
                'celular' => $this->input->post('celular'),
                'inscricao_estadual' => $this->input->post('inscricao_estadual'),
                'observacao' => $this->input->post('observacao')
            );
           $this->Cadastro_model->update($id, $cadastro);
           redirect('dashboard');
        }
        
        
        public function delete($id) 
        {
          $this->Cadastro_model->apagar($id);
           redirect('dashboard');
        }
        
        public function pesquisar()
	{

            $this->load->model("Busca_model");
            
            $busca = $this->input->get('busca'); 
            $tipo = $this->input->get('tipo');
            $data_inicio = $this->input->get('data_inicio');
            $data_fim = $this->input->get('data_fim');
            
            $data['pessoas_cadastradas'] = $this->Busca_model->buscar($busca, $tipo, $data_inicio, $data_fim);
                
                         
            $this->load->view('pages/dashboard', $data);
	}
        
}
