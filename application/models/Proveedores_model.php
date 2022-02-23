<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proveedores_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    /* Funcion para obtener las ladas de los telefonos */
    public function Data_ladas()
    {
        $this->db->from('ladas');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    /* Funcion para obtener las medidad para las cantidades */
    public function Data_medidas()
    {
        $this->db->from('tpo_medidas');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener los proveedores del usuario */
    public function Data_Proveedores($id_usuario)
    {
        $this->db->from('vw_get_proveedores');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('proveedor', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
}
