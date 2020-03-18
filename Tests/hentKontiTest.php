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
        $this->assertEquals("12345678912", $konto[0]->personnummer);
        $this->assertEquals("12033812345", $konto[0]->kontonummer);
        $this->assertEquals("Spare", $konto[0]->type);
        $this->assertEquals(66899.77, $konto[0]->saldo);
        $this->assertEquals("NOK", $konto[0]->valuta);
        
        $this->assertEquals("12345678912", $konto[1]->personnummer);
        $this->assertEquals("11111111111", $konto[1]->kontonummer);
        $this->assertEquals("Spare", $konto[1]->type);
        $this->assertEquals(200, $konto[1]->saldo);
        $this->assertEquals("NOK", $konto[1]->valuta);
        
        $this->assertEquals("12345678912", $konto[2]->personnummer);
        $this->assertEquals("12345678987", $konto[2]->kontonummer);
        $this->assertEquals("Lonn", $konto[2]->type);
        $this->assertEquals(4234, $konto[2]->saldo);
        $this->assertEquals("NOK", $konto[2]->valuta);
    }
}
