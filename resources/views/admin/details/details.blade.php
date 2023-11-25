@include('admin.header')
  
<div class="container main-container">
	<style type="text/css">
		.main-container{
			background-color: white;
		}
		.my-detail{
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
		.image_td{
			width: 50px;display: block;
			margin: auto;
		}
	</style>

		<div class="my-detail">
			<div class="main-title"><h2>Мої запчастини</h2></div>
			<button id="my-custom-butt" style="float: right;" onclick="window.location='/admin/detail/create'">Створити</button>
			@if($details->isEmpty())
			  		<h2 style="color:red; margin-top:15px;">У Вас немає створених запчастин</h2>
			@else

			<table>
			  <tr>

			    <th>Категорія</th>
			    <th>Фото</th>
			    <th>Назва</th>
			    <th>Марка авто</th>
			    <th>Art.</th>
			    <th>Ціна</th>
			    <th>Операції</th>
			  </tr>
				  @foreach($details as $detail)
	              <tr>
							    <td>
							    	@foreach($category as $cat)
							    		@if($cat->id == $detail->category_id)
							    			{{$cat->name}}
							    		@endif
							    	@endforeach 
							    </td>
							     <td><img class="image_td" src="/path/{{$detail->image}}"></td>
							    <td>{{$detail->name}}</td>
							    <td>{{$detail->car_brand}}</td>
							    <td>{{$detail->art}}</td>
							    <td>{{$detail->price}}</td>

							    <td>
							    	<div class="icon-operation">
							    		<a href="/search/detail/{{$detail->id}}"><img src="/img/show.svg"></a>
							    		<a href="/admin/detail/edit/{{$detail->id}}"><img src="/img/edit.svg"></a>
							    		<a href="/admin/detail/delete/{{$detail->id}}" onclick="return confirm('Ви дійсно хочете видалити цю запчастину?')"><img src="/img/delete.svg"></a>
							    	</div>
							    </td>
							  </tr>	
	        @endforeach 
			</table>


			@endif
		</div>
		
</div>
 



@include('footer')
  







