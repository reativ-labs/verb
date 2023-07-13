# Verb PHP Framework

Verb is a high-performance PHP framework designed to accelerate web development and empower developers with a robust set of tools and features.

## Features

### Efficient Routing

Verb provides a powerful routing system that allows you to easily define clean and flexible routes for your web application.

### Optimized Performance

With its lightweight design and optimized code execution, Verb ensures fast response times and optimal resource utilization.

### Flexible Database Integration *(SOON)*

The framework seamlessly integrates with popular databases, offering efficient query builders and ORM capabilities for database interactions.

### Effortless Templating *(SOON)*

Verb includes a flexible templating engine that simplifies the separation of logic and presentation, enabling clean and maintainable code. 

### Secure Authentication *(SOON)*

Built-in authentication features such as user management, login, and password reset make it easy to implement secure user authentication in your application. 

### Error Handling and Logging

Verb provides comprehensive error handling and logging mechanisms to help you identify and resolve issues quickly.

### Extensible Architecture

The framework follows a modular architecture that allows for easy extension and customization, ensuring scalability as your application grows.

## Getting Started

To get started with Verb, follow these steps:

### Requirements

Ensure that you have PHP (version 8.1 or higher) and a web server installed on your system.

### Installation

Install Verb dependency using composer

```
composer create-project verb/verb
```

### Configuration

To configure Verb, just create an `index.php` file and add the following code:

```php
<?php

use Reativ\Verb\Application;

$app = new Application();

// Register routes
$app->get('/', function () {
    echo 'Hello, World!';
});

// Run the application
$app->run();
```

### Using Verb

To use Verb, just call `run()` method in the app instance. For example:

```php
$app->run();
```
This will start the application and listen on port 8080. Then you can access your application in the browser using the following URL:

```
http://localhost:8080
```

You can create a script in `composer.json` file to start PHP development server adding the following code:

```json
"scripts": {
    "dev": [
        "Composer\\Config::disableProcessTimeout",
        "@php -S localhost:8000 -t public/"
    ]
}
```

After that just run the command:

```bash
composer run dev
```

For detailed documentation, please refer to the [Verb Wiki](https://github.com/reativ-labs/verb/wiki).

## Contributing

Contributions to Verb are welcome! If you encounter any bugs or have suggestions for new features, please open an issue or submit a pull request. Before contributing, please review our [Contribution Guidelines](CONTRIBUTING.md).

## License

Verb is released under the [MIT License](LICENSE). Feel free to use and modify the framework according to your needs.