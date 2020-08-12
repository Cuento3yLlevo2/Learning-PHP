<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model {
    protected $table = 'technologies';
}

// class Projects_technologies_relation extends Model {
//     protected $table = 'projects_technologies_relation';
    
//     function printTechnologies() {

//         foreach ($this->technologies as $key => $value) {
//             echo '<span class="badge badge-secondary">'. $value .'</span>';
//         }

//     }

// }
