# 🧾 ABC Shop Invoice System

[![GitHub Pages Status](https://img.shields.io/badge/GitHub%20Pages-Live-brightgreen)](https://mushrifa-muzammil.github.io/Assignment03_PHP/)
[![PHP Version](https://img.shields.io/badge/PHP-7%2B-777BB4?logo=php&logoColor=white)](https://php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

## 🌐 Live Demo

**Front-end Demo (HTML/CSS/JS):** [https://mushrifa-muzammil.github.io/Assignment03_PHP/](https://mushrifa-muzammil.github.io/Assignment03_PHP/)

> **Note:** GitHub Pages hosts only the **front-end** (HTML, CSS, JS). For full PHP invoice generation with discount calculations, you need to run this project on a **local server** (XAMPP/WAMP/MAMP) or a **PHP-enabled web host**.

## 📋 Table of Contents

- [About The Project](#about-the-project)
- [Features](#features)
- [Built With](#built-with)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [Discount Rules](#discount-rules)
- [Sample Calculation](#sample-calculation)
- [Code Highlights](#code-highlights)
- [Version Comparison](#version-comparison)
- [Future Enhancements](#future-enhancements)
- [Connect With Me](#connect-with-me)
- [License](#license)

## 📖 About The Project

This is a **complete Invoice Generation System** for ABC Shop that demonstrates intermediate to advanced PHP concepts:

- Dynamic invoice creation based on shop details
- Multi-item entry with quantity and price
- **Tiered discount calculation** based on quantity thresholds
- **Free item promotion** (Buy 30, get 5 free on bulk orders)
- Input validation and XSS protection
- Professional invoice layout

This project simulates a real-world billing system used in retail environments.

## ✨ Features

| Category | Features |
|----------|----------|
| **Shop Details** | Name, Address, Contact, Email with validation |
| **Multi-Item Entry** | 3 items with code, name, quantity, price |
| **Discount Logic** | Tiered discounts (2%, 10%) + free item promotion |
| **Invoice Display** | Professional table layout with totals |
| **Client Validation** | JavaScript quantity validation (>0) |
| **Server Validation** | Contact format, email format, XSS protection |
| **Security** | `htmlspecialchars()` for output sanitization |

## 🛠️ Built With

- **HTML5** – Form structure and invoice layout
- **CSS3** – Gradient background, card-style container, responsive table
- **JavaScript** – Client-side quantity validation
- **PHP 7+** – Dynamic calculation, discount logic, invoice generation

