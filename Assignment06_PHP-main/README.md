# 🌐 Internet Usage Bill Calculator

[![GitHub Pages Status](https://img.shields.io/badge/GitHub%20Pages-Live-brightgreen)](https://mushrifa-muzammil.github.io/Assignment06_PHP/)
[![PHP Version](https://img.shields.io/badge/PHP-7%2B-777BB4?logo=php&logoColor=white)](https://php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

## 🌐 Live Demo

**Front-end Demo (HTML/CSS/JS):** [https://mushrifa-muzammil.github.io/Assignment06_PHP/](https://mushrifa-muzammil.github.io/Assignment06_PHP/)

> **Note:** GitHub Pages hosts only the **front-end** (HTML, CSS, JS). For full PHP bill calculation with tiered pricing, you need to run this project on a **local server** (XAMPP/WAMP/MAMP) or a **PHP-enabled web host**.

## 📋 Table of Contents

- [About The Project](#about-the-project)
- [Features](#features)
- [Price Structure](#price-structure)
- [Built With](#built-with)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [How It Works](#how-it-works)
- [Sample Calculation](#sample-calculation)
- [Code Highlights](#code-highlights)
- [Future Enhancements](#future-enhancements)
- [Connect With Me](#connect-with-me)
- [License](#license)

## 📖 About The Project

This is an **Internet Usage Bill Calculator** that simulates a real-world ISP (Internet Service Provider) billing system. It calculates monthly bills based on:

- **Connection Type** (4G or Fiber) with Fiber having an additional rental fee
- **Internet Package** (4 tiers with different monthly rentals)
- **Extra GB Usage** with a **tiered pricing structure** that gets cheaper as usage increases

This project demonstrates advanced conditional logic, tiered pricing calculations, and professional bill generation.

## ✨ Features

| Category | Features |
|----------|----------|
| **Connection Types** | 4G (no extra rental) / Fiber (+Rs 760 rental) |
| **Internet Packages** | 4 packages with different monthly rentals |
| **Extra GB Pricing** | 4-tier sliding scale (cheaper per GB as usage increases) |
| **Bill Breakdown** | Itemized table showing each charge component |
| **Validation** | Client-side validation (required fields, numeric account) |
| **Output** | Professional bill with customer details and amounts |

## 💰 Price Structure

### Monthly Package Rentals

| Package | Monthly Rental |
|---------|----------------|
| Basic | Rs 760 |
| Web Lite | Rs 1,520 |
| Any Blast | Rs 2,340 |
| Family Plan | Rs 3,790 |

### Fiber Connection Rental
| Connection Type | Additional Rental |
|----------------|-------------------|
| 4G | Rs 0 |
| Fiber | Rs 760 |

### Extra GB Pricing (Sliding Scale)

| GB Range | Rate per GB |
|----------|-------------|
| First 4 GB | Rs 100 |
| Next 15 GB (5-19) | Rs 85 |
| Next 30 GB (20-49) | Rs 75 |
| Beyond 50 GB | Rs 60 |

> **Note:** The pricing gets progressively cheaper as customers use more data – encouraging higher usage.

## 🛠️ Built With

- **HTML5** – Form structure with radio buttons and select dropdown
- **CSS3** – Clean, centered form and table styling
- **JavaScript** – Client-side validation (required fields, numeric account)
- **PHP 7+** – Tiered calculation logic, bill generation

## 📁 Project Structure
