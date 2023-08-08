@extends("layout")

@section("doc_title", "About")
    
@section("content")
    <div @style([
        'display: flex',
        'flex-direction: row',
        'gap: 50px',
        'justify-content: space-between',
        'margin-left: 40px', 
        'margin-right: 40px', 
    ])>

    {{-- div 1 - Lensa --}}
        <div @style([
            'display: flex',
            'flex-direction: column',
            'align-items: center',
            'justify-content: center'
        ])>
            <h1><a href="https://lensa.ro/promotii/" @style('text-decoration: none')>Lensa</a></h1>
            <img @style([
                'width: 400px;',
                'height: 250px'
            ]) src="https://www.prosport.ro/wp-content/uploads/2021/11/DIGITAL-ADVERTORIALS-Digital-Ads-1860x1046-1.jpg" alt="Lensa">
        </div>

    {{-- div 2 - McDonalds --}}
        <div @style([
            'display: flex',
            'flex-direction: column',
            'align-items: center',
            'justify-content: center'
        ])>
            <h1><a href="https://www.mcdonalds.com/us/en-us/mcdonalds-careers.html" @style('text-decoration: none')>McDonalds</a></h1>
            <img @style([
                'width: 400px;',
                'height: 250px'
            ]) src="https://scontent.fkiv9-1.fna.fbcdn.net/v/t1.6435-9/181512617_4409622279066165_2334888177400529305_n.jpg?_nc_cat=110&cb=99be929b-3346023f&ccb=1-7&_nc_sid=9267fe&_nc_ohc=J6IGy7Tg42gAX9oIfaB&_nc_ht=scontent.fkiv9-1.fna&oh=00_AfDXJGITJ4FB2iAWfGCNW4WM4GZJ8HbQ1fofOPA8HeyBcQ&oe=64DF9747" alt="McDonalds">
        </div>

        {{-- div 3 - McDonalds --}}
            <div @style([
                'display: flex',
                'flex-direction: column',
                'align-items: center',
                'justify-content: center'
            ])>
                <h1><a href="https://dieselok.md/" @style('text-decoration: none')>Dieselok</a></h1>
                <img @style([
                    'width: 400px;',
                    'height: 250px'
                ]) src="https://dieselok.md/wp-content/uploads/2021/11/900-450-banner-dieselok.png" alt="Dieselok">
            </div>
    </div>
@endsection