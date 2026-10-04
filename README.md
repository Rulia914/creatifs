<!-- # creatifs
Scripts Serveurs — CREA'TIFS (Design Capill'Hair)
Créer un portfolio de coiffeurs excentriques et de leurs projets de coupes, en MVC procédural PHP + MySQL, à partir du template et de la base de données fournis.

Stack : PHP procédural en MVC + MySQL + Bootstrap 4 + CSS custom (kitsch)

📅 Date d'évaluation : 06/10/2026
📅 Seconde session : 03/11/2026 à 16h00

🗃️ Base de données creatifs
La DB est fournie (db_remplie.sql) avec les tables :

Table	Contenu
creatifs	id, pseudo, bio, image — 4 enregistrements
projets	id, titre, resume, texte, dateCreation, image, creatif (FK) — 30 enregistrements
tags	id, nom — 8 tags
projets_has_tags	projet, tag — relation N-M (PK composite)
users	id, login, pwd
abonnes	id, mail

🛣️ Routes (réécriture d'URL — tout en anglais)
Action	Pattern
Accueil / Liste	/ ou /projects
Détails	/projects/id/slug.html
Suppression	/projects/delete/id/slug.html
Formulaire d'ajout	/projects/add/form.html
Action d'ajout	/projects/add/insert.html
Formulaire de modification	/projects/id/slug/edit/form.html
Action de modification	/projects/id/slug/edit/update.html

⚙️ Fonctions à créer
slugify() — Transforme une chaîne en slug : minuscules, remplace ' ', '.', '!', '?', ''', ';' par '-', et 'é', 'è', 'ê', 'à', 'ç', 'â' par leur équivalent non accentué
truncate(x) — Coupe une chaîne à l'espace juste avant le xème caractère. Si le texte coupé se termine par un signe de ponctuation (. , ; : ! ?), le supprimer avant d'ajouter .... Si la chaîne fait x caractères ou moins, la renvoyer telle quelle.

📋 Ce qui est attendu
CRUD projets : liste paginée (10/page), détails, ajout, modification, suppression
Résumé tronqué à 100 caractères sur la page d'accueil
Sidebar (aside) sur TOUTES les pages : widget créa'tifs (avatar + nom + compteur) + widget tags
Formulaire avec upload d'image, sélection du créa'tif, checkboxes de tags (relation N-M)
Template découpé en partials
Commentaires dans les contrôleurs, modèles et vues -->