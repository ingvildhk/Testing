<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/bankLogikk.php';
include_once '../BLL/adminLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel
//Caroline

class adminEndreKundeInfoTest extends PHPUnit\Framework\TestCase {
    
    public function testAdminEndreKundeInfo_OK() 
    {
        // arrange
        $kunde = new kunde();
        $kunde->postnr = "2121";
        $kunde->poststed = "Oslo";
        $admin=new Admin(new AdminDBStub());

        // act
        $OK= $admin->endreKundeInfo($kunde);
        // assert
        $this->assertEquals("OK",$OK); 
    }
    
    public function testAdminEndreKundeInfo_Feil() 
    {
        // arrange
        $kunde = new kunde();
        $kunde->postnr = 0;
        $kunde->poststed = 0;
        $admin=new Admin(new AdminDBStub());

        // act
        $OK= $admin->endreKundeInfo($kunde);
        // assert
        $this->assertEquals("Feil",$OK); 
    }
    

    
}


