# Activities Task App

> A test assignment for a PHP back-end developer: Develop an admin panel and frontend endpoints with developer documentation.

## 🚀 About The Project

This project provides a system for managing activities, partners, and activity types, and exposing this data through a public API.

**Key Features:**
*   Admin panel (FilamentPHP) with full CRUD functionality for entities (Activities, Partners(Participants), Users).
*   Flexible role and permission system (Admin, Editor, Viewer) based on Laravel Policies and PHP Enums.
*   Read-only API for exposing data (Activities, Participants, Activity Types).
*   A simple frontend (Blade) with vanilla JavaScript and Tailwind CSS to display data from the API.
*   Automatic database seeding with test data via factories and seeders.

## 🛠 Tech Stack

*   **Backend:** Laravel v12.25.0, PHP 8.4.11+
*   **Database:** MySQL
*   **Admin Panel:** FilamentPHP 4.0.3
*   **Frontend:** Blade, Vanilla JS, Tailwind CSS
*   **Containerization:** Docker, Laravel Sail

## ⚙️ Installation and Setup

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/Kushiko/activities-task-app.git
    ```
2.  **Navigate to the project directory:**
    ```bash
    cd activities-task-app
    ```
3.  **Copy the environment file:**
    ```bash
    cp .env.example .env
    ```
4.  **Start the Docker containers:**
    ```bash
    docker compose up -d --build
    ```
5.  **Generate the application key:**
    ```bash
    docker compose exec app php artisan key:generate --ansi
    ```
6.  **Run migrations and seed the database:**
    ```bash
    docker compose exec app php artisan migrate:fresh --seed
    ```

## API Endpoints

All API endpoints are prefixed with `/api/v1`.

The public API does not include an endpoint for listing users. The public API should only provide data necessary for the frontend display and not expose personal user data.

### Activities

*   **Get a list of activities:**
    *   **URL:** `/api/v1/activities`
    *   **Method:** `GET`
    *   **Description:** Returns a paginated list of all activities. Supports pagination via the `?page=` parameter.

*   **Get a single activity:**
    *   **URL:** `/api/v1/activities/{id}`
    *   **Method:** `GET`
    *   **Description:** Returns a single activity by its ID.

### Participants

*   **Get a list of participants:**
    *   **URL:** `/api/v1/participants`
    *   **Method:** `GET`

*   **Get a single participant:**
    *   **URL:** `/api/v1/participants/{id}`
    *   **Method:** `GET`

### Activity Types

*   **Get a list of activity types:**
    *   **URL:** `/api/v1/activity-types`
    *   **Method:** `GET`

*   **Get a single activity type:**
    *   **URL:** `/api/v1/activity-types/{id}`
    *   **Method:** `GET`

### API Documentation

More detailed API documentation can be found in the `api_docs.md` file in the project root.

## Application Access

After completing all the steps, you can access the application:

*   **Admin Panel:** `http://localhost/admin`
    *   Log in with `admin@example.com` and password `password`.
*   **Frontend:**
    *   Activities: `http://localhost/`
    *   Participants: `http://localhost/participants`
    *   Activity Types: `http://localhost/activity-types`


---
*P.S. On User Roles*

*The assignment specified: "Users - frontend users, not admin panel users".*

*I made the design decision to display all system users (both admins and frontend users) within the "Users" section of the admin panel. I decided it would be more convenient to manage all accounts in one place. By default, only frontend users (those without a specific role) are displayed. However, using the "Role" filter, one can easily switch to view administrators or all users. The alternative would have been to create a separate entity for managing administrators.*
