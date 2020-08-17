<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exercicio
 *
 * @author 14296371614
 */
class Exercicio extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('administrador');
        if (empty($user)){
            redirect('welcome');
        }
    }
    //put your code here
    
        public function index() {
        $crud = new Grocery_CRUD();
        $crud->set_table('exercicio');
        $crud->set_subject('exercicio');

        
         
        $crud->display_as('idCategoria', 'Categoria');
        $crud->display_as('exercicio', 'Exercício');


        $crud->required_fields('exercicio', 'idCategoria');
        $crud->set_relation('idCategoria', 'categoria', 'categoria');

        $output = $crud->render();
        $this->load->view("dash.php", $output);
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exercicio</title>
<body>
 

</body>
</html>