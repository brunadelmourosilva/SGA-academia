<?php

class Cliente extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('administrador');
        if (empty($user)){
            redirect('welcome');
        }
    }

    public function index() {

        $crud = new Grocery_CRUD();
        $crud->set_table('cliente');
        $crud->set_subject('cliente');

        $crud->display_as('idCliente', 'Cliente');
        $crud->display_as('nome', 'Nome');
        $crud->display_as('dt_nascimento', 'Data de Nascimento');
        $crud->display_as('telefone', 'Telefone');
        $crud->display_as('observacoes', 'Observações');
        $crud->display_as('cpf', 'CPF');
        $crud->display_as('email', 'E-mail');
        $crud->display_as('treinamento', 'Treinamento');
        $crud->display_as('idPlanos', 'Plano');
        $crud->display_as('idObjetivo', 'Objetivo');
        
        $crud->unset_read();
        $crud->unset_clone();
        
        $crud->required_fields('nome', 'dt_nascimento', 'telefone', 'observcoes', 'cpf', 'email', 'treinamento', 'idPlanos');

        $crud->set_relation('idObjetivo', 'objetivo', 'objetivo');

        $img_consulta = base_url('imagens/carne.png');
        $crud->add_action('Contrato', $img_consulta, "Contrato/index", 'int $cont = idCliente');

        $img_consulta = base_url('imagens/user.png');
        $crud->add_action('Anamnese', $img_consulta, "Anamnese/index", 'int $cont = idCliente');


        $output = $crud->render();
        $this->load->view("dash.php", $output);
    }

}
?>