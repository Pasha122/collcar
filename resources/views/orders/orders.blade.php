@include('header')
  
<div class="container main-container">
	<style type="text/css">
		.main-container{
			background-color: white;
		}
		.my-order{
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

		.icon-operation img{
			width: 30px;
			display: block;
			text-align: center;
		}
		.icon-operation {
		    display: inline-flex;
		    position: relative;
		}
		.icon-operation .list-order{
		   
		    background-color: black;
		    position: absolute;
		    color: white;
		    top: 25px;
		    z-index: 99999;
		    padding: 20px;
		    width: 300px;
		    display: none;
		    height: 300px;
    		overflow-y: scroll;
		   
		}
		.icon-operation .list-order .close{
		     position: absolute;
		    top: 5px;
		    right: 10px;
		    z-index: 9999;
		    font-family: cursive;
		    color: white;
		    font-size: 15px;
		    cursor: pointer;
		}
	</style>

		<div class="my-order">
			<div class="main-title"><h2>Замовлення</h2></div>
			<button id="my-custom-butt" style="float: right;" onclick="window.location='/orders/create'">Створити</button>
			@if($orders->isEmpty())
			  		<h2 style="color:red; margin-top:15px;">У Вас немає створених замовлень</h2>
			@else

			<table>
			  <tr>
			    <th>Клієнт</th>
			    <th>Ціна(грн.)</th>
			    <th>Список</th>
			    <th>Операції</th>
			  </tr>
				  @foreach($orders as $order)
	              <tr>
	              	<td>{{$order->client_name}}</td>
					<td>{{$order->price}}грн.</td>
					<td>
						<div class="icon-operation" id="list_{{$order->id}}">
				    		<a href="javascript:void(0)"><img src="/img/list.svg" style="width:15px;" onclick="showList(this)"></a>
				    		<div class="list-order">
				    			<div class="close" onclick="hideList(this)">x</div>
				    			{!!  $order->list !!}
				    			<hr style="border-bottom: 1px solid white;">
				    			<p>Загальна сума: {{$order->price}}грн.</p>

				    		</div>
				    	</div>
				    </td>
				    <td>
				    	<div class="icon-operation">
				    		<a href="/order/delete/{{$order->id}}" onclick="return confirm('Ви дійсно хочете видалити це замолення?')"><img src="/img/delete.svg"></a>
				    	
				    	</div>
				    </td>
							  </tr>	
	        @endforeach 
			</table>

			<script type="text/javascript">
				function hideList($el){
					$el = $($el).parent().parent().attr('id');
					if($('#'+$el+' .list-order').css('display') == 'none'){
						$('#'+$el+' .list-order').css('display', 'block');
					}else{
						$('#'+$el+' .list-order').css('display', 'none');
					}
				}
				function showList($el){
					$el = $($el).parent().parent().attr('id');
					if($('#'+$el+' .list-order').css('display') == 'none'){
						$('#'+$el+' .list-order').css('display', 'block');
					}else{
						$('#'+$el+' .list-order').css('display', 'none');
					}
				}
			</script>

			@endif
		</div>
		
</div>
 




@include('footer')
  







