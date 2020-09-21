<?php
class Endereco {

        private $id;
        private $logradoouro;
        private $numero;
        private $complemento;
        private $data_reg;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getLogradouro() {
            return $this->logradoouro;
        }

        public function setLogradouro($logradoouro) {
            $this->logradoouro = $logradoouro;
        }

        public function getLat() {
            return $this->lat;
        }

        public function setLat($lat) {
            $this->lat = $lat;
        }

        public function getLng() {
            return $this->lng;
        }

        public function setLng($lng) {
            $this->lng = $lng;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
        }

        public function getComplemento() {
            return $this->complemento;
        }

        public function setComplemento($complemento) {
            $this->complemento = $complemento;
        }

        public function getData() {
            return $this->data_reg;
        }

        public function setData($data_reg) {
            $this->data_reg = $data_reg;
        }
    }

