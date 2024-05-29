# Laravel Queue Example with Docker

This repository provides an example of how to set up a Laravel application with Redis queues and a MySQL database using Docker. The application includes a simple job that sends an email, with email testing facilitated by Mailpit.

## Features

- **Laravel Application**: A basic Laravel setup.
- **Redis for Queues**: Using Redis for managing Laravel queues.
- **MySQL Database**: A MySQL database for persistent storage.
- **Mailpit**: An email testing tool to capture and inspect outgoing emails.
- **NGINX**: Serving the Laravel application.

## Getting Started

### Prerequisites

- Docker installed on your system.
- Docker Compose installed on your system.

### Setup

1. **Clone the Repository**

   ```sh
   git clone https://github.com/thekubera/laravel-queue-example
   cd laravel-queue-example
   ```

2. **Copy .env.example to .env**

   ```sh
   cp .env.example .env
   ```

3. **Build the Docker Containers**

   Build the containers without using the cache to ensure all dependencies are fresh.

   ```sh
   docker compose build --no-cache
   ```

4. **Run the Docker Containers**

   Start the containers in detached mode.

   ```sh
   docker compose up 
   ```
5. **Generate Laravel Application Key**

   Generate Laravel Application Key

   ```sh
   docker compose exec app php artisan key:generate
   ```

6. **Run Migrations**

   Run the Laravel migrations to set up the database schema.

   ```sh
   docker compose exec app php artisan migrate
   ```

### Using the Application

1. **Access the Application**

   Open your browser and go to `http://localhost:8000`.

2. **Send an Email**

   Visit `http://localhost:8000/send-email` to trigger an email being sent. You should see a message indicating the email has been queued.

3. **Check the Email with Mailpit**

   Open your browser and go to `http://localhost:8025` to access Mailpit. Here you can see the captured email.

### Docker Compose Services

- **app**: The main Laravel application container.
- **queue**: A worker container that processes the Laravel queues.
- **web**: An NGINX container that serves the Laravel application.
- **db**: A MySQL database container.
- **redis**: A Redis container for queue management.
- **mailpit**: A container for capturing and inspecting outgoing emails.

### Stopping the Application

To stop and remove all running containers:

```sh
docker-compose down
```

### Troubleshooting

- Ensure all environment variables in `.env` are set correctly.
- Check the logs of the containers if you encounter issues:

  ```sh
  docker-compose logs -f
  ```

- Verify that Docker and Docker Compose are properly installed and running.

### License

This project is open-source and available under the [MIT License](LICENSE).

## Contributing

If you'd like to contribute, please fork the repository and use a feature branch. Pull requests are welcome.

## Acknowledgments

This setup is inspired by various resources and tutorials on Docker, Laravel, and Redis integration.


<b>Happy coding!</b>