<?php

    include( "clases/BD.php" );

    class Graficos extends BD
    {
        /**
        * Constructor de la clase.
        */
        public function Graficos()
        {
            $this->ini(); //En el constructor se inicializan todos los requerimientos de la clase BD.
        }

        /**
        * Este método se encarga de retornar un resultado en pantalla, úselo solo para probar que la inclusión
        * de la clase fué exitosa.
        * @param        texto           una cadena que representa un texto a mostrar en pantalla.   
        */
        function probar_funcionamiento( $mensaje )
        {
            return "<strong>".$mensaje."</strong>";
        }

        /***********aguegue sus métodos después de esta línea de código****************************************/

    }






