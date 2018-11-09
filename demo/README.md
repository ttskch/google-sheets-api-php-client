# Demo

You can easily attempt a live demo.

## Usage

### OAuth2

```bash
$ cd demo
$ cp parameters.php{.placeholder,}
$ vi parameters.php   # tailor to your env
$ php -S localhost:8888 -t web
$ open -a "Google Chrome" http://localhost:8888/oauth   # e.g. for macOS
```

### Service Account

```bash
$ cd demo
$ cp /path/to/your/service-account-credencials.json .
$ php -S localhost:8888 -t web
$ open -a "Google Chrome" http://localhost:8888/service-account   # e.g. for macOS
```
