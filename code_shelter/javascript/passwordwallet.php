<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 
<style>
   table {
        width: 100%;
        border-collapse: collapse;
    }
   
   tr {
        border: 1px solid #ccc;
        border-collapse: collapse;
    }

    td {
        padding: 5px;
        border: 1px solid #ccc;
        
     }
</style>

    <title>password wallet</title>
</head>
<body>
    <div>
        <h1>Password Wallet</h1>
    </div>
    <script>
        jQuery(document).ready(function() {
            const passwords = [
                { site: "example.com", username: "user1", password: "pass1" },
                { site: "testsite.com", username: "user2", password: "pass2" },
                { site: "mywebsite.com", username: "user3", password: "pass3" }
            ];

            passwords.forEach(entry => {
                const entryDiv = $('<table></table>').addClass('password-entry');
                entryDiv.
                append(`<tr><td>${entry.site}</td><td>ID:${entry.username}</td><td>비번:${entry.password}</td></tr>`);
                
                $('body').append(entryDiv);
            });
        });
    </script>
</body>
</html>