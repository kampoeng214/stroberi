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
                    sshagent(credentials: ['Apache2']) {
                    //sh "cd .." 
                    //sh "ssh root@18.224.22.246 -p 22 && docker exec -it eb4b4dcb5e5c bash && ls"
                    //sh "docker"    
                    //sh "scp -r * root@18.224.22.246:docker exec -it eb4b4dcb5e5c bash && htdocs/akuy"
                    //sh "ssh root@3.111.35.31 cd /var/www/html/stroberi && pwd && git pull origin master"
                    sh "scp -r * root@13.126.28.12:/var/www/html/stroberi2
                 }    
            }
        }
        
        stage ("Notifications") {
				deleteDir()
                echo "Job Success"
                notifications(telegram_url: telegram_url, telegram_chatid: telegram_chatid, 
                job: env.JOB_NAME, job_numb: env.BUILD_NUMBER, job_url: env.BUILD_URL, job_status: job_success, unitTest_score: unitTest_score
                )
            }
        } catch (e) {

        stage ("Error") {
			deleteDir()
            echo "Job Failed"
            notifications(telegram_url: telegram_url, telegram_chatid: telegram_chatid, 
            job: env.JOB_NAME, job_numb: env.BUILD_NUMBER, job_url: env.BUILD_URL, job_status: job_error, unitTest_score: unitTest_score
            )
        }
    }

    
}
