# Trianing plan

The training plan is a Rest Api application that allows us to read, create, update and delete training plans from a json file.

## Available routes

### GET fetch all training plans from the json file

{main-url}/trainng-plan

### Example Response

```json
[
  {
    "id": 1,
    "times-per-week": 4,
    "level": "advanced",
    "goal": "Muscle build up",
    "started-at": "2023-01-01",
    "finished-at": "2023-04-01"
  },
  {
    "id": 2,
    "times-per-week": 3,
    "level": "beginner",
    "goal": "gain weight",
    "started-at": "2023-01-01",
    "finished-at": "2023-04-01"
  }
]
```

### GET fetch training plan by id from the json file

{main-url}/trainng-plan/1

### Examples of responses

200

```json
{
  "id": 1,
  "times-per-week": 4,
  "level": "advanced",
  "goal": "Muscle build up",
  "started-at": "2023-01-01",
  "finished-at": "2023-04-01"
}
```

404

```
Training plan not found
```

### POST add training plan in the json file

{main-url}/trainng-plan

### Example Request Body

```json
{
  "times-per-week": 4,
  "level": "advanced",
  "goal": "lose weight",
  "started-at": "2023-01-01",
  "finished-at": "2023-04-01"
}
```

### Example Response

201

```json
{
  "message": "training plan is successfully created"
}
```

### PUT update training plan from the json file by id

{main-url}/trainng-plan/3

### Example Request Body

```json
{
  "times-per-week": 4,
  "level": "advanced",
  "goal": "lose weight",
  "started-at": "2023-01-01",
  "finished-at": "2023-04-01"
}
```

### ### Examples responses

200

```json
{
  "message": "training plan with id 3 is successfully updated"
}
```

404

```
Training plan not found
```

### DELETE remove training plan from the json file by id

{main-url}/trainng-plan/3

### Examples Responses

200

```json
{
  "message": "training plan with id 3 is successfully deleted"
}
```

404

```
Training plan not found
```
