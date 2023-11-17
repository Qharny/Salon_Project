<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Get data from the database into a table -->
    <table>
        <thead>
            <tr>
                <th>
                    Booking ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Category
                </th>
                <th>
                    Service
                </th>
                <th>
                    Contact
                </th>
                <th>
                    Date
                </th>
            </tr>
            ID int auto_increment primary key,
    name varchar(200),
    category varchar(100),
    service varchar(100),
    stylist varchar(100),
    contact varchar(20),
    date date,
    time time
        </thead>
    </table>
</body>
</html>