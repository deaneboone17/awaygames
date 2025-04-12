
# 🏈 AwayGames – Travel Planner for NFL Fans

AwayGames is a full-stack web application that allows users to plan travel for professional football road games. It consolidates flight, ticket, hotel, and local attraction information in a seamless experience powered by RESTful APIs and best practices in modern web development.

This project was built using the Laravel PHP framework, Bootstrap for responsive UI, and deployed on Amazon Web Services (AWS). It demonstrates deep proficiency in MVC architecture, user authentication, database design, third-party API integration, and scalable cloud deployment.

---

## 🔍 Features

- 🔐 User registration, login, and password reset
- 🧑‍💼 Role-based access control (User, Admin, SuperAdmin)
- 📅 View NFL away game schedules
- ✈️ Search for flights (Google QPX Express API)
- 🎟️ View ticket availability (SeatGeek API)
- 🏨 Discover hotels and points of interest (Yelp Fusion API)
- 💾 Save, edit, and delete trips
- 📧 Share trips with others via email
- 🧪 Form validation, unit testing, and user acceptance testing
- ☁️ Cloud-hosted with scalable AWS architecture

---

## 🏗️ Tech Stack

| Layer            | Technology Used                              |
|------------------|-----------------------------------------------|
| Language         | PHP                                           |
| Framework        | Laravel (MVC Architecture)                   |
| Frontend         | Bootstrap, HTML5, Sass, JavaScript           |
| Backend          | MySQL (RDS on AWS), Laravel Eloquent ORM     |
| APIs Integrated  | Google QPX Express, SeatGeek, Yelp Fusion    |
| Deployment       | AWS EC2, RDS, S3, Elastic IP                 |
| Dev Environment  | Laravel Homestead, Vagrant, VirtualBox       |
| Version Control  | Git                                           |

---

## 📁 Project Structure

```
awaygames/
├── app/                # Controllers, Models, Middleware
├── resources/views/    # Blade templates
├── routes/web.php      # Route definitions
├── public/             # Frontend assets
├── database/           # Migrations & Seeders
├── .env                # Environment config
└── composer.json       # Dependencies
```

---

## 🚀 Getting Started

### Prerequisites

- PHP 7.x
- Composer
- MySQL
- Laravel CLI
- AWS (or local LAMP stack)
- Google QPX API Key (deprecated, optional)
- SeatGeek & Yelp Fusion API credentials

### Installation

1. Clone the repo:
   ```bash
   git clone https://github.com/yourusername/awaygames.git
   cd awaygames
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```

3. Set up `.env` file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure your database in `.env`, then run:
   ```bash
   php artisan migrate --seed
   ```

5. Launch the server:
   ```bash
   php artisan serve
   ```

---

## 🌍 Deployment

Deployed on AWS using:
- EC2 (Ubuntu, Apache, PHP)
- RDS (MySQL)
- S3 (for assets & email templates)
- Elastic IP (DNS mapped to [away.games](http://away.games))

---

## 🔒 Security Features

- Laravel’s built-in authentication
- Role-based access via custom middleware
- CSRF protection
- XSS prevention with Blade’s output escaping
- Secure credentials via `.env` and AWS IAM policies

---

## 🧪 Testing Strategy

- ✅ Manual unit testing with Postman for API verification
- ✅ REST route testing via Laravel debug mode
- ✅ UAT with real users
- ✅ Mailtrap integration for email functionality validation

---

## 🔮 Future Enhancements

- Enable in-app bookings (tickets, hotels, flights)
- Integrate schedule updates via sports data API
- Expand to other sports leagues
- Add progressive web app (PWA) support
- Containerize with Docker for portability

---

## 📚 Lessons Learned

- Frameworks accelerate MVP development
- Cloud platforms simplify scalability and security
- Clean API integration requires robust error handling
- Early MVP + feedback cycle beats perfection paralysis

---

## 👨🏽‍💻 Author

**Deane Boone**  
Full-stack Developer | Cloud Enthusiast | API Integrator  
📧 dboone1@students.towson.edu  
🌐 [LinkedIn or Portfolio Link Here]

---

## 📜 License

This project is for demonstration and educational use. Contact the author for usage inquiries.
