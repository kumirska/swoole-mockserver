# Simple mock framework around the swoole-php.

#### Create simple mock server in 3 steps:

1. Clone repository:
    `git clone https://github.com/kumirska/swoole-mockserver.git`
2. Install dependencies:
    `composer install`
3. Build swoole server:
    `docker build -f ./Dockerfile -t swoole-php .`
    
#### Usage

- Place a response files into directory `mocks/sources`.
- Add your routes into `mocks/routes.php`, where key is a route, value is a name of json file (w/o extension) in the folder `mocks/sources`.
- Run http server:
    `docker run --rm -p 9500:9500 -v $(pwd):/app -w /app swoole-php server.php`
    
#### Notes:

>Use `Swoole IDE Helper` plugin for better highlighting in PhpStorm IDE.

Swoole original documentation: [https://www.swoole.co.uk/docs]
