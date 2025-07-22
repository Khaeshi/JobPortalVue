# JobPortalVue

JobPortalVue is a modern job portal application built with Laravel as the backend and Vue.js as the frontend framework. It leverages TypeScript for type safety and maintainability, and utilizes Tailwind CSS v4 for a streamlined, customizable, and responsive UI design.

## Features

- **User Authentication & Authorization:** Secure login and registration for job seekers and employers.
- **Job Listings:** Employers can post jobs, and seekers can browse or search listings by category, location, or keyword.
- **Application Management:** Job seekers can apply to jobs, track applications, and upload resumes.
- **Employer Dashboard:** Manage job postings, view applicants, and review candidate profiles.
- **Admin Panel:** Oversee platform users, jobs, and moderate content.
- **Real-Time Notifications:** Get instant updates on application status and new job postings.
- **Responsive Design:** Fully responsive UI powered by Tailwind CSS v4.
- **TypeScript Support:** Maintainable and robust frontend codebase with static typing.
- **API-Driven:** Clean RESTful APIs powered by Laravel for seamless frontend-backend communication.

## Tech Stack

- **Backend:** Laravel - PHP
- **Frontend:** Vue.js 3 + TypeScript
- **Styling:** Tailwind CSS v4
- **Database:** MySQL/MariaDB (configurable)
- **APIs:** RESTful endpoints with Laravel
- **Authentication:** Laravel Sanctum/JWT (customizable)

## Getting Started

### Prerequisites

- PHP 8.x
- Composer
- Node.js 18+
- npm or Yarn
- MySQL/MariaDB

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/YOUR_USERNAME/JobPortalVue.git
   cd JobPortalVue
   ```

2. **Backend Setup (Laravel):**
   ```bash
   cd backend
   composer install
   cp .env.example .env
   # Configure .env for your database
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   ```

3. **Frontend Setup (Vue + TS + Tailwind):**
   ```bash
   cd frontend
   npm install
   npm run dev
   ```

4. **Access the Application:**
   - Backend API: [http://localhost:8000](http://localhost:8000)
   - Frontend UI: [http://localhost:5173](http://localhost:5173) (or the port specified in your setup)

## Contributing

Contributions are welcome! Please open issues or pull requests for features, bug fixes, or suggestions.

## License

This project is open-source and available under the (LICENSE).

---
**JobPortalVue** — a robust, modern job portal solution built with Laravel, Vue, TypeScript, and Tailwind CSS v4.
