<?php

namespace Aurora\Auth;

use Aurora\Database;
use Carbon\Carbon;

class Auth {
    public static function isLogin() : bool {
        if(isset($_SESSION['login']) && $_SESSION['login'])
            return true;
        return false;
    }   

    public static function user(){
        $db = new Database\Database();        
        return $db->getElementById('user', $_SESSION['id']);
    }

    public static function setUser(int $id) {
        $_SESSION['id'] = $id; 
        $_SESSION['login'] = true;
    }

    public static function login(string $email, string $password) : bool {
        $db = new Database\Database();
        
        $user = $db->getElement('user', ['email' => $email, 'password' => md5($password)]);

        if(!is_object($user))
            return false;

        Auth::setUser($user->id);

        return true;
        
    }

    public static function logout() {
        $_SESSION['login'] = false;
        $_SESSION['id']  = null;
        unset($_SESSION['login']);
        unset($_SESSION['id']);

        session_destroy();
    }

    public static function register(string $email, string $password, string $name) {
        $db = new Database\Database();

        if(is_object($db->getElement('user', ['email' => $email])))
            return 'Istnieje użytkownik o podanym emailu';

        $db->insert('user', ['name' => $name, 'password' => md5($password), 'email' => $email, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        return true;
    }

}