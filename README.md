# UIU Loan and Donation System 💸

A web platform for **United International University** where students can **request and fund peer loans**, and student clubs can **run donation campaigns** for charitable causes.

## ✨ Features
- Separate **student and club accounts** with session-based authentication
- Students post loan requests; other students fund them and track **installments and interest**
- Clubs create **donation campaigns** and track contributions
- **Paginated keyword search** over loan listings
- Server-side **image uploads to Supabase Storage** through its REST API (PHP cURL)

## 🗄️ Database
A normalised MySQL schema with `users`, `clubs`, `loans`, `installments`, `donations` and `contributions` tables, documented with an ER diagram (see `Database/`).

## 🛠️ Tech stack
PHP · MySQL · JavaScript · jQuery · Tailwind CSS · Supabase Storage

## 🚀 Getting started
```bash
git clone https://github.com/Arnob-32116/UIU-Loan-and-Donation-System.git
cd UIU-Loan-and-Donation-System
composer install
npm install
# import the SQL file from Database/ into MySQL
# start Tailwind in watch mode:
npx @tailwindcss/cli -i ./src/input.css -o ./src/output.css --watch
```
Then serve the `src/` folder with PHP (e.g. XAMPP or `php -S localhost:8000 -t src`).
