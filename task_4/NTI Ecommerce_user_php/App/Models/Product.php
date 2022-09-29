<?php 
namespace App\Database\Models; 

use App\Database\Models\Contract\HasCrud;

class Product extends Model  implements HasCrud  {
    private $id,$name_en,$name_ar,$price,$product_code,$quantity,
    $status,$details_en,$details_ar,$image,$brand_id,$subcategroy_id,$category_id,
    $created_at,$updated_at;
    private const ACTIVE = 1;

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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of product_code
     */ 
    public function getProduct_code()
    {
        return $this->product_code;
    }

    /**
     * Set the value of product_code
     *
     * @return  self
     */ 
    public function setProduct_code($product_code)
    {
        $this->product_code = $product_code;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of details_en
     */ 
    public function getDetails_en()
    {
        return $this->details_en;
    }

    /**
     * Set the value of details_en
     *
     * @return  self
     */ 
    public function setDetails_en($details_en)
    {
        $this->details_en = $details_en;

        return $this;
    }

    /**
     * Get the value of details_ar
     */ 
    public function getDetails_ar()
    {
        return $this->details_ar;
    }

    /**
     * Set the value of details_ar
     *
     * @return  self
     */ 
    public function setDetails_ar($details_ar)
    {
        $this->details_ar = $details_ar;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of subcategroy_id
     */ 
    public function getSubcategroy_id()
    {
        return $this->subcategroy_id;
    }

    /**
     * Set the value of subcategroy_id
     *
     * @return  self
     */ 
    public function setSubcategroy_id($subcategroy_id)
    {
        $this->subcategroy_id = $subcategroy_id;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

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
        $query = "SELECT id,name_en,details_en,price,image FROM products WHERE status = ".self::ACTIVE." ORDER BY price , name_en";
        return $this->conn->query($query);
    }
    public function getProductsByBrand() :\mysqli_result
    {
        $query = "SELECT id,name_en,details_en,price,image FROM product_details WHERE status = ".self::ACTIVE." AND brand_id = ? ORDER BY price , name_en";
        $stmt =  $this->conn->prepare($query);
        $stmt->bind_param('i',$this->brand_id);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function getProductsBySub() :\mysqli_result
    {
        $query = "SELECT id,name_en,details_en,price,image FROM product_details WHERE status = ".self::ACTIVE." AND subcategory_id = ? ORDER BY price , name_en";
        $stmt =  $this->conn->prepare($query);
        $stmt->bind_param('i',$this->subcategroy_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getProductsByCat() :\mysqli_result
    {
        $query = "SELECT id,name_en,details_en,price,image FROM product_details WHERE status = ".self::ACTIVE." AND category_id = ? ORDER BY price , name_en";
        $stmt =  $this->conn->prepare($query);
        $stmt->bind_param('i',$this->category_id);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    public function find() :\mysqli_result
    {
        $query = "SELECT * FROM product_details WHERE status = ".self::ACTIVE." AND id = ?";
        $stmt =  $this->conn->prepare($query);
        $stmt->bind_param('i',$this->id);
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }
}