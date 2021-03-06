@if(count($errors) > 0)
    <div class="bg-red-400 text-white font-bold rounded-t px-4 py-2">Error</div>
    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif