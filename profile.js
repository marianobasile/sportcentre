var f=0;
var i=1;
var etis=0;
var etidi=0;
var etioi=0;
var etiof=0;
var eticog=0;
var eticogu=0;
var etispo=0;
var etispou=0;
var etidat=0;
var etidatu=0;
var eticogg=0;
var eticoggu=0;
var etispog=0;
var etispogu=0;
var intervallo;
function impostabkg()
{
 var prof=document.getElementById("profilo");
 prof.style.width="47px";
 prof.style.fontWeight="bold";
 prof.style.backgroundColor="#f1f1f1";
 prof.style.border="1px solid #e5e5e5";
 richiesta= new XMLHttpRequest();
 richiesta.open("GET","Elabora.php?oggetto="+"profilo",true);
 richiesta.onreadystatechange=aggiorna;
 richiesta.send(null);
}
function cambiabkg(id)
{
 var struttura=document.getElementById(id);
  if(id=="profilo" && struttura.style.backgroundColor=="")
 {
  struttura.style.backgroundColor="#f1f1f1";
  struttura.style.border="1px solid #e5e5e5";
 }
  if(id=="giornaliero" && struttura.style.backgroundColor=="")
  {
   struttura.style.backgroundColor="#f1f1f1";
   struttura.style.border="1px solid #e5e5e5";
  }
  if(id=="giornalieroe" && struttura.style.backgroundColor=="")
  {
   struttura.style.backgroundColor="#f1f1f1";
   struttura.style.border="1px solid #e5e5e5";
  }
   if(id=="cambiapsw" && struttura.style.backgroundColor=="")
   {
    struttura.style.backgroundColor="#f1f1f1";
    struttura.style.border="1px solid #e5e5e5";
   }
     if(id=="myprenot"&& struttura.style.backgroundColor=="")
     {
      struttura.style.backgroundColor="#f1f1f1";
      struttura.style.border="1px solid #e5e5e5";
     }
     if(id=="myprenote"&& struttura.style.backgroundColor=="")
     {
      struttura.style.backgroundColor="#f1f1f1";
      struttura.style.border="1px solid #e5e5e5";
     }
      if(id=="mystruttura"&& struttura.style.backgroundColor=="")
     {
      struttura.style.backgroundColor="#f1f1f1";
      struttura.style.border="1px solid #e5e5e5";
     }
      if(id=="dispstrutture"&& struttura.style.backgroundColor=="")
     {
      struttura.style.backgroundColor="#f1f1f1";
      struttura.style.border="1px solid #e5e5e5";
     }
}
function cambiariga(riga)
{
  if(riga.style.backgroundColor=="")
  {
   riga.style.backgroundColor="#f1f1f1";
  }
}
function resetriga(riga)
{
 if(riga.style.backgroundColor!="")
  {
   riga.style.backgroundColor="";
  }
}
function resetbkg(id)
{
 var struttura=document.getElementById(id);
 if(struttura.style.backgroundColor!="" && struttura.style.fontWeight!="bold")
 {
  struttura.style.backgroundColor="";
  struttura.style.border="";
  struttura.style.fontWeight="normal";
 }
}
function setbkg(id)
{
 var profilo=document.getElementById("profilo");
 var cambiapsw=document.getElementById("cambiapsw");
 var myprenot=document.getElementById("myprenot");
 var myprenote=document.getElementById("myprenote");
 var giornaliero=document.getElementById("giornaliero");
 var giornalieroe=document.getElementById("giornalieroe");
 var struttu=document.getElementById("mystruttura");
 var dispstrutture=document.getElementById("dispstrutture");

 var struttura=document.getElementById(id);

 if(profilo.style.backgroundColor!="")
 {
  profilo.style.backgroundColor="";
  profilo.style.border="";
  profilo.style.fontWeight="normal";
 }
  if(cambiapsw.style.backgroundColor!="")
  {
   cambiapsw.style.backgroundColor="";
   cambiapsw.style.border="";
   cambiapsw.style.fontWeight="normal";
  }
    if(myprenot.style.backgroundColor!="")
    {
     myprenot.style.backgroundColor="";
     myprenot.style.border="";
     myprenot.style.fontWeight="normal";
    }
    if(myprenote)
    {
    if(myprenote.style.backgroundColor!="")
    {
     myprenote.style.backgroundColor="";
     myprenote.style.border="";
     myprenote.style.fontWeight="normal";
    }
    }
     if(giornaliero)
     {
     if(giornaliero.style.backgroundColor!="")
     {
      giornaliero.style.backgroundColor="";
      giornaliero.style.border="";
      giornaliero.style.fontWeight="normal";
     }
     }
     if(giornalieroe)
     {
     if(giornalieroe.style.backgroundColor!="")
     {
      giornalieroe.style.backgroundColor="";
      giornalieroe.style.border="";
      giornalieroe.style.fontWeight="normal";
     }
     }
      if(struttu)
      {
       if(struttu.style.backgroundColor!="")
       {
        struttu.style.backgroundColor="";
        struttu.style.border="";
        struttu.style.fontWeight="normal";
       }
      }
       if(dispstrutture)
      {
       if(dispstrutture.style.backgroundColor!="")
       {
        dispstrutture.style.backgroundColor="";
        dispstrutture.style.border="";
        dispstrutture.style.fontWeight="normal";
       }
      }
      struttura.style.backgroundColor="#f1f1f1";
      struttura.style.border="1px solid #e5e5e5";
      i--;
 if(i==0)
 {
 var struttura=document.getElementById(id);
 struttura.style.fontWeight="bold";
 i++;
 }
richiesta= new XMLHttpRequest();
richiesta.open("GET","Elabora.php?oggetto="+id,true);
richiesta.onreadystatechange=aggiorna;
richiesta.send(null);
}
function aggiorna()
{
 if( (richiesta.readyState==4) && (richiesta.status==200) )
 {
  document.getElementById("heart").innerHTML=richiesta.responseText;
 }
}
function verifica(valore)
{
if(valore=="")
return false;
}
function verify(car)
{
  if(car=='c')
  {
   var regexpcity = /^[a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27\']{2,}$/;
   var citta=document.getElementById("city");
   var stringa_city=citta.value;
   var spazio= /\s/;

  if(!regexpcity.test(stringa_city))
  {
    if(stringa_city=="")
    {
     citta.style.backgroundColor="#FC9494";
     alert("Attenzione! Il campo Città è obbligatorio");
     return false;
    }
	 if(stringa_city.length<2)
	 {
	  citta.style.backgroundColor="#FC9494";
	  alert("Attenzione! Il campo Città deve essere composto da almeno due caratteri.");
	  return false;
	 }
      if(spazio.test(stringa_city))
	  {
	   citta.style.backgroundColor="#FC9494";
	   alert("Attenzione! Non sono ammessi gli spazi.");
	   return false;
	  }
       citta.style.backgroundColor="#FC9494";
	   alert("Attenzione! Il campo Città non è corretto.");
	   return false;
  }
   document.location='Elabora.php?citta='+citta.value;
 }

  if(car=='i')
  {
   var regexpind = /^([a-zA-Z0-9\xE0\xE8\xE9\xF9\xF2\xEC\x27\°\-\,\.\/]\s?){4,30}$/;
   var ind=document.getElementById("indirizzo");
   var stringa_ind=ind.value;

   if(!regexpind.test(stringa_ind))
   {
    if(stringa_ind=="")
	{
	 ind.style.backgroundColor="#FC9494";
	 alert("Attenzione! Il campo Indirizzo è obbligatorio.");
	 return false;
	}
	 if(stringa_ind.length<4)
	 {
	  ind.style.backgroundColor="#FC9494";
	  alert("Attenzione! Il campo Indirizzo deve essere composto da almeno quattro caratteri.");
	  return false;
	 }
      ind.style.backgroundColor="#FC9494";
	  alert("Attenzione! Il campo Indirizzo non è corretto.");
	  return false;
    }
     document.location='Elabora.php?indirizzo='+ind.value;
 }
  if(car=='p')
  {
   var regexpsw=/^[a-zA-Z0-9\_\*\-\+\!\?\,\:\;\.\xE0\xE8\xE9\xF9\xF2\xEC\x27]{1,20}/;

   var newpsw=document.getElementById("newpsw");
   var stringa_password=newpsw.value;

   var confirmpsw=document.getElementById("confirmpsw");
   var stringa_password_confirm=confirmpsw.value;

   if(!regexpsw.test(stringa_password))
   {
    if(stringa_password=="")
	{
	 newpsw.style.backgroundColor="#FC9494";
	 alert("Attenzione! La Password è obbligatoria.");
	 return false;
	}
     newpsw.style.backgroundColor="#FC9494";
	 alert("Attenzione! La Password inserita non è corretta.");
	 return false;
   }
    if(!regexpsw.test(stringa_password_confirm))
    {
     if(stringa_password_confirm=="")
	 {
	  confirmpsw.style.backgroundColor="#FC9494";
	  alert("Attenzione! La Password è obbligatoria.");
	  return false;
	 }
      confirmpsw.style.backgroundColor="#FC9494";
	  alert("Attenzione! La Password inserita non è corretta.");
	  return false;
    }
     if(stringa_password != stringa_password_confirm)
     {
      newpsw.style.backgroundColor="#FC9494";
      confirmpsw.style.backgroundColor="#FC9494";
	  alert("Attenzione! Le Password non corrispondono!");
	  return false;
     }
      document.location='Elabora.php?psw='+confirmpsw.value;
  }
   if(car=='e')
  {
   var regexpemail=/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   var newmail=document.getElementById("newmail");

   var stringa_email=newmail.value;

   var confirmmail=document.getElementById("confirmmail");
   var stringa_mail_confirm=confirmmail.value;
   var spazio=/\s/;

   if(!regexpemail.test(stringa_email))
   {
    if(stringa_email=="")
    {
     newmail.style.backgroundColor="#FC9494";
     alert("Attenzione! L'indirizzo E-mail è obbligatorio.");
     return false;
    }
	 if(spazio.test(stringa_email))
	 {
	  newmail.style.backgroundColor="#FC9494";
	  alert("Attenzione! Non sono ammessi gli spazi.");
	  return false;
	 }
      newmail.style.backgroundColor="#FC9494";
	  alert("Attenzione! L'indirizzo E-mail non è corretto.");
	  return false;
   }
    if(!regexpemail.test(stringa_mail_confirm))
    {
     if(stringa_mail_confirm=="")
     {
      confirmmail.style.backgroundColor="#FC9494";
      alert("Attenzione! L'indirizzo E-mail è obbligatorio.");
      return false;
     }
	  if(spazio.test(stringa_mail_confirm))
	  {
	   confirmmail.style.backgroundColor="#FC9494";
	   alert("Attenzione! Non sono ammessi gli spazi.");
	   return false;
	  }
       confirmmail.style.backgroundColor="#FC9494";
	   alert("Attenzione! L'indirizzo E-mail non è corretto.");
	   return false;
    }
     if(stringa_email != stringa_mail_confirm)
     {
      newmail.style.backgroundColor="#FC9494";
      confirmmail.style.backgroundColor="#FC9494";
	  alert("Attenzione! Gli indirizzi E-mail non corrispondono!");
	  return false;
     }
      document.location='Elabora.php?mail='+confirmmail.value;
  }
   if(car=='s')
  {
   var regexpstru=/^\d*$/;
   var spazio=/\s/;
   impianto1=document.getElementById("campo5q");
   impianto2=document.getElementById("campo7q");
   impianto3=document.getElementById("campo8q");
   impianto4=document.getElementById("campo11q");
   impianto5=document.getElementById("hockeyq");
   impianto6=document.getElementById("golfq");
   impianto7=document.getElementById("artimarzialiq");
   impianto8=document.getElementById("basketq");
   impianto9=document.getElementById("tennisq");
   impianto10=document.getElementById("piscinaq");
   impianto11=document.getElementById("atleticaq");
   impianto12=document.getElementById("ginnasticaq");
   impianto13=document.getElementById("pallavoloq");
   impianto14=document.getElementById("rugbyq");
   impianto15=document.getElementById("fitnessq");
   impianto16=document.getElementById("boxeq");
   impianto17=document.getElementById("danzaq");
   impianto18=document.getElementById("pallamanoq");
   impianto19=document.getElementById("pallanuotoq");
   var altrosport=document.getElementById("altroq");
   var altrosportinput=document.getElementById("altro");

   var hobby=altrosportinput.value;
   var regexpsport = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)*$/;


   var impianti=new Array();
   impianti=[impianto1,impianto2,impianto3,impianto4,impianto5,impianto6,impianto7,impianto8,impianto9,impianto10,impianto11,impianto12,impianto13,impianto14,impianto15,impianto16,impianto17,impianto18,impianto19,altrosportinput,altrosport];
   for(var i=0;i<impianti.length;i++)
   {
    if(i==19)
    {
      if(!regexpsport.test(hobby))
     {
      altrosportinput.style.backgroundColor="#FC9494";
      alert("Attenzione! Il campo Sport non è corretto!");
      return false;
     }
    }
     else
     {
      if(!regexpstru.test(impianti[i].value))
      {
	   if(spazio.test(impianti[i].value))
	   {
	    impianti[i].style.backgroundColor="#FC9494";
	    alert("Attenzione! Non sono ammessi gli spazi.");
	    return false;
	   }
        impianti[i].style.backgroundColor="#FC9494";
	    alert("Attenzione! La quantità inserita non è valida.");
	    return false;
      }
     }
   }
     if(hobby!="" && altrosport.value==0)
     {
      altrosport.style.backgroundColor="#FC9494";
	  alert("Attenzione! La quantità inserita non è valida.");
	  return false;
     }
    var impiantivalue=new Array();
    impiantivalue=[impianto1.value,impianto2.value,impianto3.value,impianto4.value,impianto5.value,impianto6.value,impianto7.value,impianto8.value,impianto9.value,impianto10.value,impianto11.value,impianto12.value,impianto13.value,impianto14.value,impianto15.value,impianto16.value,impianto17.value,impianto18.value,impianto19.value,altrosportinput.value,altrosport.value];
    document.location='Elabora.php?imp='+impiantivalue;
  }
}
function sfondo(car)
{
 if(car=='c')
 {
 var citta=document.getElementById("city");
 if(citta.style.backgroundColor!="")
 citta.style.backgroundColor="";
 }
  if(car=='i')
  {
  var indirizzo=document.getElementById("indirizzo");
  if(indirizzo.style.backgroundColor!="")
  indirizzo.style.backgroundColor="";
  }
   if(car=='p')
   {
    var newpsw=document.getElementById("newpsw");
    if(newpsw.style.backgroundColor!="")
    newpsw.style.backgroundColor="";

    var confirmpsw=document.getElementById("confirmpsw");
    if(confirmpsw.style.backgroundColor!="")
    confirmpsw.style.backgroundColor="";
   }
     if(car=='e')
    {
     var newmail=document.getElementById("newmail");
     if(newmail.style.backgroundColor!="")
     newmail.style.backgroundColor="";

     var confirmmail=document.getElementById("confirmmail");
     if(confirmmail.style.backgroundColor!="")
     confirmmail.style.backgroundColor="";
    }
}

