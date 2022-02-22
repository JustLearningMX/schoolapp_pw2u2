//Script que recibe un arreglo con los datos de la BD y
//lo imprime en pantalla en una tabla HTML

//Obtenemos la tabla del index.html
const tablaInfoBd = document.querySelector(".tablaInfoBd");

function llenarTabla(arrayDatos) {

    arrayDatos.map((dato, i)=>{
        const fila = document.createElement("tr");
        fila.style.lineHeight = "40px";
        fila.setAttribute("class", "trDatos");

        const id = document.createElement("td");
        const nombre = document.createElement("td");
        const tipo = document.createElement("td");

        //Radiobuttons para que el usuario elija dato a operar
        const radioButton = document.createElement("input");
        radioButton.setAttribute("type", "radio");
        radioButton.setAttribute("class", "radioBtn");
        radioButton.setAttribute("name", "idUser");
        radioButton.setAttribute("value", dato.id);
        radioButton.setAttribute("style", "margin-left: 10px");

        if(i === 0){
            radioButton.setAttribute("checked", "");
        }

        radioButton.setAttribute("id", `${dato.id}`);

        const labelRadioBtn = document.createElement("label");
        labelRadioBtn.setAttribute("for", `${dato.id}`);
        labelRadioBtn.textContent = dato.id;
        labelRadioBtn.style.paddingLeft = "10px";

        id.appendChild(radioButton);
        id.appendChild(labelRadioBtn);
        id.style.textAlign = "left";

        nombre.setAttribute("class", "nombre");
        nombre.textContent = dato.nombre;

        tipo.setAttribute("class", "tipo");
        tipo.textContent = dato.tipo === "P" ? "Profesor" : 
            dato.tipo === "E" ? "Estudiante" : "Asignación no válida";
        
        fila.appendChild(id);
        fila.appendChild(nombre);
        fila.appendChild(tipo);

        tablaInfoBd.appendChild(fila);
        
    });
};