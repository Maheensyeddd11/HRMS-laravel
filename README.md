# 🚀 HRMS – Human Resource Management System (Laravel)

A full-featured **HRMS (Human Resource Management System)** built with Laravel to manage employees, attendance, departments, leaves, and more. Built with modern Laravel practices, clean UI, and modular design.

---

## 📌 Key Features

- ✅ Employee Management  
- ✅ Department & Designation Module  
- ✅ Daily Attendance Tracking  
- ✅ Leave Requests & Approvals  
- ✅ Role-based Dashboard  
- ✅ Monthly Payroll with Bonus  
- ✅ User Authentication  
- ✅ Responsive UI (Blade + Tailwind)

---

## 🛠️ Built With

- Laravel 10  
- Blade Templates  
- MySQL  
- Tailwind CSS  
- Jetstream/Breeze (if used)

---

## 🧑‍💻 Installation

```bash
git clone https://github.com/Maheensyeddd11/HRMS-laravel.git
cd HRMS-laravel

composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate

php artisan migrate --seed
php artisan serve
