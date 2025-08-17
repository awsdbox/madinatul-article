<h1 align="center">🕌 Madinatul Qur'an — Article Blog Platform</h1>

<p align="center">
  <em>A community-driven platform to publish and discuss articles about Islam, spirituality, and activities within Madinatul Qur'an.</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-red?logo=laravel" alt="Laravel Badge"/>
  <img src="https://img.shields.io/badge/TailwindCSS-3-blue?logo=tailwindcss" alt="Tailwind Badge"/>
  <img src="https://img.shields.io/badge/MySQL-8-orange?logo=mysql" alt="MySQL Badge"/>
  <img src="https://img.shields.io/badge/License-MIT-green" alt="MIT License"/>
</p>

---

## ✨ Features

<ul>
  <li><strong>Public Site</strong>
    <ul>
      <li>Browse the latest articles with excerpts, tags, and publish dates.</li>
      <li>Beautiful reading experience with <code>Markdown</code> support.</li>
      <li>Filter by tags/categories for easier discovery.</li>
    </ul>
  </li>

  <li><strong>Admin Dashboard</strong>
    <ul>
      <li>Create, edit, and delete posts with a clean UI.</li>
      <li>SEO-friendly slugs auto-generated from titles.</li>
      <li>Manage article visibility (draft / published).</li>
    </ul>
  </li>

  <li><strong>User Interaction</strong>
    <ul>
      <li>Readers can comment and join the discussion.</li>
      <li>Authentication with <code>Laravel Breeze</code> included.</li>
    </ul>
  </li>
</ul>

---

## 🛠️ Tech Stack

```bash
Backend: Laravel 11
Frontend: Blade + TailwindCSS
Database: MySQL / MariaDB
Auth: Laravel Breeze


# Clone repo
git clone https://github.com/your-username/madinatul-quran-blog.git
cd madinatul-quran-blog

# Install dependencies
composer install
npm install && npm run dev

# Configure environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate --seed

# Serve
php artisan serve
