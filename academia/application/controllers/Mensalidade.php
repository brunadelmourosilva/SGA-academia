<?php

class Mensalidade extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('administrador');
        if (empty($user)){
            redirect('welcome');
        }
    }

    public function index($idContrato) {
        $crud = new Grocery_CRUD();
        $crud->set_table('mensalidade');
        $crud->where('idContrato',$idContrato);
        $crud->set_subject('mensalidade');

        //$crud->set_relation('idContrato', 'contrato', 'idContrato');
        
        $crud->unset_columns(array('idContrato'));
        $crud->unset_clone();
        $crud->unset_read();
        $crud->unset_add();
        
        $crud->display_as('dt_pagamento','Data do pagamento');
        $crud->display_as('dt_vencimento','Data do vencimento');

        $image = base_url('assets/grocery_crud/themes/flexigrid/css/images/success.png');
        $link = base_url('index.php/Mensalidade/baixaMensalidade/');
        $crud->add_action('Baixa na Mensalidade', $image, $link, '');
        
        $crud->callback_after_insert(array($this, 'insereDados'));

        $output = $crud->render();
        $this->load->view("dash.php", $output);
    }

    function insereDados($post, $idMensalidade){
        $dados = array ('pago' => 'Não');
        $this->db->where('idMensalidade',$idMensalidade);
        $this->db->update('mensalidade',$dados);
        
    }
            
    function baixaMensalidade($idMensalidade) {
        //Criar uma função para dar baixa na mensalidade, atualizando o pago para sim e a data para o dia atual
        $this->db->select('idContrato');
        $this->db->from('mensalidade');
        $this->db->where('idMensalidade =', $idMensalidade);
        $query = $this->db->get();
        
        foreach ($query->result() as $contrato) {
            $idContrato = $contrato->idContrato;
        }
        
        $data = array(
            'dt_pagamento' => date('Y-m-d'),
            'pago' => 'Sim'
        );
        $this->db->where('idMensalidade', $idMensalidade);
        $this->db->update('mensalidade', $data);

        redirect('/Mensalidade/index/' . $idContrato, 'refresh');
    }

}
?>

