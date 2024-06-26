<?php
    class MY_Controller extends CI_Controller {
        //Se declara esta propiedad estatitica, la cual será la unica instancia de la bd. 
        private static $db_instance;

        public function __construct() {
            parent::__construct();
            //Se verifica si la instancia de la bd ya fue creada, de lo contrario se crea una nueva instancia.
            if (self::$db_instance === null) {
                $this->load->database();
                self::$db_instance = $this->db;
            }
        }

        //Proporciona un punto de acceso global a la instancia de la base de datos a través del método get_db().
        // protected function get_db() {
        //     return self::$db_instance;
        // }
    }
?>