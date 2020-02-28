<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(main);

        function main() {
            $('#zip').change(listBusinesses);
            $('#business').change(listProducts);

        }

        function listBusinesses() {
            $("#business").empty();
            $.ajax({
                data: {},
                type: "GET",
                dataType: "json",
                url: "http://127.0.0.1:8000/api/businesses/"+$('#zip').val(),
            })
                .done(function (request, textStatus, jqXHR) {
                    request.data.businesses.forEach(business => {
                         $("<option value="+business.id+">"+business.name+"</option>").appendTo($("#business"));
                    });
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    if (console && console.log) {
                        console.log("La solicitud a fallado: " + textStatus);
                    }
                });
        }

        function listProducts() {
            $("#products").empty();
            $.ajax({
                data: {},
                type: "GET",
                dataType: "json",
                url: "http://127.0.0.1:8000/api/businesses/"+$('#business').val()+"/products",
            })
                .done(function (request, textStatus, jqXHR) {
                    console.log(request)
                    request.data.products.forEach(product => {
                         $("<div>"+JSON.stringify(product)+"</div>").appendTo($("#products"));
                    });
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    if (console && console.log) {
                        console.log("La solicitud a fallado: " + textStatus);
                    }
                });
        }

    </script>
</head>

<body>
    <label for="zip">ZIP CODE:</label>
    <input type="number" id="zip"><br>
    <label for="business">BUSINESSES:</label>
    <select id="business"></select>
    <h3>PRODUCTS:</h3>
    <div id="products"></div>
</body>

</html>
