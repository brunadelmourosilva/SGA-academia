<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Objetivo
 *
 * @author 14296371614
 */
class Objetivo extends CI_Controller{
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
        $crud->set_table('objetivo');
        $crud->set_subject('objetivo');
       
        $crud->required_fields('objetivo');

        $output = $crud->render();
        $this->load->view("dash.php", $output);
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Objetivo</title>
<body>
 

</body>
</html>
