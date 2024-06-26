<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * API Controller: Este controlador maneja las solicitudes de API RESTful para administrar los items.
 */
class Api extends MY_Controller {
     /**
     * Constructor: Carga el model->Item_model y el helper para manejar las url.
     */

    public function __construct() {
        parent::__construct();
        $this->load->model('Item_model');
        $this->load->helper('url');
    }

     /**
     * Regresa todos los items guardados.
     * URL: /api/items
     * Method: GET
     */
    public function items() {
        $data = $this->Item_model->get_items();
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($data));
    }

    /**
     * Regresa solo el item por el id que le pasemos 
     * 
     * URL: /api/item/{id}
     * Method: GET
     * 
     * @param int $id
     */
    public function item($id) {
        $data = $this->Item_model->get_item($id);
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($data));
    }

    /**
     * Crear un nuevo item, el cual resive los parametros mediante post (nombre y descripcion)
     * 
     * URL: /api/item/create
     * Method: POST
     */
    public function create() {
      
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // Verifica si los datos fueron decodificados correctamente
        if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
            $this->Item_model->create_item($data); 
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'success')));
        } else {
            // Error al decodificar JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'error', 'message' => 'Invalid JSON')));
        }

    }
    /**
     * Actualiza el registro del item ya creado mediante el id que le pasemos
     * 
     * URL: /api/item/update/{id}
     * Method: PUT
     * 
     * @param int $id
     */
    public function update($id) {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // Verifica si los datos fueron decodificados correctamente
        if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
            $this->Item_model->update_item($id, $data); 
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'success')));
        } else {
            // Error al decodificar JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'error', 'message' => 'Invalid JSON')));
        }
    }

     /**
     * Borrar el item mediante el id que le pasemos
     * 
     * URL: /api/item/delete/{id}
     * Method: DELETE
     * 
     * @param int $id
     */
    public function delete($id) {
        $this->Item_model->delete_item($id);
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(array('status' => 'success')));
    }
}
?>
