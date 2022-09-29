<?php

namespace App\Database\Models;

use App\Database\Models\Contract\HasCrud;

class Spec extends Model  implements HasCrud  {
    private $id,$name_en,$product_id,$name_ar,$value;
    
    public function create() :bool
    {
        # code...
    }

    public function update() :bool
    {
        # code...
    }

    public function delete() :bool
    {
        # code...
    }

    public function read() :\mysqli_result
    {
        return $this->conn->query("SELECT id,image FROM brands where status = 1 ORDER BY name_en");
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name_en
     */ 
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */ 
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * Get the value of name_ar
     */ 
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */ 
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function get()
    {
        $query= "SELECT products_specs.* , specs.name_en FROM specs JOIN products_specs ON specs.id = products_specs.spec_id WHERE product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$this->product_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }
}