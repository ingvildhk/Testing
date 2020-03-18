<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentKundeInfoTest extends PHPUnit\Framework\TestCase {
    
    public function test_hentKundeInfo_OK () {
        
        //arrange
        $enKunde = new kunde();
        $enKunde->personnummer = 123456789;
        $enKunde->navn = "Per Olsen";
        $enKunde->adresse = "Osloveien 82, 0270 Oslo";
        $enKunde->telefonnr="12345678";
        $bank=new Bank(new BankDBStub());
        //act
        $kunde= $bank->hentKundeInfo($enKunde->personnummer);
        // assert
        $this->assertEquals($kunde->personnummer,$enKunde->personnummer);
        $this->assertEquals($kunde->navn,$enKunde->navn); 
        $this->assertEquals($kunde->adresse,$enKunde->adresse); 
        $this->assertEquals($kunde->telefonnr,$enKunde->telefonnr); 
    }   
}
