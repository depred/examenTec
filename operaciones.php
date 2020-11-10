<?php
include 'config.php';
class Operaciones
{
    public $oConBD = null;

    public function __construct()
    {
        global $usuarioBD, $passBD, $ipBD, $nombreBD;
        $this->usuarioBD = $usuarioBD;
        $this->passBD = $passBD;
        $this->ipBD = $ipBD;
        $this->nombreBD = $nombreBD;
    }

    /**
     * Conexión BD por PDO
     */
    public function conBDPDO()
    {
        try {
            $this->oConBD = new PDO("mysql:host=" . $this->ipBD . ";dbname=" . $this->nombreBD, $this->usuarioBD, $this->passBD);
            return true;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function usuario($correo, $pass, $twitter, $facebook, $googlep, $nombre, $apellido, $tel, $direccion)
    {
        try {
            $query = "
            insert into usuario
                (correo,pass,twitter,facebook,googlep,nombre,apellido,tel,direccion)
            values
                (:correo,:pass,:twitter,:facebook,:googlep,:nombre,:apellido,:tel,:direccion)
            ";
            if ($this->conBDPDO()) {
                $pQuery = $this->oConBD->prepare($query);            
                $pQuery->bindParam(':correo', $correo);
                $pQuery->bindParam(':pass', $pass);
                $pQuery->bindParam(':twitter', $twitter);
                $pQuery->bindParam(':facebook', $facebook);
                $pQuery->bindParam(':googlep', $googlep);
                $pQuery->bindParam(':nombre', $nombre);
                $pQuery->bindParam(':apellido', $apellido);
                $pQuery->bindParam(':tel', $tel);
                $pQuery->bindParam(':direccion', $direccion);
                $pQuery->execute();
                $this->oConBD = null;
            }
        } catch (PDOException $e) {
            echo ("MysSQL.insertarPDO -- " . $e->getMessage() . "\n");
        }
    }
}
