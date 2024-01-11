let image = document.getElementById('perfil');
let file = document.getElementById('imagem');

file.addEventListener('change', () => {

    if(file.files.length <= 0) {
        return;
    }

    let reader = new FileReader();

    reader.onload = () => {
        image.src = reader.result;
    }

    reader.readAsDataURL(file.files[0]);
} )