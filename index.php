<?php
include ("Conn_Scelta_db.php");
/*
Manuale Utente
Il servizio realizzato è finalizzato alla prenotazione di impianti sportivi, nonchè alla loro relativa gestione.
Il servizio è stato quindi pensato per poter essere utilizzato non solo da parte di utenti(registrati), i quali dopo aver individuato
l'impianto sportivo più adatto alle loro esigenze vi procedono con la prenotazione di una sua struttura(campi da tennis,
campi da calcio, piscine, ecc), ma anche per le aziende posseditrici di tali strutture, in modo da gestiore le prenotazioni a carico.
Il servizio è fruibile inoltre anche per utenti non registrati, i quali, però, una volta individuato l'impianto sportivo
per poter completare l'operazione di  prenotazione vera e propria dovranno necessariamente registrarsi.
La prenotazione viene effettuata nella maniera seguente:
dopo aver scelto sport, data, ora e luogo si presenterà una lista di risultati. Selezionandone uno
se ne potranno vedere i dettagli relativi e in caso procedere con la tale.
In caso un utente si presenti direttamente in azienda, quest'ultima potrà procedere con la prenotazione accendo alla propria
area privata,posta in alto a destra, e completando la prenotazione selezionando la riga interessata tra 'Disponibilità Strutture'.
Le aziende che hanno provveduto alla registrazione, dovranno in primo luogo inserire le strutture che detengono e solo successivamente
sarà possibile passare alla programmazione della disponibilità delle stesse, programmazione che è effettuabile dalla data giornaliera
fino alla fine del mese successivo.
L'inserimento delle strutture avviene attraverso la pagina personale,sotto la voce 'Le mie strutture'
quindi l'inserimento delle disponibilità attraverso l'homepage.
Tutte le prenotazioni a carico sono visualizzabili sotto le voci 'Prenotazione Utente' e 'Prenotazione Esterni', atte a differenziare
le prenotazioni effettuare da utenti registrati da quelle effettuate in sede da persone 'esterne'.
Le suddette potranno essere ordinate secondo vari criteri, attraverso un click nella relativa colonna di intestazione.
Le prenotazioni giornaliere sono anch'esse suddivise a seconda del tipo d'utente. Quelle in corso sono evidenziate attraverso
una riga di colore di sfondo verde, quelle trascorse attraverso una riga di colore di sfondo rosso.
Gli utenti, allo stesso modo, potranno visualizzare le prenotazioni effettuate, accedendo alla propria area privata.
Una mail avviserà l'utente nei seguenti casi:
-registrazione account
-richiesta reinoltro password
- termine di una procedura di prenotazione.
*/
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta name="description" content="Servizio di registrazione, prenotazione,ricerca e gestione di impianti sportivi polivalenti." >
<meta name="keywords" content="centro sportivo,sport,benessere,calcio,backet,nuoto,tennis,rugby,atletica,pallavolo,palestra,golf,arti marziali,fitness,pugilato,danza,pallamano,pallanuoto,aziende,strutture,prenotazioni,utenti,impianto sportivo,gestione" >
<meta name="author" content="Mariano Basile">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Benvenuto su SportCentre.Cerca il centro sportivo più adatto alle tue esigenze</title>
<link rel="stylesheet" type="text/css" href="Calendario/datepicker.css">

<?php
  $browser=$_SERVER['HTTP_USER_AGENT'];
  $esiste_8=strpos($browser,"MSIE 8.0");
  $esiste_9=strpos($browser,"MSIE 9.0");
  $esiste_10=strpos($browser,"MSIE 10.0");
  $chrome=strpos($browser,"Chrome");
  if($esiste_8)
  {
  echo "<link rel=\"stylesheet\" href=\"inizioie8.css\" type=\"text/css\" media=\"screen\">";
  echo "<script type=\"text/javascript\" src=\"inizio.js\">";
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
    echo "<script type=\"text/javascript\" src=\"inizio.js\">";
   }
