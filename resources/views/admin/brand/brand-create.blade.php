@include('admin.header')
  
<div class="container main-container">
	<style type="text/css">
		.main-container{
			background-color: white;
		}
		.my-brand{

			padding: 20px;
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

			<div class="my-brand">
				<div class="main-title"><h2>Створити марку авто</h2></div>	
					<form id="my-form" action="/admin/brand/create/add" method="POST">
						 @csrf
							  <div class="form-group">
							    <label for="name">Назва марки авто</label>
							    <input type="text" class="form-control" name="name" id="name" placeholder="Назва марки" required>
							  </div>	
					  	<button type="submit" id="my-custom-butt">Створити</button>
					</form>
			</div>
		</div>
		
</div>
 
@include('footer')
  







