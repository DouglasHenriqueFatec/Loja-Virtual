<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baseModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = true; // created_at and updated_at
    public $incrementing = true;
    protected $fillable = [];

    public function beforeSave()
    {
        return true;
    }

    public function save(array $options = [])
    {
        try {
            if (!$this->beforeSave()) {
                return false;
            }

            return parent::save($options);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
