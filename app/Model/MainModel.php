<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MainModel extends Model
{
    
    public function findByString($string) {
        $obj = DB::table($this->table)->where($this->name, $string)->get();
        return $obj;
    }
}
