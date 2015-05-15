var etis=0;
var etidi=0;
var etioi=0;
var etiof=0;
var etics=0;
function creamenu(freeornot,sceltadiv)
{
 var inserisci=document.getElementById("dove");
 var mostra=document.getElementById("azioni");
 var mostra1=document.getElementById("azionifree");

 if(sceltadiv==0 && !mostra1)
 {
  var newdiv=document.createElement("div");
  newdiv.setAttribute("id","azionifree");
 }
  if(sceltadiv==1 && !mostra)
  {
   var newdiv=document.createElement("div");
   newdiv.setAttribute("id","azioni");
  }
   if(mostra)
   {
    if(mostra.style.display=='inline' || mostra.style.display=='')
    mostra.style.display='none';
    else
    mostra.style.display='inline';
   }
    if(mostra1)
    {
     if(mostra1.style.display=='inline' || mostra1.style.display=='')
     mostra1.style.display='none';
     else
     mostra1.style.display='inline';
    }
    if(!mostra && !mostra1)
    {
     var ul=document.createElement("ul");
     ul.setAttribute("id","ullista");
     var li=document.createElement("li");

     inserisci.appendChild(newdiv);
     newdiv.appendChild(ul);
     ul.appendChild(li);

     if(freeornot==1)
     {
      var a=document.createElement("a");
      a.setAttribute("class","chartext");
      a.setAttribute("href","Login.php");
      a.innerHTML="Login";
      li.appendChild(a);

      var li1=document.createElement("li");
      var a1=document.createElement("a");
      a1.setAttribute("class","chartext");
      a1.setAttribute("href","Registra.php");
      a1.innerHTML="Registrati";
      ul.appendChild(li1);
      li1.appendChild(a1);
     }
      if(freeornot==0)
      {
       var a=document.createElement("a");
       a.setAttribute("class","chartext");
       a.setAttribute("href","Logout.php");
       a.innerHTML="Logout";
       li.appendChild(a);
     }
    }

}
function changebkg(id)
{
 var struttura=document.getElementById(id);
 if(struttura.style.backgroundColor=="")
 {
 struttura.style.backgroundColor="#f1f1f1";
 struttura.style.border="1px solid #e5e5e5";
 }
  else
  {
   struttura.style.backgroundColor="";
   struttura.style.border="";
  }
}
function changez(id)
{
 var struttura=document.getElementById(id);

 struttura.style.width="115px";
 struttura.style.height="75px";
}
function controlla(id)
{
 impianto1=document.getElementById("campo");
 impianto2=document.getElementById("calcio7");
 impianto3=document.getElementById("calcio8");
 impianto4=document.getElementById("calcio11");
 impianto5=document.getElementById("hockey");
 impianto6=document.getElementById("golf");
 impianto7=document.getElementById("artimarziali");
 impianto8=document.getElementById("basket");
 impianto9=document.getElementById("tennis");
 impianto10=document.getElementById("piscina");
 impianto11=document.getElementById("atletica");
 impianto12=document.getElementById("ginnastica");
 impianto13=document.getElementById("pallavolo");
 impianto14=document.getElementById("rugby");
 impianto15=document.getElementById("palestra");
 impianto16=document.getElementById("boxe");
 impianto17=document.getElementById("danza");
 impianto18=document.getElementById("pallamano");
 impianto19=document.getElementById("pallanuoto");
 var impianti=new Array();
 impianti=[impianto1,impianto2,impianto3,impianto4,impianto5,impianto6,impianto7,impianto8,impianto9,impianto10,impianto11,impianto12,impianto13,impianto14,impianto15,impianto16,impianto17,impianto18,impianto19];
 var k=0;
 for(var i=0;i<19;i++)
 {
  if(impianti[i].style.backgroundColor=="")
  k++;
 }
  if(k<18)
  {
  alert("É consentita una sola scelta!");
  var togli=document.getElementById(id);
  togli.style.backgroundColor="";
  togli.style.border="";
  }

}
function resetz(id)
{
 var struttura=document.getElementById(id);

 struttura.style.width="100px";
 struttura.style.height="70px";
}

