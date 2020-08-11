<?php

namespace App\Models;

// las interfaces solo utilizan metodos publicos
interface Printable {
    public function getDescription();
}