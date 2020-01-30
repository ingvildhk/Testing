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
            $kontoer = array();
           
            $konto = new konto();
            $konto->personnummer="12345678912";
            $konto->kontonummer=12033845678;
            $konto->type="Lønnskonto";
            $konto->saldo =25900.97;
            $konto->valuta="NOK";
            
            $konto2 = new konto();
            $konto2->personnummer="23456789123";
            $konto2->kontonummer=12033823456;
            $konto2->type="Spare";
            $konto2->saldo =122.48;
            $konto2->valuta="NOK";
            
            $konto3 = new konto();
            $konto3->personnummer="23456789123";
            $konto3->kontonummer=12033823457;
            $konto3->type="Fond";
            $konto3->saldo =13431.44;
            $konto3->valuta="NOK";
            
            $konto4 = new konto();
            $konto4->personnummer="34567891234";
            $konto4->kontonummer=12033823458;
            $konto4->type="Spare";
            $konto4->saldo =151778.33;
            $konto4->valuta="NOK";
            
            $konto5 = new konto();
            $konto5->personnummer="334567891234";
            $konto5->kontonummer=12033823459;
            $konto5->type="Lønnskonto";
            $konto5->saldo =36985.12;
            $konto5->valuta="NOK";
            
            $konto6 = new konto();
            $konto6->personnummer="334567891234";
            $konto6->kontonummer=12033823461;
            $konto6->type="Fond";
            $konto6->saldo =69844.15;
            $konto6->valuta="NOK";
            
            if ($personnummer == ''){
                return $kontoer;
            }
            elseif ($personnummer == '12345678912') {
            $kontoer[] = $konto;
            }
            elseif ($personnummer == '23456789123') {
            $kontoer[] = $konto2 + $konto3;
            }           
            elseif ($personnummer == '34567891234') {
            $kontoer[] = $konto4 + $konto5 + $konto6;
            
            }
        }
        
        function hentSaldi($personnummer)
        {
            if($personnummer==-11223344556){
               return "Feil";
            }
            else {
                $konto = new konto();
                $konto->personnummer="12345678912";
                $konto->kontonummer=12033845678;
                $konto->type="Lønnskonto";
                $konto->saldo =25900.97;
                $konto->valuta="NOK";
                return $konto;
            }
        }
        
        function registrerBetaling($kontoNr, $transaksjon)
        {
            if($kontoNr==-11223344556){
               return "Feil";
            }
            else {
                $konto = new konto();
                $konto->personnummer="12345678912";
                $konto->kontonummer=12033845678;
                $konto->type="Lønnskonto";
                $konto->saldo =18778.11;
                $konto->valuta="NOK";
                $konto->transaksjoner = $transaksjon;
                return "OK";
            }

        }
        
        function hentBetalinger($personnummer)
        {
            $betalinger = array();
            $transaksjon1 = new transaksjon();
                        $transaksjon1->dato='2015-03-26';
                        $transaksjon1->transaksjonBelop=134.4;
                        $transaksjon1->fraTilKontonummer="22342344556";
                        $transaksjon1->melding="Meny Holtet";
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
            
            //Hvis det er ingen betalinger som venter a bli utfort
            if ($personnummer = 0)
            {
                return $betalinger;
            }
            //Hvis det er 1 betaling som venter a bli utfort
            else if($personnummer = 1)
            {
                $betalinger[] = $transaksjon1;
                return $betalinger;
            }
            //Hvis det er 2 betalinger som venter a bli utfort
            else if ($personnummer = 2)
            {
                $betalinger[] = $transaksjon1;
                $betalinger[] = $transaksjon2;
                return $betalinger;
            }
            //Hvis det er mange betalinger som venter a bli utfort
            else 
            {
                $betalinger[] = $transaksjon1;
                $betalinger[] = $transaksjon2;
                $betalinger[] = $transaksjon3;
                return $betalinger;
            }
        }
        
        function utforBetaling($TxID)
        {
            $feil = false;
            //Om man finner bekopet og kontoen man skal betale fra
            if ($SxID >= 0){
                $feil = true;
            }
            //Om det er saldo på kontoen man skal betale fra
            if ($SxID >= 1){
                $feil = true;
            }
            if(!$feil){
                //Om man finner betalingsIDen
                if ($SxID >= 2){
                    //Om man klarer a oppdatere saldo pa konto etter tranasksjon
                    if ($SxID >= 3){
                        return "OK";
                    }
                }
            }
            return "Feil";  
        }
        
        function endreKundeInfo($kunde)
        {
            $postnummer = $kunde->postnr;
            $poststedet = $kunde->poststed;
            //Hvis ikke postnr finnes i db fra for
            if ($postnummer == 0){
                //Hvis poststedet ikke blir lagt inn i db
                if ($poststedet == 0){
                    return "Feil";
                }
            }
            return "OK";
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