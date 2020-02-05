<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/bankLogikk.php';
include_once '../BLL/adminLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel
//Caroline

class endreKontoTest extends PHPUnit\Framework\TestCase {

    function testEndreKonto_OK(){
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->kontonummer = 1;
        $konto->personnummer = 1;

        $OK = $admin->endreKonto($konto);
        $this->assertEquals("OK", $OK);
    }

    function testEndreKonto_feilPersonnr()
    {
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->personnummer = 0;
        $konto->kontonummer = 1;

        $OK = $admin->endreKonto(($konto));
        $this->assertEquals("Feil i personnr", $OK);
    }

    function testEndreKonto_feilKontonr()
    {
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->personnummer = 1;
        $konto->kontonummer = 0;

        $OK = $admin->endreKonto(($konto));
        $this->assertEquals("Feil i kontonr", $OK);
    }
    

}


