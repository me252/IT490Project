#!/bin/bash
declare STRING variable 
STRING="TRANSFERRING TO Main DEV"
#print variable on a screen 
echo $STRING 
scp -r /var/www/rendezvous.com/html me252@192.168.1.4:/var/www/rendezvous.com
