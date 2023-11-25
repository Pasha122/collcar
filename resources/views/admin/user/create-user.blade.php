@include('admin.header')
  
<div class="container main-container">

		<div class="my-detail">
			<div class="main-title"><h2>Створити працівника</h2></div>
				

			<form id="my-form" action="/admin/user/add" method="POST" enctype="multipart/form-data">
				 @csrf
						<div class="form-group">
					    <label for="name">Імя</label>
					    <input type="text" class="form-control" id="name" name="name" placeholder="Name"  required>
					</div>

					<div class="form-group">
					    <label for="email">Email</label>
					    <input type="text" class="form-control" id="email" name="email" placeholder="Email"required>
					</div>

					<div class="form-group">
					    <label for="password">Пароль</label>
					    <input type="text" class="form-control" id="password" name="password" placeholder="********" min="6" value="" required>
					</div>

			
			  	<button type="submit" id="my-custom-butt">Створити</button>
			</form>
			
		</div>
		




		</div>
		
</div>
 
@include('footer')
  







