<x-mail::message>
# Your Order Created!

New Order with OrderId : {{$order->id}} has been created!

@php
    $url = "http://localhost:8000/order_detaile/" . $order->id;
@endphp

<x-mail::button :url="$url">
Order details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
