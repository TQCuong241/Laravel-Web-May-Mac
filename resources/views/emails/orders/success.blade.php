@component('mail::message')
# Cảm ơn bạn đã đặt hàng!

Đơn hàng **#{{ $order->id }}** của bạn đã được thanh toán thành công.

**Tổng tiền:** {{ number_format($order->total,0,',','.') }} đ  
**Ngày đặt:** {{ $order->created_at->format('d/m/Y H:i') }}

@component('mail::table')
| Sản phẩm       | Giá        | SL   | Thành tiền |
| -------------- | ---------- | ---- | ---------- |
@foreach($order->items as $item)
| {{ $item->product->name }} | {{ number_format($item->price,0,',','.') }} đ | {{ $item->quantity }} | {{ number_format($item->price * $item->quantity,0,',','.') }} đ |
@endforeach
@endcomponent

**Tổng cộng:** **{{ number_format($order->total,0,',','.') }} đ**

@component('mail::button', ['url' => route('orders.show', $order)])
Xem chi tiết đơn hàng
@endcomponent

Cảm ơn bạn,<br>
{{ config('app.name') }}
@endcomponent
