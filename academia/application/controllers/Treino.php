<?php

class Treino extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('administrador');
        if (empty($user)) {
            redirect('welcome');
        }
    }

    public function index($idContrato) {
        $crud = new Grocery_CRUD();
        $crud->set_table('treino');
        $crud->where('idContrato', $idContrato);
        $crud->set_subject('treino');
        //$idTeste = $this->uri->segment(1);
        
        $crud->field_type('idContrato', 'hidden', $idContrato);
        $crud->set_relation('idExercicio','exercicio','exercicio');
        
        
        $crud->display_as('idContrato', 'Contrato');
        $crud->display_as('data_inicio', 'Data de início');
        $crud->display_as('data_termino', 'Data de término');
        $crud->display_as('idExercicio', 'Exercício');
        $crud->display_as('serie', 'Nº repetições');
        $crud->display_as('historico', 'Exercício ativo?');
        
        $crud->add_fields('idExercicio','serie','peso','historico','idContrato');

        $output = $crud->render();
        $this->load->view("dash.php", $output);
    }

}

?>