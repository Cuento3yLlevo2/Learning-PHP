<?php

namespace App\Models;

require_once 'app/Models/Printable.php';

class BaseElement implements Printable {
    
    private $title;
    public $description;
    
  
    public function __construct($title, $description) {
      $this->title = $title; 
      $this->description = $description;
    }
  
    
    public function setTitle($jobTitle) {
      $this->title = $title;
    }
  
    public function getTitle() {
      return $this->title;
    }

    public function getDescription() {
      return $this->description;
   }

  }