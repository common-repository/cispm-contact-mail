<?php
/*
Plugin Name: Contact Mail Cispm
Plugin URI: http://www.vaynceweb.com/blog/creation-dun-plugin-wordpress/
Description: Cispm Mail Contact est un formulaire de contact entièrement personnalisable via le panneau d’administration de votre blog Wordpress. Par ce plugin, vous pouvez via un formulaire de permettre aux visiteur de votre de blog de vous contacter par mail. Opter pour la personnalisation graphique et des libellés des champs du formulaire, ou pour le thème par défault. Un plugin unique, qui sait répondre aux besoins de vous, blogger et acteur du Web 2.0. Pour installer le plugin, activez le et rendez-vous sur la page d'administration du formulaire (Réglages>Formulaire de contact).
Version: 2.2.6
Author: Vincent Lachambre et Julien Rousselle
Author URI: http://www.vaynceweb.com/

	Copyright 2010  Vincent Lachambre et Julien Rousselle  (email : cispm.contact@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function init_method() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('interface');
	wp_register_script('roundies',get_bloginfo('wpurl').'/wp-content/plugins/cispm-contact-mail/js/roundies.js', false, '');
	wp_enqueue_script('roundies');
	wp_register_script('jquery-ui-1.7.2.custom.min',get_bloginfo('wpurl').'/wp-content/plugins/cispm-contact-mail/js/jquery-ui-1.7.2.custom.min.js', false, '');
	wp_enqueue_script('jquery-ui-1.7.2.custom.min');
	wp_register_script('jquery.mycolorpicker',get_bloginfo('wpurl').'/wp-content/plugins/cispm-contact-mail/js/jquery.mycolorpicker.js', false, '');
	wp_enqueue_script('jquery.mycolorpicker');
}

add_action('init', 'init_method');

load_plugin_textdomain('cispm-contact-mail', PLUGINDIR .'/'.dirname(plugin_basename (__FILE__)).'/lang');

function html2rgb($color) {
    if ($color[0] == '#') {
        $color = substr($color, 1);
	}
	
    if (strlen($color) == 6) {
        list($r, $g, $b) = array($color[0].$color[1],
                                 $color[2].$color[3],
                                 $color[4].$color[5]);
    } elseif (strlen($color) == 3) {
        list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
    } else {
        return false;
	}
    $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);

    return array($r, $g, $b);
}

//*************** PAGE FORMULAIRE CONTACT ***************//

