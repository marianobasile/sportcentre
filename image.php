<?php
include ("Conn_Scelta_db.php");
?>
<?php

$id=$_GET['id'];

$sqlcmd="SELECT Immagine,Tipo_Immagine FROM immagini WHERE Cod_Immagine='$id' ";
$risultato = mysql_query($sqlcmd);
 if(!$risultato)
  {
   echo("Errore nell'interrogazione: $sqlcmd. ");
   echo mysql_error();
  }
$riga=mysql_fetch_array($risultato);

header('Content-Type: '.$riga['Tipo_Immagine']);

// visualizzo i contenuti dell'immagine
echo $riga['Immagine'];
?>