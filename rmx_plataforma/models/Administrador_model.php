<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_TarifaEdit($id_tarifa)
    {
        $this->db->from('catalogo_cotizador');
        $this->db->where('id_catalogo', $id_tarifa);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function get_tarifasAjax()
    {
        $this->db->from('getTarifas_destinos');

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }else
        {
            return FALSE;
        }
    }

    public function insertTarifa($data)
    {
        $this->db->insert('catalogo_cotizador', $data);
    }

    public function update_Tarifa($data, $id_catalogo)
    {
        $this->db->where('id_catalogo', $id_catalogo);
        $this->db->update('catalogo_cotizador', $data);
    }

    public function get_destinos()
    {
        $this->db->from('destinos_cotizador');
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query;
        }else
        {
            return FALSE;
        }
    }

    public function get_destinosAjax()
    {
        $this->db->from('destinos_cotizador');
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }else
        {
            return FALSE;
        }
    }

    public function insertDestino($data)
    {
        $this->db->insert('destinos_cotizador', $data);
    }

    public function update_Destinos($data, $id_destino)
    {
        $this->db->where('id_destino', $id_destino);
        $this->db->update('destinos_cotizador', $data);
    }

    public function get_cotCotizador()
    {
        $this->db->from('cotizador');
        $this->db->where('activo', 1);
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    }

    public function getDetalleCotizador($id_cotizador)
    {
        $this->db->from('cotizador');
        $this->db->where('id_cotizador', $id_cotizador);
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    }

    public function update_cotizador($data, $id_cotizador)
    {
        $this->db->where('id_cotizador', $id_cotizador);
        $this->db->update('cotizador', $data);
    }

    public function get_ultimoTipoCambio()
    {
        $this->db->from('tipo_cambio');
        $this->db->where('activo', 1);
        $this->db->order_by('id_tipo_c','desc');
        $this->db->limit(1);
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return false;
        } 
    }

    public function updateTipoCambio($id_tipoC, $dataUpdate)
    {
        $this->db->where('id_tipo_c', $id_tipoC);
        $this->db->update('tipo_cambio', $dataUpdate);
    }

    public function InsertTipoCambio($data)
    {
        $this->db->insert('tipo_cambio', $data);
    }
    
    //obtiene la version del sistema para el versionado de los archivos
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

    // estatus de mantenimiento
    public function get_status_C()
    {
        $this->db->from('controladores');
        $this->db->where('nombre_controlador', 'Clientes');
        
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return false;
        } 
    }
}