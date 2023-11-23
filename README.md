<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>First Fashion - Laravel E-commerce Website</title>
    <style>
        /* CSS Styles Here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        code {
            background-color: #f4f4f4;
            padding: 2px 5px;
            border-radius: 3px;
        }

        pre {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .code-block {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>First Fashion - Laravel E-commerce Website</h1>

        <h2>Overview:</h2>
        <p>Welcome to First Fashion, an innovative e-commerce web application crafted using Laravel, aiming to deliver a seamless shopping experience for fashion enthusiasts. Below, you'll find detailed insights into the features, technologies utilized, and guidance on setting up the project locally.</p>

        <h2>Features:</h2>
        <ul>
            <li>User Authentication: Secure registration and login functionalities.</li>
            <li>Product Browsing and Filtering: Browse and filter clothing products by categories, brands, and prices.</li>
            <li>Shopping Cart: Add items to cart and proceed with checkout seamlessly.</li>
            <li>Order Management: Confirmation, email notifications, and detailed order history.</li>
            <li>Admin Panel: Administrative access to manage users, products, and orders.</li>
        </ul>

        <h2>Technologies Used:</h2>
        <ul>
            <li>Laravel Framework: Core backend development with robust features for routing, authentication, and database management.</li>
            <li>JavaScript Libraries:
                <ul>
                    <li>Axios: For asynchronous HTTP requests.</li>
                    <li>jQuery: Simplifying DOM manipulation and event handling.</li>
                </ul>
            </li>
        </ul>

        <h2>Installation Guide:</h2>
        <ol>
            <li>Clone the repository to your local machine.</li>
            <li>Ensure PHP and Composer are installed.</li>
            <li>Run <code>composer install</code> to install project dependencies.</li>
            <li>Configure the database settings in the <code>.env</code> file.</li>
            <li>Execute <code>php artisan migrate</code> to create necessary tables.</li>
            <li>Use <code>php artisan serve</code> to launch the local development server.</li>
        </ol>

        <h2>Usage:</h2>
        <p>Access the application by visiting <a href="http://localhost:8000">http://localhost:8000</a> in your web browser.</p>
        <ol>
            <li>Register for a new account or log in using existing credentials.</li>
            <li>Explore products, add to cart, and proceed to checkout.</li>
            <li>Admins can access the panel via <code>/admin</code> to manage users, products, and orders.</li>
        </ol>

        <h2>Contributors:</h2>
        <ul>
            <li>[Your Name] - Project Lead & Developer</li>
            <li>[Contributor Name] - Frontend Developer</li>
            <li>[Contributor Name] - Backend Developer</li>
        </ul>

        <h2>License:</h2>
        <p>This project is licensed under the [License Name] License. Refer to the <a href="LICENSE">LICENSE</a> file for details.</p>
    </div>
</body>

</html>
