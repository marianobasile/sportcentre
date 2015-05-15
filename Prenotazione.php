<?php
include ("Conn_Scelta_db.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta name="description" content="Servizio di registrazione, prenotazione,ricerca e gestione di impianti sportivi polivalenti." >
<meta name="keywords" content="centro sportivo,sport,benessere,calcio,backet,nuoto,tennis,rugby,atletica,pallavolo,palestra,golf,arti marziali,fitness,pugilato,danza,pallamano,pallanuoto,aziende,strutture,prenotazioni,utenti,impianto sportivo,gestione" >
<meta name="author" content="Mariano Basile">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
echo"<title>";
session_start();
echo"Prenotazione Impianto Sportivo";
echo"</title>";
?>
<?php
  $browser=$_SERVER['HTTP_USER_AGENT'];
  $esiste_8=strpos($browser,"MSIE 8.0");
  $esiste_9=strpos($browser,"MSIE 9.0");
  $esiste_10=strpos($browser,"MSIE 10.0");
  $chrome=strpos($browser,"Chrome");
  if($esiste_8)
  {
  echo "<link rel=\"stylesheet\" href=\"prenotazioneie8.css\" type=\"text/css\" media=\"screen\">";
  echo "<script type=\"text/javascript\" src=\"inizio.js\">";
  }
   else
   {
    if($esiste_9 || $esiste_10 )
    echo "<link rel=\"stylesheet\" href=\"prenotazioneie9.css\" type=\"text/css\" media=\"screen\">";
    else
    {
     if($chrome)
     echo "<link rel=\"stylesheet\" href=\"prenotazione.css\" type=\"text/css\" media=\"screen\">";
     else
     echo "<link rel=\"stylesheet\" href=\"prenotazionemozilla.css\" type=\"text/css\" media=\"screen\">";
    }
    echo "<script type=\"text/javascript\" src=\"inizio.js\">";
   }
?>
</script>
</head>
<body>
<?php
function verifica_sessione($timelogin)
{
 $ora=time();
 $attuale=$ora-$timelogin;
 $passo=1;
 if($attuale>3600)
 {
  session_unset();
  session_destroy();
  $passo=0;
 }
 return $passo;
}
$stato=2;
if(isset($_SESSION['oraaccesso']))
{
$ora=$_SESSION['oraaccesso'];
@$stato=verifica_sessione($ora);
}
?>
<div id="intestazione">
<div id="intesta_1">
<a href="index.php">
<img src="pictures/logo.gif" id="websitelogo" alt="Logo del sito">
</a>
</div>
<?php
if(isset($stato))
 {
  if($stato==1)
  {
   if(isset($_SESSION['nome']))
   {
    $name=$_SESSION['nome'];
    $surname=$_SESSION['cognome'];
    $numutente=$_SESSION['numutente'];
    if($_SESSION['boolimg']==0)
    echo"<img src=\"pictures/profilo.gif\" id=\"avatar\" alt=\"Immagine di profilo\" onClick=\"location.href='Profile.php'\">";
    else
    {
     $sqlcmd1="SELECT Cod_Immagine FROM immagini WHERE Id_Utente='$numutente' ";
     $risultato1 = mysql_query($sqlcmd1);
     if(!$risultato1)
     {
      echo("Errore nell'interrogazione: $sqlcmd1. ");
      echo mysql_error();
     }
     $riga1=mysql_fetch_array($risultato1);
     $id=$riga1['Cod_Immagine'];
     echo"<img src=\"image.php?id=$id\" id=\"avatar\" alt=\"Immagine di profilo\" onClick=\"location.href='Profile.php'\">";
    }
    echo"<p id=\"nomeutente\" onClick=\"location.href='Profile.php'\">$name $surname</p>";
    echo"<img src=\"pictures/onoff.gif\" id=\"tasto\" alt=\"Immagine di profilo\" onClick=\"creamenu(0,0)\"><p id=\"dove\"></p>";
    echo"<a id=\"Home\" href=\"index.php\">Home</a>";
   }
    if(isset($_SESSION['rsociale']))
    {
     $ragionesociale=$_SESSION['rsociale'];
     $numazienda=$_SESSION['numazienda'];
     if($_SESSION['boolimg']==0)
     echo"<img src=\"pictures/profilo.gif\" id=\"avatar\" alt=\"Immagine di profilo\" onClick=\"location.href='Profile.php'\">";
     else
     {
      $sqlcmd1="SELECT Cod_Immagine FROM immagini WHERE Id_Azienda='$numazienda' ";
      $risultato1 = mysql_query($sqlcmd1);
      if(!$risultato1)
      {
       echo("Errore nell'interrogazione: $sqlcmd1. ");
       echo mysql_error();
      }
      $riga1=mysql_fetch_array($risultato1);
      $id=$riga1['Cod_Immagine'];
      echo"<img src=\"image.php?id=$id\" id=\"avatar\" alt=\"Immagine di profilo\" onClick=\"location.href='Profile.php'\">";
     }
     echo"<p id=\"nomeutente\" onClick=\"location.href='Profile.php'\">$ragionesociale</p>";
     echo"<img src=\"pictures/onoff.gif\" id=\"tasto\" alt=\"Immagine di profilo\" onClick=\"creamenu(0,0)\"><p id=\"dove\"></p>";
     echo"<a id=\"Home\" href=\"index.php\">Home</a>";
    }
   }
    if($stato==0)
     {
      echo"<script type=\"text/javascript\">
           alert(\"La tua sessione è scaduta. Accedi nuovamente per poter continuare.\")
           </script>";
      echo"<div id=\"container\">";
      echo"<img src=\"pictures/onoff.gif\" id=\"tasto\" alt=\"Tasto Scelta\" onClick=\"creamenu(1,1)\"><p id=\"dove\"></p>";
      echo"<a id=\"Home\" href=\"index.php\">Home</a></div>";
      header('Refresh:0;url=index.php');
     }
  }
?>
</div>
<?php
if($_GET)
{
 if(isset($_GET['price']))
 { //inserimento disponibilità azienda da home
     $sport=$_SESSION['sport'];

     $data=$_SESSION['datai'];

     $datainser=explode("/",$data);
     $datanew=$datainser[2]."-".$datainser[1]."-".$datainser[0];

     if(isset($_SESSION['dataf']))
     $dataf=$_SESSION['dataf'];

     $datainser2=explode("/",$dataf);
     $datanew2=$datainser2[2]."-".$datainser2[1]."-".$datainser2[0];

     $orai=$_SESSION['orai'];
     $oraicopia=$orai;
     $oraicopia1=$orai;
     $orainser=$orai.":"."00".":"."00";

     $oraf=$_SESSION['oraf'];
     $orainser2=$oraf.":"."00".":"."00";

     if(isset($_SESSION['luogo']))
     $luogo=$_SESSION['luogo'];

     $cod=$_SESSION['numazienda'];

     $costo=$_GET['price'];

     $quantiimpianti=$_SESSION['quantiimpianti'];


     $diffmese=$datainser2[1]-$datainser[1];



     $diffora=0;
     if($oraf==00)
     {
      $oratemp=24;
      $diffora=$oratemp-$orai;
     }
     else
     $diffora=$oraf-$orai;

     //echo $diffora;
     $err=0;

    $sqlcmd1="SELECT Cod_Struttura FROM strutture WHERE Sport='$sport' AND Id_Azienda='$cod' ";
    $risultato1=mysql_query($sqlcmd1);
    $risultatoverifica=mysql_query($sqlcmd1);
    $risultato11=mysql_query($sqlcmd1);
    $risultato111=mysql_query($sqlcmd1);
    if(!$risultato1)
    {
     echo("Errore nell'interrogazione: $sqlcmd1. ");
     echo mysql_error();
    }
    if(!$risultatoverifica)
    {
     echo("Errore nell'interrogazione: $sqlcmd1. ");
     echo mysql_error();
    }
     if(!$risultato11)
    {
     echo("Errore nell'interrogazione: $sqlcmd1. ");
     echo mysql_error();
    }
    if(!$risultato111)
    {
     echo("Errore nell'interrogazione: $sqlcmd1. ");
     echo mysql_error();
    }
    $riga1=mysql_fetch_array($risultato1);
    $rigaverifica=mysql_fetch_array($risultatoverifica);
    $idstrut=$riga1['Cod_Struttura'];
    $riga11=mysql_fetch_array($risultato11);
    $riga111=mysql_fetch_array($risultato111);
    //echo $idstrut;
    $impossibile=0;
    //$riga11=mysql_fetch_array($risultato1);
    //echo $idstrut. " ".$datanew." ".$orainser." ".$orainser2." ";

    while($rigaverifica)
    {
     //preverifica disponibilità -prenotazione già impostata
     $sqlcmd3="SELECT Count(Id) FROM disponibilita D, disp_strutture DS WHERE DS.Id_Struttura='$idstrut' AND DS.Id_Disponibilita=D.Id AND D.Giorno_Inizio='$datanew' AND D.Ora_Inizio='$orainser' AND D.Ora_Fine='$orainser2'   ";
     $risultato3=mysql_query($sqlcmd3);
     if(!$risultato3)
     {
      echo("Errore nell'interrogazione: $sqlcmd1. ");
      echo mysql_error();
     }
     $riga3=mysql_fetch_array($risultato3);
     $conto=$riga3['Count(Id)'];
     //echo $conto;
     if($conto>=1)
     {
      $impossibile=1;
      echo "<script type=\"text/Javascript\">alert(\"Inserimento annullato. Verificare che non ci siano strutture per lo sport selezionato la cui data coincida con una prenotazione presa in carico o con una disponibilità già acquisita!\");</script>";
      break;
     }
      $rigaverifica=mysql_fetch_array($risultatoverifica);
    }
    if($impossibile==1)
    header("refresh:0; url=index.php");
    else
    {
       if($diffmese==0)
     { //echo "diffmese0";
       $diffgiorni=$datainser2[0]-$datainser[0];
       $arrgiorno=array();
       if($diffgiorni==0)
       {
       $arrgiorno[0]=$datanew;
       $arrora=array();
      $arrinizioora=$orai--;
      //echo $diffora;
      for($j=0;$j<=$diffora;$j++)
      {
       if($arrinizioora==24)
       $arrinizioora="00";
       $arrora[$j]=$arrinizioora++.":"."00".":"."00";
      }
       do
  {
   $idstru=$riga1['Cod_Struttura'];
   for($j=0;$j<$diffora;$j++)
   {
    $w=$j+1;
    if($w==24)
    $arrora[$w]="00".":"."00".":"."00";

    $sqlcmd="INSERT INTO disponibilita SET Giorno_Inizio='$datanew',Ora_Inizio='$arrora[$j]', Ora_Fine='$arrora[$w]', Costo='$costo', Occupato=0  ";
    $risultato=mysql_query($sqlcmd);
    if(!$risultato)
    {
     echo("Errore nell'interrogazione: $sqlcmd. ");
     echo mysql_error();
     $err=1;
     break;
    }
     $iddisp=mysql_insert_id();

    $sqlcmd2="INSERT INTO disp_strutture SET Id_Struttura='$idstru', Id_Disponibilita='$iddisp' ";
    $risultato2=mysql_query($sqlcmd2);
     if(!$risultato2)
    {

     echo("Errore nell'interrogazione: $sqlcmd2. ");
     echo mysql_error();
     $err=1;
     break;
    }
   }
    if($err==1)
    break;
 }while($riga1=mysql_fetch_array($risultato1));
     if($err==0 && $conto<1)
     {
      echo "<script type=\"text/Javascript\">alert(\"Inserimento effettuato con successo!\");</script>";
      header("refresh:0; url=index.php");
     }
      }
       else
       {
       $arrgiorno=array();
       $arrinizio=$datainser[0]--;
       for($i=0;$i<=$diffgiorni;$i++)
       {
        $arrgiorno[$i]=$datainser2[2]."-".$datainser2[1]."-".$arrinizio++;
       }


      $arrora=array();
      $arrinizioora=$orai--;
      //echo $diffora;
      for($j=0;$j<=$diffora;$j++)
      {
       if($arrinizioora==24)
       $arrinizioora="00";
       $arrora[$j]=$arrinizioora++.":"."00".":"."00";
      }

  do
  {
   $idstru=$riga1['Cod_Struttura'];
  for($i=0;$i<=$diffgiorni;$i++)
  {
   for($j=0;$j<$diffora;$j++)
   {
    $w=$j+1;
    if($w==24)
    $arrora[$w]="00".":"."00".":"."00";




    $sqlcmd="INSERT INTO disponibilita SET Giorno_Inizio='$arrgiorno[$i]',Ora_Inizio='$arrora[$j]', Ora_Fine='$arrora[$w]', Costo='$costo', Occupato=0  ";
    $risultato=mysql_query($sqlcmd);
    if(!$risultato)
    {
     echo("Errore nell'interrogazione: $sqlcmd. ");
     echo mysql_error();
     $err=1;
     break;
    }
     $iddisp=mysql_insert_id();

    $sqlcmd2="INSERT INTO disp_strutture SET Id_Struttura='$idstru', Id_Disponibilita='$iddisp' ";
    $risultato2=mysql_query($sqlcmd2);
     if(!$risultato2)
    {
     echo("Errore nell'interrogazione: $sqlcmd2. ");
     echo mysql_error();
     $err=1;
     break;
    }
   }
    if($err==1)
    break;
  }
 }while($riga1=mysql_fetch_array($risultato1));
     if($err==0 && $conto<1)
     {
      echo "<script type=\"text/Javascript\">alert(\"Inserimento effettuato con successo!\");</script>";
      header("refresh:0; url=index.php");
     }

   }
   }
    if($diffmese==1)
    {
     //echo "diffmese1 ";
     $ultimogiornomese=0;
     $indice=0;
     $ultimofebbraio=0;
     //Controllo se bisestile
     if(!(($datainser2[2] % 4 == 0 && $datainser2[2] % 100 != 0) || $datainser2[2] % 400 == 0))
     $ultimofebbraio=28;
     else
     $ultimofebbraio=29;
     switch($datainser[1])
     {
      case 01:
      $ultimogiornomese=31;
      $indice=1;
      break;

      case 02:
      $ultimogiornomese=$ultimofebbraio;
      $indice=2;
      break;

      case 03:
      $ultimogiornomese=31;
      $indice=3;
      break;

      case 04:
      $ultimogiornomese=30;
      $indice=4;
      break;

      case 05:
      $ultimogiornomese=31;
      $indice=5;
      break;

      case 06:
      $ultimogiornomese=30;
      $indice=6;
      break;

      case 07:
      $ultimogiornomese=31;
      $indice=7;
      break;

      case 08:
      $ultimogiornomese=31;
      $indice=8;
      break;

      case 09:
      $ultimogiornomese=30;
      $indice=9;
      break;

      case 10:
      $ultimogiornomese=31;
      $indice=10;
      break;

      case 11:
      $ultimogiornomese=30;
      $indice=11;
      break;

      case 12:
      $ultimogiornomese=31;
      $indice=12;
      break;
     }


       $diffgiorni=$ultimogiornomese-$datainser[0];

      $arrinizio=$datainser[0]--;
       for($i=0;$i<=$diffgiorni;$i++)
       {
         $arrgiorno[$i]=$datainser[2]."-".$datainser[1]."-".$arrinizio++;
       }


      $arrora=array();
      $arrinizioora=$orai--;
       $diffora;
      for($j=0;$j<=$diffora;$j++)
      {
       if($arrinizioora==24)
       $arrinizioora="00";
         $arrora[$j]=$arrinizioora++.":"."00".":"."00";
      }
  do
  {
    $idstru=$riga1['Cod_Struttura'];
  for($i=0;$i<=$diffgiorni;$i++)
  {
   for($j=0;$j<$diffora;$j++)
   {
    $w=$j+1;
    if($w==24)
    $arrora[$w]="00".":"."00".":"."00";




    $sqlcmd="INSERT INTO disponibilita SET Giorno_Inizio='$arrgiorno[$i]',Ora_Inizio='$arrora[$j]', Ora_Fine='$arrora[$w]', Costo='$costo', Occupato=0  ";
    $risultato=mysql_query($sqlcmd);
    if(!$risultato)
    {
     echo("Errore nell'interrogazione: $sqlcmd. ");
     echo mysql_error();
     $err=1;
     break;
    }
     $iddisp=mysql_insert_id();

    $sqlcmd2="INSERT INTO disp_strutture SET Id_Struttura='$idstru', Id_Disponibilita='$iddisp' ";
    $risultato2=mysql_query($sqlcmd2);
     if(!$risultato2)
    {
     echo("Errore nell'interrogazione: $sqlcmd2. ");
     echo mysql_error();
     $err=1;
     break;
    }
   }
    if($err==1)
    break;
  }
 }while($riga1=mysql_fetch_array($risultato1));



 $arrgiornodue=array();
 $conta=0;
 for($i=1;$i<=$datainser2[0];$i++)
 $conta++;
 //echo $conta;

      $arriniziodue=$datainser[0]--;
      $l;
       for($i=1;$i<=$conta;$i++)
       {
       $l=$i;
        if($l<10)
        {
         $l="0".$i;
        }
       //echo " ";
        $arrgiornodue[$i]=$datainser2[2]."-".$datainser2[1]."-".$l;
       }
       //echo $arrgiornodue[1];

      $arroradue=array();
      $arriniziooradue=$oraicopia--;
       //echo ++$arriniziooradue;
      //echo $diffora;
      for($j=0;$j<=$diffora;$j++)
      {
       if($arriniziooradue==24)
       $arriniziooradue="00";
       $arroradue[$j]=$arriniziooradue++.":"."00".":"."00";
      }
 do
  {
   $idstrudue=$riga11['Cod_Struttura'];
  for($i=1;$i<=$conta;$i++)
  {
   for($j=0;$j<$diffora;$j++)
   {
    $w=$j+1;
    if($w==24)
    $arrora[$w]="00".":"."00".":"."00";
   // echo $arrgiornodue[$i];



    $sqlcmd="INSERT INTO disponibilita SET Giorno_Inizio='$arrgiornodue[$i]',Ora_Inizio='$arroradue[$j]', Ora_Fine='$arroradue[$w]', Costo='$costo', Occupato=0  ";
    $risultato=mysql_query($sqlcmd);
    if(!$risultato)
    {
     echo("Errore nell'interrogazione: $sqlcmd. ");
     echo mysql_error();
     $err=1;
     break;
    }
     $iddispdue=mysql_insert_id();

    $sqlcmd2="INSERT INTO disp_strutture SET Id_Struttura='$idstrudue', Id_Disponibilita='$iddispdue' ";
    $risultato2=mysql_query($sqlcmd2);
     if(!$risultato2)
    {
     echo("Errore nell'interrogazione: $sqlcmd2. ");
     echo mysql_error();
     $err=1;
     break;
    }
   }
    if($err==1)
    break;
  }
 }while($riga11=mysql_fetch_array($risultato11));
     if($err==0 && $conto<1)
     {
      echo "<script type=\"text/Javascript\">alert(\"Inserimento effettuato con successo!\");</script>";
      header("refresh:0; url=index.php");
     }

    }
     if($diffmese>1)
     {
      echo "<script type=\"text/Javascript\">alert(\"Attenzione! La programmazione è valida per un periodo non superiore ad un mese dalla data di inzio selezionata.\");</script>";
      header("refresh:0; url=index.php");
     }



 }

}
 else
 {
  if(isset($_GET['sportazienda']))
  {
    //riepilogo prenotazione da calendario azienda
     $sportazienda=$_GET['sportazienda'];
     $sportaziendacopia=$sportazienda;

     $impianto=$_GET['impianto'];

     $dataazienda=$_GET['data'];

     $oraiazienda=$_GET['orai'];

     $orafazienda=$_GET['oraf'];

     $immagini=array('Calcio5'=>'pictures/campo.gif','Calcio7'=>'pictures/campo.gif','Calcio8'=>'pictures/campo.gif',
              'Calcio11'=>'pictures/campo.gif','Hockey'=>'pictures/campohockey.gif','Golf'=>'pictures/campogolf.gif',
              'Arti Marziali'=>'pictures/campomarziali.gif','Basket'=>'pictures/campobasket.gif','Tennis'=>'pictures/campotennis.gif',
              'Nuoto'=>'pictures/campopiscina.gif','Atletica'=>'pictures/campoatletica.gif','Ginnastica'=>'pictures/campoginnastic.gif',
              'Pallavolo'=>'pictures/campopallavolo.gif','Rugby'=>'pictures/camporugby.gif','Fitness'=>'pictures/campopalestra.gif',
              'Pugilato'=>'pictures/boxe.gif','Danza'=>'pictures/campodanza.gif','Pallamano'=>'pictures/campopallamano.gif',
              'Pallanuoto'=>'pictures/campopallanuoto.gif');
    $flag=0;
    $sportmodify="";
    switch($sportazienda)
    {
     case "Calcio5":
     $sportazienda= " Calcio a 5";
     $img=$immagini['Calcio5'];
     break;

     case "Calcio7":

     $sportazienda= " Calcio a 7";

     $img=$immagini['Calcio7'];
     break;

     case "Calcio8":

     $sportazienda= " Calcio a 8";

     $img=$immagini['Calcio8'];
     break;

     case "Calcio11":

     $sportazienda= " Calcio a 11";

     $img=$immagini['Calcio11'];
     break;

     case "Hockey":
     $img=$immagini['Hockey'];
     break;

     case "Golf":
     $img=$immagini['Golf'];
     break;

     case "Arti Marziali":
     $img=$immagini['Arti Marziali'];
     break;

     case "Basket":
     $img=$immagini['Basket'];
     break;

     case "Tennis":
     $img=$immagini['Tennis'];
     break;

     case "Nuoto":
     $img=$immagini['Nuoto'];
     break;

     case "Atletica":
     $img=$immagini['Atletica'];
     break;

     case "Ginnastica":
     $img=$immagini['Ginnastica'];
     break;

     case "Pallavolo":
     $img=$immagini['Pallavolo'];
     break;

     case "Rugby":
     $img=$immagini['Rugby'];
     break;

     case "Fitness":
     $img=$immagini['Fitness'];
     break;

     case "Pugilato":
     $img=$immagini['Pugilato'];
     break;

     case "Danza":
     $img=$immagini['Danz'];
     break;

     case "Pallamano":
     $img=$immagini['Pallamano'];
     break;

     case "Pallanuoto":
     $img=$immagini['Pallanuoto'];
     break;

     default:
     $img="pictures/bianco.png";
     break;

    }

    echo"
     <div id=\"cerca\">
     <div id=\"titlesearch\">
     <h5 id=\"header5\">Riepilogo Prenotazione</h5>
     </div>

     <table id=\"tabellauno\" summary=\"disponibilita\" cellspacing=\"7\" cellpadding=\"2\" >
     <thead>
     <tr>
     <th class=\"etichettestruttura\">Sport</th>
     <th class=\"etichettestruttura\" id=\"impiantolargo\">Impianto</th>
     <th class=\"etichettestruttura\">Data</th>
     <th class=\"etichettestruttura\">Ora Inzio</th>
     <th class=\"etichettestruttura\">Ora Fine</th>
     <th class=\"etichettestruttura\">Nome Utente</th>
     <th class=\"etichettestruttura\">Cognome Utente</th>
     <th class=\"etichettestruttura\">Telefono Utente</th>
     </tr>
     </thead>
     <tbody>
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">";
     echo"<td id=\"grandsportrel\">$sportazienda</td>";
     echo"
     <td>$impianto</td>
     <td>$dataazienda</td>
     <td>$oraiazienda</td>
     <td>$orafazienda</td>
     <td><input type=\"text\" id =\"nomeesterno\" size=\"15\" maxlength=\"25\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
     <td><input type=\"text\" id =\"cognomeesterno\" size=\"15\" maxlength=\"25\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
     <td><input type=\"text\" id =\"telefonoesterno\" size=\"15\" maxlength=\"10\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
     </tr>
     ";
     $_SESSION['sportazienda']=$sportaziendacopia;
     $_SESSION['impianto']=$impianto;
     $_SESSION['dataazienda']=$dataazienda;
     $_SESSION['oraiazienda']=$oraiazienda;
     $_SESSION['orafazienda']=$orafazienda;
     echo"
     <tr>";
    echo "<td colspan=\"8\"><input type=\"button\" name=\"indietro\" class=\"tasto\"  value=\"Indietro\" onClick=\"location.href='Profile.php'\"><input type=\"button\" name=\"loadpren\" class=\"tasto\" value=\"Carica\" onClick=\"return controlloazienda()\"></td>";
    echo"</tr></tbody>
    </table>";

     echo"<img src=\"$img\" class=\"immaginesport\" alt=\"Immagine Sport Selezionato\"></div>";
 }
 else
 {
  if(isset($_GET['nomeesterno']))
  {//inserimento prenotazione azienda da calendario
     $er=0;
     $sportazienda=$_SESSION['sportazienda'];

     $impianto=$_SESSION['impianto'];

     $dataazienda=$_SESSION['dataazienda'];

     $datainser=explode("/",$dataazienda);
     $datanew=$datainser[2]."-".$datainser[1]."-".$datainser[0];

     $oraiazienda=$_SESSION['oraiazienda'];
     $orainser=$oraiazienda.":"."00";

     $orafazienda=$_SESSION['orafazienda'];
     $orainser2=$orafazienda.":"."00";


     $nome=$_GET['nomeesterno'];

     $cognome=$_GET['cognomeesterno'];

     $telefono=$_GET['telefonoesterno'];

     $cod=$_SESSION['numazienda'];

     $sqlcmd="INSERT INTO esterni SET Nome='$nome', Cognome='$cognome', Telefono='$telefono' ";
     $risultato=mysql_query($sqlcmd);
     if(!$risultato)
    {
     echo("Errore nell'interrogazione: $sqlcmd. ");
     echo mysql_error();
     $er=1;
    }
     $idesterno=mysql_insert_id();


    $sqlcmd1="SELECT Cod_Struttura FROM strutture WHERE Sport='$sportazienda' AND Impianto='$impianto' AND Id_Azienda='$cod' ";
    $risultato1=mysql_query($sqlcmd1);
    if(!$risultato1)
    {
     echo("Errore nell'interrogazione: $sqlcmd1. ");
     echo mysql_error();
     $er=1;
    }
    $riga1=mysql_fetch_array($risultato1);
    $idstru=$riga1['Cod_Struttura'];


    $sqlcmd2="SELECT DS.Id_Disponibilita FROM disp_strutture DS, disponibilita D WHERE DS.Id_Struttura='$idstru' AND DS.Id_Disponibilita=D.Id AND D.Giorno_Inizio='$datanew' AND D.Ora_Inizio='$orainser' AND D.Ora_Fine='$orainser2' ";
    $risultato2=mysql_query($sqlcmd2);
    if(!$risultato2)
    {
     echo("Errore nell'interrogazione: $sqlcmd2. ");
     echo mysql_error();
     $er=1;
    }
    $riga2=mysql_fetch_array($risultato2);
    $iddisp=$riga2['Id_Disponibilita'];


    $sqlcmd3="UPDATE disponibilita D SET Occupato=1 WHERE D.Id='$iddisp'  ";
    $risultato3=mysql_query($sqlcmd3);
    if(!$risultato3)
    {
     echo("Errore nell'interrogazione: $sqlcmd3. ");
     echo mysql_error();
     $er=1;
    }

    $sqlcmd4="INSERT INTO prenot_esterni SET Id_Disponibilita='$iddisp', Id_Esterno='$idesterno' ";
    $risultato4=mysql_query($sqlcmd4);
    if(!$risultato4)
    {
     echo("Errore nell'interrogazione: $sqlcmd4. ");
     echo mysql_error();
     $er=1;
    }
    if($er==0)
    {
    echo "<script type=\"text/Javascript\">alert(\"Inserimento effettuato con successo!\");</script>";
    header("refresh:0; url=Profile.php");
    }

  }
  else
  { //dati dalla index
 $sport=$_GET['sport'];
 $sportcopia=$sport;

 $data=$_GET['data'];

 if(isset($_GET['datafinale']))
 $dataf=$_GET['datafinale'];

 $orai=$_GET['orainizio'];

 $oraf=$_GET['oraf'];

 if(isset($_GET['luogo']))
 $luogo=$_GET['luogo'];



 if(isset($_SESSION['rsociale']))
 {
  $azienda=$_SESSION['numazienda'];

  $sqlcmd="SELECT COUNT(Sport) FROM strutture WHERE Sport='$sport' AND Id_Azienda=' $azienda' ";
  $risultato=mysql_query($sqlcmd);
  if(!$risultato)
  {
  echo("Errore nell'interrogazione: $sqlcmd. ");
  echo mysql_error();
  }
  $riga=mysql_fetch_array($risultato);
  $trovato=$riga['COUNT(Sport)'];
  $carica=0;
  if($trovato==0)
  {
     $query="SELECT COUNT(Sport) FROM strutture S WHERE S.Id_Azienda='$azienda' ";
     $result=mysql_query($query);

     if(!$result)
     {
      echo("Errore nell'interrogazione: $query. ");
      echo mysql_error();
     }

     $row=mysql_fetch_array($result);
     $quantestrutture=$row['COUNT(Sport)'];
     if($quantestrutture==0)
     {
      echo "<script type=\"text/Javascript\">alert(\"È necessario configurare quali strutture sono a disposizione prima di procedere con l'inserimento della disponibilità!\");</script>";
      header("refresh:0; url=Profile.php");
     }
     else
     {
      echo"
      <script type=\"text/javascript\">
      alert(\"Lo sport selezionato non è tra quelli in gestione.           Riprova nuovamente.\")
      </script>";
      header('Refresh:0;url=index.php');
     }
  }
   else
   {
    $immagini=array('Calcio5'=>'pictures/campo.gif','Calcio7'=>'pictures/campo.gif','Calcio8'=>'pictures/campo.gif',
              'Calcio11'=>'pictures/campo.gif','Hockey'=>'pictures/campohockey.gif','Golf'=>'pictures/campogolf.gif',
              'Arti Marziali'=>'pictures/campomarziali.gif','Basket'=>'pictures/campobasket.gif','Tennis'=>'pictures/campotennis.gif',
              'Nuoto'=>'pictures/campopiscina.gif','Atletica'=>'pictures/campoatletica.gif','Ginnastica'=>'pictures/campoginnastic.gif',
              'Pallavolo'=>'pictures/campopallavolo.gif','Rugby'=>'pictures/camporugby.gif','Fitness'=>'pictures/campopalestra.gif',
              'Pugilato'=>'pictures/boxe.gif','Danza'=>'pictures/campodanza.gif','Pallamano'=>'pictures/campopallamano.gif',
              'Pallanuoto'=>'pictures/campopallanuoto.gif');
    $flag=0;
    $sportmodify="";
    switch($sport)
    {
     case "Calcio5":
     $sport= " Calcio a 5";
     $img=$immagini['Calcio5'];
     break;

     case "Calcio7":

     $sport= " Calcio a 7";

     $img=$immagini['Calcio7'];
     break;

     case "Calcio8":

     $sport= " Calcio a 8";

     $img=$immagini['Calcio8'];
     break;

     case "Calcio11":

     $sport= " Calcio a 11";

     $img=$immagini['Calcio11'];
     break;

     case "Hockey":
     $img=$immagini['Hockey'];
     break;

     case "Golf":
     $img=$immagini['Golf'];
     break;

     case "Arti Marziali":
     $img=$immagini['Arti Marziali'];
     break;

     case "Basket":
     $img=$immagini['Basket'];
     break;

     case "Tennis":
     $img=$immagini['Tennis'];
     break;

     case "Nuoto":
     $img=$immagini['Nuoto'];
     break;

     case "Atletica":
     $img=$immagini['Atletica'];
     break;

     case "Ginnastica":
     $img=$immagini['Ginnastica'];
     break;

     case "Pallavolo":
     $img=$immagini['Pallavolo'];
     break;

     case "Rugby":
     $img=$immagini['Rugby'];
     break;

     case "Fitness":
     $img=$immagini['Fitness'];
     break;

     case "Pugilato":
     $img=$immagini['Pugilato'];
     break;

     case "Danza":
     $img=$immagini['Danz'];
     break;

     case "Pallamano":
     $img=$immagini['Pallamano'];
     break;

     case "Pallanuoto":
     $img=$immagini['Pallanuoto'];
     break;

     default:
     $img="pictures/bianco.png";
     break;

    }

    echo"
     <div id=\"cerca\">
     <div id=\"titlesearch\">
     <h5 id=\"header5\">Riepilogo Disponibilit&agrave</h5>
     </div>

     <table id=\"tabellauno\" summary=\"disponibilita\" cellspacing=\"7\" cellpadding=\"2\" >
     <thead>
     <tr>
     <th class=\"etichettestruttura\">Sport</th>
     <th class=\"etichettestruttura\">Data Inizio Disponibilit&agrave</th>
     <th class=\"etichettestruttura\"> Data Fine Disponibilit&agrave</th>
     <th class=\"etichettestruttura\">Ora Inzio Disponibilit&agrave</th>
     <th class=\"etichettestruttura\">Ora Fine Disponibilit&agrave</th>
     <th class=\"etichettestruttura\">Costo</th>
     <th class=\"etichettestruttura\">Impianti Resi Disponibili</th>
     </tr>
     </thead>
     <tbody>
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">";
     echo"<td id=\"grandsportrel\">$sport</td>";
     echo"
     <td>$data</td>
     <td>$dataf</td>
     <td>$orai</td>
     <td>$oraf</td>
     <td><input type=\"text\" id =\"importo\" size=\"2\" maxlength=\"2\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
     <td><input type=\"text\" id =\"impdisp\" size=\"1\" value=\"$trovato\" readonly=\"readonly\"></td>
     </tr>
     ";
     $_SESSION['sport']=$sportcopia;
     $_SESSION['datai']=$data;
     if(isset($dataf))
     $_SESSION['dataf']=$dataf;
     $_SESSION['orai']=$orai;
     $_SESSION['oraf']=$oraf;
     if(isset($luogo))
     $_SESSION['luogo']=$luogo;
     $_SESSION['quantiimpianti']=$trovato;
     echo"
     <tr>";
    echo "<td colspan=\"7\"><input type=\"button\" name=\"indietro\" class=\"tasto\"  value=\"Indietro\" onClick=\"location.href='index.php'\"><input type=\"button\" name=\"loaddisp\" class=\"tasto\" value=\"Carica\" onClick=\"return controllo()\"></td>";
    echo"</tr></tbody>
    </table>";

     echo"<img src=\"$img\" class=\"immaginesport\" alt=\"Immagine Sport Selezionato\"></div>";
     }

}
 else
   {
    $datapre=explode("/",$data);
    $datacheck=$datapre[2]."-".$datapre[1]."-".$datapre[0];
    //echo $datacheck;

    $oraicheck=$orai.":"."00".":"."00";
    //echo $oraicheck;
    $orafcheck=$oraf.":"."00".":"."00";
    //echo $orafcheck;
    //echo $sportcopia;
    if($oraf==00)
    $ofinale=24;
    else
    $ofinale=$oraf;
    if($ofinale-$orai>=2)
    {
     echo"
    <script type=\"text/javascript\">
    alert(\"Attenzione! Per prenotare più ore consecutivamente è necessario suddividere la prenotazione nelle singole ore di allenamento da effettuare.\")
    </script>";
    header('Refresh:0;url=index.php');
    }
    else
    {
    $immagini=array('Calcio5'=>'pictures/campo.gif','Calcio7'=>'pictures/campo.gif','Calcio8'=>'pictures/campo.gif',
              'Calcio11'=>'pictures/campo.gif','Hockey'=>'pictures/campohockey.gif','Golf'=>'pictures/campogolf.gif',
              'Arti Marziali'=>'pictures/campomarziali.gif','Basket'=>'pictures/campobasket.gif','Tennis'=>'pictures/campotennis.gif',
              'Nuoto'=>'pictures/campopiscina.gif','Atletica'=>'pictures/campoatletica.gif','Ginnastica'=>'pictures/campoginnastic.gif',
              'Pallavolo'=>'pictures/campopallavolo.gif','Rugby'=>'pictures/camporugby.gif','Fitness'=>'pictures/campopalestra.gif',
              'Pugilato'=>'pictures/boxe.gif','Danza'=>'pictures/campodanza.gif','Pallamano'=>'pictures/campopallamano.gif',
              'Pallanuoto'=>'pictures/campopallanuoto.gif');

    switch($sport)
    {
     case "Calcio5":
     $sport= " Calcio a 5";
     $img=$immagini['Calcio5'];
     break;

     case "Calcio7":

     $sport= " Calcio a 7";

     $img=$immagini['Calcio7'];
     break;

     case "Calcio8":

     $sport= " Calcio a 8";

     $img=$immagini['Calcio8'];
     break;

     case "Calcio11":

     $sport= " Calcio a 11";

     $img=$immagini['Calcio11'];
     break;

     case "Hockey":
     $img=$immagini['Hockey'];
     break;

     case "Golf":
     $img=$immagini['Golf'];
     break;

     case "Arti Marziali":
     $img=$immagini['Arti Marziali'];
     break;

     case "Basket":
     $img=$immagini['Basket'];
     break;

     case "Tennis":
     $img=$immagini['Tennis'];
     break;

     case "Nuoto":
     $img=$immagini['Nuoto'];
     break;

     case "Atletica":
     $img=$immagini['Atletica'];
     break;

     case "Ginnastica":
     $img=$immagini['Ginnastica'];
     break;

     case "Pallavolo":
     $img=$immagini['Pallavolo'];
     break;

     case "Rugby":
     $img=$immagini['Rugby'];
     break;

     case "Fitness":
     $img=$immagini['Fitness'];
     break;

     case "Pugilato":
     $img=$immagini['Pugilato'];
     break;

     case "Danza":
     $img=$immagini['Danz'];
     break;

     case "Pallamano":
     $img=$immagini['Pallamano'];
     break;

     case "Pallanuoto":
     $img=$immagini['Pallanuoto'];
     break;

     default:
     $img="pictures/bianco.png";
     break;

    }


  $sqlcmd="SELECT Sport,Rag_Sociale,Citta,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, aziende A WHERE D.Occupato=0 AND D.Giorno_Inizio='$datacheck' AND D.Ora_Inizio='$oraicheck' AND D.Ora_Fine='$orafcheck' AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda=A.Cod_Azienda AND S.Sport='$sportcopia' AND A.Citta='$luogo' GROUP BY Rag_Sociale ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }
      echo "  <table class=\"tabellaunopren\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etis=ordina('etis',etis)\" colspan=\"2\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Centro Sportivo</th>
              <th class=\"etichettestruttura\" id=\"eticittapren\">Città</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"pricepren\" onClick=\"etics=ordina('etics',etics)\" >Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"8\" id=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";




    $riga=mysql_fetch_array($risultato);
    if(!$riga)
    {
     echo"
     <script type=\"text/javascript\">
     alert(\"La ricerca non ha prodotto risultati! Riprova nuovamente.\")
     </script>";
     header('Refresh:0;url=index.php');
    }
    else
    {

    while($riga)
    {

    $sport=$riga['Sport'];
    $ragsociale=$riga['Rag_Sociale'];
    $citta=$riga['Citta'];
    $datai=$riga['Giorno_Inizio'];
    $datavideoi=explode("-",$datai);
    $dataavideoi=$datavideoi[2]."/".$datavideoi[1]."/".$datavideoi[0];
    $orai=$riga['Ora_Inizio'];
    $oravideoi=explode(":",$orai);
    $oraavideoi=$oravideoi[0].":".$oravideoi[1];
    $oraf=$riga['Ora_Fine'];
    $oravideof=explode(":",$oraf);
    $oraavideof=$oravideof[0].":".$oravideof[1];
    $costo=$riga['Costo'];
    //$quanti=$riga['Count(Costo)'];


     echo"
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconfermaprenotazione(this)\" >
     <td class=\"centro\"><img src=\"$img\" class=\"immaginesportprenotazione\" alt=\"Immagine Sport Selezionato\"></td>
      <td>$sport</td>
     <td  class=\"centro\">$ragsociale</td>
     <td  class=\"centro\">$citta</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364 </td>
     </tr>
     ";

     $riga=mysql_fetch_array($risultato);
     }
      echo"
       </table>
       </div>
       </td>
       </tr>
       </tbody>
       </table>";

       }

    }


   }
}


}

}

}

?>

<?php
if(!$esiste_8)
{
echo"<div id=\"footer\">
<p id=\"descrfooter\"> Sport Centre &copy; 2013 Mariano Basile</p>

<a id=\"contatti\" href=\"mailto:basilemariano92@gmail.com\">Contatti</a>";
}
?>
</div>
</body>
</html>
