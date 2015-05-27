<?php
    // Base Class for different currencies. Creates instances of dollars and francs
    // Class also retrieves amount and currency type.
    abstract class Money
    {
        //Member variables
        protected $amount;
        protected $currency;
        
         //Getter amount
        function getAmount(){
            return $this->amount;    
        }
        
        //Getter for Currency type
        function currency(){
            return $this->currency;
        }
        
        //Parent Constructor
        function __construct($val, $newCurrency){
            $this->amount = $val;
            $this->currency = $newCurrency;
        }
        
        //Static function that creates an Obj called Dollar
        static function dollar($newAmount){
            return new Dollar($newAmount, "USD");    
        }
        
        //Static function that creates an Obj called Franc
        static function franc($newAmount){
            return new Franc($newAmount, "CHF");    
        }
        
        //Compares amount and currency types
        function equals($compare){
            //compares amount and class
            return $this->amount == $compare->amount && get_class($compare) == get_class($this);
        }
        
        //Multiplies member variable $amount with the variable $multiplier
        abstract protected function times($multiplier);
        
    }
    
    //Class extends Money; Multiples a integer parameter and creates a new instance of multiplied value in Dollars
    class Dollar extends Money
    {
        function times($multiplier){
            return Money::dollar($this->amount * $multiplier);
            //return $this->amount * $multiplier;
        }
        
        function __construct($val, $newCurrency){
            Money::__construct($val, $newCurrency);
        }
        
         
    }
    
    //Class extends Money; Multiples a integer parameter and creates a new instance of multiplied value in Francs
    class Franc extends Money
    {
        function times($multiplier){
            return Money::franc($this->getAmount() * $multiplier);
            //return $this->amount * $multiplier;
        }
        
        function __construct($val, $newCurrency){
            Money::__construct($val, $newCurrency);
        }
        
        
        
    }
?>