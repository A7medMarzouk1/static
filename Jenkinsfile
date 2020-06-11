pipeline {
    agent any
    stages {
         stage('Lint HTML'){
                steps {
                    sh 'tidy -q -e *.html'
                }
            }
        
       stage('Upload to AWS') {
             steps {
                sh 'echo "Hello World"'
                sh '''
                echo "Multiline shell stps works too"
                '''
                // withAWS(credentials: 'aws-static',region:'us-east-2') {
                  withEnv(["AWS_ACCESS_KEY_ID=${env.AWS_ACCESS_KEY_ID}",
                 "AWS_SECRET_ACCESS_KEY=${env.AWS_SECRET_ACCESS_KEY}",
                 "AWS_DEFAULT_REGION=${env.AWS_DEFAULT_REGION}"]) {
                       s3Upload(pathStyleAccessEnabled: true, payloadSigningEnabled: true, file:'index.html', bucket:'project3-jenkins')

                }

                }
         }
    }
}
