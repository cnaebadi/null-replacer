<p align="center">
    <img src="https://raw.githubusercontent.com/cnaebadi/null-replacer/main/.github/assets/banner.png" style="max-width: 400px; width: 100%;" alt="Null Replacer Logo">
</p>

# Null Replacer

A Laravel validation rule to automatically remove, replace, or convert null values in request data before validation.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cnaebadi/null-replacer.svg?style=flat-square)](https://packagist.org/packages/cnaebadi/null-replacer)
[![Total Downloads](https://img.shields.io/packagist/dt/cnaebadi/null-replacer.svg?style=flat-square)](https://packagist.org/packages/cnaebadi/null-replacer)
[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)

---

## ✨ Features

- Replace `null` values with a **custom value**
- Convert `'true'` and `'false'` strings to actual **boolean** values
- **Remove** null fields entirely from the request
- Can be used **directly in Form Request rules**

---

## 🚀 Installation

```bash
composer require cnaebadi/null-replacer
```

---

## 🧪 Usage
    
⚠️ Note: When using null_replacer, you do not need to use nullable. This rule handles null values entirely on its own and using nullable before it may interfere with its functionality.

In your Laravel Form Request:

---

```bash
public function rules()
{
return [
        'optional_note'  => ['null_replacer'], // Removes key if null
        'is_active'      => ['null_replacer:true'], // Converts to boolean true
        'email'          => ['null_replacer:default@example.com'], // Replaces null with given default
    ];
}
```

---

## 🛠 How It Works

null-replacer:true → 'true'/'false' → true/false

null-replacer:something → replaces null with "something"

null-replacer (no value) → removes the key from the request if it's null

---

## 📦 Publish & Extend

If you want to customize the behavior, you can publish the config (if added later) or extend the core rule logic in your own classes.

---

## 🧑‍💻 Author

#### Sina Ebadi

---

## 📄 License

The MIT License (MIT). Please see License File for more information.

