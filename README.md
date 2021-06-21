# LuxuryServices

TP Luxury Services

📑Cahier des charges

Ce document définit et encadre le projet de création d'un site de recrutement qui comprendra une base clients, une CVthèque des candidats et des candidatures pour les offres d'emploi publiées.
L'identité graphique préalablement définie, sera à intégrer à l'aide des fichiers Html, Css & Js fournis par le client : TP-LuxuryService-Template

💻 Front-office
Pages

👀 Visiteurs
1-1 Page d'accueil
1-2 Compagnie
1-3 Offres d'emploi
1-4 Page contact
1-5 Inscription

🤵Candidats
2-1 Mon profil
2-2 Se connecter / Mot de passe oublié

👀VISITEURS
1-1 Page d'accueil
La page d'accueil devra présenter les 10 dernières offres d'emploi en liste et filtrable par catégorie
La page d'accueil devra comporter des sections d'appels à l'action pour optimiser la conversion de l'utilisateur en candidat.
1-2 Compagnie
Cette page de contenu texte et images présentera l'histoire et les services de la plateforme de recrutement.
1-3 Offres d'emploi
Les offres d'emploi seront présentées en liste et filtrable par catégorie
Les offres disponibles ne devront pas afficher le nom du client
Seuls les utilisateurs inscrits (= candidats) dont le profil est complété à 100% pourront postuler aux offres d'emploi.
1-4 Page contact
Cette page comportera :
les informations générales de contact
un formulaire de contact avec les champs suivants :
- prénom
- nom
- email
- téléphone
- message
le cabinet de recrutement géolocalisé sur une carte (à intégrer via Google Maps)(Mettre l’adresse de simplon)

1-5 Inscription
Le formulaire d'inscription des candidats comportera les champs suivants :
- email
- mot de passe
L’utilisateur devra accepter les conditions générales d'utilisation de la plateforme pour finaliser son inscription (checkbox)

🤵CANDIDATS
2-1 Mon profil
Cette page est accessible par les utilisateurs inscrits à la plateforme
Le profil est sous la forme d'un formulaire dont la complétion est affichée en pourcentage
Les candidats devront avoir un profil compléter à 100% pour postuler à une offre d'emploi
Les champs du profil sont fournis par le client dans le document suivant : Champs formulaire candidats
Les candidats pourront aussi modifier leur mot de passe sur cette page et auront la possibilité de supprimer leurs comptes de la plateforme
2-2 Connexion / Mot de passe oublié
La connexion des candidats se fait avec la paire d'identifiants email / mot de passe définis lors de l'inscription
Un formulaire de récupération de mot de passe permet aux candidats de recevoir un lien de récupération de compte par email

🛠️ Back-office
L'administrateur se connecte via la même page de connexion que les candidats mais arrivera sur la page d'accueil de l'administration de la plateforme
Il n'y a pas de templates fournis pour le back office, a vous de le créer. Soyez simples et efficaces.

Pages
1-1 Dashboard (tableau de bord)
1-2 Candidats
1-3 Clients
1-4 Offres d'emploi
1-5 Candidatures

1-1 Dashboard
Le tableau de bord de l'application présentera des statistiques simples telles que :
nombre de candidats
nombre de clients
nombre d'offres d'emploi
nombre de candidatures

1-2 Candidats
Les candidats seront présentés en liste ordonnée chronologiquement avec les colonnes suivantes :
nom / prénom
email
ville
secteur d'activité
disponibilité
date d'inscription
L'administrateur pourra :
visualiser le profil détaillé d'un candidat, celui-ci reprendra l'ensemble des champs définis dans le document suivant : Champs formulaire candidats
télécharger les fichiers uploadés du candidat
Uploader des files sur le candidat
visualiser les candidatures en liste ordonnée chronologiquement du candidat
ajouter une note via un formulaire simple (textarea)
créer un nouveau candidat
supprimer un candidat
1-3 Clients
Les clients seront présentés en liste ordonnée chronologiquement avec les colonnes suivantes:
- nom de la société
- nom du contact
- email du contact
- téléphone du contact
- date de création

L'administrateur pourra :
visualiser le profil détaillé d'un client, celui-ci reprendra l'ensemble des champs définis dans le document suivant : Champs formulaires
ajouter une note via un formulaire simple (textarea)
-> créer un nouveau client
-> supprimer un client

1-4 Offres d'emploi
Les offres d'emploi seront présentées en liste ordonnée chronologiquement avec les colonnes suivantes:
- titre de l'offre
- nom de la société
- nom du contact
- email du contact
- téléphone du contact
- statut
- date de création
- date de clôture

L'administrateur pourra :
créer une nouvelle offre d'emploi avec les champs définis dans le document suivant : Champs formulaire offres
-> visualiser la page détaillée d'une offre d'emploi
-> visualiser les candidatures en liste ordonnée chronologiquement pour l'offre
-> ajouter une note via un formulaire simple (textarea)
-> modifier le statut d'une offre (activée/désactivée)
-> supprimer une offre d'emploi

1-5 Candidatures
Les candidatures seront présentées en liste ordonnée chronologiquement avec les colonnes suivantes:
- nom du candidat
- email du candidat
- titre de l'offre d'emploi
- nom de la société
- nom du contact
- email du contact
- date du dépôt de candidature


L'administrateur pourra :
visualiser la page détaillée d'une candidature, celle-ci reprendra les champs de l'offre d'emploi et les champs du candidat
télécharger les fichiers uploadés du candidat
ajouter une note via un formulaire simple (textarea)
supprimer une candidature