function remplacer_texte($texte) {
	
	$cispm_titre_formulaire = get_option('cispm_titre_formulaire');
	if($cispm_titre_formulaire == "")
	{
		$cispm_titre_formulaire = __('Formulaire de contact', 'cispm-contact-mail');	
	}
	$cispm_nom = get_option('cispm_nom');
	if($cispm_nom == "")
	{
		$cispm_nom = __('Nom', 'cispm-contact-mail');	
	}
	$cispm_prenom = get_option('cispm_prenom');
	if($cispm_prenom == "")
	{
		$cispm_prenom = __('Prénom', 'cispm-contact-mail');	
	}
	$cispm_mail = get_option('cispm_mail');
	if($cispm_mail == "")
	{
		$cispm_mail = __('Mail', 'cispm-contact-mail');	
	}
	$cispm_site_web = get_option('cispm_site_web');
	if($cispm_site_web == "")
	{
		$cispm_site_web = __('Site Web', 'cispm-contact-mail');	
	}
	$cispm_objet = get_option('cispm_objet');
	if($cispm_objet == "")
	{
		$cispm_objet = __('Objet', 'cispm-contact-mail');	
	}
	$cispm_message = get_option('cispm_message');
	if($cispm_message == "")
	{
		$cispm_message = __('Message', 'cispm-contact-mail');	
	}
	$cispm_copie = get_option('cispm_copie');
	if($cispm_copie == "")
	{
		$cispm_copie = __('Recevoir une copie', 'cispm-contact-mail');	
	}
	$cispm_valider = get_option('cispm_valider');
	if($cispm_valider == "")
	{
		$cispm_valider = __('Envoyer le message', 'cispm-contact-mail');	
	}
	
	$cispm_radio_nom_obl = get_option('cispm_radio_nom_obl');
	$cispm_radio_prenom_obl = get_option('cispm_radio_prenom_obl');
	$cispm_radio_site_web_obl = get_option('cispm_radio_site_web_obl');
	$cispm_radio_fond = get_option('cispm_radio_fond');
	$cispm_hexa = get_option('cispm_hexa');
	$cispm_hexa_titre = get_option('cispm_hexa_titre');
	$cispm_hexa_texte = get_option('cispm_hexa_texte');
	$cispm_width_form = get_option('cispm_width_form');
	$cispm_taille_texte = get_option('cispm_taille_texte');
	$cispm_police_texte = get_option('cispm_police_texte');
	$cispm_taille_titre = get_option('cispm_taille_titre');
	$cispm_police_titre = get_option('cispm_police_titre');
	$cispm_radio_pos = get_option('cispm_radio_pos');
	
	$cispm_mail_reception = get_option('cispm_mail_reception');
	$cispm_prefixe = get_option('cispm_prefixe');
	$cispm_radio_nom = get_option('cispm_radio_nom');
	$cispm_radio_prenom = get_option('cispm_radio_prenom');
	$cispm_radio_site_web = get_option('cispm_radio_site_web');
	$cispm_radio_copie = get_option('cispm_radio_copie');
	
	$cispm_nom_taille = get_option('cispm_nom_taille');
	$cispm_prenom_taille = get_option('cispm_prenom_taille');
	$cispm_mail_taille = get_option('cispm_mail_taille');
	$cispm_site_web_taille = get_option('cispm_site_web_taille');
	$cispm_objet_taille = get_option('cispm_objet_taille');
	$cispm_message_taille = get_option('cispm_message_taille');
	$cispm_valider_taille = get_option('cispm_valider_taille');
	$cispm_obligatoire = get_option('cispm_obligatoire');
	$cispm_obligatoire_pos = get_option('cispm_obligatoire_pos');
	$cispm_hexa_texte_erreur = get_option('cispm_hexa_texte_erreur');
	$cispm_hexa_input_erreur = get_option('cispm_hexa_input_erreur');
	$cispm_hexa_form_erreur = get_option('cispm_hexa_form_erreur');
	$cispm_dessus_formulaire = get_option('cispm_dessus_formulaire');
	$cispm_dessous_champ = get_option('cispm_dessous_champ');
	$cispm_mess_erreur = get_option('cispm_mess_erreur');
	$cispm_radio_captcha = get_option('cispm_radio_captcha');
	$cispm_question_texte = get_option('cispm_question_texte');
	$cispm_reponse_texte = get_option('cispm_reponse_texte');
	$cispm_caseacocher_texte = get_option('cispm_caseacocher_texte');
	$cispm_taille_reponse = get_option('cispm_taille_reponse');
	$cispm_captcha_texte = get_option('cispm_captcha_texte');
	$cispm_captcha_texte_couleur = get_option('cispm_captcha_texte_couleur');
	$cispm_captcha_fond_couleur = get_option('cispm_captcha_fond_couleur');
	
	$cispm_captcha_texte = stripslashes($cispm_captcha_texte);
	$cispm_question_texte = stripslashes($cispm_question_texte);
	$cispm_caseacocher_texte = stripslashes($cispm_caseacocher_texte);
	$cispm_titre_formulaire = stripslashes($cispm_titre_formulaire);
	$cispm_nom = stripslashes($cispm_nom);
	$cispm_prenom = stripslashes($cispm_prenom);
	$cispm_mail = stripslashes($cispm_mail);
	$cispm_site_web = stripslashes($cispm_site_web);
	$cispm_objet = stripslashes($cispm_objet);
	$cispm_message = stripslashes($cispm_message);
	$cispm_copie = stripslashes($cispm_copie);
	$cispm_valider = stripslashes($cispm_valider);
	$cispm_obligatoire = stripslashes($cispm_obligatoire);
	$cispm_mess_erreur = stripslashes($cispm_mess_erreur);
	
	if($cispm_radio_captcha == "cispm_captcha") {
		$captcha_instance = new ReallySimpleCaptcha();
		$cispm_texte_captcha = html2rgb($cispm_captcha_texte_couleur);
		$cispm_fond_captcha = html2rgb($cispm_captcha_fond_couleur);
		$captcha_instance->fg = array($cispm_texte_captcha[0],$cispm_texte_captcha[1],$cispm_texte_captcha[2]);
		$captcha_instance->bg = array($cispm_fond_captcha[0],$cispm_fond_captcha[1],$cispm_fond_captcha[2]);
		$word = $captcha_instance->generate_random_word();
		$prefix = mt_rand();
		$image = $captcha_instance->generate_image($prefix, $word);
		$captcha_instance->cleanup("1");
		$formulaire .= $cispm_plugindir."/tmp/".$image;
	}
	
	//*************** ENVOIE DU MAIL SI FORMULAIRE ACTIVE *****//
	if($_POST['cispm_envoie'] == 'ENVOIE_FORM') {
		
		$erreur = '0';
		$erreur_valide = '0';
		$message_erreur = __('Veuillez renseigner le(s) champs: ', 'cispm-contact-mail');
		$message_erreur_valide = "";
		$mes_erreur = "";
		$message = "<html><body>";
		
		//----- VERIFICATION NOM -------//
		if($cispm_radio_nom == 'o') {
			$nom = $_POST['nom_input'];
			$nom = verif_champ($nom);
			if($cispm_radio_nom_obl == "o" && $nom == "") {
				$erreur = '1';
				$message_erreur .= $cispm_nom.', ';
			} else {
				$message .= __('Vous avez reçu un message de ', 'cispm-contact-mail')."<strong>".$nom."</strong><br/><br/>";
			}
		}	
		
		//----- VERIFICATION PRENOM -----//
		if($cispm_radio_prenom == 'o') {
			$prenom = $_POST['prenom_input'];
			$prenom = verif_champ($prenom);
			if($cispm_radio_prenom_obl == "o" && $prenom == "") {	
				$erreur = '1';
				$message_erreur .= $cispm_prenom.', ';	
			} else {
				if($nom <> "") {
					$message .= __('Vous avez re&ccedil;u un message de ', 'cispm-contact-mail')."<strong>".$nom." ".$prenom."</strong><br/><br/>";					
				} else {
					$message .= __('Vous avez re&ccedil;u un message de ', 'cispm-contact-mail')."<strong>".$prenom."</strong><br/><br/>";
				}
			}
		}
			
		//----- VERIFICATION URL -------//	
		if($cispm_radio_site_web == 'o') {
			$site_web = $_POST['site_web_input'];
			$site_web = verif_champ($site_web);
			if(isUrl($site_web) == true) {
				if($cispm_radio_site_web_obl == "o" && $site_web == "") {	
					$erreur = '1';
					$message_erreur .= $cispm_site_web.', ';
				} else {
					$message .= __('Son site internet est ', 'cispm-contact-mail')."<strong>".$site_web."</strong><br/><br/>";
				}
			} else {
				$erreur_valide = '1';
				$message_erreur_valide .= __('Votre site internet n\'est pas valide (commence par http://)', 'cispm-contact-mail').'<br/>';
			}
		}
		
		//----- VERIFICATION OBJET -----//
		$sujet = $_POST['objet_input'];
		$object = $cispm_prefixe." ".$sujet;
		$object = verif_champ($object);
		if($sujet == "") {
			$erreur = '1';
			$message_erreur .= $cispm_objet.', ';
		}
		
		//----- VERIFICATION MESSAGE ---//
		$contenu = $_POST['message_input'];
		$contenu = verif_champ($contenu);
		$message .= $contenu;
		
		if($contenu == "") {
			$erreur = '1';
			$message_erreur .= $cispm_message.', ';
		}
		
		//----- VERIFICATION MAIL ---//
		$mail = $_POST['mail_input'];
		$mail = verif_champ($mail);
		if($mail == "") {
			$erreur = '1';
			$message_erreur .= $cispm_mail.', ';
		} else if (isMail($mail) == false) {
				$erreur_valide = '1';
				$message_erreur_valide .= __('Votre adresse mail n\'est pas valide (exemple: votre.email@email.fr)', 'cispm-contact-mail').'<br/>';
		}
		
		//----- VERIFICATION CAPTCHA ---//
		if($cispm_radio_captcha == "cispm_captcha") {
			$input_captcha = $_POST['captcha'];
			$prefixa = $_POST['prefixa'];
			$correct = $captcha_instance->check($prefixa, $input_captcha);
			if($input_captcha == "") {
				$erreur_valide = '1';
				$message_erreur_valide .= __('Veuillez remplir le champ captcha.', 'cispm-contact-mail').'<br/>';
			} else if($correct == false){
				$erreur_valide = '1';
				$message_erreur_valide .= __('Le champ captcha ne correspond pas à l\'image.', 'cispm-contact-mail').'<br/>';
			}
		}
		
		//----- VERIFICATION CASE A COCHER ---//
		if($cispm_radio_captcha == 'cispm_caseacocher') {
			if($_POST['cispm_input_caseacocher'] <> "caseacocher_input") {
				$erreur_valide = '1';
				$message_erreur_valide .= __('Vous devez cocher la case avant d\'envoyer le mail.', 'cispm-contact-mail').'<br/>';
			}
		}
		
		//----- VERIFICATION QUESTION ---//
		if($cispm_radio_captcha == 'cispm_question') {
			if($_POST['cispm_input_reponse'] <> $cispm_reponse_texte && $_POST['cispm_input_reponse'] != "") {
				$erreur_valide = '1';
				$message_erreur_valide .= __('Ce n\'est pas la bonne réponse.', 'cispm-contact-mail').'<br/>';
			} else if($_POST['cispm_input_reponse'] == "") {
				$erreur_valide = '1';
				$message_erreur_valide .= __('Veuillez répondre à la question posée.', 'cispm-contact-mail').'<br/>';
			}
		}
		
		$message = $message."</body></html>";
		
		if($erreur == '0' && $erreur_valide == '0') {
			$from = "From:".$mail."\n";
			$from .= "MIME-version: 1.0\n";
			$from .= "Content-type: text/html; charset= UTF-8\n";
			
			mail($cispm_mail_reception,$object,$message,$from);
			
			if($cispm_radio_copie == 'o') {
				if($_POST['copie_input'] == "rec_copie") {
					$from = "From:".$cispm_mail_reception."\n";
					$from .= "MIME-version: 1.0\n";
					$from .= "Content-type: text/html; charset= UTF-8\n";
					$envoi = $_POST['mail_input'];
					
					$blog_name = get_option('blogname');
					$blog_url = get_option('siteurl');
					$message = __('Vous avez demandé à recevoir une copie du mail envoyé depuis le blog ', 'cispm-contact-mail')."<a href=".$blog_url.">".$blog_name."</a><br/><br/>";
					
					$sujet = "[".$blog_name."] ".$_POST['objet_input'];
					$contenu = verif_champ($_POST['message_input']);
					$message .= $contenu;
					
					mail($envoi,$sujet,$message,$from);
				}
			}
			
			$nom = "";
			$prenom = "";
			$site_web = "";
			$mail = "";
			$contenu = "";
			$from = "";
			$envoi = "";
			$sujet = "";
					
			echo "<div id='mess_en' style='background-color:#FFFFE0;border:1px solid #E6DB55;-moz-border-radius-bottomleft:3px;-moz-border-radius-bottomright:3px;-moz-border-radius-topleft:3px;-moz-border-radius-topright:3px;margin:5px 15px 2px;padding:0 0.6em;'><p><strong>".__('Votre message a correctement été envoyé.', 'cispm-contact-mail')."</strong></p></div>";
		} else {
			$message_erreur = substr($message_erreur,0,-2);
			if($erreur == 1 && $erreur_valide == 1) {
				$mes_erreur = $message_erreur."<br/>".$message_erreur_valide;
			} else if($erreur == 0 && $erreur_valide == 1) {
				$mes_erreur = $message_erreur_valide;
			} else if($erreur == 1 && $erreur_valide == 0) {
				$mes_erreur = $message_erreur;
			}
			
			echo "<div id='mess_en' style='background-color:#d58b8d;border:1px solid #d2484b;-moz-border-radius-bottomleft:3px;-moz-border-radius-bottomright:3px;-moz-border-radius-topleft:3px;-moz-border-radius-topright:3px;margin:5px 15px 2px;padding:0 0.6em;'><p><strong>".$mes_erreur."</strong></p></div>";	
		}
	}

	//*********************************************************//

$cispm_background_input_erreur = "#".$cispm_hexa_input_erreur;	
$cispm_background_texte_erreur = "#".$cispm_hexa_texte_erreur;	
$cispm_background_form_erreur = "#".$cispm_hexa_form_erreur;
$cispm_background_form = "#".$cispm_hexa;
$error_texte = $cispm_mess_erreur;

$verif = "var tab_error = new Array();var message_error_web='';var message_error_mail='';var haut_mess_form = true;message_error_coche='';message_error_question='';message_error_captcha='';";

if($cispm_radio_nom == 'o') {
	if($cispm_radio_nom_obl == "o") {
		$verif .= 'if($("#nom_input").val() == "") {
						$("#nom_input").css("background-color","'.$cispm_background_input_erreur.'");
						$("#span_nom").css("color","'.$cispm_background_texte_erreur.'");';
						if($cispm_dessous_champ == "cispm_dessous_champ") {
							$verif .= "$('#nom_input').next().text('".$error_texte."');";
							$verif .= "$('#nom_input').next().css('text-align','left');";
						} else {
							$verif .= '$("#nom_input").next().text("");';
						}
						$verif .= 'tab_error[0] = "'.$cispm_nom.'"; 
						valid = false;
					} else {
						$("#nom_input").css("background-color","");
						$("#span_nom").css("color","");
						$("#nom_input").next().text("");
						tab_error[0] = "";
					}';
	} else {
		$verif .= 'tab_error[0] = "";';
	}
} else {
	$verif .= 'tab_error[0] = "";';
}

