<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel

class hentKontiTest extends PHPUnit\Framework\TestCase {
    public function testHentKonti() {
    //arrange
        $bank = new Bank(new BankDBStub());
        $personnummer = 01016522344;        
        //act
        $konto = $bank->hentKonti($personnummer);
        //assert
        $this->assertEquals("12345678912", $konto->personnummer);
        $this->assertEquals("12033845678", $konto->kontonummer);
        $this->assertEquals("Spare", $konto->type);
        $this->assertEquals("25900.97", $konto->saldo);
        $this->assertEquals("NOK", $konto->valuta); 
        }
}
