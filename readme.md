# Description

This project allows to respond requests in order to be configured since Centribot to make greate demos.

# Instalation

```php
composer install
```

# Requests

## Status

It responses the status of the service. In that case it is a random value between 0 and 1.

URL:

```php
https://centribotextensions.centribal.io/status
```

Response type: JSON.
Response value: it's a random value between 0 and 1.

## Orders

It responses the order info by order identifier.

The result of the request depends on the cocient of the order id divided by 3.

URL:

```php
https://centribotextensions.centribal.io/orders/{id}
```

- Response type: JSON.
- OK Response code: 200.
Response value:
```php
{
  "id":"1",
  "name":"Sombrero",
  "date":"16/11/2020",
  "price":"69,95",
  "link":"https://platform.centribal.com",
  "status":"1",
  "return_status":"0",
  "transport_link":"https://platform.centribal.com",
  "currency":"1",
  "user_name":"Andrea Beitia",
  "user_email":"abeitia@centribal.com",
  "user_phone":"+34646128074"
}
```  
- KO Response code: 404.
- KO Response value:
```php
{}
```

## Orders by email

It responses the order info by order identifier and email.

The result of the request is correct if the order identifier and the buyer email matches.

Some correct values are:
- id=0,3,6 and email=mquilabert@centribal.com
- id=1,4,7 and email=abeitia@centribal.com
- id=2,5,8 and email=ciriarte@centribal.com

URL:

```php
https://centribotextensions.centribal.io/orders/{id}/{email}
```

- Response type: JSON.
- OK Response code: 200.
- OK Response value:
```php
{
  "id":"1",
  "name":"Sombrero",
  "date":"16/11/2020",
  "price":"69,95",
  "link":"https://platform.centribal.com",
  "status":"1",
  "return_status":"0",
  "transport_link":"https://platform.centribal.com",
  "currency":"1",
  "user_name":"Andrea Beitia",
  "user_email":"abeitia@centribal.com",
  "user_phone":"+34646128074"
}
```
- KO Response code: 404.
- KO Response value:
```php
{}
```

## Accounts

It responses the account info by email and password.

The result of the request is correct if the email and password of the account matches.

Some correct values are:
- email=mquilabert@centribal.com and password=Centribal123
- email=abeitia@centribal.com and password=Centribal123
- email=ciriarte@centribal.com and password=Centribal123

URL:

```php
https://centribotextensions.centribal.io/accounts/{email}/{pass}
```

- Response type: JSON.
- OK Response code: 200.
- OK Response value:
```php
{
  "id":1,
  "email":"mquilabert@centribal.com",
  "pass":"Centribal123",
  "name":"Miriam",
  "surname":"Quilabert",
  "age":"26",
  "expiration":"31/12/2020",
}
```
- KO Response code: 404.
- KO Response value:
```php
{}
```
