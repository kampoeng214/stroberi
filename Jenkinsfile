pipeline {
    agent { docker { image 'php' } }
    stages {
        stage('build') {
            steps {
                sh 'php --version'
            }
        }
    }
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

