<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $allowedFields = ['name', 'price', 'category'];

    
    public function getAllProducts() {
        // return $this->orderBy('id', 'desc')->findAll();
        $sql="Select * from products where 1 order by id desc";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    
    // public function saveProduct($name, $price, $category) {
        //     return $this->insert(array('name' => $name, 'price' => $price, 'category'=>$category));
        // }
    public function checkProductExists($name) {
        $sql="Select * from products where name='$name'";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    
    public function getProduct($id) {
        return $this->find($id);
    }

    public function editProduct($id, $data) {
        // UPDATE
        return $this->where('id', $id)
        ->set($data)
        ->update();
    }    
    
    
    public function deleteProduct($id) {
        // Delete
        return $this->where('id', $id)->delete();
    }    
    
    


}