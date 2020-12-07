class Cadena {

    construir(cadena) {
        let regex = new RegExp("^[a-zA-Z\u00f1\u00d1]+$"); //validaciones de solo letras tanto  minuscula , mayuscula , ñ y Ñ 
        let array_cadena = [...cadena]; // utilizando desestructuracion 
        for (let index = 0; index < array_cadena.length; index++) {

            if (regex.test(array_cadena[index])) {
                let code = array_cadena[index].charCodeAt(); // obtengo el codigo de ese caracter 
                array_cadena[index] = String.fromCharCode(this.valores(code)); // Lo remplazo por el siguiente o segun la regla de switch
            }

        }
        console.log(array_cadena) //muestreo por consola;
    }
    valores(code) {
        let new_code = code + 1;
        switch (code) {
            case 209: //Ñ
                return new_code = 79 //O;
            case 90: //Z
                return new_code = 65 //A;

            case 122: //z
                return new_code = 97 //a;
            case 241: //ñ
                return new_code = 111 //o
            default:
                break;
        }
        return new_code;
    }
}
let NewCadena = new Cadena();
NewCadena.construir("765BZdñ99") //variable de entrada;