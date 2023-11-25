@include('admin.header')
  
<div class="container main-container">
	<style type="text/css">
		.main-container{
			background-color: white;
		}
		.my-detail-edit{
			padding: 20px;
		}
		.main-title h2{
			font-size: 30px;
			font-weight: bold;
			color: #0e5d7f;
			width: fit-content;
			border-bottom: 3px solid #0e5d7f;
		}
		.my-detail-edit #my-form{
			margin-top: 40px;
		}
	</style>

		<div class="my-detail-edit">
			<div class="main-title"><h2>Редагування даних працівника</h2></div>
			<form id="my-form" action="/admin/update-user/{{$id_user}}" method="POST">
				 @csrf
				@foreach($users as $user)
						

					<div class="form-group">
					    <label for="name">Імя</label>
					    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}" required>
					</div>

					<div class="form-group">
					    <label for="email">Email</label>
					    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}" required style="pointer-events:none;">
					</div>

					<div class="form-group">
					    <label for="password">Пароль</label>
					    <input type="text" class="form-control" id="password" name="password" placeholder="********" min="6" value="">
					</div>
					  

				@endforeach
			  	<button type="submit" class="btn btn-primary">Оновити</button>
			</form>
			
		</div>
		
</div>
 







@include('footer')
  







