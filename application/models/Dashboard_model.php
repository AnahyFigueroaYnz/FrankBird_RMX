<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /* Funcion para tener la cantidad de los proyectos */
    public function AvanceProyectos($id_usuario)
    {
        $query = $this->db->query('call sp_proyectos(' . $id_usuario . ');');

        $data   = array();

        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener los pendientes/tasks  */
    public function Data_Tareas($id_usuario)
    {
        $this->db->from('vw_get_tareas');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('id_tasks', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener las ganacias al estar el proyecto en anticipo pagado */
    public function Data_Ganancias($id_usuario)
    {
        $this->db->from('vw_ganacias');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener la cantidad de los agencias */
    public function Data_AgenciasAd($id_usuario)
    {
        $this->db->from('vw_no_agencias');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();;
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener la cantidad de los proyectos */
    public function Data_Proyectos($id_usuario)
    {
        $this->db->from('vw_no_proyectos');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();;
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener la cantidad de los productos */
    public function Data_Productos($id_usuario)
    {
        $this->db->from('vw_no_productos');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener la cantidad de los proveedores */
    public function Data_Proveedores($id_usuario)
    {
        $this->db->from('vw_no_proveedores');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener los ultimos proyectos */
    public function Data_Ultimos_Proyectos($id_usuario)
    {
        $this->db->from('vw_ultimos_proyectos');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('id_proyecto', 'DESC');
        $this->db->LIMIT(4);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener ultimos productos cotizados */
    public function Data_Ultimos_Productos($id_usuario)
    {
        $this->db->from('vw_ultimos_productos');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('id_producto', 'DESC');
        $this->db->LIMIT(4);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener las ultimas cotizaciones */
    public function Data_Ultimas_Cotizaciones($id_usuario)
    {
        $this->db->from('vw_ultimas_cotizaciones');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('id_cotizacion', 'DESC');
        $this->db->LIMIT(4);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener las ultimas cotizaciones */
    public function Data_Proyectos_Transito($id_usuario)
    {
        $this->db->from('vw_proyectos_transito');
        $this->db->where('id_usuario', $id_usuario);
        // $this->db->order_by('id_cotizacion', 'DESC');
        $this->db->LIMIT(4);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /* Funcion para tener los proyectos del asesor en sourcing dentro de 24 hrs */
    public function Data_24Sourcing($id_usuario)
    {
        $this->db->from('vw_24Sourcing');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('folio', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /* Funcion para obtener la informacion del tareas */
    public function taskList($id_usuario)
    {
        $this->db->from('task_dashboard');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('activo', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    /* Funcion para obtener el identificador de la ultima tarea */
    public function taskData($id_usuario)
    {
        $this->db->select('id_task_dash');
        $this->db->from('task_dashboard');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('id_task_dash', 'DESC');
        $this->db->LIMIT(1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    /* Funcion para insertar una nueva tareas */
    public function taskAdd($data)
    {
        $this->db->insert('task_dashboard', $data);
    }

    /* Funcion para actulizar la informacion de la tareas */
    public function taskUpdate($data, $id_task_dash)
    {
        $this->db->where('id_task_dash', $id_task_dash);
        $this->db->update('task_dashboard', $data);
    }
}
