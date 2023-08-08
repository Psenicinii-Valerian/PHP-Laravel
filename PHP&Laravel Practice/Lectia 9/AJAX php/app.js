$(document).ready(() => {
    // Read from DB method
    function select() {
        $.ajax({
            url: "server.php",
            method: "POST",
            data: {
                type: "READ"
            },
            success: (response) => {
                // $("#read") - sintaxa pentru getElementById(read)
                // .html(value) - sintaxa pentru innerHTML
                $("#read").html(response);
            },
            error: (response) => {
                console.log(response);
            }
        });
    }

    select();

    // Create(insert) in DB method
    // sintaxa de addEventListener() in jquery
    $("#create").on("submit", (ev) => {
        // preventDefault() - scoate refresh-ul paginii ce are loc la trimiterea datelor din formular
        ev.preventDefault();
        let data = {
            name: ev.target.name.value,
            price: ev.target.price.value,
            type: "CREATE"
        }

        // target.reset() - scoate toate valorile din formular (le reseteaza)
        ev.target.reset();

        $.ajax({
            // trimite valorile de mai jos in php (server.php indicat in url)
            url: "server.php",
            method: "POST",
            data: data,
            // in success sau in error(in una din ele) primim valorile returnate din php dupa executarea codului de acolo
            success: (response) => {
                // pentru a vedea chiar valorile din response, dar nu simpu mesajul "Ok" 
                // trebuie sa rulam aplicatia dintr-o fila Incognito, pentru ca aceasta nu salveaza cache-ul
                // spre deosebire de browser-ul simplu
                alert("Data added to database");
                select();
            },
            error: (response) => {
                alert("Something went wrong");
            }
        });
    });
});