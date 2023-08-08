$(document).ready(() => {
    function read() {
        $.ajax({
            url: "server.php",
            method: "POST",
            data: {
                type: "READ"
            },
            success: (resp) => {
                $("#read").html(resp);
            },
            error: (resp) => {
                alert("Error when reading data");
            }
        });
    }

    read();

    $("#form").on("submit", (ev) => {
        ev.preventDefault();
        let data = {
            name: ev.target.name.value,
            price: ev.target.price.value,
            image: ev.target.image.value,
            type: "CREATE"
        }
        create(data);
    });

    function create(data) {
        $.ajax({
            url: "server.php",
            method: "POST",
            data: data,
            success: (resp) => {
                alert("Data successfully inserted into database");
                read();
            },
            error: (resp) => {
                console.log(resp);
                alert("Error adding data into database");
            }
        });
    }
});