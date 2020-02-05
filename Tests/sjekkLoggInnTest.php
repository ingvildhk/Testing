<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel

class sjekkLoggInnTest extends PHPUnit\Framework\TestCase {
    public function testSjekkLoggInn() {
        //arrange
        $bankLogikk = new Bank(new BankDBStub());
        $personnummer = "12345678912";
        $passord = "123Passord123";                
        //act
        $OK = $bankLogikk->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals("Innlogging OK!", $OK);
    }
    
    public function testSjekkLoggInnFeil() {
        //arrange
        $bankLogikk = new Bank(new BankDBStub());
        $personnummer = "12345678912";
        $passord = "123Passord";                
        //act
        $OK = $bankLogikk->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals("Innlogging feilet!", $OK);
    }
    
}

