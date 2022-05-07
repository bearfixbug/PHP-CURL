<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container pt-5">
        <h2>1.Basic</h2>
        <div class="d-flex flex-wrap">
                <?php

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://jsonplaceholder.typicode.com/photos',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    ));

                    $response = curl_exec($curl);
                    $obj = json_decode($response);
                    // print_r( $obj );
                    // echo $obj[0]->thumbnailUrl;

                    // count($obj);   --->  check lenght
                    $html = '';
                    for ($i=0; $i < 10 ; $i++) { 
                        $html .= '<div class="card m-2" style="width: 18rem;">
                                    <img src=" '. $obj[$i]->thumbnailUrl .' " class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">'. $obj[$i]->title .'</h5>
                                        <a href="'. $obj[$i]->url .'" target="blank" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>';
                    }
                    echo $html;
                    

                    curl_close($curl);
                    // echo $response;

                ?>


            
        </div>



        <br><br>
        <h2>2.Advance</h2>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Website</th>
                <th scope="col">Company</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    // $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://jsonplaceholder.typicode.com/users',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    ));

                    $response = curl_exec($curl);
                    $obj = json_decode($response);
                    // echo $obj[0]->name;

                    $html = '';
                    for ($i=0; $i < count($obj); $i++) { 
                        $html .= '<tr>
                                    <th scope="row">'.$obj[$i]->id.'</th>
                                    <td>'.$obj[$i]->name.'</td>
                                    <td>'.$obj[$i]->username.'</td>
                                    <td>'.$obj[$i]->email.'</td>
                                    <td>'.$obj[$i]->address->street. ' ' . $obj[$i]->address->suite . ' ' .$obj[$i]->address->city.' '.$obj[$i]->address->zipcode. '</td>
                                    <td>'.$obj[$i]->phone.'</td>
                                    <td>'.$obj[$i]->website.'</td>
                                    <td>'.$obj[$i]->company->name.' '. $obj[$i]->company->catchPhrase .'</td>
                                </tr>';
                    }
                    echo $html;


                    curl_close($curl);
                    // echo $response;

                ?>


                
            </tbody>
        </table>
    </div>
    
</body>
</html>


<?php
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://jsonplaceholder.typicode.com/users',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "id": '.$_POST['name'].',
    "name: "helloworld"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>