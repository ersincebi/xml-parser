# php xml parser
Implementation of the application made with the pure php7.4, html5, css and js 

### Installation
- Clone the project
- In the project folder run `make build` or run the docker commands in Makefile
- When you done run the `make remove` for deleting, be cautious for other docker images on your local machine 

### Requirements
- docker
- docker-compose
- make

### without docker
- php
- postgresql
- and also you need to define environment variables by hand, like in the `docker-compose.yml` file
 
### About:
- In this project, I use PHP version 7.4, but I didn't use any framework for project.
- Instead of using a framework I try to create my own mvc structure to us oop.
- As a database engine postgresql to store datas.
- 

#### Requests
The routes available are for the api part:

| Method | Route                |Parameters| Action                                                         |
|--------|----------------------|---------------------------|----------------------------------------------------------------|
| `GET`  | `/`                  | No parameter needed       | Greeting Page                                                  |
| `GET`  | `/feed/index`        | No parameter needed       | File Upload Page                                               |
| `POST` | `/feed/feedData`     | requires $_FILES          | Uses temp for uploaded files data                              |
| `GET`  | `/booklist` | No parameter needed | Gives the list of authors book and allow you to dynamic filter |
