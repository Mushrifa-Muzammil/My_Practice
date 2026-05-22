# ⚕️ BMI Calculator - Health Assessment Tool

[![GitHub Pages Status](https://img.shields.io/badge/GitHub%20Pages-Live-brightgreen)](https://mushrifa-muzammil.github.io/Assignment04_PHP/)
[![PHP Version](https://img.shields.io/badge/PHP-7%2B-777BB4?logo=php&logoColor=white)](https://php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

## 🌐 Live Demo

**Front-end Demo (HTML/CSS/JS):** [https://mushrifa-muzammil.github.io/Assignment04_PHP/](https://mushrifa-muzammil.github.io/Assignment04_PHP/)

> **Note:** GitHub Pages hosts only the **front-end** (HTML, CSS, JS). For full PHP BMI calculation and health report generation, you need to run this project on a **local server** (XAMPP/WAMP/MAMP) or a **PHP-enabled web host**.

## 📋 Table of Contents

- [About The Project](#about-the-project)
- [Features](#features)
- [BMI Categories](#bmi-categories)
- [Built With](#built-with)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [How BMI Is Calculated](#how-bmi-is-calculated)
- [Sample Calculation](#sample-calculation)
- [Code Highlights](#code-highlights)
- [Future Enhancements](#future-enhancements)
- [Connect With Me](#connect-with-me)
- [License](#license)

## 📖 About The Project

This is a **complete BMI (Body Mass Index) Calculator** that collects personal information, computes BMI using the **Imperial formula**, and provides a detailed health assessment report.

Key features include:
- **Personal information collection** (Name, Age, Address, Contact)
- **Weight & Height input** (metric units: kg and cm)
- **BMI calculation** using the Imperial formula (pounds/inches²)
- **Detailed health category** (6 categories from Underweight to Obese III)
- **Unit conversions** (kg → pounds, cm → inches, inches → feet/inches)
- **Input validation** on both client and server sides

## ✨ Features

| Category | Features |
|----------|----------|
| **Personal Info** | Name, Age, Address, Contact Number with validation |
| **Physical Metrics** | Weight (kg) and Height (cm) – required fields |
| **Unit Conversions** | kg → pounds, cm → inches, inches → feet/inches display |
| **BMI Calculation** | Uses standard Imperial formula (703 × weight(pounds) ÷ height(inches)²) |
| **Health Categories** | 6 categories based on BMI value |
| **Client Validation** | All fields required before submission |
| **Server Validation** | Name format, contact format, numeric weight/height |
| **Output Report** | Professional table with all health metrics |

## 📊 BMI Categories (WHO Standard)

| BMI Range | Category |
|-----------|----------|
| < 18.5 | Under Healthy Weight |
| 18.5 – 24.9 | Healthy Weight |
| 25 – 29.9 | Overweight |
| 30 – 34.9 | Obese I |
| 35 – 39.9 | Obese II |
| ≥ 40 | Obese III |

> Based on World Health Organization (WHO) BMI classification standards.

## 🛠️ Built With

- **HTML5** – Form structure
- **CSS3** – Clean, centered card layout
- **JavaScript (ES6)** – Client-side validation (all fields required)
- **PHP 7+** – BMI calculation, unit conversion, report generation

## 📁 Project Structure