?>
</script>
<script type="text/javascript" src="Calendario/prototype.js"></script>
<script type="text/javascript" src="Calendario/scriptaculous.js"></script>
<script type="text/javascript" src="Calendario/datepicker.js"></script>
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
//====== Se ho effettuato l'accesso o mi sono appena registrato ======
if($_POST)
{                   //LOGIN
 if( (isset($_POST['username']) && isset($_POST['psw'])) )
 {
  function check_input($value)
  {
   if (get_magic_quotes_gpc())   //si comporta come addslashes, se presenti li tolgo
   {
    $value = stripslashes($value);
   }
     return $value;
  }

 $emailaccesso=$_POST['username'];
 $psw=$_POST['psw'];
 $scelta=$_POST['scelta'];



 $emailaccesso=check_input($emailaccesso);
 $psw=check_input($psw);

 $emailaccesso=mysql_real_escape_string($emailaccesso);
 $psw=mysql_real_escape_string($psw);
                                   //LOGIN UTENTE
 if($scelta=='Utenti')
 {
  $sqlcmdmail = "SELECT U.Nome, U.Cognome FROM utenti U WHERE U.E_Mail='$emailaccesso' ";
  $sqlcmdpsw = "SELECT U.Nome, U.Cognome FROM utenti U WHERE U.Password=md5('$psw') ";
  $sqlcmdcomplete="SELECT U.Nome, U.Cognome, U.Cod_Utente FROM utenti U WHERE U.E_Mail='$emailaccesso' AND U.Password=md5('$psw')";

  $risultatomail=mysql_query($sqlcmdmail);
  $risultatopsw=mysql_query($sqlcmdpsw);
  $risultatocomplete=mysql_query($sqlcmdcomplete);

  if(!$risultatomail)
  {
   echo("Errore nell'interrogazione: $sqlcmdmail. ");
   echo mysql_error();
  }
   if(!$risultatopsw)
   {
    echo("Errore nell'interrogazione: $sqlcmdpsw. ");
    echo mysql_error();
   }
    if(!$risultatocomplete)
    {
     echo("Errore nell'interrogazione: $sqlcmdcomplete. ");
     echo mysql_error();
    }

   $rigamail=mysql_fetch_array($risultatomail);
   $rigapsw=mysql_fetch_array($risultatopsw);
   $rigacomplete=mysql_fetch_array($risultatocomplete);

    if(!$rigacomplete)
    {
     //echo "combinazione mail-psw non corretta utente";
     $f=2;
     header("Location: Login.php?flag=$f");
    }
    if(!$rigamail && $rigapsw)
     {
      $f=0;
      //echo "indirizzo mail errato, password corretta"
      header("Location: Login.php?flag=$f");
     }
      if($rigamail && !$rigapsw)
      {
       //echo "indirizzo mail corretto, password errata"
       $f=1;
       header("Location: Login.php?flag=$f");

      }
       if(!$rigamail && !$rigapsw)
       {
       //echo "indirizzo mail errato, password errata0";
       $f=2;
       header("Location: Login.php?flag=$f");
       }

        if($rigacomplete)
        {
         $nome=$rigacomplete['Nome'];
         $cognome=$rigacomplete['Cognome'];
         $cod=$rigacomplete['Cod_Utente'];

         $sqlcmd1="SELECT Cod_Immagine FROM immagini WHERE Id_Utente='$cod' ";
         $risultato1 = mysql_query($sqlcmd1);
         if(!$risultato1)
         {
          echo("Errore nell'interrogazione: $sqlcmd1. ");
          echo mysql_error();
         }
         $riga1=mysql_fetch_array($risultato1);
         $avatar=$riga1['Cod_Immagine'];
         session_start();
         $_SESSION['oraaccesso'] =time();
         $_SESSION['nome'] =$nome;
         $_SESSION['cognome'] =$cognome;
         $_SESSION['numutente']=$cod;
         $loggato=1;
         if(!isset($avatar))
         $_SESSION['boolimg'] =0;
         else
         $_SESSION['boolimg'] =1;
        }
}

                                     //LOGIN AZIENDE
   else
   {
    $sqlcmdmail = "SELECT A.Rag_Sociale FROM aziende A WHERE A.E_Mail='$emailaccesso' ";
    $sqlcmdpsw = "SELECT A.Rag_Sociale FROM aziende A WHERE A.Password=md5('$psw') ";
    $sqlcmdcomplete="SELECT A.Rag_Sociale, A.Cod_Azienda FROM aziende A WHERE A.E_Mail='$emailaccesso' AND A.Password=md5('$psw')";

    $risultatomail=mysql_query($sqlcmdmail);
    $risultatopsw=mysql_query($sqlcmdpsw);
    $risultatocomplete=mysql_query($sqlcmdcomplete);

    if(!$risultatomail)
    {
     echo("Errore nell'interrogazione: $sqlcmdmail. ");
     echo mysql_error();
    }
     if(!$risultatopsw)
     {
      echo("Errore nell'interrogazione: $sqlcmdpsw. ");
      echo mysql_error();
     }
       if(!$risultatocomplete)
      {
       echo("Errore nell'interrogazione: $sqlcmdcomplete. ");
       echo mysql_error();
      }

      $rigamail=mysql_fetch_array($risultatomail);
      $rigapsw=mysql_fetch_array($risultatopsw);
      $rigacomplete=mysql_fetch_array($risultatocomplete);

      if(!$rigacomplete)
      {
       //echo "combinazione mail-psw non presente";
       $f=2;
       header("Location: Login.php?flag=$f&scelta=$scelta");
      }
       if(!$rigamail && $rigapsw)
       {
        $f=0;
        //echo "indirizzo mail errato, password corretta"
        header("Location: Login.php?flag=$f&scelta=$scelta");
       }
        if($rigamail && !$rigapsw)
        {
         //echo "indirizzo mail corretto, password errata"
         $f=1;
         header("Location: Login.php?flag=$f&scelta=$scelta");
        }
         if(!$rigamail && !$rigapsw)
         {
          //echo "indirizzo mail errato, password errata"
          $f=2;
          header("Location: Login.php?flag=$f&scelta=$scelta");
         }
          if($rigacomplete)
         {
          $rsociale=$rigacomplete['Rag_Sociale'];
          $cod=$rigacomplete['Cod_Azienda'];
          $sqlcmd1="SELECT Cod_Immagine FROM immagini WHERE Id_Azienda='$cod' ";
          $risultato1 = mysql_query($sqlcmd1);
          if(!$risultato1)
          {
           echo("Errore nell'interrogazione: $sqlcmd1. ");
           echo mysql_error();
          }
          $riga1=mysql_fetch_array($risultato1);
          $avatar=$riga1['Cod_Immagine'];
          session_start();
          $_SESSION['oraaccesso'] =time();
          $_SESSION['rsociale'] =$rsociale;
          $_SESSION['numazienda']=$cod;
          $loggato=1;
          if(!isset($avatar))
          $_SESSION['boolimg'] =0;
          else
          $_SESSION['boolimg'] =1;
         }
      }

}
    if(isset($_POST['nome']))                  //REGISTRAZIONE UTENTE
    {
     $nome=addslashes($_POST['nome']);
     $cognome=addslashes($_POST['cognome']);
     $email=$_POST['email'];
     $password=$_POST['password'];
     $telefono=$_POST['cellulare'];
     $giorno=$_POST['day'];
     $mese=$_POST['mese'];
     $anno=$_POST['year'];

     $meserel=0;

     switch($mese)
     {
      case "Gennaio":
      $meserel=1;
      break;

      case "Febbraio":
      $meserel=2;
      break;

      case "Marzo":
      $meserel=3;
      break;

      case "Aprile":
      $meserel=4;
      break;

      case "Maggio":
      $meserel=5;
      break;

      case "Giugno":
      $meserel=6;
      break;

      case "Luglio":
      $meserel=7;
      break;

      case "Agosto":
      $meserel=8;
      break;

      case "Settembre":
      $meserel=9;
      break;

      case "Ottobre":
      $meserel=10;
      break;

      case "Novembre":
      $meserel=11;
      break;

      case "Dicembre":
      $meserel=12;
      break;
     }

      $datanascita=$anno."-".$meserel."-".$giorno;

      $sqlcmd = "INSERT INTO utenti(Nome,Cognome,E_Mail,Password,Telefono,Data_di_Nascita) ";
      $sqlcmd .= "values ('$nome','$cognome','$email',md5('$password'),'$telefono','$datanascita') ";

      $risultato=mysql_query($sqlcmd);
      if(!$risultato)
      {
       echo("Errore nell'interrogazione: $sqlcmd. ");
       echo mysql_error();
      }
       else
       {
        $f=0;
        $oggetto="Benvenuto su SportCentre ";
        $messaggio="Benvenuto $nome $cognome!
        SportCentre nasce dall'esigenza di trovare l'impiato sportivo più adatto alle proprie esigenze facendo tutto comodamente da casa.
        Una volta individuato il centro, ti basterà semplicemente confermare la prenotazione e poi...buon allenamento!

        #####

        Di seguito i tuoi dati di accesso:


        Username: $email
        Password: $password


        Le ricordo che il sito web è raggiungibile all'indirizzo: http://sportcentre.altervista.org

        Grazie,
        Mariano Basile";
        $intestazioni= "From: SportCentre";
        $intestazioni.= "  Reply-To:basilemariano92@gmail.com";
        mail($email, $oggetto, $messaggio, $intestazioni);
        header("Location: Registra.php?email=$email&password=$password&flagreg=$f");
       }
     }

      if(isset($_POST['r_sociale']))                          // REGISTRAZIONE AZIENDA
      {
       $r_sociale=addslashes($_POST['r_sociale']);
       $sede=addslashes($_POST['sede_op']);
       $iva=$_POST['iva'];
       $email_a=$_POST['email_a'];
       $password_a=$_POST['password_a'];
       $cellulare_a=$_POST['cellulare_a'];

       $sqlcmd = "INSERT INTO aziende(Rag_Sociale,Citta,Partita_Iva,E_Mail,Password,Telefono) ";
       $sqlcmd .= "values ('$r_sociale','$sede','$iva','$email_a',md5('$password_a'),'$cellulare_a') ";

       $risultato=mysql_query($sqlcmd);
       if(!$risultato)
       {
        echo("Errore nell'interrogazione: $sqlcmd. ");
        echo mysql_error();
       }
        else
       {
        $f=1;
        $oggetto="Benvenuto su SportCentre ";
        $messaggio="Benvenuto $r_sociale!
        SportCentre nasce dall'esigenza di trovare l'impiato sportivo più adatto alle proprie esigenze facendo tutto comodamente da casa.
        Una volta individuato il centro, ti basterà semplicemente confermare la prenotazione e poi...buon allenamento!

        #####

        Di seguito i tuoi dati di accesso:


        Username: $email_a
        Password: $password_a


        Le ricordo che il sito web è raggiungibile all'indirizzo: http://sportcentre.altervista.org

        Grazie,
        Mariano Basile";
        $intestazioni= "From: SportCentre";
        $intestazioni.= "  Reply-To:basilemariano92@gmail.com";
        mail($email_a, $oggetto, $messaggio, $intestazioni);
        header("Location: Registra.php?email=$email_a&password=$password_a&flagreg=$f");
       }
      }
}
 if($_GET)                         //UTENTI E AZIENDE APPENA REGISTRATI
 {
  if( (isset($_GET['username']) && isset($_GET['psw'])) )
  {
   function check_input($value)
   {
    if (get_magic_quotes_gpc())   //si comporta come addslashes, se presenti li tolgo
    {
     $value = stripslashes($value);
    }
      return $value;
   }

 $emailaccesso=$_GET['username'];
 $psw=$_GET['psw'];
 $scelta=($_GET['scelta']);

 $emailaccesso=check_input($emailaccesso);
 $psw=check_input($psw);

 $emailaccesso=mysql_real_escape_string($emailaccesso);
 $psw=mysql_real_escape_string($psw);

 if($scelta==0)
 {
  $sqlcmd = "SELECT U.Nome, U.Cognome, U.Cod_Utente FROM utenti U WHERE U.E_Mail='$emailaccesso' and U.Password=md5('$psw') ";

  $risultato=mysql_query($sqlcmd);

  if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }
   $riga=mysql_fetch_array($risultato);
   if($riga)
   {
         $nome=$riga['Nome'];
         $cognome=$riga['Cognome'];
         $cod=$riga['Cod_Utente'];

         $sqlcmd1="SELECT Cod_Immagine FROM immagini WHERE Id_Utente='$cod' ";
         $risultato1 = mysql_query($sqlcmd1);
         if(!$risultato1)
         {
          echo("Errore nell'interrogazione: $sqlcmd1. ");
          echo mysql_error();
         }
         $riga1=mysql_fetch_array($risultato1);
         $avatar=$riga1['Cod_Immagine'];
         session_start();
         $_SESSION['oraaccesso'] =time();
         $_SESSION['nome'] =$nome;
         $_SESSION['cognome'] =$cognome;
         $_SESSION['numutente']=$cod;
         $loggato=1;
         if(!isset($avatar))
         $_SESSION['boolimg'] =0;
         else
         $_SESSION['boolimg'] =1;
   }

 }
  else
  {
   $sqlcmd = "SELECT A.Rag_Sociale, A.Cod_Azienda FROM aziende A WHERE A.E_Mail='$emailaccesso' and A.Password=md5('$psw')  ";
   $risultato=mysql_query($sqlcmd);

   if(!$risultato)
   {
    echo("Errore nell'interrogazione: $sqlcmdmail. ");
    echo mysql_error();
   }
    $riga=mysql_fetch_array($risultato);
    if($riga)
    {
          $rsociale=$riga['Rag_Sociale'];
          $cod=$riga['Cod_Azienda'];
          $sqlcmd1="SELECT Cod_Immagine FROM immagini WHERE Id_Azienda='$cod' ";
          $risultato1 = mysql_query($sqlcmd1);
          if(!$risultato1)
          {
           echo("Errore nell'interrogazione: $sqlcmd1. ");
           echo mysql_error();
          }
          $riga1=mysql_fetch_array($risultato1);
          $avatar=$riga1['Cod_Immagine'];
          session_start();
          $_SESSION['oraaccesso'] =time();
          $_SESSION['rsociale'] =$rsociale;
          $_SESSION['numazienda']=$cod;
          $loggato=1;
          if(!isset($avatar))
          $_SESSION['boolimg'] =0;
          else
          $_SESSION['boolimg'] =1;
    }
   }
  }

 }
  if(!isset($loggato))
  {
   $free=1;
   session_start();
   if(isset($_SESSION['nome']) || isset($_SESSION['rsociale']) )
   {
    $stato=0;
    @$stato=verifica_sessione($_SESSION['oraaccesso']);
    $free=0;
   }
  }

