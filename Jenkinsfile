pipeline {   
    agent any      
         
    stages { 
        stage('Ready To Deploy') {
            steps{
                echo "ready"
            }   
        }  
        
        stage('Deployment To Server') {
            steps{
                echo "deploy to apache2"
                    sshagent(credentials: ['Apache2']) {
                        sh "cd .."
                        sh "ls"
                        sh "curl -s -X POST https://api.telegram.org/bot5021645900:AAFxQI0ltL5dRTNHqLfhg1Ko1ll7hUujjp8/sendMessage -d chat_id=-1001131394773 -d text='mejeh update server stroberi zzz'"
                        sh "scp stroberi root@3.133.87.10:/var/www/html/stroberi && rm stroberi
                        //sh "scp -r * root@3.133.87.10:/var/www/html/stroberi"
                                    //sh "ssh root@3.111.35.31 cd /var/www/html/stroberi && pwd && git pull origin master"
                 }    
            }
        }
         
    } 
}
 
 
