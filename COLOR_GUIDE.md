# راهنمای تغییر رنگ‌های پروژه KTX

## 🎨 رنگ‌های اصلی پروژه

### رنگ Primary (اصلی)
- **کد رنگ:** `#0072b3`
- **رنگ تیره‌تر:** `#005a8f`
- **رنگ روشن‌تر:** `#3399cc`
- **رنگ خیلی روشن:** `#cce7f3`

### رنگ Secondary (فرعی)
- **کد رنگ:** `#15ACE1`

### رنگ‌های دیگر
- **Light:** `#F4F7FE`
- **Dark:** `#14183E`

## 📁 فایل‌های مربوط به رنگ‌ها

### 1. فایل اصلی CSS
```
public/css/style.css
```
- خط 3-7: تعریف متغیرهای CSS
- تغییر `--primary: #0072b3;`

### 2. فایل Bootstrap Custom
```
public/css/bootstrap-custom.css
```
- Override کردن تمام کلاس‌های Bootstrap
- شامل دکمه‌ها، فرم‌ها، navbar و غیره

### 3. فایل SCSS Variables
```
public/css/variables.scss
```
- تعریف متغیرهای SCSS
- برای استفاده در کامپایل SCSS

## 🔧 نحوه تغییر رنگ‌ها

### روش 1: تغییر در فایل style.css
```css
:root {
    --primary: #YOUR_COLOR_HERE;
    --secondary: #YOUR_SECONDARY_COLOR;
    --light: #YOUR_LIGHT_COLOR;
    --dark: #YOUR_DARK_COLOR;
}
```

### روش 2: تغییر در فایل bootstrap-custom.css
```css
:root {
    --bs-primary: #YOUR_COLOR_HERE !important;
    --bs-primary-rgb: R, G, B !important;
}
```

### روش 3: تغییر در فایل variables.scss
```scss
$primary: #YOUR_COLOR_HERE;
$primary-dark: #YOUR_DARK_COLOR;
$primary-light: #YOUR_LIGHT_COLOR;
```

## 🎯 کلاس‌های Bootstrap که تغییر کرده‌اند

### دکمه‌ها
- `.btn-primary`
- `.btn-outline-primary`

### متن‌ها
- `.text-primary`

### پس‌زمینه‌ها
- `.bg-primary`

### فرم‌ها
- `.form-control:focus`
- `.form-select:focus`

### کامپوننت‌های سفارشی
- `.hero-header`
- `.newsletter`
- `.feature`
- `.service-item:hover`

## 🚀 نحوه اعمال تغییرات

1. **تغییر رنگ در فایل‌های CSS**
2. **Clear Cache:** `php artisan cache:clear`
3. **Hard Refresh:** `Ctrl+F5` در مرورگر

## 📝 مثال تغییر رنگ

### تغییر رنگ Primary به آبی تیره‌تر:
```css
:root {
    --primary: #0056b3;
}
```

### تغییر رنگ Primary به سبز:
```css
:root {
    --primary: #28a745;
}
```

## ⚠️ نکات مهم

1. **همیشه از `!important` استفاده کنید** برای override کردن Bootstrap
2. **رنگ‌های hover را نیز تغییر دهید**
3. **تست کنید** که تمام المان‌ها درست نمایش داده شوند
4. **Contrast را بررسی کنید** برای خوانایی بهتر

## 🎨 پالت رنگ پیشنهادی

### آبی‌های مختلف:
- `#0072b3` (فعلی)
- `#0056b3` (تیره‌تر)
- `#0066cc` (روشن‌تر)

### سبزها:
- `#28a745`
- `#20c997`
- `#17a2b8`

### بنفش‌ها:
- `#6f42c1`
- `#8e44ad`
- `#9b59b6` 
