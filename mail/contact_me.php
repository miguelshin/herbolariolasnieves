<?php
// Validar que la petición sea POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método no permitido");
}

// Recoger y limpiar datos (PHP 8.x prefiere filter_input)
$name    = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
$email   = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone   = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
$message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS));

// Verificación estricta
if (!$name || !$email || !$phone || !$message) {
    http_response_code(400); // Bad Request es más preciso que 500
    exit("Datos de formulario inválidos.");
}

$to      = "info@herbolariolasnieves.es";
$subject = "Solicitud de contacto de: $name";

// Construcción del cuerpo con sintaxis heredoc (más limpio)
$body = <<<EOT
Has recibido un mensaje desde la web de Herbolario las Nieves.

Detalles del contacto:
----------------------------------
Nombre:   $name
E-mail:   $email
Teléfono: $phone
Mensaje:
$message
----------------------------------
EOT;

// Cabeceras mejoradas para evitar SPAM
$headers = [
    'From' => 'Herbolario Las Nieves <noreply@herbolariolasnieves.es>',
    'Reply-To' => $email,
    'Content-Type' => 'text/plain; charset=UTF-8',
    'X-Mailer' => 'PHP/' . phpversion()
];

// En PHP 8, mail() acepta un array para las cabeceras (más seguro)
if (mail($to, $subject, $body, $headers)) {
    http_response_code(200);
} else {
    http_response_code(500);
}
?>