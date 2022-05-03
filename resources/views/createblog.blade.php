<form method="POST" action="/createblog">
    @csrf
    <div style='color:black' ><strong>{!! Session::has('msg') ? Session::get("msg") : '' !!}</strong></div>
    <div>
        @error('Title')
            {{$message}}
        @enderror
        <x-jet-label for="Title" value="{{ __('Title') }}" />
        <x-jet-input id="Title" class="block mt-1 w-full" type="text" name="Title"  required  />
    </div>

    <div>
        @error('Description')
        {{$message}}
         @enderror
        <x-jet-label for="Description" value="{{ __('Description') }}" />
        <x-jet-input id="Description" class="block mt-1 w-full" type="text" name="Description"  required />
    </div>

    <div class="mt-4">
        @error('StartDate')
        {{$message}}
         @enderror
        <x-jet-label for="StartDate" value="{{ __('StartDate') }}" />
        <x-jet-input id="StartDate" class="block mt-1 w-full" type="date" name="StartDate"  required />
    </div>

    <div class="mt-4">
        @error('EndDate')
        {{$message}}
         @enderror
        <x-jet-label for="EndDate" value="{{ __('EndDate') }}" />
        <x-jet-input id="EndDate" class="block mt-1 w-full" type="date" name="EndDate"  required />
    </div>

    <div class="mt-4">
        @error('Is_Active')
        {{$message}}
         @enderror
        <x-jet-label for="Is_Active" value="{{ __('Is_Active') }}" />
        <select name="Is_Active" id="Is_Active" class="block mt-1 w-full"  required >
            <option value="1">True</option>
            <option value="0">False</option>
          </select>
    </div>

    <div class="mt-4"> 
        <x-jet-input class="block mt-1 w-full" type="submit"/>
    </div>
</form>
