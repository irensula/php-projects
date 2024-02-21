<?php

class Car {

    // properties or fields
    private $brand;
    private $color;
    private $vehicleType = 'car';

    // constructor
    public function __construct($brand, $color = "none") {
        $this->brand = $brand;
        $this->color = $color;
    }

    // getter & setter methods
    public function getBrand() {
        return $this->brand;
    }
    public function setBrand($brand) {
        $this->brand = $brand;
    }
    
    // method
    public function getCarInfo() {
        return "Brand: " . $this->brand . ", Color: " . $this->color;
    }
}