<article style="padding: 0 40px; border-right: 1px solid #F0F0F0;">
    <h1 style="margin-top: 0;">{{$title}}</h1>
    <p>{{$description}}</p>
    <p><img alt="{{$title}}" src="{{$picture}}" class="main-image"></p>
    <div>{{$content}}</div>
    @if($source_id > 0)
    <!--noindex--><p>Источник: www.euromag.ru</p><!--/noindex-->
    @endif
</article>