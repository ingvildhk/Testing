<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class registrerBetalingTest extends PHPUnit\Framework\TestCase {
    
    public function testRegistrerBetaling_feil(){
        // arrange
        $kontoNr = -11223344556;
        $transaksjon = 123;
        $bank=new Bank(new BankDBStub());
        // act
        $ok= $bank->registrerBetaling($kontoNr, $transaksjon);
        // assert
        $this->assertEquals("Feil",$ok); 
    }
    
    public function testRegistrerBetaling_riktig(){
        // arrange
        $kontoNr = 11223344556;
        $transaksjon = 123;
        $bank=new Bank(new BankDBStub());
        // act
        $ok= $bank->registrerBetaling($kontoNr, $transaksjon);
        // assert
        $this->assertEquals("OK",$ok); 
    } 
}
