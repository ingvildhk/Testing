<?php
    include_once '../Model/domeneModell.php';
    class AdminDBStub
    {
        function hentAlleKunder()
        {
           $alleKunder = array();
           $kunde1 = new kunde();
           $kunde1->personnummer ="01010122344";
           $kunde1->navn = "Per Olsen";
           $kunde1->adresse = "Osloveien 82 0270 Oslo";
           $kunde1->telefonnr="12345678";
           $alleKunder[]=$kunde1;
           $kunde2 = new kunde();
           $kunde2->personnummer ="01010122344";
           $kunde2->navn = "Line Jensen";
           $kunde2->adresse = "Askerveien 100, 1379 Asker";
           $kunde2->telefonnr="92876789";
           $alleKunder[]=$kunde2;
           $kunde3 = new kunde();
           $kunde3->personnummer ="02020233455";
           $kunde3->navn = "Ole Olsen";
           $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
           $kunde3->telefonnr="99889988";
           $alleKunder[]=$kunde3;
           return $alleKunder;
        }
        
        function registrerKunde($kunde)
        //Caroline
        {
            
        }
        
        function slettKunde($personnummer)
        //Caroline
        {
            
        }
        
        function registerKonto($konto)
        //Caroline
        {
            
        }
        
        function endreKonto($konto)
        {
            $personnr = $konto->personnr;
            $kontonr = $konto->kontonr;
            //Hvis feil skal funksjon die() kjores, sa returnerer en melding istedenfor
            if ($personnr == 0){
                return "Feil i personnr";
            }
            if ($kontonr == 0){
                return "Feil i kontonr";
            }
            return "OK";
            
        }
        
        function hentAlleKonti()
        {
            $transaksjon1 = new transaksjon();
            $transaksjon1->dato='2015-03-26';
            $transaksjon1->transaksjonBelop=134.4;
            $transaksjon1->fraTilKontonummer="11111111111";
            $transaksjon1->melding="Meny Holtet";
                        
            $konto1 = new konto();
            $konto1->personnummer="11111111111";
            $konto1->kontonummer="11111111111";
            $konto1->type="Sparekonto";
            $konto1->saldo =111.00;
            $konto1->valuta="NOK";
            $konto1->transaksjoner[] = $transaksjon1;
            
            $transaksjon2 = new transaksjon();
            $transaksjon2->dato='2019-03-26';
            $transaksjon2->transaksjonBelop=124.2;
            $transaksjon2->fraTilKontonummer="22222222222";
            $transaksjon2->melding="Rema1000";
            
            $konto2 = new konto();
            $konto2->personnummer="22222222222";
            $konto2->kontonummer="22222222222";
            $konto2->type="Sparekonto";
            $konto2->saldo =222.22;
            $konto2->valuta="NOK";
            $konto2->transaksjoner[] = $transaksjon2;
            
            $transaksjon3 = new transaksjon();
            $transaksjon3->dato='2019-08-16';
            $transaksjon3->transaksjonBelop=1024.2;
            $transaksjon3->fraTilKontonummer="33333333333";
            $transaksjon3->melding="Platekompaniet";
            
            $konto3 = new konto();
            $konto3->personnummer="33333333333";
            $konto3->kontonummer="33333333333";
            $konto3->type="Sparekonto";
            $konto3->saldo =333.33;
            $konto3->valuta="NOK";
            $konto3->transaksjoner[] = $transaksjon3;
            
            $kontoer = array();
            $kontoer[] = $konto1;
            $kontoer[] = $konto2;
            $kontoer[] = $konto3;
            
            return $kontoer;
            
        }
        
        function slettKonto($kontonummer)
        {
            //Hvis feil skal funksjon die() kjores, sa returnerer en melding istedenfor
            if ($kontonummer = 0){
                return "Feil kontonummer";
            }
            return "OK";
        }
    }
