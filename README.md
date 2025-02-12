# API Geliştirme ve Entegrasyonu Atölyesi – Bitirme Ödevi

## Proje Özeti
Bu proje, Laravel kullanarak basit bir API geliştirme ve güvenlik önlemlerini uygulama amacını taşımaktadır. Proje, kimlik doğrulama, veri doğrulama ve API rate limiting gibi önemli özellikleri içermektedir.

## Özellikler
### Kimlik Doğrulama (Authentication)
-  Kullanıcı Kaydı: Kullanıcılar, POST /api/register endpoint’i ile kayıt olabilmektedir.
-  Kullanıcı Girişi: Kullanıcılar, POST /api/login endpoint’i ile giriş yapabilmektedir.
-  Kullanıcı Bilgileri: Giriş yapan kullanıcı, GET /api/user endpoint’i ile kendi bilgilerine erişebilmektedir.

### Güvenlik Önlemleri
- **Laravel Sanctum:** Kimlik doğrulama işlemleri için Laravel'in Sanctum paketini kullanmaktadır.
- **API Rate Limiting:** Her kullanıcı için dakika başına maksimum 10 istek ile sınırlama getirilmiştir.
- **Veri Doğrulama (Validation):** Gelen veriler, belirli kurallara göre doğrulanmaktadır.

### API Dokümantasyonu
Proje, Postman kullanılarak API route noktalarının açıklamalarını içeren bir dokümantasyon ile birlikte sunulmaktadır. 
Dökümantasyon dosyasının yolu: docs/API-Development_postman_collection.json


## Kurulum

### 1. Gereksinimler:
  -  PHP
  -  Composer
  -  Laravel
  -  Postman

### 2. Proje Kurulumu:
```bash
git clone <repo-url>
cd <proje-dizini>
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

### 3. Postman Collection:
Postman koleksiyonunu içeren dosya, proje dizininde bulunmaktadır. API'yi test etmek için bu koleksiyonu içe aktarabilirsiniz.


# Katkıda Bulunanlar
- Birsel EPİK - Proje Geliştirici

# İletişim
Herhangi bir sorunuz veya geri bildiriminiz varsa, lütfen benimle iletişime geçin.

