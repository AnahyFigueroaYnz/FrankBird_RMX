<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus_model extends CI_Model {

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

    public function insert_usuarios($data)
    {
        $this->db->insert('usuarios',$data);
        //echo $this->db->last_query();
    }
    
    public function get_ladas()
    {
        $this->db->from('ladas');

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query;
        }else
        {
            return FALSE;
        }
    }
    public function get_tipo_cambio()
    {
        $this->db->from('get_tipo_cambio');

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
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

    public function update_tyc($data, $id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuarios', $data);
    }

    public function get_Destinos($id_origen)
    {
        $this->db->select('id_destino, destino');
        $this->db->from('destinos_cotizador');
        $this->db->where_in('id_destino', $id_origen);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }else
        {
            return FALSE;
        }
    }

    public function get_tarifas($tipo_envio, $movimiento)
    {
        $this->db->from('catalogo_cotizador');
        $this->db->where('tipo',$tipo_envio);
        $this->db->where('movimiento', $movimiento);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }else
        {
            return FALSE;
        }
    }

    public function get_tarifasWhere($id_origen, $tipo)
    {
        $this->db->from('catalogo_cotizador');
        $this->db->where('id_origen',$id_origen);
        $this->db->where('tipo',$tipo);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }else
        {
            return FALSE;
        }
    }

    public function get_AlldatosTarifa($id_origen,$id_destino)
    {
        $this->db->from('catalogo_cotizador');
        $this->db->where_in('id_origen', $id_origen);
        $this->db->where_in('id_destino', $id_destino);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function get_folioCotizador()
    {
        $this->db->from('cotizador');
        $this->db->order_by('id_cotizador', 'DESC');
        $this->db->LIMIT('1');

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function InsertCotizador($data)
    {
        $this->db->insert('cotizador',$data);
    }

    public function consultaIdCotizador($fecha_creacion, $folio)
    {
        $this->db->from('cotizador');
        $this->db->where('fecha_creacion', $fecha_creacion);
        $this->db->where('folio', $folio);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function updateEmail($dataUp, $id_cotizador)
    {
        $this->db->where('id_cotizador',$id_cotizador);
        $this->db->update('cotizador',$dataUp);
    }
}
?>