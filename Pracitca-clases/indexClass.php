<?php

class Contacto 
{

    private $nombre;
    private $telefono;
    private $email;

    public function __construct(string $nombre, string $telefono, string $email) {

        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;

    }

    public function getInformacion() : string
    {
        return "nombre: ". $this->nombre . "  telefono: ". $this->telefono. "  email: ". $this->email;
    }

    public function getMetodoNuevo() : string
    {
        return "El nomnre del tipo es: ". $this->nombre . " y tenes que mandarle un mail a la siguiente casilla: " . $this->email;
    } 

}

$contactoNuevo = new Contacto("tobias", "1234567890", "stanislavskytobias@gmail.com");
$contactoNuevo1 = new Contacto("fernando", "098765431", "fernando@gmail.com");

echo $contactoNuevo->getMetodoNuevo() . "<br>";
echo $contactoNuevo1->getInformacion() . "<br>";