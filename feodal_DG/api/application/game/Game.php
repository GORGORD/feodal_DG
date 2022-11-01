<?php
    class Game {
        function __construct($db) {
            $this->db = $db;
        }

        public function getMap($user) {
            return 'Map';
        }

        public function getScene($user) {
            return 'Scene';
        }

        public function getCastle($user) {
            return $this->db->getCastle($user->id);
        }
        public function castleLevelUp($user){
            return $this->db->castleLevelUp($user->id);
        }

        public function command($user, $command) {
            return $command;
        }
    }