<?php

/**
 * App Name: iBinex Slack Bot
 * Description: Description of the plugin.
 * Version:     0.0.1
 * Author:      iBinex PH
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

require_once('vendor/autoload.php');
require_once('key.php');
 
$loop = React\EventLoop\Factory::create();
 
$client = new Slack\RealTimeClient($loop);
$client->setToken($bot_key);
$client->connect();
 
$client->on('message', function ($data) use ($client) {
    
    // Runs if message text input is "shuffle" and if the user matches
    if ($data['text'] == "shuffle" && 
            (
                $data['user']=="U9ZF62T2P" || // Ace
                $data['user']=="UA1LJL47Q" || // Ansell
                $data['user']=="U9ZB324KE" || // Gab
                $data['user']=="UA1SZP8TH" || //Jovi
                $data['user']=="UA1SWDZ39" // Izza
            )
           ){
        
        $client->getChannelGroupOrDMByID($data['channel'])->then(function ($channel) use ($client, $data) {
        
        
        
            $players = ['Jovi',
                'Reynaldo',
                'Chester',
                'Joshua',
                'Cristina',
                'Ricky',
                'Kevin Jordan',
                'Stephene',
                'Gabriel',
                'Joel',
                'Ace',
                'Abry',
                'Lester',
                'Mark',
                'Sean',
                'JC',
                'Kevin Soriano',
                'PJ',
                'Philip',
                'Leo',
                'Melvin',
                'Jeevon',
                'Ariel',
                'Michael',
                'Rochelle',
                'Ryan',
                'Adrian',
                'Nelson',
                'Izza',
                'Bryan',
                'Eric',
                'Dennis',
                 'Ansell'];

            shuffle($players);
            
            $group_a = array_slice($players,0,11);
            $group_b = array_slice($players,11,11);
            $group_c = array_slice($players,22,11);

            $m = "Group A: \n";

            foreach ($group_a as $v){
                $m .= "$v, ";
            }
            
            $m .= "\nGroup B: \n";

            foreach ($group_b as $v){
                $m .= "$v, ";
            }
            
            $m .= "\nGroup C: \n";


            foreach ($group_c as $v){
                $m .= "$v, ";
            }

            $message = $client->getMessageBuilder()
                        ->setText($m)
                        ->setChannel($channel)
                        ->create();
            $client->postMessage($message);
            
        
        });
    }
});

$loop->run();
