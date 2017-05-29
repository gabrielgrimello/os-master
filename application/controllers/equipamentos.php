<?php

class Equipamentos extends CI_Controller {
    
    /**
     * author: Ramon Silva 
     * email: silva018-mg@yahoo.com.br
     * 
     */
    
    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('equipamentos_model','',TRUE);
            $this->data['menuEquipamentos'] = 'equipamentos';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vEquipamento')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar Equipamentos.');
           redirect(base_url());
        }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/equipamentos/gerenciar/';
        $config['total_rows'] = $this->equipamentos_model->count('equipamentos');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config); 	
        
	    $this->data['results'] = $this->equipamentos_model->get('equipamentos','idEquipamentos,tipoEquipamento,marca,modelo,serie,patrimonio,dataCadastro','',$config['per_page'],$this->uri->segment(3));
       	
       	$this->data['view'] = 'equipamentos/equipamentos';
       	$this->load->view('tema/topo',$this->data);
	  
       
		
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aEquipamento')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar Equipamentos.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('equipamentos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            
            $data = array(
                'tipoEquipamento' => $this->input->post('tipoEquipamento'),
                'marca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'serie' => $this->input->post('serie'),
                'patrimonio' => $this->input->post('patrimonio'),
                'dataCadastro' => date('Y-m-d')
            );

            if ($this->equipamentos_model->add('equipamentos', $data) == TRUE) {
                $this->session->set_flashdata('success','Equipamento adicionado com sucesso!');
                redirect(base_url() . 'index.php/equipamentos/adicionar/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'equipamentos/adicionarEquipamentos';
        $this->load->view('tema/topo', $this->data);

    }

    function editar() {

        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }


        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eEquipamento')){
           $this->session->set_flashdata('error','Você não tem permissão para editar Equipamentos.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('equipamentos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'tipoEquipamento' => $this->input->post('tipoEquipamento'),
                'marca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'serie' => $this->input->post('serie'),
                'patrimonio' => $this->input->post('patrimonio')
            );

            if ($this->equipamentos_model->edit('equipamentos', $data, 'idEquipamentos', $this->input->post('idEquipamentos')) == TRUE) {
                $this->session->set_flashdata('success','Equipamento editado com sucesso!');
                redirect(base_url() . 'index.php/equipamentos/editar/'.$this->input->post('idEquipamentos'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->equipamentos_model->getById($this->uri->segment(3));
        $this->data['view'] = 'equipamentos/editarEquipamentos';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar(){

        if(!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))){
            $this->session->set_flashdata('error','Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vEquipamento')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar Equipamentos.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->equipamentos_model->getById($this->uri->segment(3));
        $this->data['results'] = $this->equipamentos_model->getOsByCliente($this->uri->segment(3));
        $this->data['view'] = 'equipamentos/visualizar';
        $this->load->view('tema/topo', $this->data);

        
    }
	
    public function excluir(){

            
            if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dEquipamento')){
               $this->session->set_flashdata('error','Você não tem permissão para excluir Equipamentos.');
               redirect(base_url());
            }

            
            $id =  $this->input->post('id');
            if ($id == null){

                $this->session->set_flashdata('error','Erro ao tentar excluir Equipamento.');            
                redirect(base_url().'index.php/equipamentos/gerenciar/');
            }

            //$id = 2;
            // excluindo OSs vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $os = $this->db->get('os')->result();

            if($os != null){

                foreach ($os as $o) {
                    $this->db->where('os_id', $o->idOs);
                    $this->db->delete('servicos_os');

                    $this->db->where('os_id', $o->idOs);
                    $this->db->delete('produtos_os');


                    $this->db->where('idOs', $o->idOs);
                    $this->db->delete('os');
                }
            }

            // excluindo Vendas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $vendas = $this->db->get('vendas')->result();

            if($vendas != null){

                foreach ($vendas as $v) {
                    $this->db->where('vendas_id', $v->idVendas);
                    $this->db->delete('itens_de_vendas');


                    $this->db->where('idVendas', $v->idVendas);
                    $this->db->delete('vendas');
                }
            }

            //excluindo receitas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $this->db->delete('lancamentos');



            $this->clientes_model->delete('clientes','idClientes',$id); 

            $this->session->set_flashdata('success','Cliente excluido com sucesso!');            
            redirect(base_url().'index.php/clientes/gerenciar/');
    }
}

