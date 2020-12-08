function cantindad_numeros_espejos(rango1, rango2) {
    let array = [rango1, rango2]; //rango1 primer valor , rango2 segundo valor de un rango de numeros 
    let indice = 0; // indice inicializado en 0
    let numeros_reflejados = 0; // cantidad de numeros reflejados

    while (rango1 != rango2 - 1) {
        array.splice(indice + 1, 0, array[indice] + 1); // agrego los valores faltantes dentro del rango de valores en el mismo array  
        rango1++;
        indice++;
    }
    let i = 0;
    while (i < array.length) {

        if (reverseNumber(array[i])) { //mando los valores del arreglo como parametro Ejemplo: [10,11,12,13]
            numeros_reflejados++;
        }

        i++;
    }
    console.log("Numero de reflejados es igual " + numeros_reflejados);
}

function reverseNumber(num) {
    let contador = 0; //contador de reflejados normales 8 ,1
    let reflejado = false; // si es reflejado o no 
    let cont2 = 0; //contador de numeros 2 en el num
    let cont5 = 0; //contador de numeros 5 en el num
    for (let numero of num.toString()) {
        contador += EqualReflect(numero); //metodo que aumenta si un numero es reflejado
        if (numero == "2") {
            cont2++;
        }
        if (numero == "5") {
            cont5++;
        }
    }
    if (cont2 == cont5) { // si son iguales entonces se reflejan

        contador += cont5 + cont2;

    }
    if (contador == num.toString().length) { // si el contador general es igual a la cantidad de elementos del num.lengt entonces ese numero es reflejado
        console.log("es un numero reflejado " + num);
        reflejado = true;
    }

    return reflejado;
}

function EqualReflect(char) {
    let cont = 0;
    switch (char) {
        case '1':
            cont++;
            break;
        case '8':
            cont++;
            break;
        default:
            break;
    }

    return cont;
}

cantindad_numeros_espejos(1, 100); // variables de entrada