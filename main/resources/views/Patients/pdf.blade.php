<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
    <div class="row my-3 ">
        <div class="col">
            <div class="card" style="background-color: #F33155; border-raduis:20px; border-radius: 24px; " >
                <div class="card-header">
                    <div class="card-title" style="color:white">
                        Mr / Mme {{ $Patient->nom }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col">
            <div class="card" style="background-color:white; border-raduis:20px; border-radius: 11px; " >
                <div class="card-header">
                <div class="card-title">
                 Informations 
                </div>
            </div>
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-3">
                            Nom / Prenom :   {{ $Patient->nom }}   {{ $Patient->prenom }}
                        </div>
                       
                    </div>
                    <div class="row my-3">
                        <div class="col-3">
                            Age : {{ $Patient->age }} 
                        </div>
                       
                    </div>
                    <div class="row my-3">
                        <div class="col-3">
                            Poids :   {{ $Patient->poids }} 

                        </div>
                       
                    </div>
                    <div class="row my-3">
                        <div class="col-3">
                            Taille :  {{ $Patient->taille }}             
                    </div>
                     
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col">
            <div class="card" style="background-color: #F33155; border-raduis:20px; border-radius: 24px; " >
                <div class="card-header">
                <div class="card-title " style="color:white">
                 Fiche  
                </div>
                 </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col">
            <div class="card" style="background-color:white; border-raduis:20px; border-radius: 11px; " >
                <div class="card-body">
                <table class="table">
                    <thead>
                      <th>
                          Date Visite 
                      </th>
                      <th>
                          Type
                      </th>
                      <th>
                          Description
                      </th>
                    
                    </thead>
                    <tbody>
                        @foreach($fiches as $f)
                        <tr>
                            <td>{{$f->date_visite}}</td>
                            <td>{{$f->type}}</td>
                            <td>{{$f->description}}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                    
                </table>  
                
                </div>  
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>
   
    
   