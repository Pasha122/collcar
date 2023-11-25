@include('admin.header')
  
<div class="container main-container">
  

    <div class="my-detail">
      <div class="main-title"><h2>Працівники</h2></div>
      <button id="my-custom-butt" style="float: right;" onclick="window.location='/admin/user/create'">Створити</button>
      <p style="color:red; margin-top:15px; margin-bottom: 15px;">{{$errors}}</p>
      @if($users->isEmpty())
            <h2 style="color:red; margin-top:15px;">Немає створених працівників</h2>
      @else

      <table>
        <tr>

          <th>Ім’я</th>
          <th>Email</th>
          <th>Операції</th>
        </tr>
          @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    <div class="icon-operation">
                      <a href="/admin/user/edit/{{$user->id}}"><img src="/img/edit.svg"></a>
                      <a href="/admin/user/delete/{{$user->id}}" onclick="return confirm('Ви дійсно хочете видалити цього користувача?')"><img src="/img/delete.svg"></a>
                    </div>
                  </td>
                </tr> 
          @endforeach 
      </table>


      @endif
    </div>
    
</div>
 



@include('footer')
  







