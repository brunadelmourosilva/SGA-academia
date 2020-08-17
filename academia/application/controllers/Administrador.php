<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * 
 * @author 14296371614
 */
class Administrador extends CI_Controller{
    //put your code here
    
        public function entrar() {
        
        $login = $this->input->post('user');
        $senha = md5($this->input->post('password'));
        
        $this->db->where('email', $login);
        $this->db->where('senha', $senha);
        
        $result = $this->db->get('administrador');
        
        if($result->num_rows() == 1){
            $administrador = $result->row();
            $this->session->set_userdata('administrador', $administrador->nome);
            
            redirect('Cliente/index');
       }else{
           redirect("welcome");
       }
        
        
    }
}
