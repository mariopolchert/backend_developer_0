<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza</title>
</head>
<body>
    <h1>Spajanje na bazu</h1>
    
    <?php
        $connection = mysqli_connect('localhost', 'algebra', 'algebra', 'videoteka');

        if($connection === false){
            die("Connection failed: ". mysqli_connect_error());
        }

        $sql = "SELECT * from clanovi";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $members = mysqli_fetch_all($result);
            var_dump($members);die();
            ?>

            <table>
                <tr>
                    <th>Ime</th>
                    <th>Telefon</th>
                    <th>Clanski broj</th>
                </tr>
            
    <?php
            foreach ($members as $member) {
                echo '<tr>';
                echo '<td>' . $member[1] . '</td>';
                echo '<td>' . $member[3] . '</td>';
                echo '<td>' . $member[5] . '</td>';
                echo '</tr>';
            }
        }

    ?>
    </table>
</body>
</html>