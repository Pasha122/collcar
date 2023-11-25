@include('header')
  
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

		.label{
			padding: 20px;
			border:1px solid #0e5d7f;
			color: #0e5d7f;
			width: fit-content;
		}
		.label .big-title{
			font-size: 25px;
		}
		.label p{
			
		}
	</style>

		<div class="my-detail">
			<div class="main-title"><h2>Статистика</h2></div>
			

			<div class="label">
				<div class="big-title">Тиждень</div>
				<div class="title-label"><p><strong>Кількість продаж:</strong> {{$count_order_week}}</p></div>
				<div class="title-desc"><p><strong>Сума продажі:</strong> {{$price_week}} грн.</p></div>
			</div>
			<hr>
			<div class="label">
				<div class="big-title">Місяць</div>
				<div class="title-label"><p><strong>Кількість продаж:</strong> {{$count_order_month}}</p></div>
				<div class="title-desc"><p><strong>Сума продажі:</strong> {{$price_month}} грн.</p></div>
			</div>
			<hr>
			<div class="label">
				<div class="big-title">Квартал</div>
				<div class="title-label"><p><strong>Кількість продаж:</strong> {{$count_order_kvartal}}</p></div>
				<div class="title-desc"><p><strong>Сума продажі:</strong> {{$price_kvartal}} грн.</p></div>
			</div>

	
			
		</div>
		
</div>
 



@include('footer')
  







