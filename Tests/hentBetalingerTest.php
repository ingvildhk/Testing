<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

//hentTransaksjonerTest: Laget av Tor, se for eksempel
//Hilde

class hentBetalingerTest extends PHPUnit\Framework\TestCase {
    
    public function test_ingenBetaling () {
        //arrange
        $personnummer = 0;
        $tomtArray = array();
        $bank=new Bank(new BankDBStub());
        //act
        $betalinger = $bank->hentBetalinger($personnummer);
        // assert
        $this->assertEquals($tomtArray,$betalinger);    
    }
    
    public function test_enBetaling () {
        //arrange
        $transaksjon = new transaksjon();
        $transaksjon->dato='2015-03-26';
        $transaksjon->transaksjonBelop=134.4;
        $transaksjon->fraTilKontonummer="22342344556";
        $transaksjon->melding="Meny Holtet";
        $bank=new Bank(new BankDBStub());
        //act
        $betalinger = $bank->hentBetalinger(1);
        //assert
        $this->assertEquals($transaksjon->dato,$betalinger[0]->dato); 
        $this->assertEquals($transaksjon->transaksjonBelop,$betalinger[0]->transaksjonBelop);
        $this->assertEquals($transaksjon->fraTilKontonummer,$betalinger[0]->fraTilKontonummer);
        $this->assertEquals($transaksjon->melding,$betalinger[0]->melding);       
    }
    
    public function test_toBetalinger () {
        //arrange
        $transaksjon = new transaksjon();
        $transaksjon->dato='2015-03-26';
        $transaksjon->transaksjonBelop=134.4;
        $transaksjon->fraTilKontonummer="22342344556";
        $transaksjon->melding="Meny Holtet";
        
        $transaksjon2 = new transaksjon();
        $transaksjon2->dato='2015-03-27';
        $transaksjon2->transaksjonBelop=-2056.45;
        $transaksjon2->fraTilKontonummer="114342344556";
        $transaksjon2->melding="Husleie";
        $bank=new Bank(new BankDBStub());
        //act
        $betalinger = $bank->hentBetalinger(2);
        //assert
        $this->assertEquals($transaksjon->dato,$betalinger[0]->dato); 
        $this->assertEquals($transaksjon->transaksjonBelop,$betalinger[0]->transaksjonBelop);
        $this->assertEquals($transaksjon->fraTilKontonummer,$betalinger[0]->fraTilKontonummer);
        $this->assertEquals($transaksjon->melding,$betalinger[0]->melding);  
        
        $this->assertEquals($transaksjon2->dato,$betalinger[1]->dato); 
        $this->assertEquals($transaksjon2->transaksjonBelop,$betalinger[1]->transaksjonBelop);
        $this->assertEquals($transaksjon2->fraTilKontonummer,$betalinger[1]->fraTilKontonummer);
        $this->assertEquals($transaksjon2->melding,$betalinger[1]->melding);  
    }
    
    public function test_alleBetalinger () {
        //arrange
        $transaksjon = new transaksjon();
        $transaksjon->dato='2015-03-26';
        $transaksjon->transaksjonBelop=134.4;
        $transaksjon->fraTilKontonummer="22342344556";
        $transaksjon->melding="Meny Holtet";
        
        $transaksjon2 = new transaksjon();
        $transaksjon2->dato='2015-03-27';
        $transaksjon2->transaksjonBelop=-2056.45;
        $transaksjon2->fraTilKontonummer="114342344556";
        $transaksjon2->melding="Husleie";
        
        $transaksjon3 = new transaksjon();
        $transaksjon3->dato = '2015-03-29';
        $transaksjon3->transaksjonBelop=1454.45;
        $transaksjon3->fraTilKontonummer="114342344511";
        $transaksjon3->melding="Lekeland";
        
        $bank=new Bank(new BankDBStub());
        //act
        $betalinger = $bank->hentBetalinger(3);
        //assert
        $this->assertEquals($transaksjon->dato,$betalinger[0]->dato); 
        $this->assertEquals($transaksjon->transaksjonBelop,$betalinger[0]->transaksjonBelop);
        $this->assertEquals($transaksjon->fraTilKontonummer,$betalinger[0]->fraTilKontonummer);
        $this->assertEquals($transaksjon->melding,$betalinger[0]->melding);  
        
        $this->assertEquals($transaksjon2->dato,$betalinger[1]->dato); 
        $this->assertEquals($transaksjon2->transaksjonBelop,$betalinger[1]->transaksjonBelop);
        $this->assertEquals($transaksjon2->fraTilKontonummer,$betalinger[1]->fraTilKontonummer);
        $this->assertEquals($transaksjon2->melding,$betalinger[1]->melding);
        
        $this->assertEquals($transaksjon3->dato,$betalinger[2]->dato); 
        $this->assertEquals($transaksjon3->transaksjonBelop,$betalinger[2]->transaksjonBelop);
        $this->assertEquals($transaksjon3->fraTilKontonummer,$betalinger[2]->fraTilKontonummer);
        $this->assertEquals($transaksjon3->melding,$betalinger[2]->melding);
    }
    
    
    
}
