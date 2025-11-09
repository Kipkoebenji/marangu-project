# Local Business E-Commerce Platform 🛒# Local Business E-Commerce Platform

A complete, full-featured e-commerce website built with PHP, MySQL, HTML, CSS, and JavaScript. This platform includes a customer-facing storefront with shopping cart functionality and a comprehensive admin panel for managing products and orders.A complete, responsive e-commerce website built with vanilla PHP, HTML, CSS, and JavaScript.

## 📋 Table of Contents## Features

- [Features](#features)### Customer Features

- [Technology Stack](#technology-stack)

- [Prerequisites](#prerequisites)- 🛍️ Browse products with category filtering and search

- [Installation Guide](#installation-guide)- 🛒 Shopping cart with session-based persistence

- [Project Structure](#project-structure)- 💳 Checkout with customer details and payment method selection

- [Configuration](#configuration)- 👤 User registration and login system

- [Usage Guide](#usage-guide)- 📱 Fully responsive design (mobile, tablet, desktop)

- [Default Credentials](#default-credentials)

- [Common Issues](#common-issues-and-solutions)### Admin Features

- [Development](#development)

- [Security](#security-considerations)- 📊 Dashboard with business overview

- [Backup](#backup)- ➕ Add, edit, and delete products

- [Support](#support)- 📦 View and manage orders

- ✅ Update order status (pending → processing → shipped → completed)

## ✨ Features

## Tech Stack

### Customer Features

- 🛍️ **Product Browsing**: Browse products with category filtering and search functionality- **Backend**: PHP 7.4+ (vanilla, no frameworks)

- 🛒 **Shopping Cart**: Add, update, and remove items with real-time cart updates- **Database**: MySQL/MariaDB with PDO

- 💳 **Checkout System**: Complete orders with customer details and payment method selection- **Frontend**: HTML5, CSS3 (plain CSS, no frameworks), vanilla JavaScript

- 👤 **User Authentication**: Secure registration and login system with bcrypt password hashing- **Server**: XAMPP (Apache + MySQL)

- 📱 **Responsive Design**: Mobile-first design that works seamlessly on all devices

- 📦 **User Profile**: View account details and complete purchase history with order tracking## Prerequisites

- 🔍 **Product Search**: Fast search functionality with live results

- 🏷️ **Category Filters**: Filter products by category and price range- XAMPP installed (`/opt/lampp/`)

- PHP 7.4 or higher

### Admin Features- MySQL/MariaDB

- 📊 **Dashboard**: Real-time overview of orders, products, and customer statistics- PDO MySQL extension enabled

- ➕ **Product Management**: Full CRUD operations for products with image upload

- 📦 **Order Management**: View all orders with detailed information and status updates## Installation & Setup

- 🔐 **Secure Access**: Role-based access control with separate admin authentication

- ✅ **Order Status**: Update order status (pending, processing, completed, cancelled)### 1. Database Setup

- 👥 **Customer Overview**: View registered customers and their purchase history

````bash

## 🛠 Technology Stack# Start XAMPP

sudo /opt/lampp/lampp start

- **Backend**: PHP 7.4+ (Vanilla PHP, no frameworks)

- **Database**: MySQL/MariaDB with PDO# Create database and import schema

- **Frontend**: HTML5, CSS3 (Plain CSS with modern features), Vanilla JavaScript/opt/lampp/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS local_business_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"

- **Server**: PHP Built-in Development Server / Apache (XAMPP)/opt/lampp/bin/mysql -u root local_business_db < db/schema.sql

- **Authentication**: Session-based with bcrypt password hashing```

- **Database Tool**: phpMyAdmin (included with XAMPP)

### 2. Configuration

## 📦 Prerequisites

The database configuration is in `src/config.php`:

Before you begin, ensure you have the following installed on your machine:

```php

### Required Softwaredefine('DB_HOST', '127.0.0.1');

define('DB_NAME', 'local_business_db');

1. **XAMPP** (includes PHP, MySQL, Apache, and phpMyAdmin)define('DB_USER', 'root');

   - Download from: https://www.apachefriends.org/define('DB_PASS', '');  // Empty for default XAMPP

   - Minimum version: 8.0 (includes PHP 8.0+)```



2. **Git** (for cloning the repository)Modify these values if your MySQL credentials differ.

   - Download from: https://git-scm.com/

   ### 3. Run the Application

3. **Web Browser** (Chrome, Firefox, Safari, or Edge)

   - Recommended: Latest version of Chrome or Firefox#### Option A: Using XAMPP Apache (Recommended)



### System Requirements```bash

# Ensure XAMPP is running

- **Operating System**: Linux, macOS, or Windowssudo /opt/lampp/lampp status

- **RAM**: Minimum 2GB

- **Disk Space**: At least 500MB free space# Create symlink in htdocs (adjust path as needed)

- **PHP Version**: 7.4 or highersudo ln -s /home/benjamin/Projects/marangu-project/public /opt/lampp/htdocs/marangu

- **MySQL Version**: 5.7 or higher / MariaDB 10.2+

# Visit in browser

## 🚀 Installation Guidehttp://localhost/marangu/

````

### Step 1: Install XAMPP

#### Option B: Using PHP Built-in Server

#### Linux (Ubuntu/Debian)

`bash`bash

# Download XAMPP (adjust version as needed)# From project root

wget https://www.apachefriends.org/xampp-files/8.2.12/xampp-linux-x64-8.2.12-0-installer.run/opt/lampp/bin/php -S 127.0.0.1:8000 -t public

# Make installer executable# Visit in browser

chmod +x xampp-linux-x64-8.2.12-0-installer.runhttp://127.0.0.1:8000/

```

# Run installer

sudo ./xampp-linux-x64-8.2.12-0-installer.run## Default Accounts



# XAMPP will be installed to /opt/lampp/### Admin Account

```

- **Email**: admin@example.com

#### macOS- **Password**: admin123

````bash- **Admin Login**: http://localhost/marangu/admin/login.php (or http://127.0.0.1:8000/admin/login.php)

# Download the DMG installer from apachefriends.org

# Install by dragging to Applications folder### Customer Account

# XAMPP will be installed to /Applications/XAMPP/

```Use the registration page to create customer accounts.



#### Windows## Project Structure

1. Download the installer from https://www.apachefriends.org/

2. Run the `.exe` installer```

3. Follow installation wizardmarangu-project/

4. XAMPP will be installed to `C:\xampp\`├── db/

│   └── schema.sql              # Database schema and sample data

### Step 2: Clone the Repository├── public/                     # Document root (web-accessible)

│   ├── admin/                  # Admin panel pages

```bash│   │   ├── login.php

# Create a Projects directory (if it doesn't exist)│   │   ├── dashboard.php

mkdir -p ~/Projects│   │   ├── products.php

cd ~/Projects│   │   ├── product_form.php

│   │   └── orders.php

# Clone the repository (replace with your actual repository URL)│   ├── css/

git clone https://github.com/Kipkoebenji/marangu-project.git│   │   └── styles.css          # Responsive CSS styles

│   ├── images/

# Navigate to project directory│   │   └── placeholder.svg     # Default product image

cd marangu-project│   ├── js/

```│   │   └── main.js             # JavaScript (search, filters)

│   ├── index.php               # Homepage

Alternatively, download as ZIP:│   ├── shop.php                # Product listing with filters

```bash│   ├── product.php             # Product detail page

# If downloading as ZIP│   ├── cart.php                # Shopping cart

unzip marangu-project-main.zip│   ├── checkout.php            # Checkout and order placement

cd marangu-project-main│   ├── login.php               # Customer login

```│   ├── register.php            # Customer registration

│   └── logout.php              # Logout

### Step 3: Start XAMPP Services└── src/                        # Backend logic (not web-accessible)

    ├── config.php              # Database credentials

#### Linux    ├── db_connect.php          # PDO connection

```bash    └── ecommerce.php           # Helper functions (cart, auth, products)

# Start all XAMPP services (Apache + MySQL + others)```

sudo /opt/lampp/lampp start

## Database Schema

# Or start only MySQL (if using PHP built-in server)

sudo /opt/lampp/lampp startmysql### Tables



# Check XAMPP status- **users**: Customer and admin accounts (with `is_admin` flag)

sudo /opt/lampp/lampp status- **products**: Product catalog (name, description, image, price, category)

- **cart**: Optional persistent cart (currently uses sessions)

# Stop services when done- **orders**: Order records with customer details

sudo /opt/lampp/lampp stop- **order_items**: Line items for each order

````

## Key Features

#### macOS

````bash### Responsive Design

# Start XAMPP

sudo /Applications/XAMPP/xamppfiles/xampp start- Mobile-first CSS with breakpoints at 600px and 900px

- Flexible grid layout adapts to screen size

# Or just MySQL- Touch-friendly buttons and forms

sudo /Applications/XAMPP/xamppfiles/xampp startmysql

### Security

# Check status

sudo /Applications/XAMPP/xamppfiles/xampp status- Password hashing with `password_hash()` (bcrypt)

```- Prepared statements (PDO) to prevent SQL injection

- Input sanitization with `htmlspecialchars()`

#### Windows- Session-based authentication

1. Open **XAMPP Control Panel**

2. Click **Start** next to **MySQL** (required)### Accessibility

3. Optionally start **Apache** (if not using PHP built-in server)

- Semantic HTML5 elements

### Step 4: Create the Database- ARIA labels where appropriate

- Keyboard navigation support

#### Option A: Using phpMyAdmin (Recommended for Beginners)- Focus states on interactive elements

- `lang="en"` attribute on all pages

1. Open your browser and navigate to: **http://localhost/phpmyadmin**

2. Click on **"New"** in the left sidebar## Usage

3. Enter database name: **`local_business_db`**

4. Select Collation: **`utf8mb4_general_ci`**### Customer Flow

5. Click **"Create"**

6. Click on the newly created **`local_business_db`** database1. Browse products on homepage or shop page

7. Click on the **"Import"** tab at the top2. Use search and category filters to find products

8. Click **"Choose File"** and select **`db/schema.sql`** from your project folder3. Add products to cart

9. Scroll down and click **"Go"**4. Proceed to checkout

10. You should see a success message: "Import has been successfully finished"5. Enter delivery details and select payment method

6. Order confirmation displayed

#### Option B: Using Command Line (Faster)

### Admin Flow

**Linux/macOS:**

```bash1. Login at `/admin/login.php`

# Navigate to project directory2. View dashboard statistics

cd ~/Projects/marangu-project3. Manage products (add/edit/delete)

4. View orders and update status

# Create database5. Logout

/opt/lampp/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS local_business_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"

## Troubleshooting

# Import schema with sample data

/opt/lampp/bin/mysql -u root local_business_db < db/schema.sql### Database Connection Errors



# Verify import```bash

/opt/lampp/bin/mysql -u root -e "USE local_business_db; SHOW TABLES;"# Test PDO connection

```/opt/lampp/bin/php -r 'require "src/config.php"; $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS); echo "OK\n";'

````

**Windows:**

````cmd### Check MySQL is Running

# Open Command Prompt as Administrator

# Navigate to project directory```bash

cd C:\path\to\marangu-project/opt/lampp/bin/mysql -u root -e "SHOW DATABASES;"

````

# Create database

C:\xampp\mysql\bin\mysql -u root -e "CREATE DATABASE IF NOT EXISTS local_business_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"### Check PHP Version and Extensions

# Import schema```bash

C:\xampp\mysql\bin\mysql -u root local_business_db < db\schema.sql/opt/lampp/bin/php -v

/opt/lampp/bin/php -m | grep -E 'pdo|pdo_mysql'

# Verify import```

C:\xampp\mysql\bin\mysql -u root -e "USE local_business_db; SHOW TABLES;"

````### View Error Logs



### Step 5: Configure Database Connection- **XAMPP Apache**: `/opt/lampp/logs/error_log`

- **Built-in server**: Check terminal output

The default database configuration is located in **`src/config.php`**:

## Customization

```php

define('DB_HOST', '127.0.0.1');### Adding Products

define('DB_NAME', 'local_business_db');

define('DB_USER', 'root');1. Login as admin

define('DB_PASS', '');  // Empty for XAMPP default2. Go to "Products" → "Add product"

```3. Upload product images to `public/images/`

4. Enter filename in the image field

**✅ No changes needed** if you're using XAMPP with default settings.

### Changing Colors/Styling

**❗ If your MySQL has a password**, edit `src/config.php`:

```phpEdit `public/css/styles.css`. Main brand colors:

define('DB_PASS', 'your_mysql_password');

```- Primary gradient: `#667eea` to `#764ba2`

- Banner gradient: `#ffecd2` to `#fcb69f`

### Step 6: Start the Development Server

### Adding Payment Gateway

#### Option A: PHP Built-in Server (Recommended)

Modify `public/checkout.php` to integrate with payment providers (Stripe, PayPal, etc.)

**Linux/macOS:**

```bash## License

# Navigate to project root

cd ~/Projects/marangu-projectThis project is for educational purposes.



# Start server## Credits

/opt/lampp/bin/php -S 127.0.0.1:8000 -t public/

Built with ❤️ using vanilla PHP, HTML, CSS, and JavaScript.

# Server will run until you press Ctrl+C
````

**Windows:**

```cmd
# Navigate to project root
cd C:\path\to\marangu-project

# Start server
C:\xampp\php\php.exe -S 127.0.0.1:8000 -t public\

# Server will run until you press Ctrl+C
```

**Server Output:**

```
PHP 8.2.12 Development Server (http://127.0.0.1:8000) started
```

#### Option B: Using Apache (XAMPP)

**Linux/macOS:**

```bash
# Create symbolic link to htdocs
sudo ln -s ~/Projects/marangu-project /opt/lampp/htdocs/marangu-project

# Access at: http://localhost/marangu-project/public/
```

**Windows:**

1. Copy entire project folder to `C:\xampp\htdocs\`
2. Or create a virtual host (advanced)
3. Access at: **http://localhost/marangu-project/public/**

### Step 7: Access the Application

Open your web browser and navigate to:

| Page                | URL                                       |
| ------------------- | ----------------------------------------- |
| **Homepage**        | http://127.0.0.1:8000/                    |
| **Shop**            | http://127.0.0.1:8000/shop.php            |
| **Cart**            | http://127.0.0.1:8000/cart.php            |
| **Login**           | http://127.0.0.1:8000/login.php           |
| **Register**        | http://127.0.0.1:8000/register.php        |
| **Profile**         | http://127.0.0.1:8000/profile.php         |
| **Admin Login**     | http://127.0.0.1:8000/admin/login.php     |
| **Admin Dashboard** | http://127.0.0.1:8000/admin/dashboard.php |

### Step 8: Login and Test

**Test Customer Login:**

1. Register a new account at: http://127.0.0.1:8000/register.php
2. Or use an existing test account (if any in your database)

**Test Admin Panel:**

1. Go to: http://127.0.0.1:8000/admin/login.php
2. Login with:
   - **Email**: `admin@example.com`
   - **Password**: `admin123`

## 📁 Project Structure

```
marangu-project/
│
├── db/
│   └── schema.sql                  # Database schema with sample data and tables
│
├── public/                         # Web-accessible directory (document root)
│   ├── index.php                  # Homepage with featured products
│   ├── shop.php                   # Product listing with filters
│   ├── product.php                # Individual product detail page
│   ├── cart.php                   # Shopping cart management
│   ├── checkout.php               # Checkout form and order processing
│   ├── login.php                  # Customer login
│   ├── register.php               # Customer registration
│   ├── profile.php                # User profile with purchase history
│   ├── logout.php                 # Logout handler
│   │
│   ├── admin/                     # Admin panel directory
│   │   ├── login.php             # Admin authentication
│   │   ├── dashboard.php         # Admin overview page
│   │   ├── products.php          # Product management listing
│   │   ├── product_form.php      # Add/Edit product form
│   │   └── orders.php            # Order management
│   │
│   ├── css/
│   │   └── styles.css            # All CSS styles (responsive design)
│   │
│   ├── js/
│   │   └── main.js               # JavaScript for interactivity
│   │
│   └── images/
│       ├── placeholder.svg       # Default product image
│       └── [product-images]      # Uploaded product images
│
├── src/                           # Backend logic (not web-accessible)
│   ├── config.php                # Database configuration constants
│   ├── db_connect.php            # PDO database connection
│   ├── ecommerce.php             # Core functions (cart, auth, products)
│   │
│   ├── lib/
│   │   └── functions.php         # Additional helper functions
│   │
│   └── templates/
│       ├── header.php            # Header template
│       ├── footer.php            # Footer template
│       └── nav.php               # Navigation template
│
├── README.md                      # This file
├── README.old.md                  # Previous README (backup)
└── IMPROVEMENTS.md                # Documentation of improvements made

```

### Key Files Explained

| File                         | Purpose                                         |
| ---------------------------- | ----------------------------------------------- |
| `src/config.php`             | Database credentials and configuration          |
| `src/db_connect.php`         | Creates PDO database connection                 |
| `src/ecommerce.php`          | Core functions (authentication, cart, products) |
| `public/index.php`           | Homepage entry point                            |
| `public/admin/dashboard.php` | Admin panel main page                           |
| `db/schema.sql`              | Complete database structure with sample data    |
| `public/css/styles.css`      | All styling including responsive design         |

## ⚙️ Configuration

### Database Configuration

Edit **`src/config.php`** if your MySQL setup differs from defaults:

```php
<?php
define('DB_HOST', '127.0.0.1');      // Database host (usually 127.0.0.1 or localhost)
define('DB_NAME', 'local_business_db'); // Database name
define('DB_USER', 'root');           // MySQL username
define('DB_PASS', '');               // MySQL password (empty for XAMPP default)
?>
```

### Changing Server Port

If port 8000 is already in use:

```bash
# Use a different port (e.g., 9000)
/opt/lampp/bin/php -S 127.0.0.1:9000 -t public/

# Then access at: http://127.0.0.1:9000/
```

### Upload Directory

Product images are stored in **`public/images/`**. Ensure this directory has write permissions:

```bash
# Linux/macOS
chmod 755 public/images/

# Check permissions
ls -la public/images/
```

## 📖 Usage Guide

### For Customers

#### 1. Browse and Search Products

- Navigate to **Shop** page
- Use the search bar to find specific products
- Filter by category using dropdown menu
- Filter by price range (min/max)

#### 2. Add Products to Cart

- Click on any product to view details
- Select desired quantity
- Click **"Add to Cart"** button
- Cart badge in header shows item count

#### 3. Manage Shopping Cart

- Click **"Cart"** in navigation
- Update quantities using number inputs
- Click **"Update"** to save changes
- Click **"Remove"** to delete items
- See real-time total calculation

#### 4. Complete Checkout

- Click **"Proceed to Checkout"** from cart
- Fill in delivery information:
  - Full name
  - Email address
  - Delivery address
  - Phone number
- Select payment method (Cash on Delivery or Online Payment)
- Click **"Place Order"**
- Order confirmation page displays with order number

#### 5. View Order History

- Click **"Profile"** in navigation (must be logged in)
- View account details
- See complete purchase history with:
  - Order numbers and dates
  - Order status (pending, processing, completed, cancelled)
  - Items in each order
  - Total amounts

### For Administrators

#### 1. Access Admin Panel

- Navigate to: http://127.0.0.1:8000/admin/login.php
- Enter admin credentials
- Redirects to dashboard on successful login

#### 2. View Dashboard

- See total orders, products, and customers
- Quick statistics overview
- Links to all admin functions

#### 3. Manage Products

**Add New Product:**

1. Click **"Products"** → **"Add New Product"**
2. Fill in product details:
   - Product name
   - Description
   - Price
   - Category
   - Stock quantity
   - Image URL
3. Click **"Save Product"**

**Edit Product:**

1. Click **"Products"**
2. Find product in list
3. Click **"Edit"** button
4. Update details
5. Click **"Save Product"**

**Delete Product:**

1. Click **"Products"**
2. Find product in list
3. Click **"Delete"** button
4. Confirm deletion

#### 4. Manage Orders

- Click **"Orders"** in admin menu
- View all customer orders
- See order details, customer info, items
- Update order status using dropdown
- Click **"Update Status"** to save

## 🔑 Default Credentials

### Admin Account

- **Email**: `admin@example.com`
- **Password**: `admin123`
- **Access**: Admin panel with full privileges

### Sample Customer Accounts

The database includes test customer accounts:

- **Email**: `benjikorir@gmail.com` (user_id: 2)
- You can register new accounts through the registration page

### Sample Products

6 sample products are included:

- Handmade Coffee Mug ($12.50)
- Organic Honey Jar ($9.99)
- Cotton Tote Bag ($15.00)
- Locally Roasted Coffee Beans ($18.50)
- Handwoven Scarf ($25.00)
- Ceramic Planter ($22.00)

## 🐛 Common Issues and Solutions

### Issue 1: "Connection refused" or "SQLSTATE[HY000] [2002]"

**Problem**: MySQL is not running.

**Solution**:

```bash
# Linux
sudo /opt/lampp/lampp startmysql

# Check MySQL status
sudo /opt/lampp/lampp status

# If still not working, restart XAMPP
sudo /opt/lampp/lampp restart
```

### Issue 2: Port 8000 Already in Use

**Problem**: Another application is using port 8000.

**Solution**: Use a different port:

```bash
/opt/lampp/bin/php -S 127.0.0.1:9000 -t public/
# Access at: http://127.0.0.1:9000/
```

Or find and stop the process using port 8000:

```bash
# Linux/macOS
lsof -i :8000
kill -9 [PID]
```

### Issue 3: Database Connection Failed

**Problem**: Incorrect credentials or database doesn't exist.

**Solution**:

1. Verify MySQL is running: `sudo /opt/lampp/lampp status`
2. Check database exists:
   ```bash
   /opt/lampp/bin/mysql -u root -e "SHOW DATABASES;"
   ```
3. Verify credentials in `src/config.php`
4. Re-import schema if database is missing:
   ```bash
   /opt/lampp/bin/mysql -u root local_business_db < db/schema.sql
   ```

### Issue 4: Admin Login Not Working

**Problem**: Password hash mismatch or admin user doesn't exist.

**Solution**: Reset admin password:

```bash
# Generate new password hash
NEW_HASH=$(/opt/lampp/bin/php -r "echo password_hash('admin123', PASSWORD_DEFAULT);")

# Update database
/opt/lampp/bin/mysql -u root -e "USE local_business_db; UPDATE users SET password='$NEW_HASH' WHERE email='admin@example.com';"

# Or directly with escaped hash
/opt/lampp/bin/mysql -u root -e "USE local_business_db; UPDATE users SET password='\$2y\$10\$YQslcv8G3tOGhBEF.kGj8.p5sRQvhQYlJG6hOFl7u/UQm/MR.kNiy' WHERE email='admin@example.com';"
```

### Issue 5: Images Not Loading

**Problem**: Image paths incorrect or missing files.

**Solution**:

1. Ensure `public/images/placeholder.svg` exists
2. Check image permissions:
   ```bash
   chmod 755 public/images/
   chmod 644 public/images/*
   ```
3. Verify image URLs in database start with `/images/`
4. Upload images to `public/images/` directory

### Issue 6: Cart Not Saving / Login Not Persisting

**Problem**: PHP session issues.

**Solution**:

```bash
# Check session directory permissions (Linux)
sudo chmod 777 /tmp

# Or check PHP session config
/opt/lampp/bin/php -i | grep session.save_path
```

### Issue 7: Blank Page or PHP Errors

**Problem**: PHP errors not displayed.

**Solution**: Enable error display temporarily:

```bash
# Add to top of problematic PHP file
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

Or check error logs:

```bash
# Linux
tail -f /opt/lampp/logs/php_error_log

# Windows
# Check C:\xampp\php\logs\php_error_log
```

### Issue 8: "404 Not Found" on All Pages

**Problem**: Server document root incorrect.

**Solution**: Ensure you're using the `-t public/` flag:

```bash
/opt/lampp/bin/php -S 127.0.0.1:8000 -t public/
#                                    ^^^^^^^^^^^
# This is required!
```

### Issue 9: Orders Not Showing in Profile

**Problem**: User not logged in or no orders exist.

**Solution**:

1. Ensure you're logged in (not just registered)
2. Place a test order through the checkout process
3. Check orders in database:
   ```bash
   /opt/lampp/bin/mysql -u root -e "USE local_business_db; SELECT * FROM orders;"
   ```
4. Clear browser cache (Ctrl+Shift+Delete)
5. Hard refresh (Ctrl+F5 or Cmd+Shift+R)

## 👨‍💻 Development

### Adding New Products (via SQL)

```sql
INSERT INTO products (name, description, price, category, stock, image_url, created_at)
VALUES (
  'New Product Name',
  'Detailed product description here',
  29.99,
  'Category Name',
  50,
  '/images/new-product.jpg',
  NOW()
);
```

### Creating Additional Admin Users

```bash
# Generate password hash
PASSWORD_HASH=$(/opt/lampp/bin/php -r "echo password_hash('newpassword', PASSWORD_DEFAULT);")

# Insert new admin user
/opt/lampp/bin/mysql -u root -e "USE local_business_db; INSERT INTO users (email, name, password, is_admin, created_at) VALUES ('newadmin@example.com', 'New Admin', '$PASSWORD_HASH', 1, NOW());"
```

### Customizing Styles

Edit **`public/css/styles.css`**:

- **Primary Colors**: Search for `#667eea` and `#764ba2` (main gradient)
- **Secondary Colors**: `#ffecd2` and `#fcb69f` (banner gradient)
- **Fonts**: Defined in `body` selector
- **Responsive Breakpoints**:
  - Mobile: up to 600px
  - Tablet: 600px - 900px
  - Desktop: 900px+

### Database Schema

The database includes these main tables:

| Table         | Purpose                                   |
| ------------- | ----------------------------------------- |
| `users`       | Customer and admin accounts               |
| `products`    | Product catalog                           |
| `orders`      | Customer orders                           |
| `order_items` | Items in each order                       |
| `cart`        | Shopping cart (session-based alternative) |

### Core Functions (`src/ecommerce.php`)

| Function                      | Description                       |
| ----------------------------- | --------------------------------- |
| `sanitize($input)`            | Cleans user input                 |
| `isLoggedIn()`                | Checks if user is authenticated   |
| `currentUser($pdo)`           | Returns current user data         |
| `requireAdmin()`              | Restricts access to admin pages   |
| `getProducts($pdo, $filters)` | Retrieves products with filtering |
| `getProductById($pdo, $id)`   | Gets single product               |
| `cartAdd($id, $qty)`          | Adds item to cart                 |
| `cartUpdate($id, $qty)`       | Updates cart item quantity        |
| `cartRemove($id)`             | Removes item from cart            |
| `cartItems($pdo)`             | Gets all cart items with details  |
| `cartTotal($pdo)`             | Calculates cart total             |

## 🔒 Security Considerations

### For Production Deployment

1. **Change Default Passwords**

   ```bash
   # Update admin password immediately
   # Use strong passwords with uppercase, lowercase, numbers, symbols
   ```

2. **Secure Database**

   - Set MySQL root password
   - Create dedicated database user with limited privileges:
     ```sql
     CREATE USER 'ecommerce_user'@'localhost' IDENTIFIED BY 'strong_password';
     GRANT SELECT, INSERT, UPDATE, DELETE ON local_business_db.* TO 'ecommerce_user'@'localhost';
     FLUSH PRIVILEGES;
     ```
   - Update `src/config.php` with new credentials

3. **Enable HTTPS**

   - Obtain SSL/TLS certificate
   - Force HTTPS redirects
   - Update URLs in configuration

4. **Environment Variables**

   - Move sensitive config to `.env` file
   - Use libraries like `vlucas/phpdotenv`
   - Add `.env` to `.gitignore`

5. **File Permissions**

   ```bash
   # Linux production settings
   chmod 755 public/
   chmod 644 public/*.php
   chmod 755 public/images/
   chown -R www-data:www-data /path/to/project
   ```

6. **Hide Errors in Production**

   ```php
   // In production, disable error display
   error_reporting(0);
   ini_set('display_errors', 0);
   // Log errors instead
   ini_set('log_errors', 1);
   ini_set('error_log', '/path/to/error.log');
   ```

7. **Input Validation**

   - Already implemented via `sanitize()` function
   - Additional validation for email, phone numbers
   - Server-side validation for all inputs

8. **SQL Injection Protection**

   - ✅ Already using prepared statements with PDO
   - Never concatenate user input in SQL queries

9. **CSRF Protection**

   - Implement CSRF tokens for forms
   - Validate tokens on submission

10. **Rate Limiting**
    - Implement login attempt limiting
    - Add CAPTCHA for registration/login

## 💾 Backup

### Database Backup

```bash
# Create backup with timestamp
# Linux/macOS
/opt/lampp/bin/mysqldump -u root local_business_db > backup_$(date +%Y%m%d_%H%M%S).sql

# Windows
C:\xampp\mysql\bin\mysqldump -u root local_business_db > backup_%date:~-4,4%%date:~-10,2%%date:~-7,2%.sql

# Compress backup
gzip backup_20241109_143000.sql
```

### Restore Database

```bash
# Linux/macOS
/opt/lampp/bin/mysql -u root local_business_db < backup_20241109_143000.sql

# Windows
C:\xampp\mysql\bin\mysql -u root local_business_db < backup_20241109_143000.sql
```

### Full Project Backup

```bash
# Create tarball (Linux/macOS)
tar -czf marangu-project-backup-$(date +%Y%m%d).tar.gz ~/Projects/marangu-project

# Or use git
cd ~/Projects/marangu-project
git add .
git commit -m "Backup on $(date +%Y-%m-%d)"
git push origin main
```

### Automated Backup Script

Create `backup.sh`:

```bash
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/path/to/backups"
PROJECT_DIR="/path/to/marangu-project"

# Backup database
/opt/lampp/bin/mysqldump -u root local_business_db > "$BACKUP_DIR/db_$DATE.sql"

# Backup files
tar -czf "$BACKUP_DIR/files_$DATE.tar.gz" "$PROJECT_DIR"

# Delete backups older than 30 days
find "$BACKUP_DIR" -name "*.sql" -mtime +30 -delete
find "$BACKUP_DIR" -name "*.tar.gz" -mtime +30 -delete

echo "Backup completed: $DATE"
```

Make executable and add to cron:

```bash
chmod +x backup.sh
# Run daily at 2 AM
crontab -e
# Add: 0 2 * * * /path/to/backup.sh
```

## 🧪 Testing

### Test Files Included

The project includes test scripts for debugging:

```bash
# Test database connection
curl http://127.0.0.1:8000/test_admin.php

# Test order retrieval
curl http://127.0.0.1:8000/test_orders.php

# Test profile orders (simulated login)
curl http://127.0.0.1:8000/test_profile_orders.php
```

**⚠️ Important**: Delete test files before production deployment:

```bash
rm public/test_*.php
```

### Manual Testing Checklist

- [ ] Homepage loads and displays products
- [ ] Search functionality works
- [ ] Category filters work
- [ ] Product detail page displays correctly
- [ ] Add to cart works
- [ ] Cart updates and calculations are correct
- [ ] Checkout process completes successfully
- [ ] Order confirmation displays
- [ ] Registration creates new user
- [ ] Login works with correct credentials
- [ ] Profile displays user info and orders
- [ ] Admin login works
- [ ] Admin dashboard shows statistics
- [ ] Product CRUD operations work
- [ ] Order status updates work
- [ ] Responsive design works on mobile
- [ ] Images load correctly

## 📝 API Endpoints Summary

### Customer Endpoints

| URL                 | Method   | Purpose               |
| ------------------- | -------- | --------------------- |
| `/` or `/index.php` | GET      | Homepage              |
| `/shop.php`         | GET      | Product listing       |
| `/product.php?id=X` | GET      | Product details       |
| `/cart.php`         | GET/POST | View/manage cart      |
| `/checkout.php`     | GET/POST | Checkout process      |
| `/login.php`        | GET/POST | Customer login        |
| `/register.php`     | GET/POST | User registration     |
| `/profile.php`      | GET      | User profile & orders |
| `/logout.php`       | GET      | Logout                |

### Admin Endpoints

| URL                       | Method   | Purpose              |
| ------------------------- | -------- | -------------------- |
| `/admin/login.php`        | GET/POST | Admin authentication |
| `/admin/dashboard.php`    | GET      | Admin overview       |
| `/admin/products.php`     | GET      | Product list         |
| `/admin/product_form.php` | GET/POST | Add/Edit product     |
| `/admin/orders.php`       | GET/POST | Order management     |

## 🤝 Contributing

Contributions are welcome! If you'd like to contribute:

1. **Fork the repository**
2. **Create a feature branch**
   ```bash
   git checkout -b feature/AmazingFeature
   ```
3. **Commit your changes**
   ```bash
   git commit -m 'Add some AmazingFeature'
   ```
4. **Push to the branch**
   ```bash
   git push origin feature/AmazingFeature
   ```
5. **Open a Pull Request**

### Coding Standards

- Use 2 spaces for indentation (PHP, HTML, CSS, JS)
- Follow PSR-12 coding standard for PHP
- Comment complex logic
- Use meaningful variable and function names
- Test changes before submitting PR

## 📞 Support

### Getting Help

If you encounter issues:

1. **Check Common Issues section** above
2. **Search existing GitHub Issues**
3. **Check XAMPP/PHP logs** for error messages
4. **Create detailed bug report** with:
   - Operating system and version
   - PHP version (`php -v`)
   - MySQL version
   - Exact error messages
   - Steps to reproduce

### Resources

- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [XAMPP Documentation](https://www.apachefriends.org/documentation.html)
- [PDO Tutorial](https://www.php.net/manual/en/book.pdo.php)

## 📄 License

This project is open source and available under the MIT License. You are free to use, modify, and distribute this software for personal or commercial purposes.

## 👏 Acknowledgments

- Built with vanilla PHP, MySQL, HTML, CSS, and JavaScript
- Responsive design inspired by modern e-commerce platforms
- Password hashing using PHP's bcrypt implementation (password_hash/password_verify)
- Session-based authentication for simplicity
- No external frameworks or dependencies required

## 📊 Project Statistics

- **Total Files**: ~30
- **Lines of Code**: ~3,000+
- **Database Tables**: 5 (users, products, orders, order_items, cart)
- **Pages**: 15+ (customer + admin)
- **Features**: 20+

---

## 🚀 Quick Start Summary

```bash
# 1. Start MySQL
sudo /opt/lampp/lampp startmysql

# 2. Create & import database
/opt/lampp/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS local_business_db;"
/opt/lampp/bin/mysql -u root local_business_db < db/schema.sql

# 3. Start PHP server
/opt/lampp/bin/php -S 127.0.0.1:8000 -t public/

# 4. Open browser
# Visit: http://127.0.0.1:8000/
# Admin: http://127.0.0.1:8000/admin/login.php (admin@example.com / admin123)
```

---

**Happy Coding! 🎉**

Made with ❤️ using PHP, MySQL, HTML, CSS, and JavaScript

For questions or support, please open an issue on GitHub.

---

_Last Updated: November 9, 2025_
