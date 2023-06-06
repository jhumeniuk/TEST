# Skai-Demo-Project
NGINX+PHP-FPM and MySQL in docker.


# A short introduction
The system described above is a web application stack built using Docker containers. It consists of two main components: an Nginx web server with PHP-FPM and a MySQL database.
The Nginx web server serves as the entry point for incoming HTTP requests. It handles static file serving, reverse proxying, and passes PHP requests to PHP-FPM for processing.
PHP-FPM (PHP FastCGI Process Manager) is responsible for executing PHP code and generating dynamic content.
It receives requests from Nginx, processes the PHP scripts, and returns the generated HTML content back to Nginx for serving to the client.
The MySQL database stores the application's data. It provides persistent storage for the web application, allowing data to be stored and retrieved efficiently.
To build and run the system, Docker is used. Docker allows you to package the application components and their dependencies into separate containers, providing isolation and reproducibility. 
Each component (Nginx+PHP-FPM and MySQL) runs in its own container, enabling scalability, portability, and easy deployment.
During the build process of the Nginx+PHP-FPM Docker image, an SQL script is executed to initialize the database with tables and sample data. 
This ensures that the database is ready with the necessary structure and content when the application starts.

Overall, this system provides a scalable and efficient web application stack using Docker containers, with Nginx+PHP-FPM handling the web server functionality and MySQL providing data storage.

# An architecture design
    +------------------+
    |                  |
    |   User's Browser |
    |                  |
    +------------------+
             |
             v
    +------------------+
    |                  |
    |     Nginx        |
    |                  |
    +------------------+
             |
             v
    +------------------+
    |                  |
    |   PHP-FPM        |
    |                  |
    +------------------+
             |
             v
    +------------------+
    |                  |
    |    MySQL         |
    |   Database       |
    |                  |
    +------------------+
In this architecture design:

The user's browser sends HTTP requests to the Nginx server.
Nginx acts as a reverse proxy and forwards PHP requests to the PHP-FPM service.
PHP-FPM executes the PHP scripts and generates dynamic content, which is then returned to Nginx.
Nginx serves the dynamic content back to the user's browser.
For data storage:

The MySQL database service is used to store and retrieve application data. PHP-FPM communicates with the MySQL database to perform database operations.
Key components and their roles:

User's Browser: The client-side browser where users interact with the web application.
Nginx: The web server that handles HTTP requests, acts as a reverse proxy, and serves static files.
PHP-FPM: The PHP FastCGI Process Manager that executes PHP scripts and generates dynamic content.
MySQL: The database management system used to store and retrieve application data.

# The prerequisite tools
The prerequisite tools for building and running the solution described above include:

Docker: Docker is a containerization platform that allows you to package applications and their dependencies into containers. It is used to build and run the Nginx+PHP-FPM and MySQL containers, 
 providing isolation and portability.
Docker Compose: Docker Compose is a tool for defining and managing multi-container Docker applications. It allows you to define the services, networks, and volumes required for your application in a 
 single YAML file. Docker Compose is used to orchestrate the Nginx+PHP-FPM and MySQL containers together and configure their interactions.
Git: Git is a distributed version control system that enables collaborative development and helps manage source code. It is used to track changes, manage branches, and facilitate team collaboration. 
 Git is essential for version controlling your application code, including the Dockerfiles, SQL scripts, Nginx configurations, and any other relevant files.
Text Editor or IDE: You will need a text editor or an integrated development environment (IDE) to write and modify your application code. Popular options include Visual Studio Code, Sublime Text, Atom,  or any other editor of your preference.
Command-Line Interface (CLI): A command-line interface is required to execute commands for building and running Docker containers, running Docker Compose commands, and interacting with the development 
 environment. You can use the command-line interface provided by your operating system or choose an alternative like Git Bash, PowerShell, or a terminal emulator.

# How to build/start/stop the containers
To build, start, and stop the containers in the described structure, you can use Docker and Docker Compose. Here are the commands to perform these actions:

1. **Build the Containers**:

   To build the Nginx+PHP-FPM and MySQL containers, navigate to the directory where your `docker-compose.yml` file is located and run the following command:

   ```bash
   docker-compose build
   ```

   This command reads the `docker-compose.yml` file and builds the Docker images specified in it. It pulls the base images (if not already available) and executes any defined build instructions.

2. **Start the Containers**:

   Once the containers are built, you can start them by running the following command:

   ```bash
   docker-compose up -d
   ```

   The `-d` flag runs the containers in detached mode, allowing them to continue running in the background.

   This command reads the `docker-compose.yml` file and starts the containers specified in it. The containers will be started in the order specified and will run in the background.

3. **Stop the Containers**:

   To stop the running containers, use the following command:

   ```bash
   docker-compose down
   ```

   This command stops and removes the containers, networks, and volumes specified in the `docker-compose.yml` file.

   If you want to remove the volumes along with the containers, you can add the `--volumes` flag:

   ```bash
   docker-compose down --volumes
   ```

   This command is useful when you want to clean up all the data associated with the containers as well.

These commands should be executed in the same directory where your `docker-compose.yml` file is located. Make sure you have Docker and Docker Compose installed and running on your machine before executing these commands.

Remember to adjust the `docker-compose.yml` file and directory paths to match your specific setup if you've made any modifications to the file structure.

# A flow diagram (a flow of a CI/CD pipeline for the system)

                                      +--------------+
                                      |              |
                                      |   Version    |
                                      |   Control    |
                                      |   System     |
                                      |              |
                                      +--------------+
                                              |
                                              v
                                      +--------------+
                                      |              |
                                      |   CI Server  |
                                      |              |
                                      +--------------+
                                              |
                                    +---------|---------+
                                    |                   |
                                    v                   v
                               +------+             +------+
                               |      |             |      |
                               |Build |             |Test  |
                               |Stage |             |Stage |
                               |      |             |      |
                               +------+             +------+
                                    |                   |
                                    v                   v
                              +-------+           +-------+
                              |       |           |       |
                              |Build  |           |Test   |
                              |Docker |           |Docker |
                              |Image  |           |Image  |
                              +-------+           +-------+
                                    |                   |
                                    v                   v
                              +-------+           +-------+
                              |       |           |       |
                              |Push   |           |Deploy |
                              |Image  |           |to     |
                              |       |           |Server |
                              +-------+           +-------+

Explanation of the flow:

1.The version control system, such as Git, manages the source code, including Dockerfiles, SQL scripts, Nginx configurations, and application code.

2.The CI server, such as Jenkins, GitLab CI, or CircleCI, is responsible for automating the CI/CD pipeline. It listens for changes in the version control system.

3.The CI server triggers the build stage, which involves compiling the code, running code quality checks (linting, static analysis), and executing unit tests.

4.Upon successful completion of the build stage, the CI server proceeds to the test stage, where additional tests, such as integration tests or end-to-end tests, are performed to ensure the application functions correctly.

5.In the build stage, the Docker image for Nginx+PHP-FPM is built. This involves pulling the necessary base images, copying the application code, and configuring the image with required dependencies.

6.In the test stage, the Docker image is tested to ensure it operates as expected. This may involve running additional tests against the image or performing health checks.

7.Once the image passes all the tests, it is tagged and pushed to a Docker registry (e.g., Docker Hub, private registry) to make it available for deployment.

8.In the deployment stage, the image is pulled from the Docker registry and deployed to the target server, which may be a staging or production environment. The deployment process may involve 
configuring networking, setting environment variables, and linking with other services.

