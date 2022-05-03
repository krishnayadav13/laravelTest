
      <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <a href="/formblog" class="text-sm text-gray-700 dark:text-gray-500 underline">Create Blog</a><br>
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <table>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>StartDate</th>
                      <th>EndDate</th>
                      <th>Is_Active</th>
                      <th>update</th>
                      <th>delete</th>
                    </tr>
                @foreach ($blog as $item)
                
                   <tr> 
                    <td> {{$item->title}}</td>
                    <td> {{$item->description}}</td>
                    <td> {{$item->start_date}}</td>
                    <td> {{$item->end_date}}</td>
                    <td> {{$item->is_active}}</td>
                    <td> <a href={{'/updateblog/'.$item->id}}>update</a></td> 
                    <td> <a href={{'/deleteblog/'.$item->id}}>delete</a></td> 
                  </tr>
                      @endforeach
                    </table>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    &nbsp;
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a> 
                        @endif
                    <br>
                    <table >
                        <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>StartDate</th>
                          <th>EndDate</th>
                          <th>Is_Active</th>
                        </tr>
                    @foreach ($blog as $item)
                    
                       <tr> 
                        <td> {{$item->title}}</td>
                        <td> {{$item->description}}</td>
                        <td> {{$item->start_date}}</td>
                        <td> {{$item->end_date}}</td>
                        <td> {{$item->is_active}}</td>
                      </tr>
                          @endforeach
                        </table>
                      
                @endauth
            </div>
        @endif
<br>

