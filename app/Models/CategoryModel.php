<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'category';
    protected $allowedFields = ['name', 'description'];

    public function getAllCategories() {
        return $this->findAll();
    }

    public function getCategory($id) {
        // SELECT * FROM products
        return $this->find($id);
    }

    public function addCategory($data) {
        // INSERT INTO
        return $this->insert($data);
    }

    public function editCategory($id, $data) {
        // UPDATE
        return $this->where('id', $id)
        ->set($data)
        ->update();
    }
}