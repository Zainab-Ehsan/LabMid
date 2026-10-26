
pipeline {
    agent any

    environment {
        APP_KEY = credentials('labmid-app-key')
        DB_PASSWORD = credentials('labmid-db-password')
        MYSQL_ROOT_PASSWORD = credentials('labmid-mysql-root-password')
    }

    options {
        disableConcurrentBuilds()
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
                echo 'GitHub source code checked out successfully.'
            }
        }

        stage('Validate Docker Compose') {
            steps {
                sh '''
                    set -eu
                    env -u DOCKER_HOST docker --version
                    env -u DOCKER_HOST docker compose version
                    env -u DOCKER_HOST docker compose config --quiet
                '''
            }
        }

        stage('Build Docker Images') {
            steps {
                sh '''
                    set -eu
                    env -u DOCKER_HOST docker compose build
                '''
            }
        }

        stage('Deploy Application') {
            steps {
                sh '''
                    set -eu

                    env -u DOCKER_HOST docker compose up -d

                    echo "Waiting for MySQL to become healthy..."
                    for i in $(seq 1 30); do
                        STATUS=$(env -u DOCKER_HOST docker compose ps --format json db)

                        if echo "$STATUS" | grep -qi healthy; then
                            echo "MySQL is healthy."
                            break
                        fi

                        if [ "$i" -eq 30 ]; then
                            echo "MySQL did not become healthy."
                            env -u DOCKER_HOST docker compose logs db
                            exit 1
                        fi

                        sleep 5
                    done

                    env -u DOCKER_HOST docker compose exec -T app \
                        php artisan migrate --force

                    env -u DOCKER_HOST docker compose exec -T app \
                        php artisan route:list
                '''
            }
        }

        stage('Smoke Test') {
            steps {
                sh '''
                    set -eu
                    curl --fail --silent --show-error \
                        --retry 10 --retry-delay 3 \
                        http://localhost:8081/ \
                        -o /dev/null

                    echo "Application HTTP smoke test passed."
                '''
            }
        }
    }

    post {
        success {
            echo 'CI/CD SUCCESS: Application deployed at http://localhost:8081'
        }

        failure {
            echo 'CI/CD FAILED: Check the failed stage and console output.'
        }

        always {
            sh '''
                env -u DOCKER_HOST docker compose ps || true
            '''
        }
    }
}
