Create simple mock server in 3 steps:

1. Build:
    `docker build -f ./Dockerfile -t swoole-php .`
2. Place your own source files and routes into directory `mocks` or edit default.
3. Run http server:
    `docker run --rm -p 9501:9501 -v $(pwd):/app -w /app swoole-php server.php`
    
Notes:

Use `Swoole IDE Helper` plugin for better highlighting in PhpStorm IDE.

Swoole documentation:
    Build swoole environment and init new server [https://www.swoole.co.uk/docs/get-started/try-docker]