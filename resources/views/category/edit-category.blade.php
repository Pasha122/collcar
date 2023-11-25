@include('header')
  
<div class="container main-container">
	<style type="text/css">
		.main-container{
			background-color: white;
		}
		.my-category-edit{
			padding: 20px;
		}
		.main-title h2{
			font-size: 30px;
			font-weight: bold;
			color: #0e5d7f;
			width: fit-content;
			border-bottom: 3px solid #0e5d7f;
		}
		.my-category-edit #my-form{
			margin-top: 40px;
		}
	</style>

		<div class="my-category-edit">
			<div class="main-title"><h2>Редагування категорії</h2></div>
			<form id="my-form" action="/update-category/{{$id_category}}" method="POST">
				@csrf
				@foreach($category as $cat)
					
					<div class="form-group">
					    <label for="name">Назва</label>
					    <input type="text" class="form-control" id="name" name="name" placeholder="Назва категорії" value="{{$cat->name}}" required>
					</div>
					<div class="form-group">
					    <label for="description">Опис</label>
					    <textarea class="form-control" id="description" name="description" placeholder="Опис категорії" value="{{$cat->description}}" rows="5" required>{{$cat->description}}</textarea>
					</div>
				    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$cat->user_id}}" required>
				@endforeach   
			  	<button type="submit" class="btn btn-primary">Оновити</button>
			</form>
		</div>
		
</div>
 







@include('footer')
  







