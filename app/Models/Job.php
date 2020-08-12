<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    protected $table = 'jobs';

  
    // funcion con operadores ternarios
    // sentencia booleana ? valor si la sentencia es cierta : valor si es falsa
    public function getDurationAsString() {
        $years = floor($this->months / 12);
        $xtramonths = $this->months % 12;
        return ($years >= 1 ? "$years years" . ($xtramonths != 0 ? " and $xtramonths months" : "") : "$this->months months");
    }

}