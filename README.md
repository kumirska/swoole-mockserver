Create simple mock server in 3 steps:

1. Clone repository:
    `git clone https://github.com/kumirska/swoole-mockserver.git`
2. Install dependencies:
    `composer install`
3. Build swoole server:
    `docker build -f ./Dockerfile -t swoole-php .`
    
Usage

- Place your own source files and routes into directory `mocks` or edit default.
- Run http server:
    `docker run --rm -p 9500:9500 -v $(pwd):/app -w /app swoole-php server.php`
    
Notes:

Use `Swoole IDE Helper` plugin for better highlighting in PhpStorm IDE.

Swoole documentation:
    Build swoole environment and init new server [https://www.swoole.co.uk/docs/get-started/try-docker]