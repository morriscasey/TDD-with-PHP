<?php
    require_once('Dollar.php');
    
    class MoneyTest extends PHPUnit_Framework_TestCase
    {
        public function setUP(){}
        
        public function tearDown(){}
        
        //Test Dollar
        public function testMultiplication(){
            $five = Money::dollar(5);
            assertEquals(Money::dollar(10)->getAmount(), $five->times(2)->getAmount());
            assertEquals(Money::dollar(15)->getAmount(), $five->times(3)->getAmount());
        }
        
        //Test Franc
        public function testFrancMultiplication(){
            $five = Money::franc(5);
            assertEquals(Money::franc(10)->getAmount(), $five->times(2)->getAmount());
            assertEquals(Money::franc(15)->getAmount(), $five->times(3)->getAmount());
        }
        
        //Test equality between dollar/dollar, franc/dollar, and fran/franc
        public function testEquality(){
            assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
            assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
            assertTrue(Money::franc(5)->equals(Money::franc(5)));
            assertFalse(Money::franc(5)->equals(Money::franc(6)));
            assertFalse(Money::franc(5)->equals(Money::dollar(5)));
        }
        
        //Test to make sure currency is recognized based on type
        public function testCurrency(){
            assertEquals("USD", Money::dollar(1)->currency());
            assertEquals("CHF", Money::franc(1)->currency());
        }
    }
?>