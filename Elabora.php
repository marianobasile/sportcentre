<?php
include ("Conn_Scelta_db.php");
?>

<?php
if(isset($_GET["oggetto"]))
{
$parametro=$_GET["oggetto"];
session_start();
if($parametro=="profilo" && isset($_SESSION['nome']) )
{

 $name=$_SESSION['nome'];
 $surname=$_SESSION['cognome'];
 $numutente=$_SESSION['numutente'];
 $id=0;
 if($_SESSION['boolimg']==1)
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
 }

 $sqlcmd="SELECT Nome,Cognome,E_Mail,Telefono,Data_di_Nascita,Citta FROM utenti WHERE Nome='$name' and Cognome='$surname' ";


 $risultato = mysql_query($sqlcmd);

 if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

$riga=mysql_fetch_array($risultato);



$nome=$riga['Nome'];
$cognome=$riga['Cognome'];
$mail=$riga['E_Mail'];
$telefono=$riga['Telefono'];
$datanascita=$riga['Data_di_Nascita'];
$data=explode("-",$datanascita);
$giorno=$data[2];
$mese=$data[1];
$anno=$data[0];
switch($mese)
{
 case 01:
 $mese="Gennaio";
 break;
 case 02:
 $mese="Febbraio";
 break;
 case 03:
 $mese="Marzo";
 break;
 case 04:
 $mese="Aprile";
 break;
 case 05:
 $mese="Maggio";
 break;
 case 06:
 $mese="Giugno";
 break;
 case 07:
 $mese="Luglio";
 break;
 case 08:
 $mese="Agosto";
 break;
 case 09:
 $mese="Settembre";
 break;
 case 10:
 $mese="Ottobre";
 break;
 case 11:
 $mese="Novembre";
 break;
 case 12:
 $mese="Dicembre";
 break;
}
$città=$riga['Citta'];
$date=$giorno." ".$mese." ".$anno;
echo"
<div id=\"subinfo\">
<h5 id=\"header5\">Informazioni di Registrazione</h5>
<img src=\"pictures/settaggi.gif\" id=\"settaggi\" alt=\"Ingranaggi\">
</div>";
if($_SESSION['boolimg']==0)
echo"<img src=\"pictures/faccia.jpg\" id=\"miaimmagine\" alt=\"Immagine di profilo\">";
else
echo"<img src=\"image.php?id=$id\" id=\"miaimmagine\" alt=\"Immagine di profilo\">";
echo"<label id=\"eticaricafoto\" for=\"inserimg\">Carica una foto:</label>";
echo"
     <form name=\"form1\" enctype=\"multipart/form-data\" method=\"post\" action=\"Elabora.php\">
     <p><input type=\"file\" name=\"inserimg\" id=\"inserimg\" >";
echo"<input type=\"submit\" name=\"caricaimg\" id=\"caricaimg\" value=\"Carica\" class=\"tasto\" onsubmit=\"return verifica(inserimg.value)\"></p> </form> ";
echo"<label id=\"caricacitta\" for=\"citta\">Citt&agrave di residenza:</label>";
echo"<input type=\"text\" name=\"city\" id=\"city\" size=\"30\" onClick=\"sfondo('c')\" onSelect=\"sfondo('c')\">";
echo"<input type=\"button\" name=\"loadcity\" id=\"loadcity\" value=\"Modifica\" class=\"tasto\" onClick=\"return verify('c')\">";
$browser=$_SERVER['HTTP_USER_AGENT'];
$mozilla=strpos($browser,"Firefox");
if($mozilla)
echo"<input type=\"button\" name=\"annullaimg\" class=\"tasto\"  id=\"annullaimg\" value=\"Cancella\" onClick=\"document.getElementById('inserimg').value='';\">";
echo "
<table id=\"tabella\">
<caption class=\"titolotabella\">Informazioni Utente</caption>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"nome\">Nome</label></td>
<td><input type=\"text\" name=\"nome\" id=\"nome\" value=\"$nome\" readonly=\"readonly\"></td></tr>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"cognome\">Cognome</label></td>
<td><input type=\"text\" name=\"cognome\" id=\"cognome\" value=\"$cognome\" readonly=\"readonly\"></td></tr>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"email\">E-Mail</label></td>
<td><input type=\"text\" name=\"email\" id=\"email\" value=\"$mail\" size=\"30\" readonly=\"readonly\" ></td></tr>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"telefono\">Telefono</label></td>
<td><input type=\"text\" name=\"telefono\" id=\"telefono\" value=\"$telefono\" readonly=\"readonly\"></td></tr>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"datanascita\">Data di Nascita</label></td>
<td><input type=\"text\" name=\"datanascita\" id=\"datanascita\" value=\"$date\" readonly=\"readonly\"></td></tr>";
if(isset($città))
{
 echo"
 <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"citta\">Citt&agrave</label></td>
 <td><input type=\"text\" name=\"citta\" id=\"citta\" value=\"$città\"  readonly=\"readonly\" ></td></tr>";
}
else
{
echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"citta\">Citt&agrave</label></td>
<td><input type=\"text\" name=\"citta\" id=\"citta\" value=\"\"  readonly=\"readonly\" ></td></tr>";
}
echo"</table>";
}
 if($parametro=="profilo" && isset($_SESSION['rsociale']) )
{
  $rsociale=$_SESSION['rsociale'];
  $numazienda=$_SESSION['numazienda'];
  $id=0;
  if($_SESSION['boolimg']==1)
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
  }

  $sqlcmd="SELECT Rag_Sociale,Citta,Partita_Iva,E_Mail,Telefono,Indirizzo FROM aziende WHERE Rag_Sociale='$rsociale' ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

  $riga=mysql_fetch_array($risultato);



$ragione=$riga['Rag_Sociale'];
$città=$riga['Citta'];
$iva=$riga['Partita_Iva'];
$mail=$riga['E_Mail'];
$telefono=$riga['Telefono'];
$indirizzo=$riga['Indirizzo'];
echo"
<div id=\"subinfo\">
<h5 id=\"header5\">Informazioni di Registrazione</h5>
<img src=\"pictures/settaggi.gif\" id=\"settaggi\" alt=\"Ingranaggi\">
</div>";
if($_SESSION['boolimg']==0)
echo"<img src=\"pictures/faccia.jpg\" id=\"miaimmagine\" alt=\"Immagine di profilo\">";
else
echo"<img src=\"image.php?id=$id\" id=\"miaimmagine\" alt=\"Immagine di profilo\">";
echo"<label id=\"eticaricafoto\" for=\"inserimg\">Carica una foto:</label>";
echo"
     <form name=\"form1\" enctype=\"multipart/form-data\" method=\"post\" action=\"Elabora.php\">
     <p><input type=\"file\" name=\"inserimg\" id=\"inserimg\">";
