var openUpdateComponent=document.getElementsByClassName("open-update-component");
//alert(openUpdateComponent[0].tagName);

function openUpdate()
{
   var firstChild= this.nextElementSibling;    
    this.firstChild.classList.remove("hidden");
}


for(i=0;i<openUpdateComponent.length;i++)
{
    tmpopenUpdateComponent=openUpdateComponent[i];
    tmpopenUpdateComponent.onclick=openUpdate;
}

//document.getElementById("btn-imprimer-fact").onclick=function (){
//    numeroCommande=document.getElementById("input-numero-commande").value;
//    if(numeroCommande.length<=0){
//        alert("Vous devez saisi le numero de la facture");
//    }
//    
//    else {
//           var linkToFacture="imprimer-facture.php?numcomd="+numeroCommande;
//           open(linkToFacture,"_blank");
//    }
//    
//}

           document.getElementById("in_code_client_num").onchange=function(){
                           this.nextElementSibling.selectedIndex=this.selectedIndex;
           var xhr = new XMLHttpRequest() ||  new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); 
           var param='in_code_client='+document.getElementById("in_code_client_num").value;
           

           xhr.open('POST', "./ajax/get_client.php", true);
           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
             xhr.send(param);
            xhr.onreadystatechange = function(donnees) {
 
                    if (xhr.readyState === 4 && xhr.status === 200) { // La constante DONE
                               donnees = JSON.parse(xhr.responseText);
                               lbl_adresse.innerHTML=donnees.adresse;
                                lbl_ville.innerHTML=donnees.ville;
                                 lbl_region.innerHTML=donnees.region;
                                  lbl_postale.innerHTML=donnees.code_postal;
                                  lbl_pays.innerHTML=donnees.pays;
                                  
                                  in_nom_client_livraison.value=donnees.contact;
                                  in_adresse_destinataire.value=donnees.adresse;
                                  in_ville_destinataire.value=donnees.ville;
                                  in_region_destinataire.value=donnees.region;
                                   in_code_postale_destinataire.value=donnees.code_postal;
                                   in_pays_liveraison.value=donnees.pays;
                                  console.log(donnees);
                           
                   }
                   else {
                       //  document.getElementById("lbl-result-add-client").innerHTML="ERREUR!!!";
                   }
            };
         return false;   
     }
//

  document.getElementById("nom_employe_in").onchange=function (){
            //this.nextElementSibling.selectedIndex=this.selectedIndex;
             this.nextElementSibling.value=this.selectedIndex;
      }
 
 
//
var indexPrix=0;
var comboxSelectProduit=document.getElementsByClassName("combo_select_produit");
        function getPrixProduit(){
           // this.nextElementSibling.selectedIndex=this.selectedIndex;
            this.nextElementSibling.value=this.selectedIndex;
           // alert(this.nextElementSibling.value);
            var codeClient=in_code_client_num.value;
            var nomClientLivraison=in_nom_client_livraison.value;
             
     for(j=0;j<comboxSelectProduit.length;j++){
         if(comboxSelectProduit[j]===this){
            indexPrix=j;
      }
     }
            //alert(this.nextElementSibling.selectedIndex);
           var xhr = new XMLHttpRequest() ||  new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); 
           var param='codeProduit='+this.selectedIndex;
           xhr.open('POST', "./ajax/get_prix_produit.php", true);
           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
           xhr.send(param);
            xhr.onreadystatechange = function(donnees) {
                    if (xhr.readyState === 4 && xhr.status === 200) { // La constante DONE
                               donnees = (xhr.responseText);
                            //   console.log(donnees);
                               document.getElementsByClassName("prix_utnitaire")[indexPrix].value=donnees;
                              document.getElementsByClassName("prix_utnitaire")[indexPrix].setAttribute('value',donnees);
                             
                               
                   }
                   else {
                       //  document.getElementById("lbl-result-add-client").innerHTML="ERREUR!!!";
                   }
            };
         return false;   
     }
     
     for(i=0;i,i<comboxSelectProduit.length;i++){
          comboxSelectProduit[i].onchange=getPrixProduit;
     }
        
        
document.getElementById("btn_add_ligne").onclick=function(){
         var row =document.getElementById("row_main_commande");
 document.getElementById("table_prepare_commande").innerHTML+=document.getElementById("row_main_commande").innerHTML; 


   for(i=0;i,i<comboxSelectProduit.length;i++){
          comboxSelectProduit[i].onchange=getPrixProduit;
     }
      var input= document.getElementsByClassName("in");
   for(i=0;i,i<input.length;i++){
          input[i].onkeyup=fixValueIn;
     }
  //   indexPrix++;
  // document.getElementById("table_prepare_commande").insertBefore(document.getElementById("row_main_commande").innerHTML,a);
}

document.getElementById("remove_last_row_new_comd").onclick=function(){
   var lastRowsNewCommande= document.getElementById("table_prepare_commande").lastElementChild;
   if(lastRowsNewCommande.getAttribute("class")=="" || lastRowsNewCommande.getAttribute("class")==null )
      lastRowsNewCommande.remove();
      
        //  indexPrix--;
 }
 
 function fixValueIn(){
     alert(this.value);
     this.setAttribute("value",this.value);
 }
 var input= document.getElementsByClassName("in");
   for(i=0;i,i<input.length;i++){
          input[i].onkeyup=fixValueIn;
     }