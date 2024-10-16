# Enunciado 1 de la actividad evaluable UD2

## Sistema de Gestión de Inventario y Descuentos

Crea un programa en PHP que calcule el costo total de una compra en una tienda teniendo en cuenta lo siguiente:

1. **Datos de entrada**:
   - El nombre del cliente.
   - El número de productos diferentes que comprará (mínimo 1, máximo 5).
   - Por cada producto: 
     - El nombre del producto.
     - La cantidad comprada de ese producto.
     - El precio por unidad del producto.
   
2. **Condiciones**:
   - Si el costo total de la compra supera los 100 €, se aplica un descuento del 10%.
   - Si el costo total supera los 200 €, se aplica un descuento del 15%.
   - Si el cliente ha comprado más de 10 unidades de un mismo producto, recibe un 5% de descuento adicional en ese producto específico.
   - Si el cliente compra 5 productos diferentes, recibe un descuento extra del 5% sobre el total de la compra.
   - Se deben validar las cantidades y precios ingresados para asegurarse de que sean valores positivos.

3. **Salida**:
   - Mostrar el nombre del cliente, un resumen de los productos comprados con sus costos parciales y descuentos aplicados, el total bruto y el total final después de los descuentos.

---

## Ejemplo de salida del programa

```
Introduce el nombre del cliente: Carlos Gómez
¿Cuántos productos diferentes vas a comprar? (mínimo 1, máximo 5): 3

Introduce el nombre del producto 1: Camiseta
Introduce la cantidad comprada de Camiseta: 12
Introduce el precio por unidad de Camiseta: 15.50

Introduce el nombre del producto 2: Pantalón
Introduce la cantidad comprada de Pantalón: 5
Introduce el precio por unidad de Pantalón: 30

Introduce el nombre del producto 3: Zapatillas
Introduce la cantidad comprada de Zapatillas: 2
Introduce el precio por unidad de Zapatillas: 50

Resumen de la compra para Carlos Gómez:
Producto: Camiseta, Cantidad: 12, Costo original: 186.00€, Descuento por cantidad: -9.30€, Costo final: 176.70€
Producto: Pantalón, Cantidad: 5, Costo: 150.00€
Producto: Zapatillas, Cantidad: 2, Costo: 100.00€
Costo total bruto: 426.70€
Descuento aplicado por superar los 200€: -64.01€
Costo total después de descuentos: 362.69€
```