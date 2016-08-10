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

function escribir($s)
	{
		$r=$this->retornar_usuarios($s);
         return $s;
	}
	
	/*
	**
	*Selects
	*/
	function escribir2($s)
	{
		$r=$this->retornar_usuarios2($s);
		return $r;
	}
	
	function escribir3($s)
	{
		$r=$this->retornar_usuarios3($s);
		return $r;
	}
	
	function escribir4($s)
	{
		$r=$this->retornar_usuarios4($s);
		return $r;
	}
	
	function escribir5($s)
	{
		$r=$this->formulario_insertar($s);
		return $r;
	}
	
	function alertas($mensaje,$ruta,$imagen)
	{
		$salida="";
		$salida.=
		'<script src="js/sweetalert-master/dist/sweetalert.min.js"></script> 
		<link rel="stylesheet" type="text/css" href="css/sweetalert.css">		
		<body>
		<script language="javascript">
		swal({ 
		title: "",
		text: "'.$mensaje.'",
		imageUrl: "iconos/'.$imagen.'"
		},
		function(){
		window.location.href = "'.$ruta.'";
		});
		</script>
		</body>';	
		return $salida;
	}




    






