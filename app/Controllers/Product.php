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
            'result' => $result,
            'id' => $id
        );

        echo view('templates/header');
        echo view('view_product', $data);
        echo view('templates/footer');
        
    }

    public function edit($id){
        // $id = $this->request->get('id', true);

        // print_r($id);
        $model = new ProductModel();
        $result = $model->getProduct($id);
        

        $data = array(
            'result' => $result,
            'id' => $id
        );


        echo view('templates/header');
        echo view('edit_product', $data);
        echo view('templates/footer');
        
    }

    public function edit_action($id){

        $name = $this->request->getPOST('name');
        $price = $this->request->getPOST('price');
        $category = $this->request->getPOST('category');

        $data = [
           'name' => $name,
           'price' => $price,
           'category' => $category
       ];
       // data fetch from model so create new object and call from model function
       // URL Path in view--- Controller -> Method -> Parameter

        $model = new ProductModel();
        $result = $model->editProduct($id, $data);
        return redirect()->to('product');
    }

    public function delete_action($id){
        
        $model = new ProductModel();
        $result = $model->deleteProduct($id);
        print_r($result);
        return redirect()->to('product');
    }

}   
