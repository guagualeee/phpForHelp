Questions
Assuming you don't know anything about the target machine, how do you find the IP and ports of running services on this network.
Hint: nmap is extremly helpful tool here.
Hint: ifconfig can help you gather more information.

1. What command(s) did you use to determine the running services?
    On the Kali machine, I run 

    <sudo apt install net-tools>

    to enable the ifconfig command.
    Next, run 
    
    <ifconfig>
    
    to get the IP address of the Kali machine. which is 172.18.0.2
    Then run 
    
    <nmap 172.18.0.0/24>
    
    to get all the host on the same network
    It returns the IP of the target machine which is 172.18.0.3


2. What are the running services, IP's and Ports?

    '''Nmap scan report for assignment_1_compose_target_run_f5c9bc61032a.assignment_1_compose_default (172.18.0.3)
    Host is up (0.000036s latency).
    Not shown: 979 closed ports
    PORT     STATE SERVICE
    21/tcp   open  ftp
    22/tcp   open  ssh
    23/tcp   open  telnet
    25/tcp   open  smtp
    80/tcp   open  http
    111/tcp  open  rpcbind
    139/tcp  open  netbios-ssn
    445/tcp  open  microsoft-ds
    512/tcp  open  exec
    513/tcp  open  login
    514/tcp  open  shell
    1099/tcp open  rmiregistry
    1524/tcp open  ingreslock
    2121/tcp open  ccproxy-ftp
    3306/tcp open  mysql
    5432/tcp open  postgresql
    5900/tcp open  vnc
    6000/tcp open  X11
    6667/tcp open  irc
    8009/tcp open  ajp13
    8180/tcp open  unknown
    MAC Address: 02:42:AC:12:00:03 (Unknown)'''

Now using msfconsole search for exploits using the command search mysql. Using the Auxiliary Module use auxiliary/scanner/mysql/mysql_login attempt to login to the mysql server. Once you've gained access to the server, print show the databases: show databases;

1. What is the auxiliary module for msf, how did it help you in this lab?
    Auxiliary modules can offer different functions for a variety of purposes. In this lab, I use mysql_login module to get the password, which is a blank password in this lab. Then I use mysql_sql module to connect MySQL on the target machine and send a command to MySQL on the target machine.

2. What is the output of show databases;
    '''[*] 172.18.0.3:3306 - Sending statement: 'show databases;'...
    [*] 172.18.0.3:3306 -  | information_schema |
    [*] 172.18.0.3:3306 -  | dvwa |
    [*] 172.18.0.3:3306 -  | metasploit |
    [*] 172.18.0.3:3306 -  | mysql |
    [*] 172.18.0.3:3306 -  | owasp10 |
    [*] 172.18.0.3:3306 -  | tikiwiki |
    [*] 172.18.0.3:3306 -  | tikiwiki195 |
    [*] Auxiliary module execution completed'''

3. What is the purpose of a Dockerfile.
    Dockerfile gives all the commands Docker needs to run.

4. Add the contents of your Dockerfile.
    '''FROM kalilinux/kali-rolling
    RUN apt-get update -y
    RUN apt-get install metasploit-framework -y
    CMD bash'''

5. What is the purpose of a docker-compose file.
    Docker compose file tells Docker to run mutiple docker containers.

6. Add the contents of your docker-compose file.
    '''version: '3'
    services:
    kali:
        build: .
    target:
        image: tleemcjr/metasploitable2:latest'''