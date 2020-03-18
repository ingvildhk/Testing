<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class slettKundeTest extends PHPUnit\Framework\TestCase
{

    function test_slettKunde_OK()
    {
        $bankLogikk = new Bank(new BankDBStub());
        $personnummer = 1;
        $OK = $bankLogikk->slettKunde($personnummer);
        $this->assertEquals("OK", $OK);
    }

    function test_slettKunde_feil()
    {
        $bankLogikk = new Bank(new BankDBStub());
        $personnummer = 5;
        $feil = $bankLogikk->slettKunde($personnummer);
        $this->assertEquals("Feil", $feil);
    }
    
    function test_slettKunde_OK_admin()
    {
        $adminLogikk = new Admin(new AdminDBStub());
        $personnummer = 1;
        $OK = $adminLogikk->slettKunde($personnummer);
        $this->assertEquals("OK", $OK);
    }
    
    function test_slettKunde_feil_admin()
    {
        $adminLogikk = new Admin(new AdminDBStub());
        $personnummer = 5;
        $adminFeil = $adminLogikk->slettKunde($personnummer);
        $this->assertEquals("Feil", $adminFeil);
    }

}