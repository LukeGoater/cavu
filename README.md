# How to use the API:

## Login: 
*POST /login*
```
{
    email: test@example.com
    password: password
}
```

The token returned in the headers will be the Bearer token for other requests.

### Lists all car parks
*GET /car-parks*

### List all spaces for a car park
*GET /car-parks/{car_park}/spaces*

Optional filter for availability and pricing:
```
{
    "from": "2024-05-01",
    "to": "2024-05-10"
}
```

### Create a reservation

*POST /spaces/{space}/reservations*

```
{
    "from": "2024-05-01",
    "to": "2024-05-10"
}
```

### Update a reservation

*PUT /reservations/{reservation}*

### Cancel a reservation
*DELETE /reservations/{reservation}*

### Get a users reservations
*GET /users/{user}/reservations*