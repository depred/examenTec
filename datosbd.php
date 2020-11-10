<?php
include 'operaciones.php';

if(isset($_POST['submit'])) {
    $correo=$_POST['v_email'];
    $pass=$_POST['v_pass'];
    $twitter=$_POST['v_twitter'];
    $facebook=$_POST['v_facebook'];
    $gplus=$_POST['v_gplus'];
    $nombre=$_POST['v_nombres'];
    $ape=$_POST['v_apellidos'];
    $tel=$_POST['v_telf'];
    $dir=$_POST['v_direccion'];

    echo "Tus datos se guardaron correctamente";
    $oMySql = new Operaciones();
    $oMySql->usuario($correo,$pass,$twitter,$facebook,$gplus,$nombre,$ape,$tel,$dir);

    

} else {
    exit();
}
?>