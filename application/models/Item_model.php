<?php

class Item_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Obtiene todos los items de la tabla 'items'.
     * @return array Arreglo de items.
     */
    public function get_items() {
        $query = $this->db->get('items');
        return $query->result_array();
    }

    /**
     * Obtiene un item específico por su ID.
     * @param int $id ID del item a buscar.
     * @return array|null Arreglo con los datos del item o NULL si no se encuentra.
     */
    public function get_item($id) {
        $query = $this->db->get_where('items', array('id' => $id));
        return $query->row_array();
    }

    /**
     * Crea varios items en la tabla 'items'.
     * @param array $data Arreglo multidimensional con los datos de los items a crear.
     * @return bool TRUE si la inserción fue exitosa, FALSE en caso contrario.
     */
    public function create_item($data) {
        return $this->db->insert_batch('items', $data);
    }

    /**
     * Actualiza un item existente en la tabla 'items'.
     * @param int $id ID del item a actualizar.
     * @param array $data Arreglo con los nuevos datos del item.
     * @return bool TRUE si la actualización fue exitosa, FALSE en caso contrario.
     */
    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('items', $data);
    }

    /**
     * Elimina un item de la tabla 'items' por su ID.
     * @param int $id ID del item a eliminar.
     * @return bool TRUE si la eliminación fue exitosa, FALSE en caso contrario.
     */
    public function delete_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('items');
    }
}

?>
