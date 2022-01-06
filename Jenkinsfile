pipeline {  
    agent any     
        
    stages {
        stage('Ready To Deploy') {
            steps{
                echo "ready"
            }   
        }
        
        stage('Deployment To Server akuy') {
            steps{
                echo "deploy to apache2"
                    sshagent(credentials: ['Apache']) {
                    //sh "cd .." 
                    //sh "ssh root@18.224.22.246 -p 22 && docker exec -it eb4b4dcb5e5c bash && ls"
                    //sh "docker"    
                    //sh "scp -r * root@18.224.22.246:docker exec -it eb4b4dcb5e5c bash && htdocs/akuy"
                    //sh "ssh root@3.111.35.31 cd /var/www/html/stroberi && pwd && git pull origin master"
                    sh "scp -r * root@3.133.84.143:/var/www/html/stroberi2"
                 }    
            }
        }
        
    } 
}
