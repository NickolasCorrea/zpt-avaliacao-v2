<?php

namespace CompanyClient;

use Company\Company;

class CompanyClient extends Company {
    private int $registration; 
    
    public function __construct($id, $registration) {
        parent::__construct($id); 
        $this->registration = $registration;
    }

    public function greetings() {
        return "Greetings. Your ID is $this->id and registration is $this->registration";
    }
}

?>