<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel
//Renate

class slettKundeTest extends PHPUnit\Framework\TestCase {

    function test_slettKunde_OK(){
        $bankLogikk = new Admin(new BankDBStub());
        $personnummer = 1;
        $OK = $bankLogikk->slettKunde($personnummer);
        $this->assertEquals("OK", $OK);
    }

    function test_slettKunde_feil(){
        $bankLogikk = new Admin(new BankDBStub());
        $personnummer = 5;
        $feil = $bankLogikk->slettKunde($personnummer);
        $this->assertEquals("Feil", $feil);
    }
    
