var f=0;
var contieni=new Array();
var i=0;
var quanti=0;
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
function setta(id)
{
 var impianto=document.getElementById("selimpianto");
 if(impianto.style.backgroundColor!="")
 impianto.style.backgroundColor="";
 var tasto=document.getElementById(id);
 var elements=document.getElementsByTagName("input");
 var trovato=0;

 if(tasto.style.backgroundColor!="green")
 {
 tasto.style.backgroundColor="green";
 tasto.style.color="white";
 //alert(i);
 contieni[i]=id;
 //alert(contieni[i]);
 i++;
 //alert(i);
 }
 else
 {
  for(var k=0;k<contieni.length;k++)
  {
   if(contieni[k]==id)
   {
    trovato=k;
    break;
   }
  }
  //alert(trovato);
 tasto.style.backgroundColor="#f1f1f1";
 tasto.style.color="black";
 i--;
 //alert(i);
 contieni.splice(trovato,1);
 //alert(contieni[i]);
 }
}
function check()
{
 quanti=contieni.length;
 if(quanti==0)
 {
  alert("Seleziona l'impianto per procedere!");
  var impianto=document.getElementById("selimpianto");
  impianto.style.backgroundColor="#FC9494";
  return false;
 }
 else
 {
 //alert(contieni);

 document.location.href="Riepilogo_Prenotazione.php?impianto="+contieni+"&numimpianti="+quanti;
 }

}