?>
<div id="intestazione">
<div id="intesta_1">
<a href="index.php">
<img src="pictures/logo.gif" id="websitelogo" alt="Logo del sito">
</a>
</div>
<?php
if(isset($loggato))
{
 if($loggato==1)
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
}
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
     }
  }
   if(isset($free))
   {
    if($free==1)
    {
     echo"<div id=\"container\">";
     echo"<img src=\"pictures/onoff.gif\" id=\"tasto\" alt=\"Immagine di profilo\" onClick=\"creamenu(1,1)\"><p id=\"dove\"></p>";
     echo"<a id=\"Home\" href=\"index.php\">Home</a></div>";
    }
   }
?>
</div>
<div id="cerca">
<div id="titlesearch">
<?php
if(isset($loggato))
{
 if($loggato==1)
 {
  if(isset($_SESSION['rsociale']))
   {
    echo"
    <h5 id=\"header5\">Disponibilit&agrave Impianti</h5>";
   }
    if(isset($_SESSION['nome']))
    {
     echo"<img src=\"pictures/lente.gif\" id=\"lente\" alt=\"Lente di ricerca\">
     <h5 id=\"header5\">Cerca</h5>";
    }
 }
}
 else
 {
  if(isset($stato))
  {
   if($stato==1)
   {
    if(isset($_SESSION['rsociale']))
    {
     echo"
     <h5 id=\"header5\">Disponibilit&agrave Impianti</h5>";

    }
     if(isset($_SESSION['nome']))
     {
      echo"<img src=\"pictures/lente.gif\" id=\"lente\" alt=\"Lente di ricerca\">
       <h5 id=\"header5\">Cerca</h5>";

     }
   }
    if($stato==0)
     {
      echo"<img src=\"pictures/lente.gif\" id=\"lente\" alt=\"Lente di ricerca\">
      <h5 id=\"header5\">Cerca</h5>";

     }
  }
   else
   {
    echo"<img src=\"pictures/lente.gif\" id=\"lente\" alt=\"Lente di ricerca\">
    <h5 id=\"header5\">Cerca</h5>";

   }
 }
