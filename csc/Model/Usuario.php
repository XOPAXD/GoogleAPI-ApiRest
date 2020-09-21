<?php
class Usuario {

        private $id;
        private $nome;
        private $telefone;
        private $email;
        private $data_reg;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getEnderecoId() {
            return $this->enderecoid;
        }

        public function setEnderecoId($enderecoid) {
            $this->enderecoid = $enderecoid;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getData() {
            return $this->data_reg;
        }

        public function setData($data_reg) {
            $this->data_reg = $data_reg;
        }
    }