function check()
{
 //Controllo Selezione
 var calcio5=document.getElementById("campo");
 var calcio7=document.getElementById("calcio7");
 var calcio8=document.getElementById("calcio8");
 var calcio11=document.getElementById("calcio11");
 var hockey=document.getElementById("hockey");
 var golf=document.getElementById("golf");
 var artimarziali=document.getElementById("artimarziali");
 var basket=document.getElementById("basket");
 var tennis=document.getElementById("tennis");
 var piscina=document.getElementById("piscina");
 var atletica=document.getElementById("atletica");
 var ginnastica=document.getElementById("ginnastica");
 var pallavolo=document.getElementById("pallavolo");
 var rugby=document.getElementById("rugby");
 var fitness=document.getElementById("palestra");
 var pugilato=document.getElementById("boxe");
 var danza=document.getElementById("danza");
 var pallamano=document.getElementById("pallamano");
 var pallanuoto=document.getElementById("pallanuoto");
 var altrosport=document.getElementById("altro");
 s=0;
 if(altrosport.value=="")
 {
 var hobby=new Array(calcio5,calcio7,calcio8,calcio11,hockey,golf,artimarziali,basket,tennis,piscina,atletica,ginnastica,pallavolo,rugby,fitness,pugilato,danza,pallamano,pallanuoto);
 s=1;
 }
  else
  {
  var hobby=altrosport.value;
  var regexpsport = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/;

 //Controllo dello Sport Inserito

  if(!regexpsport.test(hobby))
  {
          altrosport.style.backgroundColor="#FC9494";
	      alert("Attenzione! Il campo Sport non è corretto!");
	      return false;
  }

 }

 if(calcio5.style.backgroundColor=="" && calcio7.style.backgroundColor==""  && calcio8.style.backgroundColor==""  && calcio11.style.backgroundColor==""  && hockey.style.backgroundColor==""  && golf.style.backgroundColor==""  && artimarziali.style.backgroundColor==""  && basket.style.backgroundColor==""  && tennis.style.backgroundColor==""  && piscina.style.backgroundColor==""  && atletica.style.backgroundColor==""  && ginnastica.style.backgroundColor==""  &&
    pallavolo.style.backgroundColor==""  &&  rugby.style.backgroundColor==""  && fitness.style.backgroundColor==""  && pugilato.style.backgroundColor==""  && danza.style.backgroundColor==""  && pallamano.style.backgroundColor==""  && pallanuoto.style.backgroundColor=="" && altrosport.value=="" )
    {alert ("Seleziona uno sport!");
    return false; }

    //Controllo Data
    var datac=new Date();
    var giornoc=datac.getDate();
    var mesec=datac.getMonth()+1;
    var annoc=datac.getFullYear();
    var corrente= giornoc+'/'+mesec+'/'+annoc;
    var regexpdatenum=/^\d{8}$/;
    var data=document.getElementById("date-from");
    var stringa_data=data.value;
    var spazio=/\s/;

    if(data.value=="")
	{
     data.style.backgroundColor="#FC9494";
	 alert("Attenzione! La data di prenotazione è obbligatoria.");
	 return false;
	}

    var conta=0;
    for(var i=0;i<stringa_data.length;i++)
    {
     if(stringa_data[i]=='/')
     conta++;
    }

    if(!regexpdatenum.test(stringa_data))
    {
	 if(spazio.test(stringa_data))
	 {
	  data.style.backgroundColor="#FC9494";
	  alert("Attenzione! Non sono ammessi gli spazi.");
	  return false;
	 }
      if(conta!=2 || stringa_data.length<10)
      {
       data.style.backgroundColor="#FC9494";
	   alert("Attenzione! La data inserita non è corretta.");
	   return false;
      }
    }
     if(stringa_data.slice(6)!=2015)
     {
       data.style.backgroundColor="#FC9494";
	   alert("Attenzione! La prenotazione è ammessa solo per l'anno corrente.");
	   return false;
     }
      //Controllo Data(Giorno-Mese)
      var giorno=stringa_data.slice(0,2);
      var mese=stringa_data.slice(3,5);
      var anno=stringa_data.slice(6);
      var mesetemp=0;

      if(mese<10)
      {
       mesetemp=mese.substr(1,1);
       if(giorno<giornoc && mesetemp==mesec && anno==annoc)
       {
        data.style.backgroundColor="#FC9494";
	    alert("Attenzione! Non è possibile prenotare ad una data precedente a quella odierna!");
	    return false;
       }
        if(mesetemp<mesec && anno==annoc)
        {
         data.style.backgroundColor="#FC9494";
	     alert("Attenzione! Non è possibile prenotare ad una data precedente a quella odierna!");
	     return false;
        }
         if(anno<annoc)
         {
          data.style.backgroundColor="#FC9494";
	      alert("Attenzione! Non è possibile prenotare ad una data precedente a quella odierna!");
	      return false;
         }
      }
      else
      {
       if(giorno<giornoc && mese==mesec && anno==annoc)
       {
        data.style.backgroundColor="#FC9494";
	    alert("Attenzione! Non è possibile prenotare ad una data precedente a quella odierna!");
	    return false;
       }
        if(mese<mesec && anno==annoc)
        {
         data.style.backgroundColor="#FC9494";
	     alert("Attenzione! Non è possibile prenotare ad una data precedente a quella odierna!");
	     return false;
        }
         if(anno<annoc)
         {
          data.style.backgroundColor="#FC9494";
	      alert("Attenzione! Non è possibile prenotare ad una data precedente a quella odierna!");
	      return false;
         }

      }

	  switch(mese)
	  {
	   case "01":
	   if(giorno<1 || giorno>31)
	   {
	    data.style.backgroundColor="#FC9494";
	    alert("Attenzione! Il giorno non è corretto");
		return false;
	   }
	    break;
		case "02":
		if(giorno<1 || giorno>29)
		{
		 data.style.backgroundColor="#FC9494";
	     alert("Attenzione! Il giorno non è corretto");
		 return false;
		}
		 break;
         case "03":
		 if(giorno<1 ||giorno>31)
		 {
		  data.style.backgroundColor="#FC9494";
	      alert("Attenzione! Il giorno non è corretto");
		  return false;
		 }
		 break;
         case "04":
		 if(giorno<1 || giorno>30)
		{
		 data.style.backgroundColor="#FC9494";
	     alert("Attenzione! Il giorno non è corretto");
		 return false;
		}
		 break;
         case "05":
		 if(giorno<1 || giorno>31)
		 {
		 data.style.backgroundColor="#FC9494";
	     alert("Attenzione! Il giorno non è corretto");
		 return false;
		 }
		  break;
		  case "06":
		  if(giorno<1 || giorno>30)
		  {
		   data.style.backgroundColor="#FC9494";
	       alert("Attenzione! Il giorno non è corretto");
		   return false;
		  }
		   break;
           case "07":
		   if(giorno<1 || giorno>31)
		   {
		    data.style.backgroundColor="#FC9494";
	        alert("Attenzione! Il giorno non è corretto");
		    return false;
		   }
		    break;
            case "08":
		    if(giorno<1 || giorno>31)
		    {
		     data.style.backgroundColor="#FC9494";
	         alert("Attenzione! Il giorno non è corretto");
		     return false;
		    }
		     break;
             case "09":
		    if(giorno<1 || giorno>30)
		    {
		     data.style.backgroundColor="#FC9494";
	         alert("Attenzione! Il giorno non è corretto");
		     return false;
		    }
		     break;
             case "10":
		     if(giorno<1 || giorno>31)
		     {
		      data.style.backgroundColor="#FC9494";
	          alert("Attenzione! Il giorno non è corretto");
		      return false;
		     }
		      break;
              case "11":
		      if(giorno<1 || giorno>30)
		      {
		       data.style.backgroundColor="#FC9494";
	           alert("Attenzione! Il giorno non è corretto");
		       return false;
		      }
		       break;
               case "12":
		       if(giorno<1 || giorno>31)
               {
		        data.style.backgroundColor="#FC9494";
	            alert("Attenzione! Il giorno non è corretto");
		        return false;
		       }
		        break;
	}


    if(giorno=="29" && mese=="02")
	{
     if(!((anno% 4 == 0 && anno % 100 != 0) || anno % 400 == 0))
     {
      data.style.backgroundColor="#FC9494";
	  alert("Attenzione! L'Anno non è bisestile");
	  return false;
     }
	}

     //Controllo Ora Prenotazione
     var ora=datac.getHours();
     var orai=document.getElementById("inizio_ora");
     var oraf=document.getElementById("fine_ora");
     if(orai.value!=23)
     {
      if(orai.value<=ora && (giorno==giornoc && mese==mesec && anno==annoc))
     {
      if(orai.value!=00)
      {
      orai.style.backgroundColor="#FC9494";
	  alert("Attenzione! La prenotazione è valida dall'ora immediatamente successiva all'attuale.");
	  return false;
      }
     }
     }
     else
     {
      if(ora==orai.value && (giorno==giornoc && mese==mesec && anno==annoc) )
      {
      orai.style.backgroundColor="#FC9494";
	  alert("Attenzione! La prenotazione è valida dall'ora immediatamente successiva all'attuale.");
	  return false;
      }


     }
     if(orai.value.length==1)
     {
      orai.value="0"+orai.value;
     }
      if(oraf.value.length==1)
      {
       oraf.value="0"+oraf.value;
      }
       if(orai.value=="")
	   {
        orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è obbligatoria.");
	    return false;
	   }
        if(oraf.value=="")
	    {
         oraf.style.backgroundColor="#FC9494";
	     alert("Attenzione! L'ora di fine prenotazione è obbligatoria.");
	     return false;
	    }

       switch(orai.value)
       {
        case "00":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "01":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "02":
		orai.style.backgroundColor="#FC9494";
	   alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "03":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "04":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "05":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "06":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "07":
		orai.style.backgroundColor="#FC9494";
	   alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
      }
       switch(oraf.value)
       {
        case "01":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "02":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "03":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "04":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "05":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "06":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "07":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
      }
       if(orai.value<=0)
       {
        orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
       }
        if(orai.value>23)
       {
        orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
       }
        if(oraf.value<9 && oraf.value!=0)
        {
         oraf.style.backgroundColor="#FC9494";
	     alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		 return false;
        }
        if(oraf.value>23 && oraf.value!=0)
       {
        oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
       }

      if((oraf.value<orai.value) && oraf.value!="00")
     {
      oraf.style.backgroundColor="#FC9494";
	  alert("Attenzione! L'ora di fine prenotazione non è valida.");
	  return false;
     }
      if(orai.value==oraf.value)
      {
       oraf.style.backgroundColor="#FC9494";
	   alert("Attenzione! L'ora di inizio e fine prenotazione coincidono. ");
	   return false;
      }

       //Controllo Località Prenotazione
        var regexpdove = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27])+$/;
        var dove=document.getElementById("localita");
        var localita=dove.value;
        if(!regexpdove.test(localita))
        {
	     if(localita=="")
	     {
          dove.style.backgroundColor="#FC9494";
		  alert("Attenzione! Il campo Località è obbligatorio.");
		  return false;
	     }
	      if(spazio.test(localita))
	      {
		   dove.style.backgroundColor="#FC9494";
		   alert("Attenzione! Non sono ammessi gli spazi.");
		   return false;
	      }
            dove.style.backgroundColor="#FC9494";
	        alert("Attenzione! Il campo Località può contenere solo lettere.");
	        return false;
	     }
          if(s==1)
          {
           var esci=0;
           var i=0;
           var oggetto="";
           while(i<hobby.length && esci==0)
           {
            if(hobby[i].style.backgroundColor!="")
            {
             oggetto=hobby[i].name;
             esci=1;
            }
            i++;
           }
            document.location='Prenotazione.php?sport='+oggetto+'&data='+stringa_data+'&orainizio='+orai.value+'&oraf='+oraf.value+'&luogo='+localita;
          }
           if(s==0)
           document.location='Prenotazione.php?sport='+hobby+'&data='+stringa_data+'&orainizio='+orai.value+'&oraf='+oraf.value+'&luogo='+localita;
}

