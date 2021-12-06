<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_version()
    {
        $this->db->select_max('version');
        $this->db->from('versiones_js');
        $this->db->where('activo', 1);
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return false;
        } 
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

    function usuarioNoExistente($data)
    {
        $this->db->from('usuarios');
        $this->db->where('email',$data['email']);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }        
    }

    function get_user($email)
    {
        $this->db->from('usuarios');
        $this->db->where('activo',1);
        $this->db->where('email',$email);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return false;
        }    
    }

    public function get_password($email)
    {
        $this->db->select('contrasena');
        $this->db->from('usuarios');
        $this->db->where('email',$email);
        $this->db->where('activo',1);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 

    }
    
    public function get_status_C()
    {
        $this->db->from('controladores');
        $this->db->where('nombre_controlador', 'Home');
        
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return false;
        } 
    }

    public function updateEmail($dataUp, $id_cotizador)
    {
        $this->db->where('id_cotizador',$id_cotizador);
        $this->db->update('cotizador',$dataUp);
    }
}
?>