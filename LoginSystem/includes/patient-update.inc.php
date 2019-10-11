  <?php

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_POST['patient-update']))
{

    require 'dbh.inc.php';
    $firstName = $_POST['firstname'];
    $lastName= $_POST['lastname'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birthdate'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $religion = $_POST['religion'];
    $civilStatus = $_POST['civilstatus'];
    $fc = $_POST['fc'];
    $fr = $_POST['fr'];
    $ta = $_POST['ta'];
    $temperature = $_POST['temperature'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $imc = $_POST['imc'];
    $antecedentesPadres = $_POST['antecedentesPadres'];
    $antecedentesHermanos = $_POST['antecedentesHermanos'];
    $antecedentesHijos = $_POST['antecedentesHijos'];
    $antecedentesEsteticos = $_POST['antecedentesEsteticos'];
    $antecedentesCirugias = $_POST['antecedentesCirugias'];
    $antecedentesHospitalizaciones = $_POST['antecedentesHospitalizaciones'];
    $antecedentesEnfermedades = $_POST['antecedentesEnfermedades'];
    $antecedentesAlergias = $_POST['antecedentesAlergias'];
    $antecedentesMedicamentos = $_POST['antecedentesMedicamentos'];
    $tabaquismo = $_POST['tabaquismo'];
    $alcoholismo = $_POST['alcoholismo'];
    $toxicomanias = $_POST['toxicomanias'];
    $inmunizaciones = $_POST['inmunizaciones'];
    $inicioVidaSexual = $_POST['inicioVidaSexual'];
    $planificacionFamiliar = $_POST['planificacionFamiliar'];
    $aparatoDigestivo = $_POST['aparatoDigestivo'];
    $aparatoCardio = $_POST['aparatoCardio'];
    $aparatoRespiratorio = $_POST['aparatoRespiratorio'];
    $sistemaOsteomuscular = $_POST['sistemaOsteomuscular'];
    $sistemaNervioso = $_POST['sistemaNervioso'];
    $sistemaSensorial = $_POST['sistemaSensorial'];
    $sistemaPsicosomatico = $_POST['sistemaPsicosomatico'];
    $exploracionCabeza = $_POST['exploracionCabeza'];
    $exploracionCuello = $_POST['exploracionCuello'];
    $exploracionTorax = $_POST['exploracionTorax'];
    $exploracionAbdomen = $_POST['exploracionAbdomen'];
    $exploracionExtremidades = $_POST['exploracionExtremidades'];
    $exploracionGenitales = $_POST['exploracionGenitales'];
    $exploracionDiagnostico = $_POST['exploracionDiagnostico'];
    $exploracionTratamiento = $_POST['exploracionTratamiento'];
    $exploracionGabinete = $_POST['exploracionGabinete'];
    $userId = $_SESSION['userId'];
    $patientId = $_POST['patientid'];


    if($gender=="Male")
    {
      $gender = 1;
    }
    else
    {
      $gender = 0;
    }

          if( empty($firstName) || empty($lastName) )
          {
              header("Location: ../patientslist.php?error=emptyfields&firsttName=".$firstName."&lastName=".$lastName."&birthDate=".$birthDate."&telephone=".$telephone."&address=".$address.
              "&fc=".$fc
."&fr=".$fr
."&ta=".$ta
."&temperature=".$temperature
."&weight=".$weight
."&height=".$height
."&imc=".$imc
."&antecedentesPadres=".$antecedentesPadres
."&antecedentesHermanos=".$antecedentesHermanos
."&antecedentesHijos=".$antecedentesHijos
."&antecedentesEsteticos=".$antecedentesEsteticos
."&antecedentesCirugias=".$antecedentesCirugias
."&antecedentesHospitalizaciones=".$antecedentesHospitalizaciones
."&antecedentesEnfermedades=".$antecedentesEnfermedades
."&antecedentesAlergias=".$antecedentesAlergias
."&antecedentesMedicamentos=".$antecedentesMedicamentos
."&tabaquismo=".$tabaquismo
."&alcoholismo=".$alcoholismo
."&toxicomanias=".$toxicomanias
."&inmunizaciones=".$inmunizaciones
."&inicioVidaSexual=".$inicioVidaSexual
."&planificacionFamiliar=".$planificacionFamiliar
."&aparatoDigestivo=".$aparatoDigestivo
."&aparatoCardio=".$aparatoCardio
."&aparatoRespiratorio=".$aparatoRespiratorio
."&sistemaOsteomuscular=".$sistemaOsteomuscular
."&sistemaNervioso=".$sistemaNervioso
."&sistemaSensorial=".$sistemaSensorial
."&sistemaPsicosomatico=".$sistemaPsicosomatico
."&exploracionCabeza=".$exploracionCabeza
."&exploracionCuello=".$exploracionCuello
."&exploracionTorax=".$exploracionTorax
."&exploracionAbdomen=".$exploracionAbdomen
."&exploracionExtremidades=".$exploracionExtremidades
."&exploracionGenitales=".$exploracionGenitales
."&exploracionDiagnostico=".$exploracionDiagnostico
."&exploracionTratamiento=".$exploracionTratamiento
."&exploracionGabinete=".$exploracionGabinete);
              exit();
          }
              else
              {
                  $sql = "UPDATE patients
                  SET firstName = '".$firstName."' ,
                   lastName = '".$lastName."',
                    gender = '".$gender."',
                     birthDate = '".$birthDate."',
                      telephone = '".$telephone."',
                       address = '".$address."',
                       religion = '".$religion."',
                       civilStatus = '".$civilStatus."',
                       fc = '".$fc."',
                       fr = '".$fr."',
                        ta = '".$ta."',
                        temperature = '".$temperature."',
                        weight = '".$weight."',
                        height = '".$height."',
                        imc = '".$imc."',
                        antecedentesPadres = '".$antecedentesPadres."',
                        antecedentesHermanos = '".$antecedentesHermanos."',
                        antecedentesHijos = '".$antecedentesHijos."',
                        antecedentesEsteticos = '".$antecedentesEsteticos."',
                        antecedentesCirugias = '".$antecedentesCirugias."',
                        antecedentesHospitalizaciones = '".$antecedentesHospitalizaciones."',
                        antecedentesEnfermedades = '".$antecedentesEnfermedades."',
                        antecedentesAlergias = '".$antecedentesAlergias."',
                        antecedentesMedicamentos = '".$antecedentesMedicamentos."',
                        tabaquismo = '".$tabaquismo."',
                        alcoholismo = '".$alcoholismo."',
                        toxicomanias = '".$toxicomanias."',
                        inmunizaciones = '".$inmunizaciones."',
                        inicioVidaSexual = '".$inicioVidaSexual."',
                        planificacionFamiliar = '".$planificacionFamiliar."',
                        aparatoDigestivo = '".$aparatoDigestivo."',
                        aparatoCardio = '".$aparatoCardio."',
                        aparatoRespiratorio = '".$aparatoRespiratorio."',
                        sistemaOsteomuscular = '".$sistemaOsteomuscular."',
                        sistemaNervioso = '".$sistemaNervioso."',
                        sistemaSensorial = '".$sistemaSensorial."',
                        sistemaPsicosomatico = '".$sistemaPsicosomatico."',
                        exploracionCabeza = '".$exploracionCabeza."',
                        exploracionCuello = '".$exploracionCuello."',
                        exploracionTorax = '".$exploracionTorax."',
                        exploracionAbdomen = '".$exploracionAbdomen."',
                        exploracionExtremidades = '".$exploracionExtremidades."',
                        exploracionGenitales = '".$exploracionGenitales."',
                        exploracionDiagnostico = '".$exploracionDiagnostico."',
                        exploracionTratamiento = '".$exploracionTratamiento."',
                        exploracionGabinete = '".$exploracionGabinete."'




                        WHERE patientId = ".$patientId." AND companyId = ".$_SESSION['companyId'];
                  $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                      header("Location: ../patientdetails.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                      mysqli_query($conn, $sql);
                      header("Location: ../patientslist.php?patientsupdatesuccess");
                      exit();
                    }
              }

          mysqli_stmt_close($stmt);
          mysqli_close($conn);
        }elseif(isset($_POST['patient-print'])){
          require('../fpdf/fpdf.php');
          require '../templates/patient.tmpl.php';

        }
          else{
              header("Location: ../patientdetails.php");
              exit();
          }
