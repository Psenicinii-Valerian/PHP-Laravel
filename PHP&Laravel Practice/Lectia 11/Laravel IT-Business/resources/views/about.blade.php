@extends("layout")

@section("doc_title", "About")
    
@section("content")
   <div @style([
    'display: flex',
            'flex-direction: column',
            'align-items: center',
            'justify-content: center'
   ])>
      <h1>Microsoft logo</h1>
      <img @style([
         'width: 380px;',
         'height: 250px'
      ]) src="https://www.cnet.com/a/img/resize/f92ae43457ac52e0b761737181264a82aa0765bb/hub/2019/02/04/8311b046-6f2b-4b98-8036-e765f572efad/msft-microsoft-logo-2-3.jpg?auto=webp&fit=crop&height=675&width=1200" alt="Microsoft">
   </div>
   
@endsection