<h1>Hi, {{ $name }}!</h1>

<p>Somebody with your email signed up for accound at our website. If you, than activate it by clicking the following link:</p>
<a href="{{ $activationUrl }}">{{ $activationUrl }}</a>
<p>If not, you can safely ignore it and no harm will be done.</p>
