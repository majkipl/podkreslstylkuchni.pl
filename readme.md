## About

Landing Page in Laravel 5

## Technologies

- **PHP ^7.2**
- **MySQL ^8.0.12**
- **PhpMyAdmin ^4.8.4**
- **MailCatcher**
- **Composer ^1.8.4**
- **Node ^12**
- **Docker**
- **Laravel ^5.8**
- **JQuery ^1.11.3**
- **Bootstrap ^4.1.3**

## Setup

Copy .env form .env.example

```bash
$ cp .env .env.example
```

Modify the .env file as desired.

```bash
$ docker-compose build --no-cache

$ docker-compose up -d
```

## Run

The local server will be started on the port defined in the DOCKER_HTTPD_PORT environment variable in the .env file, e.g.: http://localhost:8080 .
