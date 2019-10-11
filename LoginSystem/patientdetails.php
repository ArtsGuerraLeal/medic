<?php
require "header.php";
?>

<?php

$patientId= $_POST['patientid'];
$userid = $_SESSION['userId'];
       //show users of patient
       //change to company and userId in future

       if(isset($_SESSION['userId'])){

         require 'includes/dbh.inc.php';

           $sql = "SELECT * FROM patients WHERE patientId = ".$patientId." AND companyId = ".$_SESSION['companyId'];
           $stmt = mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt,$sql))
             {
                 header("Location: /patientslist.php?error=sqlerror");
                 exit();
             }
         else
         {
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
          }


           echo '<div class="container-fluid">
           <h1 class="h3 mb-0 mx-3 my-3 text-gray-800">'.$row["firstName"]." ".$row["lastName"] .'</h1>';

           echo
           //Input Form
           '<div class="card shadow mb-4">
             <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patients</h6>';


            echo '<div class="nav tab">
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab1'" .')" id="defaultOpen">Contact Info</button>
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab2'" .')">Details</button>
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab5'" .')">Medical Info</button>
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab3'" .')">Picture</button>
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab4'" .')">Other</button>

              <form action="patient-print.inc.php" method="post">
              <input type="hidden" name ="firstname" value="'.$row["firstName"].'">
              <input type="hidden" name ="lastname" value="'.$row["lastName"].'">
              <input type="hidden" name ="firstName" value='.$row["firstName"].'>
              <input type="hidden" name ="lastName" value='.$row["lastName"].'>
              <input type="hidden" name ="email" value='.$row["email"].'>
              <input type="hidden" name ="gender" value='.$row["gender "].'>
              <input type="hidden" name ="birthDate" value='.$row["birthDate"].'>
              <input type="hidden" name ="telephone" value='.$row["telephone"].'>
              <input type="hidden" name ="address" value='.$row["address"].'>
              <input type="hidden" name ="religion" value='.$row["religion"].'>
              <input type="hidden" name ="civilStatus " value='.$row["civilStatus"].'>
              <input type="hidden" name ="fc" value='.$row["fc"].'>
              <input type="hidden" name ="fr" value='.$row["fr"].'>
              <input type="hidden" name ="ta" value='.$row["ta"].'>
              <input type="hidden" name ="temperature" value='.$row["temperature"].'>
              <input type="hidden" name ="weight" value='.$row["weight"].'>
              <input type="hidden" name ="height" value='.$row["height"].'>
              <input type="hidden" name ="imc" value='.$row["imc"].'>
              <input type="hidden" name ="antecedentesPadres" value='.$row["antecedentesPadres"].'>
              <input type="hidden" name ="antecedentesHermanos" value='.$row["antecedentesHermanos"].'>
              <input type="hidden" name ="antecedentesHijos" value='.$row["antecedentesHijos"].'>
              <input type="hidden" name ="antecedentesEsteticos" value='.$row["antecedentesEsteticos"].'>
              <input type="hidden" name ="antecedentesCirugias" value='.$row["antecedentesCirugias"].'>
              <input type="hidden" name ="antecedentesHospitalizaciones" value='.$row["antecedentesHospitalizaciones"].'>
              <input type="hidden" name ="antecedentesEnfermedades" value='.$row["antecedentesEnfermedades"].'>
              <input type="hidden" name ="antecedentesAlergias" value='.$row["antecedentesAlergias"].'>
              <input type="hidden" name ="antecedentesMedicamentos" value='.$row["antecedentesMedicamentos"].'>
              <input type="hidden" name ="tabaquismo" value='.$row["tabaquismo"].'>
              <input type="hidden" name ="alcoholismo" value='.$row["alcoholismo"].'>
              <input type="hidden" name ="toxicomanias" value='.$row["toxicomanias"].'>
              <input type="hidden" name ="inmunizaciones" value='.$row["inmunizaciones"].'>
              <input type="hidden" name ="inicioVidaSexual" value='.$row["inicioVidaSexual"].'>
              <input type="hidden" name ="planificacionFamiliar" value='.$row["planificacionFamiliar"].'>
              <input type="hidden" name ="aparatoDigestivo" value='.$row["aparatoDigestivo"].'>
              <input type="hidden" name ="aparatoCardio" value='.$row["aparatoCardio"].'>
              <input type="hidden" name ="aparatoRespiratorio" value='.$row["aparatoRespiratorio"].'>
              <input type="hidden" name ="sistemaOsteomuscular" value='.$row["sistemaOsteomuscular"].'>
              <input type="hidden" name ="sistemaNervioso" value='.$row["sistemaNervioso"].'>
              <input type="hidden" name ="sistemaSensorial" value='.$row["sistemaSensorial"].'>
              <input type="hidden" name ="sistemaPsicosomatico" value='.$row["sistemaPsicosomatico"].'>
              <input type="hidden" name ="exploracionCabeza" value='.$row["exploracionCabeza"].'>
              <input type="hidden" name ="exploracionCuello" value='.$row["exploracionCuello"].'>
              <input type="hidden" name ="exploracionTorax" value='.$row["exploracionTorax"].'>
              <input type="hidden" name ="exploracionAbdomen" value='.$row["exploracionAbdomen"].'>
              <input type="hidden" name ="exploracionExtremidades" value='.$row["exploracionExtremidades"].'>
              <input type="hidden" name ="exploracionGenitales" value='.$row["exploracionGenitales"].'>
              <input type="hidden" name ="exploracionDiagnostico" value='.$row["exploracionDiagnostico"].'>
              <input type="hidden" name ="exploracionTratamiento" value='.$row["exploracionTratamiento"].'>
              <input type="hidden" name ="exploracionGabinete" value='.$row["exploracionGabinete"].'>
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary"type="submit" name="patient-print")">Print</button>

              </form>

            </div>';

            echo '</div>

             <div class="card-body">
            <form action="includes/patient-update.inc.php" method="post">
             <div id="Tab1" class="tabcontent" >
               <div class="form-row">
                 <div class="form-group col-md-6">
                 <img id="picture" src="uploads/'.$row["companyId"]."_".$row["patientId"].'.jpg" class="img-fluid rounded  mx-auto d-block " alt="your image">

                   <label class="my-2 font-weight-bold" for="firstname">Patient ID</label>
                   <input type="text" class="form-control font-weight-light" id="patientid" name="patientid" value="'.$row["patientId"].'"readonly>

                   <label class="my-2 font-weight-bold" for="firstname">First Name</label>
                   <input type="text" class="form-control font-weight-light" id="firstname" name="firstname" value="'.$row["firstName"].'">

                  <label class="my-2 font-weight-bold" for="lastname">Last Name</label>
                  <input type="text" class="form-control font-weight-light" id="lastname" name="lastname" value="'.$row["lastName"].'">

                  <label class="my-2 font-weight-bold" for="address">Address</label>
                  <input type="text" class="form-control font-weight-light" id="address" name="address" placeholder="Apartment, studio, or floor" value="'.$row["address"].'">

                  <label class="my-2 font-weight-bold" for="address2">Address 2</label>
                  <input type="text" class="form-control font-weight-light" id="address2"  name="address2" placeholder="Apartment, studio, or floor"  value="'.$row["address2"].'">

                  <label class="my-2 font-weight-bold"for="telephone">Telephone</label>
                  <input type="text" class="form-control font-weight-light" id="telephone" name="telephone" placeholder="Telephone" value="'.$row["telephone"].'">
                  </div>
               </div>

               <div class="form-row">
                 <div class="form-group col-md-2">

                   <label  class="font-weight-bold" for="city">City</label>
                   <input type="text" class="form-control" id="city" name="city">

                 </div>
                 <div class="form-group col-md-2">

                   <label class="font-weight-bold" for="state">State</label>
                   <select id="inputState" class="form-control" name="state">

                  <option value="0">Todo México</option>


                   </select>
                 </div>
                 <div class="form-group col-md-2">

                   <label class="font-weight-bold" for="zipcode">Zip</label>
                   <input type="text" class="form-control" id="zipcode" name="zipcode" value="'.$row["zipcode"].'">

                 </div>
               </div>


             </div>

            <div id="Tab2" class="tabcontent">
              <div class="form-row">
                <div class="form-group col-md-2">

                  <label class="my-2 font-weight-bold" for="birthdate">Birthdate</label>
                  <input type="date" class="form-control" id="birthdate" name="birthdate" value="'.$row["birthDate"].'">

                  <label class="my-2 font-weight-bold" for="gender">Gender</label>
                  <select id="gender" class="form-control" name="gender">
                    <option selected>Male</option>
                    <option>Female</option>
                  </select>

                  <label class="my-2 font-weight-bold" for="religion">Religion</label>
                  <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion" value="'.$row["religion"].'">

                    <label class="my-2 font-weight-bold" for="civilstatus">Civil Status</label>
                    <select id="civilstatus" class="form-control" name="civilstatus">
                      <option selected>Single</option>
                      <option>Married</option>
                    </select>

                </div>
               </div>
              </div>

             <div id="Tab3" class="tabcontent">
             <img id="picture" src="uploads/'.$row["companyId"]."_".$row["patientId"].'.jpg" class="img-fluid rounded  mx-auto d-block " alt="your image">

             </div>

             <div id="Tab4" class="tabcontent">

             </div>

             <div id="Tab5" class="tabcontent">

             <div class="form-row">

               <div class="form-group col-md-6">

                 <label class="my-2 font-weight-bold h5">Signos Vitales</label>
                 <br>

                 <div class="form-row">
                   <div class="form-group col-md-2">

                     <label  class="font-weight-bold" for="fc">FC</label>
                     <input type="text" class="form-control" id="fc" name="fc" value="'.$row["fc"].'">

                   </div>
                   <div class="form-group col-md-2">

                     <label class="font-weight-bold" for="fr">FR</label>
                    <input type="text" class="form-control" id="fr" name="fr" value="'.$row["fr"].'">

                   </div>
                   <div class="form-group col-md-2">

                     <label class="font-weight-bold" for="ta">TA</label>
                     <input type="text" class="form-control" id="ta" name="ta" value="'.$row["ta"].'">

                   </div>
                 </div>

                 <div class="form-row">
                   <div class="form-group col-md-3">

                     <label  class="font-weight-bold" for="temperature">Temperatura</label>
                     <input type="text" class="form-control" id="temperature" name ="temperature" value="'.$row["temperature"].'">

                   </div>
                   <div class="form-group col-md-2">

                     <label class="font-weight-bold" for="state">Peso</label>
                    <input type="text" class="form-control" id="weight" name="weight" value="'.$row["weight"].'">

                   </div>
                   <div class="form-group col-md-2">

                     <label class="font-weight-bold" for="height">Altura</label>
                     <input type="text" class="form-control" id="height" name="height" value="'.$row["height"].'">

                   </div>

                   <div class="form-group col-md-2">

                     <label class="font-weight-bold" for="imc">IMC</label>
                     <input type="text" class="form-control" id="imc" name="imc" value="'.$row["imc"].'">

                   </div>
                 </div>

                 <label class="my-2 font-weight-bold h5" for="firstname">Antecedentes Heredo Familiares</label>
                 <br>
                 <label class="my-2 font-weight-bold" for="firstname">Padres</label>
                 <input type="text" class="form-control font-weight-light" id="antecedentesPadres" name="antecedentesPadres" value="'.$row["antecedentesPadres"].'">

                 <label class="my-2 font-weight-bold" for="firstname">Hermanos</label>
                 <input type="text" class="form-control font-weight-light" id="antecedentesHermanos" name="antecedentesHermanos" value="'.$row["antecedentesHermanos"].'">

                <label class="my-2 font-weight-bold" for="lastname">Hijos</label>
                <input type="text" class="form-control font-weight-light" id="antecedentesHijos" name="antecedentesHijos" value="'.$row["antecedentesHijos"].'">

                <br>
                <label class="my-2 font-weight-bold h5" for="firstname">Antecedentes Personales Patologicos</label>
                <br>

                <label class="my-2 font-weight-bold" for="firstname">Procedimientos Esteticos Previos</label>
                <input type="text" class="form-control font-weight-light" id="antecedentesEsteticos" name="antecedentesEsteticos" value="'.$row["antecedentesEsteticos"].'">

                <label class="my-2 font-weight-bold" for="firstname">Cirugias</label>
                <input type="text" class="form-control font-weight-light" id="antecedentesCirugias" name="antecedentesCirugias" value="'.$row["antecedentesCirugias"].'">

               <label class="my-2 font-weight-bold" for="lastname">Hospitalizaciones</label>
               <input type="text" class="form-control font-weight-light" id="antecedentesHospitalizaciones" name="antecedentesHospitalizaciones" value="'.$row["antecedentesHospitalizaciones"].'">

               <label class="my-2 font-weight-bold" for="lastname">Enfermedades Cronico Degenerativas</label>
               <input type="text" class="form-control font-weight-light" id="antecedentesEnfermedades" name="antecedentesEnfermedades" value="'.$row["antecedentesEnfermedades"].'">

               <label class="my-2 font-weight-bold" for="lastname">Alergias</label>
               <input type="text" class="form-control font-weight-light" id="antecedentesAlergias" name="antecedentesAlergias" value="'.$row["antecedentesAlergias"].'">

               <label class="my-2 font-weight-bold" for="lastname">Medicamentos o suplementos</label>
               <input type="text" class="form-control font-weight-light" id="antecedentesMedicamentos" name="antecedentesMedicamentos" value="'.$row["antecedentesMedicamentos"].'">


               <br>
               <label class="my-2 font-weight-bold h5" for="firstname">Antecedentes personales no Patologicos</label>
               <br>

               <label class="my-2 font-weight-bold" for="firstname">Tabaquismo</label>
               <input type="text" class="form-control font-weight-light" id="tabaquismo" name="tabaquismo" value="'.$row["tabaquismo"].'">

               <label class="my-2 font-weight-bold" for="firstname">Alcoholismo</label>
               <input type="text" class="form-control font-weight-light" id="alcoholismo" name="alcoholismo" value="'.$row["alcoholismo"].'">

              <label class="my-2 font-weight-bold" for="lastname">Toxicomanias</label>
              <input type="text" class="form-control font-weight-light" id="toxicomanias" name="toxicomanias" value="'.$row["toxicomanias"].'">

              <label class="my-2 font-weight-bold" for="lastname">Inmunizaciones</label>
              <input type="text" class="form-control font-weight-light" id="inmunizaciones" name="inmunizaciones" value="'.$row["inmunizaciones"].'">

              <label class="my-2 font-weight-bold" for="lastname">Inicio de vida sexual activa</label>
              <input type="text" class="form-control font-weight-light" id="inicioVidaSexual" name="inicioVidaSexual" value="'.$row["inicioVidaSexual"].'">

              <label class="my-2 font-weight-bold" for="lastname">Planificacion Familiar</label>
              <input type="text" class="form-control font-weight-light" id="planificacionFamiliar" name="planificacionFamiliar" value="'.$row["planificacionFamiliar"].'">


              <br>
              <label class="my-2 font-weight-bold h5" for="firstname">Padecimiento Actual Interrogatirio para aparatos y sistemas</label>
              <br>

              <label class="my-2 font-weight-bold" for="firstname">Aparato Digestivo</label>
              <input type="text" class="form-control font-weight-light" id="aparatoDigestivo" name="aparatoDigestivo" value="'.$row["aparatoDigestivo"].'">

              <label class="my-2 font-weight-bold" for="firstname">Aparato Cardiovascular</label>
              <input type="text" class="form-control font-weight-light" id="aparatoCardio" name="aparatoCardio" value="'.$row["aparatoCardio"].'">

              <label class="my-2 font-weight-bold" for="lastname">Aparato Respiratorio</label>
              <input type="text" class="form-control font-weight-light" id="aparatoRespiratorio" name="aparatoRespiratorio" value="'.$row["aparatoRespiratorio"].'">

              <label class="my-2 font-weight-bold" for="lastname">Sistema Osteomuscular</label>
              <input type="text" class="form-control font-weight-light" id="sistemaOsteomuscular" name="sistemaOsteomuscular" value="'.$row["sistemaOsteomuscular"].'">

              <label class="my-2 font-weight-bold" for="lastname">Sistema Nervioso</label>
              <input type="text" class="form-control font-weight-light" id="sistemaNervioso" name="sistemaNervioso" value="'.$row["sistemaNervioso"].'">

              <label class="my-2 font-weight-bold" for="lastname">Sistema Sensorial</label>
              <input type="text" class="form-control font-weight-light" id="sistemaSensorial" name="sistemaSensorial" value="'.$row["sistemaSensorial"].'">

              <label class="my-2 font-weight-bold" for="lastname">Sistema Psicosomatico</label>
              <input type="text" class="form-control font-weight-light" id="sistemaPsicosomatico" name="sistemaPsicosomatico" value="'.$row["sistemaPsicosomatico"].'">

              <br>
              <label class="my-2 font-weight-bold h5" for="firstname">Exploracion Fisica</label>
              <br>

              <label class="my-2 font-weight-bold" for="firstname">Cabeza</label>
              <input type="text" class="form-control font-weight-light" id="exploracionCabeza" name="exploracionCabeza" value="'.$row["exploracionCabeza"].'">

              <label class="my-2 font-weight-bold" for="firstname">Cuello</label>
              <input type="text" class="form-control font-weight-light" id="exploracionCuello" name="exploracionCuello" value="'.$row["exploracionCuello"].'">

              <label class="my-2 font-weight-bold" for="lastname">Torax</label>
              <input type="text" class="form-control font-weight-light" id="exploracionTorax" name="exploracionTorax" value="'.$row["exploracionTorax"].'">

              <label class="my-2 font-weight-bold" for="lastname">Abdomen</label>
              <input type="text" class="form-control font-weight-light" id="exploracionAbdomen" name="exploracionAbdomen" value="'.$row["exploracionAbdomen"].'">

              <label class="my-2 font-weight-bold" for="lastname">Extremidades</label>
              <input type="text" class="form-control font-weight-light" id="exploracionExtremidades" name="exploracionExtremidades" value="'.$row["exploracionExtremidades"].'">

              <label class="my-2 font-weight-bold" for="lastname">Genitales</label>
              <input type="text" class="form-control font-weight-light" id="exploracionGenitales" name="exploracionGenitales" value="'.$row["exploracionGenitales"].'">

              <label class="my-2 font-weight-bold" for="lastname">Diagnostico</label>
              <input type="text" class="form-control font-weight-light" id="exploracionDiagnostico" name="exploracionDiagnostico" value="'.$row["exploracionDiagnostico"].'">

              <label class="my-2 font-weight-bold" for="lastname">Tratamiento</label>
              <input type="text" class="form-control font-weight-light" id="exploracionTratamiento" name="exploracionTratamiento" value="'.$row["exploracionTratamiento"].'">

              <label class="my-2 font-weight-bold" for="lastname">Estudios de gabinete</label>
              <input type="text" class="form-control font-weight-light" id="exploracionGabinete" name="exploracionGabinete" value="'.$row["exploracionGabinete"].'">



                </div>
             </div>


             </div>

             <div class="form-group col-md-2">
               <button type="submit" class="btn btn-primary btn-sm" name="patient-update">Save</button>
               <button type="submit" class="btn btn-warning btn-sm" name="patient-print">Print</button>
               <button type="submit" class="btn btn-secondary btn-sm">Cancel</button>

             </div>

             </form>


           </div>
           </div>
           </div>';

           echo '<div class="container-fluid">
           <h1 class="h3 mb-0 mx-3 my-3 text-gray-800">'. $row["firstName"]." ".$row["lastName"]."'s Apointments".'</h1>

           <div class="card shadow mb-4">
             <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patients</h6>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                         <th>Appointment Number</th>
                         <th>Treatement</th>
                         <th>Cost</th>
                         <th>Date</th>
                         <th></th>
                         <th></th>
                     </tr>
                   </thead>
                   <tfoot>
                     <tr>
                     <th>Appointment Number</th>
                     <th>Treatement</th>
                     <th>Cost</th>
                     <th>Date</th>
                     <th></th>
                     <th></th>
                     </tr>
                   </tfoot><tbody>';

                   $sql = "SELECT * FROM appointments WHERE companyId = ".$_SESSION["companyId"] ." AND patientId = ".$patientId ;
                   $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt,$sql))
                     {
                         header("Location: /patientslist.php?error=sqlerror");
                         exit();
                     }
                 else
                 {
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                  }

                   if(mysqli_num_rows($result) > 0)
                   {
                     while ($row = mysqli_fetch_assoc($result))
                     {
                       echo
                       "<tr>
                       <td>".$row["patientId"]."</td>
                       <td>".$row["firstName"]. " ". $row["lastName"]."</td>
                       <td>";

                       if($row["gender"]==1)
                       {
                         echo "Male";
                       }
                       else
                       {
                         echo "Female";
                       }

                       echo "</td>
                       <td>".$row["birthDate"]."</td>
                       <td>".$row["telephone"]."</td>
                       <td>".$row["address"]."</td>
                       <td>".$row["religion"]."</td>
                       <td>".$row["civilStatus"]."</td>
                       <td>".

                       '<form class = "client-delete" action="includes/patient-delete.inc.php" method="post">
                       <button class = "btn btn-danger btn-sm" type="submit" name="patient-delete">Delete</button>
                       <input type="hidden" name="patientid" value="'.$row["patientId"].' ">
                       </form>'

                       .
                       "</td>
                       <td>"
                       .'<form class = "client-details" action="patientdetails.php" method="post">
                       <button class = "btn btn-primary btn-sm" type="submit" name="patient-details">Details</button>
                       <input type="hidden" name="patientid" value="'.$row["patientId"].' ">
                       </form>'
                       ."</td></tr>";
                     }
                   }
                   else
                   {
                     echo "
                     <p> No results</p>";
                   }

               echo '</tbody></table>
               </div>
             </div>
           </div>

         </div>';



       }else {
         echo "Somethings wrong...";
       }
 ?>










 <script>
 document.getElementById("defaultOpen").click();
 </script>

 <?php
 require "footer.php";
?>
