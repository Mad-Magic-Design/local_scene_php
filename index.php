<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <title>Local Scene</title>
</head>

<body>
    <div class="container">
        <header class='header'>
        <script async data-id="five-server" src="http://localhost:5555/fiveserver.js"></script>
            <button onclick="showEvent('newEventWrapper')" id='newEventButton'>NEW</button>
        </header>
        <div id='newEventWrapper' class='no-show'>
            <div class='event-container'>
                <form class='reddy' action='submit.php' method='POST'>
                    <div class="new-event-form">
                        <label for=' name'>Band or Artist Name</label>
                        <input id='name' name='name' type='text' class='name-input' />
                        <label for='date'> Date</label>
                        <input type='date' id='date' name='date' class='date-input' />
                        <label for='venue'>Venue</label>
                        <input id='venue' name='venue' class='venue-input' />
                        <label for='description'> More Info </label>

                        <input type='submit' name='submit' value='Submit' />
                    </div>
                </form>
            </div>

        </div>
        <div class="calender-wrapper">
            <?php 

    $connection = mysqli_connect('localhost', 'root','','kelowna_localscene');
    $query = "SELECT * FROM events";
    $result = mysqli_query($connection, $query);
    $i =1;

    while($row = mysqli_fetch_assoc($result)){
    $name = $row["name"];
    $date = $row["date"];
    $venue = $row["venue"];
    $details = $row["description"];
    $link = $row['link'];
    echo ("<div class='show-wrapper'>
    <div id='show-container-$i' class='show-container'>
    <h1 class='name-text'>$name</h1>
    <h3 class='venue-text'>@$venue</h3>
    <h4 class='date-text'>$date</h4>
    <p class='hidden-details'>$details</p>
    <a href=$link class='hidden-details'>link</a>
    </div></div> ");
    $i++;
    }
    
   
    
    ?>
        </div>
    </div>

    <script>
    //  document.getElementbyId('newEventButton').onclick = 

    function showEvent(divToShow) {
        var showEvent = document.getElementById(divToShow);
        showEvent.classList.remove('no-show');
        showEvent.classList.add('event-wrapper');
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>