?>
</div>
<p class="etichette">Seleziona lo sport:</p>
<label id="descrimpianto" for="campo">Calcio 5</label>
<img src="pictures/campo.gif" class="campo" id="campo" name="Calcio5" alt="Calcio a 5" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto02" for="calcio7">Calcio 7</label>
<img src="pictures/campo.gif" class="campo02" id="calcio7" name="Calcio7" alt="Calcio a 7" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto03" for="calcio8">Calcio 8</label>
<img src="pictures/campo.gif" class="campo03" id="calcio8" name="Calcio8" alt="Calcio a 8" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto04" for="calcio11">Calcio 11</label>
<img src="pictures/campo.gif" class="campo04" id="calcio11" name="Calcio11" alt="Calcio a 11" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto05" for="hockey">Hockey</label>
<img src="pictures/campohockey.gif" class="campo05" id="hockey" name="Hockey" alt="Hockey" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto06" for="golf">Golf</label>
<img src="pictures/campogolf.gif" class="campo06" id="golf" name="Golf" alt="Golf" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto07" for="artimarziali">Arti Marziali</label>
<img src="pictures/campomarziali.gif" class="campo07" id="artimarziali" name="Arti Marziali" alt="Arti_Marziali" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto08" for="basket">Basket</label>
<img src="pictures/campobasket.gif" class="campo08" id="basket" name="Basket" alt="Basket" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto1" for="tennis">Tennis</label>
<img src="pictures/campotennis.gif" class="campo1" id="tennis" name="Tennis" alt="Tennis" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto2" for="piscina">Nuoto</label>
<img src="pictures/campopiscina.gif" class="campo2" id="piscina" name="Nuoto" alt="Piscina" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto3" for="atletica">Atletica</label>
<img src="pictures/campoatletica.gif" class="campo3" id="atletica" name="Atletica" alt="Atletica" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto4" for="ginnastica">Ginnastica</label>
<img src="pictures/campoginnastic.gif" class="campo4" id="ginnastica" name="Ginnastica" alt="Ginnastica" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto5" for="pallavolo">Pallavolo</label>
<img src="pictures/campopallavolo.gif" class="campo5" id="pallavolo" name="Pallavolo" alt="Pallavolo" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto6" for="rugby">Rugby</label>
<img src="pictures/camporugby.gif" class="campo6" id="rugby" name="Rugby" alt="rugby" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto7" for="palestra">Fitness</label>
<img src="pictures/campopalestra.gif" class="campo7" id="palestra" name="Fitness" alt="Palestra" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto8" for="boxe">Pugilato</label>
<img src="pictures/boxe.gif" class="campo8" id="boxe" name="Pugilato" alt="boxe" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto9" for="danza">Danza</label>
<img src="pictures/campodanza.gif" class="campo9" id="danza" name="Danza" alt="danza" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto10" for="pallamano">Pallamano</label>
<img src="pictures/campopallamano.gif" class="campo10" id="pallamano" name="Pallamano" alt="Pallamano" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">

