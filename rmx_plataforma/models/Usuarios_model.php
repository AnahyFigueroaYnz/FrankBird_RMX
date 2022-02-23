<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    

    function __construct()
    {
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

    public function get_usuarios()
    {
        $this->db->select('usuarios.*, ladas.abrev, niveles_usuarios.tipo');
        $this->db->from('usuarios');
        $this->db->join('ladas', 'ladas.id_lada = usuarios.id_lada', 'left');
        $this->db->join('niveles_usuarios', 'niveles_usuarios.id_nivelusuario = usuarios.id_nivelusuario');
        $this->db->where('usuarios.id_nivelusuario <', 4);
        $this->db->where('usuarios.activo', 1);
        


        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function get_niveles()
    {

        $this->db->from('niveles_usuarios');
        $this->db->where('id_nivelusuario <>',5);

         $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }

    public function insert_usuarios($data)
    {
        $this->db->insert('usuarios',$data);
    }

    public function get_usuarios_by_id($id_usuario)
    {

        $this->db->select('id_usuario, email, nombre, contrasena, usuarios.id_nivelusuario, niveles_usuarios.tipo');
        $this->db->from('usuarios');
        $this->db->join('niveles_usuarios','usuarios.id_nivelusuario = niveles_usuarios.id_nivelusuario');
        $this->db->where('usuarios.activo',1);
        $this->db->where('usuarios.id_usuario',$id_usuario); 
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function update_usuarios($data,$id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->update('usuarios',$data);
    }

    public function delete_usuarios($id_usuarios)
    {
        $this->db->set('activo', 0);
        $this->db->where('id_usuario',$id_usuarios);
        $this->db->update('usuarios');
    }

    public function get_status_C()
    {
        $this->db->from('controladores');
        $this->db->where('nombre_controlador', 'Usuarios');
        
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
}
