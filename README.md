# 📄 Resume + 🔐 Login System  

A simple **Resume Website** with a **Login & Signup System**.  
Users can create an account, log in securely, and then view a styled resume page.  

---

## ✨ Features  
- 📝 **Sign Up** – Create an account and save it to the database.  
- 🔑 **Login** – Secure login with password hashing.  
- 📋 **Resume Page** – Accessible only after logging in.  
- 🚪 **Logout** – Ends the session and redirects back to login.  
- ❌ **Validation** – Shows error message if password/email is wrong.  

---

## 🛠 Tools / Software Used  
- 💻 **Visual Studio Code** – writing and editing code  
- 🗄 **PostgreSQL** – storing user accounts  
- ⚙️ **XAMPP (Apache & PHP)** – local server to run PHP & connect to database  
- 🌐 **Google Chrome** – testing and viewing the project  

---

## 🔎 How It Works  
1. **Signup** → User enters details → saved into PostgreSQL database.  
2. **Login** → User enters email + password → checked with database.  
   - ✅ If valid → user goes to `welcome.php` (resume page).  
   - ❌ If wrong → error message appears without leaving the page.  
3. **Resume Page** → Shows styled resume content (only for logged-in users).  
4. **Logout** → Button at bottom-right → destroys session → back to login.  

---

## 🚀 How to Run Locally  
1. Install **XAMPP** and enable Apache + PostgreSQL.  
2. Clone/download this repo into your `htdocs` folder.  
   ```bash
   git clone https://github.com/AintKiel/Resume_Login.git
