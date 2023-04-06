
let selectCategoria = document.getElementById('turmas')
let selectSubcategoria = document.getElementById('nomes')

selectCategoria.onchange = () => {
    let selectSubcategoria = document.getElementById('nomes')
    let value = selectCategoria.value;
    fetch('selectsub.php?turma=' + value).then(response => {
        return response.text();
    }).then(bodyContent => {
        selectSubcategoria.innerHTML = bodyContent;
    });
    
}