function checkazienda()
{
 //Controllo Selezione
 var calcio5=document.getElementById("campo");
 var calcio7=document.getElementById("calcio7");
 var calcio8=document.getElementById("calcio8");
 var calcio11=document.getElementById("calcio11");
 var hockey=document.getElementById("hockey");
 var golf=document.getElementById("golf");
 var artimarziali=document.getElementById("artimarziali");
 var basket=document.getElementById("basket");
 var tennis=document.getElementById("tennis");
 var piscina=document.getElementById("piscina");
 var atletica=document.getElementById("atletica");
 var ginnastica=document.getElementById("ginnastica");
 var pallavolo=document.getElementById("pallavolo");
 var rugby=document.getElementById("rugby");
 var fitness=document.getElementById("palestra");
 var pugilato=document.getElementById("boxe");
 var danza=document.getElementById("danza");
 var pallamano=document.getElementById("pallamano");
 var pallanuoto=document.getElementById("pallanuoto");
 var altrosport=document.getElementById("altro");
 s=0;
 if(altrosport.value=="")
 {
 var hobby=new Array(calcio5,calcio7,calcio8,calcio11,hockey,golf,artimarziali,basket,tennis,piscina,atletica,ginnastica,pallavolo,rugby,fitness,pugilato,danza,pallamano,pallanuoto);
 s=1;
 }
 else
  {
  var hobby=altrosport.value;
  var regexpsport = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/;

 //Controllo dello Sport Inserito

  if(!regexpsport.test(hobby))
  {
          altrosport.style.backgroundColor="#FC9494";
	      alert("Attenzione! Il campo Sport non è corretto!");
	      return false;
  }

 }

 if(calcio5.style.backgroundColor=="" && calcio7.style.backgroundColor==""  && calcio8.style.backgroundColor==""  && calcio11.style.backgroundColor==""  && hockey.style.backgroundColor==""  && golf.style.backgroundColor==""  && artimarziali.style.backgroundColor==""  && basket.style.backgroundColor==""  && tennis.style.backgroundColor==""  && piscina.style.backgroundColor==""  && atletica.style.backgroundColor==""  && ginnastica.style.backgroundColor==""  &&
    pallavolo.style.backgroundColor==""  &&  rugby.style.backgroundColor==""  && fitness.style.backgroundColor==""  && pugilato.style.backgroundColor==""  && danza.style.backgroundColor==""  && pallamano.style.backgroundColor==""  && pallanuoto.style.backgroundColor=="" && altrosport.value=="" )
    {alert ("Seleziona uno sport!");
    return false; }

    //Controllo Data Inizio
    var datac=new Date();
    var giornoc=datac.getDate();
    var mesec=datac.getMonth()+1;
    var annoc=datac.getFullYear();
    var corrente= giornoc+'/'+mesec+'/'+annoc;
    var regexpdatenum=/^\d{8}$/;
    var data=document.getElementById("date-from");
    var stringa_data=data.value;
    var spazio=/\s/;

    if(data.value=="")
	{
     data.style.backgroundColor="#FC9494";
	 alert("Attenzione! La data di inzio disponibilità è obbligatoria.");
	 return false;
	}

    var conta=0;
    for(var i=0;i<stringa_data.length;i++)
    {
     if(stringa_data[i]=='/')
     conta++;
    }

    if(!regexpdatenum.test(stringa_data))
    {
	 if(spazio.test(stringa_data))
	 {
	  data.style.backgroundColor="#FC9494";
	  alert("Attenzione! Non sono ammessi gli spazi.");
	  return false;
	 }
      if(conta!=2 || stringa_data.length<10)
      {
       data.style.backgroundColor="#FC9494";
	   alert("Attenzione! La data inserita non è corretta.");
	   return false;
      }
    }
     if(stringa_data.slice(6)!=2013)
     {
       data.style.backgroundColor="#FC9494";
	   alert("Attenzione! La data di inzio disponibilità è ammessa solo per l'anno corrente.");
	   return false;
     }
      //Controllo Data(Giorno-Mese)
      var giorno=stringa_data.slice(0,2);
      var mese=stringa_data.slice(3,5);
      var anno=stringa_data.slice(6);
      var mesetemp=0;

      if(mese<10)
      {
       mesetemp=mese.substr(1,1);
       if(giorno<giornoc && mesetemp==mesec && anno==annoc)
       {
        data.style.backgroundColor="#FC9494";
	    alert("Attenzione! La data di inzio disponibilità è precedente alla data odierna!");
	    return false;
       }
        if(mesetemp<mesec && anno==annoc)
        {
         data.style.backgroundColor="#FC9494";
	     alert("Attenzione!  La data di inzio disponibilità è precedente alla data odierna!");
	     return false;
        }
         if(anno<annoc)
         {
          data.style.backgroundColor="#FC9494";
	      alert("Attenzione!  La data di inzio disponibilità è precedente alla data odierna!");
	      return false;
         }
      }
      else
      {
       if(giorno<giornoc && mese==mesec && anno==annoc)
       {
        data.style.backgroundColor="#FC9494";
	    alert("Attenzione!La data di inzio disponibilità è precedente alla data odierna!");
	    return false;
       }
        if(mese<mesec && anno==annoc)
        {
         data.style.backgroundColor="#FC9494";
	     alert("Attenzione!La data di inzio disponibilità è precedente alla data odierna!");
	     return false;
        }
         if(anno<annoc)
         {
          data.style.backgroundColor="#FC9494";
	      alert("Attenzione! La data di inzio disponibilità è precedente alla data odierna!");
	      return false;
         }

      }

	  switch(mese)
	  {
	   case "01":
	   if(giorno<1 || giorno>31)
	   {
	    data.style.backgroundColor="#FC9494";
	    alert("Attenzione! Il giorno non è corretto");
		return false;
	   }
	    break;
		case "02":
		if(giorno<1 || giorno>29)
		{
		 data.style.backgroundColor="#FC9494";
	     alert("Attenzione! Il giorno non è corretto");
		 return false;
		}
		 break;
         case "03":
		 if(giorno<1 ||giorno>31)
		 {
		  data.style.backgroundColor="#FC9494";
	      alert("Attenzione! Il giorno non è corretto");
		  return false;
		 }
		 break;
         case "04":
		 if(giorno<1 || giorno>30)
		{
		 data.style.backgroundColor="#FC9494";
	     alert("Attenzione! Il giorno non è corretto");
		 return false;
		}
		 break;
         case "05":
		 if(giorno<1 || giorno>31)
		 {
		 data.style.backgroundColor="#FC9494";
	     alert("Attenzione! Il giorno non è corretto");
		 return false;
		 }
		  break;
		  case "06":
		  if(giorno<1 || giorno>30)
		  {
		   data.style.backgroundColor="#FC9494";
	       alert("Attenzione! Il giorno non è corretto");
		   return false;
		  }
		   break;
           case "07":
		   if(giorno<1 || giorno>31)
		   {
		    data.style.backgroundColor="#FC9494";
	        alert("Attenzione! Il giorno non è corretto");
		    return false;
		   }
		    break;
            case "08":
		    if(giorno<1 || giorno>31)
		    {
		     data.style.backgroundColor="#FC9494";
	         alert("Attenzione! Il giorno non è corretto");
		     return false;
		    }
		     break;
             case "09":
		    if(giorno<1 || giorno>30)
		    {
		     data.style.backgroundColor="#FC9494";
	         alert("Attenzione! Il giorno non è corretto");
		     return false;
		    }
		     break;
             case "10":
		     if(giorno<1 || giorno>31)
		     {
		      data.style.backgroundColor="#FC9494";
	          alert("Attenzione! Il giorno non è corretto");
		      return false;
		     }
		      break;
              case "11":
		      if(giorno<1 || giorno>30)
		      {
		       data.style.backgroundColor="#FC9494";
	           alert("Attenzione! Il giorno non è corretto");
		       return false;
		      }
		       break;
               case "12":
		       if(giorno<1 || giorno>31)
               {
		        data.style.backgroundColor="#FC9494";
	            alert("Attenzione! Il giorno non è corretto");
		        return false;
		       }
		        break;
	}


    if(giorno=="29" && mese=="02")
	{
     if(!((anno% 4 == 0 && anno % 100 != 0) || anno % 400 == 0))
     {
      data.style.backgroundColor="#FC9494";
	  alert("Attenzione! L'Anno non è bisestile");
	  return false;
     }
	}
     //Controllo Data-Fine
    var regexpdatenumf=/^\d{8}$/;
    var dataf=document.getElementById("dateexpired-from");
    var stringa_dataf=dataf.value;
    var spaziof=/\s/;

    if(dataf.value=="")
	{
     dataf.style.backgroundColor="#FC9494";
	 alert("Attenzione! La data di fine disponibilità è obbligatoria.");
	 return false;
	}

    var contaf=0;
    for(var i=0;i<stringa_dataf.length;i++)
    {
     if(stringa_data[i]=='/')
     contaf++;
    }

    if(!regexpdatenumf.test(stringa_dataf))
    {
	 if(spaziof.test(stringa_dataf))
	 {
	  dataf.style.backgroundColor="#FC9494";
	  alert("Attenzione! Non sono ammessi gli spazi.");
	  return false;
	 }
      if(contaf!=2 || stringa_dataf.length<10)
      {
       dataf.style.backgroundColor="#FC9494";
	   alert("Attenzione! La data inserita non è corretta.");
	   return false;
      }
    }
     if(stringa_dataf.slice(6)!=2013)
     {
       dataf.style.backgroundColor="#FC9494";
	   alert("Attenzione! La data di fine disponibilità è ammessa solo per l'anno corrente.");
	   return false;
     }
      //Controllo Data(Giorno-Mese)
      var giornof=stringa_dataf.slice(0,2);
      var mesef=stringa_dataf.slice(3,5);
      var annof=stringa_dataf.slice(6);
      var mesetemp=0;

      if(mese<10)
      {
       mesetemp=mesef.substr(1,1);
       if(giornof<giornoc && mesetemp==mesec && annof==annoc)
       {
        dataf.style.backgroundColor="#FC9494";
	    alert("Attenzione! La data di fine disponibilità è precedente alla data odierna!");
	    return false;
       }
        if(mesetemp<mesec && annof==annoc)
        {
         dataf.style.backgroundColor="#FC9494";
	     alert("Attenzione! La data di fine disponibilità è precedente alla data odierna!");
	     return false;
        }
         if(annof<annoc)
         {
          dataf.style.backgroundColor="#FC9494";
	      alert("Attenzione! La data di fine disponibilità è precedente alla data odierna!");
	      return false;
         }
      }
      else
      {
       if(giornof<giornoc && mesef==mesec && annof==annoc)
       {
        dataf.style.backgroundColor="#FC9494";
	    alert("Attenzione! La data di fine disponibilità è precedente alla data odierna!");
	    return false;
       }
        if(mesef<mesec && annof==annoc)
        {
         dataf.style.backgroundColor="#FC9494";
	     alert("Attenzione! La data di fine disponibilità è precedente alla data odierna!");
	     return false;
        }
         if(annof<annoc)
         {
          data.style.backgroundColor="#FC9494";
	      alert("Attenzione! La data di fine disponibilità è precedente alla data odierna!");
	      return false;
         }

      }
	  switch(mesef)
	  {
	   case "01":
	   if(giornof<1 || giornof>31)
	   {
	    dataf.style.backgroundColor="#FC9494";
	    alert("Attenzione! Il giorno non è corretto");
		return false;
	   }
	    break;
		case "02":
		if(giornof<1 || giornof>29)
		{
		 dataf.style.backgroundColor="#FC9494";
	     alert("Attenzione! Il giorno non è corretto");
		 return false;
		}
		 break;
         case "03":
		 if(giornof<1 ||giornof>31)
		 {
		  dataf.style.backgroundColor="#FC9494";
	      alert("Attenzione! Il giorno non è corretto");
		  return false;
		 }
		 break;
         case "04":
		 if(giornof<1 || giornof>30)
		{
		 dataf.style.backgroundColor="#FC9494";
	     alert("Attenzione! Il giorno non è corretto");
		 return false;
		}
		 break;
         case "05":
		 if(giornof<1 || giornof>31)
		 {
		 dataf.style.backgroundColor="#FC9494";
	     alert("Attenzione! Il giorno non è corretto");
		 return false;
		 }
		  break;
		  case "06":
		  if(giornof<1 || giornof>30)
		  {
		   dataf.style.backgroundColor="#FC9494";
	       alert("Attenzione! Il giorno non è corretto");
		   return false;
		  }
		   break;
           case "07":
		   if(giornof<1 || giornof>31)
		   {
		    dataf.style.backgroundColor="#FC9494";
	        alert("Attenzione! Il giorno non è corretto");
		    return false;
		   }
		    break;
            case "08":
		    if(giornof<1 || giornof>31)
		    {
		     dataf.style.backgroundColor="#FC9494";
	         alert("Attenzione! Il giorno non è corretto");
		     return false;
		    }
		     break;
             case "09":
		    if(giornof<1 || giornof>30)
		    {
		     dataf.style.backgroundColor="#FC9494";
	         alert("Attenzione! Il giorno non è corretto");
		     return false;
		    }
		     break;
             case "10":
		     if(giornof<1 || giornof>31)
		     {
		      dataf.style.backgroundColor="#FC9494";
	          alert("Attenzione! Il giorno non è corretto");
		      return false;
		     }
		      break;
              case "11":
		      if(giornof<1 || giornof>30)
		      {
		       dataf.style.backgroundColor="#FC9494";
	           alert("Attenzione! Il giorno non è corretto");
		       return false;
		      }
		       break;
               case "12":
		       if(giornof<1 || giornof>31)
               {
		        dataf.style.backgroundColor="#FC9494";
	            alert("Attenzione! Il giorno non è corretto");
		        return false;
		       }
		        break;
	}


    if(giornof=="29" && mesef=="02")
	{
     if(!((annof% 4 == 0 && annof % 100 != 0) || annof % 400 == 0))
     {
      dataf.style.backgroundColor="#FC9494";
	  alert("Attenzione! L'Anno non è bisestile");
	  return false;
     }
	}
     //Controllo Incrociato
     if(giornof<giorno && mesef==mese && annof==anno)
       {
        dataf.style.backgroundColor="#FC9494";
	    alert("Attenzione! La data di fine disponibilità precede la data di inzio!");
	    return false;
       }
        if(mesef<mese && annof==anno)
        {
         dataf.style.backgroundColor="#FC9494";
	     alert("Attenzione! La data di fine disponibilità precede la data di inzio!");
	     return false;
        }
         if(annof<anno)
         {
          dataf.style.backgroundColor="#FC9494";
	      alert("Attenzione! La data di fine disponibilità precede la data di inzio!");
	      return false;
         }







     //Controllo Ora Prenotazione
     var orai=document.getElementById("inizio_ora");
     var oraf=document.getElementById("fine_ora");
     var ora=datac.getHours();

     if(orai.value!=23)
     {
      if(orai.value<=ora && (giorno==giornoc && mese==mesec && anno==annoc))
     {
      if(orai.value!=00)
      {
      orai.style.backgroundColor="#FC9494";
	  alert("Attenzione! La prenotazione è valida dall'ora immediatamente successiva all'attuale.");
	  return false;
      }
     }
     }
     else
     {
      if(ora==orai.value && (giorno==giornoc && mese==mesec && anno==annoc) )
      {
      orai.style.backgroundColor="#FC9494";
	  alert("Attenzione! La prenotazione è valida dall'ora immediatamente successiva all'attuale.");
	  return false;
      }
    }

















     if(orai.value.length==1)
     {
      orai.value="0"+orai.value;
     }
      if(oraf.value.length==1)
      {
       oraf.value="0"+oraf.value;
      }
       if(orai.value=="")
	   {
        orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è obbligatoria.");
	    return false;
	   }
        if(oraf.value=="")
	    {
         oraf.style.backgroundColor="#FC9494";
	     alert("Attenzione! L'ora di fine prenotazione è obbligatoria.");
	     return false;
	    }

       switch(orai.value)
       {
        case "00":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "01":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "02":
		orai.style.backgroundColor="#FC9494";
	   alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "03":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "04":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "05":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "06":
		orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
        case "07":
		orai.style.backgroundColor="#FC9494";
	   alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
        break;
      }
       switch(oraf.value)
       {
        case "01":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "02":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "03":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "04":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "05":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "06":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
        case "07":
		oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
        break;
      }
       if(orai.value<=0)
       {
        orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
       }
        if(orai.value>23)
       {
        orai.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di inizio prenotazione è valida dalle ore 08 alle ore 23");
		return false;
       }
        if(oraf.value<9 && oraf.value!=0)
        {
         oraf.style.backgroundColor="#FC9494";
	     alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		 return false;
        }
        if(oraf.value>23 && oraf.value!=0)
       {
        oraf.style.backgroundColor="#FC9494";
	    alert("Attenzione! L'ora di fine prenotazione è valida dalle ore 09 alle ore 00");
		return false;
       }

      if((oraf.value<orai.value) && oraf.value!="00")
     {
      oraf.style.backgroundColor="#FC9494";
	  alert("Attenzione! L'ora di fine prenotazione non è valida.");
	  return false;
     }
      if(orai.value==oraf.value)
      {
       oraf.style.backgroundColor="#FC9494";
	   alert("Attenzione! L'ora di inizio e fine prenotazione coincidono. ");
	   return false;
      }

          if(s==1)
          {
           var esci=0;
           var i=0;
           var oggetto="";
           while(i<hobby.length && esci==0)
           {
            if(hobby[i].style.backgroundColor!="")
            {
             oggetto=hobby[i].name;
             esci=1;
            }
            i++;
           }
            document.location='Prenotazione.php?sport='+oggetto+'&data='+stringa_data+'&datafinale='+stringa_dataf+'&orainizio='+orai.value+'&oraf='+oraf.value;
          }
           if(s==0)
           document.location='Prenotazione.php?sport='+hobby+'&data='+stringa_data+'&datafinale='+stringa_dataf+'&orainizio='+orai.value+'&oraf='+oraf.value;
}
function cambiabianco()
{
 var data=document.getElementById("date-from");
 if(data)
 {
 if(data.style.backgroundColor!="")
 data.style.backgroundColor="";
 }
 var dataf=document.getElementById("dateexpired-from");
 if(dataf)
 {
 if(dataf.style.backgroundColor!="")
 dataf.style.backgroundColor="";
 }

 var oraf=document.getElementById("fine_ora");
 if(oraf)
 {
 if(oraf.style.backgroundColor!="")
 oraf.style.backgroundColor="";
 }
 var orai=document.getElementById("inizio_ora");
 if(orai)
 {
 if(orai.style.backgroundColor!="")
 orai.style.backgroundColor="";
 }
 var dove=document.getElementById("localita");
 if(dove)
 {
 if(dove.style.backgroundColor!="")
 dove.style.backgroundColor="";
 }

 var altrosport=document.getElementById("altro");
 if(altrosport)
 {
 if(altrosport.style.backgroundColor!="")
 altrosport.style.backgroundColor="";
 }
 var costo=document.getElementById("importo");
 if(costo)
 {
 if(costo.style.backgroundColor!="")
 costo.style.backgroundColor="";
 }
  var nome=document.getElementById("nomeesterno");
  if(nome)
 {
 if(nome.style.backgroundColor!="")
 nome.style.backgroundColor="";
 }
 var cognome=document.getElementById("cognomeesterno");
  if(cognome)
 {
 if(cognome.style.backgroundColor!="")
 cognome.style.backgroundColor="";
 }
  var telefono=document.getElementById("telefonoesterno");
  if(telefono)
 {
 if(telefono.style.backgroundColor!="")
 telefono.style.backgroundColor="";
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

function controllo()
{
 var regexpcosto=/^\d+$/;
 var spazio=/\s/;
 var costo=document.getElementById("importo");
 var stringa_costo=costo.value;

 if(!regexpcosto.test(stringa_costo))
 {
  if(stringa_costo=="")
  {
    costo.style.backgroundColor="#FC9494";
    alert("Attenzione! Il costo di prenotazione struttura è obbligatorio.");
    return false;
  }

  if(spazio.test(stringa_costo))
  {
   costo.style.backgroundColor="#FC9494";
   alert("Attenzione! Non sono ammessi gli spazi.");
   return false;
  }
   costo.style.backgroundColor="#FC9494";
   alert("Attenzione! Il costo inserito non è valido.");
   return false;
 }

document.location='Prenotazione.php?price='+stringa_costo;
}

function controlloazienda()
{




 //--------------- Controllo Utente Esterno ---------------
 var regexpnome = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]{4,})+$/;
 var space=/\s+/;

 //Controllo del Nome Utente Esterno
 var nome=document.getElementById("nomeesterno");
 var stringa=nome.value;

  if(!regexpnome.test(stringa))
  {
	 if(stringa=="")
	 {
    nome.style.backgroundColor="#FC9494";
		alert("Attenzione! Il campo Nome è obbligatorio.");
		return false;
	 }
	  if(space.test(stringa))
	  {
		 nome.style.backgroundColor="#FC9494";
		 alert("Attenzione! Non sono ammessi gli spazi.");
		 return false;
	  }
		 if(stringa.length<4)
		 {
		  nome.style.backgroundColor="#FC9494";
	    alert("Attenzione! Il campo Nome deve essere composto da almeno quattro caratteri.");
	    return false;
		 }
     nome.style.backgroundColor="#FC9494";
	   alert("Attenzione! Il campo Nome può contenere solo lettere.");
	   return false;
	}


	  //Controllo del Cognome Utente Esterno
    var cognome=document.getElementById("cognomeesterno");
    var stringa_cognome=cognome.value;
		var regexpcognome = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]{3,})+$/;

    if(!regexpcognome.test(stringa_cognome))
    {
		 if(stringa_cognome=="")
		 {
		  cognome.style.backgroundColor="#FC9494";
		  alert("Attenzione! Il campo Cognome è obbligatorio.");
			return false;
		 }
		  if(space.test(stringa_cognome))
	    {
		   cognome.style.backgroundColor="#FC9494";
		   alert("Attenzione! Non sono ammessi gli spazi.");
		   return false;
	    }
			 if(stringa_cognome.length<3)
		   {
		    cognome.style.backgroundColor="#FC9494";
	      alert("Attenzione! Il campo Cognome deve essere composto da almeno tre caratteri.");
	      return false;
		   }
        cognome.style.backgroundColor="#FC9494";
	      alert("Attenzione! Il campo Cognome può contenere solo lettere.");
	      return false;

    }
     //Controllo Telefono Utente Esterno
      var regexpcel=/^\d{8,10}$/;
			  var cellulare=document.getElementById("telefonoesterno");
        var stringa_cellulare=cellulare.value;

        if(!regexpcel.test(stringa_cellulare))
        {
			   if(stringa_cellulare=="")
		     {
		      cellulare.style.backgroundColor="#FC9494";
		      alert("Attenzione! Il numero di Telefono è obbligatorio.");
			    return false;
		     }
				  if(space.test(stringa_cellulare))
	       {
		      cellulare.style.backgroundColor="#FC9494";
		      alert("Attenzione! Non sono ammessi gli spazi.");
		      return false;
	       }
				  if(stringa_cellulare.length<8)
		 		  {
		  		 cellulare.style.backgroundColor="#FC9494";
	    		 alert("Attenzione! Il campo Telefono deve essere composto da otto cifre.");
	    		 return false;
		 		  }
         cellulare.style.backgroundColor="#FC9494";
	       alert("Attenzione! Il numero di telefono non è corretto.");
	       return false;
        }

