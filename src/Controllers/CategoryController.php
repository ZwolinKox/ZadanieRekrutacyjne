<?php

namespace Aurora\Controllers;
use Aurora;
use Aurora\View;
use Aurora\Auth\Auth;
use Aurora\Database\Database;
use Aurora\Validator;

class CategoryController {
    public function categories() {

        $db = new Database();
        
        $categories = $db->getElements('category');

        $errors = [];


        if(isset($_SESSION['errors']) && \is_array($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }

        return View::render('category', ['categories' => $categories, 'errors' => $errors]);
    }

    public function newCategory() {

        $validator = new Validator();

        $aliases = [
            'categoryName' => 'Nazwa kategorii',
        ];

        $validation = $validator->validate($aliases, $_POST, [
            'categoryName'                  => 'required|max:50',
        ]);
        

        if ($validation->fails()) {
            // handling errors
            $_SESSION['errors'] = $validation->errors()->toArray();

            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }

        $db = new Database();

        $db->insert('category', [
        'name' => $_POST['categoryName']
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function editCategory($id) {

        $validator = new Validator();

        $aliases = [
            'categoryName' => 'Nazwa kategorii',
        ];

        $validation = $validator->validate($aliases, $_POST + ['id' => $id], [
            'categoryName'                  => 'required|max:50',
            'id'                            => 'required|numeric'
        ]);
        
        $_SESSION['errors'] = [];

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->toArray();

            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }

        $db = new Database();

        
        if(!$db->exist('category', $id)) {
            \array_push($_SESSION['errors'], ['Taka kategoria nie istnieje']);
            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }


        $db->update('category', ['id' => $id], [
            'name' => $_POST['categoryName']
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);

        exit;
    }

    public function deleteCategory($id) {

        $validator = new Validator();

        $validation = $validator->validate([], ['id' => $id], [
            'id'                            => 'required|numeric'
        ]);
        
        $_SESSION['errors'] = [];

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->toArray();

            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }

        $db = new Database();

        
        if(!$db->exist('category', $id)) {
            \array_push($_SESSION['errors'], ['Taka kategoria nie istnieje']);
            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }

        $db->delete('category', ['id' => $id]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}