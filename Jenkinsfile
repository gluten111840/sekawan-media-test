pipeline {
    agent any

    environment {
        PROJECT_PATH = "~/workspace/sekawan-media-test"
    }

    stages {
        stage('Install Dependencies') {
            steps {
                dir(PROJECT_PATH) {
                    sh 'pwd'
                    sh 'composer install'
                    sh 'npm install'
                }
            }
        }

        stage('Build') {
            steps {
                dir(PROJECT_PATH) {
                    sh 'npm run build'
                }
            }
        }

        stage('Deploy') {
            steps {
                dir(PROJECT_PATH) {
                    sh 'sudo systemctl restart nginx'
                }
            }
        }
    }
}
