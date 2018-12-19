#!/bin/bash
declare STRING variable 
STRING="TRANSFERRING TO QA VM"
#print variable on a screen 
echo $STRING 
scp -r /var/www/rendezvous.com/html me252@192.168.1.15:/var/www/rendezvous.com