if($cispm_radio_prenom == 'o') {
	if($cispm_radio_prenom_obl == "o") {		
		$verif .= 'if($("#prenom_input").val() == "") {
						$("#prenom_input").css("background-color","'.$cispm_background_input_erreur.'");
						$("#span_prenom").css("color","'.$cispm_background_texte_erreur.'");';
						if($cispm_dessous_champ == "cispm_dessous_champ") {
							$verif .= "$('#prenom_input').next().text('".$error_texte."');";
							$verif .= "$('#prenom_input').next().css('text-align','left');";
						} else {
							$verif .= '$("#prenom_input").next().text("");';
						}
						$verif .= 'tab_error[1] = "'.$cispm_prenom.'"; 
						valid = false;
					} else {
						$("#prenom_input").css("background-color","");
						$("#span_prenom").css("color","");
						$("#prenom_input").next().text("");
						tab_error[1] = "";
					}';
	} else {
		$verif .= 'tab_error[1] = "";';
	}
} else {
	$verif .= 'tab_error[1] = "";';
}
			
$verif .= ' if($("#mail_input").val() == "") {
				$("#mail_input").css("background-color","'.$cispm_background_input_erreur.'");
				$("#span_mail").css("color","'.$cispm_background_texte_erreur.'");';
				if($cispm_dessous_champ == "cispm_dessous_champ") {
					$verif .= "$('#mail_input').next().text('".$error_texte."');";
					$verif .= "$('#mail_input').next().css('text-align','left');";
				} else {
					$verif .= '$("#mail_input").next().text("");';
				}
				$verif .= 'tab_error[2] = "'.$cispm_mail.'";
				valid = false;
			} else if(!$("#mail_input").val().match(/^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,7}$/)){
				$("#mail_input").css("background-color","'.$cispm_background_input_erreur.'");
				$("#span_mail").css("color","'.$cispm_background_texte_erreur.'");';
				if($cispm_dessous_champ == "cispm_dessous_champ") {
					$verif .= "$('#mail_input').next().text('".$error_texte."');";
					$verif .= "$('#mail_input').next().css('text-align','left');";
				} else {
					$verif .= '$("#mail_input").next().text("");';
				}
				$email_entre = __('L\'email entré n\'est pas valide','cispm-contact-mail');
				$verif .= 'message_error_mail = "'.$email_entre.'";
				tab_error[2] = "";
				valid = false;
			} else {
				$("#mail_input").css("background-color","");
				$("#span_mail").css("color","");
				$("#mail_input").next().text("");
				tab_error[2] = "";
				message_error_mail = "";
			}';

