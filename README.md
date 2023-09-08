Bonjour, voici mon travail concernant le test "Car dealership".
Quelques instructions afin de bien voir le projet.
    
    1.➡️ Récupérer l'ensemble des fichiers

            ⌨ Git clone https://github.com/Ju-hub/Skills4All.git
             

    2.➡️ Dans le dossier créé installer les dépendances :

            ⌨ composer install

    3.➡️ Installer les dépendances npm

            ⌨ npm install

    4.➡️ Installer la base de données MySQL. Pour paramétrer la création de votre base de données, rdv dans le fichier .env du projet, et modifier la variable d'environnement selon vos paramètres :

            DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
    
    5.➡️ Créer la base de données :

            ⌨ symfony console doctrine:database:create
    
    6.➡️  Exécuter la migration en base de données :

            ⌨ php bin/console doctrine:migration:migrate
            
    7.➡️  Créer les fixtures
            ⌨ php bin/console doctrine:fixtures:load

    8.➡️ Compiler les assets

            ⌨ npm run dev

    9.➡️ Lancer le serveur en local

            ⌨ symfony server:start 


Congrats 🍾🍾🍾