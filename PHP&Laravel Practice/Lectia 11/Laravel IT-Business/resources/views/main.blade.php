@extends("layout")

@section("doc_title", "Main")
    
@section("content")
    @php
        $itCompanies = ["Microsoft", "Oracle", "IBM", "Amazon", "Apple"];
        $no = 1;
    @endphp

    <div @style([
        'display: flex',
        'flex-direction: column',
        'align-items: center',
        'justify-content: center',
        'font-size: 24px',
        'gap: 30px',
        'font-weight: bold',
        'margin-top: 50px'
    ])>
    @foreach ($itCompanies as $itCompany)
        <span>{{$no}}. {{$itCompany}}</span>
        @php
            $no+=1;    
        @endphp
    @endforeach
    </div>
@endsection