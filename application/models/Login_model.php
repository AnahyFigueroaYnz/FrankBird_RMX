<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function auntenticar($data)
    {
        $this->db->from('usuarios');
        $this->db->where('activo',1);
        $this->db->where('email',$data['usuario']);
        $this->db->where('contrasena',$data['password']);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }        
    }
}
?>