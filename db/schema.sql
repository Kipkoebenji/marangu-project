-- SQL schema for marangu-project e-commerce

CREATE DATABASE IF NOT EXISTS `local_business_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `local_business_db`;

-- users table (customers + admin)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) DEFAULT NULL,
  is_admin TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- products
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  image VARCHAR(255) DEFAULT NULL,
  price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  category VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- cart (optional - this app uses sessions for cart, but table is provided)
CREATE TABLE IF NOT EXISTS cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT DEFAULT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- orders
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT DEFAULT NULL,
  total_amount DECIMAL(10,2) NOT NULL,
  payment_method VARCHAR(50) NOT NULL,
  status VARCHAR(50) NOT NULL DEFAULT 'pending',
  name VARCHAR(150) DEFAULT NULL,
  email VARCHAR(150) DEFAULT NULL,
  address TEXT DEFAULT NULL,
  phone VARCHAR(50) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- order_items
CREATE TABLE IF NOT EXISTS order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- sample admin user (password: admin123) - change in production
INSERT IGNORE INTO users (id, name, email, password, is_admin)
VALUES (1, 'Site Admin', 'admin@example.com', '$2y$10$KIX1Z1z1C1Qm0E2qZp8g.uQ8w1y1q8q6x0Y/3l2F2/8c7D1w4K/6', 1);
-- the password above is bcrypt('admin123')

-- sample products
INSERT IGNORE INTO products (name, description, image, price, category)
VALUES
('Handmade Coffee Mug', 'Ceramic mug, 350ml. Dishwasher safe.', 'placeholder.svg', 12.50, 'Kitchen'),
('Organic Honey Jar', 'Local raw honey, 250g.', 'placeholder.svg', 9.99, 'Grocery'),
('Cotton Tote Bag', 'Durable tote bag with logo.', 'placeholder.svg', 15.00, 'Accessories');
