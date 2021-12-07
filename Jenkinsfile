pipeline {
    agent any 
   
    parameters {
        booleanParam(name: 'Run', defaultValue: true, description: 'Toggle this value for testing')
        choice(name: 'CICD', choices: ['CICD', 'CI'], description: 'pick CI / CI, CD, or Rollback')
         
    }
    stages {
        stage('Clone Project') {
            steps{
               echo "Clone Project"
            }
        }

        stage('Build Project') {
            steps{
               script {
                    echo "Build Project"
                }
            }
        }
        
        stage('Push Image') {
            when {
                expression {
                    CICD == 'CICD'
                }
            }
            steps{
               script {
                    echo "Push Image"
                }
            }
        }
        stage('Deployment') {
            when {
                expression {
                    CICD == 'CICD'
                }
            }
            steps{
               script {
                    echo "Deployment"
                }
            }
        }
        stage('Run Testing Development') {
            when {
                expression {
                    CICD == 'CICD'
                }
            }
            steps{
                script {
                    sh 'echo passed'
                }
            }
        }
    }
}
