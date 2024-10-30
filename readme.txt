===Cispm Mail Contact===

Contributors: Vincent Lachambre, Julien Rousselle
Tags: contact, mail, formulaire, form, email, cispm, envoie, contact form, formulaire de contact, send
Requires at least: 2.8.4
Tested up to: 3.0.1
Stable tag: 2.2.6
Version: 2.2.6

Cispm Contact Mail est un formulaire de contact paramétrable.
Cispm Contact Mail is a contact form that we can define.

== Description ==
**Français**

*Cispm Mail Contact* est un **formulaire de contact entièrement personnalisable** via le panneau d’administration de votre blog Wordpress.
Par ce plugin, vous pouvez via un formulaire de permettre aux visiteur de votre de blog de vous contacter par mail.
Opter pour la personnalisation graphique et des libellés des champs du formulaire, ou pour le thème par défault.
Un plugin unique, qui sait répondre aux besoins de vous, blogger et acteur du Web 2.0.

Qui sommes nous ?

Nous sommes deux étudiants dans le web et le multimédia, et nous mettons à profit nos connaissances et notre volonté d'apprendre et d'utiliser les technologies du web.

**English**

*Cispm Mail Contact* is a **contact form that we can define** via your Wordpress administration.
With this, your visitors can contact you directly in your Blog.
You can use of the graphic personnalisation of the form, or of the default theme.
A single plugin that is responsive to your needs, you, bloggers and Web 2.0 player.

Who are we?

We are student in web and multimedia and we use our knowledge and willingness to learn and use web technologies.

== Frequently Asked Questions ==

= Lors de l'activation du module Captcha, l'image n'apparait pas =

Veuillez donner les droits 777 au répertoire tmp situé dans le chemin /wp-content/plugins/really-simple-captcha/tmp

= Pour toutes autres questions ? =

N'hésitez pas à nous contacter sur les blogs http://www.vaynceweb.com/blog/ ou http://julien.rousselle.add.fr/blogpro/


== Installation ==
**Français**

Téléchargez *Cispm Mail Contact* sur votre blog : 

Pour ce faire, télécharger et dézipper le fichier *cispm09_contact.zip*. 

