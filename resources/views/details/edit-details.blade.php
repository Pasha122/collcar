@include('header')
  
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
			<div class="main-title"><h2>Редагування деталі</h2></div>
			<form id="my-form" action="/update-details/{{$id_detail}}" method="POST" enctype="multipart/form-data">
				 @csrf
				@foreach($details as $detail)
						<div class="form-group">
					    <label for="name">Категорія</label>
					    <select name="category_id" required class="form-control">
					    	@foreach($category as $cat)
					    			@if($cat->id == $detail->category_id)
					    				<option value="{{$cat->id}}" selected>{{$cat->name}}</option>
					    			@else
					    			  <option value="{{$cat->id}}">{{$cat->name}}</option>
					    			@endif
					    	@endforeach	
					    </select>
					  
					  </div>


						<div class="form-group">
					    <label for="name">Назва</label>
					    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$detail->name}}" required>
					  </div>
					  <div class="form-group">
					    <label for="description">Опис</label>
					    <textarea class="form-control" id="description" name="description" placeholder="Description" value="{{$detail->description}}" rows="5" required>{{$detail->description}}</textarea>
					  </div>
				   	<div class="form-group">
				    	<label for="image">Фото</label>
				    	<br>
				    	@if(empty($detail->image))
				    	<input type="file"  name="uploadImage" accept="image/*"  value="{{$detail->image}}" required>
				    	@else
				    	<input type="file"  name="uploadImage" accept="image/*"  value="{{$detail->image}}">
				    	@endif
				    	<br><br>
				    	<input type="text" class="form-control" id="image" name="image" placeholder="Image" value="{{$detail->image}}" style="pointer-events:none;" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="car_brand_id">Авто</label>

				    	<select name="car_brand_id" id="car_brand_id" name="car_brand_id" required class="form-control" onchange="selectAuto(this.value)">
					    	@foreach($car as $cars)
					    			@if($cars->id == $detail->car_brand_id)
					    				<option value="{{$cars->id}}" car-name="{{$cars->name}}" selected>{{$cars->name}}</option>
					    			@else
					    			  <option value="{{$cars->id}}" car-name="{{$cars->name}}">{{$cars->name}}</option>
					    			@endif
					    	@endforeach	
					    </select>
				    	<input type="hidden" class="form-control" id="car_brand" name="car_brand" value="{{$detail->car_brand}}" required>
				    	<input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$detail->user_id}}" required>
				  	</div>

				  	<div class="form-group">
				    	<label for="art">Art.</label>
				    	<input type="text" class="form-control" id="art" name="art" placeholder="Image" value="{{$detail->art}}" required disabled>
				  	</div>
				  	
				  	<div class="form-group">
				    	<label for="price">Ціна</label>
				    	<input type="number" class="form-control" step="0.01" id="price" name="price" placeholder="Ціна" value="{{$detail->price}}" required>
				  	</div>


				@endforeach
			  	<button type="submit" class="btn btn-primary">Оновити</button>
			</form>
			<script type="text/javascript">
				function selectAuto($el){
					$car_name = $('#car_brand_id option[value='+$el+']').attr('car-name');
					$("#car_brand").val($car_name);
					$("#car_brand").attr('value', $car_name);
				}
			</script>
		</div>
		
</div>
 







@include('footer')
  







