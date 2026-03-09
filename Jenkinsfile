pipeline {
  agent any

  stages {

    stage('Build Image') {
      steps {
        sh 'docker build -t int396/crud-app .'
      }
    }

    stage('Push Image') {
      steps {
        sh 'docker push int396/crud-app'
      }
    }

    stage('Deploy to Kubernetes') {
      steps {
        sh 'kubectl apply -f deployment.yaml'
        sh 'kubectl apply -f service.yaml'
      }
    }

  }
}
