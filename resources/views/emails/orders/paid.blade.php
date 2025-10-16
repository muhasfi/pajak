@component('mail::message')
# Halo, {{ $order->fullname }}

Pesanan dengan kode **{{ $order->order_code }}** berhasil dibayar 🎉  

Detail akses item Anda:

@foreach($order->orderItems as $orderItem)
### {{ $orderItem->item->name }}

{{-- Link ke file (misal ebook/pdf) --}}
@if($orderItem->item->detail && $orderItem->item->detail->file_path)
@component('mail::button', ['url' => asset('storage/'.$orderItem->item->detail->file_path)])
Download File
@endcomponent
@endif

{{-- Link video (misalnya YouTube) --}}
@if($orderItem->item->detail && $orderItem->item->detail->video_url)
@component('mail::button', ['url' => $orderItem->item->detail->video_url])
Tonton Video
@endcomponent
@endif

{{-- Link Zoom (misal untuk bimbel/event) --}}
@if($orderItem->item->detail && $orderItem->item->detail->zoom_link)
@component('mail::button', ['url' => $orderItem->item->detail->zoom_link])
Join Zoom
@endcomponent

📅 Tanggal: {{ \Carbon\Carbon::parse($orderItem->item->detail->event_date)->translatedFormat('d F Y H:i') }}  
⏳ Durasi: {{ $orderItem->item->detail->duration_days }} hari  
@endif

---

@endforeach

Terima kasih telah berbelanja di **{{ config('app.name') }}**  
@endcomponent
