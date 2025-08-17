# DATE 17/08/2025

# LARAVEL LOG ISSUE AND TROUBLESHOOT
Laravel version 11.0
MariaDB 10.4.x


SQLSTATE[HY000]: General error: 1273 Unknown collation: 'utf8mb4_0900_ai_ci'

This issue occurs when you try migrating an SQL database but you're running an old version of laravel. For example; Laravel reads through our database collation and IF executing the "php artisan migrate" logged an SQLSTATE error, it's an indication of compatibility problem (or something similar). We are currently using Maria DB 10.4.x version while laravel require a specific MYSQL version (MYSQL 8+) to properly run the migration.


Changing the collation inside the database.php file should fix this problem, such as converting "utf8mb4_0900_ai_ci" line and replace it with "utf8mb4_unicode_ci".

[FUTURE ME]: Keep in mind of your project version as it may differ varily "Laravel","MariaDB","Nodejs" and so on so forth.


# PERSONAL JOURNEY

# Day 1 – Setting Up the Foundation

I started by setting up a new Laravel project with composer create-project laravel/laravel madinatulqq. At first, I ran into some version conflicts and had to downgrade to a stable release to avoid headaches. It reminded me how quickly Laravel evolves and how important version awareness is when working with packages.

Once the project was running, I scaffolded authentication using Breeze and set up routes for the homepage, authentication, and admin dashboard.

# Day 2 – Crafting the Post Model & Admin Controller

I created a Post model with the following attributes:

title

slug

excerpt

body

is_published

published_at

To handle post management, I built an AdminPostController. It included methods for listing, creating, storing, editing, updating, and deleting posts.

The slug field is auto-generated with Str::slug() to keep URLs clean. The is_published flag and published_at date are set dynamically depending on whether a post is marked as published.

# Day 3 – Middleware & Routes

I added a custom IsAdmin middleware to secure the admin routes. For now, only user with id=1 counts as an admin, but later I plan to expand it with proper role management.

The routes are structured as follows:

Public: Homepage (/) and single post pages.

Authenticated: Profile editing and settings.

Admin: CRUD for posts under /admin/posts.

# Day 4 – Blade Views & Tailwind Styling

On the client side, I designed two main views:

Homepage (posts.index) – Lists all articles with title, excerpt, and publish date using diffForHumans().

Single Post (posts.show) – Displays full content, formatted with Markdown support (Str::markdown()).

For the admin area, I built forms styled with Tailwind. The create view starts with blank inputs, while the edit view pre-fills inputs with the current $post data so it feels like proper editing.
