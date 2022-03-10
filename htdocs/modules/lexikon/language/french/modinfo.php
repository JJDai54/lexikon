<?php
// Module Info
// The name of this module
global $xoopsModule;
define("_MI_LEXIKON_MD_NAME", "Lexikon");

// A brief description of this module
define("_MI_LEXIKON_MD_DESC", "Glossaire multi-catégories");

// Sub menus in main menu block
define("_MI_LEXIKON_SUB_SMNAME0", "Administration"); //v1.17
define("_MI_LEXIKON_SUB_SMNAME1", "Soumettre une entrée");
define("_MI_LEXIKON_SUB_SMNAME2", "Proposer définition");
define("_MI_LEXIKON_SUB_SMNAME3", "Rechercher une définition");
define("_MI_LEXIKON_SUB_SMNAME4", "Nouvelle définition"); //v1.17
define('_MI_LEXIKON_SUB_SMNAME6', 'Authorlist');
define('_MI_LEXIKON_SUB_SMNAME7', 'WebmasterContent');

define("_MI_LEXIKON_RANDOMTERM", "Termes au hasard ");

$cf=0;
/**************************************************************************/
$cf++;
define("_MI_LEXIKON_MULTICATS", "$cf. Catégories glossaire");
define("_MI_LEXIKON_MULTICATSDSC", "Si la valeur est 'oui', cela vous permettra d'avoir des catégories glossaire. Si 'non', il y aura une seule catégorie automatique.");

$cf++;
define("_MI_LEXIKON_CATSINMENU","$cf. Affichage des Catégories dans le Menu principal");
define("_MI_LEXIKON_CATSINMENUDSC","Si la valeur est 'oui', les Catégories seront listées dans le bloc Menu principal");

$cf++;
define("_MI_LEXIKON_DATEFORMAT", "$cf. Saisir le format d'affichage de la date");
define("_MI_LEXIKON_DATEFORMATDSC", "Exemple: 'd-M-Y H:i' affiche le format '23-Mar-2004 22:35'. Vous pouvez consulter la dernière partie de language/english/global.php pour prendre connaissance des différents formats disponibles.");

$cf++;
define("_MI_LEXIKON_PERPAGE", "$cf. Nombre d'entrées affichées par page, dans la zone d'administation");
define("_MI_LEXIKON_PERPAGEDSC", "");

$cf++;
define("_MI_LEXIKON_PERPAGEINDEX", "$cf. Nombre d'entrées affichées par page, côté public");
define("_MI_LEXIKON_PERPAGEINDEXDSC", "");

$cf++;//v1.17
define("_MI_LEXIKON_BLOCKSPERPAGE", "$cf. Nombre d'entrées affichées dans le bloc sur la page principale");
define("_MI_LEXIKON_BLOCKSPERPAGEDSC", "La valeur par défaut est 5, si vous indiquez 0 aucun bloc ne sera affiché");

$cf++;
define("_MI_LEXIKON_AUTOAPPROVE", "$cf. Approbation automatique");
define("_MI_LEXIKON_AUTOAPPROVEDSC", "Les propositions soumises seront publiées sans modération");

$cf++;
define("_MI_LEXIKON_ALLOWADMINHITS", "$cf. Décompte des clics de l'administrateur");
define("_MI_LEXIKON_ALLOWADMINHITSDSC", "Si la valeur est 'oui', le compteur tient compte des visites de l'administrateur.");

$cf++;
define("_MI_LEXIKON_MAILTOADMIN", "$cf. Alerter l'administrateur à chaque soumission");
define("_MI_LEXIKON_MAILTOADMINDSC", "Si la valeur est 'oui', l'administrateur reçoit un email à chaque soumission");

/* JJDai */
++$cf;
define('_MI_LEXIKON_MAILTOSENDER', "$cf. Envoyer un courriel àà l'\utilisateur à chaque soumission?");
define('_MI_LEXIKON_MAILTOSENDERDSC',
       "S'il est défini sur \"Oui\", l'utilisateur recevra un e-mail de confirmation pour chaque entrée modifiée, soumise ou demandée. Si \"Avertir lors de la publication\" est coché, l'utilisateur recevra également un e-mail de confirmation lors de la publication du entrée.");

