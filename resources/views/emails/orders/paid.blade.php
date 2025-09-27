@component('mail::message')
# Halo, {{ $order->fullname }}

Pesanan dengan kode **{{ $order->order_code }}** berhasil dibayar 🎉  

Detail akses item Anda:

@foreach($order->orderItems as $orderItem)
### {{ Str::limit($orderItem->product->name ?? $orderItem->product->judul, 25) }}

{{-- Link ke file (misal ebook/pdf) --}}
@if($orderItem->product->detail && $orderItem->product->detail->file_path)
@component('mail::button', ['url' => asset('storage/'.$orderItem->product->detail->file_path)])
Download File
@endcomponent
@endif

{{-- Link video (misalnya YouTube) --}}
@if($orderItem->product->detail && $orderItem->product->detail->video_url)
@component('mail::button', ['url' => $orderItem->product->detail->video_url])
Tonton Video
@endcomponent
@endif

{{-- Link Zoom (misal untuk bimbel/event) --}}
@if($orderItem->product->detail && $orderItem->product->detail->zoom_link)
@component('mail::button', ['url' => $orderItem->product->detail->zoom_link])
Join Zoom
@endcomponent

📅 Tanggal: {{ \Carbon\Carbon::parse($orderItem->product->detail->event_date)->translatedFormat('d F Y H:i') }}  
⏳ Durasi: {{ $orderItem->product->detail->duration_days }} hari  
@endif

---

@endforeach

Terima kasih telah berbelanja di **{{ config('app.name') }}**  
@endcomponent
