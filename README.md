# Local Business E-Commerce Platform

A complete, responsive e-commerce website built with vanilla PHP, HTML, CSS, and JavaScript.

## Features

### Customer Features

- 🛍️ Browse products with category filtering and search
- 🛒 Shopping cart with session-based persistence
- 💳 Checkout with customer details and payment method selection
- 👤 User registration and login system
- 📱 Fully responsive design (mobile, tablet, desktop)

### Admin Features

- 📊 Dashboard with business overview
- ➕ Add, edit, and delete products
- 📦 View and manage orders
- ✅ Update order status (pending → processing → shipped → completed)

## Tech Stack

- **Backend**: PHP 7.4+ (vanilla, no frameworks)
- **Database**: MySQL/MariaDB with PDO
- **Frontend**: HTML5, CSS3 (plain CSS, no frameworks), vanilla JavaScript
- **Server**: XAMPP (Apache + MySQL)

## Prerequisites

- XAMPP installed (`/opt/lampp/`)
- PHP 7.4 or higher
- MySQL/MariaDB
- PDO MySQL extension enabled

## Installation & Setup

### 1. Database Setup

```bash
# Start XAMPP
sudo /opt/lampp/lampp start

# Create database and import schema
/opt/lampp/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS local_business_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
/opt/lampp/bin/mysql -u root local_business_db < db/schema.sql
```

### 2. Configuration

The database configuration is in `src/config.php`:

```php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'local_business_db');
define('DB_USER', 'root');
define('DB_PASS', '');  // Empty for default XAMPP
```

Modify these values if your MySQL credentials differ.

### 3. Run the Application

#### Option A: Using XAMPP Apache (Recommended)

```bash
# Ensure XAMPP is running
sudo /opt/lampp/lampp status

# Create symlink in htdocs (adjust path as needed)
sudo ln -s /home/benjamin/Projects/marangu-project/public /opt/lampp/htdocs/marangu

# Visit in browser
http://localhost/marangu/
```

#### Option B: Using PHP Built-in Server

```bash
# From project root
/opt/lampp/bin/php -S 127.0.0.1:8000 -t public

# Visit in browser
http://127.0.0.1:8000/
```

## Default Accounts

### Admin Account

- **Email**: admin@example.com
- **Password**: admin123
- **Admin Login**: http://localhost/marangu/admin/login.php (or http://127.0.0.1:8000/admin/login.php)

### Customer Account

Use the registration page to create customer accounts.

## Project Structure

```
marangu-project/
├── db/
│   └── schema.sql              # Database schema and sample data
├── public/                     # Document root (web-accessible)
│   ├── admin/                  # Admin panel pages
│   │   ├── login.php
│   │   ├── dashboard.php
│   │   ├── products.php
│   │   ├── product_form.php
│   │   └── orders.php
│   ├── css/
│   │   └── styles.css          # Responsive CSS styles
│   ├── images/
│   │   └── placeholder.svg     # Default product image
│   ├── js/
│   │   └── main.js             # JavaScript (search, filters)
│   ├── index.php               # Homepage
│   ├── shop.php                # Product listing with filters
│   ├── product.php             # Product detail page
│   ├── cart.php                # Shopping cart
│   ├── checkout.php            # Checkout and order placement
│   ├── login.php               # Customer login
│   ├── register.php            # Customer registration
│   └── logout.php              # Logout
└── src/                        # Backend logic (not web-accessible)
    ├── config.php              # Database credentials
    ├── db_connect.php          # PDO connection
    └── ecommerce.php           # Helper functions (cart, auth, products)
```

## Database Schema

### Tables

- **users**: Customer and admin accounts (with `is_admin` flag)
- **products**: Product catalog (name, description, image, price, category)
- **cart**: Optional persistent cart (currently uses sessions)
- **orders**: Order records with customer details
- **order_items**: Line items for each order

## Key Features

### Responsive Design

- Mobile-first CSS with breakpoints at 600px and 900px
- Flexible grid layout adapts to screen size
- Touch-friendly buttons and forms

### Security

- Password hashing with `password_hash()` (bcrypt)
- Prepared statements (PDO) to prevent SQL injection
- Input sanitization with `htmlspecialchars()`
- Session-based authentication

### Accessibility

- Semantic HTML5 elements
- ARIA labels where appropriate
- Keyboard navigation support
- Focus states on interactive elements
- `lang="en"` attribute on all pages

## Usage

### Customer Flow

1. Browse products on homepage or shop page
2. Use search and category filters to find products
3. Add products to cart
4. Proceed to checkout
5. Enter delivery details and select payment method
6. Order confirmation displayed

### Admin Flow

1. Login at `/admin/login.php`
2. View dashboard statistics
3. Manage products (add/edit/delete)
4. View orders and update status
5. Logout

## Troubleshooting

### Database Connection Errors

```bash
# Test PDO connection
/opt/lampp/bin/php -r 'require "src/config.php"; $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS); echo "OK\n";'
```

### Check MySQL is Running

```bash
/opt/lampp/bin/mysql -u root -e "SHOW DATABASES;"
```

### Check PHP Version and Extensions

```bash
/opt/lampp/bin/php -v
/opt/lampp/bin/php -m | grep -E 'pdo|pdo_mysql'
```

### View Error Logs

- **XAMPP Apache**: `/opt/lampp/logs/error_log`
- **Built-in server**: Check terminal output

## Customization

### Adding Products

1. Login as admin
2. Go to "Products" → "Add product"
3. Upload product images to `public/images/`
4. Enter filename in the image field

### Changing Colors/Styling

Edit `public/css/styles.css`. Main brand colors:

- Primary gradient: `#667eea` to `#764ba2`
- Banner gradient: `#ffecd2` to `#fcb69f`

### Adding Payment Gateway

Modify `public/checkout.php` to integrate with payment providers (Stripe, PayPal, etc.)

## License

This project is for educational purposes.

## Credits

Built with ❤️ using vanilla PHP, HTML, CSS, and JavaScript.
