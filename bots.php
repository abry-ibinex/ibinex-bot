<?php
error_reporting(E_ALL);
/**
 * App Name: iBinex Slack Bot
 * Description: Description of the plugin.
 * Version:     0.0.1
 * Author:      iBinex PH
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


$UPTIME = time();
$BOT_VERSION = 0;
$MIN_PLAYERS = 2;
$MAX_PLAYERS_PER_ROOM = 11;
$TOTAL_TEAMS = 4;

/* VERSION MAJOR.MINOR.PATCH */




require_once('vendor/autoload.php');
require_once('key.php');

$loop = React\EventLoop\Factory::create();
 
$client = new Slack\RealTimeClient($loop);
$client->setToken($bot_key);
$client->connect();
 
$client->on('message', function ($data) use ($client) {
    $client->getChannelGroupOrDMByID($data['channel'])->then(function ($channel) use ($client, $data) {
       
       
        if(preg_match('/^<@UAMJYM153> (.*)/', $data['text'], $match)) {
      
            $command = new Bot\Ibinex\Command;
        
            if($command->parseCommand($match[1], $data['user'])) {

                 $command->run();
                
            }
           
            $message = $command->message;

        } elseif(preg_match('/^<@UAMJYM153>$/', $data['text'], $match)) {

             $command = new Bot\Ibinex\Command;


             $message = "Hello. Im Ibinex bot. :smile: \n\n";
             $message .= "*Commands*\n";
             $message .= "```";
             foreach($command->commands AS $key => $command) {

                $message .= "" .$key ." (". $command .")\n";

             } 
             $message .= "```";

        }


        if(!empty($message)) {

                    $message = $client->getMessageBuilder()
                                ->setText($message)
                                ->setChannel($channel)
                                ->create();
                    $client->postMessage($message);
        }
         


            
        
    });
});

$loop->run();