function cambiabianco()
{
   impianto1=document.getElementById("campo5q");
   impianto2=document.getElementById("campo7q");
   impianto3=document.getElementById("campo8q");
   impianto4=document.getElementById("campo11q");
   impianto5=document.getElementById("hockeyq");
   impianto6=document.getElementById("golfq");
   impianto7=document.getElementById("artimarzialiq");
   impianto8=document.getElementById("basketq");
   impianto9=document.getElementById("tennisq");
   impianto10=document.getElementById("piscinaq");
   impianto11=document.getElementById("atleticaq");
   impianto12=document.getElementById("ginnasticaq");
   impianto13=document.getElementById("pallavoloq");
   impianto14=document.getElementById("rugbyq");
   impianto15=document.getElementById("fitnessq");
   impianto16=document.getElementById("boxeq");
   impianto17=document.getElementById("danzaq");
   impianto18=document.getElementById("pallamanoq");
   impianto19=document.getElementById("pallanuotoq");
   var altrosport=document.getElementById("altroq");
   var altrosportinput=document.getElementById("altro");
   var impianti=new Array();
   impianti=[impianto1,impianto2,impianto3,impianto4,impianto5,impianto6,impianto7,impianto8,impianto9,impianto10,impianto11,impianto12,impianto13,impianto14,impianto15,impianto16,impianto17,impianto18,impianto19,altrosportinput,altrosport];
   for(var i=0;i<impianti.length;i++)
   {
    if(impianti[i].style.backgroundColor!="")
    impianti[i].style.backgroundColor="";
   }


}

