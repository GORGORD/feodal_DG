<?php

require("user/User.php");
require("db/DB.php");
require("chat/Chat.php");
require("game/Game.php");

class Application {
    function __construct(){
        $db = new DB();
        $this->user = new User($db);
        $this->chat = new Chat($db);
        $this->game = new Game($db);
    }

    //функция проверки полученных значений в запросе
    function validQuery($value,$type) {
    }

    public function login($params) {
        if ($params['login'] && $params['password']) {
        return $this->user->login($params['login'],$params['password']);
        }
    }

    public function registration($params) {
        [
        'login' => $login,
        'password' => $password,
        'name' => $name
        ] = $params;
        if ($login && $password && $name) {
            return $this->user->registration($login,$password,$name);
        }
    }

    public function logout($params) {
            $user=$this->user->getUser($params['token']);
            if ($user){
                return $this->user->logout($user);
            }
    }

    public function sendMessage($params) {
        ['token'=>$token,
        'message'=>$message,
        'to'=>$to
        ] = $params;
        $user = $this->user->getUser($token);
        if ($user && $message) {
            return $this->chat->sendMessage($user, $message, $to);
        }
    }
    
    public function getMessages($params) {
        $user = $this->user->getUser($params['token']);
        if ($user) {
            return $this->chat->getMessages($user);
        }
    }

    public function getMap($params) {
        $user = $this->user->getUser($params['token']);
        if ($user) {
            return $this->game->getMap($user);
        }
    }

    public function getCastle($params) {
        $user = $this->user->getUser($params['token']);
        if ($user) {
            return $this->game->getCastle($user);
        }
    }

    public function castleLevelUp($params){
        $user = $this->user->getUser($params['token']);
        if ($user){
            return $this->game->castleLevelUp($user);
        }
    }

    public function getScene($params) {
        $user = $this->user->getUser($params['token']);
        if ($user) {
            return $this->game->getScene($user);
        }
    }

    public function command($params) {
        $user = $this->user->getUser($params['token']);
        if ($user) {
            return $this->game->command($user, $params['token']);
        }
    }

}