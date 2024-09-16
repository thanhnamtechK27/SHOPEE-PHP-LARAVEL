<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>{{ $data['subject'] }}</h2>

<p>{{ $data['body'] }}</p>

{{-- Hiển thị HTML của bảng giỏ hàng --}}
{!! $data['cartHtml'] !!}

<p>Total Cart Price: {{ $data['totalCartPrice'] }}</p>
    
</body>
</html>