<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';
include_once '../BLL/adminLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel
//Renate

class slettKontoTest extends PHPUnit\Framework\TestCase {

    function test_slettKonto_OK(){
        $adminLogikk = new Admin(new AdminDBStub());
        $kontonummer = "11111111111"; // Hva skal egt skrives her???
        $OK = $adminLogikk->slettKonto($kontonummer);
        $this->assertEquals("OK", $OK);
    }

    function test_slettKonto_feil()
    {
        $adminLogikk = new Admin(new AdminDBStub());
        $kontonummer = 0;
        $OK = $adminLogikk->slettKonto($kontonummer);
        $this->assertEquals("Feil kontonummer", $OK);

    }
}
