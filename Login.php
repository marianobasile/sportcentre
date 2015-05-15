<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta name="description" content="Servizio di registrazione, prenotazione,ricerca e gestione di impianti sportivi polivalenti." >
<meta name="keywords" content="centro sportivo,sport,benessere,calcio,backet,nuoto,tennis,rugby,atletica,pallavolo,palestra,golf,arti marziali,fitness" >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Accedi a SportCentre.</title>
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
<body  onload="document.login.reset()" onkeyup="aggiorna(event,'l')">
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
<div id="heartdxreg">
<form name="login" action="index.php" method="post" onSubmit="assegna();return check();">
<p id="descriptiontworeg">Seleziona il profilo</p>
<p id="profile">
<input type="button" name="userreg" id="userreg" value="Utente" onClick="modificareg(0);document.login.reset();improvereg();">
<input type="button" name="factoryreg" id="factoryreg" value="Azienda" onClick="modificareg(1);document.login.reset();improvereg();">
<input type="hidden" name="scelta" id="scelta" value="">
</p>
<div id="changes">
<ul>
<li>
<p class="chartext"><label class="etichettereg" for="username">Indirizzo e-mail</label></p>
<input type="text" tabindex="1" class="campireg" id="username" name="username" maxlength="30" onClick="improvereg()" onSelect="improvereg()">
</li>
<li>
<p class="chartext" ><label class="etichettereg" for="psw">Password</label></p>
<input type="password" tabindex="2" class="campireg" id="psw" name="psw" maxlength="20" onClick="improvereg()" onSelect="improvereg()">
</li>
</ul>
<p><input type="submit" tabindex="3" id="accedi" value="Accedi"></p>
<a id="recupera" href="Recupera.php">Problemi con l'accesso?</a>
<?php
if($_GET)
{
 //echo $_GET['scelta'];
 if(isset($_GET['flag']))
 {
  $f=$_GET['flag'];
  if(isset($_GET['scelta']))
  {
   if($_GET['scelta']=='Aziende')
   {
   echo"<script type=\"text/Javascript\">
   document.login.factoryreg.style.backgroundColor='#5679B6';
   document.login.userreg.style.backgroundColor='grey';
   </script>";
   }
  }
   if($f==0)
  {
   echo"<p id=\"descrizionesubtitle\">Indirizzo e-mail non corretto.</p>";
   echo"<script type=\"text/javascript\">
   document.login.username.style.border='1px solid #dd4b39';
   </script>";
  }
   if($f==1)
   {
    echo"<p id=\"descrizionesubtitle\">Password non corretta.</p>";
    echo"<script type=\"text/javascript\">
    document.login.psw.style.border='1px solid #dd4b39';
    </script>";
   }
     if($f==2)
    {
     echo"<p id=\"descrizionesubtitle\">E-mail o password non corretti.</p>";
     echo"<script type=\"text/javascript\">
     document.login.username.style.border='1px solid #dd4b39';
     document.login.psw.style.border='1px solid #dd4b39';
     </script>";
    }

 }

}
?>
</div>
</form>
</div>
<div id="footer">
<p id="descrfooter"> Sport Centre &copy; 2013 Mariano Basile</p>
<?php
  if(!$esiste_8)
echo"<a id=\"contatti\" href=\"mailto:basilemariano92@gmail.com\">Contatti</a>";
?>
</div>
</div>
</body>
</html>
