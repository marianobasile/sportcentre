<?php
include ("Conn_Scelta_db.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta name="description" content="Servizio di registrazione, prenotazione,ricerca e gestione di impianti sportivi polivalenti." >
<meta name="keywords" content="centro sportivo,sport,benessere,calcio,backet,nuoto,tennis,rugby,atletica,pallavolo,palestra,golf,arti marziali,fitness,pugilato,danza,pallamano,pallanuoto,aziende,strutture,prenotazioni,utenti,impianto sportivo,gestione" >
<meta name="author" content="Mariano Basile">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Recupera Dati Registrazione</title>
<?php
  $browser=$_SERVER['HTTP_USER_AGENT'];
  $esiste_8=strpos($browser,"MSIE 8.0");
  $esiste_9=strpos($browser,"MSIE 9.0");
  $esiste_10=strpos($browser,"MSIE 10.0");
  $chrome=strpos($browser,"Chrome");
  if($esiste_8)
  {
  echo "<link rel=\"stylesheet\" href=\"recuperaie8.css\" type=\"text/css\" media=\"screen\">";
  }
   else
   {
    if($esiste_9 || $esiste_10 )
    echo "<link rel=\"stylesheet\" href=\"inizioie9.css\" type=\"text/css\" media=\"screen\">";
    else
    {
     if($chrome)
     echo "<link rel=\"stylesheet\" href=\"inizio.css\" type=\"text/css\" media=\"screen\">";
     else
     echo "<link rel=\"stylesheet\" href=\"iniziomozilla.css\" type=\"text/css\" media=\"screen\">";
    }
   }
?>
<script type="text/javascript" src="recupera.js">
</script>
</head>
<body>
<div id="intestazione">
<div id="intesta_1">
<a href="index.php">
<img src="pictures/logo.gif" id="websitelogo" alt="Logo del sito">
</a>
</div>

<?php
if($_POST)
{
$username=mysql_real_escape_string($_POST['username']);
$sqlcmd="SELECT COUNT(Cod_Utente),Nome,Cognome FROM utenti WHERE E_Mail='$username' ";
$risultato=mysql_query($sqlcmd);
if(!$risultato)
{
 echo("Errore nell'interrogazione: $sqlcmd2. ");
 echo mysql_error();
}
$riga=mysql_fetch_array($risultato);
$quanto=$riga['COUNT(Cod_Utente)'];
if($quanto==1)
{
 $nome=$riga['Nome'];
 $cognome=$riga['Cognome'];
 $chars = "abcdefghijkmnopqrstuvwxyz023456789";
  srand((double)microtime()*1000000); // setta il generatore di numeri casuali
  $i = 0; $passwd = '';
  while ($i < 8) {      //password di otto caratteri
    $num = rand()%33;
    $passwd .= substr($chars,$num,1);
    $i++;
  }
        $oggetto="Modifica Password ";
        $messaggio="Gentile $nome $cognome,
        la richiesta da lei inviatomi di nuova password è stata gestita e qui di seguito troverà le credenziali per poter effettuare nuovamente l'accesso.
        Le ricordo che, una volta effettuato l'accesso, potrà modificare comodamente la sua password dal menu impostazioni presente nella sua pagina personale.

        #####


        Password: $passwd


        Le ricordo che il sito web è raggiungibile all'indirizzo: http://sportcentre.altervista.org

        Grazie,
        Mariano Basile";
        $intestazioni= "From: SportCentre";
        $intestazioni.= "  Reply-To:basilemariano92@gmail.com";
        mail($username, $oggetto, $messaggio, $intestazioni);

        $sqlcmd1="UPDATE utenti SET Password=md5('$passwd') WHERE E_Mail='$username' ";
        $risultato1=mysql_query($sqlcmd1);
        if(!$risultato1)
        {
         echo("Errore nell'interrogazione: $sqlcmd1. ");
         echo mysql_error();
        }
        else
        {
        echo "<script type=\"text/Javascript\">alert(\"La nuova password è stata inviata all'indirizzo specificato.\");</script>";
        header("refresh:0; url=Login.php");
        }
}
 else
 {
  $sqlcmd2="SELECT COUNT(Cod_Azienda),Rag_Sociale FROM aziende WHERE E_Mail='$username' ";
  $risultato2=mysql_query($sqlcmd2);
  if(!$risultato2)
  {
   echo("Errore nell'interrogazione: $sqlcmd2. ");
   echo mysql_error();
  }
   $riga2=mysql_fetch_array($risultato2);
   $quanto2=$riga2['COUNT(Cod_Azienda)'];
   if($quanto2==1)
   {
    $rsociale=$riga2['Rag_Sociale'];
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000); // setta il generatore di numeri casuali
    $i = 0; $passwd = '';
    while ($i < 8) {      //password di otto caratteri
    $num = rand()%33;
    $passwd .= substr($chars,$num,1);
    $i++;
  }
        $oggetto="Modifica Password ";
        $messaggio="Gentile $rsociale,
        la richiesta da lei inviatomi di nuova password è stata gestita e qui di seguito troverà le credenziali per poter effettuare nuovamente l'accesso.
        Le ricordo che, una volta effettuato l'accesso, potrà modificare comodamente la sua password dal menu impostazioni presente nella sua pagina personale.

        #####


        Password: $passwd


        Le ricordo che il sito web è raggiungibile all'indirizzo: http://sportcentre.altervista.org

        Grazie,
        Mariano Basile";
        $intestazioni= "From: SportCentre";
        $intestazioni.= "  Reply-To:basilemariano92@gmail.com";
        mail($username, $oggetto, $messaggio, $intestazioni);

        $sqlcmd3="UPDATE aziende SET Password=md5('$passwd') WHERE E_Mail='$username' ";
        $risultato3=mysql_query($sqlcmd3);
        if(!$risultato3)
        {
         echo("Errore nell'interrogazione: $sqlcmd3. ");
         echo mysql_error();
        }
        else
        {
        echo "<script type=\"text/Javascript\">alert(\"La nuova password è stata inviata all'indirizzo specificato.\");</script>";
        header("refresh:0; url=Login.php");
        }
   }
   else
   echo "<script type=\"text/Javascript\">alert(\"Indirizzo email errato!\");</script>";
 }
}
?>
<div id="container">
<img src="pictures/onoff.gif" id="tasto" alt="Immagine di profilo" onClick="creamenu(1,1)"><p id="dove"></p>
<a id="Home" href="index.php">Home</a>
</div>
</div>
<div id="heartdxreg">
<form name="recupera" action="#" method="post" onSubmit="return check()">
<h5 class="titolorec">Hai dimenticato la password?</h5>

<p class="chartext"><label class="etichettereg" for="username">Indirizzo e-mail</label>

<input type="text" tabindex="1" class="campireg" id="username" name="username" maxlength="30" size="42" onClick="improvereg()" onSelect="improvereg()"></p>

<p><input type="submit" tabindex="3" id="accedi" value="RECUPERA"></p>
</form>
</div>
</body>
</html>