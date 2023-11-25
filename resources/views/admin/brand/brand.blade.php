@include('admin.header')
  
<div class="container main-container">
	<style type="text/css">
		.main-container{
			background-color: white;
		}
		.my-brand{
			padding: 20px;
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
	</style>

		<div class="my-brand">
			<div class="main-title"><h2>Марки авто</h2></div>
			<button id="my-custom-butt" style="float: right;" onclick="window.location='/admin/brand/create'">Створити</button>
			<p style="color:red; margin-top:15px; margin-bottom: 15px;">{{$errors}}</p>
			@if($brand->isEmpty())
			  		<h2 style="color:red; margin-top:15px;">Немає створених марок авто</h2>
			@else
			<table>
			  <tr>
			    <th>Назва</th>
			    
			    <th>Операції</th>
			  </tr>
				  @foreach($brand as $br)
  					<tr> 
					    <td>{{$br->name}}</td>
					  
					    <td>
					    	<div class="icon-operation">
					    		<a href="/admin/brand/delete/{{$br->id}}" onclick="return confirm('Ви дійсно хочете видалити цю марку авто?')"><img src="/img/delete.svg"></a>
					    	</div>
					    </td>
				  	</tr>	
	        		@endforeach 
			</table>


			@endif
		</div>
		
</div>
@include('footer')
  







