# ibinex-bot

Initial Setup
1. Clone the repository.
2. Open a terminal. Run these commands inside the repository directory.

```
$ pecl install mongodb
$ echo "extension=mongodb.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`
$ composer install
```

Ubuntu Install
```
$ sudo apt-get install php-mongodb
$ composer install
```

3. Get the Bot User OAuth Access Token from https://api.slack.com/apps/AANGABCK1/install-on-team
4. Open key.sample.php, edit $bot_key with the key you got from step 3. Then save as `key.php`.
5. On your terminal, run the app using:
```
php bots.php
```


==================


1. Admin Module
  - Admin commands
    + /startgame 
    + /cancelgame 
    +
    +
    
2. User Module
  - User commands
    + /register name team ###/regster Ansell 1  (Ricky)  
    + /checkstandings
    + /unregister
    +
    +
    
    
3. Bot Module
    + create game (Ansell)
    + shuffle
    + scoring
    
