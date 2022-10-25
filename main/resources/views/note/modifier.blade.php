
<link rel="stylesheet" href="{{asset('assetsfront/css/2-star.css')}}">

<script src="{{asset('assetsfront/js/3-star.js')}}"></script>
<form action="{{ asset('/note/modifier/'.$article->id.'/'.$note->id) }}" method="POST">
    <!-- (B) GENERATE STAR RATING HERE -->
    @csrf
    <div  id="demo"></div>
        <input name="note"   type="hidden" id="note" value="{{$note->note}}" />

    <button  type="submit"  id="submit" style="visibility:hidden;"></button>
    <!-- (C) INIT STAR RATING -->
    <script>

        starry({
            // (C1) REQUIRED
            target: document.getElementById("demo"),
            // (C2) OPTIONAL
            max: 5,

            now:document.getElementById("note").value ,
            // disabled: true,
            click : (stars) => { document.getElementById('note').value=stars;
                document.getElementById('submit').click();}


        });

        // (D) TO GET NUMBER OF STARS PROGRAMMATICALLY
        var stars = document.getElementById("demo").getstars();

    </script>


</form>

