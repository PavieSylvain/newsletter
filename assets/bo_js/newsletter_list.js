$(document).ready( function () {
    $('#newsletters').DataTable({ 
        lengthMenu: [ [10, 25, 50], [10, 25, 50] ],
        scrollY: 800,
        pageLength: 10,
    });
});
