<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel
//Caroline


class endreKundeInfoTest extends PHPUnit\Framework\TestCase {
    public function testEndreKundeInfo_OK() 
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
    
    public function testEndreKundeInfo_Feil() 
    {
        // arrange
        $kunde = new kunde();
        $kunde->postnr = 0;
        $kunde->poststed = 0;
        $bank=new Bank(new BankDBStub());

        // act
        $OK= $bank->endreKundeInfo($kunde);
        // assert
        $this->assertEquals("Feil",$OK); 
    }
    
}
