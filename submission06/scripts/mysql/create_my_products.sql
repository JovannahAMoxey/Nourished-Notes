CREATE TABLE my_products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(150) NOT NULL,
    product_description TEXT NOT NULL,
    category_id INT NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    inventory_quantity INT NOT NULL DEFAULT 0,
    image_path VARCHAR(255)
);