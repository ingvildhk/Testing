<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentSaldiTest extends PHPUnit\Framework\TestCase {
    
    public function testIngenSaldi () {
        //arrange
        $personnummer = "1";
        $bank=new Bank(new BankDBStub());
        // act
        $saldi= $bank->hentSaldi($personnummer);
        // assert
        $tomtArray = array();
        $this->assertEquals($tomtArray,$saldi); 
    }
    
    public function testEnSaldi() {
        //arrange
        $personnummer = "12345678912";
        $bank=new Bank(new BankDBStub());
        // act
        $saldi= $bank->hentSaldi($personnummer);
        // assert
        $this->assertEquals($personnummer,$saldi[0]->personnummer); 
        $this->assertEquals(12033845678,$saldi[0]->kontonummer);
        $this->assertEquals("Lønnskonto",$saldi[0]->type);
        $this->assertEquals(25900.97,$saldi[0]->saldo); 
        $this->assertEquals("NOK",$saldi[0]->valuta); 
    }
    
    public function testToSaldi() {
        //arrange
        $personnummer = "23456789123";
        $bank=new Bank(new BankDBStub());
        // act
        $saldi= $bank->hentSaldi($personnummer);
        // assert
        $this->assertEquals("12345678912",$saldi[0]->personnummer); 
        $this->assertEquals(12033845678,$saldi[0]->kontonummer);
        $this->assertEquals("Lønnskonto",$saldi[0]->type);
        $this->assertEquals(25900.97,$saldi[0]->saldo); 
        $this->assertEquals("NOK",$saldi[0]->valuta);
        $this->assertEquals($personnummer,$saldi[1]->personnummer); 
        $this->assertEquals(12033823456,$saldi[1]->kontonummer);
        $this->assertEquals("Spare",$saldi[1]->type);
        $this->assertEquals(122.48,$saldi[1]->saldo); 
        $this->assertEquals("NOK",$saldi[1]->valuta); 
    }
    
    public function testAlleSaldi() {
        //arrange
        $personnummer = "23456789126";
        $bank=new Bank(new BankDBStub());
        // act
        $saldi= $bank->hentSaldi($personnummer);
        // assert
        $this->assertEquals("12345678912",$saldi[0]->personnummer); 
        $this->assertEquals(12033845678,$saldi[0]->kontonummer);
        $this->assertEquals("Lønnskonto",$saldi[0]->type);
        $this->assertEquals(25900.97,$saldi[0]->saldo); 
        $this->assertEquals("NOK",$saldi[0]->valuta);
        $this->assertEquals("23456789123",$saldi[1]->personnummer); 
        $this->assertEquals(12033823456,$saldi[1]->kontonummer);
        $this->assertEquals("Spare",$saldi[1]->type);
        $this->assertEquals(122.48,$saldi[1]->saldo); 
        $this->assertEquals("NOK",$saldi[1]->valuta);
        $this->assertEquals("23456789123",$saldi[2]->personnummer); 
        $this->assertEquals(12033823457,$saldi[2]->kontonummer);
        $this->assertEquals("Fond",$saldi[2]->type);
        $this->assertEquals(13431.44,$saldi[2]->saldo); 
        $this->assertEquals("NOK",$saldi[2]->valuta);
    }
}
