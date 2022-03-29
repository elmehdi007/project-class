      var btnsUpdateClient= document.getElementsByClassName('btn-update-client');


     for(i=0;i<btnsUpdateClient.length;i++){
         btnsUpdateClient[i].onclick=function (){
            //  var donnees = eval('('+this.getAttribute("data")+')');
            //donnees=this.getAttribute("data");
            donnees=this.parentNode.childNodes[0].innerHTML;
            donnees = JSON.parse(donnees);
            form_update_client=document.getElementById("form_update_client");
            form_update_client.adresse.value=donnees.adresse;
            
            form_update_client.contact.value=donnees.contact;
            form_update_client.nom_societe.value=donnees.societe;
            form_update_client.fonction.value=donnees.fonction;
            form_update_client.ville.value=donnees.ville;
            form_update_client.region.value=donnees.region;
            form_update_client.pays.value=donnees.pays;
            form_update_client.adresse.value=donnees.adresse;
            
          form_update_client.code_postal.value=donnees.codePostal;
            form_update_client.telephone.value=donnees.telephone;
            form_update_client.fax.value=donnees.fax;
           form_update_client.code_client.value=donnees.codeClient; 
           console.log(donnees);
         }
     }
     
     
     document.getElementById("form_update_client").onsubmit=function(){
           var xhr = new XMLHttpRequest() ||  new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); 
            // alert("param"); return false;

           var param='nom_societe=' + form_update_client.nom_societe.value + '&contact=' + form_update_client.contact.value+'&fonction=' + form_update_client.fonction.value+'&adresse=' + form_update_client.adresse.value+'&ville=' + form_update_client.ville.value;
            param+='&region=' + form_update_client.region.value + '&code_postal=' + form_update_client.code_postal.value+'&pays=' + form_update_client.pays.value+'&telephone=' + form_update_client.telephone.value+'&fax=' + form_update_client.fax.value+'&code_client=' + form_update_client.code_client.value;
           xhr.open('POST', "./ajax/update_client.php", true);
           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 
            xhr.send(param);
            xhr.onreadystatechange = function() {

                    if (xhr.readyState === 4 && xhr.status === 200) { // La constante DONE
                         document.getElementById("lbl-result-update-client").innerHTML=xhr.responseText;
                         
                   }
                   else {
                       document.getElementById("lbl-result-update-client").innerHTML="ERREUR!!!";
                   }
            };
         return false;   
     }
     
          document.getElementById("form_add_client").onsubmit=function(){
           var xhr = new XMLHttpRequest() ||  new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); 
           var param='nom_societe=' + form_add_client.nom_societe.value + '&contact=' + form_add_client.contact.value+'&fonction=' + form_add_client.fonction.value+'&adresse=' + form_add_client.adresse.value+'&ville=' + form_add_client.ville.value;
            param+='&region=' + form_add_client.region.value + '&code_postal=' + form_add_client.code_postal.value+'&pays=' + form_add_client.pays.value+'&telephone=' + form_add_client.telephone.value+'&fax=' + form_add_client.fax.value;
        // alert(param); return false;

           xhr.open('POST', "./ajax/add_client.php", true);
           xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");                
            xhr.send(param);
            xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) { // La constante DONE
                         document.getElementById("lbl-result-add-client").innerHTML=xhr.responseText;
                   }
                   else {
                         document.getElementById("lbl-result-add-client").innerHTML="ERREUR!!!";
                   }
            };
         return false;   
     }
     
 