<?php
    class Chat {
        function __construct($db) {
            $this->db = $db;
        }

        public function sendMessage($from, $message, $to) {
            return $this->db->addMessage($from, $message, $to);
        }

        public function getMessages($user) {
            return $this->db->getMessages($user->id);
        }
    }