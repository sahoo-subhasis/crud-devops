pipeline {
  agent {
    kubernetes {
      yaml '''
apiVersion: v1
kind: Pod
spec:
  containers:
  - name: docker
    image: docker:27
    command:
    - cat
    tty: true
    volumeMounts:
    - name: docker-sock
      mountPath: /var/run/docker.sock

  - name: kubectl
    image: bitnami/kubectl:latest
    command:
    - cat
    tty: true

  volumes:
  - name: docker-sock
    hostPath:
      path: /var/run/docker.sock
'''
    }
  }

  stages {

    stage('Build Image') {
      steps {
        container('docker') {
          sh 'docker build -t int396/crud-app:latest .'
        }
      }
    }

   stage('Push Image') {
      steps {
        container('docker') {
          sh '''
          echo "dckr_pat_iaCQTMjuhkwkNnuRcZa6MNheEfk" | docker login -u int396 --password-stdin
          docker push int396/crud-app:latest
          '''
    }
  }
}

    stage('Deploy to Kubernetes') {
  steps {
    container('kubectl') {
      sh '''
      kubectl apply -f crud-deployment.yaml -n jenkins
      kubectl apply -f crud-service.yaml -n jenkins
      '''
    }
  }
}
    }

  }
}
