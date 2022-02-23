<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /* Funcion para la informacion del usuario para autenticarlo */
    function authenticator($data)
    {
        $this->db->from('usuarios');
        $this->db->where('activo', 1);
        $this->db->where('email', $data['usuario']);
        $this->db->where('contrasena', $data['password']);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
    /* Funcion para obtener los datos del usuario con el correo */
    function get_user($email)
    {
        $this->db->from('usuarios');
        $this->db->where('activo', 1);
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
}