$cf++;
define("_MI_LEXIKON_RANDOMLENGTH", "$cf. Nombre de caractères à afficher dans les définitions au hasard");
define("_MI_LEXIKON_RANDOMLENGTHDSC", "Par défaut 150 caractères sont affichés pour les définitions présentes sur la page principale et dans le bloc aléatoire.");

$cf++;
define("_MI_LEXIKON_LINKTERMS", "$cf. Afficher les liens des autres termes dans le glossaire des définitions");
define("_MI_LEXIKON_LINKTERMSDSC", "Si la valeur est 'oui', ?? sera automatiquement dans vos définitions de ces termes.");

$cf++;
define("_MI_LEXIKON_FORM_OPTIONS","$cf. Options du formulaire");

++$cf;
define('_MI_LEXIKON_EDIGUEST', "$cf. Options de formulaire pour les soumissions");
define('_MI_LEXIKON_EDIGUESTDSC', 'Les invités peuvent-ils utiliser des éditeurs?');

++$cf;
define('_MI_LEXIKON_HEADER', "$cf. Texte d'introduction de la page principale:");
define('_MI_LEXIKON_HEADERDSC', 'Vous pouvez utiliser cette section pour afficher du texte descriptif ou d\'introduction. Le HTML est autorisé.');

$cf++;
define("_MI_LEXIKON_DISPPROL", "$cf. Afficher le pseudo de l'auteur");
define("_MI_LEXIKON_DISPPROLDSC", "Si la valeur est 'oui', le pseudo de l'auteur s'affiche pour chaque terme.");

++$cf;
define('_MI_LEXIKON_AUTHORPROFILE', "$cf. Utiliser le profil d'auteur?");
define('_MI_LEXIKON_AUTHORPROFILEDSC', "S'il est défini sur «oui», le demandeur sera lié au profil du glossaire de l'auteur. en outre, un lien vers la liste des auteurs apparaîtra dans le menu.");

$cf++;
define("_MI_LEXIKON_SHOWDAT", "$cf. Afficher la date");
define("_MI_LEXIKON_SHOWDATDSC", "Si la valeur est 'oui', la date des entrées s'affiche sur le bloc intégré à la page d'accueil.");

$cf++;
define("_MI_LEXIKON_SHOWCTR", "$cf. Afficher un compteur dans un bloc des entrées populaires");
define("_MI_LEXIKON_SHOWCTRDSC", "Si la valeur est 'oui', les entrées populaires sont accompagnées d'un compteur.");

++$cf;
define('_MI_LEXIKON_CAPTCHA', "$cf. Use captcha for submissions?");
define('_MI_LEXIKON_CAPTCHADSC', 'Xoops Frameworks is required.');

++$cf;
define('_MI_LEXIKON_KEYWORDS_HIGH', "$cf. Utilisez des mots clés mettant en évidence la recherche ?");
define('_MI_LEXIKON_KEYWORDS_HIGHDSC', 'Si vous définissez cette option sur Oui, les mots clés de recherche seront mis en évidence dans les définitions');

$cf++;
define("_MI_LEXIKON_BOOKMARK_ME","$cf. Afficher les termes favoris dans un bloc");
define("_MI_LEXIKON_BOOKMARK_MEDSC","Si la valeur est 'oui', ce bloc sera visible sur la page entrée");

$cf++;
define("_MI_LEXIKON_METANUM", "$cf. Nombre maximal de meta keywords pour générer automatiquement?");
define("_MI_LEXIKON_METANUMDSC", "Définissez ici le nombre maximum de mots clés pour générer les métabalises.<br /> Si la valeur est égale à zéro, le module utilise les Mots-clés du site");
define("_MI_LEXIKON_METANUM_0", "0");
define("_MI_LEXIKON_METANUM_5", "5");
define("_MI_LEXIKON_METANUM_10", "10");
define("_MI_LEXIKON_METANUM_20", "20");
define("_MI_LEXIKON_METANUM_30", "30");
define("_MI_LEXIKON_METANUM_40", "40");
define("_MI_LEXIKON_METANUM_50", "50");
define("_MI_LEXIKON_METANUM_60", "60");
define("_MI_LEXIKON_METANUM_70", "70");
define("_MI_LEXIKON_METANUM_80", "80");

