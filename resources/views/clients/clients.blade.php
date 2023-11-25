@include('header')
  
<div class="container main-container">
	<style type="text/css">
		.main-container{
			background-color: white;
		}
		.my-clients{
			padding: 20px;
			padding-bottom: 50px;
		}
		.main-title h2{
			font-size: 30px;
			font-weight: bold;
			color: #0e5d7f;
			width: fit-content;
			border-bottom: 3px solid #0e5d7f;
		}
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		  margin-top: 30px;
		  text-align: center;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
		.icon-operation {
		    display: inline-flex;
		}
		.icon-operation img{
			width: 30px;
			display: block;
			text-align: center;
		}
		#my-custom-butt{
			background-color: #0d0f14;
			color: white;
			border: none;
			padding: 5px;
			padding-left: 30px;
			padding-right: 30px;
			margin-top: 40px;
			margin-bottom: 40px;
			font-size: 20px;

		}
		#my-custom-butt:hover{
			background-color: #0e5d7f;
			cursor: pointer;
		}
	</style>

		<div class="my-clients">
			<div class="main-title"><h2>Мої клієнти</h2></div>
			<button id="my-custom-butt" style="float: right;" onclick="window.location='/client/create'">Створити</button>
				<p style="color:red; margin-top:15px; margin-bottom: 15px;">{{$errors}}</p>

			@if($clients->isEmpty())
			  		<h2 style="color:red; margin-top:15px;">У Вас немає створених клієнтів</h2>
			@else

			<table>
			  <tr>
			    <th>Прізвище</th>
			    <th>Ім’я</th>
			    <th>Email</th>
			    <th>Телефон</th>
			    <th>Операції</th>
			  </tr>
				  @foreach($clients as $client)
	              <tr>
							    
							    <td>{{$client->first_name}}</td>
							    <td>{{$client->last_name}}</td>
							    <td>{{$client->email}}</td>
							    <td>{{$client->phone}}</td>

							    <td>
							    	<div class="icon-operation">
							    		<a href="/client/edit/{{$client->id}}"><img src="/img/edit.svg"></a>
							    		<a href="/client/delete/{{$client->id}}" onclick="return confirm('Ви дійсно хочете видалити цього клієнта?')"><img src="/img/delete.svg"></a>
							    	</div>
							    </td>
							  </tr>	
	        @endforeach 
			</table>


			@endif
		</div>
		
</div>
 


<script type="text/javascript">
  $(document).ready(function(){

  	/*
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/danger/view',     
      method: 'get',            
      dataType: 'html',          
        data: {},    
        success: function(data){
 
          var cities = data.split('*');
          $.each(cities, function(i) {
            if(cities[i] !== ""){
              danger(cities[i])
            }
          }); 
        } 
    });
  });
*/
  </script>




@include('footer')
  







