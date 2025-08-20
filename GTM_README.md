# Google Tag Manager (GTM) Setup Guide

## خلاصه پیاده‌سازی

Google Tag Manager با موفقیت در پروژه Laravel شما پیاده‌سازی شده است. این سیستم شامل تمام layout های اصلی می‌باشد:

- `resources/views/layouts/app.blade.php` - Layout اصلی فرانت‌اند
- `resources/views/layouts/admin.blade.php` - Layout پنل ادمین
- `resources/views/layouts/guest.blade.php` - Layout صفحات احراز هویت

## فایل‌های ایجاد شده

### 1. Component های GTM
- `resources/views/components/google-tag-manager.blade.php` - کد JavaScript در `<head>`
- `resources/views/components/google-tag-manager-noscript.blade.php` - کد noscript بعد از `<body>`

### 2. فایل Configuration
- `config/gtm.php` - تنظیمات GTM

## تنظیمات Environment

برای تنظیم GTM، این متغیرها را در فایل `.env` خود اضافه کنید:

```env
# Google Tag Manager Configuration
GTM_ID=GTM-K2MXKC7T
GTM_ENABLED=true
GTM_DEBUG=false
```

## نحوه استفاده

### فعال/غیرفعال کردن GTM
```env
GTM_ENABLED=false  # برای غیرفعال کردن
GTM_ENABLED=true   # برای فعال کردن
```

### تغییر GTM ID
```env
GTM_ID=GTM-XXXXXXXXX  # GTM ID جدید خود را اینجا قرار دهید
```

### Debug Mode
```env
GTM_DEBUG=true  # برای محیط development
GTM_DEBUG=false # برای محیط production
```

## ویژگی‌های پیاده‌سازی شده

✅ **کد GTM در تمام layout ها**  
✅ **Conditional loading** بر اساس تنظیمات  
✅ **Environment-based configuration**  
✅ **Easy GTM ID management**  
✅ **Debug mode support**  

## تست

برای تست GTM:

1. فایل `.env` را با GTM ID صحیح به‌روزرسانی کنید
2. سایت را refresh کنید
3. در Developer Tools > Network، فایل `gtm.js` را بررسی کنید
4. در Google Tag Manager، Real-time events را بررسی کنید

## نکات مهم

- GTM فقط زمانی بارگذاری می‌شود که `GTM_ENABLED=true` باشد
- در محیط development، `GTM_DEBUG=true` را تنظیم کنید
- GTM ID باید در Google Tag Manager صحیح باشد
- کد noscript برای کاربرانی که JavaScript غیرفعال دارند ضروری است

## عیب‌یابی

### GTM بارگذاری نمی‌شود
- `GTM_ENABLED=true` را بررسی کنید
- `GTM_ID` صحیح را بررسی کنید
- Console errors را بررسی کنید

### Events ارسال نمی‌شوند
- GTM Container را بررسی کنید
- Triggers و Tags را بررسی کنید
- Real-time preview را فعال کنید

## پشتیبانی

برای سوالات بیشتر، مستندات رسمی Google Tag Manager را مطالعه کنید:
- [Google Tag Manager Help](https://support.google.com/tagmanager/)
- [GTM Developer Guide](https://developers.google.com/tag-manager)
