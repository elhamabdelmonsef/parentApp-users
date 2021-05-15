# Users App Docker Composer

### How to run the containers
- Make sure that [Proxy Composer](../proxy) is up & running
- Copy .env.example to .env
- Edit .env file and set your env vars
- Run `docker-compose up -d --build --force-recreate`
- Edit your /etc/hosts file and add the following line
    - `127.0.0.1 ${VIRTUAL_HOST}`. Replace **${VIRTUAL_HOST}** with the one defined in your .env file

### Environment Variables:
#### `CONTAINER_USER`
The username to be used inside container. You can get your current username using this command `id -nu`.

#### `CONTAINER_USER_ID`
The username to be used inside container. You can get your current user id using this command `id -u`.

#### `VIRTUAL_HOST`
The virtual host to be used to access your application.

#### `PROJECT_PATH`
The absolute local path to your project.
