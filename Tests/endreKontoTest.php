<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';
include_once '../BLL/adminLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel
//Caroline

class endreKontoTest extends PHPUnit\Framework\TestCase {

    function test_endreKonto_OK(){
        $adminLogikk = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->kontonummer = "OK";
        $konto->personnummer = "OK";

        $OK = $adminLogikk->endreKonto(($konto));
        $this->assertEquals("OK", $OK);
    }

    function test_endreKonto_feilPersonnr()
    {
        $adminLogikk = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->personnummer = 0;

        $OK = $adminLogikk->endreKonto(($konto));
        $this->assertEquals("Feil i personnr", $OK);
    }

    function test_endreKonto_feilKontonr()
    {
        $adminLogikk = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->kontonummer = 0;

        $OK = $adminLogikk->endreKonto(($konto));
        $this->assertEquals("Feil i kontonr", $OK);
    }
    

}


