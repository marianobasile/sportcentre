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



}
function improvereg()
{
 var username=document.getElementById("username");
 if(username.style.backgroundColor!="")
 username.style.backgroundColor="";

}


