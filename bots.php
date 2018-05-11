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
 
$loop = React\EventLoop\Factory::create();
 
$client = new Slack\RealTimeClient($loop);
$client->setToken('xoxb-361644715173-EgmYTwiAVeYM7VFg9PEjL0hx');
$client->connect();
 
$client->on('message', function ($data) use ($client) {
    $client->getChannelGroupOrDMByID($data['channel'])->then(function ($channel) use ($client, $data) {
            
        
        if ($data['text'] == "shuffle"){
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
                'Dennis'];

            shuffle($a);
            $groupa = array_slice($a,0,11);
            $groupb = array_slice($a,11,11);
            $groupc = array_slice($a,23,10);

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
            
        }
    });
});

$loop->run();
