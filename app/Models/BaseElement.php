<?php

class BaseElement {
    
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

  }