# Podkreśl styl kuchni (podkreslstylkuchni.pl)

Platforma promocyjno-konkursowa marki **Russell Hobbs** (kolekcje *Retro* oraz *Inspire*), zrealizowana w oparciu o framework **Laravel 5.8**. Projekt obejmuje publiczny serwis promocyjny z formularzem zgłoszeniowym, panel administracyjny (Backoffice) do weryfikacji i obsługi zgłoszeń oraz interfejs REST API. Środowisko uruchomieniowe jest w pełni skonteneryzowane przy użyciu **Dockera**.

---

## 🚀 Spis treści

- [Stos technologiczny](#-stos-technologiczny)
- [Wymagania systemowe](#-wymagania-systemowe)
- [Instalacja i pierwsze uruchomienie](#-instalacja-i-pierwsze-uruchomienie)
- [Dostępne usługi i porty](#-dostępne-usługi-i-porty)
- [Dostęp i konta systemowe](#-dostęp-i-konta-systemowe)
- [Struktura aplikacji i moduły](#-struktura-aplikacji-i-moduły)
- [Interfejs REST API](#-interfejs-rest-api)
- [Rozwój frontendu (Assets)](#-rozwój-frontendu-assets)
- [Przydatne polecenia](#-przydatne-polecenia)
- [Rozwiązywanie problemów](#-rozwiązywanie-problemów)

---

## 🛠 Stos technologiczny

### Backend
- **PHP 7.2.15** (Apache MPM Prefork)
- **Laravel 5.8**
- **Composer 1.8.4**
- **MySQL 8.0.12**

### Frontend
- **Node.js 12**
- **Laravel Mix 6** (Webpack 5)
- **Sass**, **Bootstrap 4.1.3**, **jQuery 1.11.3**
- Biblioteki dodatkowe: *Owl Carousel 2.3.4*, *AOS (Animate On Scroll)*, *Moment.js*, *Malihu Custom Scrollbar*

### Narzędzia i infrastruktura
- **Docker** & **Docker Compose v2**
- **phpMyAdmin 5.2** (zarządzanie bazą danych przez przeglądarkę)
- **MailCatcher** (lokalny serwer SMTP i webmail do inspekcji wysyłanych wiadomości)

---

## 📋 Wymagania systemowe

Do uruchomienia projektu wymagane są:
- [Docker Engine](https://docs.docker.com/engine/install/) (wersja >= 20.10)
- [Docker Compose](https://docs.docker.com/compose/) v2 (obsługiwane natywnie przez polecenie `docker compose`)

---

## ⚙️ Instalacja i pierwsze uruchomienie

### 1. Przygotowanie pliku konfiguracyjnego środowiska

Skopiuj szablon zmiennych środowiskowych `.env.example` do pliku `.env`:

```bash
cp .env.example .env
```

W pliku `.env` znajdują się parametry konfiguracyjne (nazwa projektu, porty serwisów, poświadczenia bazy danych oraz konfiguracja poczty).

### 2. Zbudowanie i uruchomienie kontenerów

Uruchom kontenery w tle z automatyczną budową obrazu aplikacji:

```bash
docker compose up -d --build
```

### 3. Automatyczna inicjalizacja środowiska

Skrypt startowy kontenera aplikacji (`docker/php/entrypoint.sh`) podczas pierwszego uruchomienia automatycznie wykonuje następujące czynności:
1. Ustawienie właściwych uprawnień do katalogów `public` i `storage` dla użytkownika `www-data`.
2. Pobranie zależności PHP za pomocą `composer install`.
3. Instalację i kompilację assetów frontendowych (`npm install && npm run build`).
4. Wygenerowanie klucza szyfrowania aplikacji (`php artisan key:generate`).
5. Uruchomienie migracji oraz załadowanie danych początkowych (`php artisan migrate:fresh --seed`):
   - definicje produktów Russell Hobbs (*Retro*, *Inspire*),
   - powiązane linki sklepowe do zakupu urządzeń,
   - testowe zgłoszenia promocyjne,
   - konto administratora.
6. Wyczyszczenie pamięci podręcznej i routingów Laravel.
7. Utworzenie dowiązania symbolicznego `public/storage` do `storage/app/public`.
8. Start serwera Apache w trybie pierwszoplanowym.

Stan inicjalizacji można na bieżąco obserwować poleceniem:

```bash
docker compose logs -f httpd
```

---

## 🌐 Dostępne usługi i porty

Domyślna konfiguracja sieciowa zdefiniowana w `.env`:

| Usługa | Adres URL / Host | Opis |
| :--- | :--- | :--- |
| **Aplikacja WWW** | [http://localhost:8580](http://localhost:8580) | Strona główna kampanii promocyjnej |
| **Formularz zgłoszeniowy** | [http://localhost:8580/formularz](http://localhost:8580/formularz) | Rejestracja zakupu w promocji |
| **Panel administracyjny** | [http://localhost:8580/panel](http://localhost:8580/panel) | Panel weryfikacji zgłoszeń (Backoffice) |
| **phpMyAdmin** | [http://localhost:8582](http://localhost:8582) | Przeglądarkowy klient bazy danych |
| **MailCatcher (Web UI)** | [http://localhost:8588](http://localhost:8588) | Podgląd wysłanych wiadomości e-mail |
| **MailCatcher (SMTP)** | `localhost:8587` | Serwer SMTP dla kontenerów i klientów |
| **MySQL (zewnętrzny dostęp)** | `localhost:8585` | Dostęp do bazy (np. DBeaver, DataGrip, HeidiSQL) |

---

## 🔐 Dostęp i konta systemowe

### Panel Administracyjny (`/login`)
- **Adres:** [http://localhost:8580/login](http://localhost:8580/login)
- **Login:** `admin@example.com`
- **Hasło:** `asd123`
- **Rola:** `ADMIN`

### Baza danych (MySQL / phpMyAdmin)
- **Host (z wnętrza kontenerów):** `podkresl-styl-kuchni-mysql`
- **Host (z systemu gospodarza):** `localhost:8585`
- **Port:** `3306` (wewnątrz sieci Docker)
- **Nazwa bazy:** `rh_psk`
- **Użytkownik:** `rh_psk`
- **Hasło:** `rh_psk`
- **Użytkownik root:** `root` / `root_pass`

---

## 📁 Struktura aplikacji i moduły

Projekt zorganizowany jest w standardowej architekturze Laravel:

- `app/Http/Controllers/`
  - `HomeController.php` – obsługa widoków strony głównej, regulaminu, listy produktów i kontaktu.
  - `ApplicationController.php` – obsługa zgłoszeń promocyjnych (walidacja, upload załączników).
  - `ConfirmController.php` – obsługa potwierdzeń zgłoszeń przez link z wiadomości e-mail.
  - `ContactController.php` – obsługa formularza kontaktowego.
  - `Panel/` – kontrolery zaplecza administracyjnego (zarządzanie zgłoszeniami, produktami i linkami).
  - `Api/` – kontrolery interfejsu programistycznego REST.
- `app/Models/` – modele Eloquent: `Application`, `Product`, `Url`, `User`.
- `app/Observers/` – obserwatory zdarzeń (np. automatyczna wysyłka e-maili przy dodaniu nowego zgłoszenia).
- `database/migrations/` – schematy tabel bazy danych (użytkownicy, zgłoszenia, produkty, linki).
- `database/seeds/` – seedery danych początkowych (`DatabaseSeeder`, `ApplicationSeeder`, `UserSeeder`).
- `docker/` – konfiguracja środowiska konteneryzacji:
  - `docker/php/000-default.conf` – konfiguracja VirtualHost Apache,
  - `docker/php/php.ini` – konfiguracja interpretera PHP,
  - `docker/php/entrypoint.sh` – skrypt startowy kontenera.
- `resources/` – pliki źródłowe widoków Blade (`views/`), arkusze stylów SCSS (`sass/`) oraz skrypty JS (`js/`).
- `storage/` – pliki przesyłane przez użytkowników (paragony/faktury, kody kreskowe), cache oraz logi.

---

## 🔌 Interfejs REST API

Aplikacja udostępnia zabezpieczone endpointy API z autoryzacją za pomocą nagłówka `Authorization: Bearer <api_token>` (token przypisany do użytkownika w tabeli `users`):

| Metoda | Endpoint | Wymaga autoryzacji | Opis |
| :--- | :--- | :---: | :--- |
| `GET` | `/api/applications` | Tak | Pobranie listy zgłoszeń |
| `GET` | `/api/products` | Tak | Pobranie listy produktów |
| `POST` | `/api/products` | Tak | Dodanie nowego produktu |
| `PUT` | `/api/products` | Tak | Aktualizacja danych produktu |
| `DELETE` | `/api/products/{product}` | Tak | Usunięcie produktu |
| `GET` | `/api/urls` | Tak | Pobranie listy linków sklepowych |
| `POST` | `/api/urls` | Tak | Dodanie linku sklepowego |
| `PUT` | `/api/urls` | Tak | Aktualizacja linku |
| `DELETE` | `/api/urls/{url}` | Tak | Usunięcie linku |
| `GET` | `/api/urls/{id}` | Nie | Pobranie linków dla danego produktu |

---

## 🎨 Rozwój frontendu (Assets)

Budowanie assetów frontendowych realizowane jest przez **Laravel Mix** wewnątrz kontenera aplikacji:

```bash
# Kompilacja jednorazowa w trybie deweloperskim
docker compose exec httpd npm run dev

# Kompilacja produkcyjna z minifikacją kodu
docker compose exec httpd npm run prod

# Tryb śledzenia zmian w plikach (file watcher)
docker compose exec httpd npm run watch
```

---

## 💻 Przydatne polecenia

### Interaktywna powłoka w kontenerze aplikacji:
```bash
docker compose exec httpd bash
```

### Ponowne wykonanie migracji i seedowania bazy danych:
```bash
docker compose exec httpd php artisan migrate:fresh --seed
```

### Czyszczenie pamięci podręcznej frameworka:
```bash
docker compose exec httpd php artisan cache:clear
docker compose exec httpd php artisan config:clear
docker compose exec httpd php artisan view:clear
docker compose exec httpd php artisan route:clear
```

### Zarządzanie kontenerami:
```bash
# Zatrzymanie środowiska
docker compose down

# Uruchomienie istniejących kontenerów
docker compose up -d

# Restart wybranego kontenera (np. serwera WWW)
docker compose restart httpd

# Podgląd statusu usług
docker compose ps
```

---

## 🔍 Rozwiązywanie problemów

### 1. Błąd uprawnień do katalogów `storage` lub `bootstrap/cache`
W przypadku wystąpienia błędu `Permission denied` przy zapisie logów lub plików tymczasowych:
```bash
docker compose exec -u root httpd chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
docker compose exec -u root httpd chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
```

### 2. Sprawdzenie wysyłki wiadomości e-mail
Wszystkie wiadomości wysyłane przez aplikację (np. powiadomienia o zgłoszeniu, formularz kontaktowy) trafiają do lokalnego serwera **MailCatcher**. Możesz je podejrzeć w przeglądarce pod adresem [http://localhost:8588](http://localhost:8588).

Jeśli chcesz wyłączyć wysyłkę do serwera SMTP i zapisywać wiadomości wyłącznie w plikach dziennika, zmień w pliku `.env`:
```env
MAIL_DRIVER=log
```
Treść wiadomości będzie wówczas zapisywana w katalogu `storage/logs/laravel-*.log`.

### 3. Połączenie z bazą danych poza Dockerem
Jeśli łączysz się z poziomu zewnętrznego programu (np. DBeaver):
- **Host:** `127.0.0.1` (lub `localhost`)
- **Port:** `8585` (port zewnętrzny zdefiniowany w `.env`)
- **Baza:** `rh_psk`
- **Użytkownik:** `rh_psk`
- **Hasło:** `rh_psk`
