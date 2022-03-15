<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'category';
    protected $allowedFields = ['name', 'description'];

    public function getAllCategories() {
        $sql="Select * from category where 1 order by id desc";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function checkProductExists($name) {
        $sql="Select * from category where name='$name'";
        $query = $this->db->query($sql);
        return $query->getResultArray();
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

    public function deleteCategory($id) {
        // Delete
        return $this->where('id', $id)->delete();
    }
}