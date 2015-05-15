<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta name="description" content="Servizio di registrazione, prenotazione,ricerca e gestione di impianti sportivi polivalenti." >
<meta name="keywords" content="centro sportivo,sport,benessere,calcio,backet,nuoto,tennis,rugby,atletica,pallavolo,palestra,golf,arti marziali,fitness" >
<meta name="author" content="Mariano Basile">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Registrazione SportCentre.</title>
<?php
  $browser=$_SERVER['HTTP_USER_AGENT'];
  $esiste_8=strpos($browser,"MSIE 8.0");
  $esiste_9=strpos($browser,"MSIE 9.0");
  $esiste_10=strpos($browser,"MSIE 10.0");
  $chrome=strpos($browser,"Chrome");
  if($esiste_8)
  {
  echo "<link rel=\"stylesheet\" href=\"welcomeie8.css\" type=\"text/css\" media=\"screen\">";
  echo "<script type=\"text/javascript\" src=\"welcomeie.js\">";
  }
  else
  {
   if($esiste_9 || $esiste_10 )
   echo "<link rel=\"stylesheet\" href=\"welcomeie9.css\" type=\"text/css\" media=\"screen\">";
   else
   {
    if($chrome)
    echo "<link rel=\"stylesheet\" href=\"welcomechrome.css\" type=\"text/css\" media=\"screen\">";
    else
    echo "<link rel=\"stylesheet\" href=\"welcome.css\" type=\"text/css\" media=\"screen\">";
   }
   echo "<script type=\"text/javascript\" src=\"welcome.js\">";
  }
?>
</script>
</head>
<body onload="set();document.register.reset();" onkeyup="aggiorna(event,'r')">
<div id="intestazione">
<div id="intesta_1">
<a href="index.php">
<img src="pictures/logo.gif" id="websitelogo" alt="Logo del sito">
</a>
</div>
</div>
<div id="heart">
<div id="heartsx">
<p id="descriptionone">SCEGLI L'IMPIANTO SPORTIVO
PI&Ugrave ADATTO ALLE TUE ESIGENZE PRENOTA E GODITI L'ALLENAMENTO
</p>
<ul>
<li><img src="pictures/hockey.gif" alt="icona hockey" ><p class="loghi">Hockey</p> </li>
<li><img src="pictures/arti_marziali.gif" alt="icona arti_marziali.gif " ><p class="loghi">Arti Marziali</p> </li>
<li><img src="pictures/nuoto.gif" alt="icona piscina" ><p class="loghi">Piscina</p> </li>
<li><img src="pictures/pallavolo.gif" alt="icona volley" ><p class="loghi">Pallavolo</p> </li>
</ul>
<ul>
<li><img src="pictures/calcio.gif" alt="icona calcio" ><p class="loghi">Calcio</p> </li>
<li><img src="pictures/basket.gif" alt="icona basket" ><p class="loghi">Basket</p> </li>
<li><img src="pictures/atletica.gif" alt="icona atletica" ><p class="loghi">Atletica</p> </li>
<li><img src="pictures/rugby.gif" alt="icona rugby" ><p class="loghi">Rugby</p> </li>
</ul>
<ul>
<li><img src="pictures/golf.jpg" alt="icona golf" ><p class="loghi">Golf</p> </li>
<li><img src="pictures/tennis.gif" alt="icona campo da tennis" ><p class="loghi">Tennis</p> </li>
<li><img src="pictures/ginnastica.gif" alt="icona ginnastica" ><p class="loghi">Ginnastica</p> </li>
<li><img src="pictures/palestra.gif" alt="icona fitness" ><p class="loghi">Fitness</p> </li>
</ul>
</div>
<div id="heartdx">
<form name="register" method="post" action="index.php" onSubmit="return verifica();">
<p id="descriptiontwo">Seleziona il profilo</p>
<div id="profile">
<input type="button" name="user" id="user" value="Utente" onClick="modifica(this.name,0)">
<input type="button" name="factory" id="factory" value="Azienda" onClick="modifica(this.name,1)">
<?php
if($_GET)
{
 if(isset($_GET['flagreg']))
 {
  $f=$_GET['flagreg'];
  $mail=$_GET['email'];
  $password=$_GET['password'];
   echo"<p id=\"descrizionereg\">Registrazione effettuata con successo!</p>";
   header("Refresh: 5; url=index.php?username=$mail&psw=$password&scelta=$f");
 }
}
?>
<div id="changes">
<ul>
<li>
<p class="chartext" ><label class="etichette" for="nome">Nome</label></p>
<input type="text" tabindex="1" class="campi" name="nome" id="nome" maxlength="15" size="50" onClick="improve()" onSelect="improve()">
</li>
<li>
<p class="chartext" ><label class="etichette" for="cognome">Cognome</label></p>
<input type="text" tabindex="2" class="campi" id="cognome"  name="cognome" maxlength="25" size="50" onClick="improve()" onSelect="improve()">
</li>
<li>
<p class="chartext" ><label class="etichette" for="email">Indirizzo e-mail</label></p>
<input type="text" tabindex="3"  class="campi" id="email" name="email" maxlength="30" size="50" onClick="improve()" onSelect="improve()">
</li>
<li>
<p class="chartext" ><label class="etichette" for="password">Password</label></p>
<input type="password" tabindex="4" class="campi" id="password" name="password" maxlength="20" size="50" onClick="improve()" onSelect="improve()">
</li>
<li>
<p class="chartext" ><label class="etichette" for="cellulare">Telefono</label></p>
<input type="text" tabindex="5" class="campi" id="cellulare" name="cellulare" maxlength="10" size="50" onClick="improve()" onSelect="improve()">
</li>
<li>
<p class="chartext"><label class="etichette" for="data_birth_d" >Data di Nascita</label></p>
<input type="text" tabindex="6"  id="data_birth_d"  name="day" value="Giorno" maxlength="2" size="5" onClick="azzera(this.name,0);improve();" onMouseOut="set()" onFocus="azzera(this.name,0)" onBlur="set()" onSelect="improve()">
<select name="mese" tabindex="7"  id="data_birth_s" >
<?php
$mese="";
$mese=array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");
for($i=0;$i<12;$i++)
echo "<option value=$mese[$i]>$mese[$i]</option>";
?>
</select>
<input type="text" tabindex="8" id="data_birth_y"  name="year" value="Anno" maxlength="4" size="8" onClick="azzera(this.name,1);improve();" onMouseOut="set()" onFocus="azzera(this.name,1)" onBlur="set()" onSelect="improve()">
</li>
</ul>
</div>
<p><input type="submit" tabindex="9" id="registra" value="Registrazione"></p>
</form>
</div>
</div>
<div id="footer">
<p id="descrfooter"> Sport Centre &copy; 2013 Mariano Basile</p>
<?php
  if(!$esiste_8)
echo"<a id=\"contatti\" href=\"mailto:basilemariano92@gmail.com\">Contatti</a>";
?>
</div>
<?php
if($_GET)
{
 if(isset($_GET['flagreg']))
 {
  $f=$_GET['flagreg'];
   echo"<script type=\"text/javascript\">
   alert(\"Sarai reindirizzato automaticamente tra 5 secondi \");
   </script> ";

 }
}
?>
</body>
</html>
