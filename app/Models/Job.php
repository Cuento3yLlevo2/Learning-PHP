<?php

require_once 'BaseElement.php';

class Job extends BaseElement {

    public $visible;
    public $months;

    public function __construct($title, $description, $visible, $months) {
        parent::__construct($title, $description);
        $this->visible = $visible;
        $this->months = $months;
    }

    // funcion con operadores ternarios
    // sentencia booleana ? valor si la sentencia es cierta : valor si es falsa
    public function getDurationAsString() {
        $years = floor($this->months / 12);
        $xtramonths = $this->months % 12;
        return ($years >= 1 ? "$years years" . ($xtramonths != 0 ? " and $xtramonths months" : "") : "$this->months months");
      }

}