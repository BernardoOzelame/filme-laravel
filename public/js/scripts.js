function toggleMenu() {
    const menu = document.querySelector('.menu');
    menu.classList.toggle('active');
}

document.addEventListener('click', function (event) {
    const menu = document.querySelector('.menu');
    const isClickInsideMenu = menu.contains(event.target);
    if (!isClickInsideMenu && menu.classList.contains('active')) {
        menu.classList.remove('active');
    }
});

document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const id = this.getAttribute('data-id');
        Swal.fire({
            title: 'Tem certeza?',
            text: "Você não poderá reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, apagar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    });
});

const carouselElement = document.querySelector('#carouselExampleCaptions');
const nameElement = document.querySelector('#carousel-name');

function updateCaption() {
    const activeItem = carouselElement.querySelector('.carousel-item.active');
    if (activeItem) {
        const name = activeItem.getAttribute('data-name');
        nameElement.innerHTML = "<b>Filme: </b>" + name;
    }
}
updateCaption();
carouselElement.addEventListener('slid.bs.carousel', updateCaption);
const carouselItems = document.querySelectorAll('.carousel-item');
carouselItems.forEach(item => {
    item.addEventListener('click', function () {
        const nome = item.getAttribute('data-name');
        const sinopse = item.getAttribute('data-sinopse');
        const trailer = item.getAttribute('data-trailer');
        const categoria = item.getAttribute('data-categoria');
        const ano = item.getAttribute('data-ano');
        const modalTitle = document.getElementById('movieModalLabel');
        const modalSinopse = document.getElementById('modal-sinopse');
        const modalTrailer = document.getElementById('modal-trailer');
        const modalCategoria = document.getElementById('modal-categoria');
        const modalAno = document.getElementById('modal-ano');
        modalTitle.innerHTML = nome;
        modalSinopse.innerHTML = "<b>Sinopse: </b>" + sinopse;
        modalTrailer.href = trailer;
        modalCategoria.innerHTML = "<b>Categoria: </b>" + categoria;
        modalAno.innerHTML = "<b>Ano: </b>" + ano;
        const modal = new bootstrap.Modal(document.getElementById('movieModal'));
        modal.show();
    });
});

document.getElementById('logout-link').addEventListener('click', function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Tem certeza?',
        text: "Você quer sair do sistema?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, sair',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit(); 
        }
    });
});