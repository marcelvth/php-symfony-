# PHP MVC startpunt (Symfony-stijl)

Dit project bevat een simpele MVC-opzet met een `HomeController` en een indexpagina.

## Structuur

- `public/index.php`: front controller.
- `config/routes.php`: route-definities.
- `src/Controller/HomeController.php`: controller met `index` actie.
- `templates/home/index.php`: view met "Hello world".

## Starten

```bash
php -S 127.0.0.1:8000 -t public
```

Open daarna: <http://127.0.0.1:8000>
