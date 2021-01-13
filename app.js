const express = require('express');
const app = express();
const cors = require('cors');
// morgan is a logger middleware.
const morgan = require('morgan');
const mysql = require('mysql');
// get the port from the environment variable called PORT or set it to 3000 if the variable is not set.
const PORT = process.env.PORT || 3000;
const router = express.Router();
// limit the amount of connection to the DB and the info for the DB.
const pool = mysql.createPool({
    connectionLimit: 10,
    host: 'localhost',
    user: 'root',
    database: 'fancyclothes'
});

function getConnection() {
    return pool;
}

app.use(cors());
app.use(morgan('short'));

// get all the products and return a json.
app.get('/api/products', (req, res) => {
    const connection = getConnection();
    const sql = "SELECT `products`.*, `categories`.`category_name` FROM `products` LEFT JOIN `categories` ON `products`.`product_category` = `categories`.`category_id`;";

    connection.query(sql, (err, rows) => {
        if(err) {
            console.log('Failed to query for products: ' + err);
            res.sendStatus(500);
            return;
        }
        
        // map the data from the DB to more readable output and only the data that the end user needs.
        const products = rows.map((row) => {
            return {
                Product_id: row.product_id,
                Name: row.product_name,
                Desc: row.product_desc,
                Stars: row.product_stars,
                Category: row.category_name,
                Gender: row.product_gender,
                image: row.product_img
            }            
        });

        res.json(products);
    })
});

// get a single product based on what id is provided
app.get('/api/products/:id', (req, res) => {
    const connection = getConnection();
    const productId = req.params.id;
    const sql = "SELECT `products`.*, `categories`.`category_name` FROM `products` LEFT JOIN `categories` ON `products`.`product_category` = `categories`.`category_id` WHERE product_id=?;";

    connection.query(sql, [productId], (err, rows) => {
        if (err) {
            console.log('Failed to query for product: ' + err);
            res.sendStatus(500);
            return;
        };

        const product = rows.map((row) => {
            return {
                Product_id: row.product_id,
                Name: row.product_name,
                Desc: row.product_desc,
                Stars: row.product_stars,
                Category: row.category_name,
                Gender: row.product_gender,
                image: row.product_img
            }            
        });

        res.json(product);
    })
})

// start the server and listen on PORT
app.listen(PORT, () => {
    console.log('Server is up and listening on PORT: ' + PORT);
})