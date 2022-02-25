//Función que enlaza consultar.php
//ya sea Alumnos o Profesores
function controladorConsultar(optMenu) {
    
    //Redireccionamos hacia el CRUD
    window.location.href=`./php/consultar.php?opcion=${optMenu}`;
}