<?php

namespace Aurora\Controllers;
use Aurora\View;
use Aurora\Auth\Auth;


class HomeController {
    public function home() {
        return View::render('home');
    }
}