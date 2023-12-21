# Laravel project met CRUD-functionaliteit

## Installatie

### Kloon de repository

Kloon de repository met het volgende commando in de command prompt:

    git clone https://github.com/Stefan-Mars/CRUD.git

### Composer

Ga naar de gekloonde map in de command prompt en voer het volgende commando uit:

    composer update

### Omgeving instellen

Dupliceer het .env.example bestand en hernoem het naar .env. Pas de database-instellingen aan met je eigen gegevens:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=je_database_naam
    DB_USERNAME=je_gebruikersnaam
    DB_PASSWORD=je_wachtwoord

### Uitvoeren van migraties

Voer de database-migraties uit om de tabellen aan te maken:

    php artisan migrate

### Start de server

Gebruik het volgende commando om de ontwikkelingsserver te starten:

    php artisan serve