<label id="descrimpianto11" for="pallanuoto">Pallanuoto</label>
<img src="pictures/campopallanuoto.gif" class="campo11" id="pallanuoto" name="Pallanuoto" alt="Pallanuoto" onClick="changebkg(this.id);controlla(this.id);" onMouseOver="changez(this.id)" onMouseOut="resetz(this.id)">


<?php
if(isset($loggato))
{
 if($loggato==1)
 {
  if(isset($_SESSION['rsociale']))
   {
    echo"<div id=\"titlesearchdataazienda\"> <h6 class=\"header6data\">Inizio Disponibilità</h6>";
   }
    if(isset($_SESSION['nome']))
    {
     echo"<div id=\"titlesearchdata\"><h6 class=\"header6data\" >Data Di Prenotazione</h6>";
    }
 }
}
 else
 {
  if(isset($stato))
  {
   if($stato==1)
   {
    if(isset($_SESSION['rsociale']))
    {
     echo"<div id=\"titlesearchdataazienda\"><h6 class=\"header6data\" >Inizio Disponibilità</h6>";
    }
     if(isset($_SESSION['nome']))
     {
      echo"<div id=\"titlesearchdata\"><h6 class=\"header6data\" >Data Di Prenotazione</h6>";
     }
   }
    if($stato==0)
     {
      echo"<div id=\"titlesearchdata\"><h6 class=\"header6data\" >Data Di Prenotazione</h6>";
     }
  }
   else
   {
    echo"<div id=\"titlesearchdata\"><h6 class=\"header6data\"  >Data Di Prenotazione</h6>";
   }
 }
