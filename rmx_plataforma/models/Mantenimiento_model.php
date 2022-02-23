<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento_model extends CI_Model {
    

    function __construct()
    {
        parent::__construct();
    }
    
    public function update_last($id_version,$data_cambio)
    {
        $this->db->where('id_version',$id_version);
        $this->db->update('versiones_js',$data_cambio);
    }

    public function get_controladores()
    {
        $this->db->from('controladores');
        
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    }

    public function get_estatus()
    {
        $this->db->from('controladores');
        
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }else{
            return false;
        } 
    }

    public function insert_nueva_version($data)
    {
        $this->db->insert('versiones_js',$data);
    }

    public function get_last_activ()
    {
        $this->db->select_max('id_version');
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

    public function update_controlador($data, $id_controlador)
    {
        $this->db->where('id_controlador',$id_controlador);
        $this->db->update('controladores',$data);
    }

    public function get_last_id_bit($tabla, $tipo_accion, $id_proyecto)
    {
        $this->db->select_max('id_bit');
        $this->db->from('bitacora');
        $this->db->where('tabla', $tabla);
        $this->db->where('tipo_accion', $tipo_accion);
        $this->db->where('id_tabla', $id_proyecto);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return false;
        } 
    }

    public function Update_bit($id_bit, $data_up)
    {
        $this->db->where('id_bit',$id_bit);
        $this->db->update('bitacora',$data_up);
    }

    public function last_tabla($tabla, $id_name)
    {
        $this->db->select_max($id_name);
        $this->db->from($tabla);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return false;
        }
    }        
}
