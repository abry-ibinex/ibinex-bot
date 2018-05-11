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
    if ($data['text'] == "shuffle" && 
            (
                $data['user']=="U9ZF62T2P" ||
                $data['user']=="UA1LJL47Q" ||
                $data['user']=="U9ZB324KE" ||
                $data['user']=="UA1SZP8TH" ||
                $data['user']=="UA1SWDZ39"
            )
           ){
        
        $client->getChannelGroupOrDMByID($data['channel'])->then(function ($channel) use ($client, $data) {
        
        
        
            $a = ['Jovi',
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

            shuffle($a);
            $groupa = array_slice($a,0,11);
            $groupb = array_slice($a,11,11);
            $groupc = array_slice($a,22,11);

            $m = "Group A: \n";

            foreach ($groupa as $v){
                $m .= "$v, ";
            }
            
            $m = rtrim($m,',');
            
            $m .= "\nGroup B: \n";

            foreach ($groupb as $v){
                $m .= "$v, ";
            }
            $m = rtrim($m,',');
            $m .= "\nGroup C: \n";


            foreach ($groupc as $v){
                $m .= "$v, ";
            }
            
            $m = rtrim($m,',');

            $message = $client->getMessageBuilder()
                        ->setText($m)
                        ->setChannel($channel)
                        ->create();
            $client->postMessage($message);
            
        
        });
    }
});

$loop->run();
