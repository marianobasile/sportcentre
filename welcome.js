function set()
{
 if(document.register.day.value==null || document.register.day.value=="")
 {
  document.register.day.style.color="grey";
  document.register.day.value="Giorno";
	document.register.day.blur();
 }
  if(document.register.year.value==null || document.register.year.value=="")
	{
 	 document.register.year.style.color="grey";
   document.register.year.value="Anno";
	 document.register.year.blur();
	}

}

function azzera(nome,f)
{
  if(f==0)
 {
  day=nome;
	if(document.register.day.value=="Giorno")
	{
  document.register.day.value="";
	document.register.day.style.color="black";
	}
 }
  else
  {
   year=nome;
	 if(document.register.year.value=="Anno")
	 {
    document.register.year.value="";
	  document.register.year.style.color="black";
	 }
	}
}

function check()
{
 //Controllo Username
	var regexpusername=/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	var username=document.getElementById("username");
  var stringa_username=username.value;
	var space=/\s+/;

  if(!regexpusername.test(stringa_username))
  {
	 if(stringa_username=="")
	 {
		username.style.backgroundColor="#FC9494";
		alert("Attenzione! L'indirizzo E-mail è obbligatorio.");
		return false;
	 }
	  if(space.test(stringa_username))
	  {
		 username.style.backgroundColor="#FC9494";
		 alert("Attenzione! Non sono ammessi gli spazi.");
		 return false;
	  }
     username.style.backgroundColor="#FC9494";
	   alert("Attenzione! L'indirizzo E-mail non è corretto.");
	   return false;
  }
   //Controllo Password
	 var regexpsw=/^[a-zA-Z0-9\_\*\-\+\!\?\,\:\;\.\xE0\xE8\xE9\xF9\xF2\xEC\x27]{1,20}/;
	 var psw=document.getElementById("psw");
   var stringa_psw=psw.value;

   if(!regexpsw.test(stringa_psw))
   {
		if(stringa_psw=="")
		{
		 psw.style.backgroundColor="#FC9494";
		 alert("Attenzione! La Password è obbligatoria.");
		 return false;
		}
     psw.style.backgroundColor="#FC9494";
	   alert("Attenzione! La Password inserita non è corretta.");
	   return false;
   }
}

function assegna()
{
  var nascosto=document.getElementById('scelta');
  var utente=document.getElementById('userreg');
  var azienda=document.getElementById('factoryreg');

  var firefox=/[Firefox]/;
  if(firefox.test(navigator.userAgent))
  {
    //alert("entromozilla");
   if(azienda.style.backgroundColor=="" || azienda.style.backgroundColor=="grey" || azienda.style.backgroundColor=="rgb(128, 128, 128)")
    nascosto.value="Utenti";
    else
    nascosto.value="Aziende";
    //alert(nascosto.value);
    //alert(nascosto.value);
    return;
    }
}

