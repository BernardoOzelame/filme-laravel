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