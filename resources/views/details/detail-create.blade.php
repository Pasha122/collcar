@include('header')
  
<div class="container main-container">

<style type="text/css">
	.form-input input {
	  display:none;
	}
	.form-input label {
 

padding: 10px;

  text-align:center;
  background:#1F244B;

  color:white;
  font-size:15px;

  text-transform:Uppercase;
  font-weight:600;
  border-radius:3px;
  cursor:pointer;
}

.form-input img {

    height: 200px;
    object-fit: cover;

    margin-bottom: 20px;
  
}
</style>
		<div class="my-detail">
			<div class="main-title"><h2>Створити запчастину</h2></div>
				

			<form id="my-form" action="/detail/create/add" method="POST" enctype="multipart/form-data">
				 @csrf
						<div class="form-group">
					    <label for="name">Категорія</label>
					    <select name="category_id" required class="form-control">
					    	@foreach($category as $cat)
					    			  <option value="{{$cat->id}}">{{$cat->name}}</option>
					    	@endforeach	
					    </select>
					  
					  </div>


						<div class="form-group">
					    <label for="name">Назва</label>
					    <input type="text" class="form-control" name="name" id="name" placeholder="Назва деталі" required>
					  </div>
					  <div class="form-group">
					    <label for="description">Опис</label>
					    <textarea class="form-control" name="description" id="description" placeholder="Опис Деталі"  rows="5" required></textarea>
					  </div>
				   	<div class="form-group">
				    	<label for="image">Фото</label>
				    	<br>
				    	<input type="file"  name="uploadImage" accept="image/*" required>
				    	<br>
				    	<input type="text" class="form-control" name="images" id="image" placeholder="Image url" value="" style="pointer-events:none; display:none;" >
				  	</div>
				  	<div class="form-group">
				    	<label for="car_brand_id">Авто</label>

				    	<select name="car_brand_id" name="car_brand_id" id="car_brand_id" required class="form-control" onchange="selectAuto(this.value)">
				    		<option value="" car-name="" selected></option>
					    	@foreach($car as $cars)
					    			  <option value="{{$cars->id}}" car-name="{{$cars->name}}">{{$cars->name}}</option>
					    	@endforeach	
					    </select>
				    	<input type="hidden" class="form-control" id="car_brand" name="car_brand"  required>
				    	<input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$user_id}}"  required>
				  	</div>


				  	<div class="form-group">
				    	<label for="art">Art.</label>
				    	<input type="text" class="form-control" id="art" name="art" placeholder=""  required >
				  	</div>


				  	<div class="form-group">
				    	<label for="price">Ціна</label>
				    	<input type="number" class="form-control" step="0.01" id="price" name="price" placeholder="Ціна"  required>
				  	</div>

			
			  	<button type="submit" id="my-custom-butt">Створити</button>
			</form>
			<script type="text/javascript">
				

				$(document).ready(function(){
					$('#art').val(pass_gen(11));
					$('#art').attr('value', pass_gen(11));
				});
				function pass_gen(len) {
		        chrs = '1234567890';
		        var str = '';
		        for (var i = 0; i < len; i++) {
		            var pos = Math.floor(Math.random() * chrs.length);
		            str += chrs.substring(pos,pos+1);
		        }
		        return str;
		    }
				function selectAuto($el){
					$car_name = $('#car_brand_id option[value='+$el+']').attr('car-name');
					$("#car_brand").val($car_name);
					$("#car_brand").attr('value', $car_name);
				}
			</script>
		</div>
		




		</div>
		
</div>
 
@include('footer')
  







