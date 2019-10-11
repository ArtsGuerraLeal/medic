<?php
error_reporting(E_ALL);ini_set('display_errors',1);
require_once __DIR__ . '/vendor/autoload.php';

$firstName = $_POST['firstname'];
$lastName= $_POST['lastname'];
$email = "test@email.com";
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

if($gender==1)
{
  $gender = "Hombre";
}
else
{
  $gender = "Mujer";
}


$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);

$data  = '

<img style="padding-left: 15em;" src="img/clinimed.png" width="100" height="100">
<style>
p {
    margin-top: 0.1em;
    margin-bottom: 0.1em;
}
</style>
<p style="text-align: center;"><span style="background-color: #808080; color: #ffffff;">---------------------------------------------------------Informacion del Paciente---------------------------------------------------------</span></p>
<p style="text-align: left;">Datos Generales</p>
<p style="text-align: left;">Nombre: '.$firstName.'</p>
<p style="text-align: left;">Apellido: '.$lastName.'</p>
<p style="text-align: left;">Genero: '.$gender.'</p>
<p style="text-align: left;">Fecha de Nacimiento: '.$birthDate.'</p>
<p style="text-align: left;">E-mail:'.$email.'</p>
<p style="text-align: left;">Telefono:'.$telephone.'</p>
<p style="text-align: left;">Dirrecion:'.$address.'</p>
<p style="text-align: left;">Religion: '.$religion.'</p>
<p style="text-align: left;">Estado Civil: '.$civilStatus.'</p>


<p style="text-align: center;"><span style="background-color: #808080; color: #ffffff;">---------------------------------------------------------Informacion para el Medico-----------------------------------------------------</span></p>

<p><span style="background-color: #808080; color: #ffffff;">Signos Vitales</span></p>
<table>
<tbody>
<tr>
<td>FC: '.$fc.' </td>
<td>FR: '.$fr.' </td>
<td>TA: '.$ta.' </td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Temperatura: '.$temperature.' </td>
<td>Peso: '.$weight.' </td>
<td>Altura:'.$height.' </td>
<td>IMC: '.$imc.' </td>
</tr>
</tbody>
</table>
<p style="text-align: left;"><span style="background-color: #808080; color: #ffffff;">Antecedentes Heredo Familiares</span></p>
<p style="text-align: left;">Padres:'.$antecedentesPadres.'</p>
<p style="text-align: left;">Hermanos:'.$antecedentesHermanos.'</p>
<p style="text-align: left;">Hijos:'.$antecedentesHijos.'</p>
<p style="text-align: left;"><span style="background-color: #808080; color: #ffffff;">Antecedentes Personales Patologicos</span></p>
<p style="text-align: left;">Procedimientos Esteticos Previos:'.$antecedentesEsteticos.'</p>
<p style="text-align: left;">Cirugias:'.$antecedentesCirugias.'</p>
<p style="text-align: left;">Hospitalizaciones:'.$antecedentesHospitalizaciones.'</p>
<p style="text-align: left;">Enfermedades Cronico Degenerativas:'.$antecedentesEnfermedades.'</p>
<p style="text-align: left;">Alergias:'.$antecedentesAlergias.'</p>
<p style="text-align: left;">Medicamentos o suplementos:'.$antecedentesMedicamentos.'</p>
<p style="text-align: left;"><span style="background-color: #808080; color: #ffffff;">Antecedentes personales no Patologicos</span></p>
<p style="text-align: left;">Tabaquismo:'.$tabaquismo.'</p>
<p style="text-align: left;">Alcoholismo:'.$alcoholismo.'</p>
<p style="text-align: left;">Toxicomanias:'.$toxicomanias.'</p>
<p style="text-align: left;">Inmunizaciones:'.$inmunizaciones.'</p>
<p style="text-align: left;">Inicio de vida sexual activa:'.$inicioVidaSexual.'</p>
<p style="text-align: left;">Planificacion Familiar:'.$planificacionFamiliar.'</p>
<p style="text-align: left;">&nbsp;</p>
<p style="text-align: center;"><span style="color: #ffffff; background-color: #808080;">-------------------------------Padecimiento Actual Interrogatirio para aparatos y sistemas------------------------------</span></p>

<p style="text-align: left;">Aparato Digestivo:'.$aparatoDigestivo.'</p>
<p style="text-align: left;">Aparato Cardiovascular:'.$aparatoCardio.'</p>
<p style="text-align: left;">Aparato Respiratorio:'.$aparatoRespiratorio.'</p>
<p style="text-align: left;">Sistema Osteomuscular:'.$sistemaOsteomuscular.'</p>
<p style="text-align: left;">Sistema Nervioso:'.$sistemaNervioso.'</p>
<p style="text-align: left;">Sistema Sensorial:'.$sistemaSensorial.'</p>
<p style="text-align: left;">Sistema Psicosomatico:'.$sistemaPsicosomatico.'</p>
<p style="text-align: left;">&nbsp;</p>
<p style="text-align: center;"><span style="background-color: #808080; color: #ffffff;">Exploracion Fisica</span></p>

<img src="img/Exploracion.jpg" width="600" height="300">
<p style="text-align: left;">Cabeza:'.$exploracionCabeza.'</p>
<p style="text-align: left;">Cuello:'.$exploracionCuello.'</p>
<p style="text-align: left;">Torax:'.$exploracionTorax.'</p>
<p style="text-align: left;">Abdomen:'.$exploracionAbdomen.'</p>
<p style="text-align: left;">Extremidades:'.$exploracionExtremidades.'</p>
<p style="text-align: left;">Genitales:'.$exploracionGenitales.'</p>
<p style="text-align: left;">Diagnostico:'.$exploracionDiagnostico.'</p>
<p style="text-align: left;">Tratamiento:'.$exploracionTratamiento.'</p>
<p style="text-align: left;">Estudios de gabinete:'.$exploracionGabinete.'</p>
<p style="text-align: left;">&nbsp;</p>

';
// Write some HTML code:
$mpdf->WriteHTML($data);

// Output a PDF file directly to the browser
$mpdf->Output();
