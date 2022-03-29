   var btnsUpdateClient= document.getElementsByClassName('btn-update-client');

    for(i=0;i<btnsUpdateClient.length;i++){
         btnsUpdateClient[i].onclick=function (){
            //  var donnees = eval('('+this.getAttribute("data")+')');
            //donnees=this.getAttribute("data");
            donnees=this.parentNode.childNodes[0].innerHTML.trim();
            
//            donnees='{"NumFournisseur":"28","societe":"Gai pâturage","contact":"Eliane Noz","fonction":"Représentant(e)","adresse":"Bat. B 3, rue des Alpes","ville":"Annecy" , "region":"", "codePostal":"74000" , "pays":"France", "telephone":"04.38.76.98.06", "fax":"04.38.76.98.58" , "pageAcceuil":""  }';
//            console.log(JSON.parse(donnees.trim())); return ;
            
            donnees = JSON.parse(donnees);
            fromUpdateFournisseur=document.getElementById("form_update_fournisseur");
            fromUpdateFournisseur.adresse.value=donnees.adresse;
            
            form_update_fournisseur.contact.value=donnees.contact;
            form_update_fournisseur.nom_fournisseur.value=donnees.societe;
            form_update_fournisseur.fonction.value=donnees.fonction;
            form_update_fournisseur.ville.value=donnees.ville;
            form_update_fournisseur.region.value=donnees.region;
            form_update_fournisseur.pays.value=donnees.pays;
            form_update_fournisseur.adresse.value=donnees.adresse;
            
            form_update_fournisseur.code_postal.value=donnees.codePostal;
            form_update_fournisseur.telephone.value=donnees.telephone;
            form_update_fournisseur.fax.value=donnees.fax;
            form_update_fournisseur.page.value=donnees.pageAcceuil; 
            form_update_fournisseur.code_founisseur.value=donnees.NumFournisseur; 
           //
           console.log(donnees);
         }
     }
     
          document.getElementById("form_update_fournisseur").onsubmit=function(){
           var xhr = new XMLHttpRequest() ||  new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); 
            // alert("param"); return false;
          try{
              var param='nom_fournisseur=' + form_update_fournisseur.nom_fournisseur.value + '&contact=' + form_update_fournisseur.contact.value+'&fonction=' + fromUpdateFournisseur.fonction.value+'&adresse=' + fromUpdateFournisseur.adresse.value+'&ville=' + fromUpdateFournisseur.ville.value;
            param+='&region=' + form_update_fournisseur.region.value + '&code_postal=' + form_update_fournisseur.code_postal.value+'&pays=' + form_update_fournisseur.pays.value+'&telephone=' + form_update_fournisseur.telephone.value+'&fax=' + form_update_fournisseur.fax.value+'&code_founisseur=' + form_update_fournisseur.code_founisseur.value;
            param+='&fax='+ form_update_fournisseur.fax.value+"&page="+form_update_fournisseur.page.value+"";
          }
          catch(Exception){
              console.log(Exception);
              return false
          }
           xhr.open('POST', "./ajax/update_fournisseur.php", true);
           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 
            xhr.send(param);
            xhr.onreadystatechange = function() {

                    if (xhr.readyState === 4 && xhr.status === 200) { // La constante DONE
                         document.getElementById("lbl-result-update-fournisseur").innerHTML=xhr.responseText;
                         
                   }
                   else {
                       document.getElementById("lbl-result-update-fournisseur").innerHTML="ERREUR!!!";
                   }
            };
         return false;   
     }
     
               document.getElementById("form_add_fournisseur").onsubmit=function(){
           var xhr = new XMLHttpRequest() ||  new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); 
            // alert("param"); return false;

                  var param='nom_fournisseur=' + form_add_fournisseur.nom_fournisseur.value + '&contact=' + form_add_fournisseur.contact.value+'&fonction=' + form_add_fournisseur.fonction.value+'&adresse=' + form_add_fournisseur.adresse.value+'&ville=' + form_add_fournisseur.ville.value;
            param+='&region=' + form_add_fournisseur.region.value + '&code_postal=' + form_add_fournisseur.code_postal.value+'&pays=' + form_add_fournisseur.pays.value+'&telephone=' + form_add_fournisseur.telephone.value+'&fax=' + form_add_fournisseur.fax.value;
            param+='&fax='+ form_add_fournisseur.fax.value+"&page="+form_add_fournisseur.page.value+"";
         
         xhr.open('POST', "./ajax/add_fournisseur.php", true);
           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 
            xhr.send(param);
            xhr.onreadystatechange = function() {

                    if (xhr.readyState === 4 && xhr.status === 200) { // La constante DONE
                         document.getElementById("lbl-result-add-fournisseur").innerHTML=xhr.responseText;
                         
                   }
                   else {
                       document.getElementById("lbl-result-add-fournisseur").innerHTML="ERREUR!!!";
                   }
            };
         return false;   
     }