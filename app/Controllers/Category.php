<?php

namespace App\Controllers;
// namespace App\Models;

use App\Models\CategoryModel;

class Category extends BaseController
{
    public function index()
    {
        // Create a new class manually
        $model = new CategoryModel();
        $categories = $model->getAllCategories();
        $data = ['categories' => $categories, 'empty' => count($categories) == 0];

        echo view('templates/header');
        echo view('list_categories', $data);
        echo view('templates/footer');
    }

    public function add($err = '')
    {
        echo view('templates/header');
        echo view('add_categories', ['err' => $err]);
        echo view('templates/footer');
    }

    public function add_action()
    {
        $model = new CategoryModel();
        $name = $this->request->getVar('name');
        $description = $this->request->getVar('description');

        if(!$name) {
            return redirect()->to('category/add/err');
        }

        // fetch record from DB
        $isExists = $model->checkProductExists($name);
        if($isExists) {
            return redirect()->to('category/add/exists');
        }

        $data = ['name'=> $name,
                 'description'=>$description];

        $model->addCategory($data);
        return redirect()->to('category');
    }

    public function view($id){
        $model = new CategoryModel();
        $result = $model->getCategory($id);

        $data = array(
            'result' => $result,
            'id' => $id
        );

        echo view('templates/header');
        echo view('view_category', $data);
        echo view('templates/footer');
    }

    public function edit($id){
        $model = new CategoryModel();
        $result = $model->getCategory($id);

        $data = array(
            'result' => $result,
            'id' => $id
        );

        echo view('templates/header');
        echo view('edit_category', $data);
        echo view('templates/footer');
    }

    public function edit_action($id)
    {
        $name = $this->request->getPost('name');
        $description = $this->request->getPost('description');
        $data = [
            'name' => $name,
            'description' => $description
        ];

        $model = new CategoryModel();
        $result = $model->editCategory($id, $data);
        return redirect()->to('category');
    }

    public function delete_action($id){
        
        $model = new CategoryModel();
        $result = $model->deleteCategory($id);
        print_r($result);
        return redirect()->to('category');
    }
}