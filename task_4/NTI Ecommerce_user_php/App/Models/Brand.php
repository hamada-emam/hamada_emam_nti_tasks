<?php

namespace App\Database\Models;

use App\Database\Models\Contract\HasCrud;

class Brand extends Model  implements HasCrud  {

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
}