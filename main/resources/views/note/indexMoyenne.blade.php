<style>:root {
        --star-size: 20px;
        --star-color: #fff;
        --star-background: #fc0;
    }

    .Stars {
        margin-left: 75%;

        --percent: calc(var(--rating) / 5 * 100%);
        color:black;
        display: inline-block;
        font-size: var(--star-size);
        font-family: Times;
    line-height: 1;}

    .stars::before {
         content: '★★★★★';
         letter-spacing: 3px;
         background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
     }




</style>
<div class="Stars" style="--rating: {{$note}};" aria-label=" {{$note}} out of 5."> </div>
