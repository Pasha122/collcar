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
		#my-form{
			margin-top: 30px;
		}
		.main-title h2{
			font-size: 30px;
			font-weight: bold;
			color: #0e5d7f;
			width: fit-content;
			border-bottom: 3px solid #0e5d7f;
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
			<div class="main-title"><h2>Створити клієнта</h2></div>
				

			<form id="my-form" action="/client/create/add" method="POST">
				 @csrf
						
						<div class="form-group">
					    <label for="name">Прізвище</label>
					    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Прізвище клієнта" required>
					  </div>
					  <div class="form-group">
					    <label for="description">Ім’я</label>
					    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Ім’я клієнта" required>
					  </div>
				   	<div class="form-group">
				    	<label for="email">Email</label>
				    	<input type="text" class="form-control" name="email" id="email" placeholder="Email"  required>
				  	</div>
				  	<div class="form-group">
				    	<label for="phone">Phone</label>
				    	<input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон"  required>
				    	<input type="hidden" name="user_id" value="{{$user_id}}">
				  	</div>	


			
			  	<button type="submit" id="my-custom-butt">Створити</button>
			</form>
			
		</div>
		




		</div>
		
</div>
 
@include('footer')
  







