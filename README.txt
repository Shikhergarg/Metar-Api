For LINUX
step1-Install XAMPP

step2-Install Redis on Linux

To install Redis on Linux, is pretty simple, but you'll need TCL installed if you don't have TCL installed. You can simply run:
$ sudo apt-get install tcl 

 To install Redis:
$ wget http://download.redis.io/releases/redis-2.8.19.tar.gz
$ tar xzf redis-2.8.19.tar.gz
$ cd redis-2.8.19
$ make

step3-Extract zip folder
step4-Copy the folder in htdocs
step5-start Apache at 80 port and Tomcat at 8080 port through xampp control panel
step6-open http://localhost/metar/info/?scode=ASZE in your crome browser