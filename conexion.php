$baseDatos = "bowgqfdjymwtjrai1vil";

$usuarioBd = "uqqpgtuobtnpuiii";
$passwordBd = "zqbdbi78oaeWDbHAHcHs";


// Creamos la conexión
$connLocalhost = mysqli_connect($servidor, $usuarioBd, $passwordBd) or trigger_error(mysqli_error(), E_USER_ERROR);

// Definimos el cotejamiento para la conexion (igual al cotejamiento de la BD)
mysqli_query($connLocalhost, "SET NAMES 'utf8'");

// Seleccionamos la base de datos por defecto para el proyecto
mysqli_select_db($connLocalhost, $baseDatos);
#me daba problemas, las funciones se declaran en includes/common_functions c:
#ya lo arregle, te faltaba hacer el include del archivo en la que estaba la funcion
#function formatfecha($fecha){

#   return date('g:i a',strtotime($fecha));
#}

?>