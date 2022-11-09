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


    //Tabla Trab Modificar
    $("#tabla_trab_mod tbody").on('click', 'tr',function(){
        $(this).addClass('selected').siblings().removeClass('selected');

        let x = $("#tabla_trab_mod tr.selected td:first-child").html();
        $('#idJob_').val(x);
    });
    $('#tabla_trab_mod tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    });
    
    $('#tabla_trab_mod').DataTable({
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
        },
        lengthMenu: [
            [5],
            [5],
        ],
    });

    //tabla_rango_trabajo
    $('#tabla_rango_trabajo tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    });
    $('#tabla_rango_trabajo').DataTable({
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
        },
        lengthMenu: [
            [5],
            [5],
        ],
    });
    $("#tabla_rango_trabajo tbody").on('click', 'tr',function(){
        $(this).addClass('selected').siblings().removeClass('selected');

        let x = $("#tabla_rango_trabajo tr.selected td:first-child").html();
        $('#idJob_').val(x);
    });





    //Tabla detalles en modificar
    $('#tabla_det_res thead th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    });
    $("#tabla_det_res tbody").on('click', 'tr',function(){
        $(this).addClass('selected').siblings().removeClass('selected');
        //IDeclarar variables para tomar datos de los input tipo range
        /*let rang_FU = document.getElementById('FU');
        let rang_Q_C = document.getElementById('Q_C');
        let rang_W = document.getElementById('W');
        let rang_CLEAN = document.getElementById('CLEAN');*/
        
        let x = $("#tabla_det_res tr.selected td:first-child").html();
        let idpz = $("#tabla_det_res tr.selected td:nth-child(2)").html();
        let cl = $("#tabla_det_res tr.selected td:nth-child(8)").html();
        let heat = $("#tabla_det_res tr.selected td:nth-child(9)").html();
        let fu = $("#tabla_det_res tr.selected td:nth-child(10)").html().replace('%','');
        let qc = $("#tabla_det_res tr.selected td:nth-child(11)").html().replace('%','');
        let w = $("#tabla_det_res tr.selected td:nth-child(12)").html().replace('%','');
        let clean = $("#tabla_det_res tr.selected td:nth-child(13)").html().replace('%','');


        document.getElementById("FU_SPAN").innerHTML = fu + "%";
        document.getElementById("Q_C_SPAN").innerHTML = qc + "%";
        document.getElementById("W_SPAN").innerHTML = w + "%";
        document.getElementById("CLEAN_SPAN").innerHTML = clean + "%";


        $('#idJob_').val(x);
        $('#idPz_').val(idpz);
        $('#CL').val(cl);
        $('#HEAT').val(heat);

        $('#FU').val(fu);
        $('#Q_C').val(qc);
        $('#W').val(w);
        $('#CLEAN').val(clean);
        
    });

    $('#tabla_det_res').DataTable({
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