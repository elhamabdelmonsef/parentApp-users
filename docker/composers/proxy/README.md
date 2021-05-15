# Parent App Docker Proxy Composer

### How to run the container
- Copy .env.example to .env 
- Edit .env file and set your env vars
- Run `source .env`
- Run `docker-compose up -d`

### Environment Variables:
#### ```PROXY_PORT```
This variable specify the mapped http port from your host to the docker container. 
For the local usage, it is recommended to use `80`. 
If you have a web server running on your local machine, use any other port.
