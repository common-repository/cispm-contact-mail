<?php 

//Administration du formulaire de contact
echo "<h2>" . __( 'Administration du formulaire de contact', 'cispm-contact-mail' ) . "</h2>";

	if(isset($_POST['cispm_defaut_form'])) {
		$cispm_mail_reception = $_POST['cispm_mail_reception'];
		update_option('cispm_mail_reception', $cispm_mail_reception);
		
		if($cispm_mail_reception == "") {
			$cispm_mail_reception = get_option('admin_email');	
			update_option('cispm_mail_reception', $cispm_mail_reception);
		}
		
		$blog_name = get_option('blogname');
		$blog_name_crochet = "[".$blog_name."]";
		update_option('cispm_prefixe', $blog_name_crochet);
		update_option('cispm_titre_formulaire', __('Formulaire de contact', 'cispm-contact-mail'));
		update_option('cispm_nom', __('Nom', 'cispm-contact-mail'));
		update_option('cispm_radio_nom', 'o');
		update_option('cispm_radio_nom_obl', 'o');
		update_option('cispm_prenom', __('Prénom', 'cispm-contact-mail'));
		update_option('cispm_radio_prenom', 'n');
		update_option('cispm_radio_prenom_obl', 'n');
		update_option('cispm_mail', __('Mail', 'cispm-contact-mail'));
		update_option('cispm_site_web', __('Site internet', 'cispm-contact-mail'));
		update_option('cispm_radio_site_web', 'o');
		update_option('cispm_radio_site_web_obl', 'n');
		update_option('cispm_objet', __('Sujet', 'cispm-contact-mail'));
		update_option('cispm_message', __('Message', 'cispm-contact-mail'));
		update_option('cispm_copie', __('Recevoir une copie du mail', 'cispm-contact-mail'));
		update_option('cispm_radio_copie', 'o');
		update_option('cispm_valider', __('Envoyer le mail', 'cispm-contact-mail'));
		update_option('cispm_hexa', 'e5e5e5');
		update_option('cispm_hexa_titre', '777777');
		update_option('cispm_hexa_texte', '777777');
		update_option('cispm_taille_texte', '15');
		update_option('cispm_police_texte', 'Cambria');
		update_option('cispm_taille_titre', '30');
		update_option('cispm_police_titre', 'Cambria');
		update_option('cispm_width_form', '450');
		update_option('cispm_radio_pos', 'center');
		update_option('cispm_nom_taille', '260');
		update_option('cispm_prenom_taille', '260');
		update_option('cispm_mail_taille', '260');
		update_option('cispm_site_web_taille', '260');
		update_option('cispm_objet_taille', '260');
		update_option('cispm_message_taille', '260');
		update_option('cispm_valider_taille', '200');
		update_option('cispm_obligatoire', __('* Champ(s) Obligatoire(s)', 'cispm-contact-mail'));
		update_option('cispm_obligatoire_pos', 'out');
		update_option('cispm_hexa_texte_erreur', 'C9DF0D');
		update_option('cispm_hexa_input_erreur', 'C9DF0D');
		update_option('cispm_hexa_form_erreur', 'C9DF0D');
		update_option('cispm_dessus_formulaire', '');
		update_option('cispm_dessous_champ', '');
		update_option('cispm_mess_erreur',  __('Ce champ est obligatoire', 'cispm-contact-mail'));
		update_option('cispm_radio_captcha', 'cispm_aucun');
		update_option('cispm_captcha_texte_couleur', 'FFFFFF');
		update_option('cispm_captcha_fond_couleur', '000000');
		update_option('cispm_debut_message', '[DEBUT DU MESSAGE]');
		
		?>
		<div id="message" class="updated fade">
			<p><strong><?php _e('Thème par défaut sélectionné avec succès.','cispm-contact-mail'); ?></strong></p>
		</div>
		<?php
	}
	
	//Si envoie du formulaire, alors enregistrement des variables dans wordpress
	if(isset($_POST['submit'])) {
		//Récupération et enregistrement des variables
		$cispm_mail_reception = $_POST['cispm_mail_reception'];
		update_option('cispm_mail_reception', $cispm_mail_reception);
		
		if($cispm_mail_reception == "") {
			$cispm_mail_reception = get_option('admin_email');	
			update_option('cispm_mail_reception', $cispm_mail_reception);
		}
		
		$cispm_prefixe = $_POST['cispm_prefixe'];
		update_option('cispm_prefixe', $cispm_prefixe);
				
		$cispm_nom = $_POST['cispm_nom'];
		update_option('cispm_nom', $cispm_nom);
		
		$cispm_radio_nom = $_POST['cispm_radio_nom'];
		update_option('cispm_radio_nom', $cispm_radio_nom);
		
		$cispm_radio_nom_obl = $_POST['cispm_radio_nom_obl'];
		update_option('cispm_radio_nom_obl', $cispm_radio_nom_obl);
		
		$cispm_titre_formulaire = $_POST['cispm_titre_formulaire'];
		update_option('cispm_titre_formulaire', $cispm_titre_formulaire);
		
		$cispm_prenom = $_POST['cispm_prenom'];
		update_option('cispm_prenom', $cispm_prenom);
		
		$cispm_radio_prenom = $_POST['cispm_radio_prenom'];
		update_option('cispm_radio_prenom', $cispm_radio_prenom);
		
		$cispm_radio_prenom_obl = $_POST['cispm_radio_prenom_obl'];
		update_option('cispm_radio_prenom_obl', $cispm_radio_prenom_obl);
		
		$cispm_mail = $_POST['cispm_mail'];
		update_option('cispm_mail', $cispm_mail);
		
		$cispm_site_web = $_POST['cispm_site_web'];
		update_option('cispm_site_web', $cispm_site_web);
		
		$cispm_radio_site_web = $_POST['cispm_radio_site_web'];
		update_option('cispm_radio_site_web', $cispm_radio_site_web);
		
		$cispm_radio_site_web_obl = $_POST['cispm_radio_site_web_obl'];
		update_option('cispm_radio_site_web_obl', $cispm_radio_site_web_obl);
		
		$cispm_objet = $_POST['cispm_objet'];
		update_option('cispm_objet', $cispm_objet);
		
		$cispm_message = $_POST['cispm_message'];
		update_option('cispm_message', $cispm_message);
		
		$cispm_copie = $_POST['cispm_copie'];
		update_option('cispm_copie', $cispm_copie);
		
		$cispm_radio_copie = $_POST['cispm_radio_copie'];
		update_option('cispm_radio_copie', $cispm_radio_copie);
		
		$cispm_valider = $_POST['cispm_valider'];
		update_option('cispm_valider', $cispm_valider);
		
		$cispm_hexa = $_POST['cispm_hexa'];
		update_option('cispm_hexa', $cispm_hexa);
		
		$cispm_hexa_titre = $_POST['cispm_hexa_titre'];
		update_option('cispm_hexa_titre', $cispm_hexa_titre);
		
		$cispm_hexa_texte = $_POST['cispm_hexa_texte'];
		update_option('cispm_hexa_texte', $cispm_hexa_texte);
		
		$cispm_taille_texte = $_POST['cispm_taille_texte'];
		update_option('cispm_taille_texte', $cispm_taille_texte);
		
		$cispm_police_texte = $_POST['cispm_police_texte'];
		update_option('cispm_police_texte', $cispm_police_texte);
		
		$cispm_taille_titre = $_POST['cispm_taille_titre'];
		update_option('cispm_taille_titre', $cispm_taille_titre);
		
		$cispm_police_titre = $_POST['cispm_police_titre'];
		update_option('cispm_police_titre', $cispm_police_titre);
		
		$cispm_width_form = $_POST['cispm_width_form'];
		update_option('cispm_width_form', $cispm_width_form);
	
		$cispm_radio_pos = $_POST['cispm_radio_pos'];
		update_option('cispm_radio_pos', $cispm_radio_pos);
		
		$cispm_nom_taille = $_POST['cispm_nom_taille'];
		update_option('cispm_nom_taille', $cispm_nom_taille);
		
		$cispm_prenom_taille = $_POST['cispm_prenom_taille'];
		update_option('cispm_prenom_taille', $cispm_prenom_taille);
		
		$cispm_mail_taille = $_POST['cispm_mail_taille'];
		update_option('cispm_mail_taille', $cispm_mail_taille);
		
		$cispm_site_web_taille = $_POST['cispm_site_web_taille'];
		update_option('cispm_site_web_taille', $cispm_site_web_taille);
		
		$cispm_objet_taille = $_POST['cispm_objet_taille'];
		update_option('cispm_objet_taille', $cispm_objet_taille);
		
		$cispm_message_taille = $_POST['cispm_message_taille'];
		update_option('cispm_message_taille', $cispm_message_taille);
		
		$cispm_valider_taille = $_POST['cispm_valider_taille'];
		update_option('cispm_valider_taille', $cispm_valider_taille);
		
		$cispm_obligatoire = $_POST['cispm_obligatoire'];
		if($cispm_obligatoire == "") {
			$cispm_obligatoire = __('* Champ(s) Obligatoire(s)', 'cispm-contact-mail');
		}
		update_option('cispm_obligatoire', $cispm_obligatoire);
		
		$cispm_obligatoire_pos = $_POST['cispm_obligatoire_pos'];
		update_option('cispm_obligatoire_pos', $cispm_obligatoire_pos);

		$cispm_hexa_texte_erreur = $_POST['cispm_hexa_texte_erreur'];
		update_option('cispm_hexa_texte_erreur', $cispm_hexa_texte_erreur);
		
		$cispm_hexa_input_erreur = $_POST['cispm_hexa_input_erreur'];
		update_option('cispm_hexa_input_erreur', $cispm_hexa_input_erreur);
		
		$cispm_hexa_form_erreur = $_POST['cispm_hexa_form_erreur'];
		update_option('cispm_hexa_form_erreur', $cispm_hexa_form_erreur);
		
		$cispm_dessus_formulaire = $_POST['option1'];
		update_option('cispm_dessus_formulaire', $cispm_dessus_formulaire);
		
		$cispm_dessous_champ = $_POST['option2'];
		update_option('cispm_dessous_champ', $cispm_dessous_champ);
		
		$cispm_mess_erreur = $_POST['cispm_mess_erreur'];
		update_option('cispm_mess_erreur', $cispm_mess_erreur);
		
		$cispm_radio_captcha = $_POST['cispm_radio_captcha'];
		update_option('cispm_radio_captcha', $cispm_radio_captcha);
		
		$cispm_question_texte = $_POST['cispm_question_texte'];
		update_option('cispm_question_texte', $cispm_question_texte);
		
		$cispm_reponse_texte = $_POST['cispm_reponse_texte'];
		update_option('cispm_reponse_texte', $cispm_reponse_texte);
		
		$cispm_caseacocher_texte = $_POST['cispm_caseacocher_texte'];
		update_option('cispm_caseacocher_texte', $cispm_caseacocher_texte);
		
		$cispm_taille_reponse = $_POST['cispm_taille_reponse'];
		if($cispm_taille_reponse == "" || $cispm_taille_reponse == 0) {
			$cispm_taille_reponse = 150;
			update_option('cispm_taille_reponse', $cispm_taille_reponse);
		} else {
			update_option('cispm_taille_reponse', $cispm_taille_reponse);
		}
		
		$cispm_captcha_texte = $_POST['cispm_captcha_texte'];
		update_option('cispm_captcha_texte', $cispm_captcha_texte);
		
		$cispm_captcha_texte_couleur = $_POST['cispm_captcha_texte_couleur'];
		if($cispm_captcha_texte_couleur == "") {
			$cispm_captcha_texte_couleur = "FFFFFF";
		}
		update_option('cispm_captcha_texte_couleur', $cispm_captcha_texte_couleur);
		
		$cispm_captcha_fond_couleur = $_POST['cispm_captcha_fond_couleur'];
		if($cispm_captcha_fond_couleur == "") {
			$cispm_captcha_fond_couleur = "000000";
		}
		update_option('cispm_captcha_fond_couleur', $cispm_captcha_fond_couleur);
		
		//Affichage d'un message comme quoi les nouveaux paramètres sont correctment enregistrés
		?>
		<div id="message" class="updated fade">
			<p><strong><?php _e('Modifications apportées avec succès.','cispm-contact-mail'); ?></strong></p>
		</div>
		<?php
	}
	//Sinon on récupère les variables pour pouvoir les afficher dans la page d'administration
	else 
	{
		//Récupération des variables
		$cispm_mail_reception = get_option('cispm_mail_reception');
		$cispm_prefixe = get_option('cispm_prefixe');
		$cispm_titre_formulaire = get_option('cispm_titre_formulaire');
		$cispm_nom = get_option('cispm_nom');
		$cispm_radio_nom = get_option('cispm_radio_nom');
		$cispm_radio_nom_obl = get_option('cispm_radio_nom_obl');
		if($cispm_radio_nom_obl == "") {
			$cispm_radio_nom_obl = "o";
		}
		$cispm_prenom = get_option('cispm_prenom');
		$cispm_radio_prenom = get_option('cispm_radio_prenom');
		$cispm_radio_prenom_obl = get_option('cispm_radio_prenom_obl');
		$cispm_mail = get_option('cispm_mail');
		$cispm_site_web = get_option('cispm_site_web');
		$cispm_radio_site_web = get_option('cispm_radio_site_web');
		$cispm_radio_site_web_obl = get_option('cispm_radio_site_web_obl');
		$cispm_objet = get_option('cispm_objet');
		$cispm_message = get_option('cispm_message');
		$cispm_copie = get_option('cispm_copie');
		$cispm_radio_copie = get_option('cispm_radio_copie');
		$cispm_valider = get_option('cispm_valider');
		$cispm_hexa = get_option('cispm_hexa');
		$cispm_hexa_titre = get_option('cispm_hexa_titre');
		$cispm_hexa_texte = get_option('cispm_hexa_texte');
		$cispm_width_form = get_option('cispm_width_form');
		$cispm_taille_texte = get_option('cispm_taille_texte');
		$cispm_police_texte = get_option('cispm_police_texte');
		$cispm_taille_titre = get_option('cispm_taille_titre');
		$cispm_police_titre = get_option('cispm_police_titre');
		$cispm_radio_pos = get_option('cispm_radio_pos');
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
		
		if($cispm_mail_reception == "") {
			$cispm_mail_reception = get_option('admin_email');	
		}
	}
	
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
		
	$cispm_plugindir = get_option('siteurl').'/'.PLUGINDIR.'/'.dirname(plugin_basename(__FILE__));
