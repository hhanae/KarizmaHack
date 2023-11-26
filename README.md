
# Karizma Kitchen Hackaton 


🤗 Ce Hackaton a pour objectif de Développer une mini-application de partage de recettes de cuisine avec une partie back-end et une partie front-end en utilisant la technologie de notre choix. Je suis HANIM Hanae, une parmis des dizaines de participants à ce Hackaton. J'ai nommé mon projet "Karizma Kitchen Hack" et j'ai choisi de l'implémenter avec: PHP (back-end), HTML/CSS/BOOTSTRAP (front-end) et MySQL (DataBase)
# Spécifications Fonctionnelles:
## Partie Backend
La partie backend de mon projet relate:
- La Réalisation de la gestion des Recettes. Notamment, mon projet permet aux utilisateurs et aux passionnées par la cuisine de créer, lire, mettre à jour et supprimer des recettes.
- La Conception de deux tables; utilisateurs et recettes (Comme 1ère version vu la contrainte du temps).
- L'Inscription, qui ne passe qu'après la validationd du mail en cliquant sur le lien envoyé en mail, et l'Authentification 
- La Validation des Données et la Gestion d'Erreur. A titre d'exemple, j'ai appliqué des regex sur la partie de registration sur le password(il doit suivre un regex). En plus, un utilisateur ne peut pas s'inscrire avec un email ou username qui existe déjà dans la base de données. Puis, l'utilisateur doit remplir le formulaire de recettes avec des données valides.
Si la validation de données ne passe pas, l'utilisateur reçoit un message d'erreur.
## Partie Front-End
La partie frontend de mon projet relate: 
- La Création d'une interface utilisateur simple et intuitive.
- L'Implémentation d'un écran de connexion.
- L'Implémentation d'un Responsive Design.
## Les Suppléments
- Sécurité: Dans mon projet, j'ai suivi les Bonnes pratiques pour s'assurer de l'authenticité, la confidentialité(en hashant le password et en utilisant des tokens) et de la validation des données.
- Documentation: J'ai même fourni cette documentation sur git pour vous présenter mon projet et pour faciliter son utilisation.

# Architecture Adoptée:
- Pour implémenter mon application, j'ai choisi d'adopter une couche trois tiers représentée ci-dessous:
![6-3-tier-architecture-php-2-638](https://github.com/hhanae/KarizmaHack/assets/97336261/f32853cf-31a1-4131-ad90-3fd540cf58d9)


# Recommandations pour l'utilisation
Je vous recommande vivement de cloner le répertoire de mon projet et de l'utiliser🤗. Voici toutes les instructions et les conseils pour bien se lancer:

- Vous devez vous disposez d'un logiciel qui simplifie le processus d'installation(Xampp) et de gestion de serveurs web locaux pour exécuter MySQL.
- Créer la base de données "karizma_kitchen". (Je vous laisse son fichier pour l'importer)
- Vous devez disposez d'un IDE pour visualier le code et mieux le comprendre.
- Si vous utilisez Xampp: Copier ce projet dans le répertoire: C:\chemin_d_acces\xampp\htdocs et tapez ce lien sur un browser: http://localhost/karizma-Kitchen/template/pages/tables/table-recettes.php

# Simulation
- La Première Page qui apparaîtra si on n'est pas encore conneté est:
![image](https://github.com/hhanae/KarizmaHack/assets/97336261/9c1e4bce-167b-48c2-bed5-77fcb2f56c42)

- Après Authentification, on recevra la page d'acceuil (Dashboard):
![image](https://github.com/hhanae/KarizmaHack/assets/97336261/268e8479-7a19-48fa-8b54-8cc9aeb23798)

- On peut demander la page d'ajout d'une Nouvelle Recette:
![image](https://github.com/hhanae/KarizmaHack/assets/97336261/c1e55904-663b-4754-b1d6-ae535c408480)

- On peut demander la page des tables qui affichent la liste des tables:
![image](https://github.com/hhanae/KarizmaHack/assets/97336261/56d6f3f9-83a4-4332-a10f-3da2fede5029)

N.B: Dans la colonne action de la table, on trouve 3 icônes une pour affichés les étapes en pop up, l'autre pour se diriger vers le formulaire de modifications et le dernier pour supprimer une ligne.

# Credentials    
Je remercie vivement le Groupe Karizma pour m'avoir aborder cette opportunité de tester mes compétences sous des contraintes de temps en collaboration. De plus, je les remercies pour m'avoir permis d'agrandir mon réseau et de forger de plus ma personnalité en rencontrant leurs personnels et en collaborant avec des étudiants qui viennent de différentes grandes écoles.
 