?>
<input type="text" tabindex="3" size="9" id="date-from" name="date-from" onClick="cambiabianco()" onSelect="cambiabianco()" maxlength="10">
</div>

<?php
if(isset($loggato))
{
 if($loggato==1)
 {
  if(isset($_SESSION['rsociale']))
   {
    echo"<div id=\"titlesearchsubdata\">";
    echo"<h6 class=\"header6data\">Fine Disponibilità</h6>";
    echo"<input type=\"text\" tabindex=\"6\" size=\"9\" id=\"dateexpired-from\" name=\"dateexpired-from\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\" maxlength=\"10\">";
    echo"</div>";
   }
 }
}
 else
 {
  if(isset($stato))
  {
   if($stato==1)
   {
    if(isset($_SESSION['rsociale']))
    {
     echo"<div id=\"titlesearchsubdata\">";
     echo"<h6 class=\"header6data\">Fine Disponibilità</h6>";
     echo"<input type=\"text\" tabindex=\"6\" size=\"9\" id=\"dateexpired-from\" name=\"dateexpired-from\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\" maxlength=\"10\">";
     echo"</div>";
    }
   }
  }

 }
?>
<?php
if(isset($loggato))
{
 if($loggato==1)
 {
  if(isset($_SESSION['rsociale']))
   {
    echo"<div id=\"titlesearchoraazienda\">";
    echo"<h6 class=\"header6data\">Ora Di Disponibilit&agrave</h6>";
   }
    if(isset($_SESSION['nome']))
    {
     echo"<div id=\"titlesearchora\">";
     echo"<h6 class=\"header6data\">Ora Di Prenotazione</h6>";
    }
 }
}
 else
 {
  if(isset($stato))
  {
   if($stato==1)
   {
    if(isset($_SESSION['rsociale']))
    {
     echo"<div id=\"titlesearchoraazienda\">";
     echo"<h6 class=\"header6data\">Ora Di Disponibilit&agrave</h6>";
    }
     if(isset($_SESSION['nome']))
     {
      echo"<div id=\"titlesearchora\">";
      echo"<h6 class=\"header6data\">Ora Di Prenotazione</h6>";
     }
   }
    if($stato==0)
     {
      echo"<div id=\"titlesearchora\">";
      echo"<h6 class=\"header6data\">Ora Di Prenotazione</h6>";
     }
  }
   else
   {
    echo"<div id=\"titlesearchora\">";
    echo"<h6  class=\"header6data\">Ora Di Prenotazione</h6>";
   }
 }