echo"<input type=\"submit\" name=\"caricaimg\" id=\"caricaimg\" value=\"Carica\" class=\"tasto\" onsubmit=\"return verifica(inserimg.value)\"></p> </form> ";
echo"<label id=\"caricaindirizzo\" for=\"indirizzo\">Indirizzo Centro Sportivo:</label>";
echo"<input type=\"text\" name=\"indirizzo\" id=\"indirizzo\" size=\"30\" onClick=\"sfondo('i')\" onSelect=\"sfondo('i')\">";
echo"<input type=\"button\" name=\"loadindirizzo\" id=\"loadindirizzo\" value=\"Modifica\" class=\"tasto\" onClick=\"return verify('i')\">";
echo "
<table id=\"tabella\">
<caption class=\"titolotabella\">Informazioni Azienda</caption>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"rsociale\">Ragione Sociale</label></td>
<td><input type=\"text\" name=\"rsociale\" id=\"rsociale\" value=\"$ragione\" readonly=\"readonly\"></td></tr>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"citta\">Citt&agrave</label></td>
<td><input type=\"text\" name=\"citta\" id=\"citta\" value=\"$città\" readonly=\"readonly\"></td></tr>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"iva\">Partita Iva</label></td>
<td><input type=\"text\" name=\"iva\" id=\"iva\" value=\"$iva\" readonly=\"readonly\"></td></tr>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"email\">E-Mail</label></td>
<td><input type=\"text\" name=\"email\" id=\"email\" value=\"$mail\" size=\"30\" readonly=\"readonly\"></td></tr>
<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"telefono\">Telefono</label></td>
<td><input type=\"text\" name=\"telefono\" id=\"telefono\" value=\"$telefono\" readonly=\"readonly\"></td></tr>";
if(isset($indirizzo))
{
 echo"
 <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"address\">Indirizzo</label></td>
 <td><input type=\"text\" name=\"address\" id=\"address\" value=\"$indirizzo\"  size=\"30\" readonly=\"readonly\" ></td></tr>";
}
else
{
echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"address\">Indirizzo</label></td>
<td><input type=\"text\" name=\"address\" id=\"address\" value=\"\" readonly=\"readonly\"</td></tr>";
}
echo"</table>";
}
 if($parametro=="cambiapsw")
 {
  $a=0;
  if(isset($_SESSION['nome']))
  {
   $name=$_SESSION['nome'];
   $surname=$_SESSION['cognome'];
  }
   if(isset($_SESSION['rsociale']))
   {
    $rsociale=$_SESSION['rsociale'];
    $a=1;
   }

  echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Impostazioni Account</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";
        echo "
              <table id=\"tab1\">
              <caption class=\"titolotabella\">Impostazioni Password</caption>
              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"newpsw\">Nuova Password</label></td>
              <td><input type=\"password\" name=\"newpsw\" id=\"newpsw\" onClick=\"sfondo('p')\" onSelect=\"sfondo('p')\"></td></tr>
              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"confirmpsw\">Conferma Password</label></td>
              <td><input type=\"password\" name=\"confirmpsw\" id=\"confirmpsw\" onClick=\"sfondo('p')\" onSelect=\"sfondo('p')\"></td></tr>
              <tr><td  colspan=\"2\"><input type=\"button\" name=\"loadpsw\" id=\"loadpsw\" class=\"tasto\" value=\"Modifica\" onClick=\"return verify('p')\"></td>
              </tr></table>";
       echo "
              <table id=\"tab2\">
              <caption class=\"titolotabella\">Impostazioni E-Mail</caption>
              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"newpsw\">Nuova E-Mail</label></td>
              <td><input type=\"text\" name=\"newmail\" id=\"newmail\" size=\"30\" onClick=\"sfondo('e')\" onSelect=\"sfondo('e')\"></td></tr>
              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"><td><label class=\"etichette\" for=\"confirmpsw\">Conferma E-Mail</label></td>
              <td><input type=\"text\" name=\"confirmmail\" id=\"confirmmail\" size=\"30\" onClick=\"sfondo('e')\" onSelect=\"sfondo('e')\"></td></tr>
              <tr><td colspan=\"2\"><input type=\"button\" name=\"loadmail\" id=\"loadmail\" class=\"tasto\" value=\"Modifica\" onClick=\"return verify('e')\"></td>
              </tr></table>";


 }
  if($parametro=="mystruttura")
 {
  echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Impostazioni Strutture</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  echo " <table class=\"tabellatre\">
              <caption class=\"titolotabella\">Impianti Presenti</caption>
              <thead>
              <tr>
              <th class=\"etichettestruttura\" class=\"intest\">Impianto</th>
              <th class=\"etichettestruttura\">Quantit&agrave</th>
	          </tr>
              </thead>
              <tfoot>
              <tr>
              <td colspan=\"2\"></td>
              </tr>
              </tfoot>
              <tbody>
              <tr>
              <td colspan=\"2\" class=\"contiene\">
		      <div class=\"divinterno\">
	          <table class=\"tabellaquattro\">";

              $numazienda=$_SESSION['numazienda'];

              $immagini=array('Calcio5'=>'pictures/campo.gif','Calcio7'=>'pictures/campo.gif','Calcio8'=>'pictures/campo.gif',
              'Calcio11'=>'pictures/campo.gif','Hockey'=>'pictures/campohockey.gif','Golf'=>'pictures/campogolf.gif',
              'Arti Marziali'=>'pictures/campomarziali.gif','Basket'=>'pictures/campobasket.gif','Tennis'=>'pictures/campotennis.gif',
              'Nuoto'=>'pictures/campopiscina.gif','Atletica'=>'pictures/campoatletica.gif','Ginnastica'=>'pictures/campoginnastic.gif',
              'Pallavolo'=>'pictures/campopallavolo.gif','Rugby'=>'pictures/camporugby.gif','Fitness'=>'pictures/campopalestra.gif',
              'Pugilato'=>'pictures/boxe.gif','Danza'=>'pictures/campodanza.gif','Pallamano'=>'pictures/campopallamano.gif',
              'Pallanuoto'=>'pictures/campopallanuoto.gif');

              $sqlcmd="SELECT Sport,COUNT(Id_Azienda)  FROM strutture WHERE Id_Azienda='$numazienda' GROUP BY Sport";
              $risultato=mysql_query($sqlcmd);
              if(!$risultato)
              {
               echo("Errore nell'interrogazione: $sqlcmd. ");
               echo mysql_error();
              }
               $riga=mysql_fetch_array($risultato);
                while($riga)
                {
                 $sp=$riga['Sport'];
                 $conta=$riga['COUNT(Id_Azienda)'];
                 $indirizzo="";
                 foreach($immagini as $chiave => $valore)
                 {
                  if($chiave==$sp)
                  {
                   $indirizzo=$valore;
                  }
                 }
                  if($indirizzo=="")
                  $indirizzo='pictures/bianco.png';

                  echo"
                  <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
                  <td><img src=\"$indirizzo\" class=\"campo\" alt=\"bianco\"></td>
                  <td>$sp</td>
                  <td><input type=\"text\" class =\"quantita\" size=\"1\" value=\"$conta\" readonly=\"readonly\" ></td>
                  </tr>";
                  $riga=mysql_fetch_array($risultato);
                 }

                 echo"
                      </table>
                      </div>
                      </td>
                      </tr>
                      </tbody>
                      </table>";



       echo " <table class=\"tabellauno\">
              <caption class=\"titolotabella\">Inserimento Sport</caption>
              <thead>
              <tr>
              <th class=\"etichettestruttura\" class=\"intest\">Impianto</th>
              <th class=\"etichettestruttura\">Quantit&agrave</th>
	          </tr>
              </thead>
              <tfoot>
              <tr>
              <td colspan=\"2\"><input type=\"button\" name=\"loadstruttura\" id=\"loadstruttura\" class=\"tasto\" value=\"Inserisci\" onClick=\"return verify('s')\"></td>
              </tr>
              </tfoot>
              <tbody>
              <tr>
              <td colspan=\"2\" class=\"contiene\">
		      <div class=\"divinterno\">
	          <table class=\"tabelladue\">

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campo.gif\" ALT=\"Calcio a 5\" class=\"campo\" name=\"calcio5\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"campo5q\">Calcio 5</label></td>
              <td><input type=\"text\" name=\"campo5q\" id=\"campo5q\" class =\"quantita\" size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campo.gif\" ALT=\"Calcio a 7\" class=\"campo\" name=\"calcio7\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"campo7q\">Calcio 7</label></td>
              <td><input type=\"text\" name=\"campo7q\" id=\"campo7q\" class =\"quantita\" size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campo.gif\" ALT=\"Calcio a 8\" class=\"campo\" name=\"calcio8\"></td>
              <td><label class=\"etichetteimpianto\" for=\"campo8q\">Calcio 8</label></td>
              <td><input type=\"text\" name=\"campo8q\" id=\"campo8q\" class =\"quantita\" size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campo.gif\" ALT=\"Calcio a 11\" class=\"campo\" name=\"calcio11\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"campo11q\">Calcio 11</label></td>
              <td><input type=\"text\" name=\"campo11q\" id=\"campo11q\" class =\"quantita\" size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campohockey.gif\"  ALT=\"Hockey\" class=\"campo\" name=\"hockey\"></td>
              <td><label class=\"etichetteimpianto\" for=\"hockeyq\">Hockey</label></td>
              <td><input type=\"text\" name=\"hockeyq\" id=\"hockeyq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campogolf.gif\" ALT=\"Golf\" class=\"campo\" name=\"golf\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"golfq\">Golf</label></td>
              <td><input type=\"text\" name=\"golfq\" id=\"golfq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campomarziali.gif\" ALT=\"ArtiMarziali\" class=\"campo\" name=\"artimarziali\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"artimarzialiq\">Arti Marziali</label></td>
              <td><input type=\"text\" name=\"artimarzialiq\" id=\"artimarzialiq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campobasket.gif\" ALT=\"Basket\" class=\"campo\" name=\"basket\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"basketq\">Basket</label></td>
              <td><input type=\"text\" name=\"basketq\" id=\"basketq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campotennis.gif\" ALT=\"Tennis\" class=\"campo\" name=\"tennis\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"tennisq\">Tennis</label></td>
              <td><input type=\"text\" name=\"tennisq\" id=\"tennisq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campopiscina.gif\" ALT=\"Piscina\" class=\"campo\" name=\"piscina\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"piscinaq\">Nuoto</label></td>
              <td><input type=\"text\" name=\"piscinaq\" id=\"piscinaq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campoatletica.gif\" ALT=\"Atletica\" class=\"campo\" name=\"atletica\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"atleticaq\">Atletica</label></td>
              <td><input type=\"text\" name=\"atleticaq\" id=\"atleticaq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campoginnastic.gif\"  ALT=\"Ginnastica\" class=\"campo\" name=\"ginnastica\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"ginnasticaq\">Ginnastica</label></td>
              <td><input type=\"text\" name=\"ginnasticaq\" id=\"ginnasticaq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campopallavolo.gif\" ALT=\"Pallavolo\" class=\"campo\" name=\"pallavolo\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"pallavoloq\">Pallavolo</label></td>
              <td><input type=\"text\" name=\"pallavoloq\" id=\"pallavoloq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/camporugby.gif\" ALT=\"Rugby\" class=\"campo\" name=\"rugby\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"rugbyq\">Rugby</label></td>
              <td><input type=\"text\" name=\"rugbyq\" id=\"rugbyq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campopalestra.gif\" ALT=\"Fitness\" class=\"campo\" name=\"fitness\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"fitnessq\">Fitness</label></td>
              <td><input type=\"text\" name=\"fitnessq\" id=\"fitnessq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/boxe.gif\" ALT=\"Boxe\" class=\"campo\" name=\"boxe\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"boxeq\">Pugilato</label></td>
              <td><input type=\"text\" name=\"boxeq\" id=\"boxeq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campodanza.gif\" ALT=\"Danza\" class=\"campo\" name=\"danza\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"danzaq\">Danza</label></td>
              <td><input type=\"text\" name=\"danzaq\" id=\"danzaq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campopallamano.gif\" ALT=\"Pallamano\" class=\"campo\" name=\"pallamano\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"pallamanoq\">Pallamano</label></td>
              <td><input type=\"text\" name=\"pallamanoq\" id=\"pallamanoq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><img src=\"pictures/campopallanuoto.gif\" ALT=\"Pallanuoto\" class=\"campo\" name=\"pallanuoto\" ></td>
              <td><label class=\"etichetteimpianto\" for=\"pallanuotoq\">Pallanuoto</label></td>
              <td><input type=\"text\" name=\"pallanuotoq\" id=\"pallanuotoq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\">
              <td><label class=\"etichetteimpianto\" for=\"altroq\">Altro Sport</label></td>
              <td><input type=\"text\" name=\"altro\" id=\"altro\" value=\"\" size=\"15\" maxlength=\"20\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              <td><input type=\"text\" name=\"altroq\" id=\"altroq\" class =\"quantita\"  size=\"1\" value=\"0\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\"></td>
              </tr>

              </table>
              </div>
              </td>
              </tr>
              </tbody>
              </table>
              ";
 }
  if($parametro=="sport" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
    $cod=$_SESSION['numazienda'];
    echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Calendario Disponibilit&agrave</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Sport,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo,Impianto FROM strutture S, disponibilita D, disp_strutture DS WHERE DS.Id_Struttura=S.Cod_Struttura AND DS.Id_Disponibilita=D.Id And S.Id_Azienda='$cod' AND D.Occupato=0 AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY SPORT ASC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisport\" onClick=\"etis=ordina('etis',etis)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistrutt\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etiorai\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"price\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"6\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {

    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconferma()\">
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\">$impstrutt</td>
     <td class=\"centro\">$dataavideoi</td>
     <td class=\"centro\">$oraavideoi</td>
     <td class=\"centro\">$oraavideof</td>
     <td class=\"centro\">$costo</td>
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
     else
     {
      $cod=$_SESSION['numazienda'];
    echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Calendario Disponibilit&agrave</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Sport,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo,Impianto FROM strutture S, disponibilita D, disp_strutture DS WHERE DS.Id_Struttura=S.Cod_Struttura AND DS.Id_Disponibilita=D.Id And S.Id_Azienda='$cod' AND D.Occupato=0 AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Sport DESC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisport\" onClick=\"etis=ordina('etis',etis)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistrutt\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etiorai\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"price\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"6\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {

    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconferma()\">
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\">$impstrutt</td>
     <td class=\"centro\">$dataavideoi</td>
     <td class=\"centro\">$oraavideoi</td>
     <td class=\"centro\">$oraavideof</td>
     <td class=\"centro\">$costo</td>
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


      if($parametro=="orai" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
    $cod=$_SESSION['numazienda'];
    echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Calendario Disponibilit&agrave</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Sport,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo,Impianto FROM strutture S, disponibilita D, disp_strutture DS WHERE DS.Id_Struttura=S.Cod_Struttura AND DS.Id_Disponibilita=D.Id And S.Id_Azienda='$cod' AND D.Occupato=0 AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Ora_Inizio ASC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisport\" onClick=\"etis=ordina('etis',etis)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistrutt\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etiorai\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"price\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"6\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {

    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconferma()\">
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\">$impstrutt</td>
     <td class=\"centro\">$dataavideoi</td>
     <td class=\"centro\">$oraavideoi</td>
     <td class=\"centro\">$oraavideof</td>
     <td class=\"centro\">$costo</td>
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
     else
     {
      $cod=$_SESSION['numazienda'];
    echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Calendario Disponibilit&agrave</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Sport,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo,Impianto FROM strutture S, disponibilita D, disp_strutture DS WHERE DS.Id_Struttura=S.Cod_Struttura AND DS.Id_Disponibilita=D.Id And S.Id_Azienda='$cod' AND D.Occupato=0 AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Ora_Inizio DESC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisport\" onClick=\"etis=ordina('etis',etis)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistrutt\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etiorai\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"price\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"6\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {

    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconferma()\">
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\">$impstrutt</td>
     <td class=\"centro\">$dataavideoi</td>
     <td class=\"centro\">$oraavideoi</td>
     <td class=\"centro\">$oraavideof</td>
     <td class=\"centro\">$costo</td>
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
  if($parametro=="dataf" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
    $cod=$_SESSION['numazienda'];
    echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Calendario Disponibilit&agrave</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Sport,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo,Impianto FROM strutture S, disponibilita D, disp_strutture DS WHERE DS.Id_Struttura=S.Cod_Struttura AND DS.Id_Disponibilita=D.Id And S.Id_Azienda='$cod' AND D.Occupato=0 AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Giorno_Fine ASC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisport\" onClick=\"etis=ordina('etis',etis)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistrutt\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etiorai\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"price\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"6\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {

    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconferma()\">
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\">$impstrutt</td>
     <td class=\"centro\">$dataavideoi</td>
     <td class=\"centro\">$oraavideoi</td>
     <td class=\"centro\">$oraavideof</td>
     <td class=\"centro\">$costo</td>
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
     else
     {
      $cod=$_SESSION['numazienda'];
    echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Calendario Disponibilit&agrave</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Sport,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo,Impianto FROM strutture S, disponibilita D, disp_strutture DS WHERE DS.Id_Struttura=S.Cod_Struttura AND DS.Id_Disponibilita=D.Id And S.Id_Azienda='$cod' AND D.Occupato=0 AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Giorno_Fine DESC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisport\" onClick=\"etis=ordina('etis',etis)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistrutt\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etiorai\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"price\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"6\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {

    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconferma()\">
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\">$impstrutt</td>
     <td class=\"centro\">$dataavideoi</td>
        <td class=\"centro\">$oraavideoi</td>
     <td class=\"centro\">$oraavideof</td>
     <td class=\"centro\">$costo</td>
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

      if($parametro=="datai" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
    $cod=$_SESSION['numazienda'];
    echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Calendario Disponibilit&agrave</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Sport,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo,Impianto FROM strutture S, disponibilita D, disp_strutture DS WHERE DS.Id_Struttura=S.Cod_Struttura AND DS.Id_Disponibilita=D.Id And S.Id_Azienda='$cod' AND D.Occupato=0 AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Giorno_Inizio ASC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisport\" onClick=\"etis=ordina('etis',etis)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistrutt\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>

              <th class=\"etichettestruttura\" id=\"etiorai\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"price\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"6\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {

    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconferma()\">
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\">$impstrutt</td>
     <td class=\"centro\">$dataavideoi</td>
     <td class=\"centro\">$oraavideoi</td>
     <td class=\"centro\">$oraavideof</td>
     <td class=\"centro\">$costo</td>
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
     else
     {
      $cod=$_SESSION['numazienda'];
    echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Calendario Disponibilit&agrave</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Sport,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo,Impianto FROM strutture S, disponibilita D, disp_strutture DS WHERE DS.Id_Struttura=S.Cod_Struttura AND DS.Id_Disponibilita=D.Id And S.Id_Azienda='$cod' AND D.Occupato=0 AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Giorno_Inizio DESC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisport\" onClick=\"etis=ordina('etis',etis)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistrutt\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>

              <th class=\"etichettestruttura\" id=\"etiorai\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"price\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"6\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {

    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconferma()\">
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\">$impstrutt</td>
     <td class=\"centro\">$dataavideoi</td>
          <td class=\"centro\">$oraavideoi</td>
     <td class=\"centro\">$oraavideof</td>
     <td class=\"centro\">$costo</td>
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

  if($parametro=="dispstrutture")
  {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");
    echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Calendario Disponibilit&agrave</h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Sport,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo,Impianto FROM strutture S, disponibilita D, disp_strutture DS WHERE DS.Id_Struttura=S.Cod_Struttura AND DS.Id_Disponibilita=D.Id And S.Id_Azienda='$cod' AND D.Occupato=0  AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Giorno_Inizio,Ora_Inizio ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etisport\" onClick=\"etis=ordina('etis',etis)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistrutt\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" onClick=\"etidi=ordina('etidi',etidi)\">Data Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etiorai\" onClick=\"etioi=ordina('etioi',etioi)\">Ora Inzio Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Disponibilit&agrave</th>
              <th class=\"etichettestruttura\" id=\"price\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"7\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);
    $z=0;
    while($riga)
    {

    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr class=\"mouse\" onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" onClick=\"chiediconferma(this)\" >
     <td id=\"grandsportreldisp.$z\" class=\"centro\">$sport</td>
     <td class=\"centro\" >$impstrutt</td>
     <td class=\"centro\"  >$dataavideoi</td>
     <td class=\"centro\" >$oraavideoi</td>
     <td class=\"centro\"  >$oraavideof</td>
     <td class=\"centro\">$costo</td>
     </tr>
     ";

     $riga=mysql_fetch_array($risultato);
     $z++;
     }
      echo"
       </table>
       </div>
       </td>
       </tr>
       </tbody>
       </table>";
     }
      if($parametro=="myprenote")
      {
       $cod=$_SESSION['numazienda'];
       date_default_timezone_set("Europe/Rome");
       $data=date("d/m/Y");
       $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";
        $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Giorno_Inizio,Ora_Inizio ";
        $risultato1 = mysql_query($sqlcmd1);

        if(!$risultato1)
        {
        echo("Errore nell'interrogazione: $sqlcmd. ");
        echo mysql_error();
        }
         echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticog=ordina('eticog',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\">Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispo=ordina('etispo',etispo)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidat=ordina('etidat',etidat)\"  >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";
              $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     echo"
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\" >$nome1</td>
     <td  class=\"centro\"  id=\"telester\" >$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
     }
      echo"
       </table>
       </div>
       </td>
       </tr>
       </tbody>
       </table>";

      }
      if($parametro=="myprenot")
      {
       if(isset($_SESSION['nome']))
       {
        $idutente=$_SESSION['numutente'];
        date_default_timezone_set("Europe/Rome");
        $data=date("d/m/Y");
        $ora=date("H");
        $numutente=$_SESSION['numutente'];
        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT A.Rag_Sociale,A.Citta,A.Indirizzo,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, aziende A, prenotazione P WHERE D.Occupato=1 AND D.Id=P.Id_Disponibilita AND P.Id_Utente='$numutente' AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura And S.Id_Azienda=A.Cod_Azienda AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Giorno_Inizio,Ora_Inizio ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"etirag\" >Centro Sportivo</th>
              <th class=\"etichettestruttura\" id=\"eticit\" >Citt&agrave</th>
              <th class=\"etichettestruttura\" id=\"etiind\" >Indirizzo</th>
              <th class=\"etichettestruttura\" id=\"etisport\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttutente\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidatai\" >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorai\" >Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraf\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"priceutente\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $ragsociale=$riga['Rag_Sociale'];
    $citta=$riga['Citta'];
    $indirizzo=$riga['Indirizzo'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >
     <td  class=\"centro\">$ragsociale</td>
     <td  class=\"centro\">$citta</td>
     <td  class=\"centro\">$indirizzo</td>
     <td id=\"grandsportrelutente\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstruttutente\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdataiutente\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforaiutente\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforafutente\" >$oraavideof</td>
     <td class=\"centro\"id=\"costoutente\" >$costo &#8364</td>
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
 else
 {
  $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";


  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>=CURTIME()) ) ORDER BY Giorno_Inizio ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }



   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogu=ordina('eticogu',eticogu)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\">Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispou=ordina('etispou',etispou)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidatu=ordina('etidatu',etidatu)\"  >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";

    $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\" id=\"nom\" >$nome</td>
     <td  class=\"centro\" >$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
  if($parametro=="cogu" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>=CURTIME()) ) ORDER BY Cognome ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }
    echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogu=ordina('eticogu',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispou=ordina('etispou',etispou)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidatu=ordina('etidatu',etidatu)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";


 $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\" id=\"nom\">$nome</td>
     <td  class=\"centro\" >$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
  else
  {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>=CURTIME()) ) ORDER BY Cognome DESC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

  echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogu=ordina('eticogu',eticogu)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispou=ordina('etispou',etispou)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidat=ordina('etidatu',etidatu)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";

  $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\" id=\"nom\">$nome</td>
     <td  class=\"centro\" >$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
if($parametro=="spou" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>=CURTIME()) ) ORDER BY Sport ASC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }
    echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogu=ordina('eticogu',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispou=ordina('etispou',etispou)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidatu=ordina('etidatu',etidatu)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";


 $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\" id=\"nom\">$nome</td>
     <td  class=\"centro\" >$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
  else
  {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>=CURTIME()) ) ORDER BY Sport DESC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

  echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogu=ordina('eticogu',eticogu)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispou=ordina('etispou',etispou)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidat=ordina('etidatu',etidatu)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";

  $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\" id=\"nom\">$nome</td>
     <td  class=\"centro\" >$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
if($parametro=="datu" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>=CURTIME()) ) ORDER BY Giorno_Inizio ASC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }
    echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogu=ordina('eticogu',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispou=ordina('etispou',etispou)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidatu=ordina('etidatu',etidatu)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";


 $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\" id=\"nom\">$nome</td>
     <td  class=\"centro\" >$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
  else
  {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";

  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>=CURTIME()) ) ORDER BY Giorno_Inizio DESC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

  echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogu=ordina('eticogu',eticogu)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispou=ordina('etispou',etispou)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidatu=ordina('etidatu',etidatu)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";

  $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\" id=\"nom\">$nome</td>
     <td  class=\"centro\" >$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
  if($parametro=="cog" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";



  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Cognome ";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticog=ordina('eticog',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispo=ordina('etispo',etispo)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidat=ordina('etidat',etidat)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     echo"
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\"  >$nome1</td>
     <td  class=\"centro\" id=\"telester\" >$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
     }
      echo"
       </table>
       </div>
       </td>
       </tr>
       </tbody>
       </table>";


 }
 else
 {
  $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";


  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Cognome DESC ";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticog=ordina('eticog',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispo=ordina('etispo',etispo)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidat=ordina('etidat',etidat)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     echo"
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\"  >$nome1</td>
     <td  class=\"centro\" id=\"telester\" >$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
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
       if($parametro=="spo" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";



  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Sport ASC ";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticog=ordina('eticog',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispo=ordina('etispo',etispo)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidat=ordina('etidat',etidat)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     echo"
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\"  >$nome1</td>
     <td  class=\"centro\" id=\"telester\" >$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
     }
      echo"
       </table>
       </div>
       </td>
       </tr>
       </tbody>
       </table>";


 }
 else
 {
  $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";



  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Sport DESC ";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticog=ordina('eticog',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispo=ordina('etispo',etispo)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidat=ordina('etidat',etidat)\" >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     echo"
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\"  >$nome1</td>
     <td  class=\"centro\" id=\"telester\" >$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
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

       if($parametro=="dat" && isset($_GET['id']))
  {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";



  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Giorno_Inizio ASC ";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticog=ordina('eticog',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispo=ordina('etispo',etispo)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidat=ordina('etidat',etidat)\" >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     echo"
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\"  >$nome1</td>
     <td  class=\"centro\" id=\"telester\" >$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
     }
      echo"
       </table>
       </div>
       </td>
       </tr>
       </tbody>
       </table>";


 }
 else
 {
  $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";



  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND (D.Giorno_Inizio>CURDATE() OR (D.Giorno_Inizio=CURDATE() AND Ora_Inizio>CURTIME()) ) ORDER BY Giorno_Inizio DESC ";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticog=ordina('eticog',eticog)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispo=ordina('etispo',etispo)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" onClick=\"etidat=ordina('etidat',etidat)\">Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     echo"
     <tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\" >
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\"  >$nome1</td>
     <td  class=\"centro\" id=\"telester\" >$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
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


       if($parametro=="giornaliero")
       {
       $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";


  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND D.Giorno_Inizio=CURDATE() ORDER BY Ora_Inizio ASC";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }



  echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticoggu=ordina('eticoggu',eticoggu)\"  >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispogu=ordina('etispogu',etispogu)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome1=$riga['Cognome'];
    $nome1=$riga['Nome'];
    $telefono1=$riga['Telefono'];
    $sport1=$riga['Sport'];
    $impstrutt1=$riga['Impianto'];
    $datai1=$riga['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga['Costo'];
    //$quanti=$riga['Count(Costo)'];


     if($oravideoi1[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi1[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\" >$nome1</td>
     <td  class=\"centro\" id=\"telester\">$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
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
   if($parametro=="giornalieroe")
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";




  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND D.Giorno_Inizio=CURDATE() ORDER BY Ora_Inizio ASC";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticoggu=ordina('eticoggu',eticoggu)\"  >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispogu=ordina('etispogu',etispogu)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     if($oravideoi1[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi1[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\" >$nome1</td>
     <td  class=\"centro\" id=\"telester\">$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
     }
      echo"
       </table>
       </div>
       </td>
       </tr>
       </tbody>
       </table>";


 }
   if($parametro=="cogg" && isset($_GET['id']))
   {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";


  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND D.Giorno_Inizio=CURDATE() ORDER BY Cognome ASC";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }



   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogg=ordina('eticogg',eticogg)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispog=ordina('etispog',etispog)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\"  >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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

     if($oravideoi[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\">$nome</td>
     <td  class=\"centro\">$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
   else
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";


  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND D.Giorno_Inizio=CURDATE() ORDER BY Cognome DESC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }



   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogg=ordina('eticogg',eticogg)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispog=ordina('etispog',etispog)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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

     if($oravideoi[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\">$nome</td>
     <td  class=\"centro\">$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
if($parametro=="coggu" && isset($_GET['id']))
   {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";




  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND D.Giorno_Inizio=CURDATE() ORDER BY Cognome ASC";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticoggu=ordina('eticoggu',eticoggu)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispogu=ordina('etispogu',etispogu)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\"  >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     if($oravideoi1[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi1[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\">$nome1</td>
     <td  class=\"centro\" id=\"telester\">$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
     }
      echo"
       </table>
       </div>
       </td>
       </tr>
       </tbody>
       </table>";

   }
   else
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";


  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND D.Giorno_Inizio=CURDATE() ORDER BY Cognome DESC ";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticoggu=ordina('eticoggu',eticoggu)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispogu=ordina('etispogu',etispogu)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     if($oravideoi1[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi1[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\">$nome1</td>
     <td  class=\"centro\"id=\"telester\" >$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
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

if($parametro=="spog" && isset($_GET['id']))
   {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";


  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND D.Giorno_Inizio=CURDATE() ORDER BY Sport ASC";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }



   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogg=ordina('eticogg',eticogg)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispog=ordina('etispog',etispog)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\"  >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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

     if($oravideoi[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\">$nome</td>
     <td  class=\"centro\">$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
   else
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";


  $sqlcmd="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, utenti U, prenotazione P WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=P.Id_Disponibilita AND P.Id_Utente=U.Cod_Utente AND D.Giorno_Inizio=CURDATE() ORDER BY Sport DESC ";
  $risultato = mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }



   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticogg=ordina('eticogg',eticogg)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispog=ordina('etispog',etispog)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";



    $riga=mysql_fetch_array($risultato);

    while($riga)
    {
    $cognome=$riga['Cognome'];
    $nome=$riga['Nome'];
    $telefono=$riga['Telefono'];
    $sport=$riga['Sport'];
    $impstrutt=$riga['Impianto'];
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

     if($oravideoi[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome</td>
     <td  class=\"centro\">$nome</td>
     <td  class=\"centro\">$telefono</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof</td>
     <td class=\"centro\">$costo &#8364</td>
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
if($parametro=="spogu" && isset($_GET['id']))
   {
   $id=$_GET['id'];
   if($id==1)
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";




  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND D.Giorno_Inizio=CURDATE() ORDER BY Sport ASC";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticoggu=ordina('eticoggu',eticoggu)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispogu=ordina('etispogu',etispogu)\">Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\"  >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";





      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     if($oravideoi1[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi1[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\">$nome1</td>
     <td  class=\"centro\" id=\"telester\">$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
     }
      echo"
       </table>
       </div>
       </td>
       </tr>
       </tbody>
       </table>";

   }
   else
   {
   $cod=$_SESSION['numazienda'];
   date_default_timezone_set("Europe/Rome");
   $data=date("d/m/Y");
   $ora=date("H");

        echo"
        <div id=\"subinfo\">
        <h5 id=\"header5\">Riepilogo Prenotazioni </h5>
        <img src=\"pictures/settaggi.gif\" id=\"settaggiimp\" alt=\"Ingranaggi\">
        </div>";




  $sqlcmd1="SELECT Cognome,Nome,Telefono,Sport,Impianto,Giorno_Inizio,Ora_Inizio,Ora_Fine,Costo FROM strutture S, disponibilita D, disp_strutture DS, esterni E, prenot_esterni PS WHERE D.Occupato=1 AND D.Id=DS.Id_Disponibilita AND DS.Id_Struttura=S.Cod_Struttura AND S.Id_Azienda='$cod' AND D.Id=PS.Id_Disponibilita AND PS.Id_Esterno=E.Id_Esterno AND D.Giorno_Inizio=CURDATE() ORDER BY Sport DESC ";
  $risultato1 = mysql_query($sqlcmd1);

  if(!$risultato1)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }

   echo "     <table class=\"tabellaunodisp\">
              <thead>
              <tr>
              <th class=\"etichettestruttura\" id=\"eticog\" onClick=\"eticoggu=ordina('eticoggu',eticoggu)\" >Cognome Utente</th>
              <th class=\"etichettestruttura\" id=\"etinom\" >Nome Utente</th>
              <th class=\"etichettestruttura\" id=\"etitel\">Telefono Utente</th>
              <th class=\"etichettestruttura\" id=\"etisportpren\" onClick=\"etispogu=ordina('etispogu',etispogu)\" >Sport</th>
              <th class=\"etichettestruttura\" id=\"etistruttpren\">Impianto</th>
              <th class=\"etichettestruttura\" id=\"etidataipren\" >Data Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etioraipren\">Ora Inzio Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"etiorafpren\">Ora Fine Prenotazione</th>
              <th class=\"etichettestruttura\" id=\"pricepren\">Costo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan=\"9\" class=\"contiene\">
	          <div class=\"divinterno\">
	          <table class=\"tabelladue\">";


      $riga1=mysql_fetch_array($risultato1);

    while($riga1)
    {
    $cognome1=$riga1['Cognome'];
    $nome1=$riga1['Nome'];
    $telefono1=$riga1['Telefono'];
    $sport1=$riga1['Sport'];
    $impstrutt1=$riga1['Impianto'];
    $datai1=$riga1['Giorno_Inizio'];
    $datavideoi1=explode("-",$datai1);
    $dataavideoi1=$datavideoi1[2]."/".$datavideoi1[1]."/".$datavideoi1[0];
    $orai1=$riga1['Ora_Inizio'];
    $oravideoi1=explode(":",$orai1);
    $oraavideoi1=$oravideoi1[0].":".$oravideoi1[1];
    $oraf1=$riga1['Ora_Fine'];
    $oravideof1=explode(":",$oraf1);
    $oraavideof1=$oravideof1[0].":".$oravideof1[1];
    $costo1=$riga1['Costo'];
    //$quanti=$riga['Count(Costo)'];


     if($oravideoi1[0]<$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"oldriga\" >";
     else
     {
     if($oravideoi1[0]==$ora)
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  id=\"currentriga\" >";
     else
     echo"<tr onMouseover=\"cambiariga(this)\" onMouseOut=\"resetriga(this)\"  >";
     }
     echo"
     <td  class=\"centro\" id=\"cog\">$cognome1</td>
     <td  class=\"centro\">$nome1</td>
     <td  class=\"centro\">$telefono1</td>
     <td id=\"grandsportrel\" class=\"centro\">$sport1</td>
     <td class=\"centro\" id=\"confstrutt\">$impstrutt1</td>
     <td class=\"centro\"  id=\"confdatai\">$dataavideoi1</td>
     <td class=\"centro\" id=\"conforai\">$oraavideoi1</td>
     <td class=\"centro\" id=\"conforaf\" >$oraavideof1</td>
     <td class=\"centro\" id=\"costopren\">$costo1 &#8364</td>
     </tr>
     ";

     $riga1=mysql_fetch_array($risultato1);
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




 if(isset($_GET['imp']))
 {
  session_start();
  $imp=$_GET['imp'];
  $sport=array("Calcio5","Calcio7","Calcio8","Calcio11","Hockey","Golf","Arti Marziali","Basket","Tennis","Nuoto","Atletica","Ginnastica","Pallavolo","Rugby","Fitness","Pugilato","Danza","Pallamano","Pallanuoto");
  $vett=explode(',',$imp);
  $lung=count($vett);
  $rsociale=$_SESSION['rsociale'];
  $numazienda=$_SESSION['numazienda'];
  $alfabeto=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  for($i=0;$i<$lung;$i++)
   {
    if($i<=18)
    {
     if($vett[$i]!=0 && $vett[$i]!="")
     {
      $j=0;
      while($vett[$i]>0)
      {
       $query = "INSERT INTO strutture SET Sport = '$sport[$i]', Id_Azienda='$numazienda', Impianto='$alfabeto[$j]' ";
	   $risultato=mysql_query($query);
	   if(!$risultato)
        {
        echo("Errore nell'interrogazione: $query. ");
        echo mysql_error();
        }
        $vett[$i]--;
        $j++;
       }
      }
     }
       else
       {
        if($i==19)
        {
         if($vett[19]!="" )
         {
          $j=0;
          while($vett[20]>0)
          {
           $query = "INSERT INTO strutture SET Sport = '$vett[19]', Id_Azienda='$numazienda', Impianto='$alfabeto[$j]'";
	       $risultato=mysql_query($query);
	       if(!$risultato)
           {
            echo("Errore nell'interrogazione: $query. ");
            echo mysql_error();
           }
           $vett[20]--;
           $j++;
          }
         }
         if($i==20)
         break;
       }

         }
  }
  echo "<script type=\"text/Javascript\">alert(\"Inserimento effettuato con successo!\");</script>";
  header("refresh:0; url=Profile.php");

 }



  if(isset($_GET['citta']))
 {
  session_start();
  $citta=mysql_real_escape_string($_GET['citta']);
  $name=$_SESSION['nome'];
  $surname=$_SESSION['cognome'];


  $sqlcmd="UPDATE utenti SET Citta='$citta' WHERE Nome='$name' and Cognome='$surname' ";

  $risultato = mysql_query($sqlcmd);
  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }
   else
   {
    $stringa="Inserimento avvenuto con successo!";
    header("Location: Profile.php?stringa=$stringa");
   }

 }
  if(isset($_GET['indirizzo']))
 {
  session_start();
  $indirizzo=mysql_real_escape_string($_GET['indirizzo']);
  $rsociale=$_SESSION['rsociale'];

  $sqlcmd="UPDATE aziende SET Indirizzo='$indirizzo' WHERE Rag_Sociale='$rsociale' ";

  $risultato = mysql_query($sqlcmd);
  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }
   else
   {
    $stringa="Inserimento avvenuto con successo!";
    header("Location: Profile.php?stringa=$stringa");
   }

 }
  if(isset($_GET['psw']))
 {
  session_start();
  $psw=mysql_real_escape_string($_GET['psw']);
  $f=0;
  if(isset($_SESSION['nome']))
  {
   $name=$_SESSION['nome'];
   $surname=$_SESSION['cognome'];
   $f=1;
  }
   if(isset($_SESSION['rsociale']))
   $rsociale=$_SESSION['rsociale'];

   if($f==0)
   $sqlcmd="UPDATE aziende SET Password=md5('$psw') WHERE Rag_Sociale='$rsociale' ";
   else
   $sqlcmd="UPDATE utenti SET Password=md5('$psw') WHERE Nome='$name' and Cognome='$surname' ";

   $risultato = mysql_query($sqlcmd);
   if(!$risultato)
   {
    echo("Errore nell'interrogazione: $sqlcmd. ");
    echo mysql_error();
   }
    else
    {
     echo "<script type=\"text/Javascript\">alert(\"Password modificata con successo!\");</script>";
     header("refresh:0; url=Profile.php");
    }

 }
     if(isset($_GET['mail']))
     {
      session_start();
      $mail=mysql_real_escape_string($_GET['mail']);
      $f=0;
      if(isset($_SESSION['nome']))
      {
       $name=$_SESSION['nome'];
       $surname=$_SESSION['cognome'];
       $f=1;
      }
       if(isset($_SESSION['rsociale']))
       $rsociale=$_SESSION['rsociale'];

       if($f==0)
       $sqlcmd="UPDATE aziende SET E_Mail='$mail' WHERE Rag_Sociale='$rsociale' ";
       else
       $sqlcmd="UPDATE utenti SET E_Mail='$mail' WHERE Nome='$name' and Cognome='$surname' ";

       $risultato = mysql_query($sqlcmd);
       if(!$risultato)
       {
        echo("Errore nell'interrogazione: $sqlcmd. ");
        echo mysql_error();
       }
        else
       {
        echo "<script type=\"text/Javascript\">alert(\"Indirizzo E-Mail modificato con successo!\");</script>";
        header("refresh:0; url=Profile.php");
       }
  }
  if(isset($_POST['caricaimg']))
  {
    session_start();
    $f=0;
    $err=0;
    if(isset($_SESSION['nome']))
    {
    $name=$_SESSION['nome'];
    $surname=$_SESSION['cognome'];
    $f=1;
    }
     if(isset($_SESSION['rsociale']))
     $rsociale=$_SESSION['rsociale'];

	// se ci sono stati problemi nell'upload del file
	if(!isset($_FILES['inserimg']) OR $_FILES['inserimg']['error'] != UPLOAD_ERR_OK)
    {
     $err=1;
	 echo "<script type=\"text/Javascript\">alert(\"Immagine non selezionata! Caricamento annullato.\");</script>";
     header("refresh:0; url=Profile.php");
    }
    if($err==0)
    {
	// recupero alcune informazioni sul file inviato
	$nome_file_temporaneo = $_FILES['inserimg']['tmp_name'];

	$nome_file_vero = $_FILES['inserimg']['name'];

	$tipo_file = $_FILES['inserimg']['type'];
    //echo $tipo_file;
    if($tipo_file!="image/bmp" && $tipo_file!="image/gif" && $tipo_file!="image/jpeg" && $tipo_file!="image/jpg" && $tipo_file!="image/png")
    {
     echo "<script type=\"text/Javascript\">alert(\"Tipo di file non supportato! Caricamento annullato.\");</script>";
     header("refresh:0; url=Profile.php");
    }
    else
    {

	// leggo il contenuto del file
	$dati_file = file_get_contents($nome_file_temporaneo);

	// preparo il contenuto del file per la query
	$dati_file = addslashes($dati_file);

	// query per inserire il file nel DB
	$query = "INSERT INTO immagini SET Nome_Immagine = '$nome_file_vero', Tipo_Immagine = '$tipo_file', Immagine = '$dati_file'";
	$risultato=mysql_query($query);
    $id=mysql_insert_id();
	if(!$risultato)
    {
     echo("Errore nell'interrogazione: $query. ");
     echo mysql_error();
    }
      if($f==1)
      {
       $numutente=$_SESSION['numutente'];

       $sqlcmd1="SELECT Cod_Immagine FROM immagini WHERE Id_Utente='$numutente' ";
       $risultatocmd1 = mysql_query($sqlcmd1);
       if(!$risultatocmd1)
       {
        echo("Errore nell'interrogazione: $sqlcmd1. ");
        echo mysql_error();
       }
        $riga=mysql_fetch_array($risultatocmd1);
        $numimg=$riga['Cod_Immagine'];
        if(isset($numimg))
        {
         $sqlcmd2="DELETE FROM immagini WHERE Cod_Immagine='$numimg' ";
         $risultatocmd2 = mysql_query($sqlcmd2);
         if(!$risultatocmd2)
         {
          echo("Errore nell'interrogazione: $sqlcmd1. ");
          echo mysql_error();
         }
        }
        $sqlcmd="UPDATE immagini SET Id_Utente='$numutente' WHERE Cod_Immagine='$id'  ";
        $risultatocmd = mysql_query($sqlcmd);
        if(!$risultatocmd)
        {
         echo("Errore nell'interrogazione: $sqlcmd. ");
         echo mysql_error();
        }
         else
        {
         $_SESSION['boolimg']=1;
         $stringa="Inserimento avvenuto con successo!";
         header("Location: Profile.php?stringa=$stringa");
        }
      }
       else
       {
        $numazienda=$_SESSION['numazienda'];

        $sqlcmd1="SELECT Cod_Immagine FROM immagini WHERE Id_Azienda='$numazienda' ";
        $risultatocmd1 = mysql_query($sqlcmd1);
        if(!$risultatocmd1)
        {
         echo("Errore nell'interrogazione: $sqlcmd1. ");
         echo mysql_error();
        }
        $riga=mysql_fetch_array($risultatocmd1);
        $numimg=$riga['Cod_Immagine'];
        if(isset($numimg))
        {
         $sqlcmd2="DELETE FROM immagini WHERE Cod_Immagine='$numimg' ";
         $risultatocmd2 = mysql_query($sqlcmd2);
         if(!$risultatocmd2)
         {
          echo("Errore nell'interrogazione: $sqlcmd1. ");
          echo mysql_error();
         }
        }
        $sqlcmd="UPDATE immagini SET Id_Azienda='$numazienda' WHERE Cod_Immagine='$id' ";
        $risultatocmd = mysql_query($sqlcmd);
        if(!$risultatocmd)
        {
         echo("Errore nell'interrogazione: $sqlcmd. ");
         echo mysql_error();
        }
         else
         {
          $_SESSION['boolimg']=1;
          $stringa="Inserimento avvenuto con successo!";
          header("Location: Profile.php?stringa=$stringa");
         }
       }

       }
    }

}

?>