if($cispm_radio_site_web == 'o') {
	if($cispm_radio_site_web_obl == "o") {	
		$site_entre = __('Champ non valide (http://)','cispm-contact-mail');
		$verif .= 'if($("#site_web_input").val() == "") {
						$("#site_web_input").css("background-color","'.$cispm_background_input_erreur.'");
						$("#span_site_web").css("color","'.$cispm_background_texte_erreur.'");';
						if($cispm_dessous_champ == "cispm_dessous_champ") {
							$verif .= "$('#site_web_input').next().text('".$error_texte."');";
							$verif .= "$('#site_web_input').next().css('text-align','left');";
						} else {
							$verif .= '$("#site_web_input").next().text("");';
						}
						$verif .= 'tab_error[3] = "'.$cispm_site_web.'";
						valid = false;
					} else if(!$("#site_web_input").val().match("^http://")){
						$("#site_web_input").css("background-color","'.$cispm_background_input_erreur.'");
						$("#span_site_web").css("color","'.$cispm_background_texte_erreur.'");';
						if($cispm_dessous_champ == "cispm_dessous_champ") {
							$verif .= "$('#site_web_input').next().text('".$site_entre."');";
							$verif .= "$('#site_web_input').next().css('text-align','left');";
						} else {
							$verif .= '$("#site_web_input").next().text("");';
						}
						$verif .= 'message_error_web = "'.$site_entre.'";
						tab_error[3] = "";
						valid = false;
					} else {
						$("#site_web_input").css("background-color","");
						$("#span_site_web").css("color","");
						$("#site_web_input").next().text("");
						tab_error[3] = "";
					}';
	} else {
		$verif .= 'tab_error[3] = "";';
	} 
} else {
	$verif .= 'tab_error[3] = "";';
}
			
