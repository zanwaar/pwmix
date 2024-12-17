<x-hrace009::pixel />
<!-- Fonts -->
<!-- Google Fonts - Cairo -->

<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous">


@livewireStyles

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>

@if( request()->routeIs('news.create') || request()->routeIs('news.edit') || request()->routeIs('shop.create') ||
request()->routeIs('shop.edit') || request()->routeIs('article.create') || request()->routeIs('article.edit') )
<script src="{{ asset('vendor/tinymce/tinymce.js') }}"></script>
@endif