<?php
    include_once '../Model/domeneModell.php';
    class BankDBStub
    {        
        function hentTransaksjoner($kontoNr,$fraDato,$tilDato)
        {
            date_default_timezone_set("Europe/Oslo");
            $fraDato = strtotime($fraDato);
            $tilDato = strtotime($tilDato);
            if($fraDato>$tilDato)
            {
                return "Fra dato må være større enn tildato";
            }
            $konto = new konto();
            $konto->personnummer="010101234567";
            $konto->kontonummer=$kontoNr;
            $konto->type="Sparekonto";
            $konto->saldo =2300.34;
            $konto->valuta="NOK";
            if($tilDato < strtotime('2015-03-26'))
            {
                return $konto;
            }
            $dato = $fraDato;
            while ($dato<=$tilDato)
            {
                switch($dato)
                {
                    case strtotime('2015-03-26') :
                        $transaksjon1 = new transaksjon();
                        $transaksjon1->dato='2015-03-26';
                        $transaksjon1->transaksjonBelop=134.4;
                        $transaksjon1->fraTilKontonummer="22342344556";
                        $transaksjon1->melding="Meny Holtet";
                        $konto->transaksjoner[]=$transaksjon1;
                        break;
                    case strtotime('2015-03-27') :
                        $transaksjon2 = new transaksjon();
                        $transaksjon2->dato='2015-03-27';
                        $transaksjon2->transaksjonBelop=-2056.45;
                        $transaksjon2->fraTilKontonummer="114342344556";
                        $transaksjon2->melding="Husleie";
                        $konto->transaksjoner[]=$transaksjon2; 
                        break;
                    case strtotime('2015-03-29') :
                        $transaksjon3 = new transaksjon();
                        $transaksjon3->dato = '2015-03-29';
                        $transaksjon3->transaksjonBelop=1454.45;
                        $transaksjon3->fraTilKontonummer="114342344511";
                        $transaksjon3->melding="Lekeland";
                        $konto->transaksjoner[]=$transaksjon3;
                        break;
                }
                $dato +=(60*60*24); // en dag i tillegg i sekunder
            }
            return $konto;
        }
        
        function sjekkLoggInn($personnummer,$passord)
            {
               if($personnummer == !null)
            {
                return "OK";
            }
            else
            {
                return "Feil";
            }     
        }
        
        function hentKonti($personnummer)
        {
            if ($personnummer == 0){
                return "ingen konti funnet!";
            }
            elseif ($personnummer == 1) {
                return "1 konti funnet!";
            }
            elseif ($personnummer == 2) {
                return "2 eller flere konti funnet!";
            }
            else {
                return "feil i metoden!";
            }
        }
        
        function hentSaldi($personnummer)
        {
            
        }
        
        function registrerBetaling($kontoNr, $transaksjon)
        {
            
        }
        
        function hentBetalinger($personnummer)
        {
            
        }
        
        function utforBetaling($TxID)
        {
            
        }
        
        function endreKundeInfo($kunde)
        {
            
        }
        
        function registrerKunde($kunde)
        {
            
        }
        
        function slettKunde($personnummer)
        {
            
        }
        
        function hentKundeInfo($personnummer)
        {
           $enKunde = new kunde();
           $enKunde->personnummer =$personnummer;
           $enKunde->navn = "Per Olsen";
           $enKunde->adresse = "Osloveien 82, 0270 Oslo";
           $enKunde->telefonnr="12345678";
           return $enKunde;
        }
    }