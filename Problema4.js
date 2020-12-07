function Cantidad_diferidos(num1, num2) {
    let bin_num1 = [...num1.toString(2)];
    let bin_num2 = [...num2.toString(2)];
    let count = 0; //inicio

    let diferencia = Math.abs(bin_num2.length - bin_num1.length); //calculo la diferencia entre los arreglos
    for (let index = 0; index < diferencia; index++) {
        (bin_num1.length > bin_num2.length) ? bin_num2.unshift(0): bin_num1.unshift(0); //relleno con 0 a la izquierda al arreglo menor
    }
    for (let index = 0; index < bin_num1.length; index++) {
        if (bin_num1[index] != bin_num2[index]) {
            count++; //INCREMENTA LA CANTIDAD DE VALORES QUE DIFIEREN
        }

    }
    console.log("Los numeros difieren en " + count);
}

Cantidad_diferidos(5, 1); //VARIABLES DE ENTRADA