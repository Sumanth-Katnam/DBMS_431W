Project for CMPSC 431W 

Cluster handling commands 


export FLASK_APP=application.py

flask run -h localhost -p 3000

ps aux | grep *python*



https://www.youtube.com/watch?v=kDRRtPO0YPA

sudo apt-get update

sudo apt-get install python-pip nginx

sudo /etc/init.d/nginx start

sudo rm /etc/nginx/sites-enabled/default 

sudo touch /etc/nginx/sites-available/flask-settings

sudo ln -s /etc/nginx/sites-available/flask-settings /etc/nginx/sites-enabled/flask-settings

server {
    location / {
        proxy_pass       http://e5-cse-cs431fa21s1-3.vmhost.psu.edu:8000;
        proxy_set_header Host $host;
        proxy_set_header Host X-Real-IP $remote_addr;
    }
}

ssh -N -i /home/tool/.ssh/id_rsa mmb7103@e5-cse-cs431fa21s1-3.vmhost.psu.edu -R 8080:localhost:80 -C

ssh -D 8000 -f -C -q -N mmb7103@e5-cse-cs431fa21s1-3.vmhost.psu.edu






sudo apachectl restart

