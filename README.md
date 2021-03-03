# Laravel Demo EShop

This is learning project of simple eshop, which contains catalog, cart, checkout and admin section.

Categories of shop based on nested-sets (https://github.com/lazychaser/laravel-nestedset).

Cart is based on Laravel Shopping Cart package (https://github.com/darryldecode/laravelshoppingcart)

Admin page based on AdminLTE v3 template

Products support filters, based on package (https://github.com/Tucker-Eric/EloquentFilter)

## Local deployment:

1. Clone repository

```
$ git clone https://github.com/justexpla/laravel-demo-eshop --branch=main
```

2. Install missing packages

```
$ composer install
$ npm i && npm run dev
```

3. Configire .env file

4. Start through laravel/sails

```
$ make dup      // similar to ./vendor/bin/sail up -d
``` 

5. Run migrations

```
$ ./vendor/bin/sail artisan migrate --seed
```