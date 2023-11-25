@include('header')
  
<div class="container main-container">
	<style type="text/css">
		.main-container{
			background-color: white;
		}
		.my-client-edit{
			padding: 20px;
		}
		.main-title h2{
			font-size: 30px;
			font-weight: bold;
			color: #0e5d7f;
			width: fit-content;
			border-bottom: 3px solid #0e5d7f;
		}
		.my-client-edit #my-form{
			margin-top: 40px;
		}
	</style>
	@foreach($clients as $client)
		<div class="my-client-edit">
			<div class="main-title"><h2>Редагування клієнта</h2></div>
			<form id="my-form" action="/update-client/{{$client->id}}" method="POST">
				 @csrf
				
				 	<div class="form-group">
					    <label for="name">Прізвище</label>
					    <input type="text" class="form-control" name="first_name" id="first_name" value="{{$client->first_name}}" placeholder="Ім’я клієнта" required>
					  </div>
					  <div class="form-group">
					    <label for="description">Ім’я</label>
					    <input type="text" class="form-control" name="last_name" id="last_name" value="{{$client->last_name}}" placeholder="Ім’я клієнта" required>
					  </div>
				   	<div class="form-group">
				    	<label for="email">Email</label>
				    	<input type="text" class="form-control" name="email" id="email" placeholder="Email"  value="{{$client->email}}"  required>
				  	</div>
				  	<div class="form-group">
				    	<label for="phone">Phone</label>
				    	<input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон"  value="{{$client->phone}}"  required>
				    	<input type="hidden" name="user_id" value="{{$user_id}}">
				  	</div>	





			
			  	<button type="submit" class="btn btn-primary">Оновити</button>
			</form>
		
		</div>
		
</div>
 
	@endforeach






@include('footer')
  