?>
<label id="etichetteorainizio" for="inizio_ora">Dalle</label>
<div id="orainizio">
<input type="text" tabindex="4" size="2" maxlength="2" id="inizio_ora" name="inizio_ora" onClick="cambiabianco()" onSelect="cambiabianco()">
<label id="etichetteorafine" for="fine_ora">Alle</label>
<input type="text" tabindex="5" size="2" maxlength="2" id="fine_ora" name="fine_ora" onClick="cambiabianco()" onSelect="cambiabianco()">
</div>
</div>
<?php
if(isset($loggato))
{
 if($loggato==1)
 {
    if(isset($_SESSION['nome']))
    {
     $name=$_SESSION['nome'];
     $surname=$_SESSION['cognome'];
     $sqlcmd="SELECT Citta FROM utenti WHERE Nome='$name' and Cognome='$surname' ";
     $risultato = mysql_query($sqlcmd);
     if(!$risultato)
     {
      echo("Errore nell'interrogazione: $sqlcmd. ");
      echo mysql_error();
     }

      $riga=mysql_fetch_array($risultato);
      if(isset($riga['Citta']))
      {
       $citta=$riga['Citta'];
       echo"<div id=\"titlesearchdove\">
          <h6 id=\"header6dove\">Localit&agrave</h6>
          <input type=\"text\" tabindex=\"2\" size=\"20\" id=\"localita\" name=\"localita\" value=\"$citta\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";
      }
       else
       {
        echo"<div id=\"titlesearchdove\">
          <h6 id=\"header6dove\">Localit&agrave</h6>
          <input type=\"text\" tabindex=\"2\" size=\"20\" id=\"localita\" name=\"localita\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";
       }
    }
 }
}
 else
 {
  if(isset($stato))
  {
   if($stato==1)
   {
     if(isset($_SESSION['nome']))
     {
      $name=$_SESSION['nome'];
      $surname=$_SESSION['cognome'];
      $sqlcmd="SELECT Citta FROM utenti WHERE Nome='$name' and Cognome='$surname' ";
      $risultato = mysql_query($sqlcmd);
      if(!$risultato)
      {
       echo("Errore nell'interrogazione: $sqlcmd. ");
       echo mysql_error();
      }

       $riga=mysql_fetch_array($risultato);
       if(isset($riga['Citta']))
       {
        $citta=$riga['Citta'];
        echo"<div id=\"titlesearchdove\">
          <h6 id=\"header6dove\">Localit&agrave</h6>
          <input type=\"text\" tabindex=\"2\" size=\"20\" id=\"localita\" name=\"localita\" value=\"$citta\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";
       }
        else
        {
          echo"<div id=\"titlesearchdove\">
          <h6 id=\"header6dove\">Localit&agrave</h6>
          <input type=\"text\" tabindex=\"2\" size=\"20\" id=\"localita\" name=\"localita\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";
        }
      }
   }
    if($stato==0)
     {
      echo"<div id=\"titlesearchdove\">
          <h6 id=\"header6dove\">Localit&agrave</h6>
          <input type=\"text\" tabindex=\"2\" size=\"20\" id=\"localita\" name=\"localita\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";
     }
  }
   else
   {
    echo"<div id=\"titlesearchdove\">
          <h6 id=\"header6dove\">Localit&agrave</h6>
          <input type=\"text\" tabindex=\"2\" size=\"20\" id=\"localita\" name=\"localita\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";
   }
 }
