<?php
/*
Control de seguridad para visualizacion de módulos
 */
//Tomamos el ID De la sesión iniciada
$id = $_SESSION['ID']; 
//Consultamos el ID de la sesion para que concuerde con los datos en la BD
$result=mysqli_query($conexiondb,"SELECT * FROM usuarios WHERE ID=".$id.";"); 
$count=mysqli_num_rows($result);
//ejecutamos la sentencia para traer los datos
$res=mysqli_fetch_array($result,MYSQLI_ASSOC);
//asignamos las variables desde la BD
$nombre = $res['Nombre']; 
$email = $res['Email']; 
$telefono = $res['Telefono']; 
$identificacion = $res['Identificacion']; 
 //Traemos el nivel de acceso desde la base de datos
$nivel_acceso = $res['Nivel_Acceso']; 
//Ejecutamos el control de acceso, asignando a cada valor un perfil, el mas alto es 1 y disminuye sucesivamente
if ($nivel_acceso=="1") {
	$privilegio = "NOC";
} elseif ($nivel_acceso=="2") {
	$privilegio = "Ejecutivo";
} elseif ($nivel_acceso=="3") {
	$privilegio = "Comercial";
} elseif ($nivel_acceso=="4") {
	$privilegio = "Tecnico";
} elseif ($nivel_acceso=="5") {
	$privilegio = "Estructuras";
} elseif ($nivel_acceso=="6") {
	$privilegio = "Recaudos";
} elseif ($nivel_acceso=="7") {
	$privilegio = "SAC";
}else{
	$privilegio = "Tercerizados";
}
//Parametro para que solo se visualicen los modulos contenidos dentro de la funcion
$solo_NOC=($privilegio=="NOC");
//
$solo_ejecutivo=($privilegio=="Ejecutivo");
//
$solo_comercial=($privilegio=="Comercial");
//
$solo_tecnico=($privilegio=="Tecnico");
//
$solo_estructuras=($privilegio=="Estructuras");
//
$solo_recuados=($privilegio=="Recaudos");
//
$solo_tercerizados=($privilegio=="Tercerizados");
//
$solo_SAC=($privilegio=="SAC");
//Cerramos la conexión con la Base de datos
mysqli_close($conexiondb);
?>