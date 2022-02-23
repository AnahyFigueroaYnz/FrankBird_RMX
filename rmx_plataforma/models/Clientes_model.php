<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

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

    public function update_path_oem($datacambio, $id_pb)
    {
        $this->db->where('id_proyecto',$id_pb);
        $this->db->update('proyecto',$datacambio);
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

    public function get_id_prov($id_cliente,$path_tmp)
    {
        //obtiene el ultimo proveedor insertado en el ultimo proyecto base creado por el cliente X que tiene en el invoice_path el nombre $path_tmp
        $this->db->select('id_proveedor_c');
        $this->db->from('get_id_prov');
        $this->db->where('id_cliente', $id_cliente);
        $this->db->where('invoice_path', $path_tmp);
        
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }
    public function get_id_prod_sp($id_cliente,$path_tmp)
    {
        //obtiene el ultimo producto sp insertado en el ultimo proyecto base creado por el cliente X que tiene en el img_path el nombre $path_tmp
        $this->db->select('id_producto_sp_c');
        $this->db->from('get_id_prod_sp');
        $this->db->where('id_cliente', $id_cliente);
        $this->db->where('img_path', $path_tmp);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function get_id_prod_prov($id_cliente,$path_tmp)
    {
        //obtiene el ultimo producto sp insertado en el ultimo proyecto base creado por el cliente X que tiene en el img_path el nombre $path_tmp
        $this->db->select('id_producto_c');
        $this->db->from('get_id_prod_prov');
        $this->db->where('id_cliente', $id_cliente);
        $this->db->where('img_path', $path_tmp);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function update_path_prov($datacambio,$id_proveedor_c_value)
    {
        $this->db->where('id_proveedor_c',$id_proveedor_c_value);
        $this->db->update('proveedores_clientes',$datacambio);
    }

    public function update_path_prod_sp($datacambio,$id_producto_sp_c_val)
    {
        $this->db->where('id_producto_sp_c',$id_producto_sp_c_val);
        $this->db->update('productos_sp_clientes',$datacambio);
    }

    public function update_path_prod_prov($datacambio,$id_producto_c_val)
    {
        $this->db->where('id_producto_c',$id_producto_c_val);
        $this->db->update('productos_clientes',$datacambio);
    }

    public function get_folio()
    {
        $this->db->from('proyecto');
        $this->db->order_by('id_proyecto', 'DESC');
        $this->db->LIMIT('1');

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
    public function get_unidades()
    {
        $this->db->from('unidades_medida');

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

    public function get_unidades_correo($id_unidad)
    {
        $this->db->from('unidades_medida');
        $this->db->where('id_unidad_md', $id_unidad);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }
    
    public function get_mis_pedidos($id_cliente, $activo)
    {
        $this->db->from('proyecto');
        $this->db->join('estados_proyectos','estados_proyectos.id_estadoproyectos = proyecto.id_estadoproyectos');
        $this->db->where('proyecto.id_cliente',$id_cliente);
        $this->db->where('proyecto.activo', $activo);
        $this->db->order_by('proyecto.id_proyecto', 'desc');
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    }
    public function get_activos($id_cliente)
    {
        $this->db->from('proyecto');
        $this->db->join('estados_proyectos','estados_proyectos.id_estadoproyectos = proyecto.id_estadoproyectos');
        $this->db->where('proyecto.id_cliente',$id_cliente);
        $this->db->where('proyecto.activo', 1);
        $this->db->where('proyecto.id_estadoproyectos !=1 and proyecto.id_estadoproyectos != 24');
        $this->db->order_by('proyecto.id_proyecto', 'desc');
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    }    
    public function get_concluidos($id_cliente)
    {
        $this->db->from('proyecto');
        $this->db->join('estados_proyectos','estados_proyectos.id_estadoproyectos = proyecto.id_estadoproyectos');
        $this->db->where('proyecto.id_cliente',$id_cliente);
        $this->db->where('proyecto.activo',2);
        $this->db->where('proyecto.id_estadoproyectos',24);
        $this->db->order_by('proyecto.id_proyecto', 'desc');
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    }
    public function get_pedido_cliente($id_proyecto)
    {
        $this->db->from('proyecto');
        $this->db->where('proyecto.id_proyecto',$id_proyecto);
        $this->db->where('proyecto.activo',1);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    }
    //VER PROVEEDORES CLIENTES
    public function ver_proveedores_clientes($id_cliente)
    {        
        $this->db->from('proveedores_clientes');
        $this->db->where('id_cliente',$id_cliente);
        $this->db->where('activo',1);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    }

    public function getProveedores_clientes($id_cliente)
    {   
        $this->db->from('proveedores_clientes');
        $this->db->where('id_cliente',$id_cliente);
        $this->db->where('activo',1);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }else{
            return false;
        } 
    }
    public function get_data_productos_sp($id_cliente)
    {
        $this->db->from('productos_sp_clientes');
        $this->db->where('id_cliente',$id_cliente);
        $this->db->where('activo',1);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    }
    //VER DETALLE PROVEEDOR
    public function detalle_proveedores_clientes($id_proveedor_c)
    {
        $this->db->from('proveedores_clientes');
        $this->db->where('id_proveedor_c', $id_proveedor_c);
        $this->db->where('activo',1);


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
    public function get_productos_prov($id_proveedor_c)
    {
        $this->db->from('productos_clientes');
        $this->db->where('id_proveedor_c', $id_proveedor_c);


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
    
    public function id_ultimo_prod_sp()
    {
        $this->db->select_max('id_producto_sp_c'); 
        $this->db->from('productos_sp_clientes');
        

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }
    //CONSULTA PARA OBTENER EL ULTIMO ID_PB INSERTADO, DEPENDIENDO DE X CLIENTE
    public function id_ultimo_proyecto_base($id_cliente)
    {
        $this->db->select_max('id_proyecto'); 
        $this->db->from('proyecto');
        $this->db->join('usuarios', 'proyecto.id_cliente = usuarios.id_usuario');
        $this->db->where('proyecto.id_cliente', $id_cliente);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }
    // trar el id del ultimo proyecto agregado
    public function id_ultimo_proyecto($id_cliente)
    {
        $this->db->select_max('id_proyecto'); 
        $this->db->from('proyecto');
        $this->db->where('id_cliente', $id_cliente);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }
    //CONSULTA PARA OBTENER EL ULTIMO ID_PB INSERTADO
    public function get_id_proyecto_base()
    {
        $this->db->select_max('id_proyecto'); 
        $this->db->from('proyecto');

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }
    // actualidar path de la imagen del usuario
    public function update_path($id_proyecto,$data)
    {
        $this->db->where('id_proyecto',$id_proyecto);
        $this->db->update('proyecto',$data);
    }
    //INSERT PARA PROYECTO
    public function insert_proyecto($data_proyecto)
    {
        $this->db->insert('proyecto', $data_proyecto);
    }
    //INSERT PARA PROVEEDORES CLIENTE
    public function insert_proveedor_cliente($data_proveedor_cliente_controller)
    {
        $this->db->insert('proveedores_clientes', $data_proveedor_cliente_controller);
    }
    //CONSULTA PARA OBTENER EL ULTIMO ID_PROV_C INSERTADO POR X CLIENTE DEPENDIENDO DEL PROYECTO BASE
    public function get_last_id_proveedor_cliente($id_proyecto)
    {
        $this->db->select_max('proveedores_clientes.id_proveedor_c'); 
        $this->db->from('proveedores_clientes');
        $this->db->join('proyecto', 'proveedores_clientes.id_proyecto = proyecto.id_proyecto');
        $this->db->where('proyecto.id_proyecto', $id_proyecto);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }
    //INSERT PARA PRODUCTOS_CLIENTE (EL QUE DEPENDE DEL PROVEEDOR)
    public function insert_productos_cliente($data_producto_cliente)
    {
        $this->db->insert('productos_clientes', $data_producto_cliente);
    }
    //INSERT PARA PRODUCTOS SIN PROVEEDOR
    public function insert_productos_sp_clientes($data_producto_sp_cliente_controller)
    {
        $this->db->insert('productos_sp_clientes', $data_producto_sp_cliente_controller);
    }
    // Insert para sourcing
    public function insert_sourcing($data_task)
    {
        $this->db->insert('sourcing', $data_task);
    }
    // Insert para sourcing
    public function insert_quoted($data_task)
    {
        $this->db->insert('quoted', $data_task);
    }
    // Insert para sourcing
    public function insert_production($data_task)
    {
        $this->db->insert('production', $data_task);
    }
    // Insert para sourcing
    public function insert_freight($data_task)
    {
        $this->db->insert('freight', $data_task);
    }
    // Insert para sourcing
    public function insert_customs($data_task)
    {
        $this->db->insert('customs', $data_task);
    }
    // Insert para sourcing
    public function insert_done($data_task)
    {
        $this->db->insert('done', $data_task);
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
    // funcion para tener la cantidad de los proyectos
    public function noMyProyectos($id_usuario)
    {
        $query = $this->db->query('call noMyProyectos('.$id_usuario.');');
        $data   = array();
        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
            $query->free_result();
            $query->next_result();
            return $data;
        }
        else
        {
            return FALSE;
        }
    }
    
    // funcion para tener la cantidad de los proyectos
    public function noProyActivos($id_usuario)
    {
        $this->db->select('count(*) AS NoActivos');
        $this->db->from('proyecto');
        $this->db->where('proyecto.activo = 1 AND (proyecto.id_estadoproyectos > 1 AND proyecto.id_estadoproyectos < 13) AND proyecto.id_cliente =',$id_usuario);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return false;
        } 
    }

    // funcion para tener la cantidad de los proyectos
    public function noProyConcluidos($id_usuario)
    {
        $this->db->select('count(*) AS NoConcluidos');
        $this->db->from('proyecto');
        $this->db->where('proyecto.activo = 2 AND proyecto.id_estadoproyectos = 24 AND proyecto.id_cliente =',$id_usuario);

        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else{
            return false;
        } 
    }
    
    // funcion para tener los pendientes/tasks 
    public function pendientesTasks($id_usuario)
    {
        $this->db->from('task_dashboard');
        $this->db->where('activo',1);
        $this->db->where('id_usuario', $id_usuario);
        $this->db->order_by('id_task_dash', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    // funcion para tener las ultimas cotizaciones del cliente
    public function lastMyCotizaciones($id_usuario)
    {
        $this->db->from('cotizaciones');
        $this->db->join('proyecto','proyecto.id_proyecto = cotizaciones.id_proyecto', 'left');
        $this->db->where('proyecto.id_cliente',$id_usuario);
        $this->db->where('cotizaciones.activo >= 2 AND cotizaciones.activo <= 4');
        $this->db->order_by('id_cotizacion', 'DESC');
        $this->db->limit(5);

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
    // funcion para tener los proyectos del cliente en sourcing dentro de 24 hrs
    public function sourcingMisProy($id_usuario)
    {
        $this->db->from('sourcingMisProy');
        $this->db->where('id_cliente',$id_usuario);
        $this->db->order_by('folio', 'DESC');
        
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
    //INSERT PARA COORDENADAS
    public function insert_into_coordenadas($data_coord)
    {
        $this->db->insert('coordenadas', $data_coord);
    }
    // 
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

    public function get_email($id_usuario)
    {
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
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

    public function get_cotizaciones($id_cliente)
    {
        $this->db->from('lista_cotizaciones_cliente');
        $this->db->where('id_cliente', $id_cliente);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function detalleCotizacion($id_cotizacion)
    {
        $this->db->from('detCotizacion');
        $this->db->where('id_cotizacion', $id_cotizacion);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function productosCot($id_cotizacion)
    {
        $this->db->from('prodCotizacion');
        $this->db->where('id_cotizacion', $id_cotizacion);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function mediProdCot($id_cotizacion)
    {
        $this->db->from('mediaProdCoizacion');
        $this->db->where('id_cotizacion', $id_cotizacion);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function mediaProdCot($id_producto_cot)
    {
        $this->db->from('mediaProdCoizacion');
        $this->db->where('id_producto_cot', $id_producto_cot);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
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
}