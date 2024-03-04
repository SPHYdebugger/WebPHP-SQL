<?php
class Client implements JsonSerializable {
    private $DNI;
    private $nombre;
    private $email;

    public function __construct($DNI,$nombre, $email) {

        $this->DNI = $DNI;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function getDNI() {
        return $this->DNI;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function jsonSerialize() {
        return [
            'DNI' => $this->DNI,
            'nombre' => $this->nombre,
            'email' => $this->email,
        ];
    }
}

?>


