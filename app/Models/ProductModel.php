<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $allowedFields = ['name', 'price', 'category'];

    
    public function getAllProducts() {
        return $this->findAll();
    }
    
    // public function saveProduct($name, $price, $category) {
        //     return $this->insert(array('name' => $name, 'price' => $price, 'category'=>$category));
        // }
    public function getProduct($id) {
        return $this->find($id);
    }


}