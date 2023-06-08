<?php

use CodeIgniter\Model;

class ProductCategoryModel extends Model
{

    protected $table      = 'product_categorys';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'image', 'status'];

    // protected $beforeInsert = ['hashPassword'];
    // protected $beforeUpdate = ['hashPassword'];

}