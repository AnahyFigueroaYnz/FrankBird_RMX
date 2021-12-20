<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

     // funcion para tener la cantidad de los proyectos
    public function noProyectos($id)
    {
        $this->db->from('noProyectos_platform');
        $this->db->where('id_cliente', $id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    // funcion para tener la cantidad de los agencias
    public function noAgencias($id)
    {
        $this->db->select('COUNT(*) AS NoAgencias');
        $this->db->from('agencias_aduanales');
        $this->db->where('id_usuario', $id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    // funcion para tener la cantidad de los proveedores
    public function noProveedores($id)
    {
        $this->db->select('COUNT(*) AS NoProveedores');
        $this->db->from('proveedores');
        $this->db->where('id_usuario', $id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    // funcion para tener las ultimas cotizaciones
    public function lastCotizaciones($id)
    {
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('proyecto', 'proyecto.id_proyecto = cotizaciones.id_proyecto', 'left');
        $this->db->where('id_asesor', $id);
        $this->db->order_by('id_cotizacion', 'DESC');
        $this->db->LIMIT(5);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    // funcion para tener los ultimos proyectos
    public function lastProyectos()
    {
        $this->db->from('proyecto');
        $this->db->where('activo', 1);
        $this->db->order_by('id_proyecto', 'DESC');
        $this->db->LIMIT(4);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    // funcion para tener ultimos productos cotizados
    public function lastProductos()
    {
        $this->db->from('producto_cotizacion');
        $this->db->join('proveedores', 'proveedores.id_proveedor = producto_cotizacion.id_proveedor', 'left');
        $this->db->order_by('id_producto_cot', 'DESC');
        $this->db->LIMIT(4);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    // funcion para tener los proyectos del asesor en sourcing dentro de 24 hrs
    public function sourcingMisProy($id_usuario)
    {
        $this->db->from('sourcingMisProy_asesor');
        $this->db->where('id_asesor', $id_usuario);
        $this->db->order_by('folio', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    // funcion para tener las ganacias al estar el proyecto en anticipo pagado
    public function ganancias($id_usuario)
    {
        $this->db->from('ganancias');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    // funcion para tener los pendientes/tasks 
    public function pendientesTasks($id_usuario)
    {
        $this->db->from('task_dashboard');
        $this->db->where('activo', 1);
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('id_task_dash', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function get_version()
    {
        $this->db->select_max('version');
        $this->db->from('versiones_js');
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    // 
    public function get_status_C()
    {
        $this->db->from('controladores');
        $this->db->where('nombre_controlador', 'Plataforma');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
}