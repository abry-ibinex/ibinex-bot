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

require_once('vendor/autoload.php');
include('core.php');
 
$loop = React\EventLoop\Factory::create();
 
$client = new Slack\RealTimeClient($loop);
$client->setToken('xoxb-361644715173-GfGCbugLKI73r3PJw0JM4c2L');
$client->connect();
 
$client->on('message', function ($data) use ($client) {
    $client->getChannelGroupOrDMByID($data['channel'])->then(function ($channel) use ($client, $data) {
       
       
        if(preg_match('/^<@UAMJYM153> (.*)/', $data['text'], $match)) {

            $command = new Ibinex\Command;

            
            if($command->parseCommand($match[1], $data['user'])) {

                 $command->run();
                
            }
           
            $message = $command->message;

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
