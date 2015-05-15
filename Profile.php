<?php
include ("Conn_Scelta_db.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>

<title><?php
session_start();
if(isset($_SESSION['nome']))
echo $_SESSION['nome'].' '.$_SESSION['cognome'];
if(isset($_SESSION['rsociale']))
echo $_SESSION['rsociale'];
?>   </title>
<meta name="description" content="Servizio di registrazione, prenotazione,ricerca e gestione di impianti sportivi polivalenti." >
<meta name="keywords" content="centro sportivo,sport,benessere,calcio,backet,nuoto,tennis,rugby,atletica,pallavolo,palestra,golf,arti marziali,fitness,pugilato,danza,pallamano,pallanuoto,aziende,strutture,prenotazioni,utenti,impianto sportivo,gestione" >
<meta name="author" content="Mariano Basile">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
  $browser=$_SERVER['HTTP_USER_AGENT'];
  $esiste_8=strpos($browser,"MSIE 8.0");
  $esiste_9=strpos($browser,"MSIE 9.0");
  $esiste_10=strpos($browser,"MSIE 10.0");
  $chrome=strpos($browser,"Chrome");
  if($esiste_8)
  {
  echo "<link rel=\"stylesheet\" href=\"profileie8.css\" type=\"text/css\" media=\"screen\">";
  echo "<script type=\"text/javascript\" src=\"inizio.js\">";
  }
   else
   {
    if($esiste_9 || $esiste_10 )
    echo "<link rel=\"stylesheet\" href=\"profileie9.css\" type=\"text/css\" media=\"screen\">";
    else
    {
     if($chrome)
     echo "<link rel=\"stylesheet\" href=\"Profile.css\" type=\"text/css\" media=\"screen\">";
     else
     echo "<link rel=\"stylesheet\" href=\"profilemozilla.css\" type=\"text/css\" media=\"screen\">";
    }
    echo "<script type=\"text/javascript\" src=\"inizio.js\">";
   }
?>
</script>
<script type="text/javascript" src="profile.js">
</script>
</head>
<body onLoad="impostabkg()" >
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
$stato=0;
@$stato=verifica_sessione($_SESSION['oraaccesso']);
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
<div id="menusx">
<?php
if(isset($_SESSION['nome']))
{
 echo"<ul id=\"submenusx\">
 <li>
 <p class=\"elemlista\" id=\"profilo\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Profilo</p>
 </li>
 <li>
 <p class=\"elemlista\" id=\"cambiapsw\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Impostazioni</p>
 </li>
 <li>
 <p class=\"elemlista\" id=\"myprenot\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Le mie prenotazioni</p>
 </li>
 </ul>";
}
 if(isset($_SESSION['rsociale']))
 {
   echo"<ul id=\"submenusx\">
   <li>
   <p class=\"elemlista\" id=\"profilo\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Profilo</p>
   </li>
   <li>
   <p class=\"elemlista\" id=\"cambiapsw\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Impostazioni</p>
   </li>
   <li>
   <p class=\"elemlista\" id=\"mystruttura\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Le mie strutture</p>
   </li>
   <li>
   <p class=\"elemlista\" id=\"dispstrutture\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Disponibilità strutture</p>
   </li>
   <li>
   <p class=\"elemlista\" id=\"myprenot\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Prenotazioni Utenti</p>
   </li>
   <li>
   <p class=\"elemlista\" id=\"myprenote\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Prenotazioni Esterni</p>
   </li>
   <li>
   <p class=\"elemlista\" id=\"giornaliero\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Giornaliero Utenti</p>
   </li>
   <li>
   <p class=\"elemlista\" id=\"giornalieroe\" onMouseover=\"cambiabkg(this.id)\" onClick=\"setbkg(this.id)\" onMouseOut=\"resetbkg(this.id)\">Giornaliero Esterni</p>
   </li>
   </ul>";
 }
?>
</div>
<div id="heart">
</div>
<div id="footer">
<p id="descrfooter"> Sport Centre &copy; 2013 Mariano Basile</p>
<?php
  if(!$esiste_8)
echo"<a id=\"contatti\" href=\"mailto:basilemariano92@gmail.com\">Contatti</a>";
?>
</div>
</body>
</html>
