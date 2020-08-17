<?php

class Anamnese extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('administrador');
        if (empty($user)){
            redirect('welcome');
        }
    }
    public function index($idCliente) {

        $crud = new Grocery_CRUD();
        $crud->set_table('anamnese');
        $crud->set_subject('ficha');
        $crud->where('idCliente =', $idCliente);

        $crud->unset_columns(array('idCliente'));
        $crud->field_type('idCliente', 'hidden', $idCliente);
        $crud->field_type('imc', 'hidden');
        $crud->field_type('status', 'hidden');
        $crud->field_type('data', 'hidden');
       

        $crud->unset_columns(array('pressao'));
        $crud->unset_columns(array('fumante'));
        $crud->unset_columns(array('diabete'));
        $crud->unset_columns(array('cardiaco'));
        $crud->unset_columns(array('colesterol'));
        $crud->unset_columns(array('lesao'));
        $crud->unset_columns(array('medicamento'));
        $crud->unset_columns(array('dataExame'));
        $crud->unset_columns(array('suplemento'));
        $crud->unset_columns(array('atividadeFisica'));



        $crud->display_as('idCliente', 'Cliente');
        
        $crud->display_as('altura', 'Altura(cm)');
        $crud->display_as('peso', 'Peso(Kg)');
        $crud->display_as('pressao', 'Possui pressão');
        $crud->display_as('fumante', 'Você fuma');
        $crud->display_as('diabete', 'Possui diabete');
        $crud->display_as('cardiaco', 'Possui algum problema cardíaco');
        $crud->display_as('colesterol', 'Possui colesterol');
        $crud->display_as('lesao', 'Possui alguma lesão');
        $crud->display_as('medicamento', 'Toma algum medicamento controlado');
        $crud->display_as('dataExame', 'Data do último exame físico:');
        $crud->display_as('suplemento', 'Toma algum suplemento');
        $crud->display_as('atividadeFisica', 'Pratica alguma atividade física fora a academia');

        $crud->callback_after_insert(array($this, 'insereDados'));

        $output = $crud->render();
        $this->load->view("dash.php", $output);
    }

    function insereDados($post, $idAnamnese) {
        $this->db->select('*');
        $this->db->from("anamnese");
        $this->db->where('idAnamnese =', $idAnamnese);
        $query = $this->db->get();
        //$vImc = $query->num_rows();
        
        $dataAtual = date("Y-m-d");

        //calculo IMC
        foreach ($query->result() as $imc) {
            $peso = $imc->peso;
            $h2 = $imc->altura * $imc->altura;
            $vImc = ($peso / $h2) * 10000;
        }
        

        //condição para status IMC
        if ($vImc < 18.5) {
            $magreza = array(
                'status' => "MAGREZA"
            );
            $this->db->where('idAnamnese', $idAnamnese);
            $this->db->update('anamnese', $magreza);
        
        } elseif ($vImc > 18.5 && $vImc < 24.9) {
            $normal = array(
                'status' => "NORMAL"
            );
            $this->db->where('idAnamnese', $idAnamnese);
            $this->db->update('anamnese', $normal);
            
        }elseif ($vImc > 25.0 && $vImc < 29.9) {
             $sobrepeso = array(
                'status' => "SOBREPESO"
            );
            $this->db->where('idAnamnese', $idAnamnese);
            $this->db->update('anamnese', $sobrepeso);
        }elseif ($vImc > 30.0 && $vImc < 39.9) {
            $obesidade = array(
                'status' => "OBESIDADE"
            );
            $this->db->where('idAnamnese', $idAnamnese);
            $this->db->update('anamnese', $obesidade);
        }else{
            $obesidadeGrave = array(
                'status' => "OBESIDADE GRAVE"
            );
            $this->db->where('idAnamnese', $idAnamnese);
            $this->db->update('anamnese', $obesidadeGrave);
        }
        
        
        //armazena vetor imc
        $dados = array(
            'imc' => $vImc,
            'data'=>$dataAtual
        );

        $this->db->where('idAnamnese', $idAnamnese);
        //$this->db->where('idAnamnese', '9');
        $this->db->update('anamnese', $dados);
    }

}
