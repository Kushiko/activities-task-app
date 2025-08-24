# API Documentation (v1)

All endpoints are prefixed with `/api/v1`.

---

## Activities

### 1. Get a paginated list of activities

- **Method:** `GET`
- **Endpoint:** `/api/v1/activities`
- **Description:** Returns a paginated list of all activities. Supports pagination via the `?page=` query parameter.
- **Example Response (200 OK):**
  ```json
  {
    "data": [
      {
        "id": 1,
        "name": "Morning Yoga",
        "shortDescription": "A relaxing yoga session.",
        "description": "Full description of the yoga session.",
        "mediaFiles": ["/path/to/image.jpg"],
        "registrationUrl": "http://example.com/register",
        "location": { "type": "Polygon", "coordinates": [...] },
        "schedule": { "date": "2025-09-04", "time_start": "12:00" },
        "likesCount": 15,
        "activityType": {
          "name": "Health",
          "iconPath": "/path/to/icon.svg"
        },
        "participant": {
          "name": "City Wellness Center",
          "logoPath": "/path/to/logo.png"
        }
      }
    ],
    "links": {
        "first": "/api/v1/activities?page=1",
        "last": "/api/v1/activities?page=10",
        "prev": null,
        "next": "/api/v1/activities?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 10,
        "path": "/api/v1/activities",
        "per_page": 10,
        "to": 10,
        "total": 100
    }
  }
  ```

### 2. Get a single activity

- **Method:** `GET`
- **Endpoint:** `/api/v1/activities/{id}`
- **Description:** Returns a single activity by its ID.
- **Example Response (200 OK):**
  ```json
  {
    "data": {
      "id": 1,
      "name": "Morning Yoga",
    }
  }
  ```

---

## Participants

### 1. Get a paginated list of participants

- **Method:** `GET`
- **Endpoint:** `/api/v1/participants`

### 2. Get a single participant

- **Method:** `GET`
- **Endpoint:** `/api/v1/participants/{id}`

---

## Activity Types

### 1. Get a paginated list of activity types

- **Method:** `GET`
- **Endpoint:** `/api/v1/activity-types`

### 2. Get a single activity type

- **Method:** `GET`
- **Endpoint:** `/api/v1/activity-types/{id}`
