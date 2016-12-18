<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * model validation rules
     * @var array
     */
    public static $validationRules = [
        'name' => 'required',
        'quantity' => 'required|numeric',
        'price' => 'required',
    ];
    
    protected $fillable = ['name', 'quantity', 'price'];
    
    
    public function getName() {
        return $this->getAttribute('name');
    }

    public function setName($value) {
        $this->setAttribute('name', $value);
        return $this;
    }
    
    public function getQuantity() {
        return $this->getAttribute('quantity');
    }

    public function setQuantity($value) {
        $this->setAttribute('quantity', $value);
        return $this;
    }
    
    public function getPrice() {
        return $this->getAttribute('price');
    }

    public function setPrice($value) {
        $this->setAttribute('price', $value);
        return $this;
    }
}
