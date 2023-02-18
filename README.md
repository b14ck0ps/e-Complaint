## Instruction

Clone using `git clone https://github.com/b14ck0ps/e-Complaint.git`
Go to the folder, copy `.env.example` and rename it to `.env`
Then open PowerShell and run

    composer install
    php artisan key:generate
    php artisan migrate
    php artisan storage:link
    php artisan serve

\*If ask to create database when migrating, type `yes`

Add Crime DataSet to This File: `./e-Complaint/public/js/data/Data.js`
View Graph at `http://127.0.0.1:8000/archive`
