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
        {
            if($kunde->ID==1)
            {
                return "OK";
            }
            else
            {
                return "Feil";
            }
        }
        
        function slettKunde($personnummer)
        //Caroline
        {
            if($personnummer->ID==1)
            {
            return "OK";
            }
            else
            {
            return "Feil";
            }  
        }
        
        function registerKonto($konto)
        //Caroline
        {
           if($konto->ID==1)
            {
            return "OK";
            }
            else
            {
            return "Feil";
            } 
        }
        
        function endreKonto($konto)
        //Renate
        {
            
        }
        
        function hentAlleKonti()
        //Renate
        {
            
        }
        
        function slettKonto($kontonummer)
        //Renate
        {
            
        }
    }