document.location='Prenotazione.php?nomeesterno='+stringa+'&cognomeesterno='+stringa_cognome+'&telefonoesterno='+stringa_cellulare;
}

function aggiornaprenotazione()
{
 if( (richiesta.readyState==4) && (richiesta.status==200) )
 {
  document.body.innerHTML=richiesta.responseText;
 }
}

function ordinaprenotazione(stringa,passato)
{
 if(stringa=="etis")
 {   //alert("crescente sport");
  if(etis==0)
  {
   richiesta= new XMLHttpRequest();
   richiesta.open("GET","Elabora.php?oggetto=sportpren"+"&id="+1,true);
   richiesta.onreadystatechange=aggiornaprenotazione;
   richiesta.send(null);
   return 1;
  }
  else
  {
   richiesta= new XMLHttpRequest();
   richiesta.open("GET","Elabora.php?oggetto=sportpren"+"&id="+0,true);
   richiesta.onreadystatechange=aggiornaprenotazione;
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
  richiesta.open("GET","Elabora.php?oggetto=dataipren"+"&id="+1,true);
  richiesta.onreadystatechange=aggiornaprenotazione;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=dataipren"+"&id="+0,true);
  richiesta.onreadystatechange=aggiornaprenotazione;
  richiesta.send(null);
  return 0;
 }
 }

  if(stringa=="etioi")
 {     //  alert("crescente ora");
  if(etioi==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=oraipren"+"&id="+1,true);
  richiesta.onreadystatechange=aggiornaprenotazione;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=oraipren"+"&id="+0,true);
  richiesta.onreadystatechange=aggiornaprenotazione;
  richiesta.send(null);
  return 0;
 }
 }
   if(stringa=="etics")
 {     //  alert("crescente costo");
  if(etics==0)
  {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=costopren"+"&id="+1,true);
  richiesta.onreadystatechange=aggiornaprenotazione;
  richiesta.send(null);
  return 1;
 }
 else
 {
  richiesta= new XMLHttpRequest();
  richiesta.open("GET","Elabora.php?oggetto=costopren"+"&id="+0,true);
  richiesta.onreadystatechange=aggiornaprenotazione;
  richiesta.send(null);
  return 0;
 }
 }

}

function chiediconfermaprenotazione(oggetto)
{
 var els = oggetto.getElementsByTagName("td");

 var ask=confirm("Si desidera prenotare l'impianto selezionato?")
 if(ask==true)
 document.location='Riepilogo_Prenotazione.php?sport='+els[1].innerHTML+'&ragsociale='+els[2].innerHTML+'&citta='+els[3].innerHTML+'&data='+els[4].innerHTML+'&orai='+els[5].innerHTML+'&oraf='+els[6].innerHTML+'&costo='+els[7].innerHTML;
}

