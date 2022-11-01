<?php
    class DB {
        function __construct() {
            $host = 'localhost';
            $port = '3306';
            $name = 'Feodal';
            $user = 'root';
            $password = '';

            try {
                $this->db = new PDO(
                    'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $name,
                    $user,
                    $password
                );
            }

            catch(Exception $e) {
                print_r($e->getMessange());
                die;
            }
        }

        function __destruct() {
            $this->db = null;
        }

        public function getUser($login) {
            $query = 'SELECT * FROM users WHERE login="' . $login . '"';
            return $this->db->query($query)->fetchObject();
        }

        public function getCastle($user) {
            $query = 'SELECT * FROM castles WHERE idOwner=' . $user;
            return $this->db->query($query)->fetchObject();
        }

        public function castleLevelUp($id){

            $query = 'UPDATE castles SET level= level + 1  WHERE id=' . $id ;
            $this->db->query($query);
            return true;
        }

        public function getGold($user){
            $query = 'SELECT gold FROM castles WHERE idOwner=' . $user;
            return $this->db->query($query)->fetchObject();
        }

        public function updateGold($id,$gold){
            $query = 'UPDATE castles SET gold=gold +'. $gold . '   WHERE id=' . $id ;
            $this->db->query($query);
            return true;

        }

        public function getUserByToken($token) {
            $query = 'SELECT * FROM users WHERE token="' . $token . '"';
            return $this->db->query($query)->fetchObject();
        }

        public function updateToken($id,$token){
            $query = 'UPDATE users SET token="' . $token . '" WHERE id="' . $id . '"';
            $this->db->query($query);
            return true;
        }

        public function addUser($login,$password,$name) {
            $query = 'INSERT INTO users (login, password, name) VALUES ("' . $login . '","' . md5($password) . '","' .  $name . '")';
            $this->db->query($query);
        }

        public function addMessage($from, $message, $to=0){
            $query = 'INSERT INTO messages (fromUser, message, toUser) VALUES (' . $from->id . ',"' . $message . '",' .  $to . ')';
            $this->db->query($query);
            return true;
        }

        public function getMessages($user) {
            $query = 'SELECT name,message,toUser FROM messages,users WHERE messages.fromUser=users.id and (toUser=' . $user . ' or toUser=0) ORDER BY time';
            return $this->getArray($query);
        }
        public function proverka($q){
            return 23453453663;
        }

        private function getArray($query) {
            $stmt = $this->db->query($query);
            if ($stmt) {
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $result[] = $row;
                }
                return $result;
            }
        }
        
    }