?>

<?php
if(isset($loggato))
{
 if($loggato==1)
 {
  if(isset($_SESSION['rsociale']))
   {
    echo"
         <div id=\"titlesearchsub\">

         <h6 id=\"header6\">Sport</h6>

         <input type=\"text\" name=\"altro\" tabindex=\"1\" id=\"altro\" value=\"\" size=\"10\" maxlength=\"20\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">

         </div>";
   echo"<img src=\"pictures/Immagine.png\" id=\"search\" name=\"search\" alt=\"Freccia avanti processo\" onClick=\"return checkazienda()\">";
   }
    if(isset($_SESSION['nome']))
    {
     echo"
          <div id=\"titlesearchsub\">
          <h6 id=\"header6\">Sport</h6>
          <input type=\"text\" name=\"altro\" tabindex=\"1\" id=\"altro\" value=\"\" size=\"10\" maxlength=\"20\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";
     echo"<img src=\"pictures/Immagine.png\" id=\"search\" name=\"search\" alt=\"Freccia avanti processo\" onClick=\"return check()\">";
    }
 }
}
 else
 {
  if(isset($stato))
  {
   if($stato==1)
   {
    if(isset($_SESSION['rsociale']))
    {
     echo"
         <div id=\"titlesearchsub\">
         <h6 id=\"header6\">Sport</h6>
         <input type=\"text\" name=\"altro\" tabindex=\"1\" id=\"altro\" value=\"\" size=\"10\" maxlength=\"20\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
         </div>";

     echo"<img src=\"pictures/Immagine.png\" id=\"search\" name=\"search\" alt=\"Freccia avanti processo\" onClick=\"return checkazienda()\">";
    }
     if(isset($_SESSION['nome']))
     {
      echo"
          <div id=\"titlesearchsub\">
          <h6 id=\"header6\">Sport</h6>
          <input type=\"text\" name=\"altro\" tabindex=\"1\" id=\"altro\" value=\"\" size=\"10\" maxlength=\"20\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";

      echo"<img src=\"pictures/Immagine.png\" id=\"search\" name=\"search\" alt=\"Freccia avanti processo\" onClick=\"return check()\">";
     }
   }
    if($stato==0)
     {
      echo"
          <div id=\"titlesearchsub\">
          <h6 id=\"header6\">Sport</h6>
          <input type=\"text\" name=\"altro\" tabindex=\"1\" id=\"altro\" value=\"\" size=\"10\" maxlength=\"20\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";

      echo"<img src=\"pictures/Immagine.png\" id=\"search\" name=\"search\" alt=\"Freccia avanti processo\" onClick=\"return check()\">";
     }
  }
   else
   {
    echo"
          <div id=\"titlesearchsub\">
          <h6 id=\"header6\">Sport</h6>
          <input type=\"text\" name=\"altro\" tabindex=\"1\" id=\"altro\" value=\"\" size=\"10\" maxlength=\"20\" onClick=\"cambiabianco()\" onSelect=\"cambiabianco()\">
          </div>";

    echo"<img src=\"pictures/Immagine.png\" id=\"search\" name=\"search\" alt=\"Freccia avanti processo\" onClick=\"return check()\">";
   }
 }
?>
</div>

<script type="text/javascript">
    /*<[CDATA[*/
     var dpck	= new DatePicker({
      relative	: 'date-from',
      language	: 'it'
      });
    /*]]>*/
    </script>
<?php
if(isset($loggato))
{
 if($loggato==1)
 {
  if(isset($_SESSION['rsociale']))
   {
echo" <script type=\"text/javascript\">
    /*<[CDATA[*/
     var dpck	= new DatePicker({
      relative	: \"dateexpired-from\",
      language	: \"it\"
      });
    /*]]>*/
    </script>";

   }
 }
}
 else
 {
  if(isset($stato))
  {
   if($stato==1)
   {
    if(isset($_SESSION['rsociale']))
    {
      echo" <script type=\"text/javascript\">
    /*<[CDATA[*/
     var dpck	= new DatePicker({
      relative	: \"dateexpired-from\",
      language	: \"it\"
      });
    /*]]>*/
    </script>";

    }
   }
  }
 }
    ?>
<div id="footer">
<p id="descrfooter"> Sport Centre &copy; 2013 Mariano Basile</p>
<?php
  if(!$esiste_8)
echo"<a id=\"contatti\" href=\"mailto:basilemariano92@gmail.com\">Contatti</a>";
?>
</div>

</body>

</html>