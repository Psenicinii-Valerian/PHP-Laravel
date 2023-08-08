@extends("layout")

@section("doc_title", "About")
    
@section("content")
   <div @style([
    'display: flex',
            'flex-direction: column',
            'align-items: center',
            'justify-content: center'
   ])>
      <h1 @style("margin: 10px")>Pros To Make Business With Us:</h1>
      <h1 @style("margin: 10px")>1. Lots of good reviews</h1>
      <h1 @style("margin: 10px")>2. We are the best in our work field</h1>
      <h1 @style("margin: 10px")>3. Around 10000 employees and still growing</h1>
      <h1 @style("margin: 10px")>4. Offices in more than 10 european countries </h1>
      <h1 @style("margin: 10px")>5. 7+ years of experience of studying IT marketplace</h1>
      
      <img @style([
        'margin-top: 30px',
         'width: 450px;',
         'height: 250px'
      ]) src="https://history-computer.com/wp-content/uploads/2022/09/shutterstock_1912110856-scaled.jpg" alt="IT-Business Company">
   </div>
   
@endsection