$verif .= 'if($("#objet_input").val() == "") {
				$("#objet_input").css("background-color","'.$cispm_background_input_erreur.'");
				$("#span_objet").css("color","'.$cispm_background_texte_erreur.'");';
				if($cispm_dessous_champ == "cispm_dessous_champ") {
					$verif .= "$('#objet_input').next().text('".$error_texte."');";
					$verif .= "$('#objet_input').next().css('text-align','left');";
				} else {
					$verif .= '$("#objet_input").next().text("");';
				}
				$verif .= 'tab_error[4] = "'.$cispm_objet.'";
				valid = false;
			} else {
				$("#objet_input").css("background-color","");
				$("#span_objet").css("color","");
				$("#objet_input").next().text("");
				tab_error[4] = "";
			}';
			
$verif .= 'if($("#message_input").val() == "") {
				$("#message_input").css("background-color","'.$cispm_background_input_erreur.'");
				$("#span_message").css("color","'.$cispm_background_texte_erreur.'");';
				if($cispm_dessous_champ == "cispm_dessous_champ") {
					$verif .= "$('#message_input').next().text('".$error_texte."');";
					$verif .= "$('#message_input').next().css('text-align','left');";
				} else {
					$verif .= '$("#message_input").next().text("");';
				}
				$verif .= 'tab_error[5] = "'.$cispm_message.'<br/>";
				valid = false;
			} else {
				$("#message_input").css("background-color","");
				$("#span_message").css("color","");
				$("#message_input").next().text("");
				tab_error[5] = "";
			}';

if($cispm_radio_captcha == "cispm_caseacocher"){
	$verif .= 'if($("#cispm_input_caseacocher").attr("checked") == false) {
				$("#texte_cocher").css("color","red");';
				$coche_entre = __('Veuillez cocher la case','cispm-contact-mail');
				$verif .= 'message_error_coche = "'.$coche_entre.'";
				valid = false;
			} else {
				$("#texte_cocher").css("color","");
				message_error_coche = "";
			}';
}

if($cispm_radio_captcha == "cispm_question"){
	$verif .= 'if($("#cispm_input_reponse").val() != "'.$cispm_reponse_texte.'" && $("#cispm_input_reponse").val() != "") {
				$("#cispm_span_question").css("color","red");';
				if($cispm_dessous_champ == "cispm_dessous_champ") {
					$verif .= "$('#cispm_input_reponse').next().text('Ce n\'est pas la bonne réponse');";
					$verif .= "$('#cispm_input_reponse').next().css('text-align','left');";
				} else {
					$verif .= '$("#cispm_input_reponse").next().text("");';
				}
				$question_entre = __('Ce n\'est pas la bonne réponse','cispm-contact-mail');
				$verif .= 'message_error_question = "'.$question_entre.'";
				valid = false;
			} else if($("#cispm_input_reponse").val() == ""){
				$("#cispm_span_question").css("color","red");';
				if($cispm_dessous_champ == "cispm_dessous_champ") {
					$verif .= "$('#cispm_input_reponse').next().text('".$error_texte."');";
					$verif .= "$('#cispm_input_reponse').next().css('text-align','left');";
				} else {
					$verif .= '$("#cispm_input_reponse").next().text("");';
				}
				$question_entre = __('Veuillez répondre à la question posée','cispm-contact-mail');
				$verif .= 'message_error_question = "'.$question_entre.'";
				valid = false;
			} else {
				$("#cispm_span_question").css("color","");
				$("#cispm_input_reponse").css("background-color","");
				$("#cispm_input_reponse").next().text("");
				message_error_question = "";
			}';
}

