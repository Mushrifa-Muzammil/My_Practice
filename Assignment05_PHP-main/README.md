# 🏨 Hotel Reservation System

[![GitHub Pages Status](https://img.shields.io/badge/GitHub%20Pages-Live-brightgreen)](https://mushrifa-muzammil.github.io/Assignment05_PHP/)
[![PHP Version](https://img.shields.io/badge/PHP-7%2B-777BB4?logo=php&logoColor=white)](https://php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

## 🌐 Live Demo

**Front-end Demo (HTML/CSS/JS):** [https://mushrifa-muzammil.github.io/Assignment05_PHP/](https://mushrifa-muzammil.github.io/Assignment05_PHP/)

> **Note:** GitHub Pages hosts only the **front-end** (HTML, CSS, JS). For full PHP reservation calculation and receipt generation, you need to run this project on a **local server** (XAMPP/WAMP/MAMP) or a **PHP-enabled web host**.

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

This is a **complete Hotel Reservation and Billing System** that allows customers to:

- Select from **4 different hotels** with varying room rates
- Choose **room types** (Standard, Deluxe, Executive)
- Add **optional activities** (Spa, Cycling, Swimming, Gym) with hourly rates
- Select **board type** (Half Board or Full Board)
- Calculate total cost based on **number of nights**
- Generate a **detailed reservation receipt**

This project demonstrates complex pricing logic, dynamic calculation, and professional receipt generation.

## ✨ Features

| Category | Features |
|----------|----------|
| **Hotel Selection** | 4 hotels with tiered room pricing |
| **Room Types** | Standard, Deluxe, Executive (3 levels) |
| **Board Options** | Half Board (included), Full Board (+Rs 3,500) |
| **Activities** | 4 activities with hourly rates (optional) |
| **Date Validation** | Check-out must be after check-in |
| **Activity Validation** | Hours required if activity selected |
| **Dynamic Pricing** | Room charges × nights + board + activities |
| **Receipt Generation** | Professional itemized receipt |

## 🏨 Price Structure

### Room Rates (per night)

| Hotel | Standard | Deluxe | Executive |
|-------|----------|--------|-----------|
| Riverside Hotel | Rs 7,500 | Rs 8,500 | Rs 10,000 |
| Lagoon View Hotel | Rs 8,500 | Rs 10,000 | Rs 12,500 |
| Nature Villa | Rs 10,000 | Rs 12,500 | Rs 15,000 |
| Beach Resort | Rs 12,500 | Rs 15,000 | Rs 20,000 |

### Activity Rates (per hour)

| Activity | Rate per Hour |
|----------|---------------|
| Spa | Rs 5,000 |
| Cycling | Rs 400 |
| Swimming | Rs 1,000 |
| Gym | Rs 850 |

### Board Options

| Board Type | Additional Cost |
|------------|-----------------|
| Half Board | Included in room price |
| Full Board | + Rs 3,500 per night |

## 🛠️ Built With

- **HTML5** – Form structure with date inputs, radio buttons, checkboxes
- **CSS3** – Clean, card-style layout with hover effects
- **JavaScript (ES6)** – Date validation and activity hours validation
- **PHP 7+** – Dynamic pricing calculation, receipt generation

## 📁 Project Structure