function modifica(identifica,f)
{
 var cambio=document.getElementById("changes");
 var profilo=document.getElementById("profile");
 var registra=document.getElementById("registra");

  if(f==0)
  {
	 //------ Modifica Background Bottone ------
   user=identifica;
   document.register.user.style.backgroundColor="#5679B6";
	 document.register.factory.style.backgroundColor="grey";

	 var rimuovi=document.getElementById("nuovodiv_a");
	 if(rimuovi)
	 {
	  while (rimuovi.firstChild)
    {
     rimuovi.removeChild(rimuovi.firstChild);
    }
		profilo.removeChild(rimuovi);

	  var newdiv=document.createElement("div");
	  newdiv.setAttribute("id","nuovodiv");

	  var ul=document.createElement("ul");
	  var li=document.createElement("li");

	  profilo.appendChild(newdiv);
	  newdiv.appendChild(ul);
	  ul.appendChild(li);
	  var p=document.createElement("p");
	  p.setAttribute("class","chartext");
	  li.appendChild(p);
	  var label=document.createElement("label");
	  p.appendChild(label);
	  label.setAttribute("class","etichetteright");
	  label.setAttribute("for","nome");
	  label.innerHTML="Nome";
	  var input=document.createElement("input");
	  input.setAttribute("type","text");
	  input.setAttribute("class","campiright");
	  input.setAttribute("id","nome");
	  input.setAttribute("name","nome");
	  input.setAttribute("tabindex","1");
	  input.setAttribute("maxlength","15");
	  input.setAttribute("size","50");
		input.setAttribute("onClick","improve()");
        input.setAttribute("onSelect","improve()");
	  label.appendChild(input);

	  var li1=document.createElement("li");
	  ul.appendChild(li1);
	  var p1=document.createElement("p");
	  p1.setAttribute("class","chartext");
	  li1.appendChild(p1);
	  var label1=document.createElement("label");
	  p1.appendChild(label1);
    label1.setAttribute("class","etichetteright");
	  label1.setAttribute("for","cognome");
	  label1.innerHTML="Cognome";
	  var input1=document.createElement("input");
	  input1.setAttribute("type","text");
    input1.setAttribute("class","campiright");
	  input1.setAttribute("id","cognome");
	  input1.setAttribute("name","cognome");
	  input1.setAttribute("tabindex","2");
	  input1.setAttribute("maxlength","25");
	  input1.setAttribute("size","50");
		input1.setAttribute("onClick","improve()");
        input1.setAttribute("onSelect","improve()");
	  label1.appendChild(input1);

	  var li2=document.createElement("li");
	  ul.appendChild(li2);
	  var p2=document.createElement("p");
	  p2.setAttribute("class","chartext");
	  li2.appendChild(p2);
	  var label2=document.createElement("label");
	  p2.appendChild(label2);
    label2.setAttribute("class","etichetteright");
	  label2.setAttribute("for","email");
	  label2.innerHTML="Indirizzo e-mail";
	  var input2=document.createElement("input");
	  input2.setAttribute("type","text");
    input2.setAttribute("class","campiright");
	  input2.setAttribute("id","email");
	  input2.setAttribute("name","email");
	  input2.setAttribute("tabindex","3");
	  input2.setAttribute("maxlength","30");
	  input2.setAttribute("size","50");
		input2.setAttribute("onClick","improve()");
        input2.setAttribute("onSelect","improve()");
	  label2.appendChild(input2);

	  var li3=document.createElement("li");
	  ul.appendChild(li3);
	  var p3=document.createElement("p");
	  p3.setAttribute("class","chartext");
	  li3.appendChild(p3);
	  var label3=document.createElement("label");
	  p3.appendChild(label3);
    label3.setAttribute("class","etichetteright");
	  label3.setAttribute("for","password");
	  label3.innerHTML="Password";
	  var input3=document.createElement("input");
	  input3.setAttribute("type","password");
    input3.setAttribute("class","campiright");
	  input3.setAttribute("id","password");
	  input3.setAttribute("name","password");
	  input3.setAttribute("tabindex","4");
	  input3.setAttribute("maxlength","25");
	  input3.setAttribute("size","50");
		input3.setAttribute("onClick","improve()");
        input3.setAttribute("onSelect","improve()");
	  label3.appendChild(input3);

	  var li4=document.createElement("li");
	  ul.appendChild(li4);
	  var p4=document.createElement("p");
	  p4.setAttribute("class","chartext");
	  li4.appendChild(p4);
	  var label4=document.createElement("label");
	  p4.appendChild(label4);
    label4.setAttribute("class","etichetteright");
	  label4.setAttribute("for","cellulare");
	  label4.innerHTML="Telefono";
	  var input4=document.createElement("input");
	  input4.setAttribute("type","text");
    input4.setAttribute("class","campiright");
	  input4.setAttribute("id","cellulare");
	  input4.setAttribute("name","cellulare");
	  input4.setAttribute("tabindex","5");
	  input4.setAttribute("maxlength","10");
	  input4.setAttribute("size","50");
		input4.setAttribute("onClick","improve()");
        input4.setAttribute("onSelect","improve()");
	  label4.appendChild(input4);

	  var li5=document.createElement("li");
	  ul.appendChild(li5);
	  var p5=document.createElement("p");
	  p5.setAttribute("class","chartext");
	  li5.appendChild(p5);
	  var label5=document.createElement("label");
	  p5.appendChild(label5);
    label5.setAttribute("id","etichettadata");
	  label5.setAttribute("for","data_birth_dmod");
	  label5.innerHTML="Data di Nascita";
	  var input5=document.createElement("input");
	  input5.setAttribute("type","text");
    input5.setAttribute("class","campiright");
	  input5.setAttribute("id","data_birth_dmod");
	  input5.setAttribute("name","day");
	  input5.setAttribute("tabindex","6");
	  input5.setAttribute("maxlength","2");
	  input5.setAttribute("size","5");
		input5.setAttribute("value","Giorno");
		input5.setAttribute("onClick","azzera(this.name,0);improve();");
        input5.setAttribute("onSelect","improve()");
		input5.setAttribute("onMouseOut","set()");
	  label5.appendChild(input5);


      var li6=document.createElement("li");
	  ul.appendChild(li6);
	  var select=document.createElement("select");
	  select.setAttribute("name","mese");
    select.setAttribute("id","data_birth_smod");
		select.setAttribute("tabindex","7");
		var mesi=new Array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");
		for(var i=0;i<12;i++)
		{
		 var option = document.createElement('option');
     option.setAttribute("value",mesi[i]);
     option.appendChild(document.createTextNode(mesi[i]));
		 select.appendChild(option);
		}

	   li6.appendChild(select);

       var li7=document.createElement("li");
	  ul.appendChild(li7);
		var input6=document.createElement("input");
		input6.setAttribute("type","text");
	  input6.setAttribute("id","data_birth_ymod");
	  input6.setAttribute("name","year");
	  input6.setAttribute("tabindex","8");
	  input6.setAttribute("maxlength","4");
	  input6.setAttribute("size","8");
		input6.setAttribute("value","Anno");
		input6.setAttribute("onClick","azzera(this.name,1);improve();");
        input6.setAttribute("onSelect","improve()");
		input6.setAttribute("onMouseOut","set()");
	  li7.appendChild(input6);

	 }
	 if(f==0 && !rimuovi)
	 {
	  var cambio=document.getElementById("changes");
		if(!cambio)
		{
	   registra.style.position="relative";
     registra.style.top="100px";
		}
	 }
	  else
		{
		 registra.style.position="relative";
     registra.style.top="400px";
		}
		 document.register.nome.focus();
  }
  else
	{
	 //------ Modifica Background Bottone ------

	 factory=identifica;
	 document.register.factory.style.backgroundColor="#5679B6";
	 document.register.user.style.backgroundColor="grey";

	 //------ Modifica Form ------
	 var rimuovi=document.getElementById("nuovodiv");
	 var rimuovialternate=document.getElementById("nuovodiv_a");
	 if(rimuovi)
	 {
	  while (rimuovi.firstChild)
    {
     rimuovi.removeChild(rimuovi.firstChild);
    }
		profilo.removeChild(rimuovi);
	 }
		 else
		 {
		   if(rimuovialternate)
			 {
				document.register.r_sociale.focus();
				return;
			 }
			  else
        {
		     while (cambio.firstChild)
         {
          cambio.removeChild(cambio.firstChild);
         }
			 }
		 }
		 //------ Creazione Nuovo Form ------
	 var newdiv=document.createElement("div");
	 newdiv.setAttribute("id","nuovodiv_a");
	 var ul=document.createElement("ul");
	 var li=document.createElement("li");

	 profilo.appendChild(newdiv);
	 newdiv.appendChild(ul);
	 ul.appendChild(li);
	 var p=document.createElement("p");
	 p.setAttribute("class","chartext");
	 li.appendChild(p);
	 var label=document.createElement("label");
	 p.appendChild(label);
	 label.setAttribute("class","etichetteright");
	 label.setAttribute("for","r_sociale");
     label.innerHTML="Ragione Sociale";
	 var input=document.createElement("input");
	 input.setAttribute("type","text");
	 input.setAttribute("class","campiright");
	 input.setAttribute("id","r_sociale");
	 input.setAttribute("name","r_sociale");
	 input.setAttribute("tabindex","1");
	 input.setAttribute("maxlength","30");
	 input.setAttribute("size","50");
	 input.setAttribute("onClick","improve()");
     input.setAttribute("onSelect","improve()");
	 label.appendChild(input);

	 var li1=document.createElement("li");
	 ul.appendChild(li1);
	 var p1=document.createElement("p");
	 p1.setAttribute("class","chartext");
	 li1.appendChild(p1);
	 var label1=document.createElement("label");
	 p1.appendChild(label1);
   label1.setAttribute("class","etichetteright");
	 label1.setAttribute("for","sede_op");
	 label1.innerHTML="Città";
	 var input1=document.createElement("input");
	 input1.setAttribute("type","text");
   input1.setAttribute("class","campiright");
	 input1.setAttribute("id","sede_op");
	 input1.setAttribute("name","sede_op");
	 input1.setAttribute("tabindex","2");
	 input1.setAttribute("maxlength","40");
	 input1.setAttribute("size","50");
	 input1.setAttribute("onClick","improve()");
     input1.setAttribute("onSelect","improve()");
	 label1.appendChild(input1);

	 var li2=document.createElement("li");
	 ul.appendChild(li2);
	 var p2=document.createElement("p");
	 p2.setAttribute("class","chartext");
	 li2.appendChild(p2);
	 var label2=document.createElement("label");
	 p2.appendChild(label2);
   label2.setAttribute("class","etichetteright");
	 label2.setAttribute("for","iva");
	 label2.innerHTML="Partita Iva";
	 var input2=document.createElement("input");
	 input2.setAttribute("type","text");
   input2.setAttribute("class","campiright");
	 input2.setAttribute("id","iva");
	 input2.setAttribute("name","iva");
	 input2.setAttribute("tabindex","3");
	 input2.setAttribute("maxlength","11");
	 input2.setAttribute("size","50");
	 input2.setAttribute("onClick","improve()");
     input2.setAttribute("onSelect","improve()");
	 label2.appendChild(input2);

	 var li3=document.createElement("li");
	 ul.appendChild(li3);
	 var p3=document.createElement("p");
	 p3.setAttribute("class","chartext");
	 li3.appendChild(p3);
	 var label3=document.createElement("label");
	 p3.appendChild(label3);
   label3.setAttribute("class","etichetteright");
	 label3.setAttribute("for","email_a");
	 label3.innerHTML="Indirizzo e-mail";
	 var input3=document.createElement("input");
	 input3.setAttribute("type","text");
   input3.setAttribute("class","campiright");
	 input3.setAttribute("id","email_a");
	 input3.setAttribute("name","email_a");
	 input3.setAttribute("tabindex","4");
	 input3.setAttribute("maxlength","30");
	 input3.setAttribute("size","50");
	 input3.setAttribute("onClick","improve()");
     input3.setAttribute("onSelect","improve()");
	 label3.appendChild(input3);

	 var li4=document.createElement("li");
	 ul.appendChild(li4);
	 var p4=document.createElement("p");
	 p4.setAttribute("class","chartext");
	 li4.appendChild(p4);
	 var label4=document.createElement("label");
	 p4.appendChild(label4);
   label4.setAttribute("class","etichetteright");
	 label4.setAttribute("for","password_a");
	 label4.innerHTML="Password";
	 var input4=document.createElement("input");
	 input4.setAttribute("type","password");
   input4.setAttribute("class","campiright");
	 input4.setAttribute("id","password_a");
	 input4.setAttribute("name","password_a");
	 input4.setAttribute("tabindex","5");
	 input4.setAttribute("maxlength","25");
	 input4.setAttribute("size","50");
	 input4.setAttribute("onClick","improve()");
     input4.setAttribute("onSelect","improve()");
	 label4.appendChild(input4);

	 var li5=document.createElement("li");
	 ul.appendChild(li5);
	 var p5=document.createElement("p");
	 p5.setAttribute("class","chartext");
	 li5.appendChild(p5);
	 var label5=document.createElement("label");
	 p5.appendChild(label5);
   label5.setAttribute("class","etichetteright");
	 label5.setAttribute("for","cellulare_a");
	 label5.innerHTML="Telefono";
	 var input5=document.createElement("input");
	 input5.setAttribute("type","text");
   input5.setAttribute("class","campiright");
	 input5.setAttribute("id","cellulare_a");
	 input5.setAttribute("name","cellulare_a");
	 input5.setAttribute("tabindex","5");
	 input5.setAttribute("maxlength","10");
	 input5.setAttribute("size","50");
	 input5.setAttribute("onClick","improve()");
     input5.setAttribute("onSelect","improve()");
	 label5.appendChild(input5);


	 registra.style.position="relative";
   registra.style.top="400px";
   registra.style.left="0px";
	 document.register.r_sociale.focus();

  }
}



