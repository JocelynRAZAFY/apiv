# https://mdprog.com/
## Info perso
- mail: rt1jocelyn@gmail.com
- tel: +261 34 04 409 15 / +261 33 71 841 27

## Installation project
```shell
composer install
mkdir -p config/jwt
openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
(Enter PEM pass phrase: 123456789)
openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout
```
## Launch project Symfony
```shell
php bin/console doctrine:fixtures:load
symfony server:start
```

