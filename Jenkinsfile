// ::NOTIFICATION 
def telegram_url        = "https://api.telegram.org/bot5028938234:AAEMPp1YQqIkLBn5FXpn8mm6-QPPCV4ZAJ8/sendMessage" 
def telegram_chatid     = "-1001131394773"
def job_success         = "SUCCESS"
def job_error           = "ERROR"

pipeline {   
    agent any      
         

    stages {
        stage('Ready To Deploy') {
            steps{
                echo "ready"
            }   
        }
        
        stage('Deployment To Server aldo') {
            steps{
                echo "deploy to apache2"
                    sshagent(credentials: ['Apache2']) {
                    sh "cd .."
                    sh "ls"
                    sh "scp -r * root@3.133.84.143:/var/www/html/stroberi"
                    //sh "ssh root@3.111.35.31 cd /var/www/html/stroberi && pwd && git pull origin master"
                    
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

def notifications(Map args) {
    def message = " Dear Team PRH \n CICD Pipeline ${args.job} ${args.job_status} with build ${args.job_numb} \n\n More info at: ${args.job_url} \n\n Unit Test: ${args.unitTest_score} \n\n Total Time : ${currentBuild.durationString}"
    sh "curl -s -X POST ${args.telegram_url} -d chat_id=${args.telegram_chatid} -d text='${message}'"
    //parallel(
    //     "Telegram": {
    //       sh "curl -s -X POST ${args.telegram_url} -d chat_id=${args.telegram_chatid} -d text='${message}'"
    //    },
    //    "Jira": {
            //jiraSend color: "${args.jira_url}", message: "${message}", channel: "${args.slack_channel}"
    //    }
    //)
    }

}
}

 }   
