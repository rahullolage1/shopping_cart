<?php

namespace App\Controllers;
// namespace App\Models;

use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {
        // Create a new class manually
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        $data = array(
            'products' => $products
        );

        echo view('templates/header');
        echo view('list_product', $data);
        echo view('templates/footer');
    }

    public function add() {
        echo view('templates/header');
        echo view('add_product');
        echo view('templates/footer');
    }

    public function add_action(){
        // print_r($this->request->getMethod());

       $data =['name' => $this->request->getVar('name'),
               'price' => $this->request->getVar('price'),
               'category' => $this->request->getVar('category')];
            
        // print_r($data);

        $model = new ProductModel();
        $model->insert($data);
        // $productModel = new ProductModel();
        // $result = $productModel->saveProduct($name, $price, $category);
        // print_r($result);
        return redirect()->to('product');
    }

    public function view($id){
        // $id = $this->request->get('id', true);

        // print_r($id);
        $model = new ProductModel();
        $result = $model->getProduct($id);
        

        $data = array(
            'result' => $result
        );

        echo view('templates/header');
        echo view('view_product', $data);
        echo view('templates/footer');
        
    }
}   
