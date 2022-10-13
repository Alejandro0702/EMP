$(document).ready( function () {
    $('#tabla-pz').DataTable({
        language: {
            lengthMenu: 'Mostrando _MENU_ registros por página',
            zeroRecords: 'Sin registros encontrados - perdón',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'Sin registros disponibles',
            infoFiltered: '(Buscado entre _MAX_ registros)',
        },
    });
    
    //Tabla seleccionar trabajo
    $('#tabla_trab tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    });
    $('#tabla_trab').DataTable({
        initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;

                    $('input', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
        },

        language: {
            lengthMenu: 'Mostrando _MENU_ registros por página',
            zeroRecords: 'Sin registros encontrados - perdón',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'Sin registros disponibles',
            infoFiltered: '(Buscado entre _MAX_ registros)',
        },
        lengthMenu: [
            [5],
            [5],
        ],
    });//DataTable                
    $("#tabla_trab tbody").on('click', 'tr',function(){
        $(this).addClass('selected').siblings().removeClass('selected');

        let x = $("#tabla_trab tr.selected td:first-child").html();
        $('#idJob').val(x);
    });
    var tableAnadir = $('#tabla-pz-anadir').DataTable({
        paging: false,
        ordering: true,
        info: false
    });
    $("#tabla-pz-anadir tbody").on('click', 'tr',function(){
        $(this).toggleClass('selected');
    });
    $('#quitar').click(function () {
        tableAnadir.row('.selected').remove().draw(false);
    });
    
    $('#tabla_det thead th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    });
    $("#tabla_det tbody").on('click', 'tr',function(){
        $(this).addClass('selected').siblings().removeClass('selected');
    });
    $('#tabla_det').DataTable({
        initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;
                    $('input', this.header()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
        },
        ordering: false,
        language: {
            lengthMenu: 'Mostrando _MENU_ registros por página',
            zeroRecords: 'Sin registros encontrados - perdón',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'Sin registros disponibles',
            infoFiltered: '(Buscado entre _MAX_ registros)',
        }
    });

    
});//Document Ready