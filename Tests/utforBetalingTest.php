<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel
//Ubestemt

class utforBetalingTest extends PHPUnit\Framework\TestCase {
    
    public function test_utforBetaling_OK () {
        //arrange
        $bank = new Bank(new BankDBStub());
        //act
        $OK = $bank->utforBetaling(1);
        //assert
        $this->assertEquals("OK", $OK);   
    }
    
    public function test_utforBetaling_Feil () {
        //arrange
        $bank = new Bank(new BankDBStub());
        //act
        $OK = $bank->utforBetaling(2);
        //assert
        $this->assertEquals("Feil", $OK); 
    }
    
}
