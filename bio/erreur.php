<?php 
require_once dirname(__DIR__) . '/includes/encoding_compat.php';
if(isset($_GET['err']) && $_GET['err']!='')
{
	$erreur=$_GET['err'];
	if($erreur=="majCatError")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour de la catùgorie </div>');
	}
	else if($erreur=="majCatSucess")
	{
	echo batimod_utf8_encode('<div class="success">Mise ù jour de la catùgorie effectuùe avec succùs </div>');
	}
	else if($erreur=="succesAddDiap")
	{
	echo batimod_utf8_encode('<div class="success">Ajout du diapositive effectuùe avec succùs </div>');
	}
	else if($erreur=="errorAddDiap")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de l\'ajout du diapositive </div>');
	}
	else if($erreur=="succesAddGalerie")
	{
	echo batimod_utf8_encode('<div class="success">Ajout du diapositive effectuùe avec succùs </div>');
	}
	else if($erreur=="errorAddGalerie")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de l\'ajout du Photo </div>');
	}
	else if($erreur=="succesAddProjet")
	{
	echo batimod_utf8_encode('<div class="success">Ajout du projet effectuùe avec succùs </div>');
	}
	else if($erreur=="errorAddProjet")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de l\'ajout du projet </div>');
	}
	else if($erreur=="succesAffDiap")
	{
	echo batimod_utf8_encode('<div class="success">Publication du diapositive effectuùe avec succùs</div>');
	}
	else if($erreur=="errorAffDiap")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la publication de la dispositive </div>');
	}
	else if($erreur=="errorSupImgGal")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la suppression de l\'image</div>');
	}
	else if($erreur=="succesSupImgGal")
	{
	echo batimod_utf8_encode('<div class="success">Suppression de l\'image effectuùe avec succùs</div>');
	}
	else if($erreur=="succesAffPlanMasse")
	{
	echo batimod_utf8_encode('<div class="success">Publication du plan de masse effectuùe avec succùs</div>');
	}
	else if($erreur=="errorAffPlanMasse")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la publication du plan de masse</div>');
	}
	else if($erreur=="errorAffProjet")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la publication du projet</div>');
	}
	else if($erreur=="succesCachDiap")
	{
	echo batimod_utf8_encode('<div class="success">Dùsactivation du diapositive effectuùe avec succùs</div>');
	}
	else if($erreur=="errorCachDiap")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la dùsactivation du diapositive</div>');
	}
	else if($erreur=="errorCacherImgGal")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la dùsactivation du l\'image du gallerie</div>');
	}
	else if($erreur=="succesCacherImgGal")
	{
	echo batimod_utf8_encode('<div class="success">Dùsactivation de l\'image effectuùe avec succùs</div>');
	}
	else if($erreur=="succesCacherPlanMasse")
	{
	echo batimod_utf8_encode('<div class="success">Dùsactivation du plan de masse effectuùe avec succùs</div>');
	}
	else if($erreur=="errorCacherPlanMasse")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la dùsactivation du plan de masse</div>');
	}
	else if($erreur=="errorCacherProjet")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la dùsactivation du projet</div>');
	}
	else if($erreur=="succesCacherProjet")
	{
	echo batimod_utf8_encode('<div class="success">Dùsactivation du projet effectuùe avec succùs</div>');
	}
	else if($erreur=="loginNeeded")
	{
	echo batimod_utf8_encode('<div class="warning">Veuillez saisir votre login</div>');
	}
	else if($erreur=="passNeeded")
	{
	echo batimod_utf8_encode('<div class="warning">Veuillez saisir votre mot de passe</div>');
	}
	else if($erreur=="identificationError")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de l\'authentification </div>');
	}
	else if($erreur=="loginUnknown")
	{
	echo batimod_utf8_encode('<div class="error">Login/mot de passe erronùe</div>');
	}
	else if($erreur=="authError")
	{
	echo batimod_utf8_encode('<div class="error">Un problùme a surgit lors de l\'authentification</div>');
	}
	else if($erreur=="succesSupCateg")
	{
	echo batimod_utf8_encode('<div class="success">Suppression du catùgorie effectuùe avec succùs</div>');
	}
	else if($erreur=="errorSupCateg")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la suppression de la catùgorie</div>');
	}
	else if($erreur=="errorSupContact")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la suppression du contact</div>');
	}
	else if($erreur=="succesSupContact")
	{
	echo batimod_utf8_encode('<div class="success">Suppression du contact effectuùe avec succùs</div>');
	}
	else if($erreur=="succesDelDiap")
	{
	echo batimod_utf8_encode('<div class="success">Suppression du diapositive effectuùe avec succùs</div>');
	}
	else if($erreur=="errorDelDiap")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la suppression du diapositive </div>');
	}
	else if($erreur=="succesDelImgGal")
	{
	echo batimod_utf8_encode('<div class="success">Suppression de l\'image effectuùe avec succùs</div>');
	}
	else if($erreur=="errorDelImgGal")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la suppression de l\'image</div>');
	}
	else if($erreur=="errorDelPlanMasse")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la suppression du plan de masse</div>');
	}
	else if($erreur=="succesDelPlanMasse")
	{
	echo batimod_utf8_encode('<div class="success">Suppression du plan de masse effectuùe avec succùs</div>');
	}
	else if($erreur=="succesSupProjet")
	{
	echo batimod_utf8_encode('<div class="success">Suppression du projet effectuùe avec succùs</div>');
	}
	else if($erreur=="errorSupProjet")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la suppression du projet</div>');
	}
	else if($erreur=="errorSupProjet")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la suppression du projet</div>');
	}
	else if($erreur=="successSendingReply")
	{
	echo batimod_utf8_encode('<div class="success">Envoie de la rùponse effectuùe avec succùs</div>');
	}
	else if($erreur=="failedSendingReply")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de l\'envoie de la rùponse</div>');
	}
	else if($erreur=="succesUpdateDiap")
	{
	echo batimod_utf8_encode('<div class="success">Mise ù jour des informations effectuùe avec succùs</div>');
	}
	else if($erreur=="errorUpdateDiap")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour des informations</div>');
	}
	else if($erreur=="majCatError")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour du catùgorie</div>');
	}
	else if($erreur=="majCatSucess")
	{
	echo batimod_utf8_encode('<div class="success">Mise ù jour des informations de la catùgorie effectuùe avec succùs</div>');
	}
	else if($erreur=="succesAptImgGal")
	{
	echo batimod_utf8_encode('<div class="success">Mise ù jour de l\'image effectuùe avec succùs</div>');
	}
	else if($erreur=="errorAptImgGal")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour de l\'image</div>');
	}
	else if($erreur=="LastNameLoggerError")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour du nom</div>');
	}
	else if($erreur=="FirstNameLoggerError")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour du prùnom</div>');
	}
	else if($erreur=="LoginLoggerError")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour du login</div>');
	}
	else if($erreur=="PassLoggerError")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour du mot de passe</div>');
	}
	else if($erreur=="SucessLoggerApt")
	{
	echo batimod_utf8_encode('<div class="success">Mise ù jour des informations du profil effectuùe avec succùs</div>');
	}
	else if($erreur=="succesAptProjet")
	{
	echo batimod_utf8_encode('<div class="success">Mise ù jour des informations du projet effectuùe avec succùs</div>');
	}
	else if($erreur=="succesAptPlanMasse")
	{
	echo batimod_utf8_encode('<div class="success">Mise ù jour des plans de masse effectuùe avec succùs</div>');
	}
	else if($erreur=="errorAptPlanMasse")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour du plan de masse</div>');
	}
	else if($erreur=="majRubError")
	{
	echo batimod_utf8_encode('<div class="error">Erreur lors de la mise ù jour de la rubrique</div>');
	}
	else if($erreur=="majRubSucess")
	{
	echo batimod_utf8_encode('<div class="success">Mise ù jour  effectuùe avec succùs</div>');
	}
}


?>