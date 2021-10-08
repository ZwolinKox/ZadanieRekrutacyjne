<?php

namespace Aurora\Controllers;
use Aurora\View;
use Aurora\Auth\Auth;

class AuthController {
    
    public function login() {
        return View::render('login');
    }

    public function register() {
        return View::render('register');
    }
    
    public function loginUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(Auth::login($email, $password))
            header('Location: ./home');
        else {
            return View::render('login', ['error' => 'Nie udało się zalogować']);
        }

    }

    public function registerUser() {
        $isError = false;
        $errors = [];

        $password = $_POST['password'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $secondPassword = $_POST['password_confirmation'];

        //Nie zdążyłem poprawić tej wersji "walidacji" na tę z użyciem walidatora
        if($password === null) {
            $isError = true;
            $errors['errorPassword'] = "Hasło nie może być puste";
        }

        if($password === null) {
            $isError = true;
            $errors['errorEmail'] = "Email nie może być pusty";
        }

        if($password === null) {
            $isError = true;
            $errors['errorName'] = "Nazwa nie może być pusta";
        }

        if($password === null) { 
            $isError = true;
            $errors['errorSecondPassword'] = "Pole potwierdź hasło nie może być puste";
        }

        if($password != $secondPassword) {
            $isError = true;
            $errors['errorPassword'] = "Hasła się nie zgadzają";
        } elseif(strlen($password) < 8) {
            $isError = true;
            $errors['errorPassword'] = "Hasło powinno mieć minimum 8 znaków";
        }

        if($isError) {
            return View::render('register', $errors);
        }
        
        $register = Auth::register($email, $password, $name);

        if($register) {
            $this->loginUser();
        } else {
            return View::render('register', ['email' => $register]);
        }   
        
    }

    public function logout() {
        Auth::logout();
        header('Location: ./login');
    }
}