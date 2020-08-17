<?php

class Contrato extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('administrador');
        if (empty($user)){
            redirect('welcome');
        }
    }

    //put your code here

    public function index($idCliente) {

        $crud = new Grocery_CRUD();
        $crud->set_table('contrato');
        $crud->where('idCliente', $idCliente);
        $crud->set_subject('contrato');

        $crud->set_relation('idPlanos', 'planos', 'plano');
        //$crud->set_relation('idCliente', 'cliente', 'nome', 'idCliente =' . $idCliente);

        $img_consulta = base_url('imagens/muscular.png');
        $crud->add_action('Treino', $img_consulta, "Treino/index");

        $crud->field_type('idCliente', 'hidden', $idCliente);

        $crud->unset_clone();
        $crud->unset_delete();

        $crud->columns('data', 'idPlanos', 'ativo');

        $crud->display_as('idCliente', 'Nome');
        $crud->display_as('idPlanos', 'Plano');
        $crud->display_as('diaPagamento', 'Dia de vencimento');

        $crud->callback_after_insert(array($this, insereDados));
        $crud->callback_after_update(array($this, zeraMensalidades2));

        $img_consulta = base_url('imagens/money.png');
        $crud->add_action('Mensalidade', $img_consulta, "Mensalidade/index");

        $output = $crud->render();
        $this->load->view("dash.php", $output);
    }

    function insereDados($post, $idContrato) {
        $this->db->select('planos.valor, contrato.data');
        $this->db->from('contrato, planos');
        $this->db->where('contrato.idPlanos = planos.idPlanos AND contrato.idContrato =', $idContrato);
        $query = $this->db->get();

        foreach ($query->result() as $linha) {
            $valor = $linha->valor;
            $data = $linha->data;
        }

        $data1 = $post['data'];
        $arr = explode('/', $data1);
        $dia1 = $post['diaPagamento'];
        $mes1 = $arr[1];
        $ano1 = $arr[2];
        $vencimento = $ano1 . '-' . $mes1 . '-' . $dia1;
        $mensalidade = date('Y-m-d', strtotime('+1 month', strtotime($vencimento)));

        for ($x = 1; $x < 6; $x++) {
            $dados = array(
                'idMensalidade' => null,
                'dt_vencimento' => $mensalidade,
                'dt_pagamento' => null,
                'pago' => 'Não',
                'valor' => $valor,
                'idContrato' => $idContrato
            );
            $this->db->insert('mensalidade', $dados);
            $mensalidade = date('Y-m-d', strtotime('+1 month', strtotime($mensalidade)));
        }
    }

    function retornaMeses($dataInicio, $dataFim) {
        $data1 = $dataInicio;
        $arr = explode('-', $data1);
        $data2 = $dataFim;
        $arr2 = explode('-', $data2);
        $dia1 = $arr[2];
        $mes1 = $arr[1];
        $ano1 = $arr[0];

        $dia2 = $arr2[2];
        $mes2 = $arr2[1];
        $ano2 = $arr2[0];

        $a1 = ($ano2 - $ano1) * 12;
        $m1 = ($mes2 - $mes1) + 1;
        $m3 = ($m1 + $a1);
        return $m3;
    }

    function zeraMensalidades($post, $idContrato) {
        // Implementar um código para excluir mensalidade não pagas após o encerramento do contrato
//        $this->db->select('c.ativo,m.pago');
//        $this->db->from('contrato as c, mensalidade as m');
//        $this->db->where(' c.idContrato = m.idContrato AND  c.idContrato =', $idContrato);
//        $query = $this->db->get();
//
//        foreach ($query->result() as $linha) {
//            $contrato = $linha->ativo;
//            $mensalidade = $linha->pago;
//        }
//
//        if ($contrato == 'Não') {
//            if ($mensalidade == 'Não') {
//                // $sql = ('delete from mensalidade where mensalidade.idMensalidade =', $idMensalidade);
//                // 
//                //$this->db->delete('mensalidade');//??? dúvida de sintaxe
//                //$this->db->where('mensalidade.idMensalidade = ',$idMensalidade);
//
//                $dados = array(
//                    'ativo' => $contrato,
//                    'pago' => $mensalidade,
//                    'idContrato' => $idContrato
//                        //'idMensalidade' => $idMensalidade
//                );
//
//                $this->db->where('idContrato', $idContrato);
//                $this->db->update('contrato', $dados);
//            }
//        }
    }
    
    function zeraMensalidades2($post, $idContrato) {
        if ($post['ativo'] == 'Não') {
            $dataAtual = date("Y-m-d");
            $this->db->where('idContrato =', $idContrato);
            $this->db->where('dt_vencimento >', $dataAtual);
            $this->db->where('pago like "Não"');
            $this->db->delete('mensalidade');
        }
    }

}
