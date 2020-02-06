<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/adminLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel
//Ingvild

class registrerKundeTest extends PHPUnit\Framework\TestCase {
    
    public function testRegistrerKunde_Feil(){
        // arrange
        $kunde = new kunde();
        $admin = new Admin(new AdminDBStub());
        //act
        $ok = $admin->registrerKunde($kunde);
        //assert
        $this->assertEquals("Feil",$ok);  
    }
    
    public function testRegistrerKunde_Riktig(){
        // arrange
        $kunde = new kunde();
        $kunde->personnummer = 1;
        $admin = new Admin(new AdminDBStub());
        //act
        $ok = $admin->registrerKunde($kunde);
        //assert
        $this->assertEquals("OK",$ok);  
    }
    
}

