<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plataforma_model extends CI_Model
{

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
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    // funcion para obtener toda la informacion de los proyectos
    public function get_all_data_proyecto($id_proyecto)
    {
        $query = $this->db->query('call get_all_data_proyecto(' . $id_proyecto . ');');
        $data   = array();
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            $query->free_result();
            $query->next_result();
            return $data;
        } else {
            return FALSE;
        }
    }
    //funcion para obtener todos los proyectos en la vista del administrador
    public function get_allproyectos($id)
    {
        $this->db->select('*,
            (SELECT nombre from usuarios where id_usuario = proyecto.id_cliente) as Cliente,
            (SELECT nombre from usuarios where id_usuario = proyecto.id_asesor) as Asesor, 
            estados_proyectos.id_estadoproyectos');
        $this->db->from('proyecto');
        $this->db->join('usuarios', 'usuarios.id_usuario = proyecto.id_cliente');
        $this->db->join('estados_proyectos', 'estados_proyectos.id_estadoproyectos = proyecto.id_estadoproyectos');
        $this->db->where('proyecto.activo != 0');
        $this->db->where('proyecto.id_cliente', $id);
        $this->db->order_by('proyecto.id_proyecto', 'DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    //funcion para obtener todos los proyectos activos en la vista del administrador
    public function get_allactivos($id)
    {
        $this->db->select('*,
            (SELECT nombre from usuarios where id_usuario = proyecto.id_cliente) as Cliente,
            (SELECT nombre from usuarios where id_usuario = proyecto.id_asesor) as Asesor, 
            estados_proyectos.id_estadoproyectos');
        $this->db->from('proyecto');
        $this->db->join('usuarios', 'usuarios.id_usuario = proyecto.id_cliente');
        $this->db->join('estados_proyectos', 'estados_proyectos.id_estadoproyectos = proyecto.id_estadoproyectos');
        $this->db->where('proyecto.activo = 1 AND (proyecto.id_estadoproyectos >= 1 AND proyecto.id_estadoproyectos != 24)');
        $this->db->where('id_cliente', $id);
        $this->db->order_by('proyecto.id_proyecto', 'DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    //funcion para obtener todos los proyectos concluidos en la vista del administrador
    public function get_allconcluidos($id)
    {
        $this->db->select('*,
            (SELECT nombre from usuarios where id_usuario = proyecto.id_cliente) as Cliente,
            (SELECT nombre from usuarios where id_usuario = proyecto.id_asesor) as Asesor, 
            estados_proyectos.id_estadoproyectos');
        $this->db->from('proyecto');
        $this->db->join('usuarios', 'usuarios.id_usuario = proyecto.id_cliente', 'left');
        $this->db->join('estados_proyectos', 'estados_proyectos.id_estadoproyectos = proyecto.id_estadoproyectos', 'left');
        $this->db->where('id_cliente', $id);
        $this->db->where('proyecto.id_estadoproyectos = 24 AND proyecto.activo = 2');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    //funcion para obtener todos los proyectos eliminados en la vista del administrador
    public function get_alleliminados()
    {
        $this->db->select('*,
            (SELECT nombre from usuarios where id_usuario = proyecto.id_cliente) as Cliente,
            (SELECT nombre from usuarios where id_usuario = proyecto.id_asesor) as Asesor, 
            estados_proyectos.id_estadoproyectos');
        $this->db->from('proyecto');
        $this->db->join('usuarios', 'usuarios.id_usuario = proyecto.id_cliente', 'left');
        $this->db->join('estados_proyectos', 'estados_proyectos.id_estadoproyectos = proyecto.id_estadoproyectos', 'left');
        $this->db->where('proyecto.activo = 0');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    //funcion para modificar los datos del proyecto
    public function update_proyecto($data, $id_proyecto)
    {
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->update('proyecto', $data);
    }
    public function media_proyecto($id_proyecto)
    {
        $this->db->select('oemservice_path');
        $this->db->from('proyecto');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // 
    public function get_status()
    {
        $this->db->from('estados_proyectos');
        $this->db->where('activo', 1);

        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function get_data_usuario($id_usuario)
    {
        $this->db->select('usuarios.*, abrev, lada');
        $this->db->from('usuarios');
        $this->db->join('ladas', 'usuarios.id_lada = ladas.id_lada', 'left');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('usuarios.activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function get_ladas()
    {
        $this->db->from('ladas');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function update_perfil($data, $id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuarios', $data);
    }




    public function get_unidades()
    {
        $this->db->from('unidades_medida');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // 
    public function get_nombreProducto($id_producto)
    {
        $this->db->select('producto');
        $this->db->from('productos');
        $this->db->where('id_producto', $id_producto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function get_all_productos()
    {
        $this->db->select('productos.id_producto, producto, productos.fracc_arancelaria, productos.id_proveedor, proveedor');
        $this->db->from('productos');
        $this->db->join('proveedores', 'productos.id_proveedor = proveedores.id_proveedor');
        $this->db->where('productos.activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function update_producto($data, $id_producto)
    {
        $this->db->where('id_producto', $id_producto);
        $this->db->update('productos', $data);
    }
    public function insert_prod($data)
    {
        $this->db->insert('productos', $data);
    }
    public function ultimo_prod($id_proveedor)
    {
        $this->db->from('productos');
        $this->db->where('id_proveedor', $id_proveedor);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function media_producto_cp_prod($id_producto_c)
    {
        $this->db->from('productos_clientes');
        $this->db->where('id_producto_c', $id_producto_c);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function media_producto_sp_prod($id_producto_sp_c)
    {
        $this->db->from('productos_sp_clientes');
        $this->db->where('id_producto_sp_c', $id_producto_sp_c);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function media_producto_sp($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('productos_sp_clientes', 'productos_sp_clientes.id_proyecto = proyecto.id_proyecto', 'left');
        $this->db->where('proyecto.id_proyecto', $id_proyecto);
        $this->db->where('proyecto.activo', 1);

        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function media_invoice_prod($id_producto_c)
    {
        $this->db->from('proveedores_clientes');
        $this->db->join('productos_clientes', 'productos_clientes.id_proveedor_c = proveedores_clientes.id_proveedor_c', 'left');
        $this->db->where('productos_clientes.id_producto_c', $id_producto_c);
        $this->db->where('productos_clientes.activo', 1);

        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function media_invoice($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('proveedores_clientes', 'proveedores_clientes.id_proyecto = proyecto.id_proyecto', 'left');
        $this->db->join('productos_clientes', 'productos_clientes.id_proveedor_c = proveedores_clientes.id_proveedor_c', 'left');
        $this->db->where('proyecto.id_proyecto', $id_proyecto);
        $this->db->where('proyecto.activo', 1);

        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function get_productos_sp_c($id_proyecto)
    {
        $this->db->from('productos_sp_c');
        $this->db->where('productos_sp_c.id_proyecto', $id_proyecto);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    
    public function get_productos_c($id_proyecto)
    {
        $this->db->from('productos_cp_c');
        $this->db->where('id_proyecto', $id_proyecto);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function get_proyecto_edit($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('estados_proyectos', 'proyecto.id_estadoproyectos = estados_proyectos.id_estadoproyectos', 'left');
        $this->db->where('proyecto.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }



    public function get_detalle_agencias_aduanales($id_agencia)
    {
        $this->db->from('agencias_aduanales');
        $this->db->where('id_agencia', $id_agencia);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function insert_aa($data)
    {
        $this->db->insert('agencias_aduanales', $data);
    }
    public function update_aa($data, $id_agencia)
    {
        $this->db->where('id_agencia', $id_agencia);
        $this->db->update('agencias_aduanales', $data);
    }
    
    //funcion para cargar la lista de asesores y admin para asignar a un proyecto, vista del administrador
    public function get_asesores()
    {
        $this->db->select('id_usuario, nombre, us.id_nivelusuario, tipo');
        $this->db->from('usuarios us');
        $this->db->join('niveles_usuarios nivus', 'nivus.id_nivelusuario = us.id_nivelusuario');
        $this->db->where('us.activo', 1);
        $this->db->where('us.id_nivelusuario', 3);
        $this->db->or_where('us.id_nivelusuario', 2);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function get_datos_transporte($id_transporte)
    {
        $this->db->select('id_transporte, transporte, clave');
        $this->db->from('transporte');
        $this->db->where('id_transporte', $id_transporte);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function update_transporte($data, $id_transporte)
    {
        $this->db->where('id_transporte', $id_transporte);
        $this->db->update('transporte', $data);
    }
    public function get_puertos($id_agencia)
    {
        $this->db->from('transporte');
        $this->db->where('id_agencia ', $id_agencia);
        $this->db->where('activo ', 1);

        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // funcion para obtener los puertos de salida de asia
    public function puertos_salida()
    {
        $this->db->select('id_puerto, puerto, clave');
        $this->db->from('puertos');
        $this->db->where('id_agencia', 7);
        $this->db->order_by('puerto', 'asc');


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // funcion para obtener los puntos de llegada
    public function puertos_llegada()
    {
        $this->db->select('id_transporte, transporte, clave');
        $this->db->from('transporte');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // funcion para obtener los puntos de llegada segun la agencia 
    public function transportes($id_agencia)
    {
        $this->db->from('transporte');
        $this->db->where('id_agencia', $id_agencia);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    // traer todas las agencias aduanales 
    public function agencias_aduanales()
    {
        $this->db->from('agencias_aduanales');
        $this->db->join('ladas', 'ladas.id_lada = agencias_aduanales.id_lada', 'left');
        $this->db->where('agencias_aduanales.id_agencia <>', 7);
        $this->db->where('agencias_aduanales.activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // funcion para obtene la informacion de una agencia en especifico por identificador 
    public function get_agencia($id_agencia)
    {

        $this->db->from('agencias_aduanales');
        $this->db->where('activo', 1);
        $this->db->where('id_agencia', $id_agencia);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion de los puertos de las agencias
    public function puertos_agencia($id_agencia)
    {
        $this->db->select('id_transporte, transporte', 'clave');
        $this->db->from('transporte');
        $this->db->where('id_agencia', $id_agencia);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    //funcion para obtener los proyectos por asesor
    public function get_proyectos_asesor($id_asesor)
    {
        $this->db->from('get_proyectos_asesor');
        $this->db->where('id_asesor', $id_asesor);
        $this->db->where('activo', 1);
        $this->db->order_by('id_proyecto','desc');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    //funcion para obtener los proyectos por asesor activos
    public function get_proyectos_activos($id_asesor)
    {
        $this->db->from('get_proyectos_activos');
        $this->db->where('id_asesor_p', $id_asesor);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    //funcion para obtener los proyectos por asesor activos
    public function get_proyectos_concluidos($id_asesor)
    {
        $this->db->from('get_proyectos_asesor');
        $this->db->where('id_asesor', $id_asesor);
        $this->db->where('id_estadoproyectos', 24);
        $this->db->where('activo', 2);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    //funcion para obtener los proyectos por agente aduanal
    public function get_proy_agente($id_agencia)
    {
        $this->db->from('get_proy_agente');
        $this->db->where('agen_id', $id_agencia);
        $this->db->where('cot_act = 3 and proy_act >=1 and proy_act <=2');
        $this->db->order_by('id_proyecto', 'desc');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // 
    public function insert_usuarios($data)
    {
        $this->db->insert('usuarios', $data);
    }
    // 
    public function get_last_agente()
    {
        $this->db->select_max('id_usuario');
        $this->db->from('usuarios');
        $this->db->where('id_nivelusuario', 5);

        $query = $this->db->get();

        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // 
    public function insert_relacion($data)
    {
        $this->db->insert('relacion_agente_aduanal', $data);
    }
    // 
    public function get_agencia_agent($id_usuario)
    {
        $this->db->select('id_agencia');
        $this->db->from('relacion_agente_aduanal');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // 
    public function get_agentes($id_agencia)
    {
        $this->db->select('usuarios.id_usuario, nombre, usuarios.email, usuarios.telefono, lada, abrev');
        $this->db->from('usuarios');
        $this->db->join('relacion_agente_aduanal', 'relacion_agente_aduanal.id_usuario = usuarios.id_usuario');
        $this->db->join('agencias_aduanales', 'agencias_aduanales.id_agencia = relacion_agente_aduanal.id_agencia');
        $this->db->join('ladas', 'usuarios.id_lada = ladas.id_lada', 'left');
        $this->db->where('agencias_aduanales.id_agencia', $id_agencia);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function insert_transporte($data)
    {
        $this->db->insert('transporte', $data);
    }

    public function insert_prov($data)
    {
        $this->db->insert('proveedores', $data);
    }
    public function update_prov($data, $id_proveedor)
    {
        $this->db->where('id_proveedor', $id_proveedor);
        $this->db->update('proveedores', $data);
    }
    public function get_prod_proveedor($id_proveedor)
    {
        $this->db->from('productos');
        $this->db->where('id_proveedor ', $id_proveedor);
        $this->db->where('activo ', 1);

        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function get_detalle_prov($id_proveedor)
    {
        $this->db->from('proveedores');
        $this->db->join('ladas', 'ladas.id_lada = proveedores.id_lada', 'left');
        $this->db->where('id_proveedor', $id_proveedor);
        $this->db->where('proveedores.activo', 1);

        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function get_proveedor($id_proveedor)
    {
        $this->db->from('proveedores');
        $this->db->where('id_proveedor', $id_proveedor);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function get_datos_producto_prov($id_producto)
    {
        $this->db->from('productos');
        $this->db->where('id_producto', $id_producto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    //funcion para obtener todos los proveedores de la empresa     
    public function get_proveedores()
    {
        $this->db->from('proveedores');
        $this->db->join('ladas', 'ladas.id_lada = proveedores.id_lada', 'left');
        $this->db->where('proveedores.activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    //funcion para obtener todos los proveedores de la empresa 
    public function get_proveedoresCot()
    {
        $this->db->from('proveedores');
        $this->db->join('ladas', 'ladas.id_lada = proveedores.id_lada', 'left');
        $this->db->where('proveedores.activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    // funcion para obtene la informacion de un proveedor en especifico por identificador
    public function productos_prov($id_proveedor)
    {
        $this->db->select('id_producto, producto');
        $this->db->from('productos');
        $this->db->where('activo', 1);
        $this->db->where('id_proveedor', $id_proveedor);

        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // 
    public function get_producto_proveedore($id_proveedor)
    {
        $this->db->from('productos');
        $this->db->join('proveedores', 'proveedores.id_proveedor = productos.id_proveedor', 'left');
        $this->db->where('productos.id_proveedor', $id_proveedor);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function get_producto_proveedores($id_proveedor)
    {
        //$this->db->select('*');
        $this->db->from('productos');
        $this->db->where('id_proveedor', $id_proveedor);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function get_proveedores_cot()
    {
        $this->db->from('proveedores');
        $this->db->where('proveedores.activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }


    public function get_sourcing($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('sourcing', 'proyecto.id_proyecto = sourcing.id_proyecto', 'left');
        $this->db->join('tasks', 'sourcing.id_task = tasks.id_task', 'left');
        $this->db->where('sourcing.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function task_sourcing($id_sourcing)
    {
        $this->db->from('sourcing');
        $this->db->join('tasks', 'sourcing.id_task = tasks.id_task', 'left');
        $this->db->where('sourcing.id_sourcing', $id_sourcing);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function get_production($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('production', 'proyecto.id_proyecto = production.id_proyecto', 'left');
        $this->db->join('tasks', 'production.id_task = tasks.id_task', 'left');
        $this->db->where('production.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function task_production($id_production)
    {
        $this->db->from('production');
        $this->db->join('tasks', 'production.id_task = tasks.id_task', 'left');
        $this->db->where('production.id_production', $id_production);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function get_freight($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('freight', 'proyecto.id_proyecto = freight.id_proyecto', 'left');
        $this->db->join('tasks', 'freight.id_task = tasks.id_task', 'left');
        $this->db->where('freight.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function task_freight($id_freight)
    {
        $this->db->from('freight');
        $this->db->join('tasks', 'freight.id_task = tasks.id_task', 'left');
        $this->db->where('freight.id_freight', $id_freight);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function get_customs($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('customs', 'proyecto.id_proyecto = customs.id_proyecto', 'left');
        $this->db->join('tasks', 'customs.id_task = tasks.id_task', 'left');
        $this->db->where('customs.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function get_quoted($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('quoted', 'proyecto.id_proyecto = quoted.id_proyecto', 'left');
        $this->db->join('tasks', 'quoted.id_task = tasks.id_task', 'left');
        $this->db->where('quoted.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function get_done($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('done', 'proyecto.id_proyecto = done.id_proyecto', 'left');
        $this->db->join('tasks', 'done.id_task = tasks.id_task', 'left');
        $this->db->where('done.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function updateSourcing($dataSourcing, $idSourcing)
    {
        $this->db->where('id_sourcing', $idSourcing);
        $this->db->update('sourcing', $dataSourcing);
    }
    public function updateProduction($dataProduction, $idProduction)
    {
        $this->db->where('id_production', $idProduction);
        $this->db->update('production', $dataProduction);
    }
    public function updateFreight($dataFreight, $idFreight)
    {
        $this->db->where('id_freight', $idFreight);
        $this->db->update('freight', $dataFreight);
    }
    public function updateCustoms($dataCustoms, $idCustoms)
    {
        $this->db->where('id_customs', $idCustoms);
        $this->db->update('customs', $dataCustoms);
    }
    public function updateQuoted($dataQuoted, $idQuoted)
    {
        $this->db->where('id_quoted', $idQuoted);
        $this->db->update('quoted', $dataQuoted);
    }
    public function updateDonde($dataDone, $idDone)
    {
        $this->db->where('id_done', $idDone);
        $this->db->update('done', $dataDone);
    }
    public function get_evidencia($id_done)
    {
        $this->db->from('done');
        $this->db->where('id_done', $id_done);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }



    public function get_tipo_documentos()
    {
        $this->db->from('tipos_doc');
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    public function get_tipos_documentos()
    {
        $this->db->from('tipos_doc');
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function get_id_documento($id_proyecto, $id_tipo_doc)
    {
        $this->db->select('id_documento, archivo_path');
        $this->db->from('documentos');
        $this->db->where('id_tipo_doc', $id_tipo_doc);
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function last_id_doc($id_proyecto, $id_tipo_doc)
    {
        $this->db->select('max(id_documento) as id_documento, id_tipo_doc');
        $this->db->from('documentos');
        $this->db->where('activo', 1);
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('id_tipo_doc', $id_tipo_doc);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function update_documento($data, $id_documento)
    {
        $this->db->where('id_documento', $id_documento);
        $this->db->update('documentos', $data);
    }
    public function insert_documento($data)
    {
        $this->db->insert('documentos', $data);
    }
    public function get_documento($id_proyecto, $id_tipo_doc)
    {
        $this->db->from('tipos_doc');
        $this->db->join('documentos', 'documentos.id_tipo_doc = tipos_doc.id_tipo_doc', 'left');
        $this->db->where('tipos_doc.id_tipo_doc', $id_tipo_doc);
        $this->db->where('documentos.id_proyecto', $id_proyecto);
        $this->db->where('documentos.activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function get_documentos($id_proyecto)
    {
        $this->db->from('documentos');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    // obtener el folio de las cotizaciones 
    public function ultimo_folio()
    {
        $this->db->from('cotizaciones');
        $this->db->order_by('id_cotizacion', 'DESC');
        $this->db->LIMIT('1');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // funcion para agregar cotizacion a la BD
    public function agregar_cotizacion($data_Cotizacion)
    {
        $this->db->insert('cotizaciones', $data_Cotizacion);
    }
    // funcion optener estatus de la cotizaciones
    public function get_cotizaciones_update($id_proyecto)
    {
        $this->db->from('cotizaciones');
        $this->db->where('id_proyecto', $id_proyecto);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // funcion para obtener la ultima cotizacion guardada segun el proyecto 
    public function ultimo_IdCotizacion($id_proyecto)
    {
        $this->db->select_max('cotizaciones.id_cotizacion');
        $this->db->from('cotizaciones');
        $this->db->join('proyecto', 'proyecto.id_proyecto = cotizaciones.id_proyecto', 'left');
        $this->db->where('cotizaciones.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion para obtener el ultimo id de la imagen del producto de la cotizacion
    public function ultimo_IdImaCot($pathtmp)
    {
        //obtiene el ultimo proveedor insertado en el ultimo proyecto base creado por el cliente X que tiene en el invoice_path el nombre $path_tmp
        $this->db->select('id_media_prod_cot');
        $this->db->from('media_productos_cot');
        $this->db->where('path_prod_cot', $pathtmp);

        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion para agregar productos de la cotizacion
    public function agregar_producto($data_Producto)
    {
        $this->db->insert('producto_cotizacion', $data_Producto);
    }

    public function update_cotizacion($data, $id_cotizacion)
    {
        $this->db->where('id_cotizacion', $id_cotizacion);
        $this->db->update('cotizaciones', $data);
    }
    public function ultimo_IdProdCotiza($IdCotizacion)
    {
        $this->db->select_max('id_producto_cot');
        $this->db->from('producto_cotizacion');
        $this->db->where('producto_cotizacion.id_cotizacion', $IdCotizacion);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function agregar_media_producto($data_ImgProdCot)
    {
        $this->db->insert('media_productos_cot', $data_ImgProdCot);
    }
    public function provCliente($id_cotizacion)
    {
        $this->db->from('provCliente');
        $this->db->where('id_cotizacion', $id_cotizacion);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function get_producto_cotizacion($id_cotizacion)
    {
        $this->db->from('producto_cotizacion');
        $this->db->join('proveedores', 'proveedores.id_proveedor = producto_cotizacion.id_proveedor');
        $this->db->join('unidades_medida', 'unidades_medida.id_unidad_md = producto_cotizacion.id_unidad_md', 'left');
        $this->db->where('producto_cotizacion.id_cotizacion', $id_cotizacion);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function get_proyecto_info($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->where('id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function get_proveedor_c($id_proyecto)
    {
        $this->db->from('proveedores_clientes');
        $this->db->join('proyecto', 'proyecto.id_proyecto = proveedores_clientes.id_proyecto', 'left');
        $this->db->where('proyecto.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function get_productos_cotizacion($id_producto_cot)
    {
        $this->db->select('*');
        $this->db->from('producto_cotizacion');
        $this->db->join('proveedores', 'proveedores.id_proveedor = producto_cotizacion.id_proveedor', 'left');
        $this->db->join('unidades_medida', 'unidades_medida.id_unidad_md = producto_cotizacion.id_unidad_md', 'left');
        $this->db->where('producto_cotizacion.activo', 1);
        $this->db->where('producto_cotizacion.id_producto_cot', $id_producto_cot);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function last_media_productos_cotizacion($id_producto_cot)
    {
        $this->db->from('media_productos_cot');
        $this->db->join('producto_cotizacion', 'producto_cotizacion.id_producto_cot = media_productos_cot.id_producto_cot', 'left');
        $this->db->join('proveedores', 'proveedores.id_proveedor = producto_cotizacion.id_proveedor', 'left');
        $this->db->join('unidades_medida', 'unidades_medida.id_unidad_md = producto_cotizacion.id_unidad_md', 'left');
        $this->db->where('media_productos_cot.activo', 1);
        $this->db->where('media_productos_cot.id_producto_cot', $id_producto_cot);
        $this->db->order_by('media_productos_cot.id_media_prod_cot', 'DESC');
        $this->db->LIMIT('1');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function media_productos_cotizacion($id_producto_cot)
    {
        $this->db->from('media_productos_cot');
        $this->db->join('producto_cotizacion', 'producto_cotizacion.id_producto_cot = media_productos_cot.id_producto_cot', 'left');
        $this->db->where('media_productos_cot.activo', 1);
        $this->db->where('media_productos_cot.id_producto_cot', $id_producto_cot);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function update_media_producto($data_ImgProdCot, $IdMediaProdCot)
    {
        $this->db->where('id_media_prod_cot', $IdMediaProdCot);
        $this->db->update('media_productos_cot', $data_ImgProdCot);
    }

    // funcion para traer todos los clientes
    public function get_clientes()
    {
        $this->db->from('usuarios');
        $this->db->join('ladas', 'ladas.id_lada = usuarios.id_lada', 'left');
        $this->db->where('id_nivelusuario = 4');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // funcion para traer detalle de  los clientes
    public function get_detalle_cliente($id_usuario)
    {
        $this->db->from('usuarios');
        $this->db->join('ladas', 'ladas.id_lada = usuarios.id_lada', 'left');
        $this->db->join('niveles_usuarios', 'niveles_usuarios.id_nivelusuario = usuarios.id_nivelusuario', 'left');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // funcion para traer todos los pedidios del cliente
    public function get_pedidos_cliente($id_usuario)
    {
        $this->db->select('*, estado');
        $this->db->from('proyecto');
        $this->db->join('estados_proyectos', 'estados_proyectos.id_estadoproyectos = proyecto.id_estadoproyectos');
        $this->db->where('id_cliente', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // funcion para traer todos los estatus de los proyectos
    public function get_status_correo($status)
    {
        $this->db->from('estados_proyectos');
        $this->db->where('id_estadoproyectos', $status);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion para traer los correos de los clientes
    public function get_correo_cliente($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('usuarios', 'proyecto.id_cliente = usuarios.id_usuario');
        $this->db->where('id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // // funcion para traer los correos de los asesores
    public function get_correo_asesor($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->join('usuarios', 'proyecto.id_asesor = usuarios.id_usuario');
        $this->db->where('id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion para traer los correos de los usuarios
    public function get_correo_usuario($id_usuario)
    {
        //$this->db->select('email');
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
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
    // funcion para tener la cantidad de los proyectos
    public function noMyProyectos($id_usuario)
    {
        $query = $this->db->query('call noMyProyectos_asesor(' . $id_usuario . ');');
        $data   = array();
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            $query->free_result();
            $query->next_result();
            return $data;
        } else {
            return FALSE;
        }
    }
    // funcion para tener la cantidad de los proyectos
    public function noProyActivos($id_usuario)
    {
        $this->db->select('COUNT(*) AS NoActivos');
        $this->db->from('proyecto');
        $this->db->where('activo = 1 AND (id_estadoproyectos > 1 AND id_estadoproyectos < 24)');
        $this->db->where('id_asesor', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion para tener la cantidad de los proyectos
    public function noProyConcluidos($id_usuario)
    {
        $this->db->select('COUNT(*) AS NoConcluidos');
        $this->db->from('proyecto');
        $this->db->where('activo = 2 AND id_estadoproyectos = 24');
        $this->db->where('id_asesor', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion para tener la cantidad de los proyectos asignados al despacho
    public function despachoProy($id_agencia)
    {
        $this->db->select('COUNT(*) AS NoProyAgent');
        $this->db->from('proyecto');
        $this->db->join('cotizaciones', 'cotizaciones.id_proyecto = proyecto.id_proyecto', 'left');
        $this->db->where('proyecto.activo = 1 AND cotizaciones.activo = 3');
        $this->db->where('cotizaciones.id_agencia', $id_agencia);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion para tener la cantidad de los proyectos activos del despacho
    public function despachoProyAc($id_agencia)
    {
        $this->db->select('COUNT(*) AS NoProyActivoAgent');
        $this->db->from('proyecto');
        $this->db->join('cotizaciones', 'cotizaciones.id_proyecto = proyecto.id_proyecto', 'left');
        $this->db->where('proyecto.activo = 1 AND (id_estadoproyectos >= 19 AND id_estadoproyectos < 24) AND cotizaciones.activo = 3');
        $this->db->where('cotizaciones.id_agencia', $id_agencia);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion para tener la cantidad de los proyectos concluidos del despacho
    public function despachoProyCon($id_agencia)
    {
        $this->db->select('COUNT(*) AS NoProyConclAgent');
        $this->db->from('proyecto');
        $this->db->join('cotizaciones', 'cotizaciones.id_proyecto = proyecto.id_proyecto', 'left');
        $this->db->where('proyecto.activo = 2 AND id_estadoproyectos = 24
        AND cotizaciones.activo = 3');
        $this->db->where('cotizaciones.id_agencia', $id_agencia);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    

    
    // funcion para tener la cantidad de los productos
    public function noProductos()
    {
        $this->db->select('COUNT(*) AS NoProductos');
        $this->db->from('productos');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    
    // funcion para tener las ultimas cotizaciones del asesor
    public function lastMyCotizaciones($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('proyecto', 'proyecto.id_proyecto = cotizaciones.id_proyecto', 'left');
        $this->db->where('proyecto.id_asesor', $id_usuario);
        $this->db->order_by('id_cotizacion', 'DESC');
        $this->db->LIMIT(5);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    
    // funcion para obtener la informacion del pendiente/task
    public function taskData($id_task_dash)
    {
        $this->db->from('task_dashboard');
        $this->db->where('id_task_dash', $id_task_dash);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // funcion para obtener la informacion del pendiente/task
    public function taskDatas($id_usuario)
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
    // funcion para insertar el nuevo pendiente/task
    public function taskDash($data)
    {
        $this->db->insert('task_dashboard', $data);
    }
    // funcion para actulizar la informacion del pendiente/task
    public function taskUpdate($data, $id_task_dash)
    {
        $this->db->where('id_task_dash', $id_task_dash);
        $this->db->update('task_dashboard', $data);
    }
    // funcion para comparar las coordenas de la BD
    public function comprobar_coordenadas($id_proyecto)
    {
        $this->db->from('coordenadas');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activo', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    // actualizar las coordenadas del proyecto
    public function update_coord($data, $id_proyecto)
    {
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->update('coordenadas', $data);
    }

    public function get_last_aa()
    {
        $this->db->select_max('id_agencia');
        $this->db->from('agencias_aduanales');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_last_prov()
    {
        $this->db->select_max('id_proveedor');
        $this->db->from('proveedores');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_last_prod($id_proveedor)
    {
        $this->db->select_max('id_producto');
        $this->db->from('productos');
        $this->db->where('id_proveedor', $id_proveedor);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
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
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function Update_bit($id_bit, $data_up)
    {
        $this->db->where('id_bit', $id_bit);
        $this->db->update('bitacora', $data_up);
    }

    public function last_tabla($tabla, $id_name)
    {
        $this->db->select_max($id_name);
        $this->db->from($tabla);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_id_referencia($id_cotizacion)
    {
        $this->db->from('cotizaciones');
        $this->db->where('id_cotizacion', $id_cotizacion);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_pb($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->where('id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_data_user($id_usuario)
    {
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_admins()
    {
        $this->db->from('usuarios');
        $this->db->where('id_nivelusuario', '2');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function insert_notificacion($data_notificacion)
    {
        $this->db->insert('notificaciones', $data_notificacion);
    }

    public function obtencion_agentes($id_agencia)
    {
        $this->db->from('relacion_agente_aduanal');
        $this->db->where('id_agencia', $id_agencia);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function get_proyecto_cotizacion($id_cotizacion)
    {
        $this->db->from('cotizaciones');
        $this->db->where('id_cotizacion', $id_cotizacion);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // obtener media del producto con proveedor del pedido
    public function mediaPedidoP($id_producto_c)
    {
        $this->db->select('productos_clientes.img_path, proveedores_clientes.invoice_path');
        $this->db->from('productos_clientes');
        $this->db->join('proveedores_clientes', 'proveedores_clientes.id_proveedor_c = productos_clientes.id_proveedor_c', 'left');
        $this->db->where('productos_clientes.id_producto_c', $id_producto_c);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // obtener media del producto sin proveedor del pedido
    public function mediaPedidoSP($id_producto_sp_c)
    {
        $this->db->select('img_path');
        $this->db->from('productos_sp_clientes');
        $this->db->where('id_producto_sp_c', $id_producto_sp_c);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    // obtener media de la perzonalizacion del producto del pedido
    public function mediaPedidoOEM($id_proyecto)
    {
        $this->db->select('oemservice_path');
        $this->db->from('proyecto');
        $this->db->where('id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    // obtener la informacion de las cotizaciones 
    public function detalleCotizacion($id_proyecto)
    {
        $this->db->from('detCotizacion');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->order_by('id_cotizacion', 'desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // obtener la infomacion de la cotizacion aceptada
    public function detalleCotAceptada($id_proyecto)
    {
        $this->db->from('detCotizacion');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activ_cot', 3);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // obtener la informacion de los productos de las cotizaciones
    public function productosCot($id_proyecto)
    {
        $this->db->from('prodCotizacion');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activo', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // obtener la informacion de los productos de la cotizacion aceptada
    public function prodCotAcep($id_proyecto)
    {
        $this->db->from('prodCotizacion');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activ_cot', 3);
        $this->db->where('activo', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    // obtener los archivos de los productos de las cotizaciones
    public function mediProdCot($id_proyecto)
    {
        $this->db->from('mediaProdCoizacion');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activo', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    // obtener los archivos de los productos de la cotizacion aceptada
    public function mediProdCotAcep($id_proyecto)
    {
        $this->db->from('mediaProdCoizacion');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activ_cot', 3);
        $this->db->where('activo', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    // obtener los archivos del producto especifico de la cotizacion
    public function mediaProdCot($id_producto_cot)
    {
        $this->db->from('mediaProdCoizacion');
        $this->db->where('id_producto_cot', $id_producto_cot);
        $this->db->where('activo', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    // obtener el proveedor del pedido del cliente
    public function provCotCliente($id_proyecto)
    {
        $this->db->from('provCliente');
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->where('activo', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function get_proy_agente_activos($id_agencia)
    {
        $this->db->from('get_proy_agente');
        $this->db->where('agen_id', $id_agencia);
        $this->db->where('proy_act = 1 AND (id_estadoproyectos >= 19 AND id_estadoproyectos < 24) AND cot_act = 3');
        $this->db->order_by('id_proyecto', 'desc');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function get_proy_agente_concluidos($id_agencia)
    {
        $this->db->from('get_proy_agente');
        $this->db->where('agen_id', $id_agencia);
        $this->db->where('proy_act = 2 AND id_estadoproyectos = 24 AND cot_act = 3');
        $this->db->order_by('id_proyecto', 'desc');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function get_pdfCotizacion($id_proyecto)
    {
        $this->db->select('id_documento');
        $this->db->from('documentos');
        $this->db->where('id_tipo_doc', 12);
        $this->db->where('activo', 1);
        $this->db->where('id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_pdfPath($id_documento)
    {
        $this->db->from('documentos');
        $this->db->where('id_documento', $id_documento);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_folio($id_proyecto)
    {
        $this->db->select('a_registro, folio');
        $this->db->from('proyecto');
        $this->db->where('id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
}
