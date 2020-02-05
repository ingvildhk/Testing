<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';


class hentSaldiTest extends PHPUnit\Framework\TestCase {
        public function testHentSaldi() {
        //arrange
        $bankLogikk = new Bank(new BankDBStub());
        $personnummer = 12345678912;  
        //act
        $saldi = $bankLogikk->hentSaldi($personnummer);
        //assert
        $this->assertEquals("42.19",$saldi->saldo);
    }
    
    public function testHentSaldiFeil() {
        //arrange
        $bankLogikk = new Bank(new BankDBStub());
        $personnummer = -12345678912;  
        //act
        $saldi = $bankLogikk->hentSaldi($personnummer);
        //assert
        $this->assertEquals("Feil ved henting av saldo!",$saldi);
    }
}

