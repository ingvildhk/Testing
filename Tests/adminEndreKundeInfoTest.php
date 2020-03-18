<?php
include_once '../Model/domeneModell.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/bankLogikk.php';
include_once '../BLL/adminLogikk.php';

class adminEndreKundeInfoTest extends PHPUnit\Framework\TestCase {
    
    public function testAdminEndreKundeInfo_OK_Postnummer_i_DB() 
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
    
    public function testAdminEndreKundeInfo_OK_Postnummer_ikke_i_DB() 
    {
        // arrange
        $kunde = new kunde();
        $kunde->postnr = "1000";
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
        $kunde->postnr = "1000";
        $kunde->poststed = "Bergen";
        $admin=new Admin(new AdminDBStub());

        // act
        $OK= $admin->endreKundeInfo($kunde);
        // assert
        $this->assertEquals("Feil",$OK); 
    }  
}