?>
<style type="text/css">
	<!-- 
	.myColorPicker {
		background:transparent url(<?php echo $cispm_plugindir."/image/palette.png";?>) no-repeat 99% center;
		padding-right:20px;
	}
	#myColorPicker {
		background-color:#000;
		border:1px solid #000;
		margin:-1px;
		width:390px;
	}
	#myColorPicker ul {
		width:360px;
		margin-right:30px;
	}
	#myColorPicker * {
		margin:0; padding:0;
	}
	#myColorPicker a {
		cursor:pointer;
		display:block;
		width:10px; height:10px;
	}
	#myColorPicker li {
		float:left;
		list-style:none;
	}
	#myColorPicker a.close {
		background:transparent url(<?php echo $cispm_plugindir."/image/close.png";?>) center center;
		position:absolute;
		text-indent:-5000px;
		top:-10px; right:-10px;
		width:20px; height:20px;
	}
	-->
</style>
<div class="form_admin">

<form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<?php    echo "<h4>" . __( 'Paramétrage compte mail', 'cispm-contact-mail' ) . "</h4>"; ?>

	<table width="100%">	
	<!-- MAIL RECEPTION -->
		<tr>
			<td width="15%"><?php _e('Adresse mail réception','cispm-contact-mail'); ?></td>
			<td width="30%"><input type="text" name="cispm_mail_reception" value="<?php echo $cispm_mail_reception; ?>" size="30"/></td>
			<td width="35%" align="right" align="right" style="padding-right:10px;"><input type="submit" name="cispm_defaut_form" class="button-primary" value="<?php  echo _e('Utiliser le thème du formulaire par défaut', 'cispm-contact-mail' );?>" size="30"/></td>
		</tr>
	
	<!-- PREFIXE DANS LE CHAMP OBJET -->
		<tr>
			<td width="15%"><?php _e('Préfixe objet mail','cispm-contact-mail'); ?></td>
			<td width="50%"><input type="text" name="cispm_prefixe" value="<?php echo $cispm_prefixe; ?>" size="30"/><i>&nbsp;&nbsp;<?php  echo _e('Ajoute au titre du mail, un champ personnalisé.', 'cispm-contact-mail' );?></i></td>
			<td width="35%" align="right" style="padding-right:10px;"> <?php  echo _e('Attention ceci effacera tous vos réglages !', 'cispm-contact-mail' );?></td>
		</tr>
		<tr>
			<td colspan="3">
				<?php 
					_e('Pour installer le plugin sur une page WordPress, ajouter dans votre page le code html suivant: ', 'cispm-contact-mail' );
					$var = "[cispm-contact-mail]"; 
					$var = htmlentities($var);
					echo $var;
					_e(' (Choisir l\'onglet HTML).', 'cispm-contact-mail' );
				?>
			</td>
		</tr>
	
	</table>
	
	<hr/>
	
	<?php    echo "<h4>" . __('Modification libellé des champs', 'cispm-contact-mail' ) . "</h4>"; ?>
		
	<!-- TITRE DU FORMULAIRE DE CONTACT -->
	<table>
		<tr>
			<th></th>
			<th style="text-align:left;">
				<?php _e('Libellé', 'cispm-contact-mail' ); ?>
			</th>
			<th style="text-align:left;">
				<?php _e('Valeur par défaut (si vide)', 'cispm-contact-mail' ); ?>
			</th>
			<th style="text-align:left;">
				<?php _e('Activer le champ', 'cispm-contact-mail' ); ?>
			</th>
			<th style="text-align:left;">
				<?php _e('Rendre le champ obligatoire', 'cispm-contact-mail' ); ?>
			</th>
			<th style="text-align:left;">
				<?php _e('Taille du champ de saisie', 'cispm-contact-mail' ); ?>
			</th>
		</tr>
	
		<tr>
			<td width="160"><?php _e('Titre du formulaire', 'cispm-contact-mail'); ?></td>
			<td width="200"><input type="text" name="cispm_titre_formulaire" value="<?php echo $cispm_titre_formulaire; ?>" size="30"/></td>
			<td width="190"><?php _e('Formulaire de contact', 'cispm-contact-mail'); ?> </td>
			<td width="150"><i> - </i></td>
			<td width="140"><i> - </i></td>
			<td width="150"><i> - <i/></td>
		</tr>

	<?php
		if($cispm_radio_nom == "o") {
			$oui = "checked";
			$non = "";	
		} else {
			$oui = "";
			$non = "checked";
		}

		if($cispm_radio_nom_obl == "o") {
			$oui_obl = "checked";
			$non_obl = "";	
		} else {
			$oui_obl = "";
			$non_obl = "checked";
		}
	?>
	<!-- NOM (Falcultatif) -->

			<td width="160"><?php _e('Libellé nom', 'cispm-contact-mail'); ?></td>
			<td width="200"><input type="text" name="cispm_nom" value="<?php echo $cispm_nom; ?>" size="30"/></td>
			<td width="190"><?php _e('Nom', 'cispm-contact-mail'); ?> </td>
			<td width="150">
				<input type="radio" name='cispm_radio_nom' value='o' <?php echo $oui ?> id='cispm_radio_nom_1'/><label for="cispm_radio_nom_1"><?php _e('Oui', 'cispm-contact-mail' ); ?></label> 
				&nbsp;&nbsp;<input type="radio" name='cispm_radio_nom' value='n' <?php echo $non ?> id='cispm_radio_nom_2'/><label for="cispm_radio_nom_2"><?php _e('Non', 'cispm-contact-mail' ); ?></label>
			</td>
			<td width="140">
				<input type="radio" name='cispm_radio_nom_obl' value='o' <?php echo $oui_obl ?> id='cispm_radio_nom_3'/><label for="cispm_radio_nom_3"><?php _e('Oui', 'cispm-contact-mail' ); ?></label>
				&nbsp;&nbsp;<input type="radio" name='cispm_radio_nom_obl' value='n' <?php echo $non_obl ?> id='cispm_radio_nom_4'/><label for="cispm_radio_nom_4"><?php _e('Non', 'cispm-contact-mail' ); ?></label>
			</td>
			<td width="150"><input type="text" name="cispm_nom_taille" value="<?php echo $cispm_nom_taille; ?>" size="3"/> px</td>
		
	<!-- PRENOM (Falcultatif) -->
	<?php
		if($cispm_radio_prenom == "o") {
			$oui = "checked";
			$non = "";	
		} else {
			$oui = "";
			$non = "checked";
		}
		
		if($cispm_radio_prenom_obl == "o") {
			$oui_obl = "checked";
			$non_obl = "";	
		} else {
			$oui_obl = "";
			$non_obl = "checked";
		}
	?>
	
		<tr>
			<td width="160"><?php _e('Libellé prénom', 'cispm-contact-mail'); ?></td>
			<td width="200"><input type="text" name="cispm_prenom" value="<?php echo $cispm_prenom; ?>" size="30"/></td>
			<td width="190"><?php _e('Prénom', 'cispm-contact-mail'); ?></td>
			<td width="150">
				<input type="radio" name='cispm_radio_prenom' value='o' <?php echo $oui ?> id='cispm_radio_prenom_1'/><label for="cispm_radio_prenom_1"><?php _e('Oui', 'cispm-contact-mail' ); ?></label> 
				&nbsp;&nbsp;<input type="radio" name='cispm_radio_prenom' value='n' <?php echo $non ?> id='cispm_radio_prenom_2'/><label for="cispm_radio_prenom_2"><?php _e('Non', 'cispm-contact-mail' ); ?></label>
			</td>
			<td width="140">
				<input type="radio" name='cispm_radio_prenom_obl' value='o' <?php echo $oui_obl ?> id='cispm_radio_prenom_3'/><label for="cispm_radio_prenom_3"><?php _e('Oui', 'cispm-contact-mail' ); ?></label> 
				&nbsp;&nbsp;<input type="radio" name='cispm_radio_prenom_obl' value='n' <?php echo $non_obl ?> id='cispm_radio_prenom_4'/><label for="cispm_radio_prenom_4"><?php _e('Non', 'cispm-contact-mail' ); ?></label>
			</td>
			<td width="150"><input type="text" name="cispm_prenom_taille" value="<?php echo $cispm_prenom_taille; ?>" size="3"/> px</td>
		</tr>
	
	<!-- MAIL (Obligatoire) -->
		<tr>
			<td width="160"><?php _e('Libellé mail', 'cispm-contact-mail'); ?></td>
			<td width="200"><input type="text" name="cispm_mail" value="<?php echo $cispm_mail; ?>" size="30"/></td>
			<td width="190"><?php _e('Mail', 'cispm-contact-mail'); ?> </td>
			<td width="150"><i><?php _e('(Obligatoire)', 'cispm-contact-mail' ); ?></i></td>
			<td width="140"><i><?php _e('(Obligatoire)', 'cispm-contact-mail' ); ?></i></td>
			<td width="150"><input type="text" name="cispm_mail_taille" value="<?php echo $cispm_mail_taille; ?>" size="3"/> px</td>
		</tr>
	
	<!-- SITE WEB (Facultatif) -->
	<?php
		if($cispm_radio_site_web == "o") {
			$oui = "checked";
			$non = "";	
		} else {
			$oui = "";
			$non = "checked";
		}
		
		if($cispm_radio_site_web_obl == "o") {
			$oui_obl = "checked";
			$non_obl = "";	
		} else {
			$oui_obl = "";
			$non_obl = "checked";
		}
	?>
	
		<tr>
			<td width="160"><?php _e('Libellé Site Web', 'cispm-contact-mail'); ?></td>
			<td width="200"><input type="text" name="cispm_site_web" value="<?php echo $cispm_site_web; ?>" size="30"/></td>
			<td width="190"><?php _e('Site Web', 'cispm-contact-mail'); ?></td>
			<td width="150">
				<input type="radio" name='cispm_radio_site_web' value='o' <?php echo $oui ?> id='cispm_radio_site_web_1'/><label for="cispm_radio_site_web_1"><?php _e('Oui', 'cispm-contact-mail' ); ?></label>
				&nbsp;&nbsp;<input type="radio" name='cispm_radio_site_web' value='n' <?php echo $non ?> id='cispm_radio_site_web_2'/><label for="cispm_radio_site_web_2"><?php _e('Non', 'cispm-contact-mail' ); ?></label>
			</td>
			<td width="140">
				<input type="radio" name='cispm_radio_site_web_obl' value='o' <?php echo $oui_obl ?> id='cispm_radio_site_web_3'/><label for="cispm_radio_site_web_3"><?php _e('Oui', 'cispm-contact-mail' ); ?></label> 
				&nbsp;&nbsp;<input type="radio" name='cispm_radio_site_web_obl' value='n' <?php echo $non_obl ?>  id='cispm_radio_site_web_4'/><label for="cispm_radio_site_web_4"><?php _e('Non', 'cispm-contact-mail' ); ?></label>
			</td>
			<td width="150"><input type="text" name="cispm_site_web_taille" value="<?php echo $cispm_site_web_taille; ?>" size="3"/> px</td>
		</tr>
	
	<!-- OBJET (Obligatoire) -->
		<tr>
			<td width="160"><?php _e('Libellé objet', 'cispm-contact-mail'); ?></td>
			<td width="200"><input type="text" name="cispm_objet" value="<?php echo $cispm_objet; ?>" size="30"/></td>
			<td width="190"><?php _e('Objet', 'cispm-contact-mail'); ?></td>
			<td width="150"><i><?php _e('(Obligatoire)', 'cispm-contact-mail' ); ?></i></td>
			<td width="140"><i><?php _e('(Obligatoire)', 'cispm-contact-mail' ); ?></i></td>
			<td width="150"><input type="text" name="cispm_objet_taille" value="<?php echo $cispm_objet_taille; ?>" size="3"/> px</td>
		</tr>
	
	<!-- MESSAGE (Obligatoire) -->
		<tr>
			<td width="160"><?php _e('Libellé message', 'cispm-contact-mail'); ?></td>
			<td width="200"><input type="text" name="cispm_message" value="<?php echo $cispm_message; ?>" size="30"/></td>
			<td width="190"><?php _e('Message','cispm-contact-mail' ); ?></td>
			<td width="150"><i><?php _e('(Obligatoire)', 'cispm-contact-mail' ); ?></i></td>
			<td width="140"><i><?php _e('(Obligatoire)', 'cispm-contact-mail' ); ?></i></td>
			<td width="150"><input type="text" name="cispm_message_taille" value="<?php echo $cispm_message_taille; ?>" size="3"/> px</td>
		</tr>
	
	<!-- COPIE (Facultatif) -->
	<?php
		if($cispm_radio_copie == "o") {
			$oui = "checked";
			$non = "";	
		} else {
			$oui = "";
			$non = "checked";
		}
	?>
	
		<tr>
			<td width="160"><?php _e('Libellé copie mail', 'cispm-contact-mail'); ?></td>
			<td width="200"><input type="text" name="cispm_copie" value="<?php echo $cispm_copie; ?>" size="30"/></td>
			<td width="190"><?php _e('Recevoir copie', 'cispm-contact-mail'); ?></td>
			<td width="150">
				<input type="radio" name='cispm_radio_copie' value='o' <?php echo $oui ?> id='cispm_radio_copie_1'/><label for="cispm_radio_copie_1"><?php _e('Oui', 'cispm-contact-mail' ); ?></label>
				&nbsp;&nbsp;<input type="radio" name='cispm_radio_copie' value='n' <?php echo $non ?> id='cispm_radio_copie_2'/><label for="cispm_radio_copie_2"><?php _e('Non', 'cispm-contact-mail' ); ?></label>
			</td>
			<td width="140"><i> - </i></td>
			<td width="150"><i> - </i></td>
		</tr>
	
	<!-- BOUTON ENVOYER -->
		<tr>
			<td width="160"><?php _e('Libellé bouton envoie', 'cispm-contact-mail'); ?></td>
			<td width="200"><input type="text" name="cispm_valider" value="<?php echo $cispm_valider; ?>" size="30"/></td>
			<td width="190"><?php _e('Envoyer le message', 'cispm-contact-mail'); ?></td>
			<td width="150"><i> - </td>
			<td width="140"><i> - </td>
			<td width="150"><input type="text" name="cispm_valider_taille" value="<?php echo $cispm_valider_taille; ?>" size="3"/> px</td>
		</tr>
	</table>
	
	<hr />
	
	<table>
		<tr>
			<td colspan='2'><i><strong><?php _e('Mise en forme du formulaire', 'cispm-contact-mail' ); ?></strong></i></td>
		</tr>
		<tr>
			<td width="300"><?php _e('Couleur de fond en hexadécimal', 'cispm-contact-mail' ); ?></td>
			<?php
				if($cispm_hexa == "") {
					?><td>#<input type="text" name="cispm_hexa" class="myColorPicker" id="cispm_hexa" value="<?php echo $cispm_hexa; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span> <?php _e('Aucune couleur', 'cispm-contact-mail' ); ?> </span></i></td><?php
				} else {	
					?><td>#<input type="text" name="cispm_hexa" class="myColorPicker" id="cispm_hexa" value="<?php echo $cispm_hexa; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span style='border:1px solid black;background-color:#<?php echo $cispm_hexa; ?>;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></i></td><?php
				}
			?>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					$('.myColorPicker').myColorPicker();
				});
			</script>
		</tr>
		<tr>
			<td width="300"><?php _e('Taille du formulaire (width)', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" style="margin-left:10px;" name="cispm_width_form" value="<?php echo $cispm_width_form; ?>" size="8"/> <i><?php _e('px (vide = taille automatique, minimun 300px)', 'cispm-contact-mail' ); ?></i></td>
		</tr>
		<?php
			if($cispm_radio_pos == "") {
				$cispm_radio_pos = "center";
			}
			
			if($cispm_radio_pos == "left") {
				$l = "checked";
				$c = "";
				$d = "";	
			} else if($cispm_radio_pos == "center") {
				$l = "";
				$c = "checked";
				$d = "";
			} else {
				$l = "";
				$c = "";
				$d = "checked";
			}
		?>
		<tr>
			<td width="300"><?php _e('Position du formulaire', 'cispm-contact-mail' ); ?></td>
			<td>
				<input type="radio" name='cispm_radio_pos' value='left' <?php echo $l ?>  style="margin-left:10px;" id='cispm_radio_pos_1'/><label for="cispm_radio_pos_1"/><?php _e('Gauche', 'cispm-contact-mail' ); ?></label>
				&nbsp;&nbsp;<input type="radio" name='cispm_radio_pos' value='center' <?php echo $c ?>  id='cispm_radio_pos_2'/><label for="cispm_radio_pos_2"/><?php _e('Centre', 'cispm-contact-mail' ); ?></label>
				&nbsp;&nbsp;<input type="radio" name='cispm_radio_pos' value='right' <?php echo $d ?>  id='cispm_radio_pos_3'/><label for="cispm_radio_pos_3"/><?php _e('Droite', 'cispm-contact-mail' ); ?></label>
			</td>
		</tr>
		<tr>
			<td width="300"><?php _e('Libellé Champ Obligatoire', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" style="margin-left:10px;" name="cispm_obligatoire" value="<?php echo $cispm_obligatoire; ?>" size="30"/> <i><?php _e('(vide = * Champ(s) Obligatoire(s))', 'cispm-contact-mail' ); ?></i></td>
		</tr>
		
		<?php
			if($cispm_obligatoire_pos == "in") {
				$i = "checked";
				$o = "";
			} else {
				$i = "";
				$o = "checked";
			}
		?>
		
		<tr>
			<td width="300"><?php _e('Position Champ Obligatoire', 'cispm-contact-mail' ); ?></td>
			<td>
				<input type="radio" name='cispm_obligatoire_pos' value='in' <?php echo $i ?>  style="margin-left:10px;" id='cispm_obligatoire_pos_1'/><label for="cispm_obligatoire_pos_1"/><?php _e('Dans formulaire', 'cispm-contact-mail' ); ?></label>
				&nbsp;&nbsp;<input type="radio" name='cispm_obligatoire_pos' value='out' <?php echo $o ?>  id='cispm_obligatoire_pos_2'/><label for="cispm_obligatoire_pos_2"/><?php _e('Dessous le formulaire', 'cispm-contact-mail' ); ?></label>
			</td>
		</tr>
		<tr>
			<td colspan='2'>&nbsp;</td>
		</tr>
		<tr>
			<td colspan='2'><i><strong><?php _e('Mise en forme du titre', 'cispm-contact-mail' ); ?></strong></i></td>
		</tr>
		<tr>
			<td width="300"><?php _e('Couleur du titre en hexadécimal', 'cispm-contact-mail' ); ?></td>
			<?php
				if($cispm_hexa_titre == "") {
					?><td>#<input type="text" name="cispm_hexa_titre" class="myColorPicker" value="<?php echo $cispm_hexa_titre; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span> <?php _e('Aucune couleur', 'cispm-contact-mail' ); ?> </span></i></td><?php
				} else {	
					?><td>#<input type="text" name="cispm_hexa_titre" class="myColorPicker" value="<?php echo $cispm_hexa_titre; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span style='border:1px solid black;background-color:#<?php echo $cispm_hexa_titre; ?>;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></i></td><?php
				}
			?>
		</tr>
		<tr>
			<td width="300"><?php _e('Taille du titre', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" style="margin-left:10px;" name="cispm_taille_titre" value="<?php echo $cispm_taille_titre; ?>" size="8"/> px</td>
		</tr>
		<tr>
			<td width="300"><?php _e('Police du titre', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" style="margin-left:10px;" name="cispm_police_titre" value="<?php echo $cispm_police_titre; ?>" size="8"/></td>
		</tr>
		<tr>
			<td colspan='2'>&nbsp;</td>
		</tr>
		<tr>
			<td colspan='2'><i><strong><?php _e('Mise en forme du texte', 'cispm-contact-mail' ); ?></strong></i></td>
		</tr>
		<tr>
			<td width="300"><?php _e('Couleur du texte en hexadécimal', 'cispm-contact-mail' ); ?></td>
			<?php
				if($cispm_hexa_texte == "") {
					?><td>#<input type="text" name="cispm_hexa_texte" class="myColorPicker" value="<?php echo $cispm_hexa_texte; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span> <?php _e('Aucune couleur', 'cispm-contact-mail' ); ?> </span></i></td><?php
				} else {	
					?><td>#<input type="text" name="cispm_hexa_texte" class="myColorPicker" value="<?php echo $cispm_hexa_texte; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span style='border:1px solid black;background-color:#<?php echo $cispm_hexa_texte; ?>;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></i></td><?php
				}
			?>
		</tr>
		<tr>
			<td width="300"><?php _e('Taille du texte', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" style="margin-left:10px;" name="cispm_taille_texte" value="<?php echo $cispm_taille_texte; ?>" size="8"/> px</td>
		</tr>
		<tr>
			<td width="300"><?php _e('Police du texte', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" style="margin-left:10px;" name="cispm_police_texte" value="<?php echo $cispm_police_texte; ?>" size="8"/></td>
		</tr>
	</table>
	
	<hr />
	
	<table>
		<tr>
			<td colspan='2'><i><strong><?php _e('Mise en forme des messages d\'erreur', 'cispm-contact-mail' ); ?></strong></i></td>
		</tr>
		<tr>
			<td width="300"><?php _e('Couleur du texte', 'cispm-contact-mail' ); ?></td>
			<?php
				if($cispm_hexa_texte_erreur == "") {
					?><td>#<input type="text" name="cispm_hexa_texte_erreur" class="myColorPicker" value="<?php echo $cispm_hexa_texte_erreur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span> <?php _e('Aucune couleur', 'cispm-contact-mail' ); ?> </span></i></td><?php
				} else {	
					?><td>#<input type="text" name="cispm_hexa_texte_erreur" class="myColorPicker" value="<?php echo $cispm_hexa_texte_erreur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span style='border:1px solid black;background-color:#<?php echo $cispm_hexa_texte_erreur; ?>;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></i></td><?php
				}
			?>
		</tr>
		<tr>
			<td width="300"><?php _e('Couleur de fond des champs de saisie', 'cispm-contact-mail' ); ?></td>
			<?php
				if($cispm_hexa_input_erreur == "") {
					?><td>#<input type="text" name="cispm_hexa_input_erreur" class="myColorPicker" value="<?php echo $cispm_hexa_input_erreur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span> <?php _e('Aucune couleur', 'cispm-contact-mail' ); ?> </span></i></td><?php
				} else {	
					?><td>#<input type="text" name="cispm_hexa_input_erreur" class="myColorPicker" value="<?php echo $cispm_hexa_input_erreur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span style='border:1px solid black;background-color:#<?php echo $cispm_hexa_input_erreur; ?>;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></i></td><?php
				}
			?>
		</tr>
		<tr>
			<td width="300"><?php _e('Couleur de l\'animation', 'cispm-contact-mail' ); ?></td>
			<?php
				if($cispm_hexa_form_erreur == "") {
					?><td>#<input type="text" name="cispm_hexa_form_erreur" class="myColorPicker" value="<?php echo $cispm_hexa_form_erreur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span> <?php _e('Aucune couleur', 'cispm-contact-mail' ); ?> </span></i></td><?php
				} else {	
					?><td>#<input type="text" name="cispm_hexa_form_erreur" class="myColorPicker" value="<?php echo $cispm_hexa_form_erreur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span style='border:1px solid black;background-color:#<?php echo $cispm_hexa_form_erreur; ?>;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></i></td><?php
				}
			?>
		</tr>
		<?php
		
		if($cispm_dessus_formulaire == "cispm_dessus_formulaire") {
			$value_1 = 'checked="checked"';
		} else {
			$value_1 = '';
		}
		
		if($cispm_dessous_champ == "cispm_dessous_champ") {
			$value_2 = 'checked="checked"';
		} else {
			$value_2 = '';
		}
		
		?>
		<tr>
			<td width="300" style="vertical-align:top;"><?php echo _e('Activation message d\'erreur', 'cispm-contact-mail' ); ?></td>
			<td>
				<input type="checkbox" name="option1" value="cispm_dessus_formulaire" <?php echo $value_1; ?> id="cispm_dessus_formulaire" size="8"/> <label for="cispm_dessus_formulaire"><?php _e('Activer les messages d\'erreurs au dessus du formulaire', 'cispm-contact-mail' ); ?></label><br/>
				<input type="checkbox" name="option2" value="cispm_dessous_champ" <?php echo $value_2; ?> id="cispm_dessous_champ" size="8"/> <label for="cispm_dessous_champ"><?php _e('Activer les messages erreurs au dessous des champs', 'cispm-contact-mail' ); ?></label>
			</td>
		</tr>
		<tr>
			<td width="300"><?php _e('Libellé messages au dessous des champs', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" style="margin-left:10px;" name="cispm_mess_erreur" value="<?php echo $cispm_mess_erreur; ?>" size="30"/> <i><?php _e('(vide = Ce champ est obligatoire)', 'cispm-contact-mail' ); ?></i></td>
		</tr>
	</table>
	
	<hr />
	
	<table>
		<?php
			if($cispm_radio_captcha == "cispm_captcha") {
				$a = "";
				$c = "checked";
				$q = "";
				$r = "";
			} else if($cispm_radio_captcha == "cispm_question"){
				$a = "";
				$c = "";
				$q = "checked";
				$r = "";
			} else if($cispm_radio_captcha == "cispm_caseacocher"){
				$a = "";
				$c = "";
				$q = "";
				$r = "checked";
			} else {
				$a = "checked";
				$c = "";
				$q = "";
				$r = "";
			}
		?>
	
		<tr>
			<td colspan='2'><i><strong><?php _e('Mise en forme captcha', 'cispm-contact-mail' ); ?></strong></i></td>
		</tr>
		<tr>
			<td width="300"><input type="radio" value="cispm_aucun" <?php echo $a; ?> name="cispm_radio_captcha" id="cispm_radio_aucun"/><label for="cispm_radio_aucun"><?php _e(' Aucun', 'cispm-contact-mail' ); ?></label></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td width="300"><input type="radio" value="cispm_captcha" <?php echo $c; ?> name="cispm_radio_captcha" id="cispm_radio_c"/><label for="cispm_radio_c"><?php _e(' Captcha', 'cispm-contact-mail' ); ?></label></td>
			<td colspan="2"><?php _e('Attention, il faut télécharger et activer le plugin de ','cispm-contact-mail'); ?>
				<a href="http://wordpress.org/extend/plugins/really-simple-captcha/"> Really simple captcha </a>
				<?php _e('de','cispm-contact-mail'); ?>
				<a href="http://ideasilo.wordpress.com/2009/03/14/really-simple-captcha/"> Takayuki Miyoshi </a>
				<?php _e(' si vous voulez utiliser le module captcha.','cispm-contact-mail'); ?>
			</td>
		</tr>
		<tr>
			<td width="300"></td>
			<td><?php _e('Message à afficher:', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" name="cispm_captcha_texte" value="<?php echo $cispm_captcha_texte; ?>" size="50"/></td>
		</tr>
		<tr>
			<td width="300"></td>
			<td><?php _e('Couleur du texte dans l\'image', 'cispm-contact-mail' ); ?></td>
			<?php
				if($cispm_captcha_texte_couleur == "") {
					?><td>#<input type="text" name="cispm_captcha_texte_couleur" class="myColorPicker" value="<?php echo $cispm_captcha_texte_couleur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span> <?php _e('Aucune couleur', 'cispm-contact-mail' ); ?> </span></i></td><?php
				} else {	
					?><td>#<input type="text" name="cispm_captcha_texte_couleur" class="myColorPicker" value="<?php echo $cispm_captcha_texte_couleur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span style='border:1px solid black;background-color:#<?php echo $cispm_captcha_texte_couleur; ?>;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></i></td><?php
				}
			?>
		</tr>
		<tr>
			<td width="300"></td>
			<td><?php _e('Couleur de l\'image de fond', 'cispm-contact-mail' ); ?></td>
			<?php
				if($cispm_captcha_fond_couleur == "") {
					?><td>#<input type="text" name="cispm_captcha_fond_couleur" class="myColorPicker" value="<?php echo $cispm_captcha_fond_couleur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span> <?php _e('Aucune couleur', 'cispm-contact-mail' ); ?> </span></i></td><?php
				} else {	
					?><td>#<input type="text" name="cispm_captcha_fond_couleur" class="myColorPicker" value="<?php echo $cispm_captcha_fond_couleur; ?>" size="6"/> <?php _e('Couleur sélectionnée: ', 'cispm-contact-mail' ); ?> <span style='border:1px solid black;background-color:#<?php echo $cispm_captcha_fond_couleur; ?>;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></i></td><?php
				}
			?>
		</tr>
		<tr>
			<td width="300"><input type="radio" value="cispm_question" <?php echo $q; ?> name="cispm_radio_captcha" id="cispm_radio_question"/><label for="cispm_radio_question"><?php _e(' Question personnalisée', 'cispm-contact-mail' ); ?></label></td>
			<td><?php _e('Question: ', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" name="cispm_question_texte" value="<?php echo $cispm_question_texte; ?>" size="100"/> </td>
		</tr>
		<tr>
			<td width="300"></td>
			<td><?php _e(' Réponse: ', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" name="cispm_reponse_texte" value="<?php echo $cispm_reponse_texte; ?>" size="30"/> <i><?php _e('Exemple: Quel est la capitale de France ? Combien font 1+1 ?', 'cispm-contact-mail' ); ?></i></td>
		</tr>
		<tr>
			<td width="300"></td>
			<td><?php _e(' Taille champ réponse: ', 'cispm-contact-mail' ); ?></td>
			<td><input type="text" name="cispm_taille_reponse" value="<?php echo $cispm_taille_reponse; ?>" size="8"/> px <i><?php _e('( vide = 150px)', 'cispm-contact-mail' ); ?></i></td>
		</tr>
		<tr>
			<td width="300"><input type="radio" value="cispm_caseacocher" <?php echo $r; ?> name="cispm_radio_captcha" id="cispm_radio_coche"/><label for="cispm_radio_coche"><?php _e(' Case à cocher', 'cispm-contact-mail' ); ?></label></td>
			<td><?php _e('Message à afficher:', 'cispm-contact-mail' ); ?> </td>
			<td><input type="text" name="cispm_caseacocher_texte" value="<?php echo $cispm_caseacocher_texte; ?>" size="50"/> <i><?php _e('Exemple: Cocher cette case pour envoyer le mail', 'cispm-contact-mail' ); ?></i></td>
		</tr>
	</table>
	
	<hr />
	
	<p class="submit">
		<input type="submit" name="submit" class="button-primary" value="<?php _e('Appliquer les modifications', 'cispm-contact-mail' ) ?>" />
	</p>
	
	<input type="hidden" name="cispm_hidden" value="ENVOIE"/>
	
</form>
</div>