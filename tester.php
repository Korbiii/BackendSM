<html>
    
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<body>
    
    <div id="accountTest">accountTest</div>
    
    <script>
    $(document).ready(function(){
        $('#accountTest').on('click', function(e){
            $.ajax({
                type: 'POST',
                url: 'IndexAccounts.php',                
                data: {username: "Alexander", password: "1234567890", function: "loginAccount"},
                success: function(received){
                    $("#accountTest").html(received);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#accountTest').html(textStatus);
                    alert('Bummer: there was an error!');
                }
            })
        })
    });
    </script>
    
    <div id="newMeeting">newMeeting</div>
    <div id="getMeetings">getMeetings</div>
    
    <script>
    $(document).ready(function(){
       $('#newMeeting').on('click', function(e){
           $.ajax({
               type: 'POST',
               url: 'IndexMeetings.php',
               data: {startTime: '11-07-2016 14:00:00', endTime: '11-07-2016 15:00:00', function: "newMeeting"},
               success: function(received){
                   $('#newMeeting').html(received);                   
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    $('#newMeeting').html(textStatus);
                    alert('Bumm er: there was an error!');
                }
           })
       }) 
    });
        
    $(document).ready(function(){
       $('#getMeetings').on('click', function(e){
           $.ajax({
               type: 'POST',
               url: 'IndexMeetings.php',
               data: {meetingID: 1, function: "getMeeting"},
               success: function(received){
                   $('#getMeetings').html(received);                   
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    $('#getMeetings').html(textStatus);
                    alert('Bummer: there was an error!');
                }
           })
       }) 
    });
    </script>
    
    <div id="getGroups">getGroups</div>
    <div id="newGroup">newGroup</div>
    <div id="getGroupMembers">getGroupMembers</div>
    
    <script>
    $(document).ready(function(){
       $('#getGroups').on('click', function(e){
           $.ajax({
               type: 'POST',
               url: 'IndexGroups.php',
               data: {email: "alexander.reisach@gmail.com", function: "getGroups"},
               success: function(received){
                   $('#getGroups').html(received);                   
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    $('#getGroups').html(textStatus);
                    alert('Bummer: there was an error!');
                }
           })
       }) 
    });
    $(document).ready(function(){
       $('#newGroup').on('click', function(e){
           $.ajax({
               type: 'POST',
               url: 'IndexGroups.php',
               data: {groupName: "bitchen", function: "newGroup"},
               success: function(received){
                   $('#newGroup').html(received);                   
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    $('#newGroup').html(textStatus);
                    alert('Bummer: there was an error!');
                }
           })
       }) 
    });
    $(document).ready(function(){
       $('#getGroupMembers').on('click', function(e){
           $.ajax({
               type: 'POST',
               url: 'IndexGroups.php',
               data: {groupID: 1, function: "getGroupMembers"},
               success: function(received){
                   $('#getGroupMembers').html(received);                   
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    $('#getGroupMembers').html(textStatus);
                    alert('Bummer: there was an error!');
                }
           })
       }) 
    });
    </script>
    
    </body>


</html>