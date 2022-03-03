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

    public function add()
    {
        echo view('templates/header');
        echo view('add_categories');
        echo view('templates/footer');
    }

    public function add_action()
    {
        $name = $this->request->getPost('name');
        $description = $this->request->getPost('description');
        $data = [
            'name' => $name,
            'description' => $description
        ];

        $model = new CategoryModel();
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