Copiez le par FTP dans le dossier *wp-content/plugins/* du serveur qui héberge votre blog WordPress.

Pour activer le plugin, rendez-vous dans l'interface administration de WordPress, section *Extensions* et cliquez sur "activer".

Pour installer le plugin sur une page WordPress, ajouter dans votre page le code html [cispm-contact-mail] **IMPORTANT : Choisir l'onglet HTML.**

Dans les *Réglages* de l'interface administration de WordPress une nouvelle section apparaît nomme "Formulaire Contact", c'est ici que vous pouvez personnaliser l'apparance de votre formulaire.

A tout moment, vous pouvez revenir au thème par défaut en cliquant sur le bouton correspondant.

Les couleurs des éléments de votre formulaire sont personnalisable en caractère hexadécimal selon les normes CSS (ex: #FF0000 pour rouge).

La taille des champs du formulaire peut être modifiable en pixel (px).

Les polices de caractères peuvent aussi se personnaliser.

Pour utiliser le champ Captcha, il faut télécharger et activer le plugin Really simple captcha de Takayuki Miyoshi.

Mais attention, car il faut qu'elle soit présente sur les machines des visiteurs. Pour cela, il est conseillé d'utiliser des polices courantes, comme Arial, Verdana, Times...

**English**

Download *Cispm Mail Contact* on your blog : 

To do this, download and unzip the file *cispm09_contact.zip*.

Copy this into FTP folder *wp-content/plugins/* of server who hosts your WordPress blog.

To activate the plugin, go to the administration interface of WordPress, section *Extensions* and click "Enable".

To install the plugin on a WordPress page, add in your page html the code [cispm-contact-mail] **IMPORTANT: Select the HTML tab.**

In the *Settings* interface administration of WordPress is a new section called "Contact Form", this is where you can customize the appearance of your form.

At any time you can return to the default theme by clicking the appropriate button. The colors of your form elements are customizable character in hexadecimal as CSS standards (ex: # FF0000 for red).

The size of the form fields can be changed in pixels (px).

The fonts can also be customized.

To use the Captcha field, you must download and activate the plugin Really Simple captcha by Takayuki Miyoshi.

But beware, because it must be present on the machines of visitors. For this it is advisable to use common fonts like Arial, Verdana, Times ...

== Screenshots ==

1. Formulaire de contact dans une page WordPress avec le thème par défaut


   Contact form in a WordPress page with the default theme
   
2. Interface administration première partie
   
   
   Interface administration first part
   
3. Interface administration deuxième partie
   
   
   Interface administration second part
   
4. Interface administration troisième partie
   
   
   Interface administration third part
   
5. Ajout du formulaire dans une page Wordpress
   
   
   Add the form in a Wordpress page

== Changelog ==
**Français**

= 2.2.6 =

* Amélioration de la mise en page du mail de réception

= 2.2.5 =

* Amélioration de la compatibilité du plugin avec un plus grand nombre de thème

= 2.2.4 =

* Correction de l'erreur "Vous n'avez pas les droits suffisants pour réaliser cette action"
* Compatibilité WordPress 3

= 2.2.3 =

* Suppression du libellé [DEBUT DU MESSAGE] dans le mail de réception
* Correction d'erreur d'affichage avec certains thèmes (notamment avec le thème Mystique)
* Correction libellé couleur fond et texte captcha

= 2.2.2 =

* Correction erreur sur le sélecteur de couleur qui ne s'ouvrait plus
* Correction des apostrophes qui ne passaient pas

= 2.2.1 =

* Correction de l'erreur Warning: fread() [function.fread]: Length parameter must be greater than 0 in C:\wamp\www\wordpress\wp-includes\pomo\streams.php on line 113

= 2.2 =

* Modification du code d'insertion du plugin pour problème de compatibilité [cispm-contact-mail]
* Ajout de sélecteur de couleur pour les champs hexadécimaux
* Ajout d'un captcha personnalisable (Utiliser: Really simple captcha de Takayuki Miyoshi)
* Ajout d'une question personnalisable pour la validation du formulaire
* Ajout d'une case à cocher pour la vérification du formulaire

= 2.1 =

* Traduction du plugin en Anglais
* Correction des cases qui se cochaient en même temps dans l'administration du formulaire (Activation message d'erreur)
* Correction d'erreur affichage avec certains thèmes
* Possibilité de cliquer sur le texte pour cocher la case (exemple: Recevoir une copie)
* Possibilité de personnaliser le texte des messages d'erreur en dessous des champs du formulaire
* Nettoyage du code source

= 2.0 =

* Ajout de la librarie *jQuery* pour le traitement des champs du formulaire 
(plus besoin de rechargement de la page si l'utilisateur n'entre pas un champ obligatoire ou entre un champ erroné)
* Possibilité d'ajouter un champ erreur au dessus du formulaire et au dessous de chaque champs
* Centrage du message d'erreur en haut du formulaire, jusqu'à présent décalé sur certains thèmes

= 1.4 =

* Correction de l'erreur d'envoie du mail sur Internet Explorer présente sur la Version 1.3

= 1.3 =

* Ajout des bords arrondis dans Internet Explorer (présent uniquement sur Mozilla Firefox, Safari et Chrome pour les précédentes versions)
* Possibilité de personnaliser le libellé "Champs Obligatoires"
* Possibilité de choisir de mettre le libellé "Champs Obligatoires" dans le formulaire
* Possibilité de choisir la taille en pixels des champs de saisie
* Changement de la taille minimale du formulaire (300px)
* Ajout d'un bouton permettant d'appliquer un thème par défaut
* Correction d'affichage du formulaire avec certains thèmes
* Correction générale du code source

= 1.2 =

* Correction d'une erreur d'affichage lors de l'envoi d'un mail (le libellé mail disparaissait)
* Correction des accents dans le mail
* Amélioration du design du mail
* Alignement des libellés dans le formulaire

= 1.1 =

* Correction d'une erreur d'affichage avec certains thèmes
* Ajout dans la page administration de l'explication pour l'installation du plugin

= 1.0 =

* **Première Version**


**English**

= 2.2.6 =

* Improved the layout of the mail reception

= 2.2.5 =

* Improved compatibility of the plugin with a larger number of theme

= 2.2.4 =

* Fix error "You don't have sufficient rights to perform this action"
* Compatibility WordPress 3

= 2.2.3 =

* Remove the wording [START OF MESSAGE] in the mail reception
* Fixed display error with some themes (including the theme Mystique)
* Fixed text color background and text captcha

= 2.2.2 =

* Fix error selector color
* Correcting quotes did not pass

= 2.2.1 =

* Fix error: Warning: fread() [function.fread]: Length parameter must be greater than 0 in C:\wamp\www\wordpress\wp-includes\pomo\streams.php on line 113

= 2.2 =

* Change the insertion code for the plugin compatibility issue [cispm-contact-mail]
* Added color selector for hexadecimal fields
* Added a customizable captcha (Use: Really simple captcha of Takayuki Miyoshi)
* Added a question customizable for form validation
* Added a check box for the verification form

= 2.1 =

* Translation into English of the plugin
* Correction of the boxes are ticked off that same time in the administration of the form (activation error message)
* Fixed display error with some themes
* Ability to click on the text to check the box (example: Get a copy)
* Ability to customize the text of the error messages below the form fields
* Cleaning the source code

= 2.0 =

* Adding the *jQuery* library which for the treatment of form fields (no need to reload the page if the user is not a mandatory field or a field between wrong)
* Possibility of adding an error field in the form above and below each field
* Centering the error message at the top of the form until now shifted on some issues

= 1.4 =

* Correction of error sends mail on Internet Explorer this on Version 1.3

= 1.3 =

* Add rounded edges in Internet Explorer (this only on Mozilla Firefox, Safari and Chrome for previous versions)
* Ability to customize the text "Required fields"
* Possibility to choose the wording "Required fields" in the form
* Possibility to choose the pixel size of input fields
* Change the minimum size of the form (300px)
* Add a button to apply a default theme
* Fixed display issues with some themes
* General correction of source code

= 1.2 =

* Fixed a display error when sending a mail (mail wording disappeared)
* Correction of accents in the mail
* Improved design of the mail
* Aligning labels in the form

= 1.1 =

* Fixed a display error with some themes
* Adding to the administration page of the explanation for installing the plugin

= 1.0 =

* **First Release**