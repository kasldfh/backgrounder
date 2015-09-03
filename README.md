#Set ubuntu background to a slideshow of subreddit images
##Usage
It is recommended to use cron or crontab to run this utility. To download 
images every hour, add this to your crontab (by running crontab -e)
* */1 * * * cd ~/workspace/backgrounder && php script.php > ~/cron.log 2>&1

To set a background every 15 minutes, add this line to your crontab

*/15 * * * * cd ~/workspace/backgrounder && bash backgroundsetter.sh > ~/cron.log 2>&1

##Installation
You need to run the following command to install dependencies for the scripts
sudo apt-get install php5 php5-curl

##How it works
script.php will download all imgur images from whatever subreddit url
is specified. 

backgroundsetter.sh will set the background in ubuntu to a random image from
a direcotory (to be used in conjunction with script.php)

runner.sh will run both script.php and backgroundsetter.sh, so it will both
download images and set the background to a random one. 

eric sucks