if($cispm_radio_captcha == "cispm_captcha") {
	$verif .= 'if($("#captcha").val() == ""){
				$("#span_captcha").css("color","red");';
				if($cispm_dessous_champ == "cispm_dessous_champ") {
					$verif .= "$('#span_input_captcha').next().text('".$error_texte."');";
					$verif .= "$('#span_input_captcha').next().css('text-align','left');";
					$verif .= "$('#span_input_captcha').next().css('padding-top','4px');";
					$verif .= '$("#captcha").css("background-color","'.$cispm_background_input_erreur.'");';
				} else {
					$verif .= "$('#span_input_captcha').next().text('');";
					$verif .= '$("#captcha").css("background-color","");';
				}
				$captcha_entre = __('Veuillez remplir le champ captcha','cispm-contact-mail');
				$verif .= '$("#captcha").css("background-color","'.$cispm_background_input_erreur.'");';
				$verif .= 'message_error_captcha = "'.$captcha_entre.'";
				valid = false;
			} else {
				$("#span_input_captcha").next().text("");
				$("#span_captcha").css("color","");
				$("#captcha").next().text("");
				$("#captcha").css("background-color","");
				message_error_captcha = "";
			}';
}			

if($cispm_dessus_formulaire <> "cispm_dessus_formulaire") {
	$verif .= 'haut_mess_form = false;';
}
?>

<script language="Javascript">
	DD_roundies.addRule('div.arrondi', '15px');
	
	jQuery(document).ready(function($){
		$("#envoyer").click(function() {
			valid = true;
			<?php echo $verif; ?>
			if(valid == false) {
				$("#formulaire_contact").animate({ backgroundColor: "<?php echo $cispm_background_form_erreur;?>" }, 100);
				
				var message = "<?php _e('Veuillez renseigner le(s) champs: ','cispm-contact-mail');?>";
				for (var i=0; i < tab_error.length; ++i) {
					if(tab_error[i] != "") {
						message += tab_error[i]+", ";
					}
				}
				
				message = message.substring(0, message.length-2);
				
				var espace_coche = "";
				if(message_error_mail != "") {
					message += message_error_mail;
					espace_coche = "<br/>";
				}
				
				if(message_error_coche != "") {
					message += espace_coche+message_error_coche;
				}
				
				if(message_error_question != "") {
					message += espace_coche+message_error_question;
				}
				
				if(message_error_captcha != "") {
					message += espace_coche+message_error_captcha;
				}
				
				if(message_error_web != "" && message_error_mail != "") {
					message += "<br/>"+message_error_web;
				} else {
					message += message_error_web;
				}
				
				if(haut_mess_form == true) {
					$("#message_error").css("display","block");
					$("#message_error").html(message);
				}
			}
			
			$("#formulaire_contact").animate({ backgroundColor: "<?php echo $cispm_background_form;?>" }, 800);
			return valid;
		});
	});
	</script>

<style type="text/css">
	<!--
	#style_cispm fieldset {
		background-color: transparent;
		margin: 0;
		padding: 5px;
	}
	
	#style_cispm {
		margin:0;
		padding:0;
		font-family: <?php echo $cispm_police_texte; ?>
	}
	
	#style_cispm table td, table th {
		border-right:0px;
		padding:0;
		text-align:left;
	}
	
	.input_cispm {
		margin:0;
		height: 18px;
		padding: 2px;
	}

	#style_cispm input, textarea, select {
		margin:0;
		padding:0;
	}
	
	#style_cispm table tr:hover td {
		margin: 0;
		padding: 0;
	}
	
	#formulaire_contact{
		margin:auto;
		border-radius:1em;
		-moz-border-radius:1em;
		-webkit-border-radius:1em;
		padding-bottom: 8px;
	}

	#formulaire_contact fieldset{
		border:none;
	}
	
	#formulaire_contact legend{
		margin-top:0.3em;
		font-weight:bold;
		padding-top: 15px;
		padding-left: 15px;
		padding-bottom: 15px;
		text-align: left;
	}
	
	#formulaire_contact label{
		width:200px;
		text-align:right;
	}
	
	#formulaire_contact input, form select, form textarea{
		margin-left:0.5em;
	}
	
	#formulaire_contact button{
		position:relative;
		left:160px;
	}
	
	#formulaire_contact span{
		display:block;
		text-align:right;
		background-color: transparent;
		padding: 0;
		background: url("");
		margin: 0;
	}
	
	#form_tableau {
		border:none;
		margin:0;
		background-color:transparent;
	}
	
	#form_td {
		border:none;
		background-color:transparent;
		vertical-align: top;
		padding-top: 3px;
	}
	
	.error-message {
		color: red;
		padding-left: 10px;
		padding-top:0;
		margin:0;
		margin-bottom: 10px;
	}
	
	#message_error {
		background-color:#d58b8d;
		border:1px solid #d2484b;
		-moz-border-radius-bottomleft:3px;
		-moz-border-radius-bottomright:3px;
		-moz-border-radius-topleft:3px;
		-moz-border-radius-topright:3px;
		margin:5px 15px 2px;
		padding:0.3em 0.6em;
		display: none;
		margin-bottom:10px;
	}
	
	#envoyer {
		margin-top:-20px;
	}
	-->
</style>

