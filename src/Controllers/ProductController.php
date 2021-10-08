<?php

namespace Aurora\Controllers;
use Aurora;
use Aurora\View;
use Aurora\Auth\Auth;
use Aurora\Database\Database;
use Aurora\Validator;

class ProductController {
    public function products() {

        $db = new Database();
        
        $products = $db->sql('SELECT p.id, p.name, p.category_id, p.description, p.status, c.name categoryName FROM product p INNER JOIN category c ON (p.category_id = c.id)');

        $categories = $db->getElements('category');

        $errors = [];


        if(isset($_SESSION['errors']) && \is_array($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }

        return View::render('products', ['products' => $products, 'categories' => $categories, 'errors' => $errors]);
    }

    public function newProduct() {

        $validator = new Validator();

        $aliases = [
            'productName' => 'Nazwa produktu',
            'categoryId' => 'Kategoria',
            'productDescription' => 'Opis produktu',
            'productStatus' => 'Status produktu'
        ];

        $validation = $validator->validate($aliases, $_POST, [
            'productName'                  => 'required|max:50',
            'categoryId'                 => 'required|numeric',
            'productDescription'              => 'required|max:200',
            'productStatus'      => 'required|numeric|min:1|max:3',
        ]);
        

        if ($validation->fails()) {
            // handling errors
            $_SESSION['errors'] = $validation->errors()->toArray();

            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }

        $db = new Database();

        if(!$db->exist('category', $_POST['categoryId'])) {
            \array_push($_SESSION['errors'], ['Taka kategoria nie istnieje']);
            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }

        $db->insert('product', [
            'name' => $_POST['productName'],
            'category_id' => $_POST['categoryId'],
            'description' => $_POST['productDescription'],
            'status' => $_POST['productStatus']
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function editProduct($id) {
        
        $validator = new Validator();

        $aliases = [
            'productName' => 'Nazwa produktu',
            'categoryId' => 'Kategoria',
            'productDescription' => 'Opis produktu',
            'productStatus' => 'Status produktu'
        ];

        $validation = $validator->validate($aliases, $_POST + ['id' => $id], [
            'id'                           => 'required|numeric',
            'productName'                  => 'required|max:50',
            'categoryId'                 => 'required|numeric',
            'productDescription'              => 'required|max:200',
            'productStatus'      => 'required|numeric|min:1|max:3',
        ]);
        
        $_SESSION['errors'] = [];

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->toArray();

            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }
        
        $db = new Database();

        if(!$db->exist('category', $_POST['categoryId'])) {
            \array_push($_SESSION['errors'], ['Taka kategoria nie istnieje']);
            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }

        if(!$db->exist('product', $id)) {
            \array_push($_SESSION['errors'], ['Taki produkt nie istnieje']);
            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }

        $db->update('product', ['id' => $id], [
            'name' => $_POST['productName'],
            'category_id' => $_POST['categoryId'],
            'status' => $_POST['productStatus'],
            'description' => $_POST['productDescription']

        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);

        exit;
    }

    public function deleteProduct($id) {

        $validator = new Validator();

        $validation = $validator->validate([], ['id' => $id], [
            'id'                           => 'required|numeric',
        ]);

        $db = new Database();

        if(!$db->exist('product', $id)) {
            \array_push($_SESSION['errors'], ['Taki produkt nie istnieje']);
            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }

        $db->delete('product', ['id' => $id]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}