//Script que recibe un arreglo con los datos de la BD con
//las calificaciones y lo imprime en pantalla en una tabla HTML

//Obtenemos la tabla del consultar.php
const tablaInfoBd = document.querySelector(".tablaInfoBd");

function llenarCalificaciones(arrayDatos) {

    //Obtenemos el query string param
    const queryOpt = {};
    location.search.substr(1).split("&").forEach(function(item) {queryOpt[item.split("=")[0]] = item.split("=")[1]});
    
    arrayDatos.map((dato, i)=>{
        const fila = document.createElement("tr");
        fila.style.lineHeight = "40px";
        fila.setAttribute("class", "trDatos");

        const matricula = document.createElement("td");
        const profesor = document.createElement("td");
        const programacion = document.createElement("td");
        const matematicas = document.createElement("td");
        const algoritmos = document.createElement("td");
        const logica = document.createElement("td");
        const so = document.createElement("td");
        const bd = document.createElement("td");

        //Radiobuttons para que el usuario elija dato a operar
        const radioButton = document.createElement("input");
        radioButton.setAttribute("type", "radio");
        radioButton.setAttribute("class", "radioBtn");
        radioButton.setAttribute("name", "idUser");
        radioButton.setAttribute("value", dato.matricula);
        radioButton.setAttribute("style", "margin-left: 10px");

        if(i === 0){
            radioButton.setAttribute("checked", "");
        }

        radioButton.setAttribute("matricula", `${dato.matricula}`);

        const labelRadioBtn = document.createElement("label");
        labelRadioBtn.setAttribute("for", `${dato.matricula}`);
        labelRadioBtn.textContent = dato.matricula;
        labelRadioBtn.style.paddingLeft = "10px";

        matricula.appendChild(radioButton);
        matricula.appendChild(labelRadioBtn);
        matricula.style.textAlign = "left";

        if (queryOpt.opcion !== "Profesor") {
            profesor.setAttribute("class", "profesor");
            profesor.textContent = dato.profesor;
        }        

        programacion.setAttribute("class", "programacion");
        programacion.textContent = dato.programacion;

        matematicas.setAttribute("class", "matematicas");
        matematicas.textContent = dato.matematicas;

        algoritmos.setAttribute("class", "algoritmos");
        algoritmos.textContent = dato.algoritmos;

        logica.setAttribute("class", "logica");
        logica.textContent = dato.logica;

        so.setAttribute("class", "so");
        so.textContent = dato.so;

        bd.setAttribute("class", "bd");
        bd.textContent = dato.bd;
        
        fila.appendChild(matricula);
        if (queryOpt.opcion !== "Profesor") 
            fila.appendChild(profesor);
        fila.appendChild(programacion);
        fila.appendChild(matematicas);
        fila.appendChild(algoritmos);
        fila.appendChild(logica);
        fila.appendChild(so);
        fila.appendChild(bd);

        tablaInfoBd.appendChild(fila);        
    });
};