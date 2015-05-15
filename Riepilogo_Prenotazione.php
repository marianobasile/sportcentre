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
echo"Riepilogo";
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
  echo "<script type=\"text/javascript\" src=\"prenotazione.js\">";
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
    echo "<script type=\"text/javascript\" src=\"prenotazione.js\">";
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
 if(isset($_GET['impianto']))
 {
  $imp=array();
  $imp=$_GET['impianto'];
  $impiant=explode(",",$imp);
  $numero=$_GET['numimpianti'];

  $er=0;
  $sportutente=$_SESSION['sportutente'];
  //$impianto=$_GET['impianto'];
  $ragsocialeutente=$_SESSION['ragsocialeutente'];
  $datautente=$_SESSION['datautente'];
  $datama=explode("-",$datautente);
  $datamail=$datama[2]."/".$datama[1]."/".$datama[0];
  $oraiutente=$_SESSION['oraiutente'];
  $oraima=explode(":",$oraiutente);
  $oramail=$oraima[0].":".$oraima[1];
  $orafutente=$_SESSION['orafutente'];
  $orafma=explode(":",$orafutente);
  $oramailf=$orafma[0].":".$orafma[1];
  $idutente=$_SESSION['numutente'];


    $sqlcmd0="SELECT Cod_Azienda FROM aziende WHERE Rag_Sociale='$ragsocialeutente' ";
    $risultato0=mysql_query($sqlcmd0);
    if(!$risultato0)
    {
     echo("Errore nell'interrogazione: $sqlcmd0. ");
     echo mysql_error();
    }
     $riga0=mysql_fetch_array($risultato0);
     $codazienda=$riga0['Cod_Azienda'];
     //echo $codazienda;

    for($x=0;$x<$numero;$x++)
    {
    $sqlcmd1="SELECT Cod_Struttura FROM strutture WHERE Sport='$sportutente' AND Impianto='$impiant[$x]' AND Id_Azienda='$codazienda' ";
    $risultato1=mysql_query($sqlcmd1);
    if(!$risultato1)
    {
     echo("Errore nell'interrogazione: $sqlcmd1. ");
     echo mysql_error();
     $er=1;
    }
    $riga1=mysql_fetch_array($risultato1);
    $idstru=$riga1['Cod_Struttura'];
    //echo $idstru;

    $sqlcmd2="SELECT DS.Id_Disponibilita FROM disp_strutture DS, disponibilita D WHERE DS.Id_Struttura='$idstru' AND DS.Id_Disponibilita=D.Id AND D.Giorno_Inizio='$datautente' AND D.Ora_Inizio='$oraiutente' AND D.Ora_Fine='$orafutente' ";
    $risultato2=mysql_query($sqlcmd2);
    if(!$risultato2)
    {
     echo("Errore nell'interrogazione: $sqlcmd2. ");
     echo mysql_error();
     $er=1;
    }
    $riga2=mysql_fetch_array($risultato2);
    $iddisp=$riga2['Id_Disponibilita'];
    //echo $iddisp;

    $sqlcmd3="UPDATE disponibilita D SET Occupato=1 WHERE D.Id='$iddisp'  ";
    $risultato3=mysql_query($sqlcmd3);
    if(!$risultato3)
    {
     echo("Errore nell'interrogazione: $sqlcmd3. ");
     echo mysql_error();
     $er=1;
    }

    $sqlcmd4="INSERT INTO prenotazione SET Id_Disponibilita='$iddisp', Id_Utente='$idutente' ";
    $risultato4=mysql_query($sqlcmd4);
    if(!$risultato4)
    {
     echo("Errore nell'interrogazione: $sqlcmd4. ");
     echo mysql_error();
     $er=1;
    }
    if($er==0)
    {
    $sqlcmd5="SELECT Nome,Cognome FROM utenti WHERE Cod_Utente='$idutente' ";
    $risultato5=mysql_query($sqlcmd5);
    if(!$risultato5)
    {
     echo("Errore nell'interrogazione: $sqlcmd5. ");
     echo mysql_error();
     $er=1;
    }
    $rowutente=mysql_fetch_array($risultato5);
    $nomeutente=$rowutente['Nome'];
    $cognomeutente=$rowutente['Cognome'];

    $sqlcmd6="SELECT Rag_Sociale,Indirizzo,Citta,Telefono,E_Mail FROM aziende WHERE Cod_Azienda='$codazienda' ";
    $risultato6=mysql_query($sqlcmd6);
    if(!$risultato6)
    {
     echo("Errore nell'interrogazione: $sqlcmd6. ");
     echo mysql_error();
     $er=1;
    }
    $rigautente=mysql_fetch_array($risultato6);
    $ragsocazienda=$rigautente['Rag_Sociale'];
    $indazienda=$rigautente['Indirizzo'];
    $cittaazienda=$rigautente['Citta'];
    $telazienda=$rigautente['Telefono'];
    $mailazienda=$rigautente['E_Mail'];

    $sqlcmd7="SELECT E_Mail FROM utenti WHERE Cod_Utente='$idutente' ";
    $risultato7=mysql_query($sqlcmd7);
    if(!$risultato7)
    {
     echo("Errore nell'interrogazione: $sqlcmd7. ");
     echo mysql_error();
     $er=1;
    }
    $vettutente=mysql_fetch_array($risultato7);
    $mailutente=$vettutente['E_Mail'];

    $oggetto="Prenotazione ";
    $messaggio="Gentile $nomeutente $cognomeutente,
    la prenotazione da lei effettuata è stata effettuata con successo: qui di seguito troverà  i dati di riepilogo.
    Le ricordo che, una volta effettuato l'accesso, potrà visualizzare tutte le sue prenotazione dal menu le mie prenotazioni presente nella sua pagina personale.

        #####

        RIEPILOGO

        Data: $datamail
        Dalle: $oramail
        Alle: $oramailf

        Centro Sportivo: $ragsocazienda
        Città: $cittaazienda
        Indirizzo: $indazienda
        Telefono: $telazienda
        Indirizzo E-mail: $mailazienda

        Sport: $sportutente
        Impianto:$impiant[$x]

        #####

        Le ricordo che il sito web è raggiungibile all'indirizzo: http://sportcentre.altervista.org

        Grazie,
        Mariano Basile";
    $intestazioni= "From: SportCentre";
    $intestazioni.= "  Reply-To:basilemariano92@gmail.com";
    mail($mailutente, $oggetto, $messaggio, $intestazioni);
    }
  }
  echo "<script type=\"text/Javascript\">alert(\"Prenotazione effettuata con successo!\");</script>";
  header("refresh:0; url=index.php");
 }
 else
 {
 $sport=$_GET['sport'];
 $sportcopia=$sport;
 $_SESSION['sportutente']=$sportcopia;
 //echo $sportcopia;
 $ragsociale=$_GET['ragsociale'];
 $_SESSION['ragsocialeutente']=$ragsociale;
 //echo $ragsociale;
 $luogo=$_GET['citta'];
 //echo $luogo;
 $data=$_GET['data'];
 $orai=$_GET['orai'];
 $oraf=$_GET['oraf'];
 $costo=$_GET['costo'];
 $costotemp=explode(" ",$costo);
 $costoinser=$costotemp[0];

 if(!isset($_SESSION['nome']) && !isset($_SESSION['ragsociale']))
 {
     echo" <script type=\"text/javascript\">
     var result=confirm(\"Per visualizzare la pagina è necessario essere registrati. Procedere con la registrazione?\")
     if (result==true)
     document.location.href=\"Registra.php\";
     else
     document.location.href=\"index.php\";
     </script>";
     }
     else
     {

 echo"
     <div id=\"cercariepilogo\">
     <div id=\"titlesearch\">
     <h5 class=\"header5riepilogo\">Riepilogo Prenotazione</h5>
     </div>
     <h4 class=\"sportscelto\">$sport</h4>
     <h4 class=\"datascelta\"> $data - Dalle</h4><h4 class=\"sportsceltolinea\">$orai</h4><h4 class=\"datascelta\"> alle</h4><h4 class=\"sportsceltolinea\">$oraf</h4>";

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
    $datapre=explode("/",$data);
    $datacheck=$datapre[2]."-".$datapre[1]."-".$datapre[0];
    $_SESSION['datautente']=$datacheck;
    //echo $datacheck;

    $oraicheck=$orai.":"."00";
    $_SESSION['oraiutente']=$oraicheck;
    //echo $oraicheck;
    $orafcheck=$oraf.":"."00";
    $_SESSION['orafutente']=$orafcheck;
    //echo $orafcheck;

    $sqlcmd="SELECT COUNT(Impianto) FROM strutture S, disponibilita D, disp_strutture DS, aziende A WHERE  D.Giorno_Inizio='$datacheck' AND D.Ora_Inizio='$oraicheck' AND D.Ora_Fine='$orafcheck' AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda=A.Cod_Azienda AND S.Sport='$sportcopia' AND A.Citta='$luogo' AND A.Rag_Sociale='$ragsociale' AND D.Costo='$costoinser' AND D.Occupato=0  ";
    $risultato = mysql_query($sqlcmd);

    if(!$risultato)
    {
     echo("Errore nell'interrogazione: $sqlcmd. ");
     echo mysql_error();
    }
    $riga=mysql_fetch_array($risultato);
    $quanti=$riga['COUNT(Impianto)'];

    $sqlcmdtemp="SELECT Impianto FROM strutture S, disponibilita D, disp_strutture DS, aziende A WHERE  D.Giorno_Inizio='$datacheck' AND D.Ora_Inizio='$oraicheck' AND D.Ora_Fine='$orafcheck' AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda=A.Cod_Azienda AND S.Sport='$sportcopia' AND A.Citta='$luogo' AND A.Rag_Sociale='$ragsociale' AND D.Costo='$costoinser' AND D.Occupato=0  ";
    $risultatotemp = mysql_query($sqlcmdtemp);

    if(!$risultatotemp)
    {
     echo("Errore nell'interrogazione: $sqlcmdtemp. ");
     echo mysql_error();
    }
    $rigatemp=mysql_fetch_array($risultatotemp);
    $arralfabeto=array();
    $k=0;
    while($rigatemp)
    {
     $lettera=$rigatemp['Impianto'];
     $arralfabeto[$k]=$lettera;
     $k++;
     $rigatemp=mysql_fetch_array($risultatotemp);

    }
    echo"<h5 class=\"header5riepilogo\">Dati Azienda</h5><hr>";

    $sqlcmd1="SELECT Indirizzo,Telefono,E_Mail FROM aziende WHERE Rag_Sociale='$ragsociale' ";
    $risultato1=mysql_query($sqlcmd1);
    if(!$risultato1)
    {
     echo("Errore nell'interrogazione: $sqlcmd1. ");
     echo mysql_error();
    }
     $riga1=mysql_fetch_array($risultato1);
     $indirizzo=$riga1['Indirizzo'];
     $telefono=$riga1['Telefono'];
     $mail=$riga1['E_Mail'];
     echo"<p class=\"inlinea\" >Centro Sportivo: $ragsociale</p> <p class=\"inlinea\" id=\"luogopren\" > Città: $luogo </p><br>
     <p class=\"inlinea\" >Indirizzo: $indirizzo</p> <p class=\"inlinea\" id=\"telpren\" >Telefono: $telefono</p><br>
     <p class=\"inlinea\" >E-Mail: $mail </p>";


    echo"<h5 id=\"selimpianto\">Seleziona Struttura</h5><hr>";
    $alfabeto=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    for($i=0;$i<$quanti;$i++)
    {
     echo"<img src=\"$img\" class=\"immaginesportprenotazione\" alt=\"Immagine Sport Selezionato\">
     <input type=\"button\" name=\"$arralfabeto[$i]\" id=\"$arralfabeto[$i]\" class=\"tasto\"  value=\"Impianto $arralfabeto[$i]\" onClick=\"setta(this.id)\">" ;
    }
    echo"<h5 class=\"header5riepilogo\">Dati Prenotazione</h5><hr>";
    if(isset($_SESSION['nome']))
    {
     $nome=$_SESSION['nome'];
     $cognome=$_SESSION['cognome'];
     echo"
     <label for=\"cognomepren\" class=\"marginesx\">Cognome</label>
     <input type=\"text\" name=\"cognome\" id=\"cognomepren\" class=\"datipren\" value=\"$cognome\" size=\"20\" readonly=\"readonly\">
     <label for=\"nomepren\" class=\"marginesxsx\">Nome</label>
     <input type=\"text\" name=\"nome\" id=\"nomepren\" class=\"datipren\" value=\"$nome\" size=\"20\" readonly=\"readonly\"><br>
     ";
     $idutente=$_SESSION['numutente'];
     $sqlcmd="SELECT Telefono,E_Mail FROM utenti WHERE Cod_Utente='$idutente' ";
     $risultato=mysql_query($sqlcmd);
     if(!$risultato)
     {
       echo("Errore nell'interrogazione: $sqlcmd. ");
       echo mysql_error();
     }
      $riga=mysql_fetch_array($risultato);
      $telefono=$riga['Telefono'];
      $mail=$riga['E_Mail'];
      echo"
     <label class=\"marginesx\" for=\"telefonopren\">Telefono</label>
     <input type=\"text\" name=\"telefono\" id=\"telefonopren\" class=\"datipren\" value=\"$telefono\" size=\"15\"  readonly=\"readonly\">
     <label id=\"marginesxsxmail\" for=\"emailpren\">Indirizzo E-Mail</label>
     <input type=\"text\" name=\"mailpren\" id=\"emailpren\" class=\"datipren\" value=\"$mail\" size=\"30\"  readonly=\"readonly\"><br>
     ";
    }
    echo"<input type=\"button\" name=\"annulla\" class=\"tasto\" id=\"annulla\"  value=\"ANNULLA\" onClick=\"location.href='index.php'\">
    <input type=\"button\" name=\"prenota\" id=\"tastoprenota\" value=\"PRENOTA\" onClick=\"return check();\">";

}




}

}
?>
</div>
</body>
</html>