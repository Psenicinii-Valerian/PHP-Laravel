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
                create();
                options();
                update();
                hide();
                del();
            },
            error: (response) => {
                alert("Something went wrong");
                console.log(response);
            }
        });
    }

    select();

    // Create(insert) in DB method
    function create() {
        // sintaxa de addEventListener() in jquery
        // adaugam un event listener cand apasam pe butonul de create
        $("#create").on("submit", (ev) => {
            // preventDefault() - scoate refresh-ul paginii ce are loc la trimiterea datelor din formular
            ev.preventDefault();

            if (ev.target.name.value.length < 5 || ev.target.price.value.length < 500) {
                alert("All inputs must be filled with proper data");
                return;
            }

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
                    console.log(response);
                }
            });
        });
    }

    // Show all the options(update, hide, delete) method
    function options() {
        // adaugam un event listener cand apasam pe butonul de options
        $(".options").on("click", (ev) => {
            // extragem divul mare (cu denumirea options-forms) la apasarea butonului de clasa 'options'
            let form = ev.target.previousElementSibling;
            console.log(ev.target.previousElementSibling);

            if (form.style.display === "none") {
                form.style.display = "flex";
            } else {
                form.style.display = "none";
            }   
        })
    }

    // Update information in DB method
    function update(){
        // adaugam un event listener cand apasam pe butonul de update
        $(".update").on("submit", (ev) => {
            ev.preventDefault();

            let data = {
                name: ev.target.name.value,
                price: ev.target.price.value,
                id: ev.target.id.value,
                type: "UPDATE"
            }

            $.ajax({
                url: "server.php",
                method: "POST",
                data, // data: data,
                cache: false,
                success: (response) => {
                    console.log(response);
                    // select() - metoda noastra care citeste informatia din baza de data
                    select();
                },
                error: (response) => {
                    alert("Something went wrong");
                    console.log(response);
                }
            });
        });
    }

    // Hide furniture from showing
    function hide() {
        $(".hide").on("submit", (ev) => {
            ev.preventDefault();

            let data = {
                id: ev.target.id.value,
                type: "HIDE"
            }

            $.ajax({
                url: "server.php",
                method: "POST",
                data,
                cache: "false",
                success: (response) => {
                    // response este oricare echo/print_r/die/oricare alta functie ce afiseaza ceva la ecran din php
                    console.log(response);
                    select();
                },
                error: (response) => {
                    console.log(response);
                }
            });
        });
    }

    // Delete function method
    function del() {
        $(".delete").on("submit", (ev) => {
            ev.preventDefault();

            let data = {
                id: ev.target.id.value,
                type: "DELETE"
            }

            $.ajax({
                url: "server.php",
                method: "POST",
                data,
                cache: "false",
                success: (response) => {
                    // response este oricare echo/print_r/die/oricare alta functie ce afiseaza ceva la ecran din php
                    console.log(response);
                    select();
                },
                error: (response) => {
                    console.log(response);
                }
            });
        });
    }
});