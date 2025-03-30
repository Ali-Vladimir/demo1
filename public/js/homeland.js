$(document).ready(function() {
    // Manejo del evento de enviar el mensaje de contacto
    $("#btnSendContactAgentMessage").click((event) => {
        event.preventDefault();
        //alert("Sending information...");
        const formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            message: $("#message").val(),
            property_id: $("#property_id").val()
        };
        $.ajax({
            url: "/api/contact_agent",
            type: "POST",
            data: formData,
            success: (response) => {
                $("#formContactAgent").trigger("reset");
                $("#successAlert").removeClass("d-none");
                setTimeout(() => {
                    $("#successAlert").addClass("d-none");
                }, 3000);
                //alert("Message sent successfully");
            },
            error: (errors) => {
                console.log(errors);
            }
        });
    });

    // Inicialización de DataTable para #tableProperties1
    let table = new DataTable("#tableProperties1");

    // Inicialización de DataTable para #tableProperties2 con ajax
    new DataTable("#tableProperties2", {
        ajax: "/ruta/a/los/datos"  // Debes reemplazar esto con la URL correcta o la configuración que desees
    });

    // Manejo del evento para el botón btnGetEmployeesUsingFetch
    $("#btnGetEmployeesUsingFetch").click((event) => {
        /*fetch("http://localhost:3000/api/v1/employees/")
        .then(response => response.json())
        .then(results => {
            console.table(results)
        }).catch(error=>console.error(error));*/
        new DataTable('#tblEmployees', {
            ajas: 'http://127.0.0.1:3000/api/v1/employees/',
            columns: [
                { data: 'emp_number' },
                { data: 'first_name' + ' ' + 'last_name' },
                { data: 'email' },
                { data: 'gender' },
                { data: 'salary' },
                { data: 'department' }
            ]
        });
        $('#mySelect2').on('select2:select',function(e){
            let data = e.params.data;
            console.log(data.text);
            // Aquí podrías hacer algo con el valor seleccionado
        })
    });
});
