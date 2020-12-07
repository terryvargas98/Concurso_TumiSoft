class Rango {

    construir(array_num) {
        let valor_inicial = array_num[0]; // valor de la primera posicion del array
        let valor_final = array_num[array_num.length - 1] // valor de la ultima posicion
        let indice = 0; //indice que empezara a validar si el primer valor del array + 1 es igual al array[indice +1]
        while (valor_inicial != valor_final) {

            if (!(array_num[indice] + 1 == array_num[indice + 1])) {
                array_num.splice(indice + 1, 0, array_num[indice] + 1);
            }
            indice++; //incremento el indice en 1
            valor_inicial++; // incremento el valor inicial en 1 

        }
        console.log(array_num);
    }
}


let New_Rango = new Rango();
New_Rango.construir([1, 2, 10]);