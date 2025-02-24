<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Shorten URL Service

This is a Laravel project for a URL shortening service.

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/shorten_url.git
    cd shorten_url
    ```

2. Install the dependencies:
    ```bash
    composer install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Run the migrations:
    ```bash
    php artisan migrate
    ```

## Running the Project

1. Start the development server:
    ```bash
    php artisan serve
    ```

2. The application will be available at `http://localhost:8000`.

## Using the UrlService

### Encode URL

To encode a URL, send a POST request to the `/api/encode` endpoint with the URL you want to shorten.

Example:
```bash
curl -X POST http://localhost:8000/api/encode -H "Content-Type: application/json" -d '{"url": "https://example.com"}'
```

### Decode URL

To decode a shortened URL, send a POST request to the `/api/decode` endpoint with the encoded URL.

Example:
```bash
curl -X POST http://localhost:8000/api/decode -H "Content-Type: application/json" -d '{"url": "shortened_url"}'
```

## Running Tests

To run the tests, use the following command:
```bash
php artisan test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