function verifica()
{

 //--------------- Controllo Utente ---------------
 var regexpnome = /^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]{4,})+$/;
 var space=/\s+/;

 //Controllo del Nome
 var nome=document.getElementById("nome");
 if(nome!=null)
 {
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


	  //Controllo del Cognome
    var cognome=document.getElementById("cognome");
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


			 //Controllo Indirizzo-Email
			 var regexpmail=/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
			 var email=document.getElementById("email");
       var stringa_mail=email.value;

       if(!regexpmail.test(stringa_mail))
       {
			  if(stringa_mail=="")
		    {
		     email.style.backgroundColor="#FC9494";
		     alert("Attenzione! L'indirizzo E-mail è obbligatorio.");
			   return false;
		    }
				 if(space.test(stringa_mail))
	       {
		      email.style.backgroundColor="#FC9494";
		      alert("Attenzione! Non sono ammessi gli spazi.");
		      return false;
	       }
          email.style.backgroundColor="#FC9494";
	        alert("Attenzione! L'indirizzo E-mail non è corretto.");
	        return false;
       }


			//Controllo Password
			 var regexpsw=/^[a-zA-Z0-9\_\*\-\+\!\?\,\:\;\.\xE0\xE8\xE9\xF9\xF2\xEC\x27]{1,20}/;
			 var password=document.getElementById("password");
       var stringa_password=password.value;

       if(!regexpsw.test(stringa_password))
       {
			  if(stringa_password=="")
		    {
		     password.style.backgroundColor="#FC9494";
		     alert("Attenzione! La Password è obbligatoria.");
			   return false;
		    }
         password.style.backgroundColor="#FC9494";
	       alert("Attenzione! La Password inserita non è corretta.");
	       return false;
       }

			  //Controllo Telefono
			  var regexpcel=/^\d{8,10}$/;
			  var cellulare=document.getElementById("cellulare");
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
	    		 alert("Attenzione! Il campo Telefono deve essere composto da almeno otto cifre.");
	    		 return false;
		 		  }
         cellulare.style.backgroundColor="#FC9494";
	       alert("Attenzione! Il numero di telefono non è corretto.");
	       return false;
        }
			    //Controllo Data(Giorno)
			    var regexpday=/^\d{1,2}$/;
			    var giorno=document.getElementById("data_birth_d");
                var stringa_giorno=giorno.value;
                if(stringa_giorno==0)
                {
                 giorno.style.backgroundColor="#FC9494";
	             alert("Attenzione! Il giorno non è corretto.");
	             return false;

                }
					if(giorno!=null)
					{


         	if(!regexpday.test(stringa_giorno))
          {
			     if(stringa_giorno=="Giorno" )
		       {
		        giorno.style.backgroundColor="#FC9494";
		        alert("Attenzione! Il Giorno di nascita è obbligatorio.");
			      return false;
		       }
				    if(space.test(stringa_giorno))
	          {
		         giorno.style.backgroundColor="#FC9494";
		         alert("Attenzione! Non sono ammessi gli spazi.");
		         return false;
	          }
             giorno.style.backgroundColor="#FC9494";
	           alert("Attenzione! Il giorno non è corretto.");
	           return false;
          }



					 //Controllo Data(Anno)
			   	 var regexpyear=/^\d{4}$/;
			   	 var anno=document.getElementById("data_birth_y");
         	 var stringa_anno=anno.value;
             if(stringa_anno<1933 || stringa_anno>=2013 )
                {
                 anno.style.backgroundColor="#FC9494";
	         	 alert("Attenzione! L'Anno non è corretto.");
	         	 return false;

                }

         	 if(!regexpyear.test(stringa_anno))
         	 {
			      if(stringa_anno=="Anno")
		      	{
		         anno.style.backgroundColor="#FC9494";
		       	 alert("Attenzione! L'Anno di nascita è obbligatorio.");
			     	 return false;
		      	}
				   	 if(space.test(stringa_anno))
	        	 {
		       	  anno.style.backgroundColor="#FC9494";
		       		alert("Attenzione! Non sono ammessi gli spazi.");
		       		return false;
	        	}
           	 anno.style.backgroundColor="#FC9494";
	         	 alert("Attenzione! L'Anno non è corretto.");
	         	 return false;
         	 }
				     //Controllo Data(Bisestile)
						 var mese=document.getElementById("data_birth_s");
						 var stringa_mese=mese.value;
         		 if(stringa_giorno=="29" && stringa_mese=="Febbraio")
				 		 {
          	  if(!((stringa_anno % 4 == 0 && stringa_anno % 100 != 0) || stringa_anno % 400 == 0))
          		{
          		 giorno.style.backgroundColor="#FC9494";
	        		 alert("Attenzione! L'Anno non è bisestile.");
	        		 return false;
          		}
				 		}
						 //Controllo Data(Giorno-Mese)

					 	 switch(stringa_mese)
					 	 {
					    case "Gennaio":
						 	if(stringa_giorno<1 || stringa_giorno>31)
							{
						 	 giorno.style.backgroundColor="#FC9494";
	           	 alert("Attenzione! Il giorno non è corretto.");
							 return false;

							}
							 break;

							 case "Febbraio":
							 if(stringa_giorno<1 || stringa_giorno>29)
							 {
						 	  giorno.style.backgroundColor="#FC9494";
	           		alert("Attenzione! Il giorno non è corretto.");
								return false;
							 }
								break;

								case "Marzo":
								if(stringa_giorno<1 || stringa_giorno>31)
								{
						 		 giorno.style.backgroundColor="#FC9494";
	           		 alert("Attenzione! Il giorno non è corretto.");
								 return false;
								}
								 break;

								 case "Aprile":
								 if(stringa_giorno<1 || stringa_giorno>30)
								 {
						 		  giorno.style.backgroundColor="#FC9494";
	           			alert("Attenzione! Il giorno non è corretto.");
									return false;
								 }
									break;

					  			case "Maggio":
									if(stringa_giorno<1 || stringa_giorno>31)
									{
						 			 giorno.style.backgroundColor="#FC9494";
	           			 alert("Attenzione! Il giorno non è corretto.");
									 return false;
									}
									 break;

									 case "Giugno":
									 if(stringa_giorno<1 || stringa_giorno>30)
									 {
									  giorno.style.backgroundColor="#FC9494";
	           				alert("Attenzione! Il giorno non è corretto.");
										return false;
									 }
										break;

										case "Luglio":
										if(stringa_giorno<1 || stringa_giorno>31)
										{
						  			 giorno.style.backgroundColor="#FC9494";
	           				 alert("Attenzione! Il giorno non è corretto.");
										 return false;
										}
										 break;

										 case "Agosto":
										 if(stringa_giorno<1 || stringa_giorno>31)
										 {
						 				  giorno.style.backgroundColor="#FC9494";
	           					alert("Attenzione! Il giorno non è corretto.");
											return false;
										 }
											break;

											case "Settembre":
											if(stringa_giorno<1 || stringa_giorno>30)
											{
											 giorno.style.backgroundColor="#FC9494";
	           					 alert("Attenzione! Il giorno non è corretto.");
											 return false;
											}
											 break;

											 case "Ottobre":
											 if(stringa_giorno<1 || stringa_giorno>31)
											 {
						 					  giorno.style.backgroundColor="#FC9494";
	           						alert("Attenzione! Il giorno non è corretto.");
												return false;
											 }
												break;

												case "Novembre":
												if(stringa_giorno<1 || stringa_giorno>30)
												{
												 giorno.style.backgroundColor="#FC9494";
	           						 alert("Attenzione! Il giorno non è corretto.");
												 return false;
												}
												 break;

												 case "Dicembre":
												 if(stringa_giorno<1 || stringa_giorno>31)
												 {
						 						  giorno.style.backgroundColor="#FC9494";
	           							alert("Attenzione! Il giorno non è corretto.");
													return false;
												 }
													break;
				     }
				}
				 else
				 {
				  //--------------- Controllo Data alla Modifica ---------------
					 //Controllo Data(Giorno)Modifica
					 var regexpday_mod=/^\d{1,2}$/;
			  	 var giorno_mod=document.getElementById("data_birth_dmod");
        	 var stringa_giorno_mod=giorno_mod.value;
					 var spazio=/\s/;

        	 if(!regexpday_mod.test(stringa_giorno_mod))
        	 {
			   	  if(stringa_giorno_mod=="Giorno")
		     		{
		      	 giorno_mod.style.backgroundColor="#FC9494";
		      	 alert("Attenzione! Il Giorno di nascita è obbligatorio.");
			    	 return false;
		     		}
				  	 if(spazio.test(stringa_giorno_mod))
	       		 {
		      	  giorno_mod.style.backgroundColor="#FC9494";
		      		alert("Attenzione! Non sono ammessi gli spazi.");
		      		return false;
	       		 }
         		  giorno_mod.style.backgroundColor="#FC9494";
	       			alert("Attenzione! Il giorno non è corretto.");
	       			return false;
        	 }
					  //Controllo Data(Anno)Modifica
			   		var regexpyear_mod=/^\d{4}$/;
			   		var anno_mod=document.getElementById("data_birth_ymod");
         		var stringa_anno_mod=anno_mod.value;

         		if(!regexpyear_mod.test(stringa_anno_mod))
         		{
			    	 if(stringa_anno_mod=="Anno")
		      	 {
		       	  anno_mod.style.backgroundColor="#FC9494";
		       		alert("Attenzione! L'Anno di nascita è obbligatorio.");
			     		return false;
		      	 }
				   	  if(spazio.test(stringa_anno_mod))
	        		{
		       		 anno_mod.style.backgroundColor="#FC9494";
		       		 alert("Attenzione! Non sono ammessi gli spazi.");
		       		 return false;
	        		}
          		 anno_mod.style.backgroundColor="#FC9494";
	        		 alert("Attenzione! L'Anno non è corretto.");
	        		 return false;
             }
							//Controllo Data(Bisestile)Modifica
							var mese_mod=document.getElementById("data_birth_smod");
						 	var stringa_mese_mod=mese_mod.value;
         		 	if(stringa_giorno_mod=="29" && stringa_mese_mod=="Febbraio")
				 		  {
          	   if(!((stringa_anno_mod % 4 == 0 && stringa_anno_mod % 100 != 0) || stringa_anno_mod % 400 == 0))
          		 {
          		  giorno_mod.style.backgroundColor="#FC9494";
	        		  alert("Attenzione! L'Anno non è bisestile.");
	        		  return false;
          		 }
				 		  }
							 //Controllo Data(Giorno-Mese)
					 	 	 switch(stringa_mese_mod)
					 	 	 {
					      case "Gennaio":
						 		if(stringa_giorno_mod<1 || stringa_giorno_mod>31)
								{
						 	   giorno_mod.style.backgroundColor="#FC9494";
	           	   alert("Attenzione! Il giorno non è corretto.");
							   return false;
							  }
							   break;

							   case "Febbraio":
							 	 if(stringa_giorno_mod<1 || stringa_giorno_mod>29)
							 	 {
						 	    giorno_mod.style.backgroundColor="#FC9494";
	           		  alert("Attenzione! Il giorno non è corretto.");
								  return false;
							   }
								  break;

									case "Marzo":
									if(stringa_giorno_mod<1 || stringa_giorno_mod>31)
									{
						 		 	 giorno_mod.style.backgroundColor="#FC9494";
	           		 	 alert("Attenzione! Il giorno non è corretto.");
								 	 return false;
									}
								 	 break;

								 	 case "Aprile":
								 	 if(stringa_giorno_mod<1 || stringa_giorno_mod>30)
								 	 {
						 		    giorno_mod.style.backgroundColor="#FC9494";
	           				alert("Attenzione! Il giorno non è corretto.");
										return false;
								 	 }
									  break;

					  				case "Maggio":
										if(stringa_giorno_mod<1 || stringa_giorno_mod>31)
										{
						 			 	 giorno_mod.style.backgroundColor="#FC9494";
	           			 	 alert("Attenzione! Il giorno non è corretto.");
									 	 return false;
										}
									 	 break;

									 	 case "Giugno":
									 	 if(stringa_giorn_modo<1 || stringa_giorno_mod>30)
									 	 {
									    giorno_mod.style.backgroundColor="#FC9494";
	           					alert("Attenzione! Il giorno non è corretto.");
											return false;
									 	 }
										  break;

											case "Luglio":
											if(stringa_giorno_mod<1 || stringa_giorno_mod>31)
											{
						  			 	 giorno_mod.style.backgroundColor="#FC9494";
	           				 	 alert("Attenzione! Il giorno non è corretto.");
										 	 return false;
											}
										 	 break;

										 	 case "Agosto":
										 	 if(stringa_giorno_mod<1 || stringa_giorno>31)
										 	 {
						 				    giorno_mod.style.backgroundColor="#FC9494";
	           					  alert("Attenzione! Il giorno non è corretto.");
												return false;
										 	 }
											  break;

												case "Settembre":
												if(stringa_giorno_mod<1 || stringa_giorno_mod>30)
												{
											 	 giorno_mod.style.backgroundColor="#FC9494";
	           					 	 alert("Attenzione! Il giorno non è corretto.");
											 	 return false;
												}
												 break;

											 	 case "Ottobre":
											 	 if(stringa_giorno_mod<1 || stringa_giorno_mod>31)
											 	 {
						 					    giorno_mod.style.backgroundColor="#FC9494";
	           							alert("Attenzione! Il giorno non è corretto.");
													return false;
											 	 }
												  break;

													case "Novembre":
													if(stringa_giorno_mod<1 || stringa_giorno_mod>30)
													{
												   giorno_mod.style.backgroundColor="#FC9494";
	           						 	 alert("Attenzione! Il giorno non è corretto.");
												 	 return false;
													}
												 	 break;

												 	 case "Dicembre":
												 	 if(stringa_giorno_mod<1 || stringa_giorno_mod>31)
												 	 {
						 						    giorno_mod.style.backgroundColor="#FC9494";
	           								alert("Attenzione! Il giorno non è corretto.");
														return false;
												 	 }
													  break;
											}
				 }

 }
  else
	{
	 //--------------- Controllo Azienda ---------------
	 var regexpr_sociale = /^([a-zA-Z0-9\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s*){3,30}$/;


				   //Controllo della Ragione Sociale
           var r_sociale=document.getElementById("r_sociale");
           var stringa=r_sociale.value;

					 if(!regexpr_sociale.test(stringa))
           {
	 				 	if(stringa=="")
	 					{
						 r_sociale.style.backgroundColor="#FC9494";
						 alert("Attenzione! Il campo Ragione Sociale è obbligatorio.");
						 return false;
	 				  }
		 				  if(stringa.length<3)
		 					{
		  				 r_sociale.style.backgroundColor="#FC9494";
	    				 alert("Attenzione! Il campo Ragione Sociale deve essere composto da almeno tre caratteri.");
	    				 return false;
		 					}
     					 r_sociale.style.backgroundColor="#FC9494";
	   					 alert("Attenzione! Il campo Ragione Sociale non è corretto.");
	   					 return false;
					 }
					  //Controllo Indirizzo Sede
					  var regexpsede_op = /^[a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27\']{2,}$/;
                      var sede_op=document.getElementById("sede_op");
                      var stringa_sedeop=sede_op.value;
                      var spazio= /\s/;

					  if(!regexpsede_op.test(stringa_sedeop))
                      {
	 				   if(stringa_sedeop=="")
	 				   {
					    sede_op.style.backgroundColor="#FC9494";
						alert("Attenzione! Il campo Città è obbligatorio.");
						return false;
	 				   }
		 			    if(stringa_sedeop.length<2)
		 				{
		  				 sede_op.style.backgroundColor="#FC9494";
	    				 alert("Attenzione! Il campo Città deve essere composto da almeno due caratteri.");
	    				 return false;
		 				}
                         if(spazio.test(stringa_sedeop))
	                     {
	                      sede_op.style.backgroundColor="#FC9494";
	                      alert("Attenzione! Non sono ammessi gli spazi.");
	                      return false;
	                     }
     					  sede_op.style.backgroundColor="#FC9494";
	   					  alert("Attenzione! Il campo Città non è corretto.");
	   					  return false;
					  }

					   //Controllo Partita Iva
			  		 var regexpiva=/^\d{11}$/;
			  		 var iva=document.getElementById("iva");
        		 var stringa_iva=iva.value;
						 var spazio= /\s/;

        		 if(!regexpiva.test(stringa_iva))
        		 {
			   		  if(stringa_iva=="")
		     		  {
		      		 iva.style.backgroundColor="#FC9494";
		      		 alert("Attenzione! La Partita Iva è obbligatoria.");
			    		 return false;
		     			}
				  		 if(spazio.test(stringa_iva))
	       			 {
		      		  iva.style.backgroundColor="#FC9494";
		      			alert("Attenzione! Non sono ammessi gli spazi.");
		      			return false;
	       			 }
							  if(stringa_iva.length<11)
		 					  {
		  				   iva.style.backgroundColor="#FC9494";
	    				   alert("Attenzione! Il campo Partita Iva deve essere composto da undici cifre.");
	    				   return false;
		 					  }
         			   iva.style.backgroundColor="#FC9494";
	       			   alert("Attenzione! La Partita Iva non è corretta.");
	       			   return false;
             }

							//Controllo Indirizzo-Email Azienda
			 				var regexpemail_a=/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
			 				var email_a=document.getElementById("email_a");
       				var stringa_email_a=email_a.value;

       				if(!regexpemail_a.test(stringa_email_a))
       				{
			  			 if(stringa_email_a=="")
		    			 {
		     			  email_a.style.backgroundColor="#FC9494";
		     				alert("Attenzione! L'indirizzo E-mail è obbligatorio.");
			   				return false;
		    			 }
							  if(spazio.test(stringa_email_a))
	       				{
		      			 email_a.style.backgroundColor="#FC9494";
		      			 alert("Attenzione! Non sono ammessi gli spazi.");
		      			 return false;
	       				}
          			 email_a.style.backgroundColor="#FC9494";
	        			 alert("Attenzione! L'indirizzo E-mail non è corretto.");
	        			 return false;
       				}

							 //Controllo Password
			 				 var regexpsw_a=/^[a-zA-Z0-9\_\*\-\+\!\?\,\:\;\.\xE0\xE8\xE9\xF9\xF2\xEC\x27]{1,20}/;
			 				 var password_a=document.getElementById("password_a");
       				 var stringa_password_a=password_a.value;

       				 if(!regexpsw_a.test(stringa_password_a))
       				 {
			  			  if(stringa_password_a=="")
		    				{
		     				 password_a.style.backgroundColor="#FC9494";
		     				 alert("Attenzione! La Password è obbligatoria.");
			   				 return false;
		    				}
         				 password_a.style.backgroundColor="#FC9494";
	       				 alert("Attenzione! La Password inserita non è corretta.");
	       				 return false;
       				 }

						    //Controllo Telefono Azienda
			  				var regexpcel_a=/^\d{8,10}$/;
			  				var cellulare_a=document.getElementById("cellulare_a");
        				var stringa_cellulare_a=cellulare_a.value;

        				if(!regexpcel_a.test(stringa_cellulare_a))
        				{
			   				 if(stringa_cellulare_a=="")
		     				 {
		      			  cellulare_a.style.backgroundColor="#FC9494";
		     					alert("Attenzione! Il numero di Telefono è obbligatorio.");
			    				return false;
		     				 }
				  			  if(spazio.test(stringa_cellulare_a))
	       					{
		      				 cellulare_a.style.backgroundColor="#FC9494";
		      				 alert("Attenzione! Non sono ammessi gli spazi.");
		      				 return false;
	       				  }
				  			   if(stringa_cellulare_a.length<8)
		 		  				 {
		  		 				  cellulare_a.style.backgroundColor="#FC9494";
	    		 				  alert("Attenzione! Il campo Telefono deve essere composto da almeno otto cifre.");
	    		 				  return false;
		 		  				 }
         					 cellulare_a.style.backgroundColor="#FC9494";
	       					 alert("Attenzione! Il numero di telefono non è corretto.");
	       					 return false;
        			 }

	}
}

function improve()
{

 var nome=document.getElementById("nome");
 if(nome!=null)
 {
 if(nome.style.backgroundColor!="")
 nome.style.backgroundColor="";

 var cognome=document.getElementById("cognome");
 if(cognome.style.backgroundColor!="")
 cognome.style.backgroundColor="";

 var mail=document.getElementById("email");
 if(mail.style.backgroundColor!="")
 mail.style.backgroundColor="";

 var password=document.getElementById("password");
 if(password.style.backgroundColor!="")
 password.style.backgroundColor="";

 var cellulare=document.getElementById("cellulare");
 if(cellulare.style.backgroundColor!="")
 cellulare.style.backgroundColor="";

 var giorno=document.getElementById("data_birth_d");
  if(giorno!=null)
  {
   if(giorno.style.backgroundColor!="")
   giorno.style.backgroundColor="";

   var anno=document.getElementById("data_birth_y");
   if(anno.style.backgroundColor!="")
   anno.style.backgroundColor="";
  }
	 else
	 {
	  var giorno_mod=document.getElementById("data_birth_dmod");
		if(giorno_mod.style.backgroundColor!="")
    giorno_mod.style.backgroundColor="";

		var anno_mod=document.getElementById("data_birth_ymod");
    if(anno_mod.style.backgroundColor!="")
    anno_mod.style.backgroundColor="";
	 }

 }
  else
	{
   var r_sociale=document.getElementById("r_sociale");
   if(r_sociale.style.backgroundColor!="")
   r_sociale.style.backgroundColor="";

	 var sede_op=document.getElementById("sede_op");
   if(sede_op.style.backgroundColor!="")
   sede_op.style.backgroundColor="";

	 var iva=document.getElementById("iva");
   if(iva.style.backgroundColor!="")
   iva.style.backgroundColor="";

	 var mail_a=document.getElementById("email_a")
   if(mail_a.style.backgroundColor!="")
   mail_a.style.backgroundColor="";

	 var password_a=document.getElementById("password_a")
   if(password_a.style.backgroundColor!="")
   password_a.style.backgroundColor="";

	 var cellulare_a=document.getElementById("cellulare_a")
   if(cellulare_a.style.backgroundColor!="")
   cellulare_a.style.backgroundColor="";
  }
}

function improvereg()
{
 var username=document.getElementById("username");
 if(username.style.backgroundColor!="")
 username.style.backgroundColor="";

 var psw=document.getElementById("psw");
 if(psw.style.backgroundColor!="")
 psw.style.backgroundColor="";

}

function modificareg(f)
{
//alert(f);
  if(f==0)
  {
   document.login.userreg.style.backgroundColor="#5679B6";
   document.login.factoryreg.style.backgroundColor="grey";
  }
   else
   {
	 document.login.factoryreg.style.backgroundColor="#5679B6";
	 document.login.userreg.style.backgroundColor="grey";
   }
}

function aggiorna(e,car)
{
 var mozilla=/[mozilla]/;
 if(mozilla.test(navigator.userAgent))
 {
    if(e.keyCode==116)
    {
    if(car=='l')
    location.href="Login.php";
    else
    location.href="Registra.php";
    }
 }
  else
  {
   var tasto=event.keyCode;
   if(tasto==116)
   {
    if(car=='l')
    location.href="Login.php";
    else
    location.href="Registra.php";
   }
  }
}





