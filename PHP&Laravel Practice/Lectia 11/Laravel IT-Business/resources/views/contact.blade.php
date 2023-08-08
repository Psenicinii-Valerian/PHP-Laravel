@extends("layout")

@section("doc_title", "About")
    
@section("content")
   <div @style([
    'display: flex',
            'flex-direction: column',
            'align-items: center',
            'justify-content: center'
   ])>
      <h1 @style("margin: 10px")>Our Service Contact Info</h1>
      <h1 @style("margin: 10px")>Phone: +373 22 123 456</h1>
      <h1 @style("margin: 10px")>Email: info@moldovatech.com</h1>
      <h1 @style("margin: 10px")>Address: 45 Tech Park Avenue, Chisinau, Moldova</h1>
      
      <img @style([
        'margin-top: 10px',
         'width: 380px;',
         'height: 250px'
      ]) src="https://revenuesandprofits.com/wp-content/uploads/2022/11/What-Services-Does-an-IT-Company-Typically-Provide.jpg" alt="IT-Business">
   </div>
   
@endsection