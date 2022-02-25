function verificarTexto() {
    
    //Obtenemos el input de la matrícula
    const inputMatricula = document.querySelector(".matricula");
    console.group(inputMatricula.value);

    if (!inputMatricula.value) {
        // alert("Ingrese una matrícula");
        // window.location.href='./php/evaluar.php' ; // Vuelve a solicitar las evaluaciones
    } else {
        // Recuperamos los nodos de los input de las calificaciones
        const prog = document.querySelector(".programacion");
        const mate = document.querySelector(".matematicas");
        const algo = document.querySelector(".algoritmos");
        const logi = document.querySelector(".logica");
        const so = document.querySelector(".so");
        const bd = document.querySelector(".bd");

        const botonEnviar = document.querySelector(".submittButton");

        // Habilitamos los input de las calificaciones
        prog.toggleAttribute('disabled')
        mate.toggleAttribute("disabled");
        algo.toggleAttribute("disabled");
        logi.toggleAttribute("disabled");
        so.toggleAttribute("disabled");
        bd.toggleAttribute("disabled");
        
        botonEnviar.toggleAttribute("disabled");
        // botonEnviar.classList.toggle("submittButton");
    };
};