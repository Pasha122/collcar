@include('header')
  
<div class="container main-container">
	<style type="text/css">
		.main-container{
			background-color: white;
		}
		.my-orders{

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
		#my-custom-butt-mini{
			background-color: #0d0f14;
			color: white;
			border: none;
			padding: 5px;
			padding-left: 10px;
			padding-right: 10px;
			margin-top: 10px;
			margin-bottom: 10px;
			font-size: 15px;

		}
		#my-custom-butt-mini:hover{
			background-color: #0e5d7f;
			cursor: pointer;
		}
	

		#myDetail {
		  box-sizing: border-box;
		  background-image: url('searchicon.png');
		  background-position: 14px 12px;
		  background-repeat: no-repeat;
		  font-size: 14px;
		  
		  border: none;
		  outline: none;
		  padding: 5px;
		  padding-left: 10px;
		  border-radius: .25rem;
		  width: 100%;
		}

		

		.dropdown {
		  position: relative;
		  display: inline-block;
		  width: 100%;
		  border: 1px solid #ced4da;
		  margin-bottom: 10px;
		  border-radius: .25rem;
		}

		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: #f6f6f6;
		  width: fit-content;
		  overflow: auto;
		  border: 1px solid #ddd;
		  z-index: 1;
		}

		.dropdown-content a {
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none;
		  display: block;
		}

		.dropdown a:hover {background-color: #ddd;}

		.show {display: block;}


	</style>

		<div class="my-orders">
			<div class="main-title"><h2>Створити замовлення</h2></div>
				

			<form id="my-form" action="/order/create/add" method="POST">
				 @csrf

				 <div class="form-group" style="margin:0px;padding: 0px;">
					 <div class="dropdown">
					 	<input type="text" placeholder="Пошук запчастини.." id="myDetail" onkeyup="filterFunction()" onclick="myFunction()">
					  <div id="myDropdown" class="dropdown-content">
					    
					    @foreach($details as $detail)
					    	<a href="javascript:void(0)" data-art="{{$detail->art}}" detail-name="{{$detail->name}}" onclick="selectDetail(this)">{{$detail->name}} (Art.{{$detail->art}})</a>
					    @endforeach		
					  </div>
					</div>
				</div>

					<div class="form-group">
					    <label for="list">Кількість</label>
					    <input type="number" class="form-control" id="count" step="0.01">
					</div>
					 <button type="button" id="my-custom-butt-mini" onclick="addToList()">Додати запчастину в замовлення</button>

					 <hr>
					 <div class="main-title"><h2>Форма замовлення</h2><br></div>
					 <div class="form-group" style="margin:0px;padding: 0px;">
					    <label for="name">Клієнт</label>
					    <input type="hidden"  name="user_id" value="{{$user_id}}">
					    <input type="hidden"  name="client_name" id="client_name" value="">
					    

					    <select id="client_id" name="client_id" class="form-control" required  onchange="selectClientName(this.value)" >
					    	<option value=""></option>
					    	@foreach($clients as $client)
					    			  <option value="{{$client->id}}" client_name="{{$client->first_name}} {{$client->last_name}}">{{$client->first_name}} {{$client->last_name}}</option>
					    	@endforeach	
					    </select><br> 
					    <a href="javascript:void(0)" id="my-custom-href" onclick="crearList()">Очистити список</a>
					    <br>
					 </div>
					 <div class="form-group">
					    <label for="list">Список</label>
					    <div id="div-list"></div>
					    <textarea class="form-control" name="list" id="list" placeholder="Список замовлення"  rows="8" required style="display:none;"></textarea>
					  </div>
				   	<div class="form-group">
				    	<label for="price">Ціна</label>
				    	<input type="text" class="form-control" name="price" id="price" placeholder=""  required>
				  	</div>


				  	<script type="text/javascript">
				  		function crearList(){
				  			$('div#div-list').html("");
				  			$('textarea#list').val("");
				  			$('textarea#list').text("");
				  			$('#price').val("");

				  		}
				  		function selectClientName($el) {
				  			$client_name = $('#client_id option[value='+$el+']').attr('client_name');
							$("#client_name").val($client_name);
							$("#client_name").attr('value', $client_name);
				  			

				  		}
				  		function selectDetail($el) {
				  			$('#myDetail').val($($el).attr('data-art'));
				  			$('#myDetail').attr('detail-name', $($el).attr('detail-name'));
				  			$('#myDetail').attr('value',$($el).attr('data-art'));
				  			$('#myDropdown').removeClass('show');
				  		}
				  		$all_price = 0;
				  		function addToList(){

				  			if($('#myDetail').val()==""){
				  				$('#myDetail').css('border', '1px solid red');
				  				setTimeout(function(){
				  					$('#myDetail').css('border', '1px solid #ced4da');
				  				},3000);
				  			}else if($('#count').val()==""){
				  				$('#count').css('border', '1px solid red');
				  				setTimeout(function(){
				  					$('#count').css('border', '1px solid #ced4da');
				  				},3000);
				  			}else{
				  				$.ajaxSetup({
							      headers: {
							        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							      }
							    });
							    $.ajax({
							      url: '/order/getPrice',     
							      method: 'get',            
							      dataType: 'html',          
							        data: {
							        	art: $('#myDetail').val()
							        },    
							        success: function(price_one){
								 		//alert(data);
								 		$art="Art."+$('#myDetail').val();
								 		$detail_name = $('#myDetail').attr('detail-name');
								 		$count='Кількість - '+ $('#count').val();
								 		$price= parseFloat(price_one) * parseFloat($('#count').val());
							        	$menu_list = '<p><span style="color:red;">' + $art+'</span><br>'+ 
							        					$detail_name+'<br>'+
							        					$count + 'шт.<br>' +
							        					' Ціна(1шт.): ' + price_one  + 'грн.<br>'+
							        					' Ціна(заг.): ' + $price + 'грн.</p>';
							        	




							        	$('#div-list').html($('#list').val()+$menu_list);

							        	$('#list').val($('#list').val()+$menu_list);
				  						$('#list').text($('#list').val()+$menu_list);
				  						$all_price += $price;
				  						$('#price').val($all_price.toFixed(2));

				  						$('#myDetail').val("");
				  						$('#count').val("");
							        } 
							    });
							 




				  				/*
				  				$('#list').val($('#list').val()+$menu_list);
				  				$('#list').text($('#list').val()+$menu_list);*/
				  			}
				  		}
				  	</script>



			
			  	<button type="submit" id="my-custom-butt">Створити</button>
			</form>
			<script>

			function myFunction() {
			  document.getElementById("myDropdown").classList.toggle("show");
			}

			function filterFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
			  var input, filter, ul, li, a, i;
			  input = document.getElementById("myDetail");
			  filter = input.value.toUpperCase();
			  div = document.getElementById("myDropdown");
			  a = div.getElementsByTagName("a");
			  for (i = 0; i < a.length; i++) {
			    aa = a[i].bb || a[i].innerText;

			    if (aa.toUpperCase().indexOf(filter) > -1) {
			      a[i].style.display = "";
			    } else {
			      a[i].style.display = "none";
			    }
			  }
			}
</script>
		</div>
		




		</div>
		
</div>
 
@include('footer')
  







