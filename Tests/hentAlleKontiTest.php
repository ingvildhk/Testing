<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/bankLogikk.php';
include_once '../BLL/adminLogikk.php';

class hentAlleKontiTest extends PHPUnit\Framework\TestCase {
    function testHentAlleKonti()
    {

        $adminLogikk = new Admin (new AdminDBStub());

        $konti = $adminLogikk->hentAlleKonti();

        $transaksjon1 = new transaksjon();
        $transaksjon1->dato = '2015-03-26';
        $transaksjon1->transaksjonBelop = 134.4;
        $transaksjon1->fraTilKontonummer = "11111111111";
        $transaksjon1->melding = "Meny Holtet";

        $this->assertEquals("11111111111", $konti[0]->personnummer);
        $this->assertEquals("11111111111", $konti[0]->kontonummer);
        $this->assertEquals("Sparekonto", $konti[0]->type);
        $this->assertEquals(111.00, $konti[0]->saldo);
        $this->assertEquals("NOK", $konti[0]->valuta);
        $this->assertEquals($transaksjon1, $konti[0]->transaksjoner[0]);


        $transaksjon2 = new transaksjon();
        $transaksjon2->dato = '2019-03-26';
        $transaksjon2->transaksjonBelop = 124.2;
        $transaksjon2->fraTilKontonummer = "22222222222";
        $transaksjon2->melding = "Rema1000";

        $this->assertEquals("22222222222", $konti[1]->personnummer);
        $this->assertEquals("22222222222", $konti[1]->kontonummer);
        $this->assertEquals("Sparekonto", $konti[1]->type);
        $this->assertEquals(222.22, $konti[1]->saldo);
        $this->assertEquals("NOK", $konti[1]->valuta);
        $this->assertEquals($transaksjon2, $konti[1]->transaksjoner[0]);

        $transaksjon3 = new transaksjon();
        $transaksjon3->dato = '2019-08-16';
        $transaksjon3->transaksjonBelop = 1024.2;
        $transaksjon3->fraTilKontonummer = "33333333333";
        $transaksjon3->melding = "Platekompaniet";

        $this->assertEquals("33333333333", $konti[2]->personnummer);
        $this->assertEquals("33333333333", $konti[2]->kontonummer);
        $this->assertEquals("Sparekonto", $konti[2]->type);
        $this->assertEquals(333.33, $konti[2]->saldo);
        $this->assertEquals("NOK", $konti[2]->valuta);
        $this->assertEquals($transaksjon3, $konti[2]->transaksjoner[0]);
    }
}