<?php
	$cispm_plugindir = get_option('siteurl').'/'.PLUGINDIR.'/really-simple-captcha';
	
	if($cispm_mail_reception <> "") {
		$cispm_hexa = '#'.$cispm_hexa;
		$cispm_hexa_titre = '#'.$cispm_hexa_titre;
		$cispm_hexa_texte = '#'.$cispm_hexa_texte;

		if($cispm_radio_pos == "center") {
			$cispm_radio_pos_form = "margin: 0 auto;";
		} else {
			$cispm_radio_pos_form = "float:".$cispm_radio_pos.";";
		}
		
		$formulaire = "<div id='message_error'></div>";
		
		if(eregi('MSIE', $_SERVER['HTTP_USER_AGENT'])) {
			$formulaire .= '<div id="style_cispm" class="arrondi" style="background-color:'.$cispm_hexa.';color:'.$cispm_hexa_texte.';width:'.$cispm_width_form.'px;font-size:'.$cispm_taille_texte.'px;font-family:'.$cispm_police_texte.';'.$cispm_radio_pos_form.'">';
			$formulaire .= '<form id="formulaire_contact" method="post" action="">';
		} else {
			$formulaire .= "<div id='style_cispm'>";
			$formulaire .= '<form id="formulaire_contact" method="post" action="" style="background-color:'.$cispm_hexa.';color:'.$cispm_hexa_texte.';width:'.$cispm_width_form.'px;font-size:'.$cispm_taille_texte.'px;font-family:'.$cispm_police_texte.';'.$cispm_radio_pos_form.'">';
		}

		$formulaire .= '<fieldset>';
		$formulaire .= '<legend style="background-color:transparent;color:'.$cispm_hexa_titre.';font-size:'.$cispm_taille_titre.'px;font-family:'.$cispm_police_titre.';">'.$cispm_titre_formulaire.'</legend>';
		
		$formulaire .= '<table id="form_tableau" width="100%">';
		if($cispm_radio_nom == 'o') {
			if($cispm_radio_nom_obl == "o") {
				$etoile = ' *';	
			} else {
				$etoile = '&nbsp;&nbsp;';	
			}
			$formulaire .= '<tr><td width="25%" id="form_td"><span id="span_nom">'.$cispm_nom.' <i>'.$etoile.'</i></span></td><td id="form_td"><input type="text" name="nom_input" id="nom_input" value="'.$nom.'" style="width:'.$cispm_nom_taille.'px;" class="input_cispm"/><div class="error-message"></div></td></tr>';
		}
		
		if($cispm_radio_prenom == 'o') {
			
			if($cispm_radio_prenom_obl == "o") {
				$etoile = ' *';	
			} else {
				$etoile = '&nbsp;&nbsp;';	
			}
			$formulaire .= '<tr><td width="25%" id="form_td"><span id="span_prenom">'.$cispm_prenom.' <i>'.$etoile.'</i></span></td><td id="form_td"><input type="text" name="prenom_input" class="input_cispm" id="prenom_input" value="'.$prenom.'" style="width:'.$cispm_prenom_taille.'px;"/><div class="error-message"></div></td></tr>';
		}
		
		$formulaire .= '<tr><td width="25%" id="form_td"><span id="span_mail">'.$cispm_mail.' <i>*</i></span></td><td id="form_td"><input type="text" name="mail_input" id="mail_input" class="input_cispm" value="'.$mail.'" style="width:'.$cispm_mail_taille.'px;"/><div class="error-message"></div></td></tr>';
		
		if($cispm_radio_site_web == 'o') {
			
			if($cispm_radio_site_web_obl == "o") {
				$etoile = ' *';	
			} else {
				$etoile = '&nbsp;&nbsp;';	
			}
			
			if($site_web == "") {
				$site_web = "http://";	
			}
			
			$formulaire .= '<tr><td width="25%" id="form_td"><span id="span_site_web">'.$cispm_site_web.' <i>'.$etoile.'</i></span></td><td id="form_td"><input type="text" name="site_web_input" class="input_cispm" id="site_web_input" value="'.$site_web.'" style="width:'.$cispm_site_web_taille.'px;"/><div class="error-message"></div></td></tr>';
		}
		
		$formulaire .= '<tr><td width="25%" id="form_td"><span id="span_objet">'.$cispm_objet.'<i> *</i></span></td><td id="form_td"><input type="text" name="objet_input" id="objet_input" class="input_cispm" value="'.$sujet.'" style="width:'.$cispm_objet_taille.'px;"/><div class="error-message"></div></td></tr>';
		$formulaire .= '<tr><td width="25%" id="form_td" style="vertical-align:top;"><span id="span_message">'.$cispm_message.'<i> *</i></span></td><td id="form_td"><textarea rows="8" name="message_input" id="message_input" style="width:'.$cispm_message_taille.'px;">'.$contenu.'</textarea><div class="error-message"></div></td></tr>';

		$padding_captcha = "";
		if($cispm_radio_copie == 'o') {
			$formulaire .= '<tr><td id="form_td"></td><td id="form_td" align="left"><input type="checkbox" name="copie_input" style="width:15px;" id="copie_input" value="rec_copie"/>&nbsp;&nbsp;<label for="copie_input">'.$cispm_copie.'</label></td></td></tr>';
			$padding_captcha = 'padding-top:16px;';
		} else {
			$padding_captcha = 'padding-top:5px;';
		}
		
		if($cispm_radio_captcha == "cispm_captcha") {
			$formulaire .= '<tr><td width="25%" id="form_td"></td>
							<td id="form_td" align="left" style="'.$padding_captcha.'"><div id="span_captcha">'.$cispm_captcha_texte.'</div></td></tr>
							<tr><td width="25%" id="form_td"></td>
							<td id="form_td" align="left" style="padding-top:5px;padding-bottom:10px;"><div style="float:left;"><img src="'.$cispm_plugindir.'/tmp/'.$image.'" alt="Captcha"/></div>
							<div style="float:left;" id="span_input_captcha"><input type="text" value="'.$captcha.'" class="input_cispm" name="captcha" id="captcha" size="2" maxlength="4"/></div>
							<div class="error-message"></div></td></tr>';
			$formulaire .= '<input type="hidden" value="'.$prefix.'" name="prefixa" id="prefixa"/>';
		} else if($cispm_radio_captcha == "cispm_question"){
			$formulaire .= '<tr><td id="form_td"></td>
							<td id="form_td" align="left" style="'.$padding_captcha.'padding-left:6px;"><div id="cispm_span_question">'.$cispm_question_texte.'</div></td></tr>';
			$formulaire .= '<tr><td id="form_td"></td>
							<td id="form_td" align="left"><input type="text" name="cispm_input_reponse" class="input_cispm" style="width:'.$cispm_taille_reponse.'px;" id="cispm_input_reponse" value=""/>
							<div class="error-message"></div></td></tr>';
		} else if($cispm_radio_captcha == "cispm_caseacocher"){
			$formulaire .= '<tr><td id="form_td"></td>
							<td id="form_td" align="left" style="'.$padding_captcha.'"><input type="checkbox" name="cispm_input_caseacocher" style="width:15px;" id="cispm_input_caseacocher" value="caseacocher_input"/>&nbsp;&nbsp;<label for="cispm_input_caseacocher" id="texte_cocher">'.$cispm_caseacocher_texte.'</label>
							<div class="error-message"></div></td></tr>';
		} else {
			$formulaire .= '<tr><td id="form_td"></td>
							<td id="form_td" align="left" style="'.$padding_captcha.'">
							<div class="error-message"></div></td></tr>';
		}
		
		$formulaire .= '</table>';
		$formulaire .= '<br/><center><input type="submit" value="'.$cispm_valider.'" id="envoyer" style="width:'.$cispm_valider_taille.'px;"/></center>';
		$formulaire .= '</fieldset>';
		$formulaire .= '<input type="hidden" name="cispm_envoie" value="ENVOIE_FORM"/>';
		
		if($cispm_obligatoire_pos == "in") {
			$formulaire .= '&nbsp;&nbsp;&nbsp;<i>'.$cispm_obligatoire.'</i><br/><br/>';
			$formulaire .= '</form>';
			//if(eregi('MSIE', $_SERVER['HTTP_USER_AGENT'])) {
				$formulaire .= '</div>';
			//}
			
			$formulaire .= '<div style="clear:both;"></div>';
		} else {
			$formulaire .= '</form>';
			//if(eregi('MSIE', $_SERVER['HTTP_USER_AGENT'])) {
				$formulaire .= '</div>';
			//}
			
			$formulaire .= '<div style="clear:both;"></div>';
			$formulaire .= '<i>'.$cispm_obligatoire.'</i><br/><br/>';
		}
		
	} else {
		$formulaire = __('Si vous venez d\'activer ce plugin, merci de vous rendre sur <a target="_blank" href="'.get_option('siteurl').'/wp-admin">la page administration</a> de WordPress section Réglages > Formulaire de contact, afin de valider les informations ("Appliquer les modifications").<br/><br/>Vous devez obligatoirement renseigner le champ mail pour faire fonctionner le formulaire.', 'cispm-contact-mail');	
	}
	
	$texte = str_replace('[cispm-contact-mail]', $formulaire,$texte);
	return $texte;
}

