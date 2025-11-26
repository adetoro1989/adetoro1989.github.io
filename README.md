# 📌 **Adetoro Adetunji Olanrewaju -- Personal Portfolio Website**

This repository contains the source code for my personal portfolio
website. It showcases my skills, experience, and projects as a
**Cloud/DevOps Engineer & IT Professional** with over 10 years of
industry experience.

The portfolio is built using **HTML, CSS, JavaScript, and PHP**, and
includes an admin dashboard where I can securely view and manage
messages submitted through the contact form.

## 🌍 Live Demo

🔗 **Portfolio Website:**\
https://olanrewajuadetoro.com

## 🧰 Tech Stack

### Frontend

-   HTML5\
-   CSS3 / SCSS\
-   JavaScript

### Backend

-   PHP\
-   MySQL

### Tools & Deployment

-   Git / GitHub\
-   GitHub Pages\
-   VS Code

### Test & Deployment
- Docker
- Github Action
- Github

I tested using Docker images and containers. I deployed the folder into a docker image that has apache, php installed.
Then i also deployed another docker image using the mysql image for the database. I updated the credentials in the php files and i was able to synch data to the database.

I ensured both containers were deployed in the same network and they could talk to each other. I used the "docker exec" command to enter into the container to make adjustments to the database server and the apache and php services as well.

After testing i setup a CI/CD pipeline on github action to automatically synch updates to my applications.

## ⭐ Features

-   Modern UI\
-   About Me section\
-   Skills listing\
-   Project showcase\
-   Contact form with backend\
-   Responsive design\
-   Admin login\
-   Admin dashboard\
-   View & delete messages

## 📁 Project Structure

    assets/
    images/
    .github/
    .vscode/
    index.html
    adminlogin.html
    register.html
    dashboard.php
    viewmessages.php
    deletemessage.php
    dbconnect.php
    LICENSE
    README.md

## ⚙️ Installation

    git clone https://github.com/adetoro1989/adetoro1989.github.io.git

Configure database in `dbconnect.php` and run locally with a PHP server.

## 🚀 Deployment

Deployed via **GitHub Pages**.\
Push to `main` branch to update automatically.

## 📝 License

MIT License

## 👤 Author

**Adetoro Adetunji Olanrewaju**\
Cloud & Network Engineer \| DevOps Engineer\
LinkedIn: https://www.linkedin.com/in/olanrewaju-adetoro-76105b34
GitHub: https://github.com/adetoro1989
