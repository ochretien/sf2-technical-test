# Stadline Technical test

### Tache

Le sujet de base est simple : Il faut créer une page sécurisée qui permet à un utilisateur de se loguer et de faire un commentaire sur un repos publique d'un utilisateur GitHub.
La fonctionnalité de commentaire n'existe pas sur Github, vous devrez donc stocker et afficher ces commentaires dans votre espace sécurisé.

### Règles

* Le temps est libre mais il est tout de même conseillé de passer moins de 4h sur le sujet (temps de setup d'environnement compris)
* Il est conseillé de finir les points requis avant de s'attaquer au bonus. 
* Il est aussi conseillé de faire un maximum de commit pour bien détailler les étapes de votre raisonnement au court du développement. 
* N'hésitez pas à nous faire des retours et nous expliquer les éventuelles problématiques bloquantes que vous auriez rencontrées durant le développement vous empéchant de finir.

### Setup

* La charte graphique n'est pas imposée et sera jugée en bonus. L'emploi d'un framework CSS type Twitter Bootstrap est fortement conseillé. 
* Vous aurez besoin d'un environnement php5.5, Symfony2 et un serveur pour l'application. 

### Les pré-requis

* Vous êtes libre d'utiliser un bundle d'authentification externe ou votre propre bundle. 
* Le formulaire de connexion doit avoir une validation coté serveur. 
* Toutes les pages doivent être sécurisées et pointer sur la page de login si l'utilisateur n'est pas connecté. 
* Le choix du client HTTP est laissé à discrétion pour appeller l'API de GitHub.
* Une fois connecté, il est nécessaire d'implémenter un champ de recherche qui permette de chercher les repos GitHub d'un utilisateur. La documentation est disponible ici : http://developer.github.com/v3/repos/#list-user-repositories . 
* Vous devez appeller l'API suivante avec USER_NAME=searchFieldContent :
```
https://api.github.com/users/USER_NAME/repos
```
* Une fois le champ de recherche validé et l'utilisateur sélectionné, on arrive sur l'url /{username}/comment, on affiche un formulaire qui sera composé des champs suivants : Le nom d'un repos ({user}/{repos}, e.g : stadline/sf2-technical-test), un textArea pour le commentaire, un bouton validé permettant d'ajouter un commentaire. 
* On affichera en dessous la liste des commentaires déjà saisis. 
* Lors de la validation du formulaire, on vérifiera que le repository sélectionné est bien un repos appartenant à l'utilisateur précédement recherché. 
* On attend aussi de vous que le code soit testable et testé unitairement.

### Bonus

* Quand on clique sur le résultat, on affiche l'Id du repository et la date de création dans une tooltip. 
* On changera le choix du repos par un multiselect afin de lister directement dans le type les repos de l'utilisateur. 
* Utilisation d'un frameworkJS pour afficher les résultats
* Toutes les fonctionnalités que vous aurez le temps d'ajouter seront aussi bonnes à prendre. Un bonus autour de votre créativité pourra être considéré.

### Délivrabilité. 

* Forkez le projet sur GitHub et codez directement dans le projet forké. 
* Commitez aussi souvent que possible et commentez vos commits pour détailler votre chemin de pensée. 
* Mettez à jour le README pour ajouter le temps passé et tout ce que vous jugerez nécessaire de nous faire savoir. 
* Envoyez le lien avec le projet à recrutement@stadline.com. 

**Bonne chance**