++$cf;
define('_MI_LEXIKON_USESHOTS', "$cf. Utiliser des images de catégorie?");
define('_MI_LEXIKON_USESHOTSDSC', "S'il est défini sur «oui», affichera l'image de la catégorie. <br> <em> Le dossier de téléchargement est: uploads/lexikon/categories/images </em>");

++$cf;
define('_MI_LEXIKON_LOGOWIDTH', "$cf. Largeur des images de catégorie dans le menu:");
define('_MI_LEXIKON_LOGOWIDTHDSC', 'Taille des vignettes dans le menu (par défaut: 20 px)');

++$cf;
define('_MI_LEXIKON_IMCATWD', "$cf. Largeur des images de catégorie dans la vue de catégorie:");
define('_MI_LEXIKON_IMCATWDDSC', 'Taille des miniatures en mode d\'affichage des catégories (par défaut: 50 px)');

$cf++;
define("_MI_LEXIKON_IMGUPLOADWD","$cf. Hauteur / largeur maximale pour le téléchargement d'images");
define("_MI_LEXIKON_IMGUPLOADWD_DESC","Définissez la hauteur/largeur maximale en pixels pour le téléchargement d'une image");

$cf++;
define("_MI_LEXIKON_IMGUPLOADSIZE","$cf. Taille maximale pour le téléchargement d'images");
define("_MI_LEXIKON_IMGUPLOADSIZE_DESC","Définissez la taille maximale en octets (10485760 = 1 Mo) pour le téléchargement d'une image");

++$cf;
define('_MI_LEXIKON_RSS', "$cf. Activer la syndication RSS pour les invités?");
define('_MI_LEXIKON_RSSDSC', "Si vous définissez cette option sur «Oui», les entrées les plus récentes seront disponibles pour les invités. Si «Non», seuls les utilisateurs auront accès à la syndication.");


++$cf;
define('_MI_LEXIKON_SYNDICATION', "$cf. Activer la syndication de contenu pour les webmasters?");
define('_MI_LEXIKON_SYNDICATIONDSC', "Si vous définissez cette option sur «Oui», les utilisateurs auront accès à la syndication de contenu.");





// bookmarks
define("_MI_LEXIKON_ADDTHIS1","Ajouter ce Popup Fenster");
define("_MI_LEXIKON_ADDTHIS2","Ajouter cette liste déroulante");

/**************************************************************************/
// A brief description of this module
/*
++$cf;
define("_MI_LEXIKON_FORM_INB","$cf.Inbetween Editor");
$cf++;//v1.17
define("_MI_LEXIKON_ALLOWREQ", "$cf. Droit de solliciter des définitions");
define("_MI_LEXIKON_ALLOWREQDSC", "Si la valeur est 'oui', les membres et les utilisateurs anonymes peuvent solliciter de nouvelles définitions.");
$cf++;
define("_MI_LEXIKON_ALLOWSUBMIT", "$cf. Droit de proposition des membres");
define("_MI_LEXIKON_ALLOWSUBMITDSC", "Si la valeur est 'oui', les membres peuvent proposer des définitions.");
$cf++;
define("_MI_LEXIKON_ANONSUBMIT", "$cf. Droit de proposition des anonymes");
define("_MI_LEXIKON_ANONSUBMITDSC", "Si la valeur est 'oui', les utilisateurs anonymes peuvent proposer des définitions.");
$cf++;
define("_MI_LEXIKON_CATSPERINDEX","$cf. Nombre de catégories affichées par page, côté public");
define("_MI_LEXIKON_CATSPERINDEXDSC","");

$cf++;//18
define("_MI_LEXIKON_SECIMG", "$cf. Protection du formulaire par Captcha");
define("_MI_LEXIKON_SECIMGDSC", "Le Module <a href=\"http://www.dugris.info\" target=\"_blank\">Security Image</a> doit être installé.");
$cf++;
define("_MI_LEXIKON_AUTOCOM", "$cf. Saisie semi-automatique");
define("_MI_LEXIKON_AUTOCOMDSC", "Si la valeur est 'oui', la fonction de saisie semi-automatique est activée afin de suggèrer des termes de recherche (php5, Script.aculo.us).");
$cf++;
define('_MI_LEXIKON_SUGGEST_SUGGEST',"$cf. Suggestions");
define("_MI_LEXIKON_SUGGEST_SUGGESTDSC", "Régler la source des suggestions automatiquement ...");
define('_MI_LEXIKON_SUGGEST_SUG1',"...seuls les termes et initial");
define('_MI_LEXIKON_SUGGEST_SUG2',"...termes et définitions");
define('_MI_LEXIKON_SUGGEST_SUG3',"...tous les champs correspondants");
$cf++;
define("_MI_LEXIKON_SUBCATLIMIT", "$cf. Nombre de sous-catégories à afficher:");
define("_MI_LEXIKON_SUBCATLIMITDSC", "Nombre de sous-catégories à afficher dans le Menu.");
$cf++;
define("_MI_LEXIKON_TABSKIN", "$cf. Disposition des entrées");
define("_MI_LEXIKON_TABSKINDSC", "Avec cette option vous pouvez sélectionner l'apparence à utiliser pour les entrées, les catégories et les résultats de recherche.");
define("_MI_LEXIKON_SKIN_1", "default");
define("_MI_LEXIKON_SKIN_2", "lemon");
define("_MI_LEXIKON_SKIN_3", "solid");
*/



