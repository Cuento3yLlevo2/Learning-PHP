<?php 

namespace App\Models;

class Project extends BaseElement {

    public $technologies = [];

    public function __construct($title, $description, $technologies) {
        parent::__construct($title, $description);
        $this->technologies = $technologies;
    }

    function printTechnologies() {

        foreach ($this->technologies as $key => $value) {
            echo '<span class="badge badge-secondary">'. $value .'</span>';
        }

    }

}