$(document).ready(function () {
    $('#tab_votos').DataTable({
        pagingType: 'full',
        "language": {
            "search": "Buscar:",
            "info": "_START_ à _END_ de _TOTAL_",
            "lengthMenu":" Mostrar _MENU_",
            "infoEmpty":"0 à 0 de 0",
            "infoFiltered":"(filtrado de _MAX_ total)",
            "zeroRecords":"Nenhum registro encontrado",
            "thousands":".",
            "paginate": {
                "first": '«',
                "previous": '‹',
                "next": '›',
                "last": '»'
            },
            "aria": {
                "paginate": {
                    "first": 'Prim.',
                    "previous": 'Ante.',
                    "next": 'Próx.',
                    "last": 'Ulti.'
                }
            }
        }
    });
});