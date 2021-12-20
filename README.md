# Api-Metier-Alerte

# Environnement :

  - Symfony CLI version v4.26.8

  - WAMP SERVER 3.2.6

  - Composer 2.1.12
  
  - PHP 8.0.13
  

# Lancer le serveur symfony 
  - symfony server:start
    http://127.0.0.1:8000/api
    

# Créer la base de données
- php bin/console doctrine:database:create
- php bin/console doctrine:migrations:migrate

# Supprimer la base de données
- php bin/console doctrine:database:drop -f

# Si il y a des erreurs !
- php bin/console clear:cache

  
# Sources utiles :

  ![image](https://user-images.githubusercontent.com/52652122/144447506-5f478623-9654-457d-8ccb-f23d90b8990a.png)

  
  https://api-platform.com/docs/distribution/#introduction
  
  https://www.kaherecode.com/tutorial/developper-une-api-rest-avec-symfony-et-api-platform
  
  https://symfony.com/doc/5.4/setup.html
  
  ![image](https://user-images.githubusercontent.com/52652122/144433389-2ca43b39-3a49-4c47-8159-56f0f68981b6.png)

  

# Lignes de commandes :

  - composer create-project symfony/skeleton:"5.4.x" my_project_name
  
  OR
  
  - symfony new my_project_name --version=5.3
  
  - composer require api

  - composer require maker --dev

  - composer require profiler
  
  - php bin/console doctrine:database:create
  
  - php bin/console make:entity name
  
  - Mettre #[ApiResource] sur chaque entitées voulu !!!


    ![image](https://user-images.githubusercontent.com/52652122/144434451-54226c61-4117-4531-b2f6-d2a99f87cd70.png)
    

  - php bin console make:migration

  - php bin/console doctrine:migrations:migrate


# Diagramme UML

![image](https://user-images.githubusercontent.com/52652122/146132912-b025ac79-2723-4083-acaa-6e29087f6312.png)

   
