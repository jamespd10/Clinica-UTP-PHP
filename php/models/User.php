<?php
class User {
    private $id;
    private $cedula;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $tipoUsuario;
    private $foto;

    public function __construct($id, $nombre, $apellido, $email, $tipoUsuario, $foto, $telefono, $cedula) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->tipoUsuario = $tipoUsuario;
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->cedula = $cedula;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCedula() {
        return $this->cedula;
    }
}