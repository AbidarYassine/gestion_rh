$(document).ready(function() {
    nbrEnfant();
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });
    $("#dropdownMenu1").click(function() {
        $("#util").toggle();
    });
    $("#situationFami").change(function() {
        nbrEnfant();
    });
    $("#enregistre").click(function() {
        $("#spinerEnregister").show();
        $("#enregistre").text('Enregistration  ...');


    });
    $('#tableEmployer').DataTable({
        "order": [
            [3, "desc"]
        ],
        "paging": true,
        "oLanguage": {
            "sLengthMenu": "Afficher _MENU_",
            "sSearch": "Rechercher",
            "sLenghtMenu": "Afficher _MENU_",
            "sZeroRecords": "Aucun employé Trouvez!",
            "sInfo": "Afficher _START_ à _END_ de _TOTAL_ employés",
            "sInfoFiltered": "(filtré à partir de _MAX_ employés)",
            "oPaginate": {
                "sPrevious": "Précédent",
                "sNext": "Suivant"
            }
        }
    });

    //
    $('.dataTables_length').addClass('bs-select');
    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Vous Voulez Vraiment supprimer l\'employer ?',
            text: "La suppression est reversible",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'supprimer'
        }).then((result) => {
            if (result.value) {
                window.location.href = url;
                Swal.fire(
                    'Suppression!',
                    'L\'employer et supprimer',
                    'success'
                )
            }
        })
    });






});

function nbrEnfant() {

    if ($("#situationFami").val() == 'célibataire') {
        $("#nbrEnfant").val(0);
        $("#nbrEnfant").prop("disabled", true);
    } else {
        $("#nbrEnfant").prop("disabled", false);
    }
}