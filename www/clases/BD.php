<?php

    class BD
    {

        public $servidor;
        public $usuario;
        public $clave;
        public $bd;

        /**
        * Constructor de la clase.
        */
        public function BD()
        {

        }

        /**
        * Inicializa los valores básicos o que se requieren para que haya conexión con la base de datos.
        */
        public function ini()
        {
            include( "config.php" ); //Se acude al archivo de configuración para los parámetros de la base de datos.

            $this->servidor     = $servidor;
            $this->usuario      = $usuario;
            $this->clave        = $clave;
            $this->bd           = $bd;

            //-------puede agregar más código si se requieren datos adicionales desde el config -----------------
        }

        /**
        * Realiza una conexión simple a la base de datos.
        * @return       conexion        
        */
        private function conectar_a_bd()
        {
            return mysqli_connect( $this->servidor, $this->usuario, $this->clave, $this->bd );
        }

        /**
        * Se encarga de retornar la fecha y hora desde el servidor de la base de datos.
        */
        public function traer_fecha_bd()
        {
            $respuesta = "";

            $sql = " SELECT NOW() AS fecha ";
            $conexion = $this->conectar_a_bd();
            $resultado = $conexion->query( $sql );

            while( $fila = mysqli_fetch_assoc( $resultado ) )
            {
                $respuesta = $fila[ 'fecha' ];
            }

            mysqli_free_result( $resultado ); //Se libera la memoria destinada a la recopilación de datos de la BD.

            return $respuesta;
        }




        /***********aguegue sus métodos después de esta línea de código****************************************/


    }