define("_MI_LEXIKON_FORM_COMPACT","Compact");
define("_MI_LEXIKON_FORM_DHTML","DHTML");
define("_MI_LEXIKON_FORM_SPAW","Spaw Editor");
define("_MI_LEXIKON_FORM_HTMLAREA","HtmlArea Editor");
define("_MI_LEXIKON_FORM_FCK","FCK Editor");
define("_MI_LEXIKON_FORM_KOIVI","Koivi Editor");
define("_MI_LEXIKON_FORM_TINE","TinyEditor");
define("_MI_LEXIKON_FORM_OPTIONS_DSC","Choix de l'éditeur");

// Names of admin menu items
define('_MI_LEXIKON_ADMENU0', 'Principal');
define("_MI_LEXIKON_ADMENU1", "Index");
define("_MI_LEXIKON_ADMENU2", "Catégories");
define("_MI_LEXIKON_ADMENU3", "Entrées");
define("_MI_LEXIKON_ADMENU4", "Blocs");
define("_MI_LEXIKON_ADMENU5", "Aller au module");

//mondarse


define("_MI_LEXIKON_ADMENU6", "Importer");
define('_MI_LEXIKON_ADMENU7', 'Requests');
define("_MI_LEXIKON_ADMENU8", "Soumissions");
define('_MI_LEXIKON_ADMENU9', 'Permissions');
define("_MI_LEXIKON_ADMENU10", "A propos");
define('_MI_LEXIKON_ADMENU11', 'Comments');
define('_MI_LEXIKON_ADMENU12', 'Statistics');


// SubMenues xoops 2.2.x
define("_MI_LEXIKON_CONFIGCAT_EXTENDED", "Configuration de l'extention");
define("_MI_LEXIKON_CONFIGCAT_EXTENDEDDSC" , "Option spéciale .");

//Names of Blocks and Block information
define("_MI_LEXIKON_ENTRIESNEW", "Termes les plus récents");
define("_MI_LEXIKON_ENTRIESTOP", "Termes les plus consultés");

define ('_MI_LEXIKON_NEWPOST_NOTIFY', 'Nouvelle définition');
define ('_MI_LEXIKON_NEWPOST_NOTIFYCAP', 'M\'avertir des nouvelles entrées du glossaire.');
define ('_MI_LEXIKON_NEWPOST_NOTIFYDSC', 'Recevoir une notification lorsqu\'une nouvelle définition est publiée');
define ('_MI_LEXIKON_NEWPOST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification automatique: nouvelle définition dans le glossaire');


define ('_MI_LEXIKON_NEWCAT_NOTIFY', 'Nouvelle catégorie');
define ('_MI_LEXIKON_NEWCAT_NOTIFYCAP', 'M\'avertir des nouvelles catégories du glossaire.');
define ('_MI_LEXIKON_NEWCAT_NOTIFYDSC', 'Recevoir une notification lorsqu\'une nouvelle catégorie est créée');
define ('_MI_LEXIKON_NEWCAT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification automatique: nouvelle catégorie dans le glossaire');

