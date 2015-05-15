<?php

//Connessione al database
//===========================================
$hostname="localhost";
$username="sportcentre";
$password="";

$conn=mysql_connect($hostname,$username,$password);

if(!$conn)
{
 echo "Errore nella connessione alla base di dati. ";
 echo mysql_error();
 mysql_close($conn);
}

 //Selezione Database
 //============================================

  $db=mysql_select_db("my_sportcentre",$conn);

  if(!$db)
  {
   echo ("Errore nella selezione della base di dati. ");
   echo mysql_error();
   mysql_close($conn);
  }
?>