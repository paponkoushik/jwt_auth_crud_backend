#### Note: All API's link start with Domain of your apps
#### Example: Domain is http://127.0.0.1:8000/
#### Login Api:
URL(POST request):  ```your-domain/api/auth/login```
Example URL: (POST request):  ```http://127.0.0.1:8000/api/auth/login```

Example:
```
url: http://localhost:8088/api/auth/login

{
  "email": "jerrod.reinger@example.org",
  "password": "password"
}
```
If credentials match then it will give you a token.

Example:
```
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYyNzYyOTQ1MywiZXhwIjoyMjI3NjI5MzkzLCJuYmYiOjE2Mjc2Mjk0NTMsImp0aSI6ImF5UGJUc0IwMUR0ZE9ZUFEiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.K3tC2iS38-lKXR_vkHLZ49vZzhCU4hhjGpTLSjeBzjc"
}
```
#### Logout Api:
URL(POST request):  ```your-domain/api/auth/logout```
Example URL: (POST request):  ```http://127.0.0.1:8000/api/auth/logout```

#### Get Auth User Api:
URL(GET request):  ```your-domain/api/auth/myself```
Example URL: (POST request):  ```http://127.0.0.1:8000/api/auth/myself```

Example:
```
{
    "id": 1,
    "name": "Dorcas Dietrich",
    "email": "jerrod.reinger@example.org",
    "email_verified_at": "2021-07-28T08:33:48.000000Z",
    "created_at": "2021-07-28T08:33:48.000000Z",
    "updated_at": "2021-07-28T08:33:48.000000Z"
}
```
#### Store Product Api:
URL: (POST request):  ```your-domain/api/product/store```
Example URL: (POST request):  ```http://127.0.0.1:8000/api/product/store```
Note: User should be authenticated to access this url.

Example:
```
{
    "title": "T-Shirt",
    "price": "12.23",
    "description": "Something",
    "image": "file",
}
```
#### Get ALl Products Api:
URL: (POST request):  ```your-domain/api/product/index```
Note: User should be authenticated to access this url.
Note 2: Use a command to link storage, because all the image file will be uploaded in storage.
Command: ```php artisan storage:link```

Example:
```
[
    {
        "id": 1,
        "title": "T-Shirt",
        "description": "Something",
        "price": 12.23,
        "image": "/storage/avatar/Pr4Y5aIrsZVmkn636Pyon6yYmFLhMNJRzbXYv5aH.jpg",
        "deleted_at": null,
        "created_at": "2021-07-28T12:43:27.000000Z",
        "updated_at": "2021-07-29T11:11:38.000000Z"
    },
]
```

#### Get A Single Product Api:
URL: (GET request):  ```your-domain/api/product/show/{product_id}```
Example URL: (GET request):  ```http://127.0.0.1:8000/api/product/show/1```

Output Example:
```
{
    "id": 1,
    "title": "T-Shirt",
    "description": "Something",
    "price": 12.23,
    "image": "/storage/avatar/Pr4Y5aIrsZVmkn636Pyon6yYmFLhMNJRzbXYv5aH.jpg",
    "deleted_at": null,
    "created_at": "2021-07-28T12:43:27.000000Z",
    "updated_at": "2021-07-29T11:11:38.000000Z"
}
```
#### Update A Product Api:
URL: (PATCH request):  ```your-domain/api/product/update/{product_id}```
Example URL: (PATCH request):  ```http://127.0.0.1:8000/api/product/update/1```

Example:
```
{
    "id": 1,
    "title": "T-Shirt",
    "description": "Something will going to update",
    "price": 121.23,
    "image": "file",
}
```
#### Delete A Product Api:
URL: (DELETE request):  ```your-domain/api/product/delete/{product_id}```
Example URL: (DELETE request):  ```http://127.0.0.1:8000/api/product/delete/1```
Note: It will do soft delete.
