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
        /*
	**
	*Esta funcion se encarga de tomar una consulta sql
	*@s esta variable recoge una consulta sql
	*@return  la consulta
	*/
	
        function retornar_usuarios($s)
	{
		$con=$this->conectar();
		$resultado=$con->query($s);
		return $resultado;
	}
	
	function retornar_usuarios2($s)
	{
		
		$con=$this->conectar();
		$resultado=$con->query($s);
		$row = mysqli_fetch_assoc( $resultado );
		$conteo = $row['conteo'];
		return $conteo;
	}
function retornar_usuarios3($s)
	{
		$s2 = explode("|",$s);
		$sql= $s2[0];
		$nom_tabla= $s2[1];
		$con=$this->conectar();
		$resultado=$con->query($sql);
		$arreglo=array();
		$salida="";
		while ($row = mysqli_fetch_assoc( $resultado ))
        {   
        	$arreglo[]= $row['conteo'];	
        }
		$cadena=implode(",", $arreglo);
		$arreglo=explode(",",$cadena);
		$cuenta_arreglo = count($arreglo);
		$salida.='<table>';
		for($i=0;$i<$cuenta_arreglo;$i++)
		{
			$salida.=  '<tr><td><input type="checkbox" name="valor'.$i.'" value="'.$arreglo[$i].'">'.$arreglo[$i].'</td></tr>';
		}
		$salida.=  '<tr><td><input type="hidden" name="campos_arreglo" value="'.$cuenta_arreglo.'">';
		$salida.=  '<tr><td><input type="hidden" name="nom_tabla" value="'.$nom_tabla.'">';
		$salida.='</table>';
		return $salida;	
			function retornar_registro_tabla($tabla,$cod_registro,$desc_registro)
	{
		$con=$this->conectar();
		$sql="select * from $tabla";
		$resultado=$con->query($sql);
		$salida="";
		while ($row = mysqli_fetch_assoc( $resultado ))
        {   
        	$salida.= "<option value='".$row{"$cod_registro"}."'>".$row{"$desc_registro"}."</option>";
        }
		return $salida;	

	}
	function retornar_algo($s)
	{
		$con=$this->conectar();
		$resultado=$con->query($s);
		$arreglo=array();
		$salida="";
		while ($row = mysqli_fetch_assoc( $resultado ))
        {   
        	$arreglo[]= $row['conteo'];	
        }
		$cadena=implode(",", $arreglo);
		$arreglo=explode(",",$cadena);
		//$cuenta_arreglo = count($arreglo);
		for($i=0;$i<count($arreglo);$i++)
		{
			$salida.= $arreglo[$i].",";
		}
		return $salida;	

	}
	function retornar_usuarios4($s)
	{
		$separado = explode("|", $s);

		$sql = $separado[0];
		$campos = $separado[1];
		$campos_b = explode("-",$campos);
		$cant_campos = count($campos_b);

		$con=$this->conectar();
		$resultado= $con->query($sql);
		
		$b="";
		$b .="<tr>";
			for ($i=0; $i < $cant_campos ; $i++) 
				{ 
					$b.="<th>".$campos_b[$i]."</th>";
				}
			$b.="</tr>";
			//if que verifique si hay un resultado 
		while ($fila = mysqli_fetch_array($resultado))
		{
			$b .="<tr>";
			for ($i=0; $i < mysqli_num_fields($resultado) ; $i++) { 
				$b.="<td>".$fila[$i]."</td>";
			}
			$b.="<td>editar/eliminar</td>";
			$b.="</tr>";
		}	
		return $b;
	}
	
	function retornar_usuarios5($s)
	{
		$separado = explode("|", $s);

		$sql = $separado[0];
		$campos = $separado[1];
		$campos_b = explode("-",$campos);
		$cant_campos = count($campos_b);

		$con=$this->conectar();
		$resultado= $con->query($sql);
		
		$b="";
		
		while ($fila = mysqli_fetch_array($resultado))
		{

			for ($i=0; $i < mysqli_num_fields($resultado) ; $i++) { 
				$b.="<option>".$fila[$i]."</option>";
			}

		}	
		return $b;
	}
	
	function formulario_insertar($s)
	{
		include("clases/Glosario.php");
		$obj_glosario=new Glosario();
		//$obj_glosario->ini();
		$s2 = explode("|",$s);
		$sql= $s2[0];
		$nom_tabla= $s2[1];
		$con=$this->conectar();
		$resultado=$con->query($sql);
		$arreglo=array();
		$salida="";
		while ($row = mysqli_fetch_assoc( $resultado ))
        {   
        	$arreglo[]= $row['conteo'];	
        }
		$cadena=implode(",", $arreglo);
		$arreglo=explode(",",$cadena);
		
		
		$b="SELECT COLUMN_NAME AS conteo FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME =  '$nom_tabla' AND TABLE_SCHEMA =  'bd_cafb_final'";
		$c=$this->retornar_algo($b);
		$d= substr ($c, 0, -1);
		$cadena2=explode(",",$d);
		
		$salida.='<input type="hidden" value="'.$nom_tabla.'" name="tabla">';
		$salida.='<input type="hidden" value="'.$cadena.'" name="arreglo">';
		
		for($i=0;$i<count($arreglo);$i++)
		{
			if (in_array($arreglo[$i], $cadena2))
				{
					
				}
				else
				{
					if(substr($arreglo[$i], 0, 3)== "fec")
					{
					$salida.='<label FOR="labe'.$i.'">'.$obj_glosario->buscar_y_remplazar($arreglo[$i]).'</label>';
					$salida.='<input  type="date" class="form-control" id="labe'.$i.'" name="'.$arreglo[$i].'" >';
					}
					else
					{
					$salida.='<label FOR="labe'.$i.'">'.$obj_glosario->buscar_y_remplazar($arreglo[$i]).'</label>';
					$salida.='<input type="text" class="form-control" id="labe'.$i.'" name="'.$arreglo[$i].'" >';
					}
				}
		}
		$salida.='<input type="hidden" value="'.$d.'" name="arreglo_select">';
		for($j=0;$j<count($cadena2);$j++)
		{
			$consulta="SELECT TABLE_NAME AS conteo FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE COLUMN_NAME = '$cadena2[$j]' AND CONSTRAINT_NAME = 'PRIMARY' AND TABLE_SCHEMA = 'bd_cafb_final'";
			$respuesta=$this->retornar_usuarios2($consulta);
			$consulta2="SELECT COLUMN_NAME AS conteo FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$nom_tabla' AND TABLE_SCHEMA = 'bd_cafb_final' AND EXTRA LIKE '%auto_increment%'";
			$respuesta2=$this->retornar_usuarios2($consulta2);
			if($respuesta==$nom_tabla)
			{
				if($cadena2[$j]==$respuesta2)
				{
					$salida.='<input type="hidden"  name="'.$cadena2[$j].'">'; 
				}
				else
				{
					$salida.='<label FOR="lab1'.$j.'">'.$obj_glosario->buscar_y_remplazar($cadena2[$j]).'</label>';
					$salida.='<input type="text" class="form-control" id="lab1'.$j.'" name="'.$cadena2[$j].'">'; 
				}
			}
			else
			{
				
				$consulta4="SELECT TABLE_NAME AS conteo FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE COLUMN_NAME = '$cadena2[$j]' AND CONSTRAINT_NAME = 'PRIMARY' AND TABLE_SCHEMA = 'bd_cafb_final'";
			$respuesta4=$this->retornar_usuarios2($consulta4);
				$consulta3="SELECT COLUMN_NAME AS conteo FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$respuesta4' AND TABLE_SCHEMA = 'bd_cafb_final'  AND CHARACTER_MAXIMUM_LENGTH = '33'";
				$respuesta3=$this->retornar_usuarios2($consulta3);
				$salida.='<label FOR="label2'.$j.'">'.$obj_glosario->buscar_y_remplazar($respuesta3).'</label>';
				$comparar=$this->retornar_usuarios2("select count( *) as conteo from $respuesta4");
				if($comparar==0)
				{
					$salida.="<div class='alert alert-info'>Hay parametros que no se han llenado aun</div>
					<script type='text/javascript'>
					$(document).ready(function(){
					$('#boton_insertar').hide();
					});
					</script>";
				}
				else
				{
				$salida.="<select id='label2".$j."' name='".$cadena2[$j]."' class='form-control'><option selected>---seleccione un valor---</option>".$this->retornar_registro_tabla($respuesta4,$cadena2[$j],$respuesta3)."</select>";
				}
			}
		}
		return $salida;	

	}
	
	function insertar($tabla,$campos)
	{
		$resultado="";
		$a="";$b="";$c=",";
		for($i=0;$i<count($campos);$i++)
		{
			if($i >=count($campos)-1) $c="";
			$a.="'".$campos[$i][0]."'".$c;
			$b.=$campos[$i][1].$c;
		}	
		$resultado.="insert into ".$tabla." (".$b.") values (".$a.")";	
		return $resultado;
	}
	
	function select($tabla,$campo1,$valor1,$campo2,$valor2)
	{
		$resultado="";
		$resultado.="select COUNT( * ) AS conteo from  $tabla where $campo1='$valor1' AND $campo2='$valor2'";
		return $resultado;
	}
	
	function select2($tabla,$campo1,$valor1,$campo2,$valor2,$campo3)
	{
		$resultado="";
		$resultado.="select $campo3 AS conteo from  $tabla where $campo1='$valor1' AND $campo2='$valor2'";
		return $resultado;
	}
	
	function select3($tabla)
	{
		$sql="";
		$sql.="SELECT  COLUMN_NAME AS conteo FROM INFORMATION_SCHEMA.columns WHERE table_name = '$tabla' AND TABLE_SCHEMA =  'bd_cafb_final'";
		$resultado = $sql."|".$tabla;
		return $resultado;
	}
	
	function select4($tabla,$campos)
	{
		$resultado="";
		$sql="";
		$nom_campos="";
		$a="";
		$cuenta=count($campos);
		for($i=0;$i<$cuenta;$i++)
			{
				if($i==$cuenta-1)
						{
							$a .=trim($campos[$i],"-");
						}
						else
						{
							$a .=trim($campos[$i],"-").",";
						}	
			}

		$sql .= "SELECT $a FROM  $tabla  ";
		$nom_campos .= implode($campos);
		$resultado .= $sql."|".$nom_campos;
		return $resultado;
	}
	
	function update($tabla,$campos,$condicion,$valor)
	{

		$resultado="";
		$a="";$c=",";
		for($i=0;$i<count($campos);$i++)
		{
				if($i >=count($campos)-1) $c="";
				$a.=$campos[$i][0]."="."'".$campos[$i][1]."'".$c;
		}	
		$resultado.="UPDATE ".$tabla." SET ".$a." where ".$condicion."='".$valor."'";	
		return $resultado;
	}
	





        /***********aguegue sus métodos después de esta línea de código****************************************/


    }
