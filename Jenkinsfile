pipeline {
    agent any

    stages {
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
}
