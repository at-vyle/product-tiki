<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Models;

class MainModel extends Models
{
    protected $name = 'name';
    
    /**
     * Find Models by String
     *
     * @param string $string input string to find
     *
     * @return App\Models
    */
    public function findByString($string)
    {
        $obj = DB::table($this->table)->where($this->name, 'like', '%'.$string.'%')->get();
        return $obj;
    }
}
