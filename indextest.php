<html>
    
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<body>
    
        <div id="test">test</div>
    
    <script>
    $(document).ready(function(){
        $('#test').on('click', function(e){
            $.ajax({
                type: 'POST',
                url: 'index.php',                
                data: {username: "Alexander", password: "1234567890"},
                success: function(received){
                    $("#test").html(received);
                    //just doesnt receive anything yet!
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#test').html(textStatus);
                    alert('Bummer: there was an error!');
                }
            })
        })
    });
    </script>
    

    
    
    
    </body>


</html>