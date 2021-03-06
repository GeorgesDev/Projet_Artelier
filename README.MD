# Art'elier

Création d'un site web qui permet aux professeur d'activité artistique de planifier un atelier.
Certains professeurs donnant des ateliers ont dans leurs carbets un nombre d’exercices fou, et c’est parfois la galère pour les retrouver. Et planifier son atelier à l'année peut-être parfois compliqué en fonction des demandes et du niveau de son groupe.
Elle concerne les professeurs artistiques du type théâtre, chant, danse, activités manuelles, etc...

# Description
L'idée serait d'avoir une base de données d'exercices pour ces professeurs. Elle doit contenir le titre de l'exercice, l'énoncé de l'exercice en soi, la durée de l'exercice, le nombre de participants (qui peut influencer sur le temps de l'exercice?), le niveau de difficulté, et le matériel nécéssaire. Base qu'il est possible d'alimenter également par une interface.
Une fois cette base créée, sur l'interface utilisateur, le professeur peut consulter les exercices par catégories souhaitée et les sélectionner pour qu'ils soient dans une liste (un genre de panier dans un e-commerce). Sur cette liste, il y a un récapitulatif des exercices (qu'il est possible de réorganiser en drag and drop) ainsi que des données comme le temps total de l'atelier et le matériel nécéssaire pour le bon déroulement de celui-ci. Il y a également la possibilité de sauvegarder ces listes pour ceux qui anticipent leurs ateliers.

## Organisation du projet

Nous allons suivre la méthodologie Agile Scrum.

https://trello.com/b/zv0Dx6PA/artelier


## Pages

Le site aura trois type de pages :
- Accueil
- Liste des catégories d'art
- Liste de tous les excercies

## Organisation du projet

### Concernant le MVP:

* listing des exercices par catégories
    en ajouter en DB
    possibilité de les choisir et ajouter dans une liste
    Évolutions possibles:

* ajout de fichiers (schémas, musiques, ...)
    le temps d'exécution d'un exercice évolue en fonction des personnes
    récapitulatif du matériel en fin de liste

## Choix techniques

### Frontend

Le front-end sera développé à l'aide du framework Vue.js. 


### Backend

WordPress est la solution qui a été sélectionnée pour la partie backend du projet :

- Le backoffice permettra aux professeurs de gérer les/leurs différents exercices.
- Une API REST devra être mise à disposition à l'application front-end, ce que WordPress peut générer très "rapidement".


#### Base de données
