# Sistem Penilaian Praktek Gigi

A **CodeIgniter 3** web application for managing and evaluating **dental practicum assessments**, configured to run locally with **Laragon**.
This project uses the **AdminBSB Material Design** template to deliver a clean, responsive, and modern interface.

---

## 🚀 Features

* Built on **CodeIgniter 3 (MVC Architecture)**
* Modern UI with **AdminBSB Material Design**
* Configured for **local development (Laragon)**
* Enhanced navbar with **SIMKESGI shortcut button**
* Database-driven assessment and practicum management

---

## ⚙️ Local Setup

1. **Clone the repository**

   ```bash
   git clone https://github.com/yourusername/erkmgigi.git
   ```

2. **Place in Laragon’s `www` folder**

   ```
   C:\laragon\www\erkmgigi
   ```

3. **Import database**

   * Import the provided `.sql` file into your local MySQL (e.g., `erkmgigi_db`).

4. **Configure application**

   * Edit `application/config/config.php`

     ```php
     $config['base_url'] = 'http://erkmgigi.test/';
     ```
   * Edit `application/config/database.php` with your local DB credentials.

5. **Run project**

   * Open [http://erkmgigi.test](http://erkmgigi.test) in your browser.

---

## 🧱 Project Structure

```
application/
├── config/
├── controllers/
├── models/
├── views/
resources/
├── css/
├── js/
├── img/
```

---

## 💡 Notes

* Environment: `development` (recommended for local testing)
* Framework: **CodeIgniter 3**
* Template: **AdminBSB Material Design**
* PHP version: 7.x or higher

---

## 🤩 Credits

* **CodeIgniter Framework**
* **AdminBSB Material Design**
* **Bootstrap & jQuery**
* Original project adapted and enhanced for local use by *[your name]*

---

## 🔗 External Integration

* [SIMKESGI System](https://simkesgi.poltekkespalembang.ac.id)

---

## 📄 License

This project is for educational and internal development purposes only.
