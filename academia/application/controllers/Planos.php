<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Planos
 *
 * @author 14296371614
 */
class Planos extends CI_Controller {
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
        $crud->set_table('planos');
        $crud->set_subject('planos');



        $crud->display_as('idPlanos', 'Planos');

        $crud->required_fields('plano', 'valor');

        //$crud->set_relation('idCategoria', 'categoria', 'categoria');


        $output = $crud->render();
        $this->load->view("dash.php", $output);
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Planos</title>
<body>
 

</body>
</html>
