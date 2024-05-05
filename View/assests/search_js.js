function search(table) {

    var a = document.getElementById('search').value;
    jQuery.ajax({
        type: 'POST',
        url: '../mycss/assets/action.php',
        data: {
            methodName: 'search',
            search: a,
            table: table
        },
        success: function(res) {
            if(table == 1){
                document.getElementById('CategoryTable').innerHTML = res;
            }
            else if(table == 2) {
                console.log(res);
                document.getElementById('venTable').innerHTML = res;
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error: ' + textStatus, errorThrown); // Handle any errors
        }

    });
}

