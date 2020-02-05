<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';


class hentKontiTest extends PHPUnit\Framework\TestCase {
    public function testHentKonti() {
        //arrange
        $bankLogikk = new Bank(new BankDBStub());
        $personnummer = 12345678912;        
        //act
        $konto = $bankLogikk->hentKonti($personnummer);
        //assert
        $this->assertEquals("12345678912", $konto->personnummer);
        $this->assertEquals("12033812345", $konto->kontonummer);
        $this->assertEquals("Spare", $konto->type);
        $this->assertEquals(66899.77, $konto->saldo);
        $this->assertEquals("NOK", $konto->valuta);
    }
    
    public function testHentKontiFeil(){
        //arrange
        $bankLogikk = new Bank(new BankDBStub());
        $personnummer = -12345678912;  
        //act
        $konto = $bankLogikk->hentKonti($personnummer);
        //assert
        $this->assertEquals("Feil", $konto);
    }
}
