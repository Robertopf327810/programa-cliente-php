<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>almacen de productos</title>
</head>
<body>
    <h1>Venta de productos</h1>

    <!-- Formulario para ingresar los datos -->
    <form method="POST" action="">
        <label for="cliente">Cliente:</label><br>
        <input type="text" id="cliente" name="cliente" required><br><br>

        <label for="producto">Producto:</label><br>
        <input type="text" id="producto" name="producto" required><br><br>

        <label for="precio">Precio Unitario:</label><br>
        <input type="number" step="0.01" id="precio" name="precio" required><br><br>

        <label for="cantidad">Cantidad:</label><br>
        <input type="number" id="cantidad" name="cantidad" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtener datos del formulario
        $cliente = htmlspecialchars($_POST['cliente']);
        $producto = htmlspecialchars($_POST['producto']);
        $precio = floatval($_POST['precio']);
        $cantidad = intval($_POST['cantidad']);

        // 1. Calcular subtotal
        $subtotal = $precio * $cantidad;

        // 2. Condición: si el subtotal es mayor a 500, aplica 10% de descuento
        if ($subtotal > 500) {
            $descuento = $subtotal * 0.10;
        } else {
            $descuento = 0;
        }

        // 3. Calcular total
        $total = $subtotal - $descuento;

        // Mostrar resultados
        echo "<h2>Resultado</h2>";
        echo "<p><strong>Cliente:</strong> " . $cliente . "</p>";
        echo "<p><strong>Producto:</strong> " . $producto . "</p>";
        echo "<p><strong>Subtotal:</strong> $" . number_format($subtotal, 2) . "</p>";
        echo "<p><strong>Descuento:</strong> $" . number_format($descuento, 2) . "</p>";
        echo "<p><strong>Total:</strong> $" . number_format($total, 2) . "</p>";
    }
    ?>
</body>
</html>