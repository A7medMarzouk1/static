pipeline {
    agent any
    stages {
       stage('Upload to AWS') {
             steps {
                sh 'echo "Hello World"'
                sh '''
                echo "Multiline shell stps works too"
                '''
                 withAWS(region:'us-east-2') {
                       s3Upload(pathStyleAccessEnabled: true, payloadSigningEnabled: true, file:'index.html', bucket:'project3-jenkins')

                }

                }
         }
    }
}
