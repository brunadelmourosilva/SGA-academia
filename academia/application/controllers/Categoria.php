<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author 14296371614
 */
class Categoria extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('administrador');
        if (empty($user)){
            redirect('welcome');
        }
    }

    public function index() {
        $crud = new Grocery_CRUD();
        $crud->set_table('categoria');
        $crud->set_subject('categoria');




        $crud->required_fields('categoria');

        $output = $crud->render();
        $this->load->view("dash.php", $output);
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Categoria</title>
    <body>


    </body>
</html>