<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h2> List of employees </h2>
    <p style="margin-left: 10px"> ruta del web_service : http://127.0.0.1:8000/salary/{min}/{max} </p>
    <input type="text" class="form-control col-6 ml-2" placeholder="search for email" onkeyup="myFunction()" id="search">
    <table class="table table-striped table-inverse table-responsive ml-2" id="my_table">
        <thead class="thead-inverse">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Detalle</th>
            </tr>
            </thead>
            <tbody id="tbody">
                @foreach ($employees as $item)
       
                <tr>
                    <td scope="row">{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->position}}</td>
                    <td>{{$item->salary}}</td>
                <td><button t class="btn-group btn-success" onclick="getData('{{$item->id}}');" data-toggle="modal" data-target="#exampleModal"> Detalle </button></td>
                </tr>
                @endforeach
                
            </tbody>
    </table>
   {{-- Modal --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="Namename"  id="Name" class="col-form-label">Name</label>
          </div>
          <div class="form-group">
            <label for="Email-text" id="Email" class="col-form-label">Email:</label>
          </div>
          <div class="form-group">
            <label for="Phone-text" id="Phone" class="col-form-label">Phone:</label>
          </div>
          <div class="form-group">
            <label for="Adress-text" id="Address" class="col-form-label">Address:</label>
          </div>
          <div class="form-group">
            <label for="Email-text" id="Salary" class="col-form-label">Salary:</label>
          </div>
          <div class="form-group">
            <label for="Email-text" id="skills" class="col-form-label">skillss:</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript"> 
//Funcion del buscador 
function myFunction(){
   let input = document.getElementById("search").value;
   let td , txtValue;
    let upper_case = input.toUpperCase();
   let  table = document.getElementById("tbody");
   console.log(table);
  let  tr = table.getElementsByTagName("tr");

   for (let index = 0; index < tr.length; index++) {
       td = tr[index].getElementsByTagName("td")[1];
       if(td){
           txtValue = td.textContent || td.innerText;
           if(txtValue.toUpperCase().indexOf(upper_case)>-1){
               tr[index].style.display="";
           }
           else{
               tr[index].style.display="none";
           }
       }
    }
  }
  //Obtener la data mediante POST hacia mi controlador EmployeesController->Detail que se registra en el archivo routes/.web
    function getData(id){
      let s ="";
    parametros ={
      "employe_id":id
    }
    //utilizo ajax para hacer una peticion 
    $.ajax({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: "POST",
      dataType: 'json',
      url: "/Detail",
      data: parametros,
    }).done(function(res){
      data =JSON.stringify(res); 
      obj = JSON.parse(data);
      $('#Name').text("Name :"+" " +obj['name']);
      $('#Email').text("Email :"+" " +obj['email']);
      $('#Phone').text("Phone :"+" " +obj['phone']);
      $('#Address').text("Address :"+" " +obj['address']);
      $('#Salary').text("Salary :"+" " +obj['salary']);
      for (let index = 0; index < obj['skills'].length; index++) {    
          s += obj['skills'][index]['skill']+" ";
      }
      $('#skills').text("Skills :"+" " +s); 
    });
  }

    
</script>
</html>