Hi Webmaster, 

<p>
    Someone reported an bug in the applicatie 
    <strong><a href="{{ config('app.url') }}">{{ config('app.name') }}</a></strong>.
</p>

<hr>

<p>
    <strong>TITLE:</strong><br>
    {{ $data['title'] }}
</p>

<p>
    <strong>Description:</strong><br>
    {{ $data['body'] }}
</p>

<hr>

Kind regards,<br> 
{{ config('app.name') }}