define ('_MI_LEXIKON_GLOBAL_TERMREQUEST_NOTIFY', 'Demande de définition');
define ('_MI_LEXIKON_GLOBAL_TERMREQUEST_NOTIFYCAP', 'M\'avertir lorsqu\'une Définition est demandée (en attente de suggestion).');
define ('_MI_LEXIKON_GLOBAL_TERMREQUEST_NOTIFYDSC', 'Recevoir une notification lorsqu\'une nouvelle définition est demandée (en attente d\'approbation).');
define ('_MI_LEXIKON_GLOBAL_TERMREQUEST_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notification: demande de définition');

define ('_MI_LEXIKON_GLOBAL_TERMSUBMIT_NOTIFY', 'Nouvelle définition soumise');
define ('_MI_LEXIKON_GLOBAL_TERMSUBMIT_NOTIFYCAP', 'M\'avertir lorsqu\'une nouvelle définition est soumise (en attente d\'approbation).');
define ('_MI_LEXIKON_GLOBAL_TERMSUBMIT_NOTIFYDSC', 'Recevoir une notification lorsqu\'une nouvelle définition est soumise (en attente d\'approbation).');
define ('_MI_LEXIKON_GLOBAL_TERMSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification automatique: nouvelle définition soumise');


// Descriptions des événements de notification et des modèles de courrier
define ('_MI_LEXIKON_NOTIFY', 'Global');
define ('_MI_LEXIKON_NOTIFYDSC', 'Options de notification globale');
define ('_MI_LEXIKON_NOTIFY_CAT', 'Category');
define ('_MI_LEXIKON_NOTIFY_CATDSC', 'Options de notification qui s\'appliquent à la catégorie actuelle');
define ('_MI_LEXIKON_NOTIFY_TERM', 'Definition');
define ('_MI_LEXIKON_NOTIFY_TERMDSC', 'Options de notification qui s\'appliquent à la définition actuelle');

// Noms des blocs et informations sur les blocs

define ('_MI_LEXIKON_TERMINITIAL', 'Lexikon Index');
define ('_MI_LEXIKON_CATS', 'Lexikon Categories');
define ('_MI_LEXIKON_SPOT', 'Lexikon Spotlight');
define ('_MI_LEXIKON_BNAME8', 'Lexikon Authors');
define ('_MI_LEXIKON_BNAME9', 'Défilement des définitions');

define ('_MI_LEXIKON_CATEGORY_NEWTERM_NOTIFY', 'Nouvelle définition');
define ('_MI_LEXIKON_CATEGORY_NEWTERM_NOTIFYCAP', 'M\'avertir lorsqu\'une nouvelle définition est publiée dans la catégorie actuelle.');
define ('_MI_LEXIKON_CATEGORY_NEWTERM_NOTIFYDSC', 'Recevoir une notification lorsqu\'une nouvelle définition est publiée dans la catégorie actuelle.');
define ('_MI_LEXIKON_CATEGORY_NEWTERM_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification automatique: nouvelle définition dans la catégorie');

define ('_MI_LEXIKON_CATEGORY_TERMSUBMIT_NOTIFY', 'Nouvelle définition soumise');
define ('_MI_LEXIKON_CATEGORY_TERMSUBMIT_NOTIFYCAP', 'M\'avertir lorsqu\'une nouvelle définition est soumise (en attente d\'approbation) à la catégorie actuelle.');
define ('_MI_LEXIKON_CATEGORY_TERMSUBMIT_NOTIFYDSC', 'Recevoir une notification lorsqu\'une nouvelle définition est soumise (en attente d\'approbation) à la catégorie actuelle.');
define ('_MI_LEXIKON_CATEGORY_TERMSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notification: nouvelle définition soumise dans la catégorie');

define ('_MI_LEXIKON_TERM_APPROVE_NOTIFY', 'Term Approved');
define ('_MI_LEXIKON_TERM_APPROVE_NOTIFYCAP', 'M\'avertir lorsque ce terme est approuvé.');
define ('_MI_LEXIKON_TERM_APPROVE_NOTIFYDSC', 'Recevoir une notification lorsque ce terme est approuvé.');
define ('_MI_LEXIKON_TERM_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} notification automatique: terme approuvé');

define ('_MI_LEXIKON_IMPORT', 'Import');

?>
