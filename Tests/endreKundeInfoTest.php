<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class endreKundeInfoTest extends PHPUnit\Framework\TestCase {
    public function testEndreKundeInfo_OK_Postnr_i_db() 
    {
        // arrange
        $kunde = new kunde();
        $kunde->postnr = "2121";
        $kunde->poststed = "Oslo";
        $bank=new Bank(new BankDBStub());

        // act
        $OK= $bank->endreKundeInfo($kunde);
        // assert
        $this->assertEquals("OK",$OK); 
    }
    
    public function testEndreKundeInfo_OK_Postnr_ikke_i_db() 
    {
        // arrange
        $kunde = new kunde();
        $kunde->postnr = "1000";
        $kunde->poststed = "Oslo";
        $bank=new Bank(new BankDBStub());

        // act
        $OK= $bank->endreKundeInfo($kunde);
        // assert
        $this->assertEquals("OK",$OK); 
    }
    
    public function testEndreKundeInfo_Feil() 
    {
        // arrange
        $kunde = new kunde();
        $kunde->postnr = "1000";
        $kunde->poststed = "Bergen";
        $bank=new Bank(new BankDBStub());

        // act
        $OK= $bank->endreKundeInfo($kunde);
        // assert
        $this->assertEquals("Feil",$OK); 
    }
}