@include('header')
  
  
<div class="container main-container">
  <style type="text/css">
    .main-container{
      background-color: white;
    }
    .my-catalog{
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
    .my-catalog .card{
     padding: 10px;
     margin-top: 10px;

    }
    .my-catalog .card img{
      width: 300px;
      height: 200px;
      object-fit: cover;
      display: block;
      margin: auto;

    }
    button.btn.btn-outline-success.my-2.my-sm-0 {
        border: 1px solid black;
        color: black;
    }
    button.btn.btn-outline-success.my-2.my-sm-0:hover {
        background-color: black;
        color: white;
    }
  </style>

    <div class="my-catalog">
      <div class="main-title"><h2>Каталог</h2></div>
      <a href="/">очистити фільтри</a>
     
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <div class="form-group">
              <label for="name">Категорія</label>
              <select name="category_id" required class="form-control" onchange="selectCategory(this.value)">
                 <option value="" selected></option>
                @foreach($category as $cat)
                   @if(!empty($category_id) && $category_id==$cat->id)
                     <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                    @else
                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endif
                      
                @endforeach 
              </select>
            
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <div class="form-group">
              <label for="car_brand_id">Марка авто</label>

              <select name="car_brand_id" name="car_brand_id" id="car_brand_id" required class="form-control" onchange="selectCar(this.value)">
                <option value="" car-name="" selected></option>
                @foreach($car as $cars)
                  @if(!empty($car_id) && $car_id==$cars->id)
                   <option value="{{$cars->id}}" car-name="{{$cars->name}}" selected>{{$cars->name}}</option>
                  @else
                    <option value="{{$cars->id}}" car-name="{{$cars->name}}">{{$cars->name}}</option>
                  @endif
                      
                @endforeach 
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <form class="form-inline my-2 my-lg-0" style="margin-top: 25px!important;">
            <div style="display: block;margin-left: auto;">
              <input class="form-control mr-sm-2" type="text" id="search_input" placeholder="Пошук" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" id="search_but" type="button">Пошук</button>


            </div>
          </form>
          </div>
        </div>
          
          <script type="text/javascript">
                function selectCar($el){
                  if($el !== ""){
                    window.location = '/search/car/'+$el;
                  }
                  
                }
                function selectCategory($el){
                  if($el !== ""){
                    window.location = '/search/category/'+$el;
                  }
                  
                }
                $('#search_but').on('click',function () {
                    window.location = '/search/'+$('#search_input').val();
                })
          </script>

           @if($catalog->isEmpty())
            <h2 style="color:red; margin-top:15px;">В каталозі немає запчастин</h2>
          @else
        <div class="row">


            @foreach($catalog as $detail)
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
              <div class="card">
                <img class="card-img-top" src="/path/{{$detail->image}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><h4 class="text-center">{{$detail->name}}</h4></h5>         
                  <p class="card-text"><h4 style="color: gray;margin-bottom: 20px; font-size: 15px;">{!!$detail->description!!}</h4></p>
                  @foreach($category as $cat)
                    @if($cat->id == $detail->category_id)
                      <p><strong>Категорія: </strong>{{$cat->name}}</p>
                    @else
                    @endif
                @endforeach 
                  

                  <p><strong>Артикул: </strong>{{$detail->art}}</p>
                  <p><strong>Марка авто: </strong>{{$detail->car_brand}}</p>
                  <p><strong>Ціна: </strong>{{$detail->price}}грн.</p>
                </div>
              </div>
               
           </div>
               
            @endforeach 
           @endif
        </div>

     
         
    


      
    </div>
    
</div>
 






@include('footer')
  





