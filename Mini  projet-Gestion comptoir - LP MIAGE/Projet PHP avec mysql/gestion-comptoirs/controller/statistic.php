<?php
   
     if(! $_SESSION['user_name']){
			include('view/bienvenue_guest.html');
	 }
	 else {
		 
             require_once './model/IOperationDB.php'; 
             require_once './model/Class_Commande.php'; 
             
             $fiveTopClient= Client::topFive();
             $labelClient="labels: [";
             $dataClient="data: [";
             for($i=0;$i<count($fiveTopClient);$i++){
                 $labelClient.='"'.$fiveTopClient[$i]['Code client'].'"';
                 $dataClient.='"'.$fiveTopClient[$i]['nbrAchatClient'].'"';
                 if($i<count($fiveTopClient)-1){
                      $labelClient.=",";
                      $dataClient.=",";
                 }
             }
             $labelClient.="],";
             $dataClient.="],";
             
             $fiveTopFournisseur= fournisseur::topFive();
                $labelFournisseur="labels: [";
             $dataFournisseur="data: [";
             for($i=0;$i<count($fiveTopFournisseur);$i++){
                 $labelFournisseur.='"'.$fiveTopFournisseur[$i]['Nom du produit'].'"';
                 $dataFournisseur.='"'.$fiveTopFournisseur[$i]['nbrAchatFournisseur'].'"';
                 if($i<count($fiveTopFournisseur)-1){
                      $labelFournisseur.=",";
                      $dataFournisseur.=",";
                 }
             }
             $labelFournisseur.="],";
             $dataFournisseur.="],";
            
            $statistics= Class_Commande::statisticVente();
            
             $labelStatistics="labels: [";
             $dataStatistics="data: [";
             for($i=0;$i<count($statistics);$i++){
                 $labelStatistics.='"'.$statistics[$i]['annee'].'"';
                 $dataStatistics.='"'.$statistics[$i]['nbrCommande'].'"';
                 if($i<count($statistics)-1){
                      $labelStatistics.=",";
                      $dataStatistics.=",";
                 }
             }
             $labelStatistics.="],";
             $dataStatistics.="],";
            
?>
<div class="container-fluid ">
    <div class="col-lg-12">
        <div class="row" style="padding-top:50px ">
            <h3>Tableaux bord  </h3>
        </div>
  </div>
	<div class="row"  style="padding:10px 0">
            <div class="col-lg-6 col-md-12 col-xs-12" style="padding-left: 50px;">
			<h4 style="text-transform: uppercase"> 5 top clients</h4>
			<div style='width:300px;height:300px'>
				  <canvas id="myChart" width="200" height="200" ></canvas>
			</div>
		</div>
			<div class="col-lg-6 col-md-12 col-xs-12" style="">
			<h4 style="text-transform: uppercase"> 5 top fournisseur</h4>
			<div style='width:400px;height:400px'>
				  <canvas id="myChart1" width="200" height="200" ></canvas>
			</div>
		</div>
	</div>
       <div class="row" style="background: #eee">
           <div class="col-lg-12" style="padding: 50px 0;">
                    <h4 class="text-center">Statistique de vente </h4>
            </div>
        </div>
    
       <div class="row">
           <div class="col-lg-4 col-auto text-center "></div>
           <div class="col-lg-4 col-auto text-center ">
                <div style='width:400px;height:400px'>
                     <canvas id="myChart3" width="200" height="200" ></canvas>
                </div>
           </div>
            <div class="col-lg-4 col-auto text-center "></div>
        </div>
    	
</div>

<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            //labels: ["Client 1", "Client 2", "Client 3", "Client 4", "Client 5"],
            <?php echo $labelClient; ?>
            datasets: [{
                label: 'Clients',
               // data: [12, 19, 5, 5, 2],
                 <?php echo $dataClient; ?>
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
  
  </script>
  
  <script>
    var ctx = document.getElementById("myChart1");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            //labels: ["Client 1", "Client 2", "Client 3", "Client 4", "Client 5"],
            <?php echo $labelFournisseur; ?>
            datasets: [{
                label: 'Fournisseur',
               // data: [12, 19, 5, 5, 2],
                           <?php echo $dataFournisseur; ?>
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
  
  </script>
  
    <script>
    var ctx = document.getElementById("myChart3");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            //labels: ["Client 1", "Client 2", "Client 3", "Client 4", "Client 5"],
            <?php echo $labelStatistics; ?>
            datasets: [{
                label: 'Statistique',
               // data: [12, 19, 5, 5, 2],
                           <?php echo $dataStatistics; ?>
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
  
  </script>
  <?php
	}
  ?>
	