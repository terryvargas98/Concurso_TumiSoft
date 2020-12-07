function Calculate_Suma(arr, s) {
    let acumulate = 0;
    let acumulate_2 = 0;
    let result = false;
    for (let i = 0; i < arr.length; i++) {
        acumulate_2 = arr[i]; //reinicio el valor del acumulado_2 a la posicion del arr[i]

        if (arr[i] == s) { // si el elemento se encuentra sin sumar sus partes entonces el resultado es true
            result = true;
            break;
        }
        for (let j = i + 1; j < arr.length; j++) {

            acumulate = arr[i] + arr[j]; // acumulado para suma la posicion  i=0 y j=i+1 asi sucesivamente 
            acumulate_2 += acumulate_2[j]; // acumulado que me indica si la suma de todos sus partes da el valor deseado
            if (acumulate == s) {
                result = true;
                break;
            }
            if (acumulate_2 == s) {
                result = true;
                break;
            }
        }


    }
    console.log(result); //Si el resultado es true entonces la respuesta es "Si" , si es false "No" se obtuvo la suma

}
Calculate_Suma([3, 2, 0, 7, -1], 9) //variable de entrada;