function remplacer_ancien_texte($texte) {
	$avertissement = __('Afin de rendre le plugin compatible avec plus de thème, le code d\'insertion du plugin dans cette page a changé.
					<br/>Veuillez modifier le code d\'insertion du plugin de votre page par [cispm-contact-mail], 
					veuillez nous excuser pour la gêne exceptionnelle occasionnée', 'cispm-contact-mail');
	$texte = str_replace('<!--formulaire de contact-->', $avertissement,$texte);
	return $texte;
}

//*************** FONCTION VERIFICATION INPUT *********

//------- CHAMP MAIL ----------//
function isMail($input_mail) {
	$pattern = "^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,7}$";
	return (eregi($pattern,$input_mail)) ? true : false;
}

//------- CHAMP URL -----------//
function isUrl ($input_url) {
	if(substr($input_url,0,7) == 'http://') {
		return true;
	} else {
		return false;	
	}
}

//------- CHAMP VALIDE --------//
function verif_champ($input_valide) {
	$output = htmlspecialchars($input_valide);
    $output = str_replace("&lt;","<",$output);
    $output = str_replace("&gt;",">",$output);
    $output = str_replace("&quot;",'"',$output);
    $output = str_replace("&amp;",'&',$output);
    $output = str_replace("&acute;","'",$output);
	$output = stripslashes($output);
	return $output;
}	

//*************** PAGE D'ADMINISTRATION ***************
function cispm_admin_actions() {
    $formulaire = __('Cispm contact form','cispm-contact-mail');
    add_options_page("Formulaires contact", $formulaire, 'manage_options', "cispm-contact-mail/cispm09_contact_admin.php");
}

function cispm_activate() {
	$cispm_mail_reception = get_option('admin_email');	
	update_option('cispm_mail_reception', $cispm_mail_reception);
	update_option('cispm_width_form', '450');
}

add_action('admin_menu', 'cispm_admin_actions');

add_filter('the_content','remplacer_texte');
add_filter('the_content','remplacer_ancien_texte');

register_activation_hook( __FILE__, 'cispm_activate' );
?>