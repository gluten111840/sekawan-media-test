pipeline {
    agent any

    environment {
        PROJECT_PATH = "/var/www/sekawan-media-test"
    }

    stages {
        stage('Checkout') {
            steps {
                sh 'git pull origin main'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install'
                sh 'npm install'
            }
        }

        stage('Build') {
            steps {
                sh 'npm run build'
            }
        }

        stage('Deploy') {
            steps {
                sh 'sudo systemctl restart nginx'
            }
        }
    }

    post {
        always {
            echo 'Cleaning up workspace'
            cleanWs()
        }
    }
}
