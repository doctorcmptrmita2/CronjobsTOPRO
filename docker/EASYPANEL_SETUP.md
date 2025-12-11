# 🚀 Easypanel Deployment Guide - Cronjobs.to

## 📋 Gereksinimler

- Easypanel v2.23.0+
- OVH VPS veya Cloud Server
- Domain (örn: cronjobs.to)

---

## 🔧 Adım 1: Easypanel'de Proje Oluşturma

1. Easypanel Dashboard'a giriş yap
2. **"+ Create Project"** butonuna tıkla
3. Proje adı: `cronjobs`

---

## 🐳 Adım 2: App Service Oluşturma

1. Proje içinde **"+ Create Service"** → **"App"** seç
2. Ayarlar:

### General
- **Name:** `app`
- **Source:** GitHub/GitLab repo bağla veya "Docker Image" seç

### Build (GitHub kullanıyorsan)
- **Build Type:** Dockerfile
- **Dockerfile Path:** `Dockerfile`
- **Build Context:** `.`

### Deploy
- **Replicas:** 1
- **Resources:**
  - CPU: 1 core
  - Memory: 512MB - 1GB

### Domains
- **Add Domain:** `cronjobs.to` veya `app.cronjobs.to`
- **HTTPS:** Enable (Let's Encrypt)

### Ports
- **Port:** 80
- **Protocol:** HTTP

---

## 🗄️ Adım 3: MySQL Database Oluşturma

1. **"+ Create Service"** → **"MySQL"** seç
2. Ayarlar:
   - **Name:** `mysql`
   - **Version:** 8.0
   - **Database:** `cronjobs`
   - **Username:** `cronjobs`
   - **Password:** Güçlü bir şifre oluştur (kaydet!)
   - **Root Password:** Ayrı bir şifre

---

## 🔴 Adım 4: Redis Oluşturma (Opsiyonel)

1. **"+ Create Service"** → **"Redis"** seç
2. Ayarlar:
   - **Name:** `redis`
   - **Version:** 7

---

## ⚙️ Adım 5: Environment Variables

App service'ine git → **"Environment"** sekmesi:

```env
APP_NAME=Cronjobs.to
APP_ENV=production
APP_KEY=base64:XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
APP_DEBUG=false
APP_URL=https://cronjobs.to

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=cronjobs
DB_USERNAME=cronjobs
DB_PASSWORD=your_mysql_password

QUEUE_CONNECTION=database
CACHE_STORE=database
SESSION_DRIVER=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_USERNAME=noreply@cronjobs.to
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=noreply@cronjobs.to
MAIL_FROM_NAME="Cronjobs.to"
```

### APP_KEY Oluşturma:
Lokal makinende çalıştır:
```bash
php artisan key:generate --show
```
Çıktıyı `APP_KEY` olarak kullan.

---

## 🔗 Adım 6: Service Linking

App service'inde **"Networking"** → **"Links"**:
- `mysql` servisini linkle
- `redis` servisini linkle (kullanıyorsan)

---

## 🚀 Adım 7: İlk Deployment

1. **"Deploy"** butonuna tıkla
2. Build tamamlanınca **"Console"** sekmesine git
3. Aşağıdaki komutları çalıştır:

```bash
# Migration
php artisan migrate --force

# Cache'leri temizle ve yeniden oluştur
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Storage link
php artisan storage:link

# Seed data (opsiyonel)
php artisan db:seed --force
```

---

## 📊 Adım 8: Monitoring

### Logs
- App service → **"Logs"** sekmesi
- Real-time log takibi

### Health Check
App service → **"Health Check"**:
- **Path:** `/`
- **Port:** 80
- **Interval:** 30s

---

## 🔄 Adım 9: Auto-Deploy (CI/CD)

GitHub kullanıyorsan:
1. App service → **"Source"**
2. **"Auto Deploy"** enable
3. Her push'ta otomatik deploy

---

## ⚡ Adım 10: Performance Tuning

### App Service Resources (Production için):
- **CPU:** 2 cores
- **Memory:** 1-2 GB
- **Replicas:** 2 (load balancing için)

### MySQL Resources:
- **CPU:** 1 core
- **Memory:** 1 GB

---

## 🐛 Troubleshooting

### 502 Bad Gateway
- PHP-FPM çalışmıyor olabilir
- Logs'u kontrol et: `docker logs <container_id>`

### Database Connection Error
- MySQL service'in çalıştığından emin ol
- Environment variables'ı kontrol et
- `DB_HOST=mysql` olmalı (container adı)

### Permission Denied
Console'da çalıştır:
```bash
chown -R www-data:www-data /var/www/html/storage
chmod -R 775 /var/www/html/storage
```

### Queue Worker Çalışmıyor
- Supervisord loglarını kontrol et
- `ps aux | grep queue` ile worker'ı kontrol et

---

## 📞 Destek

Sorun yaşarsan:
1. Easypanel Docs: https://easypanel.io/docs
2. Laravel Docs: https://laravel.com/docs
3. Docker Logs: `docker logs cronjobs-app`

---

## ✅ Checklist

- [ ] Proje oluşturuldu
- [ ] App service oluşturuldu
- [ ] MySQL oluşturuldu
- [ ] Domain eklendi
- [ ] SSL aktif
- [ ] Environment variables eklendi
- [ ] Migration çalıştırıldı
- [ ] İlk kullanıcı oluşturuldu
- [ ] Queue worker çalışıyor
- [ ] Scheduler çalışıyor

