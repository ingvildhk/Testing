<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';
include_once '../BLL/bankLogikk.php';

class registrerKundeTest extends PHPUnit\Framework\TestCase {
    
    public function testRegistrerKunde_Feil_Postnummer(){
        // arrange
        $kunde = new kunde();
        $kunde->postnr = 10;
        $bank = new Bank(new BankDBStub());
        //act
        $ok = $bank->registrerKunde($kunde);
        //assert
        $this->assertEquals("Feil",$ok);  
    }
    
    public function testRegistrerKunde_Feil_Registrering(){
        // arrange
        $kunde = new kunde();
        $bank = new Bank(new BankDBStub());
        //act
        $ok = $bank->registrerKunde($kunde);
        //assert
        $this->assertEquals("Feil",$ok);  
    }
    
    public function testRegistrerKunde_Riktig(){
        // arrange
        $kunde = new kunde();
        $kunde->personnummer = 1;
        $bank = new Bank(new BankDBStub());
        //act
        $ok = $bank->registrerKunde($kunde);
        //assert
        $this->assertEquals("OK",$ok);  
    }
    
    public function testRegistrerKunde_Riktig_Admin(){
        // arrange
        $kunde = new kunde();
        $kunde->personnummer = 1;
        $admin = new Admin(new AdminDBStub());
        //act
        $ok = $admin->registrerKunde($kunde);
        //assert
        $this->assertEquals("OK",$ok);  
    }
    
    public function testRegistrerKunde_Feil_Registrering_Admin(){
        // arrange
        $kunde = new kunde();
        $admin = new Admin(new AdminDBStub());
        //act
        $ok = $admin->registrerKunde($kunde);
        //assert
        $this->assertEquals("Feil",$ok);  
    }
    
    public function testRegistrerKunde_Feil_Postnummer_Admin(){
        // arrange
        $kunde = new kunde();
        $kunde->postnr = 10;
        $admin = new Admin(new AdminDBStub());
        //act
        $ok = $admin->registrerKunde($kunde);
        //assert
        $this->assertEquals("Feil",$ok);  
    }
}