function ordina(stringa,passato)
{
 if(stringa=="etis")
 {   //alert("crescente sport");
  if(etis==0)
  {
   richiesta= new XMLHttpRequest();
   richiesta.open("GET","Elabora.php?oggetto=sport"+"&id="+1,true);
   richiesta.onreadystatechange=aggiorna;
   richiesta.send(null);
   return 1;
  }
  else
  {
   richiesta= new XMLHttpRequest();
   richiesta.open("GET","Elabora.php?oggetto=sport"+"&id="+0,true);
   richiesta.onreadystatechange=aggiorna;
   richiesta.send(null);
   return 0;
  }
 }


  if(stringa=="etidi")
 { //alert("crescente data");
  if(etidi==0)
  {
 // alert("crescente data");
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=datai"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=datai"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

  if(stringa=="etioi")
 {     //  alert("crescente ora");
  if(etioi==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=orai"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=orai"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="eticog")
 {     //  alert("crescente cognome");
  if(eticog==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=cog"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=cog"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="eticogu")
 {     //  alert("crescente cognome");
  if(eticogu==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=cogu"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=cogu"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="etispo")
 {     //  alert("crescente sport");
  if(etispo==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=spo"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=spo"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="etispou")
 {     //  alert("crescente sport");
  if(etispou==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=spou"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=spou"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="etidat")
 {     //  alert("crescente sport");
  if(etidat==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=dat"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=dat"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="etidatu")
 {     //  alert("crescente sport");
  if(etidatu==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=datu"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=datu"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="eticogg")
 {     //  alert("crescente cognome-giornaliero");
  if(eticogg==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=cogg"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=cogg"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="eticoggu")
 {     //  alert("crescente cognome-giornaliero");
  if(eticoggu==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=coggu"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=coggu"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="etispog")
 {     //  alert("crescente cognome-giornaliero");
  if(etispog==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=spog"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=spog"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }

 if(stringa=="etispogu")
 {     //  alert("crescente cognome-giornaliero");
  if(etispogu==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=spogu"+"&id="+1,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=spogu"+"&id="+0,true);
  richiesta.onreadystatechange=aggiorna;
  richiesta.send(null);
  return 0;
 }
 }
}

function chiediconferma(oggetto)
{
 var els = oggetto.getElementsByTagName("td");

 var ask=confirm("Si desidera prenotare l'impianto selezionato?")
 if(ask==true)
 document.location='Prenotazione.php?sportazienda='+els[0].innerHTML+'&impianto='+els[1].innerHTML+'&data='+els[2].innerHTML+'&orai='+els[3].innerHTML+'&oraf='+els[4].innerHTML;
}



































