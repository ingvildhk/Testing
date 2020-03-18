<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';

class registrerKontoTest extends PHPUnit\Framework\TestCase {
    
    public function testRegistrerKonto_FeilPersonnummer() {
       // arrange
        $konto = new konto();
        $konto->personnummer = 100;
        $admin = new Admin(new AdminDBStub());
        //act
        $ok = $admin->registrerKonto($konto);
        //assert
        $this->assertEquals("Feil i personnummer",$ok);  
    }
    
    public function testRegistrerKonto_Feil() {
        // arrange
        $konto = new konto();
        $admin = new Admin(new AdminDBStub());
        //act
        $ok = $admin->registrerKonto($konto);
        //assert
        $this->assertEquals("Feil",$ok);  
    }
    
    public function testRegistrerKonto_OK() {
        // arrange
        $konto = new konto();
        $konto->kontonummer = 1;
        $admin = new Admin(new AdminDBStub());
        //act
        $ok = $admin->registrerKonto($konto);
        //assert
        $this->assertEquals("OK",$ok); 
        
    }
}