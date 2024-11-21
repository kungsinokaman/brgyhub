<?php
session_start();

include("../components/connect.php");
if (isset($_COOKIE['head_id'])) {
    $head_id = $_COOKIE['head_id'];
} else {
    $head_id = '';
}

// Retrieve users from the database
$sql = "SELECT * FROM certificates";
$result = $conn->query($sql);

// Close the database connection by setting it to null
// Comment out or remove this line, as it's closing the connection before executing the query
// $conn = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/userstyle.css">
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<style>
        .print-button {
            background-color: #4CAF50; /* Green background */
            padding: 5px;
            color: white; /* White text */
            border: none; /* Remove borders */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer/hand icon on hover */
            font-size: 16px; /* Increase font size */
        }

        .print-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>

<body>
    <?php include '../components/admin_header.php'; ?>


    <section id="content" class="community">
        <h2 class="heading">Certificates Dashboard</h2>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Age</th>
                        <th>Certificates</th>
                        <th>Action</th> <!-- Added Action column -->
                        <!-- Add more table headings if needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row["fullname"] . "</td>";
                            echo "<td>" . $row["age"] . "</td>";
                            echo "<td>" . $row["certificates"] . "</td>";
                            echo "<td><button class='print-button' onclick=\"printCertificate('" . $row["fullname"] . "',  '" . $row["age"] . "','" . $row["certificates"] . "')\">Print</button></td>";
                            // Add more table cells if needed
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</body>
<script src="js/script.js"></script>
<script>
function printCertificate(fullname, age, certificateType) {
    let printContent = '';

    if (certificateType === 'Certificate of Indigency') {
        printContent = `
            <header><center>Republic of the Philippines | Province of Iloilo | Municipality of Pototan</center></header>
            <h2 style="text-align: center;">Office of the Punong Barangay</h2>
            <title>Certificate of Indigency</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .side-bar {
            width: 25%;
            border-right: 2px dotted green;
            padding-right: 10px;
        }
        .side-bar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .side-bar ul li {
            margin-bottom: 10px;
            font-size: 14px;
            line-height: 1.5;
        }
        .side-bar ul li b {
            color: green;
        }
        .content {
            width: 70%;
            padding-left: 10px;
        }
        .content h3 {
            text-align: center;
            color: red;
        }
        .signature {
            margin-top: 40px;
            text-align: center;
        }
        .signature h4 {
            margin: 0;
            font-size: 16px;
        }
        .signature p {
            margin: 5px 0 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Side bar section -->
        <div class="side-bar">
            <ul>
                <li><b>Hon. Nicky B. Pescuela</b><br>Punong Barangay</li>
                <li><b>Hon. Bienvenido G. Belonio</b><br>Barangay Kagawad</li>
                <li><b>Hon. Luciano Q. Ibero</b><br>Barangay Kagawad</li>
                <li><b>Hon. Krystal Ann F. Castro</b><br>Barangay Kagawad</li>
                <li><b>Hon. Fred P. Lo</b><br>Barangay Kagawad</li>
                <li><b>Hon. Joel B. Catolico</b><br>Barangay Kagawad</li>
                <li><b>Hon. Virgilio C. Bajon</b><br>Barangay Kagawad</li>
                <li><b>Hon. Santiago P. Aguilar</b><br>Barangay Kagawad</li>
                <li><b>Hon. Andrea Jean P. Penafiel</b><br>SK Chairperson</li>
                <li><b>Freesel Joy P. Cardinal</b><br>Barangay Secretary</li>
                <li><b>Mary Grace O. Pendon</b><br>Barangay Treasurer</li>
            </ul>
        </div>
        <!-- Main content -->
        <div class="content">
            <h3>Certificate of Indigency</h3>
            <p>TO WHOM IT MAY CONCERN:</p>
            <p>
                This is to certify that <b>${fullname}</b>, 
                <b>${age}</b> years old, is a bonafide resident of Barangay Lopez Jaena Ward,
                Pototan, Iloilo, hereby declare and confirm that the name mentioned above belongs to an indigent family of this barangay.
            </p>
            <p>
                This certification is hereby issued upon the request of the above named person for any purposes it may serve him/her best.
            </p>
            <p>
                Issued this <b>${new Date().toLocaleDateString()}</b>,at Barangay Hall, Lopez Jaena Ward, Pototan, Iloilo.
            </p>
            <div class="signature">
                <h4>Noted by:</h4>
                <p><b>NICKY B. PESCUELA</b></p>
                <p>PUNONG BARANGAY</p>
            </div>
        </div>
    </div>
        `;
    } else if (certificateType === 'Certificate of Residency') {
        printContent = `
            <header><center>Republic of the Philippines | Province of Iloilo | Municipality of Pototan</center></header>
            <h2 style="text-align: center;">Office of the Punong Barangay</h2>
            <title>Certificate of Residency</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .side-bar {
            width: 25%;
            border-right: 2px dotted green;
            padding-right: 10px;
        }
        .side-bar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .side-bar ul li {
            margin-bottom: 10px;
            font-size: 14px;
            line-height: 1.5;
        }
        .side-bar ul li b {
            color: green;
        }
        .content {
            width: 70%;
            padding-left: 10px;
        }
        .content h3 {
            text-align: center;
            color: red;
        }
        .signature {
            margin-top: 40px;
            text-align: center;
        }
        .signature h4 {
            margin: 0;
            font-size: 16px;
        }
        .signature p {
            margin: 5px 0 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Side bar section -->
        <div class="side-bar">
            <ul>
                <li><b>Hon. Nicky B. Pescuela</b><br>Punong Barangay</li>
                <li><b>Hon. Bienvenido G. Belonio</b><br>Barangay Kagawad</li>
                <li><b>Hon. Luciano Q. Ibero</b><br>Barangay Kagawad</li>
                <li><b>Hon. Krystal Ann F. Castro</b><br>Barangay Kagawad</li>
                <li><b>Hon. Fred P. Lo</b><br>Barangay Kagawad</li>
                <li><b>Hon. Joel B. Catolico</b><br>Barangay Kagawad</li>
                <li><b>Hon. Virgilio C. Bajon</b><br>Barangay Kagawad</li>
                <li><b>Hon. Santiago P. Aguilar</b><br>Barangay Kagawad</li>
                <li><b>Hon. Andrea Jean P. Penafiel</b><br>SK Chairperson</li>
                <li><b>Freesel Joy P. Cardinal</b><br>Barangay Secretary</li>
                <li><b>Mary Grace O. Pendon</b><br>Barangay Treasurer</li>
            </ul>
        </div>
        <!-- Main content -->
        <div class="content">
            <p style="text-align: justify;">To Whom It May Concern:</p>
            <p style="text-align: justify;">This is to certify that <strong>${fullname}</strong>, aged <strong>${age}</strong>, years old is a bonafide resident of Barangay Lopez Jaena, Pototan, Iloilo, is known to be of good moral character and a law abiding citizen as per record of this office and has not incurred any criminal liabilities within the barangay. 
            <p style="text-align: justify;">This certificate is issued being issued to the above mentioned person for any legal purpose it may serve his/her best. 
            <p style="text-align: justify;">Issued this <strong>${new Date().toLocaleDateString()}</strong> at Barangay Hall, Lopez Jaena Ward, Pototan, Iloilo.</p>
            <br>
            <p>Attested by:</p>
            <br><br>
            <p><strong>FREESEL JOY P. CARDINAL</strong><br>Barangay Secretary<br>
            <br> 
            <p>Noted by:</p>
            <br><br>
            <p><strong>HON. NICKY B. PESCUELA</strong><br>Punong Barangay<br>
        `;
    } else {
        printContent = `<p>No specific certificate template available for ${certificateType}.</p>`;
    }

    const newWindow = window.open('', '_blank');

    newWindow.document.write(`
        <html>
            <head>
                <title>Print Certificate</title>
                <style>
                    body { 
                        font-family: Poppins, sans-serif; 
                        margin: 40px; 
                        background-color: white;
                    }
                    h1 { text-align: center; }
                    p { font-size: 18px; text-align: justify; }
                    @media print {
                        body {
                            margin: 0;
                            background: white; 
                        }
                    }
                </style>
            </head>
            <body onload="window.print(); window.close();">
                ${printContent}
            </body>
        </html>
    `);
    newWindow.document.close();
}

</script>

</html>